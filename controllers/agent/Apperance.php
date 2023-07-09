<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apperance extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');

        $this->base_url = $this->config->item("base_url");
        $this->service_url = $this->config->item("service_url");
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
        $url_user = 'api/Apperance/list';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_data'] = $exec_user['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/apperance/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function detail($id){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['main_menu'] = $this->base->main_menu();  
        $form_data = array(
            'type_code' => $id,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Apperance/detail/';
        $exec_form = $this->base->post_curl($url,$form_data);

        // echo json_encode($exec_form);
        // die();

        if ($exec_form['responsecode'] == '00') {
            $data['id'] = $exec_form['Data']['id'];
            $data['type_code'] = $exec_form['Data']['type_code'];
            $data['type_name'] = $exec_form['Data']['type_name'];
            $data['imageurl'] = $exec_form['Data']['imageurl'];
            $data['height'] = $exec_form['Data']['height'];
            $data['width'] = $exec_form['Data']['width'];
        }


        $this->load->view('menu/Header',$data);
        $this->load->view('agent/apperance/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function update(){
        $data['session_userid'] = $this->session->userdata('session_userid');


        $base64_img = $this->input->post('base64_img');
        $str_replace_img = str_replace("\/", "/", $base64_img);

        $data['main_menu'] = $this->base->main_menu();  
        $data_req = array(
            'userid' => $this->session->userdata('session_userid'),
            'id' => $this->input->post('id'),
            'type_code' => $this->input->post('type_code'),
            'type_name' => $this->input->post('type_name'),
            'height' => $this->input->post('height'),
            'width' => $this->input->post('width'),
            'imageurl' => $str_replace_img,
            'secretkey' => $this->secretkey
        );
        
        $url = 'api/Apperance/update/';
        $exec = $this->base->post_curl($url,$data_req);
        echo json_encode($exec);
    }


        
}
