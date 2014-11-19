<?php
class RegionCountyM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList() {
        $sql  = "select co.* from region_county co ";
        return $this->querySql($sql);
    }
    function getListByCity($city_id) {
        $sql  = "select co.* from region_county co, region_city c ";
        $sql .= "where c.id=$city_id and c.city_id=co.fatherID";
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from region_county where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $data) {
        return $this->updateOne('region_county', $data, $id);
    }
    function insert($data) {
        return $this->insertOne('region_county', $data);
    }
    function delete($id) {
        $sql = "delete from region_county where id=$id";
        return $this->updateSql($sql);
    }
}
?>