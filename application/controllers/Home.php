<?php

// Created By Yogesh2513 @14-06-2019

class Home extends CI_Controller{

    // Default Method To Load Index Page
    public function index(){
        
        $data['slideshow']=$this->HomeModel->get_slideshow_images()->result();
        $data['textcontent']=$this->HomeModel->get_text_content()->result();
        $data['courses']=$this->HomeModel->get_particular_course_list()->result();
        $data['gallery']=$this->HomeModel->get_gallery_images()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['aboutus']=$this->HomeModel->get_aboutus_detail()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $data['craft']=$this->HomeModel->get_craft()->result();
        $data['forms']=$this->HomeModel->get_forms()->result();
        $this->load->view("cms/common/header",$data);
        $this->load->view("cms/home",$data);
        $this->load->view("cms/common/footer",$data);
    }

    public function panorama(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/panorama",$data);
        $this->load->view("cms/common/footer.php",$data);
    }

    public function rule(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['rule']=$this->HomeModel->get_rules()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/rule",$data);
        $this->load->view("cms/common/footer.php",$data);
    }

    public function gallery(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $gallery_one=$this->HomeModel->get_gallery_one()->result_array();
        $gallery_two=$this->HomeModel->get_gallery_two()->result_array();
        $data['gallery']=array_merge($gallery_one,$gallery_two);
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/gallery",$data);
        $this->load->view("cms/common/footer.php",$data);
    }
    

    public function staff(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['staff']=$this->HomeModel->get_staff()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/staff",$data);
        $this->load->view("cms/common/footer.php",$data);
    }
    


    public function courses(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['courses']=$this->HomeModel->get_course_list()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/courses",$data);
        $this->load->view("cms/common/footer.php",$data);
    }

    public function extracurricular(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['activity']=$this->HomeModel->get_extracurricular_activities()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/extracurricular",$data);
        $this->load->view("cms/common/footer.php",$data);
    }
    

    public function placementstudents(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['placement_students']=$this->HomeModel->get_placement_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/placementstudents",$data);
        $this->load->view("cms/common/footer.php",$data);
    }

    public function news(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/news",$data);
        $this->load->view("cms/common/footer.php",$data);
    }
    

    public function events(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $this->load->view("cms/common/header.php",$data);

        $this->load->view("cms/events",$data);
        $this->load->view("cms/common/footer.php",$data);
    }

    
    public function contactus(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['gallery']=$this->HomeModel->get_min_gallery_images()->result();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->HomeModel->get_panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/contactus",$data);
        $this->load->view("cms/common/footer.php",$data);
    }
    
    
    public function aboutus(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['aboutus']=$this->HomeModel->get_aboutus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->AdminModel->panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/aboutus",$data);
        $this->load->view("cms/common/footer.php",$data);
    }

    public function calender(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['aboutus']=$this->HomeModel->get_aboutus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->AdminModel->panorama()->result();
        $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $active_batch_start='';
        $active_batch_end='';
        foreach ($data['active_batch'] as $value) {
            $active_batch_start=$value->start;
            $active_batch_end=$value->end;
        }
        $data['dates']=$this->AdminModel->get_event_dates($active_batch_start,$active_batch_end)->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/calender",$data);
        $this->load->view("cms/common/footer.php",$data);
    }
    
    public function viewcourse($id){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['course']=$this->HomeModel->get_course_info($id)->result();
        $data['aboutus']=$this->HomeModel->get_aboutus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->AdminModel->panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/viewcourse",$data);
        $this->load->view("cms/common/footer.php",$data);

    }

    public function viewcourse_by_graduation($graduation){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['course']=$this->HomeModel->get_course_by_graduation($graduation)->result();
        $data['aboutus']=$this->HomeModel->get_aboutus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->AdminModel->panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/viewcourse",$data);
        $this->load->view("cms/common/footer.php",$data);

    }
    public function viewevent($id){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['events']=$this->HomeModel->get_event_info($id)->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->AdminModel->panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/viewevent",$data);
        $this->load->view("cms/common/footer.php",$data);
    }

    public function viewnews($id){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['single_news']=$this->HomeModel->get_news_info($id)->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['panorama']=$this->AdminModel->panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/viewnews",$data);
        $this->load->view("cms/common/footer.php",$data);
    }


    public function mail(){
        
        $name=$this->input->post('name');
        $mail=$this->input->post('email');
        $mobno=$this->input->post('number');
        $subject=$this->input->post('subject');
        $text="Hey Admin !! You Have a New Message From a  !! ".$name;

        $message=$this->input->post('message');
        $message.="  Send By ".$mail." and The Mobile Number is ".$mobno;
        
        // $name=$this->input->post('name');
        // $mail=$this->input->post('email');
        // $subject=$this->input->post('subject');
        // $message=$this->input->post('message');
        // $message.=" Send By ".$mail;
        // $smtp_user="yogeshkrishnan158@gmail.com";
        // $smtp_pass="9566789048";
        // $to="developer.yogesh2513@gmail.com";

        $this->load->library('email');
        // $config['auth']=true;
        // $config['protocol']    = 'smtp';
        // $config['smtp_host']    = 'ssl://smtp.gmail.com';
        // // $config['smtp_port']    = '465';
        // // $config['smtp_timeout'] = '7';
        // $config['smtp_user']    = $smtp_user;
        // $config['smtp_pass']    = $smtp_pass;
        // $config['charset']    = 'utf-8';
        // $config['newline']    = "\r\n";
        // $config['mailtype'] = 'html'; // or html
        // $config['validation'] = FALSE; // bool whether to validate email or not     
        // $this->load->library('email',$config);
        // $this->email->initialize($config);
        
        // $this->email->from($smtp_user, 'User');
        // $this->email->to($to); 
        // $this->email->subject($subject);
        // $this->email->message($message);
        
        $this->email->from($mail, 'User');
        $this->email->to('developer.yogesh2513@gmail.com');
         
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            $result=array(
                "error"=>0,
                "msg"=>"Mail Send Successfully !!"
            );
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/home/contactus");
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Send a Mail !!"
            );
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/home/contactus");
        }
    }
    public function faq(){
        $data['forms']=$this->HomeModel->get_forms()->result();
        $data['events']=$this->HomeModel->get_events()->result();
        $data['contactus']=$this->HomeModel->get_contactus_details()->result();
        $data['news']=$this->HomeModel->get_news()->result();
        $data['info']=$this->HomeModel->get_info()->result();
        $data['faq']=$this->HomeModel->get_faq()->result();
        $data['panorama']=$this->AdminModel->panorama()->result();
        $this->load->view("cms/common/header.php",$data);
        $this->load->view("cms/faq",$data);
        $this->load->view("cms/common/footer.php",$data);
    }


}
?>