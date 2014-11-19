<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('customerM');
        $this->load->model('auserM');
        $this->load->model('customerBankM');
        $this->load->model('dictionaryM');
        $this->load->model('customerInvestWayM');
        $this->load->model('creditRightM');
    }	
    function resetData() {
        $this->data['customer']['name']         = '';
        $this->data['customer']['number']        = '';
        $this->data['customer']['status']        = '';
        $this->data['customer']['email']        = '';
        $this->data['customer']['mobile']     = '';
        $this->data['customer']['idcard']       = '';
        $this->data['customer']['birthday']    = '';
        $this->data['customer']['phone']    = '';
        $this->data['customer']['fax']          = '';
        $this->data['customer']['homepage']    = '';
        $this->data['customer']['bill_addr']    = '';
        $this->data['customer']['bill_post']    = '';
        $this->data['customer']['intention']    = '';
        $this->data['customer']['acnt_sta']    = '';
        $this->data['customer']['acnt_date']    = '';
        $this->data['customer']['edu']    = '';
        $this->data['customer']['sex']    = '';
        $this->data['customer']['position']    = '';
        $this->data['customer']['company']    = '';
        $this->data['customer']['CRM']    = '';
        $this->data['customer']['cus_dev']    = '';
        $this->data['customer']['CAD']    = '';
        $this->data['customer']['source']    = '';
        $this->data['customer']['comment']    = '';
        $this->data['customer']['amount']    = '';
        $this->data['customer']['earning']    = '';
        $this->data['customer']['pay_mode']    = '';
        $this->data['customer']['invest_way']    = '';
    }
    function obtainData() {
        $customer = new stdClass();
        $customer->name      = $_POST['name'];
        $customer->number    = $_POST['number'];
        $customer->status    = $_POST['status'];
        $customer->email     = $_POST['email'];
        $customer->mobile    = $_POST['mobile'];
        $customer->idcard    = $_POST['idcard'];
        $customer->birthday  = $_POST['birthday'];
        $customer->phone     = $_POST['phone'];
        $customer->fax       = $_POST['fax'];
        $customer->homepage  = $_POST['homepage'];
        $customer->bill_addr = $_POST['bill_addr'];
        $customer->bill_post = $_POST['bill_post'];
        $customer->intention = $_POST['intention'];
        $customer->acnt_sta  = $_POST['acnt_sta'];
        $customer->acnt_date = $_POST['acnt_date'];
        $customer->edu       = $_POST['edu'];
        $customer->sex       = $_POST['sex'];
        $customer->position  = $_POST['position'];
        $customer->company   = $_POST['company'];
        $customer->CRM       = $_POST['CRM'];
        $customer->cus_dev   = $_POST['cus_dev'];
        $customer->CAD       = $_POST['CAD'];
        $customer->source    = $_POST['source'];
        $customer->comment   = $_POST['comment'];
        $customer->pay_mode   = $_POST['pay_mode'];
        $customer->crte_time = date('Y-m-d h:i:s', time());
        $customer->operator     = $_SESSION['userid'];
        $customer->amount   = $_POST['amount'];
        $customer->earning   = $_POST['earning'];
        $customer->invest_way   = $_POST['invest_way'];
        return $customer;
    }
    function setDictionary() {
        $this->data['investWayList'] = $this->customerInvestWayM->getList();
        $this->data['customerStatusList'] = $this->dictionaryM->getList("customer_status");
        $this->data['accountStatusList']  = $this->dictionaryM->getList("acnt_sta");
        $this->data['customerSourceList'] = $this->dictionaryM->getList("customer_source");
        $this->data['payModeList']        = $this->dictionaryM->getList("pay_mode");
    }
    function obtainCondition() {
        $this->data['condition']['name']      = isset($_POST['name'])      ? $_POST['name'] : '';
        $this->data['condition']['number']    = isset($_POST['number'])    ? $_POST['number'] : '';
        $this->data['condition']['status']    = isset($_POST['status'])    ? $_POST['status'] : '';
        $this->data['condition']['email']     = isset($_POST['email'])     ? $_POST['email'] : '';
        $this->data['condition']['mobile']    = isset($_POST['mobile'])    ? $_POST['mobile'] : '';
        $this->data['condition']['idcard']    = isset($_POST['idcard'])    ? $_POST['idcard'] : '';
        $this->data['condition']['birthday']  = isset($_POST['birthday'])  ? $_POST['birthday'] : '';
        $this->data['condition']['phone']     = isset($_POST['phone'])     ? $_POST['phone'] : '';
        $this->data['condition']['fax']       = isset($_POST['fax'])       ? $_POST['fax'] : '';
        $this->data['condition']['homepage']  = isset($_POST['homepage'])  ? $_POST['homepage'] : '';
        $this->data['condition']['bill_addr'] = isset($_POST['bill_addr']) ? $_POST['bill_addr'] : '';
        $this->data['condition']['bill_post'] = isset($_POST['bill_post']) ? $_POST['bill_post'] : '';
        $this->data['condition']['intention'] = isset($_POST['intention']) ? $_POST['intention'] : '';
        $this->data['condition']['acnt_sta']  = isset($_POST['acnt_sta'])  ? $_POST['acnt_sta'] : '';
        $this->data['condition']['acnt_date'] = isset($_POST['acnt_date']) ? $_POST['acnt_date'] : '';
        $this->data['condition']['edu']       = isset($_POST['edu'])       ? $_POST['edu'] : '';
        $this->data['condition']['sex']       = isset($_POST['sex'])       ? $_POST['sex'] : '';
        $this->data['condition']['position']  = isset($_POST['position'])  ? $_POST['position'] : '';
        $this->data['condition']['company']   = isset($_POST['company'])   ? $_POST['company'] : '';
        $this->data['condition']['CRM']       = isset($_POST['CRM'])       ? $_POST['CRM'] : '';
        $this->data['condition']['cus_dev']   = isset($_POST['cus_dev'])   ? $_POST['cus_dev'] : '';
        $this->data['condition']['CAD']       = isset($_POST['CAD'])       ? $_POST['CAD'] : '';
        $this->data['condition']['crte_time'] = isset($_POST['crte_time']) ? $_POST['crte_time'] : '';
        $this->data['condition']['operator']  = isset($_POST['operator'])  ? $_POST['operator'] : '';
        $this->data['condition']['source']    = isset($_POST['source'])    ? $_POST['source'] : '';
        $this->data['condition']['pay_mode']  = isset($_POST['pay_mode'])  ? $_POST['pay_mode'] : '';
        $this->data['condition']['comment']   = isset($_POST['comment'])   ? $_POST['comment'] : '';
    }
    function indexAll() {
        $this->index(true);
    }
    function index($isAll = false) { // TODO
        $this->obtainCondition();
        $this->data['customerList']       = $this->customerM->indexQuery($this->data['condition'], $isAll, $_SESSION['userid']);
        $this->setDictionary();
        $this->data['authorizedIndexAll'] = $isAll;
        $this->data['operatorList']            = $this->auserM->getCustomerCreateUserList();
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function validate($customer) {
        $flag = true;
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{6,16}$/', $customer->name)) {
            $this->data['alertInfo']['name']  = '姓名格式不正确！';
            $flag = false;
        }
        if (!is_numeric($customer->amount)) {
            $this->data['alertInfo']['amount']  = '请填数字！';
            $flag = false;
        }
        if (!is_numeric($customer->earning)) {
            $this->data['alertInfo']['earning']  = '请填数字！';
            $flag = false;
        }
        return $flag;
    }
    function create() {
        $this->resetData();
        $this->data['formAction'] = "createSubmit";
        $this->setDictionary();

        $this->view(__CLASS__. "/commonUpdate", $this->data);
    }
    function createSubmit() {
        $this->setDictionary();
        $this->data['formAction'] = "createSubmit";
        $customer = $this->obtainData();
        $id = $this->customerM->insert($customer);
        $this->data['customer'] = $_POST;
        if ($this->validate($customer)) {
            if ($id > 0) {
                echo "<script>alert('创建成功！'); </script>";
                $this->data['customer'] = $this->customerM->getOne($id);
                $this->view(__CLASS__. "/viewDetail", $this->data);
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/commonUpdate");
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/commonUpdate");
        }
    }
    function edit($id) {
        $this->data['formAction'] = "editSubmit";
        $this->session->set_userdata('idEditCustomer', $id);
        $this->setDictionary();
        $this->data['customer']           = $this->customerM->getOne($id);
        $this->view(__CLASS__. "/commonUpdate", $this->data);
    }
    function editSubmit() {
        $this->setDictionary();
        $this->data['customer'] = $_POST;
        $this->data['formAction'] = "editSubmit";
        $customer = $this->obtainData();
        $id = $this->session->userdata('idEditCustomer');
        $result = $this->customerM->update($id, $customer);
        if ($this->validate($customer)) {
            if ($result == 1) {
                echo "<script>alert('修改成功！'); </script>";
                $this->data['customer'] = $this->customerM->getOne($id);
                $this->view(__CLASS__. "/viewDetail", $this->data);
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/commonUpdate");
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/commonUpdate");
        }
    }
    function viewDetail($id) {
        $this->data['customerBankList']  = $this->customerBankM->getList($id);
        $this->data['creditRightList'] = $this->creditRightM->getByCustomer($id);
        $this->data['customer'] = $this->customerM->getOne($id);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
}
?>