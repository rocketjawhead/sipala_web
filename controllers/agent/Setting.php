<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');
        if($this->session->userdata('is_logged_in') =='')
        {
         $this->session->set_flashdata('msg','Please Login to Continue');
         redirect('Login');
        }
    }


	public function index()
	{
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_profile = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url_profile = 'api/Profile/checkprofile';
        $exec_profile = $this->base->post_curl_token($url_profile,$data_profile);
        //
        // echo $exec_profile['Data']['email'];
        // die();
        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $data['email'] = $exec_profile['Data']['email'];
        $data['referral'] = $exec_profile['Data']['referral_code'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/setting/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function update_profile(){
        $data = array(
            'userid' => $this->session->userdata('session_userid'),
            'fullname' => $this->input->post('fullname'),
            'secretkey' => $this->secretkey
        );
        $url = 'api/Profile/updateprofile/';
        $exec = $this->base->post_curl_token($url,$data);
        echo json_encode($exec);
    }


    public function update_password(){
        $data = array(
            'userid' => $this->session->userdata('session_userid'),
            'password_old' => $this->input->post('password_old'),
            'password_new' => $this->input->post('password_new'),
            'password_new_conf' => $this->input->post('password_new_conf'),
            'secretkey' => $this->secretkey
        );
        $url = 'api/Profile/updatepassword/';
        $exec = $this->base->post_curl_token($url,$data);
        echo json_encode($exec);
    }

    public function update_pin(){
        $data = array(
            'userid' => $this->session->userdata('session_userid'),
            'pin_old' => $this->input->post('pin_old'),
            'pin_new' => $this->input->post('pin_new'),
            'pin_new_conf' => $this->input->post('pin_new_conf'),
            'secretkey' => $this->secretkey
        );
        $url = 'api/Profile/updatepin/';
        $exec = $this->base->post_curl_token($url,$data);
        echo json_encode($exec);
    }


    public function reset(){
        $data = array(
            'secretkey' => $this->secretkey
        );
        $url = 'api/Settings/reset/';
        $exec = $this->base->post_curl($url,$data);
        // echo json_encode($exec);
        redirect('agent/Dashboard/');
    }

        
}
