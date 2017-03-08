<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use think\Cache;
use think\Session;
use think\Cookie;

/**
 * @author sellgame <eisc@163.com>
 * 
 */

class Publication
{
	/**
	 * 检索入口
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function index(){
		if(Request::instance()->isAjax()){
			debug('begin');
			$pagesize = config('pagesize');
			$bpage = 1000/$pagesize;
			$pname = trim(input('post.pname'));
			$stype = trim(input('post.stype'));
			$type = trim(input('post.type'));
			$cpage = input('post.cpage');
			$cpage = empty($cpage)?1:$cpage;
			$cpage = $cpage>$bpage?$bpage:$cpage;
			
			/* 访问记录 */
			if(!empty($pname)){
				$cname  = 'K'.Session::get('uid').sprintf('%u', crc32($pname));
				if(cookie($cname)==0){
					$data = ['keyword'=>$pname, 'uid'=>Session::get('uid'), 'visitip'=>getip(1), 'visittime'=>time()];
					Db::connect('userdb_config')->name('visit_k')->insert($data);
					cookie($cname, '1', 3600);
				}
			}
			
			/* 获取信息 */
			import('sphinxapi', EXTEND_PATH);
			$search = new \sphinxclient();
			$search->SetServer(config('sphinxhost'),config('sphinxport'));	//服务器地址，端口
			$search->SetMatchMode('SPH_MATCH_PHRASE'); //匹配模式
			$weights = array(
						'sourcename' => 9999,
						'sourcename_a' => 7777
					);
			$search->SetFieldWeights($weights);	//设置字段权重
			$search->SetSortMode(SPH_SORT_RELEVANCE);	//排序方式 匹配度
			$search->SetLimits(($cpage-1)*$pagesize, $pagesize); //分页设置
			$search->SetFilter('doctype', array(sprintf('%u', crc32($type))));
			switch($stype){
				case 'opt2':
					$search->SetFilter('issn', array(sprintf('%u', crc32($pname))));
					$search->AddQuery('', config('sindex'));
					break;
				case 'opt3':
					$search->SetFilter('isbn', array(sprintf('%u', crc32($pname))));
					$search->AddQuery('', config('sindex'));
					break;
				default:
					$search->AddQuery($pname, config('sindex'));
			}
			$result = $search->RunQueries();
			$counts = $result[0]["total_found"];
			$data['counts'] = $counts;
			if($counts>0){
				if($counts<=$pagesize){
					$tpage = 1;
				} else {
					$tpage	= $counts%$pagesize>0 ? floor($counts/$pagesize)+1 : $counts/$pagesize;
					$tpage	= $tpage>100?100:$tpage;
				}
				$data['tpage'] = $tpage;
				foreach($result[0]['matches'] as $id=>$vo) {
					$where_sid .= $id .",";
				}
				if(!empty($where_sid)){
					$where_sid = trim($where_sid,',');
					$data['res'] = Db::query('Select * From s_source Where s_id IN('.$where_sid.')');
				}
			}	
			debug('end');
			$data['times'] = debug('begin','end').'s';
			return $data;
		}	
	}
	
	/**
	 * 检索入口
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function plist(){
		if(Request::instance()->isAjax()){
			debug('begin');
			$pagesize = config('pagesize');
			$bpage = 1000/$pagesize;
			
			$str = trim(input('post.keys'));
			$sid = trim(input('post.sid'));
			$year = trim(input('post.year'));
			$issue = trim(input('post.issue'));
			$cpage = input('post.cpage');
			$cpage = empty($cpage)?1:$cpage;
			$cpage = $cpage>$bpage?$bpage:$cpage;
			
			/* 访问记录 */
			$cname='S'.Session::get('uid').$sid;
			if(cookie($cname)==0){
				$data = ['sid'=>$sid, 'uid'=>Session::get('uid'), 'visitip'=>getip(1), 'visittime'=>time()];
				Db::connect('userdb_config')->name('visit_s')->insert($data);
				cookie($cname, '1', 3600);
			}
			
			/* 获取信息 */
			import('sphinxapi', EXTEND_PATH);
			$search = new \sphinxclient();
			$search->SetServer(config('sphinxhost'),config('sphinxport'));	//服务器地址，端口
			$search->SetMatchMode('SPH_MATCH_PHRASE'); //匹配模式
			$weights = array(
						'mtitle' => 9999,
						'sourcename' => 7777
					);
			$search->SetFieldWeights($weights);	//设置字段权重
			$search->SetSortMode(SPH_SORT_RELEVANCE);	//排序方式 匹配度
			$search->SetLimits(($cpage-1)*$pagesize, $pagesize); //分页设置
			$search->SetFilter('sid', array($sid));
			if(empty($year)){
				$search->AddQuery($str, config('myindex'));	//添加查询（全字段搜索）
				if($cpage==1){
					$search->SetLimits(0,50);
					$search->SetGroupBy('year', SPH_GROUPBY_ATTR);	//按年分组
					$search->AddQuery($str, config('myindex'));	
				}
				$result = $search->RunQueries();
			} else {
				$search->SetFilter('year', array($year));
				if(empty($issue)){
					$search->AddQuery($str, config('myindex'));	//添加查询（全字段搜索）
					if($cpage==1){
						$search->SetLimits(0,50);
						$search->SetGroupBy('issues', SPH_GROUPBY_ATTR);	//按期分组
					}
				} else {
					if($issue=='A001'){
						$search->SetFilter('issues', array(sprintf('%u', crc32(''))));
					}else{
						$search->SetFilter('issues', array(sprintf('%u', crc32($issue))));
					}
				}
				$search->AddQuery($str, config('myindex'));	//添加查询（全字段搜索）
				$result = $search->RunQueries();
			}
			$counts = $result[0]["total_found"];
			$data['counts'] = $counts;
			if($counts>0){
				if($counts<=$pagesize){
					$tpage = 1;
				} else {
					$tpage	= $counts%$pagesize>0 ? floor($counts/$pagesize)+1 : $counts/$pagesize;
					$tpage	= $tpage>100?100:$tpage;
				}
				$data['tpage'] = $tpage;
				foreach($result[0]['matches'] as $id=>$vo) {
					$docid[substr($id,0,4)] = $docid[substr($id,0,4)]. $id .',';
				}
				foreach($docid as $id=>$vo) {
					$unions = $unions . "SELECT docid,mtitle,stitle,authors,authorunit FROM s_data_".$id." WHERE docid IN(".trim($vo,',').") UNION ALL ";
				}
				unset($docid);
				$unions = substr($unions,0,-11);
				$data['res'] = Db::query($unions);
				if(empty($year)){
					foreach($result[1]['matches'] as $id=>$vo) {
						$ygroup[$vo['attrs']['@groupby']] = $vo['attrs']['@count'];
					}	
					$data['year'] = $ygroup;
				} else {
					if(empty($issue)){
						foreach($result[1]['matches'] as $id=>$vo) {
							if(empty($vo['attrs']['issue'])){
								$igroup['A001'] = $vo['attrs']['@count'];
							} else {
								$igroup[$vo['attrs']['issue']] = $vo['attrs']['@count'];
							}
						}	
						$data['issue'] = $igroup;
					}
				}
			}
			debug('end');
			$data['times'] = debug('begin','end').'s';
			return $data;
		}	
	}
	
	/**
	 * 检索入口
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function downpdf(){
		if(Request::instance()->isAjax()){
			$sid = trim(input('post.sid'));
			$year = trim(input('post.year'));
			$issue = trim(input('post.issue'));
			
			import('sphinxapi', EXTEND_PATH);
			$search = new \sphinxclient();
			$search->SetServer(config('sphinxhost'),config('sphinxport'));	//服务器地址，端口
			$search->SetMatchMode('SPH_MATCH_PHRASE'); //匹配模式
			$search->SetSortMode(SPH_SORT_RELEVANCE);	//排序方式 匹配度
			$search->SetLimits(0,1000);
			$search->SetFilter('sid', array($sid));
			$search->SetFilter('year', array($year));
			if($issue=='A001'){
				$search->SetFilter('issues', array(sprintf('%u', crc32(''))));
			}else{
				$search->SetFilter('issues', array(sprintf('%u', crc32($issue))));
			}
			$search->AddQuery('', config('myindex'));	
			$result = $search->RunQueries();
			$counts = $result[0]["total_found"];
			$data['counts'] = $counts;
			if($counts>0){
				foreach($result[0]['matches'] as $id=>$vo) {
					$docid[substr($id,0,4)] = $docid[substr($id,0,4)]. $id .',';
				}
				foreach($docid as $id=>$vo) {
					$unions = $unions . "SELECT filename,filepath FROM s_data_".$id." WHERE docid IN(".trim($vo,',').") UNION ALL ";
				}
				unset($docid);
				$unions = substr($unions,0,-11);
				$data['res'] = Db::query($unions);
			}
			return $data;
		}	
	}
}
