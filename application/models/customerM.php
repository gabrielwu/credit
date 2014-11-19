<?php
class CustomerM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function queryConditionSql($condition) {
	    $sql  = "select c.*, u.name as operator_name, ciw.code as investWayCode, ciw.name as investWayName, ciw.rate as investWayRate, ciw.months as investWayMonths ";
	    $sql .= "from customer c, a_user u, customer_invest_way ciw ";
	    $sql .= "where u.id=c.operator and ciw.id=c.invest_way ";
		$sql .= $condition['name']      == "" ? "" : "and c.name      like '%".$condition['name']."%' ";
		$sql .= $condition['number']    == "" ? "" : "and c.number    like '%".$condition['number']."%' ";
		$sql .= $condition['status']    == "" ? "" : "and c.status    like '%".$condition['status']."%' ";
		$sql .= $condition['email']     == "" ? "" : "and c.email     like '%".$condition['email']."%' ";
		$sql .= $condition['mobile']    == "" ? "" : "and c.mobile    like '%".$condition['mobile']."%' ";
		$sql .= $condition['birthday']  == "" ? "" : "and c.birthday  like '%".$condition['birthday']."%' ";
		$sql .= $condition['idcard']    == "" ? "" : "and c.idcard    like '%".$condition['idcard']."%' ";
		$sql .= $condition['phone']     == "" ? "" : "and c.phone     like '%".$condition['phone']."%' ";
		$sql .= $condition['fax']       == "" ? "" : "and c.fax       like '%".$condition['fax']."%' ";
		$sql .= $condition['homepage']  == "" ? "" : "and c.homepage  like '%".$condition['homepage']."%' ";
		$sql .= $condition['bill_addr'] == "" ? "" : "and c.bill_addr like '%".$condition['bill_addr']."%' ";
		$sql .= $condition['bill_post'] == "" ? "" : "and c.bill_post like '%".$condition['bill_post']."%' ";
		$sql .= $condition['intention'] == "" ? "" : "and c.intention like '%".$condition['intention']."%' ";
		$sql .= $condition['acnt_sta']  == "" ? "" : "and c.acnt_sta  like '%".$condition['acnt_sta']."%' ";
		$sql .= $condition['acnt_date'] == "" ? "" : "and c.acnt_date like '%".$condition['acnt_date']."%' ";
		$sql .= $condition['edu']       == "" ? "" : "and c.edu       like '%".$condition['edu']."%' ";
		$sql .= $condition['sex']       == "" ? "" : "and c.sex            ='".$condition['sex']."' ";
		$sql .= $condition['position']  == "" ? "" : "and c.position  like '%".$condition['position']."%' ";
		$sql .= $condition['company']   == "" ? "" : "and c.company   like '%".$condition['company']."%' ";
		$sql .= $condition['CRM']       == "" ? "" : "and c.CRM       like '%".$condition['CRM']."%' ";
		$sql .= $condition['cus_dev']   == "" ? "" : "and c.cus_dev   like '%".$condition['cus_dev']."%' ";
		$sql .= $condition['CAD']       == "" ? "" : "and c.CAD       like '%".$condition['CAD']."%' ";
		$sql .= $condition['crte_time'] == "" ? "" : "and c.crte_time like '%".$condition['crte_time']."%' ";
		$sql .= $condition['operator']  == "" ? "" : "and c.operator  like '%".$condition['operator']."%' ";
		$sql .= $condition['source']    == "" ? "" : "and c.source    like '%".$condition['source']."%' ";
		$sql .= $condition['pay_mode']  == "" ? "" : "and c.pay_mode  like '%".$condition['pay_mode']."%' ";
		$sql .= $condition['comment']   == "" ? "" : "and c.comment   like '%".$condition['comment']."%' ";
		return $sql;
    }
    function indexQuery($condition, $isAll = true, $userid = 0) {
		$sql = $this->queryConditionSql($condition);
        $sql .= $isAll ? "" : "and c.operator=$userid ";
        $data = $this->querySql($sql);
        //echo $sql;
		return $data;
	}
    function indexQueryCreditRight($condition) {
		$sql = $this->queryConditionSql($condition);
		$sql .= "and c.status='已投资'";
        $data = $this->querySql($sql);
        foreach ($data as &$item) {
        	$customer_id = $item['id'];
        	$sql1 = "select if(isnull(SUM(match_amount)),0,SUM(match_amount)) as matchedAmount from credit_right where customer_id=$customer_id ";
        	$data1 = $this->queryOneSql($sql1);
        	$item['customer_can_match'] = $item['amount'] - $data1['matchedAmount'];
        }
		return $data;
	}
    function getOne($id) {
	    $sql  = "select c.*, u.name as operator_name, ciw.code as investWayCode, ciw.name as investWayName, ciw.rate as investWayRate, ciw.months as investWayMonths ";
	    $sql .= "from customer c, a_user u, customer_invest_way ciw ";
	    $sql .= "where u.id=c.operator and ciw.id=c.invest_way and c.id=$id";
        $data = $this->queryOneSql($sql);
		return $data;
	}
	function insert($customer) {
        return $this->insertOne('customer', $customer);
	}
	function update($id, $customer) {
        return $this->updateOne('customer', $customer, $id);
	}
}
?>