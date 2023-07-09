<?php
class M_base extends CI_Model {

      public function __construct()
      {
              parent::__construct();
              $this->service_url = $this->config->item("service_url");
              $this->secretkey = $this->config->item('secretkey');
              $this->random_code = rand(100000,999999);
      }
     

      //CURL PHP
      function post_curl($url,$data){

            $random_code = $this->random_code;
            $content = json_encode($data);

            $service_url = $this->service_url.$url;

            date_default_timezone_set('Asia/Jakarta');

            $start_curl_post = date('Y-m-d h:i:s');

            $curl = curl_init($service_url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); 
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'Content-Length: ' . strlen($content)));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 15);//10 detik timedelay simulator
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

            //log_activity
            $this->post_curl_activity($url,$data,$random_code);
            //log activity

            $response = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);    
            //log_activity
            $this->post_curl_activity($url,json_decode($response),$random_code);
            //log activity
            curl_close($curl);
            return $response = json_decode($response,true);
    }

    //curl bearer token


    function post_curl_activity($url,$data,$random_code){

            $content = array(
              'userid' => $this->session->userdata('session_userid'),
              'url_path' => $url,
              'json_param' => json_encode($data),
              'random_code' => $random_code,
              'secretkey' => $this->secretkey
            );
            $content = json_encode($content);
            // echo json_encode($content);
            // die();

            $url_service = 'api/base/logactivity/';
            $service_url = $this->service_url.$url_service;

            date_default_timezone_set('Asia/Jakarta');

            $start_curl_post = date('Y-m-d h:i:s');

            $curl = curl_init($service_url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); 
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'Content-Length: ' . strlen($content)));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 15);//10 detik timedelay simulator
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);    

            curl_close($curl);
            $response = json_decode($response,true);

    }

    function main_menu(){
      $data = array(
        'secretkey' => $this->secretkey
      );
      $url = 'api/settings/mainmenu';
      $get_menu = $this->post_curl($url,$data);
      return json_encode($get_menu['Data']);
    }


    
}
?>