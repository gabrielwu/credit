<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends MY_Controller {
    function __construct() {
        parent::__construct(); 
		$this->load->model('userM');
        $this->load->model('dictionaryM');
        $this->data['no_visible_elements'] = true;
    }	
    function login() {
        $username  = isset($_POST['username']) ? $_POST['username'] : '';
        $password  = isset($_POST['password']) ? $_POST['password'] : '';
        $this->data['username'] = $username;
        $this->data['password'] = $password;
        $canLogin = false;
        if ($username != '' && $password != '') {
            if (isset($_POST['anti']) && $_POST['anti'] != "") {
            } else {
                $userT = $this->userM->getUser($username);
                $passwordT = $userT['password'];
                $userid = $userT['id'];
                if (md5($password) == $passwordT) {
                    $canLogin = true;
                } else {
                    $this->data['alert_info'] = '用户名或密码错误';
                }
            } 
        }
        if ($canLogin) {
            // Get and save user info
            $_SESSION['username'] = $username;
            $_SESSION['userid']   = $userid;
            redirect("/dashboard/index"); // TODO defualt page
        } else {
            $this->view('site/login',    $this->data);
        }
    }
    function logout() {
        session_destroy();
        $this->data['username'] = '';
        $this->data['password'] = '';
        $this->view('site/login', $this->data);
    }
}
?>