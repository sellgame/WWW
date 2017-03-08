<?php
namespace app\admin\controller;
use think\Request;
use think\Cache;
use think\Db;
use think\Session;

/**
 * @author sellgame <eisc@163.com>
 * 
 */

class special extends \think\Controller
{
	/**
	 *获取专题列表
	 * @param uid 用户id
	 * @param cpage页码
	 * @return 
	 * @throws 
	*/	
	public function slist(){
		if(Request::instance()->isAjax()){
			$uid = input('post.uid');
			$cpage = input('post.cpage');
			$cpage = empty($cpage)?1:$cpage;
			$pagesize = config('pagesize');
			if(empty($uid)){
				$counts = Db::connect('userdb_config')->name('special')->count();
				$res = Db::connect('userdb_config')->name('special')->field('id,sname')->order('id DESC')->limit(($cpage-1)*$pagesize,$pagesize)->select();
			}
			else{
				$counts = Db::connect('userdb_config')->name('special')->where('uid='.$uid)->count();
				$res = Db::connect('userdb_config')->name('special')->field('id,sname')->where('uid='.$uid)->order('id DESC')->limit(($cpage-1)*$pagesize,$pagesize)->select();
			}
			$data['res'] = $res;
			if($counts<$pagesize){
				$data['tpage'] = 1;
			}else{
				$data['tpage'] = ceil($counts/$pagesize);	
			}
			return $data;
		}
	}
	
	/**
	 *删除专题
	 * @param id 专题id
	 * @return 
	 * @throws 
	*/

	public function delspecial(){

	}
}