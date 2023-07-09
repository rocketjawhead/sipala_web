<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absent extends CI_Controller {


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
            'type_absent' => "2,3,4",
            'limit' => "0",
            'secretkey' => $this->secretkey
        );

        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);
        // echo json_encode($exec_form);
        if ($exec_form['responsecode'] == '00') {
            $data['id_position'] = $exec_form['Data']['id_position'];
        }


        //list absent
        $url_absent = 'api/Absent/listabsent';
        $exec_bank = $this->base->post_curl($url_absent,$data_user);
        $data['list_absent'] = $exec_bank['Data'];
        //


        $url_absent_staff = 'api/Absent/listabsentstaff';
        $exec_bank = $this->base->post_curl($url_absent_staff,$data_user);
        $data['list_absent_staff'] = $exec_bank['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/absent/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function add(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);
        // echo json_encode($exec_form);
        if ($exec_form['responsecode'] == '00') {
            $data['id_position'] = $exec_form['Data']['id_position'];
        }
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/absent/Add',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function approve($id){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');


        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'userid' => $session_userid,
            'absentid' => $id,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Absent/approve/';
        $exec = $this->base->post_curl($url,$data);
        // echo json_encode($exec);
        redirect('agent/Absent/index');

    }


    //manual
    public function manual(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'type_absent' => '1,5',
            'secretkey' => $this->secretkey
        );

        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);
        // echo json_encode($exec_form);
        if ($exec_form['responsecode'] == '00') {
            $data['id_position'] = $exec_form['Data']['id_position'];
        }


        //list absent
        $url_absent = 'api/Absent/listabsent';
        $exec_bank = $this->base->post_curl($url_absent,$data_user);
        $data['list_absent'] = $exec_bank['Data'];
        //


        $url_absent_staff = 'api/Absent/listabsentstaff';
        $exec_bank = $this->base->post_curl($url_absent_staff,$data_user);
        $data['list_absent_staff'] = $exec_bank['Data'];
        //

        //history
        $url_history = 'api/Activity/historyactivity';
        $exec_history = $this->base->post_curl($url_history,$data_user);
        $data['list_history'] = $exec_history['Data'];
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/absent/Manual',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function addmanual(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);
        // echo json_encode($exec_form);
        if ($exec_form['responsecode'] == '00') {
            $data['id_position'] = $exec_form['Data']['id_position'];
        }


        //list user
        $url_user = 'api/User/listuser';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_user'] = $exec_user['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/absent/Addmanual',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function scanqr(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'type_absent' => '1,5',
            'secretkey' => $this->secretkey
        );

        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);
        // echo json_encode($exec_form);
        if ($exec_form['responsecode'] == '00') {
            $data['id_position'] = $exec_form['Data']['id_position'];
        }


        //list absent
        $url_absent = 'api/Absent/listabsent';
        $exec_bank = $this->base->post_curl($url_absent,$data_user);
        $data['list_absent'] = $exec_bank['Data'];
        //


        $url_absent_staff = 'api/Absent/listabsentstaff';
        $exec_bank = $this->base->post_curl($url_absent_staff,$data_user);
        $data['list_absent_staff'] = $exec_bank['Data'];
        //

        //history
        $url_history = 'api/Activity/historyactivity';
        $exec_history = $this->base->post_curl($url_history,$data_user);
        $data['list_history'] = $exec_history['Data'];
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/absent/Scan',$data);
        $this->load->view('menu/Footer',$data);
    }

        
}
