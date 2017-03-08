<?php
namespace app\usercenter\controller;
use think\Request;
use think\Cache;
use think\Db;
use think\Session;

/**
 * @author sellgame <eisc@163.com>
 * 
 */

class statis extends \think\Controller
{
	public function _initialize()
    {
		$this->assign('userid',Session::get('uid'));
		$this->assign('username',Session::get('uname'));
		$this->assign('userid',Session::get('utype'));
    }
	
	/**
	 *下载数据统计
	 * @param uid 用户id 
	 * @param type 查询类型 [day天 month月 year年]
	 * @return 
	 * @throws 
	*/
	public function downs()
    {
		if(Request::instance()->isAjax()){
			$uid = input('post.uid');
			$type = input('post.type');
			date_default_timezone_set("Asia/Shanghai");
			switch($type){
				case 'day':
					$times = strtotime(date("Y-m-d",time()));	//今天0点的时间点
					break;
				case 'month':
					$cday = date("d",time())-1;
					$times = strtotime("now")-$cday*24*3600-date("H",time())*3600-date("i",time())*60-date("s",time());
					break;
				case 'year':
					$yday =  date("Y",time());
					$times = strtotime($yday."-01-01");
					break;
				default:
					return false;
			}
			if(empty($uid)){
				$res = Db::connect('userdb_config')->name('down_a')->where('downtime>='.$times)->select();
			} else {
				$res = Db::connect('userdb_config')->name('down_a')->where('uid='.$uid.' and downtime>='.$times)->select();
			}
			$counts = count($res);
			return $counts;
		}
    }
	
	/**
	 *关键词查询统计
	 * @param uid 用户id
	 * @return 
	 * @throws 
	*/
	public function kvist(){
		if(Request::instance()->isAjax()){
			$uid = input('post.uid');
			//关键词检索记录
			if(!empty($uid)){
				$res = Db::connect('userdb_config')->name('visit_k')->distinct(true)->field('keyword')->where('uid','=',$uid)->limit(10)->order('visittime DESC')->select();
				foreach($res as $id=>$vo){
					if(strlen($vo['keyword'])>34){
						$data[$id]['keyword'] = substr($vo['keyword'],0,34).'...';
					} else {
						$data[$id]['keyword'] = $vo['keyword'];
					}
				}
				return $data;
			}
		}
	}
	
	/**
	 *文章访问统计
	 * @param uid 用户id
	 * @return 
	 * @throws 
	*/
	public function avist(){
		if(Request::instance()->isAjax()){
			$uid = input('post.uid');
			if(!empty($uid)){
				//文章浏览记录
				$res = Db::connect('userdb_config')->name('visit_a')->distinct(true)->field('docid')->where('uid','=',$uid)->limit(10)->order('visittime DESC')->select();
				if(count($res)>0){
					foreach($res as $id=>$vo){
						$docid[substr($vo['docid'],0,4)] = $docid[substr($vo['docid'],0,4)]. $vo['docid'] .',';
					}
					foreach($docid as $id=>$vo) {
						$unions = $unions . "SELECT docid,mtitle FROM s_data_".$id." WHERE docid IN(".trim($vo,',').") UNION ALL ";
					}
					unset($docid);
					$unions = substr($unions,0,-11);
					$res = Db::query($unions);
					foreach($res as $id=>$vo){
						$data[$id]['docid'] = $vo['docid'];
						if(strlen($vo['mtitle'])>78){
							$data[$id]['mtitle'] = substr($vo['mtitle'],0,78).'...';
						} else {
							$data[$id]['mtitle'] = $vo['mtitle'];
						}
					}
					return $data;
				}
			}	
		}
	}
	
	/**
	 *下载统计查询
	 * @param uid 用户id
	 * @param st 开始时间
	 * @param et 结束时间
	 * @return 
	 * @throws 
	*/
	public function sdown(){
		if(Request::instance()->isAjax()){
			$uid = input('post.uid');
			$stime = input('post.st');
			$etime = input('post.et');
			$st =  empty($stime) ? (strtotime(date("Y-m-d",time()))-14*24*3600) : strtotime($stime);
			$et =  empty($etime) ? strtotime(date("Y-m-d",time())) : strtotime($etime);
			$et = $et+24*3600;
			if(empty($uid)){
				$res = Db::connect('userdb_config')->name('down_a')->field('downtime')->where('downtime>='.$st.' and downtime<='.$et)->select();
			} else {
				$res = Db::connect('userdb_config')->name('down_a')->field('downtime')->where('uid='.$uid.' and downtime>='.$st.' and downtime<='.$et)->select();
			}
			
			if($res){
				foreach($res as $id=>$vo){
					$temp_time = date('Ymd',$vo["downtime"]);
					$arr[$temp_time] = $arr[$temp_time]+1;
				}
			}
			$d = array();
			$n = array();
			foreach($arr as $id=>$vo){
				array_push($d, $id);
				array_push($n, $vo);
			}
			$data['d']=$d;
			$data['n']=$n;
			return $data;
		}
	}

	/**
	 *检索记录查询
	 * @param uid 用户id
	 * @param st 开始时间
	 * @param et 结束时间
	 * @return 
	 * @throws 
	*/
	public function ssearch(){
		if(Request::instance()->isAjax()){
			$uid = input('post.uid');
			$stime = input('post.st');
			$etime = input('post.et');
			$cpage = input('post.cpage');
			$pagesize = config('pagesize');
			$cpage = empty($cpage)?1:$cpage;
			$st =  empty($stime) ? (strtotime(date("Y-m-d",time()))-7*24*3600) : strtotime($stime);
			$et =  empty($etime) ? strtotime(date("Y-m-d",time())) : strtotime($etime);
			$et = $et+24*3600;
			if(empty($uid)){
				$counts = Db::connect('userdb_config')->name('visit_k')->where('visittime>='.$st.' and visittime<='.$et)->count();
				$res = Db::connect('userdb_config')->name('visit_k')->field('keyword,visittime')->where('visittime>='.$st.' and visittime<='.$et)->order('visittime DESC')->limit(($cpage-1)*$pagesize,$pagesize)->select();
			} else {
				$counts = Db::connect('userdb_config')->name('visit_k')->where('uid='.$uid.' and visittime>='.$st.' and visittime<='.$et)->count();
				$res = Db::connect('userdb_config')->name('visit_k')->field('keyword,visittime')->where('uid='.$uid.' and visittime>='.$st.' and visittime<='.$et)->order('visittime DESC')->limit(($cpage-1)*$pagesize,$pagesize)->select();
			}
			
			if(count($res)>0){
				foreach ($res as $key => $value) {
					$arr[$key]['keyword']=$value['keyword'];
					$arr[$key]['visittime']=date('Y-m-d H:i:s',$value['visittime']);
				}
				$data['res'] = $arr;
			}
			if($counts<$pagesize){
				$data['tpage'] = 1;
			} else{
				$data['tpage'] = ceil($counts/$pagesize);	
			}
			return $data;
		}
	}

}
