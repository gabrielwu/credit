<?php
class CreditRightM extends MY_Model {
    protected $table; 
    function __construct() {
        $this->table = 'credit_right';
        parent::__construct();
    }
    function getList($all = false) {
        $sql = "select * from $this->table ";
        return $this->querySql($sql);
    }  
    function get($id) {
        $sql  = "select * from $this->table where id=$id ";
        return $this->queryOneSql($sql);
    }
    function getByBorrow($borrow_id) {
        $sql  = "select cr.*, c.name as customer_name, b.name as borrow_name ";
        $sql .= "from $this->table cr, customer c, borrow b ";
        $sql .= "where b.id=$borrow_id and c.id=cr.customer_id and b.id=cr.borrow_id";
        return $this->querySql($sql);
    }
    function getByCustomer($customer_id) {
        $sql  = "select cr.*, c.name as customer_name, b.name as borrow_name ";
        $sql .= "from $this->table cr, customer c, borrow b ";
        $sql .= "where c.id=$customer_id and c.id=cr.customer_id and b.id=cr.borrow_id";
        return $this->querySql($sql);
    }
    function update($id, $bank) {
        return $this->updateOne($this->table, $bank, $id);
    }
    function insert($bank) {
        return $this->insertOne($this->table, $bank);
    }
    function delete($id) {
        $sql = "delete from $this->table where id=$id";
        return $this->updateSql($sql);
    }
    function matchedAmount($borrow_id) {
        $sql = "select if(isnull(SUM(match_amount)),0,SUM(match_amount)) as matchedAmount from $this->table where borrow_id=$borrow_id ";
        $data = $this->queryOneSql($sql);
        //echo $data['matchedAmount'];
        return $data['matchedAmount'];
    }
}
?>