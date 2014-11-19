<?php
class UserM extends MY_Model {
    var $id;
    var $username;
    var $name;
    var $sex;
    var $status;
    var $date;
    function __construct() {
        parent::__construct();
    }
    function getUser($username) {
        $sql = "select id, password from a_user where username='$username'";
        $data = $this->queryOneSql($sql);
        $data['id']       = array_key_exists('id', $data) ? $data['id'] : '';
        $data['password'] = array_key_exists('password', $data) ? $data['password'] : '';
        return $data;
    }
    function getUserByID($id) {
        $sql = "select * from a_user where id=$id";
        $data = $this->queryOneSql($sql);
        return $data;
    }
    function getID($username) {
    	$sql = "select * from a_user where username='$username'";
    	$data = $this->queryOneSql($sql);
        $password = array_key_exists('password', $data) ? $data['password'] : '';
		return $password;
    }
    function getNaviList($id = 0) {
    	$sqlSelect = "SELECT distinct(n.id), n.name, n.url, n.parent ";
    	$sqlFrom   = "FROM a_role_navi rn, a_role r, a_user_role ur, a_user u, a_navi n "; 
    	$sqlWhere  = "WHERE r.id=ur.role_id and u.id=ur.user_id and n.id=rn.navi_id and r.id=rn.role_id and u.id='$id' ";
    	$sqlLevel1 = "and level=1 ";
    	$sqlLevel2 = "and level=2 ";
    	$sqlOrder  = "order by seq asc";
    	$sql1      = $sqlSelect. $sqlFrom. $sqlWhere .$sqlLevel1 .$sqlOrder;
        $data1     = $this->querySql($sql1);
        for ($i = 0; $i < sizeof($data1); $i++) {
        	$id    = $data1[$i]['id'];
        	$sql2  = $sqlSelect. $sqlFrom. $sqlWhere .$sqlLevel2 ."and parent=$id " .$sqlOrder;
        	$naviList[$i]['level1'] = $data1[$i];
        	$naviList[$i]['level2'] = $this->querySql($sql2);
        }
        return $naviList;
    }
    function isAuthorized($userid, $url) {
        $sqlS  = "SELECT distinct(f.id) FROM a_func f, a_role r, a_role_func rf, a_user u, a_user_role ur "; 
        $sqlW  = "WHERE f.urls like '%,$url,%' ";
        $sqlW .= "and r.id=rf.role_id and r.id=ur.role_id and f.id=rf.func_id and u.id=ur.user_id and u.id=$userid";
        $sql = $sqlS. $sqlW;
        $data = $this->queryOneSql($sql);
        //echo $sql;
        return array_key_exists('id', $data) ? true : false;
    }
    function update($id, $data) {
        return $this->updateOne('a_user', $data, $id);
    }
    function usernameExist($username, $id = 0) {
        $sql  = "select count(id) as cnt from a_user where username='$username' ";
        $sql .= ($id != 0) ? "and id<>$id " : "";
        $data = $this->queryOneSql($sql);
        return $data['cnt'] > 0 ? true : false;
    }
}
?>