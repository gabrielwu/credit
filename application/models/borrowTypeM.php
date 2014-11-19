<?php
class BorrowTypeM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList($all = false) {
        $sql  = "select t1.id, t1.months, t1.rate, t2.code, t2.name ";
        $sql .= "from borrow_type t1, borrow_type t2 ";
        $sql .= "where t1.level=2 and t1.parent=t2.id ";
        $sql .= $all ? "" : "and t1.status=0 and t2.status=0";
        return $this->querySql($sql);
    }
    function getMonthsList($all = false) {
        $sql =  "select distinct(months) from borrow_type where level=2 ";
        $sql .= $all ? "" : "and status=0 ";
        $sql .= "order by months asc ";
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from borrow_type where id=$id ";
        return $this->queryOneSql($sql);
    }
    function getLevel1List($all = false) {
        $sql  = "select * from borrow_type where level=1 ";
        $sql .= $all ? "" : "and status=0 ";
        return $this->querySql($sql);
    }
    function getLevel2List($all = false, $parent = 0) {
        $sql  = "select t1.*, t2.name as level1Name, t2.code as level1Code ";
        $sql .= "from borrow_type t1, borrow_type t2 where t1.level=2 and t2.id=t1.parent ";
        $sql .= $all ? "" : "and t1.status=0 ";
        $sql .= ($parent == 0) ? "" : "and t2.id=$parent ";
        return $this->querySql($sql);
    }
    function update($id, $borrow_type) {
        return $this->updateOne('borrow_type', $borrow_type, $id);
    }
    function insert($borrow_type) {
        return $this->insertOne('borrow_type', $borrow_type);
    }
    function delete($id) {
        $sql = "update borrow_type set status=1 where id=$id or parent=$id";
        return $this->updateSql($sql);
    }
}
?>