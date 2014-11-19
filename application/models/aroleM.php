<?php
class AroleM extends MY_Model {
    var $id;
    var $name;
    function __construct() {
        parent::__construct();
    }
    function nameExist($name, $id = 0) {
        $sql  = "select count(id) as cnt from a_role where name='$name' ";
        $sql .= ($id != 0) ? "and id<>$id " : "";
        $data = $this->queryOneSql($sql);
        return $data['cnt'] > 0 ? true : false;
    }
    function getList($includeDetail = false) {
        $sql   = "select * from a_role";
        $roles = $this->querySql($sql);
        if ($includeDetail) {
        	foreach ($roles as &$role) {
	            $roleid   = $role['id'];
                $sqlFunc  = "select f.* from a_func f, a_role_func rf where rf.role_id=$roleid and f.id=rf.func_id ";
                $role['func'] = $this->querySql($sqlFunc);
                $sqlNavi  = "select n.* from a_navi n, a_role_navi rn where rn.role_id=$roleid and n.id=rn.navi_id order by parent, level, seq";
                $role['navi'] = $this->querySql($sqlNavi);
	        }
        } 
        return $roles;
    }    
    function getRole($roleid) {
        $sql  = "select r.* from a_role r where r.id=$roleid ";
        //echo $sql;
        $role = $this->queryOneSql($sql);
        $sqlFunc = "select f.id from a_func f, a_role_func rf where rf.role_id=$roleid and f.id=rf.func_id ";
        $funcs = $this->querySql($sqlFunc);
        $sqlNavi = "select n.id from a_navi n, a_role_navi rn where rn.role_id=$roleid and n.id=rn.navi_id ";
        $navis = $this->querySql($sqlNavi);
        //echo $sqlFunc;
        for ($i = 0; $i < sizeof($funcs); $i++) {
            $role['funcs'][$i] = $funcs[$i]['id'];
        }
        if (sizeof($funcs) == 0) {
            $role['funcs'] = array();
        }
        for ($i = 0; $i < sizeof($navis); $i++) {
            $role['navis'][$i] = $navis[$i]['id'];
        }
        if (sizeof($navis) == 0) {
            $role['navis'] = array();
        }
        //var_dump($role['funcs']);
        return $role;
    }
    function updateIncludeFunc($id, $role, $funcs, $navis) {
        $f1  = $this->updateOne('a_role', $role, $id);
        $sql = "delete from a_role_func where role_id=$id";
        $f1  += $this->updateSql($sql);
        $sql = "delete from a_role_navi where role_id=$id";
        $f1  += $this->updateSql($sql);
        foreach ($funcs as $func) {
            $sql = "insert into a_role_func (role_id, func_id) values($id, $func)";
            $f1 += $this->updateSql($sql);
        }
        foreach ($navis as $navi) {
            $sql = "insert into a_role_navi (role_id, navi_id) values($id, $navi)";
            $f1 += $this->updateSql($sql);
        }
        return $f1 > 0 ? true : false;
    }
    function update($id, $role) {
        return $this->updateOne('a_role', $role, $id);
    }
    function insert($role, $funcs, $navis) {
        $id = $this->insertOne('a_role', $role);
        if ($id > 0) {
            foreach ($funcs as $func) {
                $sql = "insert into a_role_func (role_id, func_id) values($id, $func)";
                $this->updateSql($sql);
            }
            foreach ($navis as $navi) {
                $sql = "insert into a_role_navi (role_id, navi_id) values($id, $navi)";
                $this->updateSql($sql);
            }
        }
        return $id;
    }
    function delete($id) {
        $sql = "delete from a_role where id=$id";
        $f1  = $this->updateSql($sql);
        if ($f1 == 1) {
        	$sql1 = "delete from a_user_role where role_id=$id";
        	$sql2 = "delete from a_role_func where role_id=$id";
        	$sql3 = "delete from a_role_navi where role_id=$id";
        	$this->updateSql($sql1);
        	$this->updateSql($sql2);
        	$this->updateSql($sql3);
        }
        return $f1;
    }
}
?>