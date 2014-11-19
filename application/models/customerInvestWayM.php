<?php
class customerInvestWayM extends MY_Model {
    protected $table; 
    function __construct() {
        $this->table = 'customer_invest_way';
    }
    function getList($all = false) {
        $sql  = "select * ";
        $sql .= "from $this->table where 1=1 ";
        $sql .= $all ? "" : "and status=0";
        //echo $sql;
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from $this->table where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $item) {
        return $this->updateOne($this->table, $item, $id);
    }
    function insert($item) {
        return $this->insertOne($this->table, $item);
    }
    function delete($id) {
        $sql = "update $this->table set status=1 where id=$id";
        return $this->updateSql($sql);
    }
}
?>