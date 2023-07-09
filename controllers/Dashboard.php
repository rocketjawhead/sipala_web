<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct(){
	      parent::__construct();
	      $this->load->helper(array('url'));
	      $this->load->model('M_base','bs');

	      $this->secretkey = $this->config->item("secretkey");
	}

	public function index(){

		// $data['list_blog'] = $this->get_blog();
		// $data['list_faq'] = $this->get_faq();

		// $this->load->view('Header',$data);
		// $this->load->view('dashboard/Index',$data);
		// $this->load->view('Footer',$data);

		$this->load->view('new_view/Header');
		$this->load->view('new_view/Index');
		$this->load->view('new_view/Footer');
	}

	public function ketentuan(){
		$this->load->view('new_view/Header');
		$this->load->view('new_view/Tnc');
		$this->load->view('new_view/Footer');
	}

	public function get_blog(){
		$data = array(
	    	'secretkey' => $this->secretkey
	    );
	    $url = 'api/content/blog/';
	    $exec = $this->bs->post_curl($url,$data);
	    return $exec['Data'];
	}

	public function get_faq(){
		$data = array(
	    	'secretkey' => $this->secretkey
	    );
	    $url = 'api/content/faq/';
	    $exec = $this->bs->post_curl($url,$data);
	    return $exec['Data'];
	}


	public function checkout_req(){
    $data = array(
    	'trx_code' => $this->input->post('trx_code'),
    	'trx_number' => $this->input->post('trx_number'),
    	'payment_method' => $this->input->post('payment_method'),
    	'type_inq' => $this->input->post('type_inq'),
    	'provider' => $this->input->post('provider'),
    	'userid' => NULL,
    	'secretkey' => $this->secretkey
    );

    $url = 'web/transaction/checkoutweb/';
    $exec = $this->bs->post_curl($url,$data);

    echo json_encode($exec);

	}

	public function checkout_detail(){

		$data = array(
	    	'trx_id' => $this->input->post('trx_id'),
	    	'secretkey' => $this->secretkey
	    );

		$url = 'web/transaction/checkoutwebdetail/';
    	$exec = $this->bs->post_curl($url,$data);
    	echo json_encode($exec);
	}


	public function checkbill(){
		// $this->load->view('Header');
		// $this->load->view('dashboard/Checkout');
		// $this->load->view('Footer');
		$this->load->view('new_view/Header');
		$this->load->view('new_view/Checkbill');
		$this->load->view('new_view/Footer');
	}

	public function upload_receipt(){
		$data = array(
			'trx_id' => $this->input->post('trx_id'),
			'type_upload' => $this->input->post('type_upload'),
	    	'base64image' => $this->input->post('base64image'),
	    	'secretkey' => $this->secretkey
	    );
		$url = 'web/transaction/uploadreceipt/';
    	$exec = $this->bs->post_curl($url,$data);
    	echo json_encode($exec);
	}



	public function inquiry(){
		$provider=$this->input->post('provider');
		$type_inq=$this->input->post('type_inq');

    	$data = array(
    		'provider' => $provider,
    		'type_inq' => $type_inq,
    		'secretkey' => 'asoy'
    	);
    	$url = 'web/transaction/inquiryweb/';
    	$exec = $this->bs->post_curl($url,$data);

    	echo json_encode($exec);
	}

	// public function checkbill(){

	// 	$this->load->view('Header');
	// 	$this->load->view('dashboard/Checkbill');
	// 	$this->load->view('Footer');
	// }


	public function services(){

		$this->load->view('new_view/Header');
		$this->load->view('new_view/Services');
		$this->load->view('new_view/Footer');
	}


	public function check_bill_inquiry(){
		$trx_number=$this->input->post('trx_number');
		$trx_type=$this->input->post('trx_type');
		$trx_date=$this->input->post('trx_date');

    	$data = array(
    		'trx_number' => $trx_number,
    		'trx_type' => $trx_type,
    		'trx_date' => $trx_date,
    		'secretkey' => 'asoy'
    	);
    	$url = 'web/transaction/checkbill/';
    	$exec = $this->bs->post_curl($url,$data);

    	echo json_encode($exec);
	}


	public function pricelist(){
		$type_inq=$this->input->post('type_inq');
    	$data = array(
    		'type_inq' => $type_inq,
    		'secretkey' => 'asoy'
    	);
    	$url = 'api/Inquiry/pricelist/';
    	$exec = $this->bs->post_curl($url,$data);

    	echo json_encode($exec);
	}


	public function artikel(){

		$this->load->view('Header');
		$this->load->view('dashboard/Info');
		$this->load->view('Footer');
	}


	public function visitor(){
		$url_path = $this->input->post('url_path');
		$ip_host = $_SERVER['REMOTE_ADDR'];
		$random_code = rand(100000,999999);
		$data = array(
			'url_path' => $url_path,
			'ip_host' => $ip_host,
			'random_code' => $random_code,
	    	'secretkey' => $this->secretkey
	    );
	    $url = 'api/base/visitor/';
	    $exec = $this->bs->post_curl($url,$data);
	    return $exec['Data'];
	}
}
