<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bank extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('bankM');
    }	
    function index() {
        $this->data['banks'] = $this->bankM->getList(true);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function create() {
        $this->data['bank']['name']        = '';
        $this->data['alertInfo']['name']   = '';
        $this->data['alertInfo']['result'] = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $bank = new stdClass();
        $bank->name = $_POST['name'];
        $flag = true;
        $alertInfo['name']       = '';
        $alertInfo['result']     = '';
        $this->data['alertInfo'] = $alertInfo;
        $this->data['bank']  = $_POST;
        if ($this->bankM->nameExist($bank->name)) {
            $alertInfo['name']  = '该功能名已存在！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $bank->name)) {
            $alertInfo['name']  = '格式不正确！';
            $flag = false;
        }
        $baseUrl = base_url();
        if ($flag) {
            $id = $this->bankM->insert($bank);
            if ($id > 0) {
                echo "<script>alert('创建成功！');window.location.href='". $baseUrl. __CLASS__. "/edit/$id';</script>";
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/create", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/create", $this->data);
        }
    }
    function edit($id) {
        $this->session->set_userdata('idEditBank', $id);
        $func = $this->bankM->get($id);
        $this->data['bank'] = $bank;
        $this->data['alertInfo']['name']        = 
        $this->data['alertInfo']['result']  = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function editSubmit() {
        $bank = new stdClass();
        $bank->name = $_POST['name'];
        $flag = true;
        $alertInfo['name']        = '';
        $alertInfo['result']      = '';
        $this->data['alertInfo']  = $alertInfo;
        $this->data['bank']  = $_POST;
        $id = $this->session->userdata('idEditBank');
        if ($this->bankM->nameExist($bank->name, $id)) {
            $alertInfo['name']  = '该银行已存在！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $bank->name)) {
            $alertInfo['name']  = '格式不正确！';
            $flag = false;
        }
        $this->data['alertInfo'] = $alertInfo;
        $baseUrl = base_url();
        if ($flag) {
            $result = $this->bankM->update($id, $bank);
            if ($result) {
                echo "<script>alert('修改成功！');window.location.href='". $baseUrl. __CLASS__. "/edit/$id';</script>";
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
            echo $this->bankM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>