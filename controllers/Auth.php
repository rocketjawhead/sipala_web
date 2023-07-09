<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct(){
	      parent::__construct();
	      $this->load->helper(array('url'));
	      $this->load->model('M_base','bs');

	      $this->secretkey = $this->config->item("secretkey");
	}

	public function urlnotfound(){

		$this->load->view('Tmp404');
	}

	public function view_resetpassword(){
		$this->load->view('login/Resetpassword');
	}



	public function resetpassword($id){

		$check_link = $this->check_link_password($id);
		if ($check_link['responsecode'] != '00') {
			redirect('Auth/urlnotfound');
		} 
		$this->load->view('login/Resetpassword');
	}

	public function resetpin($id){

		$check_link = $this->check_link_pin($id);
		if ($check_link['responsecode'] != '00') {
			redirect('Auth/urlnotfound');
		}

		$this->load->view('login/Resetpin');
	}


	public function check_link_password($id){
    $data = array(
    	'uniqueid_activity' => $id,
    	'type_activity' => 3,
    	'secretkey' => $this->secretkey
    );

    $url = 'api/auth/checklinkpassword/';
    $exec = $this->bs->post_curl($url,$data);
    return $exec;
	}

	public function check_link_pin($id){
    $data = array(
    	'uniqueid_activity' => $id,
    	'type_activity' => 4,
    	'secretkey' => $this->secretkey
    );

    $url = 'api/auth/checklinkpin/';
    $exec = $this->bs->post_curl($url,$data);
    return $exec;
	}


	public function exec_reset_password(){
		$data = array(
	    	'id' => $this->input->post('id'),
	    	'password' => $this->input->post('password'),
	    	'password_conf' => $this->input->post('password_conf'),
	    	'secretkey' => $this->secretkey
	    );

	    $url = 'api/auth/resetpassword/';
	    $exec = $this->bs->post_curl($url,$data);
	    echo json_encode($exec);
	}


	public function exec_reset_pin(){
		$data = array(
	    	'id' => $this->input->post('id'),
	    	'pin' => $this->input->post('pin'),
	    	'pin_conf' => $this->input->post('pin_conf'),
	    	'secretkey' => $this->secretkey
	    );

	    $url = 'api/auth/resetpin/';
	    $exec = $this->bs->post_curl($url,$data);
	    echo json_encode($exec);
	}

	public function verifyuser($id){
		$check_link = $this->check_link_verifyuser($id);
		if ($check_link['responsecode'] != '00') {
			redirect('Auth/urlnotfound');
		} 
		$this->load->view('login/Verifyuser');
	}

	public function check_link_verifyuser($id){
    $data = array(
    	'uniqueid_activity' => $id,
    	'type_activity' => 2,
    	'secretkey' => $this->secretkey
    );

    $url = 'api/auth/checklinkverifyuser/';
    $exec = $this->bs->post_curl($url,$data);
    return $exec;
	}
}
