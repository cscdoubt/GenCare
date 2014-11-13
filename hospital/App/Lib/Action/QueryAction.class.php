<?php

class QueryAction extends ServerAction{

	public function _initialize(){
		header("Content-Type:text/html; charset=UTF-8");	
		$this->user = $_SESSION['user'];
		$this->selected_menu = 'c3';
	}

	//医保查询
	public function index(){
	
		$this->doAuth();

		$condition['hosp_id']  = array('eq',$_SESSION['user']['hosp_id']);
		$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = M('hosp_info')->where(array('hosp_id' => $_SESSION['user']['hosp_id']))->find();
		$this->earliest_date = $result['earliest_date'];
		$this->latest_date = $result['latest_date'];

		if($this->_param('patient_id') || $this->_param('id_no') || $this->_param('admission_date_time') || $this->_param('discharge_date_time')){
			if($this->_param('patient_id')){
				$condition['patient_id']  = array('eq',$this->_param('patient_id'));
			}
			if($this->_param('id_no')){
				$condition['id_no']  = array('eq',$this->_param('id_no'));
			}
			if($this->_param('admission_date_time')){
				$condition['admission_date_time'] = array('egt',$this->_param('admission_date_time'));
			}
			if($this->_param('discharge_date_time')){
				$condition['discharge_date_time'] = array('elt',$this->_param('discharge_date_time'));
			}
			
			$chargeList = M('medicare_charge')->where($condition)->order('admission_date_time DESC')->select();
			$this->chargeList = $chargeList;
			if($chargeList == null){
				$this->warn = "无此记录请核实查询条件";
			}
			
			$this->patient_id = $this->_param('patient_id');
			$this->id_no = $this->_param('id_no');
			$this->admission_date_time = $this->_param('admission_date_time');
			$this->discharge_date_time = $this->_param('discharge_date_time');
		}

		$this->hospitalCurrent = $hospital;
		$this->display();
	}

}