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

class Index extends \think\Controller
{
	public function _initialize()
    {
		$uid = Session::get('uid');
		if(empty($uid)){
			$this->redirect('login/uin');
		}
		$this->assign('uid',$uid);
		$this->assign('userid',$uid);
		$this->assign('username',Session::get('uname'));
		$this->assign('userid',Session::get('utype'));
    }
	

	/**
	 *用户中心首页
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function index()
    {
		return $this->fetch();
    }


	/**
	 *搜索查询页
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function statiss(){
		$edate = date('Y-m-d',time());
		$sdate = date_create($edate);
		date_sub($sdate, date_interval_create_from_date_string("7 days"));
		$sdate = date_format($sdate,"Y-m-d");
		$this->assign('sdate', $sdate);
		$this->assign('edate', $edate);
		return $this->fetch();
	}
	
	/**
	 *下载查询页
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function statisd(){
		$edate = date('Y-m-d',time());
		$sdate = date_create($edate);
		date_sub($sdate, date_interval_create_from_date_string("15 days"));
		$sdate = date_format($sdate,"Y-m-d");
		$this->assign('sdate', $sdate);
		$this->assign('edate', $edate);
		return $this->fetch();
	}
	
	/**
	 *专题列表页
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function special(){
		return $this->fetch();
	}
	
	/**
	 *专题添加页
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function special_add(){
		return $this->fetch();
	}

	/**
	 *专题编辑页
	 * @param id 专题id
	 * @return 
	 * @throws 
	*/
	public function special_edit(){
		$sid = input('get.id');
		if(!empty($sid)){
			$this->assign('sid', $sid);
			return $this->fetch();
		}
	}


	/**
	 *专题属性编辑页
	 * @param id 专题id
	 * @return 
	 * @throws 
	*/
	public function special_param(){
		$sid = input('get.id');
		if(!empty($sid)){
			$this->assign('sid', $sid);
			return $this->fetch();
		}
	}

	/**
	 *专题文献列表页
	 * @param id 专题id
	 * @return 
	 * @throws 
	*/
	public function special_alist(){
		$sid = input('get.id');
		if(!empty($sid)){
			$this->assign('sid', $sid);
			return $this->fetch();
		}
	}


}
