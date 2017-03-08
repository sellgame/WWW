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

class Index extends \think\Controller
{
	public function _initialize()
    {
		$this->assign('userid',Session::get('uid'));
		$this->assign('username',Session::get('uname'));
		$this->assign('userid',Session::get('utype'));
    }
	
	public function index()
    {
		return $this->fetch();
    }
	
	/**
	 * 获取文章总数
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function counts(){
		if(Request::instance()->isAjax()){
			$count = Cache::get('counts');
			if(empty($count)){
				$res = Db::name('class')->field('tname')->select();
				foreach($res as $id=>$vo){
					$count += db($vo['tname'])->count();
				}
				if(empty($count)){
					return 'null';
				}else{
					Cache::set('count',$count,3600);
					return $count;
				}
			}
			else{
				return $count;
			}
		}
	}
	
	/**
	 * 获取热门检索关键词
	 * @param 	
	 * @return json
	 * @throws 
	 */
	 public function keywords(){
		if(Request::instance()->isAjax()){
			$res = Db::name('keywords')->field('keyname')->where('keyname','LIKE',input('post.qstr/s').'%')->limit(8)->select();
			return $res;
		}
	 }
    
	/**
	 * 获取文章详细信息
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function article()
    {
        $aid = input('get.aid');
		if(empty($aid)){
			return 'null';
		}else{
			/* 访问记录 */
			$cname='A'.Session::get('uid').$aid;
			if(cookie($cname)==0){
				$data = ['docid'=>$aid, 'uid'=>Session::get('uid'), 'visitip'=>getip(1), 'visittime'=>time()];
				Db::connect('userdb_config')->name('visit_a')->insert($data);
				cookie($cname, '1', 3600);
			}
			/* 获取信息 */
			$table_name = 'data_'.substr($aid,0,4);
			$res = Db::name($table_name)->join('s_source','s_'.$table_name.'.sid=s_source.s_id','left')->where('docid',$aid)->find();
			$text = base64_encode(Config('downpath').$res['filepath']);
			$this->assign('data',$res);
			$this->assign('text',$text);
			return $this->fetch();
		}
    }
	
	/**
	 * 检索入口
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function search(){
		if(Request::instance()->isPost()){
			$str = input('post.keys');
			$this->assign('keys',$str);
			return $this->fetch();
		}
	}
	
	/**
	 * 母体文献列表
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function document(){
		if(Request::instance()->isGet()){
			$str = input('get.type');
			$this->assign('type',$str);
			return $this->fetch();
		}
	}
	 
	/**
	 * 按母体文献列文章列表
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function plist(){
		if(Request::instance()->isGet()){
			$sid = input('get.sid');
			$this->assign('sid',$sid);
			return $this->fetch();
		}
	}
	
	/**
	 * 按文摘数据列文章列表
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function alist(){
		if(Request::instance()->isGet()){
			$cid = input('get.cid');
			$this->assign('cid',$cid);
			return $this->fetch();
		}
	}
	
	/**
	 * 首页数据统计
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function statis(){
		return $this->fetch();
	}
	
	/**
	 * 批量下载页
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function downpdf(){
		if(Request::instance()->isGet()){
			$sid = input('get.sid');
			$year = input('get.year');
			$issue = input('get.issue');
			if(empty($sid) or empty($year) or empty($issue)){
				return 'null';
			}else{
				$this->assign('sid',$sid);
				$this->assign('year',$year);
				$this->assign('issue',$issue);
				return $this->fetch();
			}
		}
	}
	
	/**
	 * 二维码生成
	 * @param 	
	 * @return json
	 * @throws 
	 */
	public function qrcode($text) {
		\think\Loader::import('qrcode.qrcode');
		$text = base64_decode($text);
		return \QRcode::png($text);
		exit;
	}
	
}
