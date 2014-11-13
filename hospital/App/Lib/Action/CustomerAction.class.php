<?php

class CustomerAction extends ServerAction{

	public function _initialize(){
		header("Content-Type:text/html; charset=UTF-8");	
		$this->user = $_SESSION['user'];
		$this->selected_menu = 'c4';
	}

	//用户管理
	public function index(){
	
		$this->doAuth();
		
		if($_POST['user_name']!= ""){
			$condition['user_name'] = $_POST['user_name'];
		}
		if($_POST['user_org']!= ""){
			$condition['user_org'] = $_POST['user_org'];
		}
		
		$hospital = M('hosp_info')->where(array('hosp_id' => $_SESSION['user']['hosp_id']))->find();
		$url = $hospital['remote_url'];
		$data['hosp_id'] = $hospital['hosp_id'];
		$data['timestamp'] = time();	//此处必须转换为数组中，才能进行signature的拼接
		$data['signature'] = sha1($hospital['hosp_id'].$data['timestamp'].$hospital['token']);
		$data['type'] = 4;
		$data['page'] = 1;
		if($_POST['page']){
			$data['page'] = $_POST['page'];
		}
		$data['user_name'] = $_POST['user_name'];
		$data['user_org'] = $_POST['user_org'];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		curl_close($ch);
		$output = json_decode($output,true);
		
		$this->user_name = $_POST['user_name'];
		$this->user_org = $_POST['user_org'];
		$this->count = $output['message'];
		
		$this->display(); 
	}
	
	public function customerList(){
	
		$this->doAuth();
		
		$hospital = M('hosp_info')->where(array('hosp_id' => $_SESSION['user']['hosp_id']))->find();
		$url = $hospital['remote_url'];
		$data['hosp_id'] = $hospital['hosp_id'];
		$data['timestamp'] = time();	//此处必须转换为数组中，才能进行signature的拼接
		$data['signature'] = sha1($hospital['hosp_id'].$data['timestamp'].$hospital['token']);
		$data['type'] = 2;
		$data['page'] = 1;
		if($_POST['page']){
			$data['page'] = $_POST['page'];
		}
		$data['user_name'] = $_POST['user_name'];
		$data['user_org'] = $_POST['user_org'];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		curl_close($ch);
		echo $output;
	
	}

	public function AddCustomer(){
	
		$this->doAuth();

		if($_POST['user_name'] && $_POST['user_passwd']){
			$hospital = M('hosp_info')->where(array('hosp_id' => $_SESSION['user']['hosp_id']))->find();
			$url = $hospital['remote_url'];
			$data['hosp_id'] = $hospital['hosp_id'];
			$data['timestamp'] = time();	//此处必须转换为数组中，才能进行signature的拼接
			$data['signature'] = sha1($hospital['hosp_id'].$data['timestamp'].$hospital['token']);
			$data['type'] = 1;
			$data['user_name'] = $_POST['user_name'];
			$data['user_passwd'] = md5($_POST['user_passwd']);
			$data['user_org'] = $_POST['user_org'];
			$data['office_phone'] = $_POST['office_phone'];
			$data['user_duty'] = $_POST['user_duty'];
			$data['memo'] = $_POST['memo'];
			$data['creator'] = $hospital['hosp_name'];
			$data['create_date'] = date("Y-m-d",time());
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$output = curl_exec($ch);
			curl_close($ch);
			$output = json_decode($output,true);
			
			if($output['code'] == 1){
				echo "<script>alert('提交成功');history.go(-1);</script>";
			}else{
				echo "<script>alert('提交失败');history.go(-1);</script>";
			}
		}else{
			echo "<script>alert('请输入内容');history.go(-1);</script>";
		}
			
	}
	
}