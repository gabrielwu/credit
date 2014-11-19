<?php
class bankM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList($all = false) {
        $sql    = "select * from bank ";
        $sql   .= $all ? "" : "where status='0'";
        $banks = $this->querySql($sql);
        return $banks;
    }
    function nameExist($name, $id = 0) {
        $sql  = "select count(id) as cnt from bank where name='$name' ";
        $sql .= ($id != 0) ? "and id<>$id " : "";
        $data = $this->queryOneSql($sql);
        return $data['cnt'] > 0 ? true : false;
    }    
    function get($id) {
        $sql  = "select * from bank where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $bank) {
        return $this->updateOne('bank', $bank, $id);
    }
    function insert($bank) {
        return $this->insertOne('bank', $bank);
    }
    function delete($id) {
        $sql = "update bank set status='1' where id=$id";
        return $this->updateSql($sql);
    }
}
?>