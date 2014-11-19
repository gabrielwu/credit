<?php
class BorrowContactM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList($borrowid) {
        $sql = "select * from borrow_contact where borrow_id=$borrowid ";
        $contacts = $this->querySql($sql);
        return $contacts;
    }
    function insert($contact) {
        return $this->insertOne('borrow_contact', $contact);
    }
    function delete($id) {
        $sql = "delete from borrow_contact where id=$id";
        //echo $sql;
        return $this->updateSql($sql);
    }
}
?>