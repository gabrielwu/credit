<?php
class RegionProvinceM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList() {
        $sql = "select * from region_province ";
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from region_province where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $data) {
        return $this->updateOne('region_province', $data, $id);
    }
    function insert($data) {
        return $this->insertOne('region_province', $data);
    }
    function delete($id) {
        $sql = "delete from region_province where id=$id";
        return $this->updateSql($sql);
    }
}
?>