<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BorrowAttachment extends MY_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('borrowAttachmentM');
    }	
    function create1($borrow_id) {
        $this->data['type']      = '1';
        $this->data['type_name'] = '附件';
        $this->create($borrow_id, 1);
    }
    function create2($borrow_id) {
        $this->data['type']      = '2';
        $this->data['type_name'] = '合同附件';
        $this->create($borrow_id, 2);
    }
    function create3($borrow_id) {
        $this->data['type']      = '3';
        $this->data['type_name'] = '实地考察照片及审核表';
        $this->create($borrow_id, 3);
    }
    function create4($borrow_id) {
        $this->data['type']      = '4';
        $this->data['type_name'] = '贷款申请资料';
        $this->create($borrow_id, 4);
    }
    function create($borrow_id, $type) {
        $this->data['no_visible_elements'] = true;
        $this->session->set_userdata('borrowAttachment_borrow_id', $borrow_id);
        $this->session->set_userdata('borrowAttachment_type', $this->data['type']);
        $this->session->set_userdata('borrowAttachment_type_name', $this->data['type_name']);
        $this->data['borrow_id']      = $borrow_id;
        $this->data['borrowAttachment']['type']            = $this->data['type'];
        $this->data['borrowAttachment']['file_name']       = '';
        $this->data['borrowAttachment']['attachment_name'] = '';
        $this->data['alertInfo']['type']                   = '';
        $this->data['alertInfo']['file_name']              = '';
        $this->data['alertInfo']['attachment_name']        = '';
        $this->data['alertInfo']['result']                 = '';
        $this->data['alertInfo']['upload']                 = '';
        $this->view(__CLASS__. "/". __FUNCTION__, $this->data);
    }
    function createSubmit() { 
        $this->data['borrow_id'] = $this->session->userdata('borrowAttachment_borrow_id');
        $this->data['type']      = $this->session->userdata('borrowAttachment_type');
        $this->data['type_name'] = $this->session->userdata('borrowAttachment_type_name');
        $borrow_id = $this->data['borrow_id'];
        $this->data['no_visible_elements'] = true;
        $flag = true;
        $this->data['alertInfo']['file_name']       = '';
        $this->data['alertInfo']['attachment_name'] = '';
        $this->data['alertInfo']['type']            = '';
        $this->data['alertInfo']['upload']          = '';

        $currentTime = time();
        $upload_path = "./upload/borrowAttachment/$borrow_id/";
        if (!file_exists($upload_path)) {
            mkdir($upload_path);
        }
        $max_size = 10;
        $upload_data['file_ext'] = '';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx'; 
        $config['max_size'] = $max_size * 1024;
        $config['file_name'] = $_POST['attachment_name']. date('YmdHis', $currentTime);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload("file_name")){
            $this->data['alertInfo']['upload'] = $this->upload->display_errors();
            $flag = false;
        } else {
            $upload_data = $this->upload->data();
        }

        $defulatFileName = $config['file_name']. $upload_data['file_ext'];
        $borrowAttachment = new stdClass();
        $borrowAttachment->borrow_id       = $borrow_id;
        $borrowAttachment->file_name       = (!isset($_POST['file_name'])) ? $defulatFileName : $_POST['file_name']. $upload_data['file_ext'];
        $borrowAttachment->attachment_name =  $defulatFileName;
        $borrowAttachment->type            = $this->session->userdata('borrowAttachment_type');
        $borrowAttachment->create_time     = date('Y-m-d H:i:s', $currentTime);
        $borrowAttachment->operator        = $_SESSION['userid'];
        $this->data['borrowAttachment']  = $_POST;
        
        echo ":". $borrowAttachment->attachment_name;
        if (!preg_match('/^[.A-Za-z0-9_\x80-\xff\s\']{2,32}$/', $borrowAttachment->attachment_name)) {
            $this->data['alertInfo']['attachment_name']  = '格式不正确！';
            $flag = false;
        }
        if ($flag) {
            $id = $this->borrowAttachmentM->insert($borrowAttachment);
            if ($id > 0) {
                echo "<script>alert('创建成功！');window.returnValue='True';window.close(); </script>";// TODO:refresh
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
            echo $this->borrowAttachmentM->delete($_POST['id']); // TODO
        } else {
            echo -1;
        }
    }
    function download($borrow_id, $file_name) {
        $path = "./upload/borrowAttachment/$borrow_id/";
        $this->load->helper('download');
        $data = file_get_contents($path. $file_name ); // 读文件内容
        force_download($file_name, $data);
    }
}
?>