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
    //prepaid
    // $username = 'vuduhiDVm7xo';
    // $apikey = 'fef9a802ce6351877672e8049b0620da';
    // $cmd = 'pricelist';
    // echo md5($username.$apikey.$cmd);

    //postpaid
    // $username = 'vuduhiDVm7xo';
    // $apikey = 'fef9a802ce6351877672e8049b0620da';
    // $ref_id = '001';
    // echo md5($username.$apikey.$ref_id);
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
        $this->load->view('agent/product/Prepaid',$data);
        $this->load->view('menu/Footer',$data);
    }

        
}
