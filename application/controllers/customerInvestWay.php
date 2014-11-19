<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CustomerInvestWay extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('customerInvestWayM');
    }	 
    function index() {
        $this->data['list'] = $this->customerInvestWayM->getList(true);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function resetData() {
        $this->data['item']['type']        = '';
        $this->data['item']['name']        = '';
        $this->data['item']['code']        = '';
        $this->data['item']['months']      = '';
        $this->data['item']['rate']        = '';
        $this->data['alertInfo']['type']   = '';
        $this->data['alertInfo']['name']   = '';
        $this->data['alertInfo']['code']   = '';
        $this->data['alertInfo']['months'] = '';
        $this->data['alertInfo']['rate']   = '';
        $this->data['alertInfo']['result'] = '';
    }
    function create() {
        $this->resetData();
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $this->resetData();
        $item = new stdClass();
        $item->type = $_POST['type'];
        $item->name = $_POST['name'];
        $item->code = $_POST['code'];
        $item->months = $_POST['months'];
        $item->rate   = $_POST['rate'];

        $this->data['item']  = $_POST;
        $flag = true;
        if (!is_numeric($item->months)) {
            $alertInfo['months']  = '请填写数字！';
            $flag = false;
        }
        if (!is_numeric($item->rate)) {
            $alertInfo['rate']  = '请填写数字！';
            $flag = false;
        }
        $baseUrl = base_url();
        if ($flag) {
            $id = $this->customerInvestWayM->insert($item);
            if ($id > 0) {
                echo "<script>alert('创建成功！');</script>";
                $this->index();
            } else {
                $this->data['alertInfo']['result'] = '创建失败1！';
                $this->view(__CLASS__. "/create", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败2！';
            $this->view(__CLASS__. "/create", $this->data);
        }
    }
    function delete() {
        if ($this->permission) {
            echo $this->customerInvestWayM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>