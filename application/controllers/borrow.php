<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Borrow extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('borrowM');
        $this->load->model('bankM');
        $this->load->model('borrowAttachmentM');
        $this->load->model('borrowAuditM');
        $this->load->model('borrowBankM');
        $this->load->model('borrowContactM');
        $this->load->model('borrowCustomerM');
        $this->load->model('dictionaryM');
        $this->load->model('regionProvinceM');
        $this->load->model('regionCityM');
        $this->load->model('regionCountyM');
        $this->load->model('borrowTypeM');
        $this->load->model('auserM');
        $this->load->model('userM');
        $this->load->model('creditRightM');
    }	
    function resetData() {
        $this->data['borrow']['name']         = '';
        $this->data['borrow']['ename']        = '';
        $this->data['borrow']['email']        = '';
        $this->data['borrow']['phone']        = '';
        $this->data['borrow']['birthday']     = '';
        $this->data['borrow']['idcard']       = '';
        $this->data['borrow']['idaddress']    = '';
        $this->data['borrow']['education']    = '';
        $this->data['borrow']['telephone']    = '';
        $this->data['borrow']['sex']          = '';
        $this->data['borrow']['fax']          = '';
        $this->data['borrow']['province']     = '';
        $this->data['borrow']['city']         = '';
        $this->data['borrow']['county']       = '';
        $this->data['borrow']['work_address'] = '';
        $this->data['borrow']['home_address'] = '';
        $this->data['borrow']['mail_address'] = '';
        $this->data['borrow']['zip_code']     = '';
        $this->data['borrow']['status']       = '';
        $this->data['borrow']['intention']    = '';
        $this->data['borrow']['account_date'] = '';
        $this->data['borrow']['sign_date']    = '';
        $this->data['borrow']['comment']      = '';
        $this->data['borrow']['money_sum']    = '';
        $this->data['borrow']['job']          = '';
        $this->data['borrow']['position']     = '';
        $this->data['borrow']['sign_address'] = '';
        $this->data['borrow']['purpose']      = '';
        $this->data['borrow']['company']      = '';
        $this->data['borrow']['CRM']          = '';
        $this->data['borrow']['develop']      = '';
        $this->data['borrow']['source']       = '';
        $this->data['borrow']['income']       = '';
        $this->data['borrow']['credit_level'] = '';
        $this->data['borrow']['months']       = '';
        $this->data['borrow']['type']         = '';
        $this->data['borrow']['joint_name']   = '';
        $this->data['borrow']['joint_phone']  = '';
        $this->data['borrow']['joint_idcard'] = '';

        $this->data['borrow']['account_status'] = '';
        $this->data['borrow']['bank'] = '';
        $this->data['borrow']['sub_bank'] = '';
        $this->data['borrow']['bank_cardID'] = '';
        $this->data['borrow']['bank_SWIFT_code'] = '';
        $this->data['borrow']['audit_money_sum'] = '';
        $this->data['borrow']['audit_months'] = '';
        $this->data['borrow']['load_date'] = '';
        $this->data['borrow']['first_repay_date'] = '';
        $this->data['borrow']['borrow_cost'] = '';
        $this->data['borrow']['repay_per_month'] = '';
        $this->data['borrow']['handle_charge'] = '';
        $this->data['borrow']['venture_capital'] = '';
        $this->data['borrow']['interest_spread'] = '';

        $this->data['alertInfo']['name']         = '';
        $this->data['alertInfo']['ename']        = '';
        $this->data['alertInfo']['email']        = '';
        $this->data['alertInfo']['phone']        = '';
        $this->data['alertInfo']['birthday']     = '';
        $this->data['alertInfo']['idcard']       = '';
        $this->data['alertInfo']['idaddress']    = '';
        $this->data['alertInfo']['education']    = '';
        $this->data['alertInfo']['telephone']    = '';
        $this->data['alertInfo']['sex']          = '';
        $this->data['alertInfo']['fax']          = '';
        $this->data['alertInfo']['province']     = '';
        $this->data['alertInfo']['city']         = '';
        $this->data['alertInfo']['county']       = '';
        $this->data['alertInfo']['work_address'] = '';
        $this->data['alertInfo']['home_address'] = '';
        $this->data['alertInfo']['mail_address'] = '';
        $this->data['alertInfo']['zip_code']     = '';
        $this->data['alertInfo']['status']       = '';
        $this->data['alertInfo']['intention']    = '';
        $this->data['alertInfo']['account_date'] = '';
        $this->data['alertInfo']['sign_date']    = '';
        $this->data['alertInfo']['comment']      = '';
        $this->data['alertInfo']['money_sum']    = '';
        $this->data['alertInfo']['job']          = '';
        $this->data['alertInfo']['position']     = '';
        $this->data['alertInfo']['sign_address'] = '';
        $this->data['alertInfo']['purpose']      = '';
        $this->data['alertInfo']['company']      = '';
        $this->data['alertInfo']['CRM']          = '';
        $this->data['alertInfo']['develop']      = '';
        $this->data['alertInfo']['source']       = '';
        $this->data['alertInfo']['income']       = '';
        $this->data['alertInfo']['credit_level'] = '';
        $this->data['alertInfo']['months']       = '';
        $this->data['alertInfo']['type']         = '';
        $this->data['alertInfo']['joint_name']   = '';
        $this->data['alertInfo']['joint_phone']  = '';
        $this->data['alertInfo']['joint_idcard'] = '';

        
        $this->data['alertInfo']['account_status'] = '';
        $this->data['alertInfo']['bank'] = '';
        $this->data['alertInfo']['sub_bank'] = '';
        $this->data['alertInfo']['bank_cardID'] = '';
        $this->data['alertInfo']['bank_SWIFT_code'] = '';
        $this->data['alertInfo']['audit_money_sum'] = '';
        $this->data['alertInfo']['audit_months'] = '';
        $this->data['alertInfo']['load_date'] = '';
        $this->data['alertInfo']['first_repay_date'] = '';
        $this->data['alertInfo']['borrow_cost'] = '';
        $this->data['alertInfo']['repay_per_month'] = '';
        $this->data['alertInfo']['handle_charge'] = '';
        $this->data['alertInfo']['venture_capital'] = '';
        $this->data['alertInfo']['interest_spread'] = '';
        
        $this->data['alertInfo']['result']    = '';
    }
    function obtainData($request = false) {
        $borrow = new stdClass();
        $borrow->name         = $_POST['name'];
        $borrow->ename        = $_POST['ename'];
        $borrow->email        = $_POST['email'];
        $borrow->phone        = $_POST['phone'];
        $borrow->birthday     = $_POST['birthday'];
        $borrow->idcard       = $_POST['idcard'];
        $borrow->idaddress    = $_POST['idaddress'];
        $borrow->education    = $_POST['education'];
        $borrow->telephone    = $_POST['telephone'];
        $borrow->sex          = $_POST['sex'];
        $borrow->fax          = $_POST['fax'];
        $borrow->province     = $_POST['province'];
        $borrow->city         = $_POST['city'];
        $borrow->county       = $_POST['county'];
        $borrow->work_address = $_POST['work_address'];
        $borrow->home_address = $_POST['home_address'];
        $borrow->mail_address = $_POST['mail_address'];
        $borrow->zip_code     = $_POST['zip_code'];
        $borrow->status       = $_POST['status'];
        $borrow->intention    = $_POST['intention'];
        $borrow->account_date = $_POST['account_date'];
        $borrow->sign_date    = $_POST['sign_date'];
        $borrow->comment      = $_POST['comment'];
        $borrow->money_sum    = $_POST['money_sum'];
        $borrow->job          = $_POST['job'];
        $borrow->position     = $_POST['position'];
        $borrow->sign_address = $_POST['sign_address'];
        $borrow->purpose      = $_POST['purpose'];
        $borrow->company      = $_POST['company'];
        $borrow->CRM          = $_POST['CRM'];
        $borrow->develop      = $_POST['develop'];
        $borrow->source       = $_POST['source'];
        $borrow->income       = $_POST['income'];
        $borrow->credit_level = $_POST['credit_level'];
        $borrow->months       = $_POST['months'];
        $borrow->type         = $_POST['type'];
        $borrow->joint_name   = $_POST['joint_name'];
        $borrow->joint_phone  = $_POST['joint_phone'];
        $borrow->joint_idcard = $_POST['joint_idcard'];
        $borrow->account_status   = $_POST['account_status'];
        $borrow->bank             = $_POST['bank'];
        $borrow->sub_bank         = $_POST['sub_bank'];
        $borrow->bank_cardID      = $_POST['bank_cardID'];
        $borrow->bank_SWIFT_code  = $_POST['bank_SWIFT_code'];
        $borrow->audit_money_sum  = $_POST['audit_money_sum'];
        $borrow->audit_months     = $_POST['audit_months'];
        $borrow->load_date        = $_POST['load_date'];
        $borrow->first_repay_date = $_POST['first_repay_date'];
        $borrow->borrow_cost      = $_POST['borrow_cost'];
        $borrow->repay_per_month  = $_POST['repay_per_month'];
        $borrow->handle_charge    = $_POST['handle_charge'];
        $borrow->venture_capital  = $_POST['venture_capital'];
        $borrow->interest_spread  = $_POST['interest_spread'];

        if (!$request) $borrow->create_time  = date('Y-m-d h:i:s', time());
        $borrow->operator     = $_SESSION['userid'];
        return $borrow;
    }
    function obtainData2(&$borrow) {
        $borrow->name         = $_POST['name'];
        $borrow->ename        = $_POST['ename'];
        $borrow->email        = $_POST['email'];
        $borrow->phone        = $_POST['phone'];
        $borrow->birthday     = $_POST['birthday'];
        $borrow->idcard       = $_POST['idcard'];
        $borrow->idaddress    = $_POST['idaddress'];
        $borrow->education    = $_POST['education'];
        $borrow->telephone    = $_POST['telephone'];
        $borrow->sex          = $_POST['sex'];
        $borrow->fax          = $_POST['fax'];
        $borrow->province     = $_POST['province'];
        $borrow->city         = $_POST['city'];
        $borrow->county       = $_POST['county'];
        $borrow->work_address = $_POST['work_address'];
        $borrow->home_address = $_POST['home_address'];
        $borrow->mail_address = $_POST['mail_address'];
        $borrow->zip_code     = $_POST['zip_code'];
        $borrow->status       = $_POST['status'];
        $borrow->intention    = $_POST['intention'];
        $borrow->account_date = $_POST['account_date'];
        $borrow->sign_date    = $_POST['sign_date'];
        $borrow->comment      = $_POST['comment'];
        $borrow->money_sum    = $_POST['money_sum'];
        $borrow->job          = $_POST['job'];
        $borrow->position     = $_POST['position'];
        $borrow->sign_address = $_POST['sign_address'];
        $borrow->purpose      = $_POST['purpose'];
        $borrow->company      = $_POST['company'];
        $borrow->CRM          = $_POST['CRM'];
        $borrow->develop      = $_POST['develop'];
        $borrow->source       = $_POST['source'];
        $borrow->income       = $_POST['income'];
        $borrow->credit_level = $_POST['credit_level'];
        $borrow->months       = $_POST['months'];
        $borrow->type         = $_POST['type'];
        $borrow->joint_name   = $_POST['joint_name'];
        $borrow->joint_phone  = $_POST['joint_phone'];
        $borrow->joint_idcard = $_POST['joint_idcard'];
        $borrow->account_status   = $_POST['account_status'];
        $borrow->bank             = $_POST['bank'];
        $borrow->sub_bank         = $_POST['sub_bank'];
        $borrow->bank_cardID      = $_POST['bank_cardID'];
        $borrow->bank_SWIFT_code  = $_POST['bank_SWIFT_code'];
        $borrow->audit_money_sum  = $_POST['audit_money_sum'];
        $borrow->audit_months     = $_POST['audit_months'];
        $borrow->load_date        = $_POST['load_date'];
        $borrow->first_repay_date = $_POST['first_repay_date'];
        $borrow->borrow_cost      = $_POST['borrow_cost'];
        $borrow->repay_per_month  = $_POST['repay_per_month'];
        $borrow->handle_charge    = $_POST['handle_charge'];
        $borrow->venture_capital  = $_POST['venture_capital'];
        $borrow->interest_spread  = $_POST['interest_spread'];
        return $borrow;        
    }
    function setDictionary() {
        $this->data['provinceList']            = $this->regionProvinceM->getList();
        $this->data['cityList']                = $this->regionCityM->getList();
        $this->data['countyList']              = $this->regionCountyM->getList();
        $this->data['borrowStatusList']        = $this->dictionaryM->getBorrowStatusList();
        $this->data['borrowAccountStatusList'] = $this->dictionaryM->getBorrowAccountStatusList();
        $this->data['borrowIntentionList']     = $this->dictionaryM->getBorrowIntentionList();
        $this->data['borrowSourceList']        = $this->dictionaryM->getBorrowSourceList();
        $this->data['borrowCreditLevelList']   = $this->dictionaryM->getBorrowCreditLevelList();
        $this->data['borrowSignAddressList']   = $this->dictionaryM->getBorrowSignAddressList();
        $this->data['borrowMonthsList']        = $this->borrowTypeM->getMonthsList();
        $this->data['borrowTypeList']          = $this->borrowTypeM->getList();
        $this->data['bankList']                = $this->bankM->getList();
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
    function generateNumber($borrow) {
        $num = "";
        $sameBorrowerCnt = $this->borrowM->sameBorrowerCnt($borrow);
        $prefix = "JD-";
        $places = 8;
        if ($sameBorrowerCnt == 0) {
            $digit  = $this->borrowM->getDistincBorrowerCount();
            //echo $digit. "<br>";
            $digit  = substr(strval($digit + pow(10, $places)), 1, $places);
            $num    = $prefix. $digit;
        } else {
            $tail = "(". ($sameBorrowerCnt + 1). ")";
            $pre_num = $this->borrowM->getNumber($borrow);
            $num = substr($pre_num, 0, strlen($prefix) + 8). $tail;
        }
        return $num;
    }
    function validate($borrow) {
        // TODO: validate
        $flag = true;
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{6,16}$/', $borrow->name)) {
            $this->data['alertInfo']['name']  = '姓名格式不正确！';
            $flag = false;
        }
        if ($borrow->phone == "") {
            $this->data['alertInfo']['phone']  = '请填写！';
            $flag = false;
        }
        if ($borrow->idcard == "") {
            $this->data['alertInfo']['idcard']  = '请填写！';
            $flag = false;
        }
        if ($borrow->fax == "") {
            $this->data['alertInfo']['fax']  = '请填写！';
            $flag = false;
        }
        if ($borrow->province == "") {
            $this->data['alertInfo']['province']  = '请填写！';
            $flag = false;
        }
        if ($borrow->city == "") {
            $this->data['alertInfo']['city']  = '请填写！';
            $flag = false;
        }
        if ($borrow->county == "") {
            $this->data['alertInfo']['county']  = '请填写！';
            $flag = false;
        }
        if ($borrow->work_address == "") {
            $this->data['alertInfo']['work_address']  = '请填写！';
            $flag = false;
        }
        if ($borrow->home_address == "") {
            $this->data['alertInfo']['home_address']  = '请填写！';
            $flag = false;
        }
        if ($borrow->zip_code == "") {
            $this->data['alertInfo']['zip_code']  = '请填写！';
            $flag = false;
        }
        if ($borrow->money_sum == "") {
            $this->data['alertInfo']['money_sum']  = '请填写！';
            $flag = false;
        }
        if ($borrow->purpose == "") {
            $this->data['alertInfo']['purpose']  = '请填写！';
            $flag = false;
        }
        if ($borrow->job == "") {
            $this->data['alertInfo']['job']  = '请填写！';
            $flag = false;
        }
        if ($borrow->position == "") {
            $this->data['alertInfo']['position']  = '请填写！';
            $flag = false;
        }
        return $flag;
    }
    function indexAll() {
        $this->index(true);
    }
    function index($isAll = false) { // TODO
        $this->data['borrowStatusList']        = $this->dictionaryM->getBorrowStatusList(true);
        $this->data['borrowAccountStatusList'] = $this->dictionaryM->getBorrowAccountStatusList(true);
        $this->data['borrowIntentionList']     = $this->dictionaryM->getBorrowIntentionList(true);
        $this->data['borrowSignAddressList']   = $this->dictionaryM->getBorrowSignAddressList(true);
        $this->data['operatorList']            = $this->auserM->getBorrowCreateUserList();
        $this->data['condition']  = $this->obtainCondition();
        $this->data['borrowList'] = $this->borrowM->getList($this->data['condition'], $isAll, $_SESSION['userid']);
        $this->data['authorizedIndexAll'] = $isAll;
        $this->data['action'] = $isAll ? "indexAll" : "index";
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function requestIndex() { // TODO
        $this->data['borrowStatusList']        = $this->dictionaryM->getBorrowStatusList(true);
        $this->data['borrowAccountStatusList'] = $this->dictionaryM->getBorrowAccountStatusList(true);
        $this->data['borrowIntentionList']     = $this->dictionaryM->getBorrowIntentionList(true);
        $this->data['borrowSignAddressList']   = $this->dictionaryM->getBorrowSignAddressList(true);
        $this->data['operatorList']            = $this->auserM->getBorrowCreateUserList();
        $this->data['condition']  = $this->obtainCondition();
        //var_dump($this->data['condition']);
        $this->data['borrowList'] = $this->borrowM->getRequestList($this->data['condition']);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function editRequestList() { // TODO
        $condition = $this->obtainCondition();
        $this->data['condition'] = $condition;
        $this->data['borrows_request']   = $this->borrowM->getListRequest($condition);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function create() {
        $this->resetData();
        $this->setDictionary();
        $this->data['formAction'] = "createSubmit";
        $this->data['pageTitle']  = "创建借款客户";
        $this->view(__CLASS__. "/commonUpdate");
    }
    function createSubmit() {
        $borrow = $this->obtainData();
        $borrow->number = $this->generateNumber($borrow);
        $this->resetData();
        $this->setDictionary();
        $this->data['borrow'] = $_POST;
        $this->data['formAction'] = "createSubmit";
        $this->data['pageTitle']  = "创建借款客户";
        $flag = $this->validate($borrow);
        $baseUrl = base_url();
        if ($flag) {
            $id = $this->borrowM->insert($borrow);
            $flag = $id > 0 ? true : false;
        } 

        if ($flag) {
            echo "<script>alert('创建成功！');window.location.href='". $baseUrl. __CLASS__. "/viewDetail/$id';</script>";
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/commonUpdate");
        }
    }
    function editRequest($id) {
        $this->resetData();
        $this->setDictionary();
        $_id = $this->borrowM->isRequest($id);
        $baseUrl = base_url();
        if ($_id != false) {
            echo "<script>alert('已提交变更申请，请等待审核！');window.location.href='". $baseUrl. __CLASS__. "/viewRequest/$_id';</script>";
        } else {
            $this->data['borrow']  = $this->borrowM->get($id);
            $this->session->set_userdata('borrow_id_request', $id);
            $this->data['formAction'] = "editRequestSubmit";
            $this->data['pageTitle']  = "借款客户变更申请";
            $this->view(__CLASS__. "/commonUpdate");
        }
    }
    function editRequestSubmit() {
        //var_dump($_POST);
        $id = $this->session->userdata('borrow_id_request');
        $borrow_ori = $this->borrowM->getColumns($id);
        $borrow_ori_obj = (object)$borrow_ori;
        $_id = $this->borrowM->insertRequest($borrow_ori_obj);
        $borrow = $this->obtainData(true);
        //echo $borrow->birthday;
        //echo $_id;
        $borrow->id = $id;
        $this->resetData();
        $this->data['borrow']  = $_POST;
        $this->data['formAction'] = "editRequestSubmit";
        $this->data['pageTitle']  = "借款客户变更申请";
        $flag = $this->validate($borrow);
        $baseUrl = base_url();
        if ($flag) {
            $this->borrowM->updateRequest($_id, $borrow);
            $flag = $_id > 0 ? true : false;
        } 
        if ($flag) {
            $this->view(__CLASS__. "/commonUpdate");
            echo "<script>alert('变更申请创建成功！');window.location.href='". $baseUrl. __CLASS__. "/viewRequest/$_id';</script>";
        } else {
            $this->data['alertInfo']['result'] = '变更申请失败！';
            $this->view(__CLASS__. "/commonUpdate");
        }
    }
    function viewDetail($id) {
        $this->data['attachment_type1_name'] = "附件";
        $this->data['attachment_type2_name'] = "合同附件";
        $this->data['attachment_type3_name'] = "实地考察照片及审核表";
        $this->data['attachment_type4_name'] = "贷款申请资料";
        $this->data['borrow'] = $this->borrowM->get($id);
        $this->data['borrowAuditList'] = $this->borrowAuditM->getList($id);
        $this->data['borrowBankList']  = $this->borrowBankM->getList($id);
        $this->data['borrowContactList']  = $this->borrowContactM->getList($id);
        //var_dump($this->data['borrowBankList']);
        $this->data['borrowAttachment1List'] = $this->borrowAttachmentM->getList($id, 1);
        $this->data['borrowAttachment2List'] = $this->borrowAttachmentM->getList($id, 2);
        $this->data['borrowAttachment3List'] = $this->borrowAttachmentM->getList($id, 3);
        $this->data['borrowAttachment4List'] = $this->borrowAttachmentM->getList($id, 4);
        $this->data['borrowCustomer'] = $this->borrowCustomerM->getListByBorrow($id); // TODO
        $this->data['borrow_id'] = $id;
        $this->data['creditRightList'] = $this->creditRightM->getByBorrow($id);
        $this->view(__CLASS__. "/viewDetail", $this->data);
    }
    function viewRequest($_id) {
        $this->data['borrow_request'] = $this->borrowM->getRequest($_id);
        $id = $this->data['borrow_request']['id'];
        echo $id;
        $this->data['borrow']         = $this->borrowM->get($id);
        foreach ($this->data['borrow_request'] as $key => $value) {
            if (array_key_exists($key, $this->data['borrow']) && $this->data['borrow'][$key] == $value) {
                $this->data['borrow_request'][$key] = "";
            }
        }
        $this->data['passAuthorized'] = $this->userM->isAuthorized($_SESSION['userid'], "borrow/passRequest");
        $this->view(__CLASS__. "/viewRequest", $this->data);
    }
    function passRequest($pass, $_id) {
        $baseUrl = base_url();
        $borrow_request = new stdClass();
        $borrow_request->pass_status = $pass;
        $borrow_request->_id  = $_id;
        if ($pass == "0") {
            // DO nothing
        } else if ($pass == "1") {
            $result = $this->borrowM->updateRequest($_id, $borrow_request);
            echo $result;
            if ($result == 1) {
                $borrow_new = $this->borrowM->getRequestColumns($_id);
                $id = $borrow_new['id'];
                unset($borrow_new['_id']);
                unset($borrow_new['pass_status']);
                $result = $this->borrowM->update($id, $borrow_new);
                if ($result == 1) {
                    //$this->borrowM->deleteRequest($_id);
                    echo "<script>alert('通过审核！');window.location.href='". $baseUrl. __CLASS__. "/viewDetail/$id';</script>";
                } else {
                    echo "<script>alert('通过审核失败！');window.location.href='". $baseUrl. __CLASS__. "/viewRequest/$_id';</script>";
                }
            }
        } else {
            $result = $this->borrowM->updateRequest($_id, $borrow_request);
            if ($result == 1) {
                //$this->borrowM->deleteRequest($_id);
                echo "<script>alert('不通过审核！');window.location.href='". $baseUrl. __CLASS__. "/viewDetail/$id';</script>";
            } else {
                echo "<script>alert('不通过审核失败！');window.location.href='". $baseUrl. __CLASS__. "/viewRequest/$_id';</script>";
            }
        }
    }
    function delete() {
        if ($this->permission) {
            $borrow = new stdClass();
            $borrow->is_removed = '1';
            echo $this->borrowM->update($_POST['id'], $borrow);
        } else {
            echo -1;
        }
    }
    function deleteRequest() {
        if ($this->permission) {
            echo $this->borrowM->deleteRequest($_POST['_id']);
        } else {
            echo -1;
        }
    }
}
?>