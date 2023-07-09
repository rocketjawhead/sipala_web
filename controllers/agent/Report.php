<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {


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


	public function task(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  

        if ($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2') {
            $user_id = $this->input->post('userid');
        }else{
            $user_id = $this->session->userdata('session_userid');
        }
        

        $data_user = array(
            'user_id' => $user_id,
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_data = 'api/Report/taskdaily';
        $exec_data = $this->base->post_curl($url_data,$data_user);
        $data['list_activity'] = $exec_data['Data'];
        //

        //list user
        $url_user = 'api/User/listuser';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_user'] = $exec_user['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        if ($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2') {
            $this->load->view('agent/report/Taskadmin',$data);
        }else{
            $this->load->view('agent/report/Task',$data);
        }
        $this->load->view('menu/Footer',$data);
    }

    public function filter(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  

        if ($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2') {
            $user_id = $this->input->post('userid');
        }else{
            $user_id = $this->session->userdata('session_userid');
        }
        

        $data_user = array(
            'user_id' => $user_id,
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_data = 'api/Report/taskdaily';
        $exec_data = $this->base->post_curl($url_data,$data_user);
        echo json_encode($exec_data);
    }


    public function absent(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  

        if ($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2') {
            $user_id = $this->input->post('userid');
        }else{
            $user_id = $this->session->userdata('session_userid');
        }
        

        $data_user = array(
            'user_id' => $user_id,
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_data = 'api/Report/taskdaily';
        $exec_data = $this->base->post_curl($url_data,$data_user);
        $data['list_activity'] = $exec_data['Data'];
        //

        //list user
        $url_user = 'api/User/listuser';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_user'] = $exec_user['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        if ($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2') {
            $this->load->view('agent/report/Taskadmin',$data);
        }else{
            $this->load->view('agent/report/Absent',$data);
        }
        $this->load->view('menu/Footer',$data);
    }

    //staff
    public function stafftask(){

        $data['main_menu'] = $this->base->main_menu();  

        if ($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2') {
            $user_id = $this->input->post('userid');
        }else{
            $user_id = $this->session->userdata('session_userid');
        }
        

        $data_user = array(
            'userid' => $user_id,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);

        // echo json_encode($exec_form);
        if ($exec_form['responsecode'] == '00') {
            $data['id_position'] = $exec_form['Data']['id_position'];
        }

        //list user
        $url_user = 'api/User/liststaff';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_staff'] = $exec_user['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/report/TaskStaff',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function activityedit(){

        $data['main_menu'] = $this->base->main_menu();  

        if ($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2') {
            $user_id = $this->input->post('userid');
        }else{
            $user_id = $this->session->userdata('session_userid');
        }
        

        $data_user = array(
            'userid' => $user_id,
            'secretkey' => $this->secretkey
        );
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/report/TaskUpdate',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function filter_stafftask(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  

        $data_user = array(
            'userid' => $this->input->post('userid'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_data = 'api/Report/taskdailystaff';
        $exec_data = $this->base->post_curl($url_data,$data_user);
        echo json_encode($exec_data);
    }


    public function execute_stafftask(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        
        $data_user = array(
            'id' => $this->input->post('id_value'),
            'userid' => $this->input->post('userid'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_data = 'api/Report/exectaskdailystaff';
        $exec_data = $this->base->post_curl($url_data,$data_user);
        echo json_encode($exec_data);
    }


    //rekap
    public function summary(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  

        if ($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2') {
            $user_id = $this->input->post('userid');
        }else{
            $user_id = $this->session->userdata('session_userid');
        }
        

        $data_user = array(
            'userid' => $user_id,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);
        // echo json_encode($exec_form);
        if ($exec_form['responsecode'] == '00') {
            $data['id_position'] = $exec_form['Data']['id_position'];
        }

        //list user
        $url_user = 'api/User/liststaff';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_staff'] = $exec_user['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/report/Summary',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function filter_summary(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  

        $data_user = array(
            'userid' => $this->input->post('userid'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_data = 'api/Report/summary';
        $exec_data = $this->base->post_curl($url_data,$data_user);
        echo json_encode($exec_data);
    }

    public function print($userid,$start_date,$end_date){
        $data['userid'] = $userid;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;

        $data_user = array(
            'userid' => $userid,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'secretkey' => $this->secretkey
        );

        //list data
        $url_data = 'api/Report/printsummary';
        $exec_data = $this->base->post_curl($url_data,$data_user);
        if ($exec_data['responsecode'] == '00') {
            $data['nip'] = $exec_data['Data']['nip'];
            $data['email'] = $exec_data['Data']['email'];
            $data['fullname'] = $exec_data['Data']['fullname'];
            $data['golongan'] = $exec_data['Data']['golongan'];
            $data['total_day'] = $exec_data['Data']['total_day'];
            $data['list_summary'] = $exec_data['Data']['data'];
        }

        // echo json_encode($data_user);
        $this->load->view('agent/report/Print',$data);
    }


        
}
