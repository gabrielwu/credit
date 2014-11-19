<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Anavi extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('anaviM');
    }	
    function index() {
        $this->data['navis'] = $this->anaviM->getList();
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function create() {
        $this->data['navi']['name']        = '';
        $this->data['navi']['parent']      = '';
        $this->data['navi']['level']       = '';
        $this->data['navi']['url']         = '';
        $this->data['navi']['seq']         = '';
        $this->data['parentList'] = $this->anaviM->getParentList();
        $this->data['alertInfo']['name']   = '';
        $this->data['alertInfo']['parent'] = '';
        $this->data['alertInfo']['level']  = '';
        $this->data['alertInfo']['url']    = '';
        $this->data['alertInfo']['seq']    = '';
        $this->data['alertInfo']['result'] = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $navi = new stdClass();
        $navi->name   = $_POST['name'];
        $navi->parent = $_POST['parent'];
        $navi->level  = $_POST['level'];
        $navi->url    = $_POST['url'];
        $navi->seq    = $_POST['seq'];
        $flag = true;
        $alertInfo['name']   = '';
        $alertInfo['parent'] = '';
        $alertInfo['level']  = '';
        $alertInfo['url']    = '';
        $alertInfo['seq']    = '';
        $alertInfo['result'] = '';
        $this->data['navi']  = $_POST;
        $this->data['parentList'] = $this->anaviM->getParentList();
        if ($this->anaviM->nameExist($navi->name)) {
            $alertInfo['name']  = '该导航名已存在！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,64}$/', $navi->name)) {
            $alertInfo['name']  = '格式不正确！';
            $flag = false;
        }
        if (!is_numeric($navi->seq)) {
            $alertInfo['seq']  = '请填写数！';
            $flag = false;
        }
        $this->data['alertInfo'] = $alertInfo;
        $baseUrl = base_url();
        if ($flag) {
            $id = $this->anaviM->insert($navi);
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
        $this->session->set_userdata('idEditNavi', $id);
        $navi = $this->anaviM->getNavi($id);
        $this->data['parentList'] = $this->anaviM->getParentList();
        $this->data['navi'] = $navi;
        $this->data['alertInfo']['name']   = '';
        $this->data['alertInfo']['parent'] = '';
        $this->data['alertInfo']['level']  = '';
        $this->data['alertInfo']['url']    = '';
        $this->data['alertInfo']['seq']    = '';
        $this->data['alertInfo']['result'] = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function editSubmit() {
        $navi = new stdClass();
        $navi->name   = $_POST['name'];
        $navi->parent = $_POST['parent'];
        $navi->level  = $_POST['level'];
        $navi->url    = $_POST['url'];
        $navi->seq    = $_POST['seq'];
        $flag = true;
        $alertInfo['name']   = '';
        $alertInfo['parent'] = '';
        $alertInfo['level']  = '';
        $alertInfo['url']    = '';
        $alertInfo['seq']    = '';
        $alertInfo['result'] = '';
        $this->data['navi']  = $_POST;
        $this->data['parentList'] = $this->anaviM->getParentList();
        $id = $this->session->userdata('idEditNavi');
        if ($this->anaviM->nameExist($navi->name, $id)) {
            $alertInfo['name']  = '该导航名已存在！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $navi->name)) {
            $alertInfo['name']  = '格式不正确！';
            $flag = false;
        }
        if (!is_numeric($navi->seq)) {
            $alertInfo['seq']  = '请填写数！';
            $flag = false;
        }
        $this->data['alertInfo'] = $alertInfo;
        $baseUrl = base_url();
        if ($flag) {
            $result = $this->anaviM->update($id, $navi);
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
            echo $this->anaviM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>