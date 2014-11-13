<?php

class IndexAction extends ServerAction{

	public function _initialize(){
		header("Content-Type:text/html; charset=UTF-8");	
		$this->user = $_SESSION['user'];
		$this->selected_menu = 'c1';
	}

	public function index(){
		if($_SESSION['user'] && $_SESSION['user']['user_type'] == 2){
			$this->redirect('Import/index');
		}
		
		$this->display();

	}
	
	public function login(){

		$result = $this->checkPassword($this->_param('username'),$this->_param('timestamp'),$this->_param('signature'));
		echo $result;

	}
	
	public function checkPassword($username,$timestamp,$signature){

		$curTime = time();
		if($curTime - $timestamp > 60 || $curTime - $timestamp < -60){//登陆超时
			return -2;
		}
		
		$TheObj	= M("admin");
		$condition['user_name'] = $username;
		$user = $TheObj->where($condition)->find();
		if(!$user){
			return -1;
		}
		
		$result = md5($user['user_passwd'].$timestamp);
		if($result == $signature){//密码正确
		
			//记录登陆信息
			$log_data['user_name'] = $user['user_name'];
			$log_data['type'] = '1';	//1代表登陆记录
			$log_data['IP'] = $_SERVER["REMOTE_ADDR"];
			M('log')->add($log_data);
			
			//记录用户信息
			$user['sid'] = session_id();
			$_SESSION['user'] = $user;
			$this->user = $_SESSION['user'];	
				
			return 0;
			
		}else{//密码错误
			return -1;
		}

	}
	
	public function logout(){

		$_SESSION['user'] = "";
		$this->user = $_SESSION['user'];	
		$this->redirect('Index/index'); 	

	}
	
	public function about(){

		$this->display(); 	

	}
	
	public function contact(){

		$this->display(); 	

	}

}