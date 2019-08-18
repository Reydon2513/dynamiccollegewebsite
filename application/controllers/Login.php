<?php
// Created By Yogesh2513 @14-06-2019
class Login extends CI_Controller{
    public function index($error=3){
        $data['error']=$error;
        $this->load->view('admin/login',$data);
    }
    public function do_login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        if($this->validate_user($username,$password)){
            $session=array(
                "is_admin_login"=>true,
                "login_by"=>"admin"
            );
            $this->session->set_userdata($session);
            redirect(site_url().'/admin/index','refresh');
        }else{
            $this->index(1);
        }
    }
    public function validate_user($username,$password){
        $data=$this->AdminModel->get_login()->result();
        $temp=0;
        foreach ($data as $value) {
            if($username == $value->username && $password == $value->password){
                $temp++;
            }
        }
        if($temp!=0){
            return true;
        }else{
            return false;
        }
    }
}

?>