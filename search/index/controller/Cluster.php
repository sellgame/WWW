<?php
namespace app\index\controller;
use think\Request;
use think\Cache;
use think\Db;
use think\Session;

/**
 * @author sellgame <eisc@163.com>
 * 
 */

class Cluster
{
	/**
	 * 获取当年数据更新量
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function aaa(){
		if(Request::instance()->isAjax()){
			import('sphinxapi', EXTEND_PATH);
			$cyear = date('Y');
			$search = new \sphinxclient();
			$search->SetServer(config('sphinxhost'),config('sphinxport'));	//服务器地址，端口
			$search->SetMatchMode('SPH_MATCH_FULLSCAN');	// 匹配模式
			$search->SetSortMode(SPH_SORT_RELEVANCE);	//排序方式 匹配度
			$search->SetLimits(0, 15);
			$search->SetFilterRange('year',$cyear-14,$cyear);
			$search->SetGroupBy('year',SPH_GROUPBY_ATTR);	//按年分组
			$result = $search->Query('', config('myindex'));	//添加查询（全字段搜索)
			if ($result['total']>0) {
				$y = array();
				$n = array();
				foreach($result['matches'] as $id=>$v){
					array_push($y, $v['attrs']['@groupby']);
					array_push($n, $v['attrs']['@count']);
				}
				$data['y']=$y;
				$data['n']=$n;
				return $data;
			} else {
				return 'null';
			}
			
		}
	}


	/**
	 * 获取某年各数据库更新数量
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function bbb(){
		if(Request::instance()->isAjax()){
			$years = trim(input('post.years'));
			if(empty($years)) return 'null';
			import('sphinxapi', EXTEND_PATH);
			$search = new \sphinxclient();
			$search->SetServer(config('sphinxhost'),config('sphinxport'));	//服务器地址，端口
			$search->SetMatchMode('SPH_MATCH_FULLSCAN'); // 匹配模式
			$search->SetGroupBy('cid', SPH_GROUPBY_ATTR); //按数据库源分组
			$search->SetFilter('year', array($years));
			$result = $search->Query('', config('myindex')); //查询
			if ($result['total']>0) {
				$res = Db::name('class')->field('name')->order('cid')->select();
				$c = array();
				$n = array();
				foreach($result['matches'] as $id=>$v){
					array_push($c, $res[$v['attrs']['@groupby']-1]['name']);
					array_push($n, $v['attrs']['@count']);
				}
				$data['c']=$c;
				$data['n']=$n;
				return $data;
			} else {
				return 'null';
			}
		}
	}
	
	/**
	 * 获取年份列表
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function ylist(){
		if(Request::instance()->isAjax()){
			import('sphinxapi', EXTEND_PATH);
			$search = new \sphinxclient();
			$search->SetServer(config('sphinxhost'),config('sphinxport'));	//服务器地址，端口
			$search->SetMatchMode('SPH_MATCH_ANY');	// 匹配模式
			$search->SetSortMode(SPH_SORT_RELEVANCE);	//排序方式 匹配度
			$search->SetFilterRange('year',1901,Date('Y'));
			$search->SetGroupBy('year',SPH_GROUPBY_ATTR);	//按年分组
			$search->SetLimits(0, 30);
			$result = $search->Query('', config('myindex'));	//添加查询（全字段搜索）
			$i=0;
			foreach($result['matches'] as $id=>$v){
				$arr[$i]['pyear'] = $v['attrs']['year'];
				$i=$i+1;
			}
			return $arr;
		}
	}
	 
}
