<?php
class RegionCityM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList() {
        $sql  = "select c.* from region_city c ";
        return $this->querySql($sql);
    }
    function getListByCity($province) {
        $sql  = "select c.* from region_city c, region_province p ";
        $sql .= "where p.id=$province_id and p.province_id=c.fatherID";
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from region_city where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $data) {
        return $this->updateOne('region_city', $data, $id);
    }
    function insert($data) {
        return $this->insertOne('region_city', $data);
    }
    function delete($id) {
        $sql = "delete from region_city where id=$id";
        return $this->updateSql($sql);
    }
}
?>