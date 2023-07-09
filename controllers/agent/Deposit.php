<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends CI_Controller {


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
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url_profile = 'api/Profile/checkprofile';
        $exec_profile = $this->base->post_curl_token($url_profile,$data_user);
        //list bank
        $url_bank = 'api/base/listbank';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_bank'] = $exec_bank['Data'];
        //list denom
        $url_denom = 'api/base/listdenom';
        $exec_denom = $this->base->post_curl($url_denom,$data_user);
        $data['list_denom'] = $exec_denom['Data'];
        //list history deposit
        $url_his_deposit = 'api/transaction/historydeposit';
        $exec_his_deposit = $this->base->post_curl_token($url_his_deposit,$data_user);
        $data['list_history_deposit'] = $exec_his_deposit['Data'];

        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/deposit/Index',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function add()
    {
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url_profile = 'api/Profile/checkprofile';
        $exec_profile = $this->base->post_curl_token($url_profile,$data_user);
        //list bank
        $url_bank = 'api/base/listbank';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_bank'] = $exec_bank['Data'];
        //list denom
        $url_denom = 'api/base/listdenom';
        $exec_denom = $this->base->post_curl($url_denom,$data_user);
        $data['list_denom'] = $exec_denom['Data'];

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/deposit/Add',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function checkout_request(){
    $data = array(
        'trx_code' => $this->session->userdata('session_userid'),
        'trx_number' => $this->input->post('amount_denom'),
        'payment_method' => $this->input->post('payment_method'),
        'type_inq' => $this->input->post('type_inq'),
        'provider' => $this->input->post('type_inq').'-API',
        'userid' => $this->session->userdata('session_userid'),
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


        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/deposit/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

        
}
