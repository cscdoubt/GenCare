<?php

class ImportAction extends ServerAction{
	
	public function _initialize(){
		header("Content-Type:text/html; charset=UTF-8");	
		$this->user = $_SESSION['user'];
		$this->selected_menu = 'c2';
	}

	//导入管理
	public function index(){
	
		$this->doAuth();
		
		$this->display(); 

	}
	
	public function ImportData(){
	
		$this->doAuth();
		
		$filename = $_FILES['file']['tmp_name'];     
		if (empty ($filename)) {         
			echo "<script>alert('请选择要导入的CSV文件！');history.go(-1);</script>";			
			exit;     
		}     
		
		$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $Model->query('select max(settling_date) as settling_date from medicare_charge where hosp_id = '.$_SESSION['user']['hosp_id']);
		$temp = $result[0]['settling_date'];

		if($result){
			$settling_date_latest = strtotime($result[0]['settling_date']);
		}else{
			$settling_date_latest = 0;
		}
		
		$handle = fopen($filename, 'r');  
		$count = 0;
		$n = 0;     
		$success_count = 0;
		$out = array ();
		while ($data = fgetcsv($handle, 10000)) {         
			$num = count($data);         
			for ($i = 0; $i < $num; $i++) {             
				$out[$n][$i] = $data[$i];         
			}         
			$n++;    
			$count ++;	
			
			if($n == 2000){
				$res = $this->ImportToDatabase($out,$settling_date_latest);
				if($res == -1){
					echo "<script>alert('导入失败！');history.go(-1);</script>";		
					exit;
				}
				
				$success_count += $res;
				$n = 0;
				$out = array();
			}
		}     
		if($n){
			$res = $this->ImportToDatabase($out,$settling_date_latest);
			if($res == -1){
				echo "<script>alert('导入失败！');history.go(-1);</script>";		
				exit;
			}
				
			$success_count += $res;
			$n = 0;
			$out = array();
		}
		
		//修改最新日期
		$result = $Model->query('select max(discharge_date_time) as discharge_date_time from medicare_charge where hosp_id = '.$_SESSION['user']['hosp_id']);
		$latest_date = $result[0]['discharge_date_time'];
		$result = $Model->query('select min(discharge_date_time) as discharge_date_time from medicare_charge where hosp_id = '.$_SESSION['user']['hosp_id']);
		$earliest_date = $result[0]['discharge_date_time'];
		M('hosp_info')->where(array('hosp_id' => $_SESSION['user']['hosp_id']))->save(array('latest_date' => $latest_date,'earliest_date' => $earliest_date));
		
		echo "<script>alert('导入成功".$success_count."条记录！');history.go(-1);</script>";		
	}
		
	public function ImportToDatabase($result,$settling_date_latest){
		
		$len_result = count($result);   
		$count = 0;
		for ($i = 0; $i < $len_result; $i++) { //循环获取各字段值       

			//判断时间是否重合
			if(strtotime($result[$i][27]) <= $settling_date_latest){
				continue;
			}
			
			$patient_id = $result[$i][0]; 
			$visit_id = $result[$i][1]; 
			$inp_no = $result[$i][2]; 
			$name = iconv('gb2312', 'utf-8', $result[$i][3]); //中文转码
			$id_no = iconv('gb2312', 'utf-8', $result[$i][4]); //中文转码
			$admission_date_time = $result[$i][5]; 
			$discharge_date_time = $result[$i][6]; 
			$identity = iconv('gb2312', 'utf-8', $result[$i][7]); //中文转码
			$charge_type = iconv('gb2312', 'utf-8', $result[$i][8]); //中文转码
			$rcpt_no = $result[$i][9]; 
			$charges = $result[$i][10]; 
			$compute = $result[$i][11]; 
			$cailf = $result[$i][12]; 
			$chuangwf = $result[$i][13]; 
			$fangsf = $result[$i][14]; 
			$hulf = $result[$i][15]; 
			$huayf = $result[$i][16]; 
			$huosf = $result[$i][17]; 
			$jiancf = $result[$i][18]; 
			$qit = $result[$i][19]; 
			$shousf = $result[$i][20]; 
			$xiyf = $result[$i][21]; 
			$xuef = $result[$i][22];          
			$zhencf = $result[$i][23]; 
			$zhilf = $result[$i][24]; 
			$zhongcy = $result[$i][25]; 
			$zhongchyao = $result[$i][26]; 
			$settling_date = $result[$i][27]; 
			$hosp_id = $_SESSION['user']['hosp_id']; 
			
			$data_values .= "('$patient_id','$visit_id','$inp_no','$name','$id_no','$admission_date_time','$discharge_date_time','$identity','$charge_type','$rcpt_no','$charges','$compute','$cailf','$chuangwf','$fangsf','$hulf','$huayf','$huosf','$jiancf','$qit','$shousf','$xiyf','$xuef','$zhencf','$zhilf','$zhongcy','$zhongchyao','$settling_date',$hosp_id),"; 
			$count ++;
		}     
		if(!$data_values){
			return 0;
		}
		$data_values = substr($data_values,0,-1); //去掉最后一个逗号   		

		$Model = new Model(); 
		$query = $Model->execute("insert into medicare_charge (patient_id,visit_id,inp_no,name,id_no,admission_date_time,discharge_date_time,identity,charge_type,rcpt_no,charges,compute,cailf,chuangwf,fangsf,hulf,huayf,huosf,jiancf,qit,shousf,xiyf,xuef,zhencf,zhilf,zhongcy,zhongchyao,settling_date,hosp_id) values ".$data_values);//批量插入数据表中     
		if($query){        
			return $count;
		}else{         
			return -1;
		} 

	}

}