<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {
    function __construct() {
        parent::__construct(); 
		$this->load->model('userM');
    }	
    function index() {
        $this->view(__CLASS__. "/". __FUNCTION__);
    }
}
?>