<?php
class DictionaryM extends MY_Model {

    function __construct() {
        parent::__construct();
    }
    function getListCommon($type, $all) {
        $sql  = "select * from dictionary where type='$type' ";
        $sql .= ($all) ? "" : "and status=0 ";
        $sql .= "order by status asc ";
        return $this->querySql($sql);
    }
    function getList($type = "") {
    	$sql = "select * from dictionary where status='0'";
    	$sql .= $type == "" ? "" : " and type='$type'";
    	$data = $this->querySql($sql);
		return $data;
    }
    function getCustomerStatusList() {
    	$sql = "select * from dictionary where type='customer_status' and status='0'";
    	$data = $this->querySql($sql);
		return $data;
    }
    function getAccountStatusList() {
    	$sql = "select * from dictionary where type='acnt_sta' and status='0'";
    	$data = $this->querySql($sql);
		return $data;
    }
    function insert($item) {
        return $this->insertOne('dictionary', $item);
    }
    function getBorrowStatusList($all = false) {
        return $this->getListCommon('borrow_status', $all);
    }
    function getBorrowIntentionList($all = false) {
        return $this->getListCommon('borrow_intention', $all);
    }
    function getBorrowSignAddressList($all = false) {
        return $this->getListCommon('borrow_sign_address', $all);
    }
    function getBorrowSourceList($all = false) {
        return $this->getListCommon('borrow_source', $all);
    }
    function getBorrowCreditLevelList($all = false) {
        return $this->getListCommon('borrow_credit_level', $all);
    }
    function getBorrowAccountStatusList($all = false) {
        return $this->getListCommon('borrow_account_status', $all);
    }
    function getTypeList() {
        $sql = "select distinct type from dictionary";
        return $this->querySql($sql);
    }
}
?>