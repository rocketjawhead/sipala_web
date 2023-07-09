<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pin extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','bs');
        $this->secretkey = $this->config->item('secretkey');
        if($this->session->userdata('is_logged_in') =='')
        {
         $this->session->set_flashdata('msg','Please Login to Continue');
         redirect('Login');
        }
    }


    public function index(){
        $this->load->view('login/Pin');
    }


	public function exec_pin(){
    $data = array(
        'pin' => $this->input->post('pin'),
        'email' => $this->session->userdata('session_email'),
        'secretkey' => $this->secretkey
    );

    $url = 'api/auth/pin';
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

        
}
