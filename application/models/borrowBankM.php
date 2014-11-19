<?php
class BorrowBankM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList($borrow_id) {
        $sql  = "select bb.*, b.name as bank_name, rp.provinceName, rc.cityName, rco.countyName ";
        $sql .= "from (borrow_bank bb, bank b) ";
        $sql .= "left join (region_province rp, region_city rc, region_county rco) on (bb.province=rp.id and bb.city=rc.id and bb.county=rco.id) ";
        $sql .= "where borrow_id=$borrow_id and b.id=bb.bank";
        return $this->querySql($sql);
    }
    function get($id) {
        $sql  = "select * from borrow_bank where id=$id ";
        return $this->queryOneSql($sql);
    }
    function update($id, $borrowBank) {
        return $this->updateOne('borrow_bank', $borrowBank, $id);
    }
    function insert($borrowBank) {
        return $this->insertOne('borrow_bank', $borrowBank);
    }
    function delete($id) {
        $sql = "delete from borrow_bank where id=$id";
        return $this->updateSql($sql);
    }
}
?>