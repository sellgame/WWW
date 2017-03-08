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

class Index extends \think\Controller
{
	public function _initialize()
    {
		$uid = Session::get('mid');
		if(empty($uid)){
			$this->redirect('login/uin');
		}
		$this->assign('userid',$uid);
		$this->assign('username',Session::get('mname'));
		$this->assign('userid',Session::get('mtype'));
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
	 *刊物管理
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function publist(){
		return $this->fetch();
	}

	/**
	 *文章管理
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function article(){
		return $this->fetch();
	}

	/**
	 *来源列表
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function datalist(){
		return $this->fetch();
	}

	/**
	 *添加来源
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function dataadd(){
		return $this->fetch();
	}

	/**
	 *用户列表
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function userlist(){
		return $this->fetch();
	}

	/**
	 *用户添加
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function useradd(){
		return $this->fetch();
	}


}
