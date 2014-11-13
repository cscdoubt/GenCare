<?php

// 所有action的基类

class ServerAction extends Action 
{    

	/**
	 * 
	 */
	public function render ($code, $message, $result = '')
	{
		// print json code
		echo json_encode(array(
			'code'		=> $code,
			'message'	=> $message,
			'result'	=> $result
		));
		exit;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// protected method
	
	/**
	 * @doAuthRemote
	 */
	public function doAuthRemote ($hosp_id,$timestamp,$signature)
	{
		$curTime = time();
		if($curTime - $timestamp > 60 || $curTime - $timestamp < -60){//登陆超时
			$this->render(-1,"超时");
		}
		
		$TheObj	= M("hosp_info");
		$condition['hosp_id'] = $hosp_id;
		$user = $TheObj->where($condition)->find();
		if(!$user){
			$this->render(-1,"医院不存在");
		}
		
		$result = sha1($hosp_id.$timestamp.$user['token']);
		if($result != $signature){//验证错误
			$t['hosp_id'] = $hosp_id;
			$t['timestamp'] = $timestamp;
			$t['token'] = $user['token'];
			$t['sig'] = $result;
			
			$this->render(-1,"用户验证错误",$t);
		}
	}
	
	public function doAuth ()
	{
		if (!isset($_SESSION['user']) || $_SESSION['user']=="" || $_SESSION['user']['user_type'] != 2) {
			$this->redirect('Index/index');
		}
	}

}

?>