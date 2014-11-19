<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {
    function __construct() {
        parent::__construct(); 
		$this->load->model('userM');
        $this->load->model('dictionaryM');
    }	
    function info() {
        $this->data['userinfo'] = $this->userM->getUserByID($_SESSION['userid']);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function editInfo() {
        $this->data['userinfo'] = $this->userM->getUserByID($_SESSION['userid']);
        $this->data['alertInfo']['username']  = '';
        $this->data['alertInfo']['name']      = '';
        $this->data['alertInfo']['result']    = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function editInfoSubmit() {
        $user = new stdClass();
        $user->username = $_POST['username'];
        $user->name     = $_POST['name'];
        $user->sex      = $_POST['sex'];
        $flag = true;
        $alertInfo['username']  = '';
        $alertInfo['name']      = '';
        $alertInfo['result']    = '';
        if ($this->userM->usernameExist($user->username, $_SESSION['userid'])) {
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
        $this->data['alertInfo'] = $alertInfo;
        $this->data['userinfo']  = $_POST;
        if ($flag) {
            $result = $this->userM->update($_SESSION['userid'], $user);
            if ($result == 1) {
                $this->data['username'] = $_SESSION['username'] = $_POST['username'];
                echo "<script>alert('修改成功！');</script>";
                $this->info();
            } else {
                $this->data['alertInfo']['result'] = '修改失败！';
                $this->view(__CLASS__. "/editInfo", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '修改失败！';
            $this->view(__CLASS__. "/editInfo", $this->data);
        }
    }
    function modifyPassword() {
        $userinfo['oPassword']   = '';
        $userinfo['nPassword']   = '';
        $userinfo['rPassword']   = '';
        $this->data['userinfo']  = $userinfo;
        $alertInfo['oPassword']  = '';
        $alertInfo['nPassword']  = '';
        $alertInfo['rPassword']  = '';
        $alertInfo['result']     = '';
        $this->data['alertInfo'] = $alertInfo;
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function modifyPasswordSubmit() {
        $flag = true;
        $alertInfo['oPassword']  = '';
        $alertInfo['nPassword']  = '';
        $alertInfo['rPassword']  = '';
        if (($oPassword = $_POST['oPassword']) == '') {
            $alertInfo['oPassword']  = '请填写！';
            $flag = false;
        }
        if (($nPassword = $_POST['nPassword']) == '') {
            $alertInfo['nPassword']  = '请填写！';
            $flag = false;
        }
        if (($rPassword = $_POST['rPassword']) == '') {
            $alertInfo['rPassword']  = '请填写！';
            $flag = false;
        }  
        if ($alertInfo['oPassword'] == '') {
            $userT     = $this->userM->getUserByID($_SESSION['userid']);
            $passwordT = $userT['password'];
            if (md5($oPassword) != $passwordT) {
                $alertInfo['oPassword']  = '不正确！';
                $flag = false;
            }
        }      
        if ($alertInfo['nPassword'] == '') {
            // TODO regexp
            if (!preg_match('/^\w{6,16}$/', $nPassword)) {
                $alertInfo['nPassword']  = '密码必须包含字母和数字，且6-16位！';
                $flag = false;
            }
        }
        if ($alertInfo['rPassword'] == '') {
            if ($nPassword != $rPassword) {
                $alertInfo['rPassword']  = '两次密码不相同！';
                $flag = false;
            }
        }
        if ($flag) {
            $user = new stdClass();
            $user->password = md5($nPassword);
            $result = $this->userM->update($_SESSION['userid'], $user);
            if ($result == 1) {
                $alertInfo['result']     = '修改成功！';
            } else {
                $alertInfo['result']     = '修改失败！';
            }
        } else {
            $alertInfo['result']     = '';
        }
        $this->data['userinfo']  = $_POST;
        $this->data['alertInfo'] = $alertInfo;

        $this->view(__CLASS__. "/modifyPassword", $this->data);
    }
}
?>