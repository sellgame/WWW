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

class manage extends \think\Controller
{
	/**
	 *获取刊物列表
	 * @param cpage页码
	 * @return 
	 * @throws 
	*/	
	public function plist(){
		if(Request::instance()->isAjax()){
			$cpage = input('post.cpage');
			$cpage = empty($cpage)?1:$cpage;
			$pagesize = config('pagesize');
			$counts = Db::name('source')->count();
			$res = Db::name('source')->field('s_id,sourcename')->order('s_id DESC')->limit(($cpage-1)*$pagesize,$pagesize)->select();
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