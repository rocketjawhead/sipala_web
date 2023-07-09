<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');

        $this->base_url = $this->config->item("base_url");

        if($this->session->userdata('is_logged_in') =='')
        {
         $this->session->set_flashdata('msg','Please Login to Continue');
         redirect('Login');
        }
    }


	public function index(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_bank = 'api/Master/listshift';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_shift'] = $exec_bank['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/shift/Index',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function add(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/shift/Add',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function insert(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'title_shift' => $this->input->post('title_shift'),
            'start_shift' => $this->input->post('start_shift'),
            'end_shift' => $this->input->post('end_shift'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Master/addshift/';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }

    public function detail($id){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['main_menu'] = $this->base->main_menu();  
        $form_data = array(
            'id' => $id,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Master/detailshift/';
        $exec_form = $this->base->post_curl($url,$form_data);
        if ($exec_form['responsecode'] == '00') {
            $data['id'] = $exec_form['Data']['id'];
            $data['title_shift'] = $exec_form['Data']['title_shift'];
            $data['start_shift'] = $exec_form['Data']['start_shift'];
            $data['end_shift'] = $exec_form['Data']['end_shift'];
            $data['status'] = $exec_form['Data']['status'];

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/shift/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function update(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'id' => $this->input->post('id'),
            'title_shift' => $this->input->post('title_shift'),
            'start_shift' => $this->input->post('start_shift'),
            'end_shift' => $this->input->post('end_shift'),
            'status' => $this->input->post('status'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Master/updateshift/';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }

        
}
