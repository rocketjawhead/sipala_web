<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {


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
            'user_id' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_bank = 'api/Activity/listactivity';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_activity'] = $exec_bank['Data'];
        //


        $data_profile = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        $url_profile = 'api/Profile/checkprofile';
        $exec_profile = $this->base->post_curl($url_profile,$data_profile);

        if ($exec_profile['responsecode'] == '00') {
            $data['email'] = $exec_profile['Data']['email'];
            // $data['status_act'] = $exec_profile['Data']['status_act'];
            // $data['status_desc'] = $exec_profile['Data']['status_desc'];
            $data['login_date'] = $exec_profile['Data']['login_date'];
            // $data['logout_date'] = $exec_profile['Data']['logout_date'];
        }
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/activity/Index',$data);
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
        $url_place = 'api/Master/listplace';
        $exec_place = $this->base->post_curl($url_place,$data_user);
        $data['list_place'] = $exec_place['Data'];
        //

        //list data
        $url_task = 'api/Master/listtask';
        $exec_task = $this->base->post_curl($url_task,$data_user);
        $data['list_task'] = $exec_task['Data'];
        //

        //list data
        $url_organizer = 'api/Master/listorganizer';
        $exec_organizer = $this->base->post_curl($url_organizer,$data_user);
        $data['list_organizer'] = $exec_organizer['Data'];
        // 
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/activity/Add',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function insert(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');


        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'user_id' => $session_userid,
            'act_date' => $this->input->post('act_date'),
            'start_time' => $this->input->post('start_time'),
            'end_time' => $this->input->post('end_time'),
            'act_detail' => $this->input->post('act_detail'),
            'place' => $this->input->post('place'),
            'pj' => $this->input->post('pj'),
            'remark' => null,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Activity/addactivity/';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }

    public function detail($id){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_type'] = $this->session->userdata('session_typeaccount');
        $data['main_menu'] = $this->base->main_menu();  
        $form_data = array(
            'id' => $id,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Activity/detailactivity/';
        $exec_form = $this->base->post_curl($url,$form_data);
        if ($exec_form['responsecode'] == '00') {
            $data['id'] = $exec_form['Data']['id'];
            $data['act_date'] = $exec_form['Data']['act_date'];
            $data['start_time'] = $exec_form['Data']['start_time'];
            $data['end_time'] = $exec_form['Data']['end_time'];
            $data['act_detail'] = $exec_form['Data']['act_detail'];
            $data['place'] = $exec_form['Data']['place'];
            $data['organizer'] = $exec_form['Data']['organizer'];
            

        }


        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        //list data
        $url_place = 'api/Master/listplace';
        $exec_place = $this->base->post_curl($url_place,$data_user);
        $data['list_place'] = $exec_place['Data'];
        //

        //list data
        $url_task = 'api/Master/listtask';
        $exec_task = $this->base->post_curl($url_task,$data_user);
        $data['list_task'] = $exec_task['Data'];
        //

        //list data
        $url_organizer = 'api/Master/listorganizer';
        $exec_organizer = $this->base->post_curl($url_organizer,$data_user);
        $data['list_organizer'] = $exec_organizer['Data'];
        // 

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/activity/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function update(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'id' => $this->input->post('id'),
            'act_date' => $this->input->post('act_date'),
            'start_time' => $this->input->post('start_time'),
            'end_time' => $this->input->post('end_time'),
            'act_detail' => $this->input->post('act_detail'),
            'place' => $this->input->post('place'),
            'pj' => $this->input->post('pj'),
            'remark' => $this->input->post('remark'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Activity/updateactivity/';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }


    public function doactivity(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');


        $base64_img = $this->input->post('base64_img');
        $str_replace_img = str_replace("\/", "/", $base64_img);

        // echo $str_replace_img;
        // die();

        $data = array(
            'userid' => $this->session->userdata('session_userid'),
            'type_act' => $this->input->post('type_act'),
            'start_date' => $this->input->post('start_leave'),
            'end_date' => $this->input->post('end_leave'),
            'desc_activity' => $this->input->post('desc_leave'),
            'imageurl' => $str_replace_img,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Activity/doactivity';
        // echo json_encode($data);
        // die();
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }

    public function doactivitymanual(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');


        $base64_img = $this->input->post('base64_img');
        $str_replace_img = str_replace("\/", "/", $base64_img);

        // echo $str_replace_img;
        // die();

        $data = array(
            'userid' => $this->input->post('userid'),
            'type_act' => $this->input->post('type_act'),
            'start_date' => $this->input->post('start_leave'),
            'end_date' => $this->input->post('end_leave'),
            'desc_activity' => $this->input->post('desc_leave'),
            'imageurl' => $str_replace_img,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Activity/doactivity';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }


    public function absent(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'user_id' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_bank = 'api/Activity/listabsent';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_activity'] = $exec_bank['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/activity/Absent',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function addmanual(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu(); 
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        //list data
        $url_place = 'api/Master/listplace';
        $exec_place = $this->base->post_curl($url_place,$data_user);
        $data['list_place'] = $exec_place['Data'];
        //

        //list data
        $url_task = 'api/Master/listtask';
        $exec_task = $this->base->post_curl($url_task,$data_user);
        $data['list_task'] = $exec_task['Data'];
        //

        //list data
        $url_organizer = 'api/Master/listorganizer';
        $exec_organizer = $this->base->post_curl($url_organizer,$data_user);
        $data['list_organizer'] = $exec_organizer['Data'];
        // 


        //list user
        $url_user = 'api/User/listuser';
        $exec_user = $this->base->post_curl($url_user,$data_user);
        $data['list_user'] = $exec_user['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/activity/Addmanual',$data);
        $this->load->view('menu/Footer',$data);
    }


    //upload excel
    public function uploadabsent(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu(); 
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/activity/Uploadabsent',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function doactivityscan(){


        $base64_img = $this->input->post('base64_img');
        $str_replace_img = str_replace("\/", "/", $base64_img);

        // echo $str_replace_img;
        // die();

        $data = array(
            'userid' => $this->input->post('userid'),
            'type_act' => $this->input->post('type_act'),
            'start_date' => $this->input->post('start_leave'),
            'end_date' => $this->input->post('end_leave'),
            'desc_activity' => $this->input->post('desc_leave'),
            'imageurl' => $str_replace_img,
            'secretkey' => $this->secretkey
        );

        $url = 'api/Activity/doactivity';
        // echo json_encode($data);
        // die();
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }



        
}
