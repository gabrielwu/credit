<?php 
class MY_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }	
    function querySql($sql) {
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function queryOneSql($sql) {
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    function insertOne($table, $values) {
    	$this->db->insert($table, $values);
    	return $this->db->insert_id();
    }
    function updateOne($table, $values, $idVal, $id = 'id'){
        $this->db->update($table, $values, array($id => $idVal));
        return $this->db->affected_rows();
    }
    function updateSql($sql){
        $query = $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
?>