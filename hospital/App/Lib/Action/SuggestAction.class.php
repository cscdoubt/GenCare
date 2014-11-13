<?php

class SuggestAction extends ServerAction{

	public function _initialize(){
		header("Content-Type:text/html; charset=UTF-8");	
		$this->user = $_SESSION['user'];
		$this->selected_menu = 'c5';
	}

	public function index(){

		$this->display();
	}
	
	public function submit(){

		if($_POST['suggest_content']){
			$hospital = M('hosp_info')->where(array('hosp_id' => $_SESSION['user']['hosp_id']))->find();
			$url = $hospital['remote_url'];
			$data['hosp_id'] = $hospital['hosp_id'];
			$data['timestamp'] = time();	//此处必须转换为数组中，才能进行signature的拼接
			$data['signature'] = sha1($hospital['hosp_id'].$data['timestamp'].$hospital['token']);
			$data['type'] = 3;
			$data['mail'] = $_POST['mail'];
			$data['suggest_content'] = $_POST['suggest_content'];
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$output = curl_exec($ch);
			curl_close($ch);
			$output = json_decode($output,true);
			
			if($output['code'] == 1){
				echo "<script>alert('谢谢您的反馈');history.go(-1);</script>";
			}else{
				echo "<script>alert('反馈失败');history.go(-1);</script>";
			}
		}else{
			echo "<script>alert('请输入反馈内容');history.go(-1);</script>";
		}
		
		
	}


}