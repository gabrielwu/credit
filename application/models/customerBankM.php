<?php
class CustomerBankM extends MY_Model {
    protected $table;
    function __construct() {
        $this->table = "customer_bank";
        parent::__construct();
    }
    function getList($customer_id) {
        $sql  = "select bb.*, b.name as bank_name, rp.provinceName, rc.cityName, rco.countyName ";
        $sql .= "from ($this->table bb, bank b) ";
        $sql .= "left join (region_province rp, region_city rc, region_county rco) on (bb.province=rp.id and bb.city=rc.id and bb.county=rco.id) ";
        $sql .= "where customer_id=$customer_id and b.id=bb.bank";
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from $this->table  where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $item) {
        return $this->updateOne($this->table , $item, $id);
    }
    function insert($item) {
        return $this->insertOne($this->table , $item);
    }
    function delete($id) {
        $sql = "delete from $this->table  where id=$id";
        return $this->updateSql($sql);
    }
}
?>