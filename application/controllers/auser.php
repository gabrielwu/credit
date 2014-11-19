<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auser extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('auserM');
        $this->load->model('aroleM');
    }	
    function index() {
        $condition['username'] = isset($_POST['username']) ? $_POST['username'] : '';
        $condition['name']     = isset($_POST['name'])     ? $_POST['name'] : '';
        $condition['sex']      = isset($_POST['sex'])      ? $_POST['sex'] : '';
        $condition['role']     = isset($_POST['role'])     ? $_POST['role'] : '';
        $condition['date1']    = isset($_POST['date1'])    ? $_POST['date1'] : '';
        $condition['date2']    = isset($_POST['date2'])    ? $_POST['date2'] : '';
        $this->data['condition'] = $condition;
        $this->data['users']     = $this->auserM->getList($condition);
        $this->data['roles']      = $this->aroleM->getList();
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function create() {
        $this->data['user']['username']  = '';
        $this->data['user']['name']      = '';
        $this->data['user']['sex']       = '';
        $this->data['user']['roles']     = array();
        $this->data['roles'] = $this->aroleM->getList();
        $this->data['alertInfo']['username']  = '';
        $this->data['alertInfo']['name']      = '';
        $this->data['alertInfo']['role']      = '';
        $this->data['alertInfo']['result']    = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $user = new stdClass();
        $user->username = $_POST['username'];
        $user->name     = $_POST['name'];
        $user->sex      = $_POST['sex'];
        $user->password = md5('123456');
        $user->date     = date('Y-m-d h:i:s', time());
        $userRole       = isset($_POST['role']) ? $_POST['role'] : array();
        $flag = true;
        $alertInfo['username']  = '';
        $alertInfo['name']      = '';
        $alertInfo['role']      = '';
        $alertInfo['result']    = '';
        if ($this->userM->usernameExist($user->username)) {
            $alertInfo['username']  = '该用户名已存在！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{4,16}$/', $user->username)) {
            $alertInfo['username']  = '用户名必须为汉字、字母、数字或下划线，且4-16位！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{6,16}$/', $user->name)) {
            $alertInfo['name']  = '姓名格式不正确！';
            $flag = false;
        }
        if (sizeof($userRole) == 0) {
            $alertInfo['role']  = '请选择至少一个角色！';
            $flag = false;
        }
        $this->data['alertInfo'] = $alertInfo;
        $this->data['user']  = $_POST;
        $this->data['user']['roles']  = $userRole;
        $this->data['roles'] = $this->aroleM->getList();
        $baseUrl = base_url();
        if ($flag) {
            $userid = $this->auserM->insert($user, $userRole);
            if ($userid) {
                echo "<script>alert('创建成功！');window.location.href='". $baseUrl. __CLASS__. "/edit/$userid';</script>";
                $this->edit($userid);
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/create", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/create", $this->data);
        }
    }
    function edit($userid) {
        $this->session->set_userdata('idEditUser', $userid);
        $this->data['user']  = $this->auserM->getUser($userid);
        $this->data['roles'] = $this->aroleM->getList();
        $this->data['alertInfo']['username']  = '';
        $this->data['alertInfo']['name']      = '';
        $this->data['alertInfo']['role']      = '';
        $this->data['alertInfo']['result']    = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function editSubmit() {
        $user = new stdClass();
        $user->username = $_POST['username'];
        $user->name     = $_POST['name'];
        $user->sex      = $_POST['sex'];
        $userRole       = isset($_POST['role']) ? $_POST['role'] : array();
        $flag = true;
        $alertInfo['username']  = '';
        $alertInfo['name']      = '';
        $alertInfo['role']      = '';
        $alertInfo['result']    = '';
        $userid = $this->session->userdata('idEditUser');
        if ($this->userM->usernameExist($user->username, $userid)) {
            $alertInfo['username']  = '该用户名已存在！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{4,16}$/', $user->username)) {
            $alertInfo['username']  = '用户名必须为汉字、字母、数字或下划线，且4-16位！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{6,16}$/', $user->name)) {
            $alertInfo['name']  = '姓名格式不正确！';
            $flag = false;
        }
        if (sizeof($userRole) == 0) {
            $alertInfo['role']  = '请选择至少一个角色！';
            $flag = false;
        }
        $this->data['alertInfo'] = $alertInfo;
        $this->data['user']  = $_POST;
        $this->data['user']['roles']  = $userRole;
        $this->data['roles'] = $this->aroleM->getList();
        $baseUrl = base_url();
        if ($flag) {
            $result = $this->auserM->updateIncludeRole($userid, $user, $userRole);
            if ($result) {
                echo "<script>alert('修改成功！');window.location.href='". $baseUrl. __CLASS__. "/edit/$userid';</script>";
            } else {
                $this->data['alertInfo']['result'] = '修改失败！';
                $this->view(__CLASS__. "/edit", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '修改失败！';
            $this->view(__CLASS__. "/edit", $this->data);
        }
    }
    function delete() {
        if ($this->permission) {
            $user = new stdClass();
            $user->status = '1';
            echo $this->auserM->update($_POST['id'], $user);
        } else {
            echo -1;
        }
    }
    function resetPassword() {
        if ($this->permission) {
            $user = new stdClass();
            $user->password = md5('123456');
            echo $this->auserM->update($_POST['id'], $user);
        } else {
            echo -1;
        }
    }
}
?>