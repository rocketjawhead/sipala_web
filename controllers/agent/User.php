<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


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
        $url_user = 'api/User/listuser';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_user'] = $exec_user['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/user/Index',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function add(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  

        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_golongan = 'api/Master/listgolongan';
        $exec_golongan = $this->base->post_curl($url_golongan,$data_user);
        $data['list_golongan'] = $exec_golongan['Data'];
        //

        //list data
        $url_unit = 'api/Master/listunit';
        $exec_unit = $this->base->post_curl($url_unit,$data_user);
        $data['list_unit'] = $exec_unit['Data'];
        //

        //list data posisi
        $url_bagian = 'api/Master/listbagian';
        $exec_bagian = $this->base->post_curl($url_bagian,$data_user);
        $data['list_bagian'] = $exec_bagian['Data'];
        //

        //list data
        $url_user = 'api/User/listuser';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_user'] = $exec_user['Data'];
        //

        //list data
        $url_taskwork = 'api/Master/listtaskwork';
        $exec_taskwork = $this->base->post_curl($url_taskwork,$data_user);
        $data['list_taskwork'] = $exec_taskwork['Data'];
        //

        //list data
        $url_opd = 'api/Master/listopd';
        $exec_opd = $this->base->post_curl($url_opd,$data_user);
        $data['list_opd'] = $exec_opd['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/user/Add',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function insert(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'nip' => $this->input->post('nip'),
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'type_account' => $this->input->post('type_account'),
            'golongan' => $this->input->post('golongan'),
            'unit' => $this->input->post('unit'),
            'position' => $this->input->post('position'),
            'id_lead' => $this->input->post('id_lead'),
            'id_head' => $this->input->post('id_head'),
            'task_work' => $this->input->post('task_work'),
            'opd' => $this->input->post('opd'),
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/User/adduser/';
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

        $url = 'api/User/detailuser/';
        $exec_form = $this->base->post_curl($url,$form_data);
        if ($exec_form['responsecode'] == '00') {
            $data['id'] = $exec_form['Data']['id'];
            $data['nip'] = $exec_form['Data']['nip'];
            $data['unique_id'] = $exec_form['Data']['unique_id'];
            $data['fullname'] = $exec_form['Data']['fullname'];
            $data['email'] = $exec_form['Data']['email'];
            $data['id_type_account'] = $exec_form['Data']['id_type_account'];
            $data['type_account'] = $exec_form['Data']['type_account'];
            $data['id_level'] = $exec_form['Data']['id_level'];
            $data['level'] = $exec_form['Data']['level'];
            $data['id_unit'] = $exec_form['Data']['id_unit'];
            $data['unit'] = $exec_form['Data']['unit'];
            $data['id_position'] = $exec_form['Data']['id_position'];
            $data['position'] = $exec_form['Data']['position'];
            $data['id_lead'] = $exec_form['Data']['id_lead'];
            $data['id_head'] = $exec_form['Data']['id_head'];
            $data['direct_lead'] = $exec_form['Data']['direct_lead'];
            $data['direct_head'] = $exec_form['Data']['direct_head'];
            $data['id_task_work'] = $exec_form['Data']['id_task_work'];
            $data['task_work'] = $exec_form['Data']['task_work'];
            $data['id_opd'] = $exec_form['Data']['id_opd'];
            $data['opd'] = $exec_form['Data']['opd'];
            $data['status'] = $exec_form['Data']['status'];

        }

        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_golongan = 'api/Master/listgolongan';
        $exec_golongan = $this->base->post_curl($url_golongan,$data_user);
        $data['list_golongan'] = $exec_golongan['Data'];
        //

        //list data
        $url_unit = 'api/Master/listunit';
        $exec_unit = $this->base->post_curl($url_unit,$data_user);
        $data['list_unit'] = $exec_unit['Data'];
        //

        //list data posisi
        $url_bagian = 'api/Master/listbagian';
        $exec_bagian = $this->base->post_curl($url_bagian,$data_user);
        $data['list_bagian'] = $exec_bagian['Data'];
        //

        //list data
        $url_user = 'api/User/listuser';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_user'] = $exec_user['Data'];
        //

        //list data
        $url_taskwork = 'api/Master/listtaskwork';
        $exec_taskwork = $this->base->post_curl($url_taskwork,$data_user);
        $data['list_taskwork'] = $exec_taskwork['Data'];
        //

        //list data
        $url_opd = 'api/Master/listopd';
        $exec_opd = $this->base->post_curl($url_opd,$data_user);
        $data['list_opd'] = $exec_opd['Data'];
        //

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/user/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function update(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        
        $data = array(
            'id' => $this->input->post('id'),
            'nip' => $this->input->post('nip'),
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'type_account' => $this->input->post('type_account'),
            'golongan' => $this->input->post('golongan'),
            'unit' => $this->input->post('unit'),
            'position' => $this->input->post('position'),
            'id_lead' => $this->input->post('id_lead'),
            'id_head' => $this->input->post('id_head'),
            'task_work' => $this->input->post('task_work'),
            'opd' => $this->input->post('opd'),
            'status' => $this->input->post('status'),
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/User/updateuser/';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }

    public function download($end_url){
      $url = $this->service_url.'uploads/qrcode/'.$end_url.'.png';
        echo $url;
      // header('Content-Type: application/octet-stream');
      // header("Content-Transfer-Encoding: Binary"); 
      // header("Content-disposition: attachment; filename=\"" . basename($url) . "\""); 
      // readfile($url); 
    }


    public function changeadmin($id,$nip){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'is_admin' => $id,
            'userid' => $nip,
            'secretkey' => $this->secretkey
        );

        // echo json_encode($data_user);
        // die();
        //list data
        $url_user = 'api/User/changeadmin/';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        redirect('agent/User/index');
    }


    public function find_user($id){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['main_menu'] = $this->base->main_menu();  
        $form_data = array(
            'uniqueid' => $id,
            'secretkey' => $this->secretkey
        );

        $url = 'api/User/finduser/';
        $exec_form = $this->base->post_curl($url,$form_data);

        if ($exec_form['responsecode'] == '00') {
            $data['id'] = $exec_form['Data']['id'];
            $data['nip'] = $exec_form['Data']['nip'];
            $data['unique_id'] = $exec_form['Data']['unique_id'];
            $data['fullname'] = $exec_form['Data']['fullname'];
            $data['email'] = $exec_form['Data']['email'];

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/absent/Finduser',$data);
        $this->load->view('menu/Footer',$data);

    }

        
}
