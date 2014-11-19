<?php
class AfuncM extends MY_Model {
    var $id;
    var $name;
    function __construct() {
        parent::__construct();
    }
    function getList() {
        $sql   = "select * from a_func order by module_name";
        $funcs = $this->querySql($sql);
        return $funcs;
    }
    function nameExist($name, $id = 0) {
        $sql  = "select count(id) as cnt from a_func where name='$name' ";
        $sql .= ($id != 0) ? "and id<>$id " : "";
        $data = $this->queryOneSql($sql);
        return $data['cnt'] > 0 ? true : false;
    }    
    function getFunc($funcid) {
        $sql  = "select f.* from a_func f where f.id=$funcid ";
        //echo $sql;
        $func = $this->queryOneSql($sql);
        return $func;
    }
    function update($id, $func) {
        return $this->updateOne('a_func', $func, $id);
    }
    function insert($func) {
        return $this->insertOne('a_func', $func);
    }
    function delete($id) {
        $sql = "delete from a_func where id=$id";
        //echo $sql;
        $f1  = $this->updateSql($sql);
        return $f1;
    }
}
?>