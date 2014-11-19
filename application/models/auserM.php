<?php
class AuserM extends MY_Model {
    var $id;
    var $username;
    var $name;
    var $sex;
    var $status;
    var $date;
    function __construct() {
        parent::__construct();
    }
    function getList($condition) {
        $sqlUser  = "select u.* from a_user u where 1=1 and (status=-1 or status=0) ";
        $sqlUser .= $condition['username'] == "" ? "" : "and username like '%".$condition['username']."%' ";
        $sqlUser .= $condition['name']     == "" ? "" : "and name     like '%".$condition['name']."%' ";
        $sqlUser .= $condition['sex']      == "" ? "" : "and sex           ='".$condition['sex']."' ";
        $sqlUser .= $condition['date1']    == "" ? "" : "and date         >='".$condition['date1']."' ";
        $sqlUser .= $condition['date2']    == "" ? "" : "and date         >='".$condition['date2']."' ";
        $sqlUser .= $condition['role']     == "" ? "" : "and ".$condition['role']." in (select role_id from a_user_role where user_id=u.id); ";
        //echo $sqlUser;
        $users    = $this->querySql($sqlUser);
        foreach ($users as &$user) {
            $userid   = $user['id'];
            $sqlRole  = "select name from a_role r, a_user_role ur where ur.user_id=$userid and r.id=ur.role_id ";
            $sqlRole .= $condition['role']      == "" ? "" : "and r.id='".$condition['role']."' ";

            $user['role'] = $this->querySql($sqlRole);
        }
        return $users;
    }
    function getUser($userid) {
        $sqlUser  = "select * from a_user where (status=-1 or status=0) and id=$userid ";
        //echo $sqlUser;
        $user     = $this->queryOneSql($sqlUser);
        $sqlRole  = "select r.id from a_role r, a_user_role ur where ur.user_id=$userid and r.id=ur.role_id ";
        $roles = $this->querySql($sqlRole);
        for ($i = 0; $i < sizeof($roles); $i++) {
            $user['roles'][$i] = $roles[$i]['id'];
        }
        if (sizeof($roles) == 0) {
            $user['roles'] = array();
        }
        return $user;
    }
    function updateIncludeRole($id, $user, $roles) {
        $f1  = $this->updateOne('a_user', $user, $id);
        $sql = "delete from a_user_role where user_id=$id";
        $f1  += $this->updateSql($sql);
        foreach ($roles as $role) {
            $sql = "insert into a_user_role (user_id, role_id) values($id, $role)";
            $f1 += $this->updateSql($sql);
        }
        return $f1 > 0 ? true : false;
    }
    function update($id, $user) {
        return $this->updateOne('a_user', $user, $id);
    }
    function insert($user, $roles) {
        $id = $this->insertOne('a_user', $user);
        if ($id > 0) {
            foreach ($roles as $role) {
                $sql = "insert into a_user_role (user_id, role_id) values($id, $role)";
                $this->updateSql($sql);
            }
        }
        return $id;
    }
    function getBorrowCreateUserList() {
        $sqlS  = "SELECT distinct u.id, u.name FROM a_func f, a_role r, a_role_func rf, a_user u, a_user_role ur "; 
        $sqlW  = "WHERE f.urls like '%,borrow/create,%' ";
        $sqlW .= "and r.id=rf.role_id and r.id=ur.role_id and f.id=rf.func_id and u.id=ur.user_id";
        $sql = $sqlS. $sqlW;
        //echo $sql;
        return $this->querySql($sql);
    }
    function getCustomerCreateUserList() {
        $sqlS  = "SELECT distinct u.id, u.name FROM a_func f, a_role r, a_role_func rf, a_user u, a_user_role ur "; 
        $sqlW  = "WHERE f.urls like '%,customer/create,%' ";
        $sqlW .= "and r.id=rf.role_id and r.id=ur.role_id and f.id=rf.func_id and u.id=ur.user_id";
        $sql = $sqlS. $sqlW;
        //echo $sql;
        return $this->querySql($sql);
    }
}
?>