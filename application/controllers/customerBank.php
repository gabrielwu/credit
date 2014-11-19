<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CustomerBank extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('customerBankM');
        $this->load->model('regionProvinceM');
        $this->load->model('regionCityM');
        $this->load->model('regionCountyM');
        $this->load->model('bankM');
    }	
    function resetData() {
        $this->data['customerBank']['province']      = '';
        $this->data['customerBank']['city']          = '';
        $this->data['customerBank']['county']        = '';
        $this->data['customerBank']['bank']          = '';
        $this->data['customerBank']['sub_bank']      = '';
        $this->data['customerBank']['bank_username'] = '';
        $this->data['customerBank']['cardID']        = '';
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
    function create($customer_id) {
        $this->data['no_visible_elements'] = true;
        $this->setDictionary();
        $this->resetData();

        $this->session->set_userdata('customerBank_customer_id', $customer_id);
        $this->data['customer_id'] = $customer_id;
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $this->data['no_visible_elements'] = true;
        $this->data['customer_id'] = $this->session->userdata('customerBank_customer_id');
        $customerBank = new stdClass();
        $customerBank->customer_id     = $this->session->userdata('customerBank_customer_id');
        $customerBank->province      = $_POST['province'];
        $customerBank->city          = $_POST['city'];
        $customerBank->county        = $_POST['county'];
        $customerBank->bank          = $_POST['bank'];
        $customerBank->sub_bank      = $_POST['sub_bank'];
        $customerBank->bank_username = $_POST['bank_username'];
        $customerBank->cardID        = $_POST['cardID'];
        $flag = true;
        $this->setDictionary();
        $this->resetData();
        $this->data['customerBank']  = $_POST;
        
        if ($customerBank->bank == '') {
            $this->data['alertInfo']['bank']  = '请选择银行！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,64}$/', $customerBank->sub_bank)) {
            $this->data['alertInfo']['sub_bank']  = '格式不正确！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $customerBank->bank_username)) {
            $this->data['alertInfo']['bank_username']  = '格式不正确！';
            $flag = false;
        }
        if (!preg_match('/^[0-9]{6,32}$/', $customerBank->cardID)) {
            $this->data['alertInfo']['cardID']  = '格式不正确！';
            $flag = false;
        }
        if ($flag) {
            $id = $this->customerBankM->insert($customerBank);
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
            echo $this->customerBankM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>