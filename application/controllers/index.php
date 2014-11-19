<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('IndexM');
    }	
	
	public function index() {
	    $this->data['data'] = $this->IndexM->indexQuery();
		$this->view('index', $this->data);
	}
	
}
?>