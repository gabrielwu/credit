<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BorrowBank extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('borrowBankM');
        $this->load->model('regionProvinceM');
        $this->load->model('regionCityM');
        $this->load->model('regionCountyM');
        $this->load->model('bankM');
    }	
    function resetData() {
        $this->data['borrowBank']['province']      = '';
        $this->data['borrowBank']['city']          = '';
        $this->data['borrowBank']['county']        = '';
        $this->data['borrowBank']['bank']          = '';
        $this->data['borrowBank']['sub_bank']      = '';
        $this->data['borrowBank']['bank_username'] = '';
        $this->data['borrowBank']['cardID']        = '';
        $this->data['alertInfo']['province']       = '';
        $this->data['alertInfo']['city']           = '';
        $this->data['alertInfo']['county']         = '';
        $this->data['alertInfo']['bank']           = '';
        $this->data['alertInfo']['sub_bank']       = '分/支行名称不包括银行名';
        $this->data['alertInfo']['bank_username']  = '';
        $this->data['alertInfo']['cardID']         = '';
        $this->data['alertInfo']['result']         = '';
    }
    function setDictionary() {
        $this->data['provinceList'] = $this->regionProvinceM->getList();
        $this->data['cityList']     = $this->regionCityM->getList();
        $this->data['countyList']   = $this->regionCountyM->getList();
        $this->data['bankList']     = $this->bankM->getList();
    }
    function create($borrow_id) {
        $this->data['no_visible_elements'] = true;
        $this->setDictionary();
        $this->resetData();

        $this->session->set_userdata('borrowBank_borrow_id', $borrow_id);
        $this->data['borrow_id'] = $borrow_id;
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $this->data['no_visible_elements'] = true;
        $this->data['borrow_id'] = $this->session->userdata('borrowBank_borrow_id');
        $borrowBank = new stdClass();
        $borrowBank->borrow_id     = $this->session->userdata('borrowBank_borrow_id');
        $borrowBank->province      = $_POST['province'];
        $borrowBank->city          = $_POST['city'];
        $borrowBank->county        = $_POST['county'];
        $borrowBank->bank          = $_POST['bank'];
        $borrowBank->sub_bank      = $_POST['sub_bank'];
        $borrowBank->bank_username = $_POST['bank_username'];
        $borrowBank->cardID        = $_POST['cardID'];
        $flag = true;
        $this->setDictionary();
        $this->resetData();
        $this->data['borrowBank']  = $_POST;
        
        if ($borrowBank->bank == '') {
            $this->data['alertInfo']['bank']  = '请选择银行！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,64}$/', $borrowBank->sub_bank)) {
            $this->data['alertInfo']['sub_bank']  = '格式不正确！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $borrowBank->bank_username)) {
            $this->data['alertInfo']['bank_username']  = '格式不正确！';
            $flag = false;
        }
        if (!preg_match('/^[0-9]{6,32}$/', $borrowBank->cardID)) {
            $this->data['alertInfo']['cardID']  = '格式不正确！';
            $flag = false;
        }
        if ($flag) {
            $id = $this->borrowBankM->insert($borrowBank);
            if ($id > 0) {
                echo "<script>alert('创建成功！');window.returnValue='True';window.close(); </script>"; // TODO:refresh
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
            echo $this->borrowBankM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>