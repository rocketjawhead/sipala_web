<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taskwork extends CI_Controller {


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
        $url_taskwork = 'api/Master/listtaskwork';
        $exec_taskwork = $this->base->post_curl($url_taskwork,$data_user);
        $data['list_taskwork'] = $exec_taskwork['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/taskwork/Index',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function add(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/taskwork/Add',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function insert(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'title' => $this->input->post('title'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Master/addtaskwork/';
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

        $url = 'api/Master/detailtaskwork/';
        $exec_form = $this->base->post_curl($url,$form_data);
        if ($exec_form['responsecode'] == '00') {
            $data['id'] = $exec_form['Data']['id'];
            $data['title'] = $exec_form['Data']['title'];
            $data['status'] = $exec_form['Data']['status'];

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/taskwork/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function update(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'status' => $this->input->post('status'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Master/updatetaskwork/';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }

        
}
