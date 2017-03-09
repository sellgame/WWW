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

class special extends \think\Controller
{
	/**
	 *slist 获取专题列表
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
				$res = Db::connect('userdb_config')->name('special')->order('id DESC')->limit(($cpage-1)*$pagesize,$pagesize)->select();
			}
			else{
				$counts = Db::connect('userdb_config')->name('special')->where('uid='.$uid)->count();
				$res = Db::connect('userdb_config')->name('special')->where('uid='.$uid)->order('id DESC')->limit(($cpage-1)*$pagesize,$pagesize)->select();
			}
			$data['res'] = $res;
			if($counts<$pagesize){
				$data['tpage'] = 1;
			}else{
				$data['tpage'] = ceil($counts/$pagesize);	
			}
			return $data;
		}
		return 'false';
	}

	/**
	 *getspecial 获取专题信息
	 * @param uid 用户id
	 * @param sid 专题id
	 * @return 
	 * @throws 
	*/
	public function getspecial(){
		if(Request::instance()->isAjax()){
			$arr = input('');
			$res = Db::connect('userdb_config')->name('special')->where('uid='.$arr['uid'].' and id='.$arr['sid'])->find();
			return $res;
		}
	}

	/**
	 *getparam 获取专题属性信息
	 * @param uid 用户id
	 * @param sid 专题id
	 * @return 
	 * @throws 
	*/
	public function getparam(){
		if(Request::instance()->isAjax()){
			$arr = input('');
			if($arr['uid']==Session::get('uid')){
				if($arr['sid']!=''){
					$res = Db::connect('userdb_config')->name('special')->field('sname')->where('uid='.$arr['uid'].' and id='.$arr['sid'])->find();
					$data['titles']=$res['sname'];
					$data['res'] = Db::connect('userdb_config')->name('skeyword')->where('uid='.$arr['uid'].' and sid='.$arr['sid'])->select();
					return $data;
				}
			}
		}
		return 'false';
	}
	
	/**
	 *sadd 添加专题
	 * @param uid 用户id
	 * @param stitle 专题名称
	 * @param snote 专题说明
	 * @return 
	 * @throws 
	*/
	public function sadd(){
		if(Request::instance()->isAjax()){
			$arr = input('');

			if($arr['uid']!='' && $arr['stitle']!='' && $arr['snote']!='' && $arr['share']!=''){
				$counts = Db::connect('userdb_config')->name('special')->where('uid='.$arr['uid'].' and sname=\''.mysql_escape_string($arr['stitle']).'\'')->count();
				if($counts===0){
					$data = ['uid'=>$arr['uid'], 'uip'=>getip(1), 'creat_time'=>time(), 'sname'=>$arr['stitle'], 'snote'=>$arr['snote'], 'share'=>$arr['share']];
					$res = Db::connect('userdb_config')->name('special')->insertGetId($data);
					if($res){
						return $res;
					} 
				}
			}	
		}
		return 'false';
	}

	/**
	 *sedit 编辑专题
	 * @param uid 用户id
	 * @param stitle 专题名称
	 * @param snote 专题说明
	 * @return 
	 * @throws 
	*/
	public function sedit(){
		if(Request::instance()->isAjax()){
			$arr = input('');
			if($arr['uid']!='' && $arr['sid']!='' && $arr['stitle']!='' && $arr['snote']!='' && $arr['share']!=''){
				if($arr['uid']==Session::get('uid')){
					$re = Db::connect('userdb_config')->name('special')->where('uid='.$arr['uid'].' and sname=\''.mysql_escape_string($arr['stitle']).'\'')->find();
					if(!$re || $re['id']==$arr['sid']){
						$data = ['sname'=>$arr['stitle'], 'snote'=>$arr['snote'], 'share'=>$arr['share']];
						$res = Db::connect('userdb_config')->name('special')->where('uid='.$arr['uid'].' and id='.$arr['sid'])->update($data);
						if($res){
							$data = ['a'=>'success', 'b'=>time()];
							return $data;
						}
					}
				}
			}
		}
		return 'false';
	}

