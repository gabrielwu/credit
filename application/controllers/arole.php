<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Arole extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('aroleM');
        $this->load->model('afuncM');
        $this->load->model('anaviM');
    }	
    function index() {
        $this->data['roles'] = $this->aroleM->getList(true);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function create() {
        $this->data['role']['name']  = '';
        $this->data['role']['funcs'] = array();
        $this->data['role']['navis'] = array();
        $this->data['funcs'] = $this->afuncM->getList();
        $this->data['navis'] = $this->anaviM->getList();
        $this->data['alertInfo']['name']    = '';
        $this->data['alertInfo']['func']    = '';
        $this->data['alertInfo']['navi']    = '';
        $this->data['alertInfo']['result']  = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $role = new stdClass();
        $role->name = $_POST['name'];
        $roleFunc   = isset($_POST['func']) ? $_POST['func'] : array();
        $roleNavi   = isset($_POST['navi']) ? $_POST['navi'] : array();
        $flag = true;
        $alertInfo['name']   = '';
        $alertInfo['func']   = '';
        $alertInfo['navi']   = '';
        $alertInfo['result'] = '';
        $this->data['alertInfo'] = $alertInfo;
        $this->data['role']  = $_POST;
        $this->data['role']['funcs']  = $roleFunc;
        $this->data['role']['navis']  = $roleNavi;
        $this->data['funcs'] = $this->afuncM->getList();
        $this->data['navis'] = $this->anaviM->getList();
        if ($this->aroleM->nameExist($role->name)) {
            $alertInfo['name']  = '该角色名已存在！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $role->name)) {
            $alertInfo['name']  = '角色名必须为汉字、字母、数字或下划线！';
            $flag = false;
        }
        if (sizeof($roleFunc) == 0) {
            $alertInfo['func']  = '请选择至少一个功能！';
            $flag = false;
        }
        if (sizeof($roleNavi) == 0) {
            $alertInfo['navi']  = '请选择至少一个导航！';
            $flag = false;
        }
        $this->data['alertInfo'] = $alertInfo;
        $baseUrl = base_url();
        if ($flag) {
            $roleid = $this->aroleM->insert($role, $roleFunc, $roleNavi);
            if ($roleid > 0) {
                echo "<script>alert('创建成功！');window.location.href='". $baseUrl. __CLASS__. "/edit/$roleid';</script>";
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/create", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/create", $this->data);
        }
    }
    function edit($roleid) {
        $this->session->set_userdata('idEditRole', $roleid);
        $this->data['role']  = $this->aroleM->getRole($roleid);
        $this->data['funcs'] = $this->afuncM->getList();
        $this->data['navis'] = $this->anaviM->getList();
        $this->data['alertInfo']['name']    = '';
        $this->data['alertInfo']['func']    = '';
        $this->data['alertInfo']['navi']    = '';
        $this->data['alertInfo']['result']  = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function editSubmit() {
        $role = new stdClass();
        $role->name = $_POST['name'];
        $roleFunc   = isset($_POST['func']) ? $_POST['func'] : array();
        $roleNavi   = isset($_POST['navi']) ? $_POST['navi'] : array();
        $flag = true;
        $alertInfo['name']   = '';
        $alertInfo['func']   = '';
        $alertInfo['navi']   = '';
        $alertInfo['result'] = '';
        $roleid = $this->session->userdata('idEditRole');
        $this->data['alertInfo'] = $alertInfo;
        $this->data['role']  = $_POST;
        $this->data['role']['funcs']  = $roleFunc;
        $this->data['role']['navis']  = $roleNavi;
        $this->data['funcs'] = $this->afuncM->getList();
        $this->data['navis'] = $this->anaviM->getList();
        if ($this->aroleM->nameExist($role->name, $roleid)) {
            $alertInfo['name']  = '该角色名已存在！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $role->name)) {
            $alertInfo['name']  = '角色名必须为汉字、字母、数字或下划线！';
            $flag = false;
        }
        if (sizeof($roleFunc) == 0) {
            $alertInfo['func']  = '请选择至少一个功能！';
            $flag = false;
        }
        if (sizeof($roleNavi) == 0) {
            $alertInfo['navi']  = '请选择至少一个功能！';
            $flag = false;
        }
        $this->data['alertInfo'] = $alertInfo;
        $baseUrl = base_url();
        if ($flag) {
            $result = $this->aroleM->updateIncludeFunc($roleid, $role, $roleFunc, $roleNavi);
            if ($result) {
                echo "<script>alert('修改成功！');window.location.href='". $baseUrl. __CLASS__. "/edit/$roleid';</script>";
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
            echo $this->aroleM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>