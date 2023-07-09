<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');
        $this->service_url = $this->config->item('service_url');

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

        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);
        // echo json_encode($exec_form);
        if ($exec_form['responsecode'] == '00') {
            $data['id'] = $exec_form['Data']['id'];
            $data['nip'] = $exec_form['Data']['nip'];
            $data['email'] = $exec_form['Data']['email'];
            $data['fullname'] = $exec_form['Data']['fullname'];
            $data['id_level'] = $exec_form['Data']['id_level'];
            $data['level'] = $exec_form['Data']['level'];
            $data['unit'] = $exec_form['Data']['unit'];
            $data['unit_2'] = $exec_form['Data']['unit_2'];
            $data['position'] = $exec_form['Data']['position'];
            $data['direct_lead'] = $exec_form['Data']['direct_lead'];
            $data['direct_head'] = $exec_form['Data']['direct_head'];
            $data['id_lead'] = $exec_form['Data']['id_lead'];
            $data['id_head'] = $exec_form['Data']['id_head'];
            $data['id_task_work'] = $exec_form['Data']['id_task_work'];
            $data['task_work'] = $exec_form['Data']['task_work'];
            $data['id_opd'] = $exec_form['Data']['id_opd'];
            $data['opd'] = $exec_form['Data']['opd'];
        }

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

        //list data jabatan
        $url_jabatan = 'api/Master/listjabatan';
        $exec_bagian = $this->base->post_curl($url_jabatan,$data_user);
        $data['list_jabatan'] = $exec_bagian['Data'];
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
        $this->load->view('agent/profile/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function update(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $data = array(
            'userid' => $this->session->userdata('session_userid'),
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'position' => $this->input->post('position'),
            'unit' => $this->input->post('unit'),
            'unit_2' => $this->input->post('unit_2'),
            'id_lead' => $this->input->post('id_lead'),
            'id_head' => $this->input->post('id_head'),
            'task_work' => $this->input->post('task_work'),
            'opd' => $this->input->post('opd'),
            'secretkey' => $this->secretkey
        );

        $url = 'api/Profile/updateprofile/';
        $exec = $this->base->post_curl($url,$data); 

        if ($exec['responsecode'] == '00') {

            $data = array(
                'session_fullname' => $this->input->post('fullname')
            );

            $this->session->set_userdata($data);
        }

        echo json_encode($exec);

    }


    public function changepicture(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'user_id' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/profile/Changepicture',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function updatepicture(){
        $data['session_userid'] = $this->session->userdata('session_userid');


        $base64_img = $this->input->post('base64_img');
        $str_replace_img = str_replace("\/", "/", $base64_img);

        $data['main_menu'] = $this->base->main_menu();  
        $data_req = array(
            'userid' => $this->session->userdata('session_userid'),
            'imageurl' => $str_replace_img,
            'secretkey' => $this->secretkey
        );
        
        $url = 'api/Profile/updatepicture/';
        $exec = $this->base->post_curl($url,$data_req);

        if ($exec['responsecode'] == '00') {

            $data = array(
                'session_imageprofil' =>$exec['Data']['imageprofil']
            );

            $this->session->set_userdata($data);
        }
        echo json_encode($exec);
    }


    public function nametag(){
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);
        if ($exec_form['responsecode'] == '00') {
            $data['fullname'] = $exec_form['Data']['fullname'];
            $data['nip'] = $exec_form['Data']['nip'];
            $data['qr_url'] = $exec_form['Data']['qr_url'];
            $data['imageprofil'] = $exec_form['Data']['imageprofil'];
            $data['unit'] = $exec_form['Data']['unit'];
        }
        // $this->load->view('menu/Header',$data);
        // $this->load->view('agent/profile/Nametag',$data);
        // $this->load->view('menu/Footer',$data);

        //create image
        // Create image instances
        $dest = imagecreatefrompng('https://sipala.fakfakkab.go.id/name_tag/name_tag_1.png');
        $src = imagecreatefrompng($data['qr_url']);
        $profil = imagecreatefrompng($data['imageprofil']);


        // Copy and merge
        imagecopymerge($dest, $src, 40, 1288, 0, 0, 289, 290, 100);
        $imgresize = imagescale($profil,300,420);
        //foto
        imagecopymerge($dest, $imgresize, 364, 308, 0, 0, 296, 420, 100);
        //kiri-kanan,tinggi-bawah,0,0,lebar,tinggi,opacity
        // Output and free from memory
        $text_color = imagecolorallocate($dest, 255, 255, 255);
        imagestring($dest, 5, 435, 750,  $data['fullname'], $text_color);

        imagestring($dest, 5, 435, 780,  $data['nip'], $text_color);

        header('Content-Type: image/png');
        imagegif($dest);

        imagedestroy($dest);
        imagedestroy($src);
        

        //end create
    }

    public function download(){


      $data_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        $url = 'api/Profile/userprofile/';
        $exec_form = $this->base->post_curl($url,$data_user);


            $data['fullname'] = $exec_form['Data']['fullname'];
            $data['nip'] = $exec_form['Data']['nip'];
            $data['qr_url'] = $exec_form['Data']['qr_url'];
            $data['imageprofil'] = $exec_form['Data']['imageprofil'];
            $data['unit'] = $exec_form['Data']['unit'];

            $end_url = $exec_form['Data']['nip'];
         
      $url = $this->service_url.'uploads/qrcode/'.$end_url.'.png';
        // echo $url;
        // die();
      header('Content-Type: application/octet-stream');
      header("Content-Transfer-Encoding: Binary"); 
      header("Content-disposition: attachment; filename=\"" . basename($url) . "\""); 
      readfile($url); 
    }


    public function changepassword(){
        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        $data['session_userid'] = $this->session->userdata('session_userid');

        $data['main_menu'] = $this->base->main_menu();  
        $data_user = array(
            'user_id' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/profile/Changepassword',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function updatepassword(){
        $data['session_userid'] = $this->session->userdata('session_userid');


        $password_old = $this->input->post('password_old');
        $password_new = $this->input->post('password_new');
        $password_new_conf = $this->input->post('password_new_conf');

        $data['main_menu'] = $this->base->main_menu();  
        $data_req = array(
            'userid' => $this->session->userdata('session_userid'),
            'password_old' => $password_old,
            'password_new' => $password_new,
            'password_new_conf' => $password_new_conf,
            'secretkey' => $this->secretkey
        );
        
        $url = 'api/Profile/changepassword/';
        $exec = $this->base->post_curl($url,$data_req);
        echo json_encode($exec);
    }

        
}
