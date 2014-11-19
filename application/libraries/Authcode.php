<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Authcode {
	var $CI;
	var $captcha_config;
	var $code;
	function Authcode() {
		$this->CI =& get_instance();
		$this->code = random_string('alnum', 4);
		$this->captcha_config = array(
				'word' => $this->code,
				'img_path' => './captcha/',
				'img_url' => base_url(). 'captcha/',
				'font_path' => './path/to/fonts/texb.ttf',
				'img_width' => 64,
				'img_height' => 32,
				'expiration' => 100
		);
		$this->CI->load->helper('captcha');
	}
	public function captcha() {
		$cap = create_captcha($this->captcha_config);
		$this->CI->session->set_userdata('tAuthCode', $this->code);
		return base_url(). 'captcha/'. $cap['time'].'.jpg';
	}
	function check($authCode = null) {
		$tAuthCode = $this->CI->session->userdata('tAuthCode');
        return ($tAuthCode && $authCode) ? (strcasecmp($tAuthCode, $authCode)) : false;
    }
}