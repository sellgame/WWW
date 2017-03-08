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

class Search
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
			$str = input('post.keys');
			$year = input('post.year');
			$cpage = input('post.cpage');
			$cpage = empty($cpage)?1:$cpage;
			$cpage = $cpage>$bpage?$bpage:$cpage;
			if(empty($str)){
				return 'null';
				exit;
			}
				
			/* 访问记录 */
			$cname  = 'K'.Session::get('uid').sprintf('%u', crc32($str));
			if(cookie($cname)==0){
				$sdata = ['keyword'=>$str, 'uid'=>Session::get('uid'), 'visitip'=>getip(1), 'visittime'=>time()];
				Db::connect('userdb_config')->name('visit_k')->insert($sdata);
				cookie($cname, '1', 3600);
			}
			
			/* 获取信息 */
			import('sphinxapi', EXTEND_PATH);
			$search = new \sphinxclient();
			$search->SetServer(config('sphinxhost'),config('sphinxport'));	//服务器地址，端口
			$search->SetMatchMode('SPH_MATCH_ANY');	// 匹配模式
			$weights = array(
						'mtitle' => 9999,
						'sourcename' => 7777
					);
			$search->SetFieldWeights($weights);	//设置字段权重
			$search->SetSortMode(SPH_SORT_RELEVANCE);	//排序方式 匹配度
			$search->SetLimits(($cpage-1)*$pagesize, $pagesize); //分页设置
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
						$group[$vo['attrs']['@groupby']] = $vo['attrs']['@count'];
					}	
					$data['group'] = $group;
				}
			}
			debug('end');
			$data['times'] = debug('begin','end').'s';
			return $data;
		}
	}
	 
}
