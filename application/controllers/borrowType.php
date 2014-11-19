<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BorrowType extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('borrowTypeM');
    }	 
    function indexLevel1() {
        $this->data['list'] = $this->borrowTypeM->getLevel1List(true);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function indexLevel2($parent = 0) {
        $this->data['list'] = $this->borrowTypeM->getLevel2List(true, $parent);
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createLevel1() {
        $this->data['item']['name']      = '';
        $this->data['item']['code']      = '';
        $this->data['alertInfo']['name']  = '';
        $this->data['alertInfo']['code'] = '';
        $this->data['alertInfo']['result'] = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createLevel2() {
        $this->data['level1List'] = $this->borrowTypeM->getLevel1List(true);
        $this->data['item']['parent']      = '';
        $this->data['item']['months']      = '';
        $this->data['item']['rate']        = '';
        $this->data['alertInfo']['parent'] = '';
        $this->data['alertInfo']['months'] = '';
        $this->data['alertInfo']['rate']   = '';
        $this->data['alertInfo']['result'] = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmitLevel1() {
        $item = new stdClass();
        $item->name  = $_POST['name'];
        $item->code  = $_POST['code'];
        $item->level = 1;
        $flag = true;
        $this->data['alertInfo']['name']   = '';
        $this->data['alertInfo']['code']   = '';
        $this->data['alertInfo']['result'] = '';
        $this->data['item']  = $_POST;
        if (!preg_match('/^[A-Za-z0-9_\x80-\xff\s\']{2,48}$/', $item->name)) {
            $alertInfo['value']  = '格式不正确！';
            $flag = false;
        }
        $baseUrl = base_url();
        if ($flag) {
            $id = $this->borrowTypeM->insert($item);
            if ($id > 0) {
                echo "<script>alert('创建成功！');window.location.href='". $baseUrl. __CLASS__. "/indexLevel1';</script>";
            } else {
                $this->data['alertInfo']['result'] = '创建失败！';
                $this->view(__CLASS__. "/createLevel1", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败！';
            $this->view(__CLASS__. "/createLevel1", $this->data);
        }
    }
    function createSubmitLevel2() {
        $this->data['level1List'] = $this->borrowTypeM->getLevel1List(true);
        $item = new stdClass();
        $item->parent = $_POST['parent'];
        $item->months = $_POST['months'];
        $item->rate   = $_POST['rate'];
        $item->level  = 2;
        $this->data['alertInfo']['parent'] = '';
        $this->data['alertInfo']['months'] = '';
        $this->data['alertInfo']['rate']   = '';
        $this->data['alertInfo']['result'] = '';
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
            $id = $this->borrowTypeM->insert($item);
            if ($id > 0) {
                echo "<script>alert('创建成功！');window.location.href='". $baseUrl. __CLASS__. "/indexLevel2/$item->parent';</script>";
            } else {
                $this->data['alertInfo']['result'] = '创建失败1！';
                $this->view(__CLASS__. "/createLevel2", $this->data);
            }
        } else {
            $this->data['alertInfo']['result'] = '创建失败2！';
            $this->view(__CLASS__. "/createLevel2", $this->data);
        }
    }
    function delete() {
        if ($this->permission) {
            echo $this->borrowTypeM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
}
?>