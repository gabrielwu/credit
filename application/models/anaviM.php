<?php
class AnaviM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList() {
        $sql  = "select n1.*, n2.id as parent_id, n2.name as parent_name ". 
                "from a_navi n1, a_navi n2 where n1.parent=n2.id order by n1.parent, n1.level, n1.seq ";
        $list = $this->querySql($sql);
        return $list;
    }
    function getParentList() {
        $sql  = "select n1.* from a_navi n1 where n1.level=1 order by n1.seq ";
        $list = $this->querySql($sql);
        return $list;
    }
    function nameExist($name, $id = 0) {
        $sql  = "select count(id) as cnt from a_navi where name='$name' ";
        $sql .= ($id != 0) ? "and id<>$id " : "";
        $data = $this->queryOneSql($sql);
        return $data['cnt'] > 0 ? true : false;
    }    
    function getNavi($id) {
        $sql  = "select n1.*, n2.id as parent_id, n2.name as parent_name ". 
                "from a_navi n1, a_navi n2 where n1.parent=n2.id and n1.id=$id order by n1.parent, n1.level, n1.seq ";
        //echo $sql;
        $navi = $this->queryOneSql($sql);
        return $navi;
    }
    function update($id, $navi) {
        if ($navi->level == 1) {
            $navi->parent = $id;
        }
        return $this->updateOne('a_navi', $navi, $id);
    }
    function insert($navi) {
        $id = $this->insertOne('a_navi', $navi);
        if ($navi->level == 1) {
            $navi->parent = $id;
            $this->updateOne('a_navi', $navi, $id);
        }
        return $id;
    }
    function delete($id) {
        $sql = "delete from a_navi where id=$id";
        //echo $sql;
        $f1  = $this->updateSql($sql);
        return $f1;
    }
}
?>