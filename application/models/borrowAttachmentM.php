<?php
class BorrowAttachmentM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList($borrow_id, $type) {
        $sql = "select b.*, u.name as operator_name from borrow_attachment b, a_user u where borrow_id=$borrow_id and type=$type and b.operator=u.id";
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from borrow_attachment where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $borrowAttachment) {
        return $this->updateOne('borrow_attachment', $borrowAttachment, $id);
    }
    function insert($borrowAttachment) {
        return $this->insertOne('borrow_attachment', $borrowAttachment);
    }
    function delete($id) {
        $sql = "delete from borrow_attachment where id=$id";
        return $this->updateSql($sql);
    }
}
?>