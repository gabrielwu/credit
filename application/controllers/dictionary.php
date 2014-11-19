<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dictionary extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('dictionaryM');
    }	 
    function index() {
        $this->data['borrowStatusList']        = $this->dictionaryM->getBorrowStatusList(true);
        $this->data['borrowAccountStatusList'] = $this->dictionaryM->getBorrowAccountStatusList(true);
        $this->data['borrowIntentionList']     = $this->dictionaryM->getBorrowIntentionList(true);
        $this->data['borrowSignAddressList']   = $this->dictionaryM->getBorrowSignAddressList(true);
        $this->data['borrowCreditLevelList']   = $this->dictionaryM->getBorrowCreditLevelList(true);
        $this->data['borrowSourceList']        = $this->dictionaryM->getBorrowSourceList(true);
        $this->view(__CLASS__. "/index" , $this->data);
    }
    function create() {
        $this->data['item']['value']       = '';
        $this->data['item']['status']      = '';
        $this->data['item']['type']        = '';
        $this->data['alertInfo']['value']  = '';
        $this->data['alertInfo']['status'] = '';
        $this->data['alertInfo']['type']   = '';
        $this->data['alertInfo']['result'] = '';
        $this->data['typeList'] = $this->dictionaryM->getTypeList();
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $this->data['typeList'] = $this->dictionaryM->getTypeList();
        $item = new stdClass();
        $item->value  = $_POST['value'];
        $item->status = $_POST['status'];
        $item->type   = $_POST['type'];
        $flag = true;
        $this->data['alertInfo']['value']  = '';
        $this->data['alertInfo']['status'] = '';
        $this->data['alertInfo']['type']   = '';
        $this->data['alertInfo']['result'] = '';
        $this->data['item']  = $_POST;
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,48}$/', $item->value)) {
            $alertInfo['value']  = '格式不正确！';
            $flag = false;
        }
        if ($item->type == '') {
            $alertInfo['type']  = '请选择！';
            $flag = false;
        }
        $baseUrl = base_url();
        if ($flag) {
            $id = $this->dictionaryM->insert($item);
            if ($id > 0) {
                echo "<script>alert('创建成功！');window.location.href='". $baseUrl. __CLASS__. "/index';</script>";
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/create", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/create", $this->data);
        }
    }
    function delete() {
        if ($this->permission) {
            echo $this->dictionaryM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>