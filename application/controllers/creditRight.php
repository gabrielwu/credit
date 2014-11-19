<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CreditRight extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('creditRightM');
        $this->load->model('customerM');
        $this->load->model('borrowM');
        $this->load->model('dictionaryM');
        $this->load->model('auserM');
        $this->load->model('regionProvinceM');
        $this->load->model('regionCityM');
        $this->load->model('regionCountyM');
        $this->load->model('bankM');
    }	
    function resetData() {
        $this->data['creditRight']['match_amount']        = '';
        $this->data['creditRight']['months']              = '';

        $this->data['creditRight']['borrow_cost']         = '';
        $this->data['creditRight']['matched_amount']      = '';
        $this->data['creditRight']['match_need']          = '';
        $this->data['creditRight']['customer_name']       = '';
        $this->data['creditRight']['customer_id']         = '';
        $this->data['creditRight']['customer_can_match']  = '';
        $this->data['creditRight']['customer_months_max'] = '';

        $this->data['alertInfo']['match_amount']          = '';
        $this->data['alertInfo']['months']                = '';
        $this->data['alertInfo']['result']                = '';

        $borrow_id = $this->session->userdata('creditRight_borrow_id');
        $this->data['creditRight']['borrow_cost']         = $this->data['borrow']['borrow_cost'];
        $this->data['creditRight']['matched_amount'] = $this->creditRightM->matchedAmount($borrow_id);
        $this->data['creditRight']['match_need'] = $this->data['borrow']['borrow_cost'] - $this->data['creditRight']['matched_amount'];
    }
    function setDictionary() {
        $this->data['provinceList'] = $this->regionProvinceM->getList();
        $this->data['cityList']     = $this->regionCityM->getList();
        $this->data['countyList']   = $this->regionCountyM->getList();
        $this->data['bankList']     = $this->bankM->getList();
    }
    function obtainCondition() {
        //$condition = array();
        $condition['number']         = isset($_POST['number'])       ? $_POST['number'] : '';
        $condition['name']           = isset($_POST['name'])         ? $_POST['name'] : '';
        $condition['ename']          = isset($_POST['ename'])        ? $_POST['ename'] : '';
        $condition['email']          = isset($_POST['email'])        ? $_POST['email'] : '';
        $condition['phone']          = isset($_POST['phone'])        ? $_POST['phone'] : '';
        $condition['birthday']       = isset($_POST['birthday'])     ? $_POST['birthday'] : '';
        $condition['idcard']         = isset($_POST['idcard'])       ? $_POST['idcard'] : '';
        $condition['idaddress']      = isset($_POST['idaddress'])    ? $_POST['idaddress'] : '';
        $condition['education']      = isset($_POST['education'])    ? $_POST['education'] : '';
        $condition['telephone']      = isset($_POST['telephone'])    ? $_POST['telephone'] : '';
        $condition['sex']            = isset($_POST['sex'])          ? $_POST['sex'] : '';
        $condition['fax']            = isset($_POST['fax'])          ? $_POST['fax'] : '';
        $condition['province']       = isset($_POST['province'])     ? $_POST['province'] : '';
        $condition['city']           = isset($_POST['city'])         ? $_POST['city'] : '';
        $condition['county']         = isset($_POST['county'])       ? $_POST['county'] : '';
        $condition['work_address']   = isset($_POST['work_address']) ? $_POST['work_address'] : '';
        $condition['home_address']   = isset($_POST['home_address']) ? $_POST['home_address'] : '';
        $condition['mail_address']   = isset($_POST['mail_address']) ? $_POST['mail_address'] : '';
        $condition['zip_code']       = isset($_POST['zip_code'])     ? $_POST['zip_code'] : '';
        $condition['status']         = isset($_POST['status'])       ? $_POST['status'] : '';
        $condition['intention']      = isset($_POST['intention'])    ? $_POST['intention'] : '';
        $condition['account_date']   = isset($_POST['account_date']) ? $_POST['account_date'] : '';
        $condition['account_status'] = isset($_POST['account_status']) ? $_POST['account_status'] : '';
        $condition['sign_date']      = isset($_POST['sign_date'])    ? $_POST['sign_date'] : '';
        $condition['comment']        = isset($_POST['comment'])      ? $_POST['comment'] : '';
        $condition['money_sum']      = isset($_POST['money_sum'])    ? $_POST['money_sum'] : '';
        $condition['job']            = isset($_POST['job'])          ? $_POST['job'] : '';
        $condition['position']       = isset($_POST['position'])     ? $_POST['position'] : '';
        $condition['sign_address']   = isset($_POST['sign_address']) ? $_POST['sign_address'] : '';
        $condition['purpose']        = isset($_POST['purpose'])      ? $_POST['purpose'] : '';
        $condition['company']        = isset($_POST['company'])      ? $_POST['company'] : '';
        $condition['CRM']            = isset($_POST['CRM'])          ? $_POST['CRM'] : '';
        $condition['develop']        = isset($_POST['develop'])      ? $_POST['develop'] : '';
        $condition['source']         = isset($_POST['source'])       ? $_POST['source'] : '';
        $condition['income']         = isset($_POST['income'])       ? $_POST['income'] : '';
        $condition['credit_level']   = isset($_POST['credit_level']) ? $_POST['credit_level'] : '';
        $condition['months']         = isset($_POST['months'])       ? $_POST['months'] : '';
        $condition['type']           = isset($_POST['type'])         ? $_POST['type'] : '';
        $condition['joint_name']     = isset($_POST['joint_name'])   ? $_POST['joint_name'] : '';
        $condition['joint_phone']    = isset($_POST['joint_phone'])  ? $_POST['joint_phone'] : '';
        $condition['joint_idcard']   = isset($_POST['joint_idcard']) ? $_POST['joint_idcard'] : '';
        $condition['create_time']    = isset($_POST['create_time'])  ? $_POST['create_time'] : '';
        $condition['operator']       = isset($_POST['operator'])     ? $_POST['operator'] : '' ;// TODO: all borrows?

        $condition['contact']['name']  = isset($_POST['contact']['name'])  ? $_POST['contact']['name'] : '' ;
        $condition['contact']['phone'] = isset($_POST['contact']['phone']) ? $_POST['contact']['phone'] : '' ;
        //var_dump($condition['contact']);
        //var_dump($_POST['contact']);
        return $condition;
    }
    function obtainConditionCustomer() {
        $condition['name']      = isset($_POST['name'])      ? $_POST['name'] : '';
        $condition['number']    = isset($_POST['number'])    ? $_POST['number'] : '';
        $condition['status']    = isset($_POST['status'])    ? $_POST['status'] : '';
        $condition['email']     = isset($_POST['email'])     ? $_POST['email'] : '';
        $condition['mobile']    = isset($_POST['mobile'])    ? $_POST['mobile'] : '';
        $condition['idcard']    = isset($_POST['idcard'])    ? $_POST['idcard'] : '';
        $condition['birthday']  = isset($_POST['birthday'])  ? $_POST['birthday'] : '';
        $condition['phone']     = isset($_POST['phone'])     ? $_POST['phone'] : '';
        $condition['fax']       = isset($_POST['fax'])       ? $_POST['fax'] : '';
        $condition['homepage']  = isset($_POST['homepage'])  ? $_POST['homepage'] : '';
        $condition['bill_addr'] = isset($_POST['bill_addr']) ? $_POST['bill_addr'] : '';
        $condition['bill_post'] = isset($_POST['bill_post']) ? $_POST['bill_post'] : '';
        $condition['intention'] = isset($_POST['intention']) ? $_POST['intention'] : '';
        $condition['acnt_sta']  = isset($_POST['acnt_sta'])  ? $_POST['acnt_sta'] : '';
        $condition['acnt_date'] = isset($_POST['acnt_date']) ? $_POST['acnt_date'] : '';
        $condition['edu']       = isset($_POST['edu'])       ? $_POST['edu'] : '';
        $condition['sex']       = isset($_POST['sex'])       ? $_POST['sex'] : '';
        $condition['position']  = isset($_POST['position'])  ? $_POST['position'] : '';
        $condition['company']   = isset($_POST['company'])   ? $_POST['company'] : '';
        $condition['CRM']       = isset($_POST['CRM'])       ? $_POST['CRM'] : '';
        $condition['cus_dev']   = isset($_POST['cus_dev'])   ? $_POST['cus_dev'] : '';
        $condition['CAD']       = isset($_POST['CAD'])       ? $_POST['CAD'] : '';
        $condition['crte_time'] = isset($_POST['crte_time']) ? $_POST['crte_time'] : '';
        $condition['operator']  = isset($_POST['operator'])  ? $_POST['operator'] : '';
        $condition['source']    = isset($_POST['source'])    ? $_POST['source'] : '';
        $condition['pay_mode']  = isset($_POST['pay_mode'])  ? $_POST['pay_mode'] : '';
        $condition['comment']   = isset($_POST['comment'])   ? $_POST['comment'] : '';
    }
    function index() { // TODO
        $this->data['borrowStatusList']        = $this->dictionaryM->getBorrowStatusList(true);
        $this->data['borrowAccountStatusList'] = $this->dictionaryM->getBorrowAccountStatusList(true);
        $this->data['borrowIntentionList']     = $this->dictionaryM->getBorrowIntentionList(true);
        $this->data['borrowSignAddressList']   = $this->dictionaryM->getBorrowSignAddressList(true);
        $this->data['operatorList']            = $this->auserM->getBorrowCreateUserList();
        $this->data['condition']  = $this->obtainCondition();
        $i = sizeof($this->data['borrowStatusList']) - 1;
        $statusName = $this->data['borrowStatusList'][$i]['value'];
        $this->data['borrowList'] = $this->borrowM->getListByStatus($this->data['condition'], $statusName);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function create($borrow_id) {
        $this->data['no_visible_elements'] = true;
        $this->setDictionary();
        $this->session->set_userdata('creditRight_borrow_id', $borrow_id);
        $this->data['borrow_id'] = $borrow_id;
        $this->data['borrow'] = $this->borrowM->get($borrow_id);
        $this->resetData();

        $this->data['condition']  = $this->obtainConditionCustomer();

        $this->data['customerList']       = $this->customerM->indexQueryCreditRight($this->data['condition']);
        $this->data['customerStatusList'] = $this->dictionaryM->getList("customer_status");
        $this->data['accountStatusList']  = $this->dictionaryM->getList("acnt_sta");
        $this->data['customerSourceList'] = $this->dictionaryM->getList("customer_source");
        $this->data['payModeList']        = $this->dictionaryM->getList("pay_mode");
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $this->data['no_visible_elements'] = true;
        $this->data['borrow_id'] = $this->session->userdata('creditRight_borrow_id');
        $this->data['borrow'] = $this->borrowM->get($this->data['borrow_id']);
        $creditRight = new stdClass();
        $creditRight->borrow_id    = $this->session->userdata('creditRight_borrow_id');
        $creditRight->customer_id  = $_POST['customer_id'];
        $creditRight->match_amount = $_POST['match_amount'];
        $creditRight->months       = $_POST['months'];
        $creditRight->create_time  = date('Y-m-d h:i:s', time());
        $creditRight->operator     = $_SESSION['userid'];

        $flag = true;
        $this->setDictionary();
        $this->resetData();
        $this->data['creditRight']  = $_POST;
        
        $this->data['condition']  = $this->obtainConditionCustomer();

        $this->data['customerList']       = $this->customerM->indexQueryCreditRight($this->data['condition']);
        $this->data['customerStatusList'] = $this->dictionaryM->getList("customer_status");
        $this->data['accountStatusList']  = $this->dictionaryM->getList("acnt_sta");
        $this->data['customerSourceList'] = $this->dictionaryM->getList("customer_source");
        $this->data['payModeList']        = $this->dictionaryM->getList("pay_mode");
        if (!is_numeric($creditRight->match_amount)) {
            $this->data['alertInfo']['match_amount']  = '请填数字！';
            $flag = false;
        } else if ($_POST['customer_can_match'] < $creditRight->match_amount) {
            $this->data['alertInfo']['match_amount']  = '该理财客户没有足够匹配金额！';
            $flag = false;
        } else if ($_POST['match_need'] < $creditRight->match_amount) {
            $this->data['alertInfo']['match_amount']  = '超出该借款客户所需匹配金额！';
            $flag = false;
        }
        if (!is_numeric($creditRight->match_amount)) {
            $this->data['alertInfo']['match_amount']  = '请填数字！';
            $flag = false;
        }
        if (!is_numeric($creditRight->months)) {
            $this->data['alertInfo']['months']  = '请填数字！';
            $flag = false;
        }
        if ($creditRight->match_amount == "") {
            $this->data['alertInfo']['match_amount']  = '请填写！';
            $flag = false;
        }
        if ($creditRight->months == "") {
            $this->data['alertInfo']['months']  = '请填写！';
            $flag = false;
        }
        if ($flag) {
            $id = $this->creditRightM->insert($creditRight);
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
    function viewDetail($borrow_id) {
        $this->data['no_visible_elements'] = true;
        $this->data['creditRightList'] = $this->creditRightM->getByBorrow($borrow_id);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function delete() {
        if ($this->permission) {
            echo $this->creditRightM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>