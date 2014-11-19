<?php 
class MY_Controller extends CI_Controller {
	protected $data;
    protected $permission;
    function __construct() {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $controller = $this->uri->segment(1);
        $function   = $this->uri->segment(2);
        if ($controller != 'site' && !isset($_SESSION['userid'])) {
            redirect('site/login');
        }
		$this->load->library('session');
		$this->load->database();
        $this->load->model('userM');
        $this->data["naviList"] = "";
        $this->permission = true;
        if (isset($_SESSION['userid'])) {
            $this->data['username'] = $_SESSION['username']; 
            $this->data["naviList"] = $this->userM->getNaviList($_SESSION['userid']);
            $url = $controller. "/". $function;
            //echo $url;
            if ($controller != 'site' && 
                $controller != 'user' && 
                $controller != 'dashboard' && 
                !$this->userM->isAuthorized($_SESSION['userid'], $url)) {
                    $this->permission = false;
                    $oriUrl = getenv("HTTP_REFERER");
                    echo "<script>";
                    echo "alert('您没有权限！');";
                    echo "window.location.href = '". $oriUrl. "';";
                    echo "</script>";
            }
        }

    }	
    function view($page) {
    	if ( !file_exists('application/views/'.$page.'.php')) {
    		show_404();
    	}
        $this->data["media"] = base_url(). "media";
        $this->data["js"]    = base_url(). "media/js";
        $this->data["css"]   = base_url(). "media/css";
        $this->data["img"]   = base_url(). "media/img";
    	$this->load->view('common/header', $this->data);
    	$this->load->view($page, $this->data);
    	$this->load->view('common/footer', $this->data);
    }
}
?>