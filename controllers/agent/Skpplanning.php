<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpplanning extends CI_Controller {


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
        $url_bank = 'api/Master/listskpplanning';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_skpplanning'] = $exec_bank['Data'];
        //


        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/skp_planning/Index',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function add(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url_bank = 'api/Master/listskpunit';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_skpunit'] = $exec_bank['Data'];
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/skp_planning/Add',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function insert(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        

        $data = array(
            'userid' => $this->session->userdata('session_userid'),
            'title' => $this->input->post('title'),
            'id_skp_unit' => $this->input->post('id_skp_unit'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Master/addskpplanning/';
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

        $url = 'api/Master/detailskpplanning/';
        $exec_form = $this->base->post_curl($url,$form_data);
        if ($exec_form['responsecode'] == '00') {
            $data['id'] = $exec_form['Data']['id'];
            $data['title'] = $exec_form['Data']['title'];
            $data['id_skp_unit'] = $exec_form['Data']['id_skp_unit'];
            $data['skp_unit'] = $exec_form['Data']['skp_unit'];
            $data['status'] = $exec_form['Data']['status'];

        }

        $url_skpunit = 'api/Master/listskpunit';
        $exec_skpunit = $this->base->post_curl($url_skpunit,$form_data);
        $data['list_skpunit'] = $exec_skpunit['Data'];

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/skp_planning/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function update(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'userid' => $this->session->userdata('session_userid'),
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'id_skp_unit' => $this->input->post('id_skp_unit'),
            'status' => $this->input->post('status'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Master/updateskpplanning/';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }

        
}
