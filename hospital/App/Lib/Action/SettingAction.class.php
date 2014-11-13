<?php

class SettingAction extends ServerAction{

	public function _initialize(){
		header("Content-Type:text/html; charset=UTF-8");	
		$this->user = $_SESSION['user'];
		$this->selected_menu = 'c6';
	}

	public function index(){
	
		$this->doAuth();

		$this->display();
	}

	public function reset(){

		$this->doAuth();

		if($this->_param('user_passwd') && $this->_param('password') && $this->_param('password_again')){
			
			if($this->_param('password') != $this->_param('password_again')){
				echo "<script>alert('两次密码输入不一致');history.go(-1);</script>";
				return;
			}
			
			$condition['user_id'] = $_SESSION['user']['user_id'];
			$condition['user_passwd'] = md5($this->_param('user_passwd'));
			
			$result = M('admin')->where($condition)->find();
			if($result == null){
				echo "<script>alert('密码错误');history.go(-1);</script>";
				return;
			}
			
			$result = M('admin')->where($condition)->save(array('user_passwd' => md5($this->_param('password'))));
			
			if($result){
				echo "<script>alert('修改成功');history.go(-1);</script>";
				return;
			}else{
				echo "<script>alert('修改失败');history.go(-1);</script>";
				return;
			}

		}

		$this->display();
	}
	
	//待修改
	public function reset1(){

		$this->doAuth();

		$timestamp = $this->_param('username');
		$signature = $this->_param('signature');
		
		$curTime = time();
		if($curTime - $timestamp > 60 || $curTime - $timestamp < -60){//登陆超时
			return -2;
		}
		return 1;
		$result = md5($_SESSION['user']['user_passwd'].$timestamp);
		if($result == $signature){//密码正确
		
			$condition['user_id'] = $_SESSION['user']['user_id'];
			$condition['user_passwd'] = $this->_param('password');
			$result = M('admin')->where($condition)->save(array('user_passwd' => $this->_param('password')));
			
			if($result){
				return 1;
			}else{
				return -3;
			}
			
		}else{//密码错误
			return -1;
		}

	}

	

}