<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BorrowContact extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('borrowContactM');
    }   
    function resetData() {
        $this->data['borrowContact']['name']         = '';
        $this->data['borrowContact']['phone']        = '';
        $this->data['borrowContact']['telephone']    = '';
        $this->data['borrowContact']['idcard']       = '';
        $this->data['borrowContact']['relationship'] = '';
        $this->data['alertInfo']['name']         = '';
        $this->data['alertInfo']['phone']        = '';
        $this->data['alertInfo']['telephone']    = '';
        $this->data['alertInfo']['idcard']       = '';
        $this->data['alertInfo']['relationship'] = '';
        $this->data['alertInfo']['result']       = '';
    }
    function create($borrow_id) {
        $this->data['no_visible_elements'] = true;
        $this->resetData();

        $this->session->set_userdata('borrowContact_borrow_id', $borrow_id);
        $this->data['borrow_id'] = $borrow_id;
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() {
        $this->data['no_visible_elements'] = true;
        $this->data['borrow_id'] = $this->session->userdata('borrowContact_borrow_id');
        $borrowContact               = new stdClass();
        $borrowContact->borrow_id    = $this->session->userdata('borrowContact_borrow_id');
        $borrowContact->name         = $_POST['name'];
        $borrowContact->phone        = $_POST['phone'];
        $borrowContact->telephone    = $_POST['telephone'];
        $borrowContact->idcard       = $_POST['idcard'];
        $borrowContact->relationship = $_POST['relationship'];
        $flag = true;
        $this->resetData();
        $this->data['borrowContact']  = $_POST;
        
        if ($borrowContact->name == '') {
            $this->data['alertInfo']['name']  = '请选择银行！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,64}$/', $borrowContact->phone)) {
            $this->data['alertInfo']['phone']  = '格式不正确！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $borrowContact->telephone)) {
            $this->data['alertInfo']['telephone']  = '格式不正确！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $borrowContact->idcard)) {
            $this->data['alertInfo']['telephone']  = '格式不正确！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $borrowContact->relationship)) {
            $this->data['alertInfo']['relationship']  = '格式不正确！';
            $flag = false;
        }
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $borrowContact->idcard)) {
            $this->data['alertInfo']['idcard']  = '格式不正确！';
            $flag = false;
        }
        if ($flag) {
            $id = $this->borrowContactM->insert($borrowContact);
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
            echo $this->borrowContactM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>