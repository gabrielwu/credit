<?php
class BorrowCustomerM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getListByBorrow($borrow_id) {
        $sql = "select * from borrow_customer where borrow_id=$borrow_id";
        return $this->querySql($sql);
    }
    function getListByCustomer($customer_id) {
        $sql = "select * from borrow_customer where customer_id=$customer_id";
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from borrow_customer where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $borrowCustomer) {
        return $this->updateOne('borrow_customer', $borrowCustomer, $id);
    }
    function insert($borrowCustomer) {
        return $this->insertOne('borrow_customer', $borrowCustomer);
    }
    function delete($id) {
        $sql = "delete from borrow_customer where id=$id";
        return $this->updateSql($sql);
    }
}
?>