<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct(){
	      parent::__construct();
	      $this->load->helper(array('url'));
	      $this->load->model('M_base','bs');
	      $this->load->model('M_base','base');

	      $this->secretkey = $this->config->item("secretkey");
	}

	public function index(){
		$data_profile = array(
            'userid' => null,
            'secretkey' => $this->secretkey
        );

        $url_profile = 'api/Base/totaldashboard';
        $exec_profile = $this->base->post_curl($url_profile,$data_profile);
        if ($exec_profile['responsecode'] == '00') {
            $data['total_user'] = $exec_profile['Data']['total_user'];
            $data['total_absent'] = $exec_profile['Data']['total_absent'];
            $data['total_leave'] = $exec_profile['Data']['total_leave'];
        }
		//top
        $url_top = 'api/Activity/topactivity';
        $exec_top = $this->base->post_curl($url_top,$data_profile);
        $data['list_top'] = $exec_top['Data'];

        //history
        $url_history = 'api/Activity/historyactivity';
        $exec_history = $this->base->post_curl($url_history,$data_profile);
        $data['list_history'] = $exec_history['Data'];

        //last login
        $url_history = 'api/Base/lastlogin';
        $exec_history = $this->base->post_curl($url_history,$data_profile);
        $data['list_lastlogin'] = $exec_history['Data'];

		$this->load->view('login/Index',$data);
	}

	public function reset_pin(){
		$this->load->view('login/Formresetpin');
	}


	public function pin(){
		$this->load->view('login/Pin');
	}


	public function exec_login(){
    $data = array(
    	'username' => $this->input->post('username'),
    	'password' => $this->input->post('password'),
    	'secretkey' => $this->secretkey
    );

    $url = 'api/auth/login/';
    $exec = $this->bs->post_curl($url,$data);
    if ($exec['responsecode'] == '00') {
    	$token = $exec['Data']['token'];
    	$email = $exec['Data']['email'];
    	$userid = $exec['Data']['userid'];
    	$nip = $exec['Data']['nip'];
    	$fullname = $exec['Data']['fullname'];
    	$imageprofil = $exec['Data']['imageprofil'];
    	$email = $exec['Data']['email'];
    	$type_account = $exec['Data']['type_account'];
    	$data = array(
                'session_token' =>$token,
                'session_email' =>$email,
                'session_userid' =>$userid,
                'session_nip' =>$nip,
                'session_fullname' =>$fullname,
                'session_imageprofil' =>$imageprofil,
                'session_typeaccount' =>$type_account,
                'is_logged_in' => true
                );
        $this->session->set_userdata($data);
    }
    echo json_encode($exec);

	}

	public function exec_logout()
    {
           
		$array_items = array(
		'session_token', 
		'session_email',
		'session_userid',
		'session_nip',
		'session_fullname',
		'session_typeaccount',
		'is_logged_in',
		);



        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('msg', 'Admin Signed Out Now!');
        redirect('Login');

       
    }

	public function forget_password(){
    $data = array(
    	'email' => $this->input->post('email'),
    	'secretkey' => $this->secretkey
    );

    $url = 'api/auth/forgetpassword/';
    $exec = $this->bs->post_curl($url,$data);
    echo json_encode($exec);
	}

	public function forget_pin(){
    $data = array(
    	'email' => $this->input->post('email'),
    	'secretkey' => $this->secretkey
    );

    $url = 'api/auth/forgetpin/';
    $exec = $this->bs->post_curl($url,$data);
    echo json_encode($exec);
	}

	


	public function request_otp(){
		$data = array(
	    	'id' => $this->input->post('id'),
	    	'email' => $this->input->post('email'),
	    	'secretkey' => $this->secretkey
	    );

	    $url = 'api/auth/requestotp/';
	    $exec = $this->bs->post_curl($url,$data);
	    echo json_encode($exec);
	    
	}


	public function validate_otp(){
		$data = array(
	    	'otp' => $this->input->post('otp'),
	    	'email' => $this->input->post('email'),
	    	'secretkey' => $this->secretkey
	    );

	    $url = 'api/auth/validationotp/';
	    $exec = $this->bs->post_curl($url,$data);
	    if ($exec['responsecode'] == '00') {
	    	$token = $exec['Data']['token'];
	    	$email = $exec['Data']['email'];
	    	$userid = $exec['Data']['userid'];
	    	$data = array(
	                'session_token' =>$token,
	                'session_email' =>$email,
	                'session_userid' =>$userid,
	                'is_logged_in' => true
	                );
	        $this->session->set_userdata($data);
	    }
	    echo json_encode($exec);
	}


	public function logout(){
           
		$array_items = array(
		'session_token', 
		'session_email',
		'is_logged_in'
		);

        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('msg', 'User Signed Out Now!');
        redirect('Login');
    }


    public function register(){
		$data = array(
	    	'fullname' => $this->input->post('fullname'),
	    	'phonenumber' => $this->input->post('phonenumber'),
	    	'email' => $this->input->post('email'),
	    	'password' => $this->input->post('password'),
	    	'referral' => $this->input->post('referral'),
	    	'pin' => $this->input->post('pin'),
	    	'secretkey' => $this->secretkey
	    );

	    $url = 'api/auth/register/';
	    $exec = $this->bs->post_curl($url,$data);
	    echo json_encode($exec);
	}
}
