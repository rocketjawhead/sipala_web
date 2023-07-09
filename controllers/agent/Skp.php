<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');
        $this->load->library('cart');
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
        $url_bank = 'api/Skp/list';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_skp'] = $exec_bank['Data'];
        //
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/skp/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function add($year_now = null){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'year_now' => $year_now,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        //list data
        $url_bank = 'api/Skp/listdetail';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);
        $data['list_skp'] = $exec_bank['Data'];
        //

        $url_unit = 'api/Master/listskpunit';
        $exec_unit = $this->base->post_curl($url_unit,$data_user);
        $data['list_skpunit'] = $exec_unit['Data'];

        $url_category = 'api/Master/getskpcategory';
        $exec_category = $this->base->post_curl($url_category,$data_user);
        $data['list_skpcategory'] = $exec_category['Data'];

        $url_indikator = 'api/Master/getskpindikator';
        $exec_indikator = $this->base->post_curl($url_indikator,$data_user);
        $data['list_skpindikator'] = $exec_indikator['Data'];

        $url_satuan = 'api/Master/getskpsatuan';
        $exec_satuan = $this->base->post_curl($url_satuan,$data_user);
        $data['list_skpsatuan'] = $exec_satuan['Data'];
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/skp/Add',$data);
        $this->load->view('menu/Footer',$data);
    }


    function add_ajax_skpplanning($id_skp_unit){
        
        $data_user = array(
            'id' => $id_skp_unit,
            'secretkey' => $this->secretkey
        );

        $url_bank = 'api/Master/getskpplanning';
        $exec_bank = $this->base->post_curl($url_bank,$data_user);

        $res = json_encode($exec_bank['Data']);
        $res1 = json_decode($res);
        $data = "<option value=''>--- Pilih Rencana Kinerja ---</option>";
        foreach ($res1 as $value) {
            $data .= "<option value='".$value->id."'>".$value->title."</option>";
        }

        echo $data;
    }


    public function insert(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');


        // year_now: year_now, 
        // id_skp_unit: id_skp_unit,
        // id_skp_planning: id_skp_planning,
        // id_skp_category: id_skp_category,
        // id_skp_indikator: id_skp_indikator,
        // id_skp_satuan: id_skp_satuan,
        // min_target: min_target,
        // max_target: max_target

        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'userid' => $session_userid,
            'year_now' => $this->input->post('year_now'),
            'id_skp_unit' => $this->input->post('id_skp_unit'),
            'id_skp_planning' => $this->input->post('id_skp_planning'),
            'id_skp_category' => $this->input->post('id_skp_category'),
            'id_skp_indikator' => $this->input->post('id_skp_indikator'),
            'id_skp_satuan' => $this->input->post('id_skp_satuan'),
            'min_target' => $this->input->post('min_target'),
            'max_target' => $this->input->post('max_target'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Skp/add/';
        $exec = $this->base->post_curl($url,$data);
        echo json_encode($exec);

    }


        
}
