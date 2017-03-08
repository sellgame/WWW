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

class Record extends \think\Controller
{
	
	/**
	 * 文献下载记录
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function adowns(){
		if(Request::instance()->isAjax()){
			$docid = trim(input('post.did'));
			if(!empty($docid)){
				$cname  = 'AD'.Session::get('uid').sprintf('%u', crc32($docid));
				$uid = Session::get('uid')>0?Session::get('uid'):0;
				if(cookie($cname)==0){
					$data = ['docid'=>$docid, 'uid'=>$uid, 'visitip'=>getip(1), 'downtime'=>time()];
					Db::connect('userdb_config')->name('down_a')->insert($data);
					cookie($cname, '1', 3600);
				}
				return 'success';
			} else {
				return 'false';
			}
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
}