	/**
	 *sdel 删除专题
	 * @param uid 用户id
	 * @param sid 专题id
	 * @return 
	 * @throws 
	*/
	public function sdel(){
		if(Request::instance()->isAjax()){
			$arr = input('');
			if($arr['uid']!='' && $arr['sid']!=''){
				if($arr['uid']==Session::get('uid')){
					$res_a = Db::connect('userdb_config')->name('skeyword')->where('uid='.$arr['uid'].' and sid='.$arr['sid'])->delete();
					$res_b = Db::connect('userdb_config')->name('special')->where('uid='.$arr['uid'].' and id='.$arr['sid'])->delete();
					return 'success';
				}
			}	
		}
		return 'false';
	}	

	/**
	 *addparam 添加关键词
	 * @param uid 用户id
	 * @param sid 专题id
	 * @param keys 关键词
	 * @return 
	 * @throws 
	*/
	public function addparam(){
		if(Request::instance()->isAjax()){
			$arr = input('');
			if($arr['uid']==Session::get('uid')){
				if($arr['sid']!='' && $arr['keys']!=''){
					$counts = Db::connect('userdb_config')->name('skeyword')->where('sid='.$arr['sid'].' and keywords=\''.$arr['keys'].'\'')->count();
					if($counts===0){
						$data = ['sid'=>$arr['sid'],'uid'=>$arr['uid'],'keywords'=>$arr['keys']];
						$res = Db::connect('userdb_config')->name('skeyword')->insert($data);
						if($res){
							return 'success';
						}
					}
				}
			}
		}
		return 'false';
	}

	/**
	 *editparam 编辑关键词
	 * @param uid 用户id
	 * @param sid 专题id
	 * @param keys 关键词
	 * @return 
	 * @throws 
	*/
	public function editparam(){
		if(Request::instance()->isAjax()){
			$arr = input('');
			if($arr['uid']==Session::get('uid')){
				if($arr['pid']!='' && $arr['keys']!=''){
					$data = ['keywords'=>$arr['keys']];
					$res = Db::connect('userdb_config')->name('skeyword')->where('uid='.$arr['uid'].' and id='.$arr['pid'])->update($data);
					if($res) return 'success';
				}
			}
		}	
		return 'false';
	}

	/**
	 *delparam 批量删除关键词
	 * @param uid 用户id
	 * @param pid 关键词id（多id用英文,号分隔）
	 * @return 
	 * @throws 
	*/
	public function delparam(){
		if(Request::instance()->isAjax()){
			$arr = input('');
			if($arr['uid']==Session::get('uid')){
				if($arr['pid']!=''){
					$res = Db::connect('userdb_config')->name('skeyword')->where('uid='.$arr['uid'].' and id IN('.$arr['pid'].')')->delete();
					if($res) return 'success';
				}
			}
		}
		return 'false';
	}


	/**
	 *alist 专题文章列表
	 * @param uid 用户id
	 * @param sid 专题id
	 * @return 
	 * @throws 
	*/
	public function alist(){
		if(Request::instance()->isAjax()){
			debug('begin');
			$arr = input('');
			if($arr['uid']==Session::get('uid') && $arr['sid']!=''){
				$chk = Db::connect('userdb_config')->name('special')->where('id='.$arr['sid'])->find();
				if($chk['share']==1 || $chk['uid']==$arr['uid']){
					$pagesize = config('pagesize');
					$bpage = 5000/$pagesize;
					$cpage = $arr['cpage'];
					$cpage = empty($cpage)?1:$cpage;
					$cpage = $cpage>$bpage?$bpage:$cpage;
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

					$qstr = '';
					$qissn = array();
					$qisbn = array();
					$param = Db::connect('userdb_config')->name('skeyword')->where('sid='.$arr['sid'])->select();
					foreach ($param as $key => $value) {
						$parr = explode(';', $value['keywords']);
						foreach ($parr as $id => $val) {
							$strtem = trim($val);
							if(stripos($strtem, 'ISBN:')===0){
								array_push($qisbn,ltrim($strtem,'ISBN:'));
							} elseif(stripos($strtem, 'ISSN:')===0){
								array_push($qissn,ltrim($strtem,'ISSN:'));
							} else {
								$qstr = $qstr.'"'.$strtem.'" | ';
							}
						}
						unset($parr);
					}
					if(count($qissn)>0) $search->SetFilter('issn', $qissn);
					if(count($qisbn)>0) $search->SetFilter('isbn', $qisbn);
					$search->AddQuery($qstr, config('myindex'));
					//$result = $search->RunQueries();	
					debug('end');
					return $search;
				}
			}
			debug('end');
		}
		return 'false';
	}
}