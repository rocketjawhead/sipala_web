<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {


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

        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/transaction/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function pascabayar()
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

        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/transaction/Postpaid',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function pulsa_prepaid()
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

        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/transaction/PulsaPrepaid',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function inquiry(){
        $provider=$this->input->post('provider');
        $type_inq=$this->input->post('type_inq');

        $data = array(
            'provider' => $provider,
            'type_inq' => $type_inq,
            'secretkey' => $this->secretkey
        );
        $url = 'api/transaction/inquiry/';
        $exec = $this->base->post_curl_token($url,$data);

        echo json_encode($exec);
    }


    public function checkout_req(){
    $data = array(
        'trx_code' => $this->input->post('trx_code'),
        'trx_number' => $this->input->post('trx_number'),
        'payment_method' => 'balance',
        'type_inq' => $this->input->post('type_inq'),
        'provider' => $this->input->post('provider'),
        'userid' => $this->session->userdata('session_userid'),
        'token' => $this->session->userdata('session_token'),
        'secretkey' => $this->secretkey
    );

    $url = 'api/transaction/checkout/';
    $exec = $this->base->post_curl_token($url,$data);

    echo json_encode($exec);

    }


    public function detail($trx_id){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'trx_id' => $trx_id,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url_checkout_detail = 'api/transaction/checkoutdetail';
        $exec_checkout_detail = $this->base->post_curl_token($url_checkout_detail,$data_user);
        if ($exec_checkout_detail['responsecode'] == '00') {
            
            $url_profile = 'api/Profile/checkprofile';
            $exec_profile = $this->base->post_curl_token($url_profile,$data_user);
            $data['balance'] = $exec_profile['Data']['balance'];

            $data['trx_id'] = $exec_checkout_detail['Data']['trx_id'];
            $data['trx_code'] = $exec_checkout_detail['Data']['trx_code'];
            $data['trx_number'] = $exec_checkout_detail['Data']['trx_number'];
            $data['trx_op'] = $exec_checkout_detail['Data']['trx_op'];
            $data['trx_details'] = $exec_checkout_detail['Data']['trx_details'];
            $data['trx_price'] = $exec_checkout_detail['Data']['trx_price'];
            $data['trx_fee'] = $exec_checkout_detail['Data']['trx_fee'];
            $data['trx_total'] = $exec_checkout_detail['Data']['trx_total'];
            $data['payment_method'] = $exec_checkout_detail['Data']['payment_method'];
            $data['trx_date'] = $exec_checkout_detail['Data']['trx_date'];
            $data['create_date'] = $exec_checkout_detail['Data']['create_date'];
            $data['status'] = $exec_checkout_detail['Data']['status'];
            $data['upload_receipt'] = $exec_checkout_detail['Data']['upload_receipt'];
            $data['status_payment'] = $exec_checkout_detail['Data']['status_payment'];
            $data['trx_type'] = $exec_checkout_detail['Data']['trx_type'];
            $data['status_transaction'] = $exec_checkout_detail['Data']['status_transaction'];
            $data['trx_total_numb'] = $exec_checkout_detail['Data']['trx_total_numb'];
            $data['profit'] = $exec_checkout_detail['Data']['profit'];
            $data['profit_nominal'] = $exec_checkout_detail['Data']['profit_nominal'];
            $data['status_name'] = $exec_checkout_detail['Data']['status_name'];
            $data['is_check_status'] = $exec_checkout_detail['Data']['is_check_status'];
            $data['payment_date'] = $exec_checkout_detail['Data']['payment_date'];

            

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/transaction/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }



    public function checkout_paid(){
        $data = array(
            'trx_id' => $this->input->post('trx_id'),
            'userid' => $this->session->userdata('session_userid'),
            'token' => $this->session->userdata('session_token'),
            'profit' => $this->input->post('profit'),
            'secretkey' => $this->secretkey
        );
        $url = 'api/transaction/checkoutpaid/';
        $exec = $this->base->post_curl_token($url,$data);
        echo json_encode($exec);
    }

    public function check_status(){

        $data = array(
            'commands' => $this->input->post('commands'),
            'ref_id' => $this->input->post('ref_id'),
            'hp' => $this->input->post('hp'),
            'pulsa_code' => $this->input->post('pulsa_code'),
            'trx_date' => $this->input->post('trx_date'),
            'userid' => $this->session->userdata('session_userid'),
            'token' => $this->session->userdata('session_token'),
            'secretkey' => $this->secretkey
        );
        $url = 'api/transaction/checkstatus/';
        $exec = $this->base->post_curl_token($url,$data);
        echo json_encode($exec);
    }


    public function paket_data()
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

        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/transaction/PaketData',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function token_listrik()
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

        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/transaction/TokenListrik',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function emoney()
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

        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/transaction/Emoney',$data);
        $this->load->view('menu/Footer',$data);
    }
        
}
