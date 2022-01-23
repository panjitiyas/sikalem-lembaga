<?php
 

class Data_user extends CI_Controller{
                function __construct(){

                                parent::__construct();                       
                                $this->load->library('user_agent');
                }
                function whos()
                {
                    $query = $this->fungsi->user_login();
                     echo '<pre>';
                    echo  print_r($query);

                }
                function index(){

                                if ($this->agent->is_browser()){
                                                $agent = $this->agent->browser().' '.$this->agent->version();
                                }elseif ($this->agent->is_mobile()){
                                                $agent = $this->agent->mobile();
                                }else{
                                                $agent = 'Data user gagal di dapatkan';
                                }
                                echo "Di akses dari :<br/>";
                                echo "Browser = ". $agent . "<br/>";
                                echo "Sistem Operasi = " . $this->agent->platform() ."<br/>"; // Platform info (Windows, Linux, Mac, etc.)
                                //ip hanya muncul pada hosting

                                echo "IP = " . $this->input->ip_address();
                }
}