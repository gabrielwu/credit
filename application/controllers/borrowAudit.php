<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BorrowAudit extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('borrowM');
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
        $this->load->model('dictionaryM');
        $this->data['statusList'] = $this->dictionaryM->getBorrowStatusList(true);
    }   

    function setDictionary() {
        $this->data['provinceList']          = $this->regionProvinceM->getList();
        $this->data['cityList']              = $this->regionCityM->getList();
        $this->data['countyList']            = $this->regionCountyM->getList();
        $this->data['borrowStatusList']      = $this->dictionaryM->getBorrowStatusList();
        $this->data['borrowIntentionList']   = $this->dictionaryM->getBorrowIntentionList();
        $this->data['borrowSourceList']      = $this->dictionaryM->getBorrowSourceList();
        $this->data['borrowCreditLevelList'] = $this->dictionaryM->getBorrowCreditLevelList();
        $this->data['borrowSignAddressList'] = $this->dictionaryM->getBorrowSignAddressList();
        $this->data['borrowMonthsList']      = $this->borrowTypeM->getMonthsList();
        $this->data['borrowTypeList']        = $this->borrowTypeM->getList();
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
        $this->data['alertInfo']['result']    = '';
    }
    function index($isAll = false) { // TODO
        $this->data['borrowStatusList']        = $this->dictionaryM->getBorrowStatusList(true);
        $this->data['borrowAccountStatusList'] = $this->dictionaryM->getBorrowAccountStatusList(true);
        $this->data['borrowIntentionList']     = $this->dictionaryM->getBorrowIntentionList(true);
        $this->data['borrowSignAddressList']   = $this->dictionaryM->getBorrowSignAddressList(true);
        $this->data['operatorList']            = $this->auserM->getBorrowCreateUserList();
        $this->data['condition']  = $this->obtainCondition();
        $this->data['borrowList'] = $this->borrowM->getListByStatus($this->data['condition'], $this->data['borrowAuditStatusName']);
        $this->data['authorizedIndexAll'] = $isAll;
        $this->data['action'] = $isAll ? "indexAll" : "index";
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function index0() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][0]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][0]['value'];
        $this->index();
    }
    function index1() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][1]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][1]['value'];
        $this->index();
    }   
    function index2() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][2]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][2]['value'];
        $this->index();
    }   
    function index3() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][3]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][3]['value'];
        $this->index();
    }   
    function index4() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][4]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][4]['value'];
        $this->index();
    }   
    function index5() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][5]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][5]['value'];
        $this->index();
    }   
    function index6() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][6]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][6]['value'];
        $this->index();
    }   
    function index7() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][7]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][7]['value'];
        $this->index();
    }
    function index8() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][8]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][8]['value'];
        $this->index();
    }   
    function index9() {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][9]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][9]['value'];
        $this->index();
    }
    function create0($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][0]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][0]['value'];
        $this->create(0, $borrow_id);
    } 
    function create1($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][1]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][1]['value'];
        $this->create(1, $borrow_id);
    }   
    function create2($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][2]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][2]['value'];
        $this->create(2, $borrow_id);
    }   
    function create3($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][3]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][3]['value'];
        $this->create(3, $borrow_id);
    }   
    function create4($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][4]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][4]['value'];
        $this->create(4, $borrow_id);
    }   
    function create5($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][5]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][5]['value'];
        $this->create(5, $borrow_id);
    }   
    function create6($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][6]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][6]['value'];
        $this->create(6, $borrow_id);
    }   
    function create7($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][7]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][7]['value'];
        $this->create(7, $borrow_id);
    }
    function create8($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][8]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][8]['value'];
        $this->create(8, $borrow_id);
    }   
    function create9($borrow_id) {
        $this->data['borrowAuditStatus']     = $this->data['statusList'][9]['status'];
        $this->data['borrowAuditStatusName'] = $this->data['statusList'][9]['value'];
        $this->create(9, $borrow_id);
    }
    function create($status, $borrow_id) {
        $this->data['no_visible_elements'] = true;

        $this->session->set_userdata('borrowAudit_borrow_id', $borrow_id);
        $this->session->set_userdata('status', $status);
        $this->data['borrow_id'] = $borrow_id;
        $this->data['borrowAudit']['status']     = '';
        $this->data['borrowAudit']['attachment'] = '';
        $this->data['borrowAudit']['months']     = '0';
        $this->data['borrowAudit']['amount']     = '0';
        $this->data['borrowAudit']['type']       = '';
        $this->data['borrowAudit']['remark']     = '';
        $this->data['status'] = $status;

        $this->data['alertInfo']['file_name']       = '';
        $this->data['alertInfo']['upload']       = '';
        $this->data['alertInfo']['status']       = '';
        $this->data['alertInfo']['attachment']   = '';
        $this->data['alertInfo']['months']       = '';
        $this->data['alertInfo']['amount']       = '';
        $this->data['alertInfo']['type']         = '';
        $this->data['alertInfo']['remark']       = '';
        $this->data['alertInfo']['result']       = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() { 
        $this->data['no_visible_elements'] = true;

        $flag = true;

        $this->data['alertInfo']['status']       = '';
        $this->data['alertInfo']['attachment']   = '';
        $this->data['alertInfo']['months']       = '0';
        $this->data['alertInfo']['amount']       = '0';
        $this->data['alertInfo']['type']         = '';
        $this->data['alertInfo']['remark']       = '';
        $this->data['alertInfo']['result']       = '';

        $currentTime = time();
        $borrow_id = $this->session->userdata('borrowAudit_borrow_id');
        $status    = $this->session->userdata('status');
        $upload_path = "./upload/borrowAudit/$borrow_id/";
        if (!file_exists($upload_path)) {
            mkdir($upload_path);
        }

        $max_size = 10;
        $upload_data['file_ext'] = '';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|pdf'; 
        $config['max_size'] = $max_size * 1024;
        $config['file_name'] = $_POST['attachment']. date('YmdHis', $currentTime);
        $this->load->library('upload', $config);
        $defulatFileName = "";
        if (!$this->upload->do_upload("file_name")){
            $this->data['alertInfo']['upload'] = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $defulatFileName = $config['file_name']. $upload_data['file_ext'];
        }
        $borrowAudit = new stdClass();
        $borrowAudit->borrow_id   = $borrow_id;
        $borrowAudit->status      = $_POST['status'];
        $borrowAudit->attachment  = $defulatFileName;
        $borrowAudit->months      = $_POST['months'];
        $borrowAudit->amount      = $_POST['amount'];
        $borrowAudit->create_time = date('Y-m-d H:i:s', $currentTime);
        $borrowAudit->operator    = $_SESSION['userid'];
        $borrowAudit->remark      = $_POST['remark'];
        $this->data['borrowAudit']  = $_POST;
        
        if ($borrowAudit->status == '') {
            $alertInfo['status']  = '请选择！';
            $flag = false;
        }
        if (!is_numeric($borrowAudit->months)) {
            $alertInfo['months']  = '请填数字！';
            $flag = false;
        }
        if (!is_numeric($borrowAudit->amount)) {
            $alertInfo['type']  = '请填数字！';
            $flag = false;
        }

        $borrow = new stdClass();
        $borrow->status      = $_POST['status'];
        if ($flag) {
            $id = $this->borrowAuditM->insert($borrowAudit);
            if ($id > 0) {
                $this->borrowM->update($borrow_id, $borrow);
                echo "<script>alert('创建成功！');window.returnValue='True';window.close(); </script>";// TODO:refresh
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/create$status/$borrow_id", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/create$status/$borrow_id", $this->data);
        }
    }
    function delete() {
        if ($this->permission) {
            echo $this->borrowAuditM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
    function download($borrow_id, $file_name) {
        $path = "./upload/borrowAudit/$borrow_id/";
        $this->load->helper('download');
        $data = file_get_contents($path. $file_name ); // 读文件内容
        force_download($file_name, $data);
    }
}
?>