<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
use think\Cache;
use think\Session;

/**
 * @author sellgame <eisc@163.com>
 * 
 */

class Login extends \think\Controller
{
	public function _initialize()
    { 
		$this->assign('userid',Session::get('mid'));
		$this->assign('username',Session::get('mname'));
		$this->assign('userid',Session::get('mtype'));
    }


	/**
	 *用户登录页
	 * @param uname 用户名	pass 密码
	 * @return 
	 * @throws 
	*/
	public function uin()
    {
		if(Request::instance()->isPost()){
			$arr = input('');
			if(empty($arr['uname']) or empty($arr['pass'])){
				$this->error('登陆失败，请重试');
			} else {
				$res = Db::connect('userdb_config')->name('manage')->where('uname',$arr['uname'])->find();
				if(!empty($res)){
					if($res['upass']==md5($arr['pass'])){
						//$data = ['uid' => $res['id'], 'uip' => getip(1), 'utime'=>time()];
						//Db::connect('userdb_config')->name('login_log')->insert($data);
						Session::set('mid',$res['id']);
						Session::set('mname',$res['uname']);
						Session::set('mtype',$res['types']);
						$this->success('登录成功，正在跳转...',Url('index/index'));
					} else {
						$this->error('密码错误，登陆失败，请重试');
					}
				} else {
					$this->error('账号不存在，登陆失败，请重试');
				}
			}
		} else {
			return $this->fetch();
		}
    }


	/**
	 *用户退出
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function uout(){
		if(Request::instance()->isGet()){
			//$data = ['uid' => Session::get('uid'), 'uip' => getip(1), 'utime'=>time()];
			//Db::connect('userdb_config')->name('login_log')->insert($data);
			Session::clear();
			$this->success('您已退出登陆，正在跳转...',Url('index/index'));
		}
	}


	/**
	 *用户注册页
	 * @param 
	 * @return 
	 * @throws 
	*/
	public function add()
    {
		if(Request::instance()->isPost()){
			$arr = input('');
			if(empty($arr['uname']) or empty($arr['pass'])){
				$this->error('请填写完整信息，注册失败');
			} else {
				if($arr['pass']==$arr['repass']){
					$res = Db::connect('userdb_config')->name('member')->where('username',$arr['uname'])->find();
					if(!empty($res)){
						$this->error('用户已存在，注册失败');
					} else {
						$data = ['username' => $arr['uname'], 'password' => md5($arr['pass']), 'create_at'=>time(), 'login_ip'=>getip(1)];
						$uid = Db::connect('userdb_config')->name('member')->insertGetId($data);
						if(!empty($uid)){
							Session::set('mid',$uid);
							Session::set('mname',$arr['uname']);
							Session::set('mtype',1);
							$this->success('注册成功，正在跳转...',Url('index/index'));
						} else {
							$this->error('注册失败，请重试');
						}
					}
				} else {
					$this->error('两次输入密码不一致，注册失败，请重试');
				}
			}
		} else {
			return $this->fetch();
		}
    }
}
