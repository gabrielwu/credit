<?php
class BorrowAuditM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList($borrow_id) {
        $sql  = "select b.*, bt.rate as typeRate, bt2.name as typeName, bt2.code as typeCode from (borrow_audit b) ";
        $sql .= "left join (borrow_type bt, borrow_type bt2)  on (bt.parent=bt2.id and b.type=bt.id) ";
        $sql .= "where borrow_id=$borrow_id ";
        return $this->querySql($sql);
    }  
    function get($id) {
        $sql  = "select * from borrow_audit where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $borrowAudit) {
        return $this->updateOne('borrow_audit', $borrowAudit, $id);
    }
    function insert($borrowAudit) {
        return $this->insertOne('borrow_audit', $borrowAudit);
    }
    function delete($id) {
        $sql = "delete from borrow_audit where id=$id";
        return $this->updateSql($sql);
    }
}
?>