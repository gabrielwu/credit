<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Afunc extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('afuncM');
    }	
    function index() {
        $this->data['funcs'] = $this->afuncM->getList(true);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function create() {
        $this->data['func']['name']        = '';
        $this->data['func']['urls']        = '';
        $this->data['func']['module_name'] = '';
        $this->data['alertInfo']['name']        = '';
        $this->data['alertInfo']['urls']        = '半角逗号\',\'分割';
        $this->data['alertInfo']['module_name'] = '';
        $this->data['alertInfo']['result']      = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $func = new stdClass();
        $func->name        = $_POST['name'];
        $func->urls        = $_POST['urls'];
        $func->module_name = $_POST['module_name'];
        $flag = true;
        $alertInfo['name']        = '';
        $alertInfo['urls']        = '';
        $alertInfo['module_name'] = '';
        $alertInfo['result']      = '';
        $this->data['alertInfo']  = $alertInfo;
        $this->data['func']  = $_POST;
        if ($this->afuncM->nameExist($func->name)) {
            $alertInfo['name']  = '该功能名已存在！';
            $flag = false;
        }
        if ($func->name == "") {
            $alertInfo['name']  = '格式不正确！';
            $flag = false;
        }
        $func->urls = ','. $func->urls. ',';
        $this->data['alertInfo'] = $alertInfo;
        $baseUrl = base_url();
        if ($flag) {
            $funcid = $this->afuncM->insert($func);
            if ($funcid > 0) {
                echo "<script>alert('创建成功！');window.location.href='". $baseUrl. __CLASS__. "/edit/$funcid';</script>";
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/create", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/create", $this->data);
        }
    }
    function edit($funcid) {
        $this->session->set_userdata('idEditFunc', $funcid);
        $func = $this->afuncM->getFunc($funcid);
        if (isset($func['urls'])) {
            if (($len = mb_strlen($func['urls'])) > 2) {
                if ($func['urls'][0] == ',' && $func['urls'][$len - 1] == ',') {
                    $func['urls'] = substr($func['urls'], 1, $len - 2);
                }
            }
        }
        $this->data['func'] = $func;
        $this->data['alertInfo']['name']        = '';
        $this->data['alertInfo']['urls']        = '';
        $this->data['alertInfo']['module_name'] = '';
        $this->data['alertInfo']['result']  = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function editSubmit() {
        $func = new stdClass();
        $func->name        = $_POST['name'];
        $func->urls        = $_POST['urls'];
        $func->module_name = $_POST['module_name'];
        $flag = true;
        $alertInfo['name']        = '';
        $alertInfo['urls']        = '';
        $alertInfo['module_name'] = '';
        $alertInfo['result']      = '';
        $this->data['alertInfo']  = $alertInfo;
        $this->data['func']  = $_POST;
        $funcid = $this->session->userdata('idEditFunc');
        if ($this->afuncM->nameExist($func->name, $funcid)) {
            $alertInfo['name']  = '该功能名已存在！';
            $flag = false;
        }
        if ($func->name == "") {
            $alertInfo['name']  = '格式不正确！';
            $flag = false;
        }
        $func->urls = ','. $func->urls. ',';
        $this->data['alertInfo'] = $alertInfo;
        $baseUrl = base_url();
        if ($flag) {
            $result = $this->afuncM->update($funcid, $func);
            if ($result) {
                echo "<script>alert('修改成功！');window.location.href='". $baseUrl. __CLASS__. "/edit/$funcid';</script>";
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
            echo $this->afuncM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>