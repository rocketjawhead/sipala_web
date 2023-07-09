<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


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


    public function index()
    {
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
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
        //

        //card dashboard
        $url_profile = 'api/Base/totaldashboard';
        $exec_profile = $this->base->post_curl($url_profile,$data_profile);
        if ($exec_profile['responsecode'] == '00') {
            $data['total_user'] = $exec_profile['Data']['total_user'];
            $data['total_absent'] = $exec_profile['Data']['total_absent'];
            $data['total_leave'] = $exec_profile['Data']['total_leave'];
        }

        //top
        $url_top = 'api/Activity/topactivity';
        $exec_top = $this->base->post_curl($url_top,$data_profile);
        $data['list_top'] = $exec_top['Data'];

        //history
        $url_history = 'api/Activity/historyactivity';
        $exec_history = $this->base->post_curl($url_history,$data_profile);
        $data['list_history'] = $exec_history['Data'];

        //last login
        $url_history = 'api/Base/lastlogin';
        $exec_history = $this->base->post_curl($url_history,$data_profile);
        $data['list_lastlogin'] = $exec_history['Data'];

        //chart
        $url_profile = 'api/Base/valuechart';
        $exec_profile = $this->base->post_curl($url_profile,$data_profile);
        if ($exec_profile['responsecode'] == '00') {
            for ($i=1; $i < 13; $i++) { 
                $data['data_absent_bulan'.$i] = $exec_profile['Data']['data_absent']['bulan'.$i];
            }
            for ($i=1; $i < 13; $i++) { 
                $data['data_sick_bulan'.$i] = $exec_profile['Data']['data_sick']['bulan'.$i];
            }
            for ($i=1; $i < 13; $i++) { 
                $data['data_leave_bulan'.$i] = $exec_profile['Data']['data_leave']['bulan'.$i];
            }
            
        }

        //absent
        $url_absent = 'api/Profile/checkprofile';
        $exec_absent = $this->base->post_curl($url_absent,$data_profile);
        $data['list_absent'] = $exec_absent['Data'];

        if ($exec_absent['responsecode'] == '00') {
            $data['email'] = $exec_absent['Data']['email'];
            $data['login_date'] = $exec_absent['Data']['login_date'];
            $data['latitude'] = $exec_absent['Data']['latitude'];
            $data['longitude'] = $exec_absent['Data']['longitude'];
            $data['start_absent_latitude'] = $exec_absent['Data']['start_absent_latitude'];
            $data['start_absent_longitude'] = $exec_absent['Data']['start_absent_longitude'];
            $data['start_absent_address'] = $exec_absent['Data']['start_absent_address'];
            $data['today_act'] = $exec_absent['Data']['today_act'];
            $data['today_act_desc'] = $exec_absent['Data']['today_act_desc'];
            $data['start_time_absent'] = $exec_absent['Data']['start_absent'];
            $data['end_time_absent'] = $exec_absent['Data']['end_absent'];
        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/Dashboard',$data);
        $this->load->view('menu/Footer',$data);
    }

        
}
