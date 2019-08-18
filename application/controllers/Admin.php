<?php
// Created By Yogesh2513 @14-06-2019
ini_set("max_execution_time",600);
class Admin extends CI_Controller{


    public function index(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['slideshow_count']=$this->get_row_count($this->AdminModel->get_slideshow_images()->result());
        $data['gallery_count']=$this->get_row_count($this->AdminModel->get_gallery_images()->result());
        $data['courses_count']=$this->get_row_count($this->AdminModel->get_courses()->result());
        $data['staff_count']=$this->get_row_count($this->AdminModel->get_staff()->result());
        $data['news_count']=$this->get_row_count($this->AdminModel->get_news_list()->result());
        $data['events_count']=$this->get_row_count($this->AdminModel->get_events_list()->result());
        $data['activity_count']=$this->get_row_count($this->AdminModel->get_extra_curricular()->result());
        $data['placedstudents_count']=$this->get_row_count($this->AdminModel->get_students()->result());
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/common/footer');
    }

    public function get_row_count($data){
        $count=0;
        foreach ($data as $value) {
            $count++;
        }
        return $count;
    }

    public function slideshow($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info()->result();
        $data['slideshow']=$this->AdminModel->get_slideshow_images()->result();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/slideshow',$data);
        $this->load->view('admin/common/footer');
    }

    public function slideshow_add(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if(!empty($_FILES['image']['name'])){
            $upload_path="uploads/slideshow/";
            $config['upload_path']="uploads/slideshow/";
            $config['size']="1024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('image')){
                $data=$this->upload->data();
                $config=array(
                    'image_library'=>'gd2',
                    'source_image'=>$data['full_path'],
                    'create_thumb'=>false,
                    'maintain_ratio'=>true,
                    'width'=>1366,
                    'height'=>768
                );
                $this->load->library('image_lib', $config);
                if($this->image_lib->resize()){
                    if($this->AdminModel->upload_image($upload_path.$data['file_name'],'slideshow')){
                        // $this->index("slideshow",$data,0,"Image Uploaded Successfully !!",$dbresult);
                        // $this->slideshow(0,"Image Uploaded Successfully !!");
                        $result=array(
                            "error"=>0,
                            "msg"=>"Image Uploaded Successfully !!"
                        );
                        
                    }else{
                        // $this->index("slideshow",$data,1,"Unable To Upload The Image !!",$dbresult);
                        // $this->slideshow(1,"Unable To Upload The Image !!");
                        $this->image_lib->display_errors();
                        $result=array(
                            "error"=>1,
                            "msg"=>"Unable To Upload The Image !!"
                        );
                    }
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Upload The Image !!"
                    );
                }
                
                $this->session->set_flashdata($result);
                // redirect(base_url()."index.php/admin/slideshow");
            }else{
                // $this->index("slideshow",$data,1,"Unable To Upload The Image !!",$dbresult);
                // $this->slideshow(1,"Unable To Upload The Image !!");

                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Image Size Is Too Large !!"
                );
            }
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/slideshow");
        }
        else
        {
            // $this->slideshow(1,"Choose The Image !!");
            $result=array(
                "error"=>1,
                "msg"=>"Choose The Image !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/slideshow");
        
    }

    public function slideshow_delete($id,$dir,$dir2,$image){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->delete_slideshow_image($id)){
            // delete_files($image);
            // unlink($image);
            // print_r($image);
            $original_image=$dir.'/'.$dir2.'/'.$image;
            // print_r($original_image);
            unlink($original_image);
            // $this->slideshow(0,"Image Deleted Successfully  !!");
            $result=array(
                "error"=>0,
                "msg"=>"Image Deleted Successfully !!"
            );

        }else{
            // $this->slideshow(1,"Unable To Delete The Image !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Delete The Image !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/slideshow");
    }
    public function slideshow_status_change($status,$id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->slideshow_status_change($status,$id)){
            // $this->slideshow(0,"Updated Successfully !!");
            $result=array(
                "error"=>0,
                "msg"=>"Image Updated Successfully !!"
            );
        }else{
            // $this->slideshow(1,"Unable To Update The Image !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Update The Image !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/slideshow");
    }

    public function gallery($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info()->result();
        $data['gallery']=$this->AdminModel->get_gallery_images()->result();
        $gallery_categories=$this->AdminModel->get_gallery_category()->result_array();
        $activities=$this->AdminModel->get_extra_curricular()->result_array();
        $data['options']=array_merge($gallery_categories,$activities);
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/gallery',$data);
        $this->load->view('admin/common/footer');
    }
    public function add_gallery_category(){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->AdminModel->panorama()->result();
        $data['batch']=$this->AdminModel->get_batch()->result();
        $data['rule']=$this->AdminModel->get_rule()->result();
        // $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $data['category']=$this->AdminModel->get_gallery_category()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/add_gallery_category',$data);
        $this->load->view('admin/common/footer');
    }
    public function do_add_gallery_category(){
        $check_category=$this->AdminModel->get_gallery_category()->result();
        $category=strtolower(trim($this->input->post('category')));
        $flag=0;
        foreach($check_category as $value) {
            if(strtolower($value->name) == $category){
                $flag++;
            }
        }
        if($flag!=0){
            $result=array(  
                "error"=>1,
                "msg"=>"Category Already Exists !!"
            );
            echo json_encode($result);
        }else{
            $insert=array(
                "id"=>mt_rand(),
                "name"=>$category
            );
            if($this->AdminModel->add_gallery_category($insert)){
                $result=array(  
                    "error"=>0,
                    "msg"=>"Category Added Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(  
                    "error"=>1,
                    "msg"=>"Unable To Add The Category !!"
                );
                echo json_encode($result);
            }
        }
    }

    public function edit_gallery_category(){
        $category=$this->input->post('category');
        $category=str_replace(' ','_',$category);
        $id=$this->input->post('id');
        $update=array(
            "name"=>$category
        );
        if($this->AdminModel->edit_gallery_category($update,$id)){
            $result=array(  
                "error"=>0,
                "msg"=>"Category Updated Successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(  
                "error"=>1,
                "msg"=>"Unable To Update The Category !!"
            );
            echo json_encode($result);
        }
    }
    public function gallery_category_edit($id){
        $data['admin']=$this->AdminModel->get_admin_info();
        // $data['panorama']=$this->AdminModel->panorama()->result();
        // $data['batch']=$this->AdminModel->get_batch()->result();
        // $data['rule']=$this->AdminModel->get_rule()->result();
        // $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $data['category_list']=$this->AdminModel->get_gallery_category()->result();
        $data['category']=$this->AdminModel->get_gallery_category_by_id($id)->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/edit_gallery_category',$data);
        $this->load->view('admin/common/footer');
    }
    public function delete_gallery_category(){
        $id=$this->input->post('id');
        if($this->AdminModel->delete_gallery_category($id)){
            $result=array(  
                "error"=>0,
                "msg"=>"Category Deleted Successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(  
                "error"=>1,
                "msg"=>"Unable To Delete The Category !!"
            );
            echo json_encode($result);
        }
    }


    public function gallery_add(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $cat_id=$this->input->post('category');
        if(!empty($_FILES['image']['name'])){
            $config['upload_path']="uploads/gallery/";
            $upload_path="uploads/gallery/";
            $config['size']="2048000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('image')){
                $data=$this->upload->data();
                $config=array(
                    'image_library'=>'gd2',
                    'source_image'=>$data['full_path'],
                    'create_thumb'=>false,
                    'maintain_ratio'=>false,
                    'width'=>500,
                    'height'=>400
                );
                $this->load->library('image_lib', $config);
                if($this->image_lib->resize()){

                    if($this->AdminModel->upload_image($upload_path.$data['file_name'],'gallery',$cat_id)){
                        // $this->index("gallery",$data,0,"Image Uploaded Successfully !!",$dbresult);
                        // $this->gallery(0,"Image Uploaded Successfully !!");
                        $result=array(
                            "error"=>0,
                            "msg"=>"Image Uploaded Successfully !!"
                        );
                    }else{
                        // $this->index("gallery",$data,1,"Unable To Upload The Image !!",$dbresult);
                        // $this->gallery(1,"Unable To Upload The Image !!");
                        $result=array(
                            "error"=>1,
                            "msg"=>"Unable To Upload The Image !!"
                        );    
                    }

                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Upload The Image !!"
                    );
                }
                
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/gallery");
            }else{
                // $this->index("gallery",$data,1,"Unable To Upload The Image !!",$dbresult);
                // $this->gallery(1,"Unable To Upload The Image !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Size Is Too Large !!. The maximum image size is 2MB"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/gallery");
            }
        }else{
            // $this->gallery(1,"Choose The Image !!");
            $result=array(
                "error"=>1,
                "msg"=>"Choose The Image !!"
            );
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/gallery");
        }
    }

    public function gallery_delete($id,$dir,$dir2,$image){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->delete_gallery_image($id)){
            // delete_files($image);
            // unlink($image);
            $original_image=$dir.'/'.$dir2.'/'.$image;
            // print_r($original_image);
            unlink($original_image);
            // $this->gallery(0,"Image Deleted Successfully  !!");
            $result=array(
                "error"=>0,
                "msg"=>"Image Deleted Successfully  !!"
            );
            
        }else{
            // $this->gallery(1,"Unable To Delete The Image !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Delete The Image !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/gallery");
    }
    public function gallery_status_change($status,$id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->gallery_status_change($status,$id)){
            // $this->gallery(0,"Updated Successfully !!");
            $result=array(
                "error"=>0,
                "msg"=>"Image Updated Successfully !!"
            );
        }else{
            // $this->gallery(1,"Unable To Update The Image !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Update The Image !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/gallery");
    }








// < ======================= Controllers For Staff ========================== > 



    public function staff($error=3,$msg=''){
        
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }

        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$error;
        $data['msg']=$msg;
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/staff_add',$data);
        $this->load->view('admin/common/footer');
    }


    public function staff_add(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $name=trim($this->input->post('name'));
        $age=trim($this->input->post('age'));
        $designation=trim($this->input->post('designation'));
        $description=trim($this->input->post('description'));
        $department=trim($this->input->post('department'));
        $email=trim($this->input->post("email"));
        $profile="uploads/staff/avatar.png";
        if(!empty($_FILES['profile']['name'])){
            $config['upload_path']="uploads/staff/";
            $config['size']="1024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['profile']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('profile')){
                $data=$this->upload->data();
                $profile=$config['upload_path'].$data['file_name'];
                $insert=array(
                    'name'=>$name,
                    'age'=>$age,
                    'designation'=>$designation,
                    'department'=>$department,
                    'description'=>$description,
                    'profile'=>$profile,
                    'mailid'=>$email
                );
        
                if($this->AdminModel->staff_add($insert)){
                
                    $result=array(
                        "error"=>0,
                        "msg"=>"Staff Added Successfully !!"
                    );
                    
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The Staff !!"
                    );
                    
                }
                $this->session->set_flashdata($result);
                    redirect(base_url()."index.php/admin/staff_manage",'refresh');
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Image Size is Too Large !!. The maximum image size is 1MB"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/staff_manage",'refresh');
                
            }
        }
        
        
        

        // redirect(base_url()."index.php/admin/staff_manage",'refresh');
        // $this->load->view('admin/common/header',$data);
        // $this->load->view('admin/common/sidebar',$data);
        // $this->load->view('admin/staff',$data);
        // $this->load->view('admin/common/footer');
        
    }

    public function staff_manage(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['staff']=$this->AdminModel->get_staff()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/staff',$data);
        $this->load->view('admin/common/footer');
    }

    public function staff_edit($action,$id,$status,$error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($action == 'edit'){
            $data['admin']=$this->AdminModel->get_admin_info();
            $data['error']=$error;
            $data['msg']=$msg;
            $data['editdata']=$this->AdminModel->get_staff_info($id)->result();
            $this->load->view('admin/common/header',$data);
            $this->load->view('admin/common/sidebar',$data);
            $this->load->view('admin/staff_edit',$data);
            $this->load->view('admin/common/footer');
        }else if($action == "delete"){
            $path=$this->AdminModel->get_image_path('staff','profile',$id);
            if($this->AdminModel->staff_delete($id)){
                
                unlink($path);
                $result=array(
                    "error"=>0,
                    "msg"=>"Staff Deleted Successfully !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/staff_manage",'refresh');
            }else{
                // $this->staff(1,"Unable To Delete The Staff !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Delete The Staff !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/staff_manage",'refresh');
                
            }
            // $data['error']=$error;
            // $data['msg']=$msg;
            // $data['staff']=$this->AdminModel->get_staff()->result();
            // $this->load->view('admin/common/header',$data);
            // $this->load->view('admin/common/sidebar',$data);
            // $this->load->view('admin/staff',$data);
            // $this->load->view('admin/common/footer');


        }else if($action == "status"){
            if($this->AdminModel->staff_status_change($id,$status)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Staff Updated Successfully !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/staff_manage",'refresh');
            }else{
                // $this->staff(1,"Unable To Update The Staff !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update The Staff !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/staff_manage",'refresh');
                
            }

            
            // $data['error']=$error;
            // $data['msg']=$msg;
            // $data['staff']=$this->AdminModel->get_staff()->result();
            // $this->load->view('admin/common/header',$data);
            // $this->load->view('admin/common/sidebar',$data);
            // $this->load->view('admin/staff',$data);
            // $this->load->view('admin/common/footer');
        }
    }
    

    public function staff_update(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $id=trim($this->input->post('id'));
        $name=trim($this->input->post('name'));
        $age=trim($this->input->post('age'));
        $designation=trim($this->input->post('designation'));
        $description=trim($this->input->post('description'));
        $department=trim($this->input->post('department'));
        $email=trim($this->input->post("email"));
        $profile="";
        if(!empty($_FILES['profile']['name'])){
            $config['upload_path']="uploads/staff/";
            $config['size']="1024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['profile']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('profile')){
                $data=$this->upload->data();
                $profile=$config['upload_path'].$data['file_name'];
                $update=array(
                    'name'=>$name,
                    'age'=>$age,
                    'designation'=>$designation,
                    'department'=>$department,
                    'description'=>$description,
                    'profile'=>$profile,
                    'mailid'=>$email
                );

                if($this->AdminModel->staff_update($update,$id)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Staff Updated Successfully !!"
                    );
                    $this->session->set_flashdata($result);
                    redirect(base_url()."index.php/admin/staff_manage",'refresh');
                    
                }else{
                    // $this->staff(1,"Unable To Update The Staff !!");
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Update The Staff !!"
                    );
                    $this->session->set_flashdata($result);
                    redirect(base_url()."index.php/admin/staff_manage",'refresh');
                }
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Profile Pic !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/staff_manage",'refresh');
            }
        }else{
            $profile=$this->input->post('oldprofilepath');

            $update=array(
                'name'=>$name,
                'age'=>$age,
                'designation'=>$designation,
                'department'=>$department,
                'description'=>$description,
                'profile'=>$profile,
                'mailid'=>$email
            );

            if($this->AdminModel->staff_update($update,$id)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Staff Updated Successfully !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/staff_manage",'refresh');
                
            }else{
                // $this->staff(1,"Unable To Update The Staff !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update The Staff !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/staff_manage",'refresh');
            }
        }
      
    }








// < ======================= Controllers For Course ========================== > 


    public function course($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['course']=$this->AdminModel->get_courses()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/course_list',$data);
        $this->load->view('admin/common/footer');
    }

    public function course_manage($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$error;
        $data['msg']=$msg;
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/course',$data);
        $this->load->view('admin/common/footer');
    }

    public function course_add(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $name=trim($this->input->post('name'));
        $graduation=trim($this->input->post('graduation'));
        $summary=trim($this->input->post('summary'));
        $description=trim($this->input->post('description'));

        if(!empty($_FILES['syllabus']['name'])){
            $config['upload_path']="uploads/syllabus/";
            $config['size']="5024000";
            $config['allowed_types']='pdf';
            $config['file_name'] = $_FILES['syllabus']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('syllabus')){
                $data=$this->upload->data();
                $syllabus=$config['upload_path'].$data['file_name'];

                $insert=array(
                    "name"=>$name,
                    "summary"=>$summary,
                    "description"=>$description,
                    "syllabus"=>$syllabus,
                    "graduation"=>$graduation
                );
                if($this->AdminModel->add_course($insert)){
                    // $error=0;
                    // $msg="Course Added Successfully !!";
                    $result=array(
                        "error"=>0,
                        "msg"=>"Course Added Successfully !!"
                    );
                    $this->session->set_flashdata($result);
                    
                }else{
                    // $this->course_manage(0,"Failed To Add The Course");
                    $result=array(
                        "error"=>1,
                        "msg"=>"Failed To Add The Course !!"
                    );
                    $this->session->set_flashdata($result);
                }
                
                // $this->course($error,$msg);
                redirect(base_url()."index.php/admin/course",'refresh');

            }
            else
            {
                // $this->course_manage(1,"Syllabus File Size is Too Large Or Invalid PDF !! ");
                $result=array(
                    "error"=>1,
                    "msg"=>"Syllabus File Size is Too Large Or Invalid PDF !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/course",'refresh');
            }
        }
    }

    public function course_edit($id){
        $data['course']=$this->AdminModel->get_course($id)->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/course_edit',$data);
        $this->load->view('admin/common/footer');
    }

    public function course_update(){
        $id=trim($this->input->post('id'));
        $name=trim($this->input->post('name'));
        $summary=trim($this->input->post('summary'));
        $description=trim($this->input->post('description'));
        $graduation=trim($this->input->post('graduation'));
        $syllabus='';
        if(!empty($_FILES['syllabus']['name'])){
            $config['upload_path']="uploads/syllabus/";
            $config['size']="5024000";
            $config['allowed_types']='pdf';
            $config['file_name'] = $_FILES['syllabus']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('syllabus')){
                $data=$this->upload->data();
                $syllabus=$config['upload_path'].$data['file_name'];
                $update=array(
                    "name"=>$name,
                    "summary"=>$summary,
                    "description"=>$description,
                    "syllabus"=>$syllabus,
                    "graduation"=>$graduation
                );
                if($this->AdminModel->update_course($update,$id)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Course Updated Successfully !!"
                    );
                    
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Failed To Update The Course !!"
                    );  
                }
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/course",'refresh');
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Syllabus File Size is Too Large or Invalid File !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/course",'refresh');

            }
        }else{
            $syllabus=trim($this->input->post('syllabusoldpath'));

            $update=array(
                "name"=>$name,
                "summary"=>$summary,
                "description"=>$description,
                "syllabus"=>$syllabus,
                "graduation"=>$graduation
            );
            if($this->AdminModel->update_course($update,$id)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Course Updated Successfully !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/course",'refresh');
            }else{
                // $this->course_manage(0,"Failed To Update The Course");
                $result=array(
                    "error"=>1,
                    "msg"=>"Failed To Update The Course !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/course",'refresh');
            }
        }
        
        
    }

    public function course_status_change($status,$id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }

        if($this->AdminModel->course_status_change($id,$status)){
            $result=array(
                "error"=>0,
                "msg"=>"Course Updated Successfully !!"
            );
            
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable To update The Course !!"
            );
        }

        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/course",'refresh');
        
    }

    public function course_delete($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }

        $path=$this->AdminModel->get_image_path('courses','syllabus',$id);
        
        if($this->AdminModel->delete_course($id)){
            
            unlink($path);
            $result=array(
                "error"=>0,
                "msg"=>"Course Deleted Successfully !!"
            );
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Delete The Course !!"
            );
        }
        
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/course",'refresh');
    }



    
// ======================== Controllers For Extracurricular Activities=======================

    public function list_extra_curricular($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['extra_curricular_data']=$this->AdminModel->get_extra_curricular()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/list_extra_curricular',$data);
        $this->load->view('admin/common/footer');
    }
    



    
    public function add_extra_curricular($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$error;
        $data['msg']=$msg;
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/add_extra_curricular',$data);
        $this->load->view('admin/common/footer');
    }


    public function do_add_extracurricular(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $name=$this->input->post('name');
        $description=$this->input->post('description');
        $logo='';
        if(!empty($_FILES['logo']['name'])){
            $config['upload_path']="uploads/activity/";
            $config['size']="1024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['logo']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('logo')){
                $data=$this->upload->data();
                $logo=$config['upload_path'].$data['file_name'];
                $insert=array(
                    "logo"=>$logo,
                    "name"=>$name,
                    "activity"=>$description
                );
                if($this->AdminModel->add_extra_curricular($insert)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Activity Added Successfully !!"
                    );
                    $this->session->set_flashdata($result);
                    redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
                    // $this->list_extra_curricular(0,"Activity Added Successfully !!");
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The Activity !!"
                    );
                    $this->session->set_flashdata($result);
                    redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
                    // $this->add_extra_curricular(1,"Unable To Add The Activity !!");
                }
            }else{
                // $this->add_extra_curricular(1,"Logo Size is Too Large !!");

                $result=array(
                    "error"=>1,
                    "msg"=>"Logo Size is Too Large Or Invalid Image !!. The maximum image size is 1MB"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
            }
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Choose The Image !!"
            );
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
        }
        
    }

    public function extracurricular_edit($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['editdata']=$this->AdminModel->get_activity($id)->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/edit_extra_curricular',$data);
        $this->load->view('admin/common/footer');
    }

    public function update_extracurricular(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $id=trim($this->input->post('id'));
        $name=trim($this->input->post('name'));
        $description=trim($this->input->post('description'));
        $logo='';
        if(!empty($_FILES['logo']['name'])){
            $config['upload_path']="uploads/activity/";
            $config['size']="2048000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['logo']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('logo')){
                $data=$this->upload->data();
                $logo=$config['upload_path'].$data['file_name'];

                
            $update=array(
                "name"=>$name,
                "activity"=>$description,
                "logo"=>$logo
            );
            if($this->AdminModel->update_activity($update,$id)){
                
                $result=array(
                    "error"=>0,
                    "msg"=>"Activity Update Successfully !!"
                );
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Failed To Update The Activity !!"
                );
            }
            
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or Size is Too Large !!. The maximum image size is 2MB"
                );
            
        
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
            }
        }else{
            $logo=$this->input->post('old_logo');
            $update=array(
                "name"=>$name,
                "activity"=>$description,
                "logo"=>$logo
            );
            if($this->AdminModel->update_activity($update,$id)){
                
                $result=array(
                    "error"=>0,
                    "msg"=>"Activity Update Successfully !!"
                );
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Failed To Update The Activity !!"
                );
            }
            
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
        }
    }


    public function extracurricular_delete($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $path=$this->AdminModel->get_image_path('extracurricular','logo',$id);
        if($this->AdminModel->delete_activity($id)){
            
            unlink($path);
           
            $result=array(
                "error"=>0,
                "msg"=>"Activity Deleted Successfully !!"
            );
        
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
        }else{
            
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Delete The Acivity !!"
            );
        
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
        }
    }

    public function extracurricular_status_change($status,$id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->activity_status_change($status,$id)){
            // $error=0;
            // $msg="Activity Updated Successfully !!";
            // $this->list_extra_curricular($error,$msg);
            $result=array(
                "error"=>0,
                "msg"=>"Activity Updated Successfully !!"
            );
        
            
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Update The Activity !!"
            );
        
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/list_extra_curricular",'refresh');
    }





    public function add_student($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$error;
        $data['msg']=$msg;
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/add_placement_details',$data);
        $this->load->view('admin/common/footer');
    }
    public function manage_student($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['students']=$this->AdminModel->get_students()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/list_placement_details',$data);
        $this->load->view('admin/common/footer');
    }
    public function do_add_placement(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $name=trim($this->input->post('name'));
        $description=trim($this->input->post('description'));
        $profile="uploads/staff/avatar.png";
        if(!empty($_FILES['profile']['name'])){
            $config['upload_path']="uploads/students/";
            $config['size']="1024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['profile']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('profile')){
                $data=$this->upload->data();
                $profile=$config['upload_path'].$data['file_name'];

                $insert=array(
                    "profile"=>$profile,
                    "name"=>$name,
                    "description"=>$description
                );
        
                if($this->AdminModel->add_student($insert)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Details Added Successfully  !!"
                    );
                    // $this->manage_student(0,"Details Added Successfully  !!");
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The Details !!"
                    );
                    // $this->add_student(1,"Unable To Add The Details !!");
                }
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_student");
            }
            else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Size is Too Large !!. The maximum image size is 1MB"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_student");
                // $this->add_student(1,"Profile Size is Too Large !!");
            }
        }
        

    }

    public function student_edit($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['editdata']=$this->AdminModel->get_student($id)->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/edit_placement_details',$data);
        $this->load->view('admin/common/footer');
    }

    public function update_placement_details(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $id=trim($this->input->post('id'));
        $name=trim($this->input->post('name'));
        $description=trim($this->input->post('description'));

        $profile='';
        if(!empty($_FILES['profile']['name'])){
            $config['upload_path']="uploads/students/";
            $config['size']="1024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['profile']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('profile')){
                $data=$this->upload->data();
                $profile=$config['upload_path'].$data['file_name'];
                $update=array(
                    "name"=>$name,
                    "description"=>$description,
                    "profile"=>$profile
                );
                if($this->AdminModel->update_student($update,$id)){
                    $result=array(
                      "error"=>0,
                      "msg"=>"Details Updated Successfully  !!"  
                    );
                    // $this->manage_student(0,"Details Updated Successfully  !!");
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Update The Details !!"  
                    );
                    // $this->add_student(1,"Unable To Update The Details !!");
                }
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_student");
            }else{
                // $this->add_student(1,"Unable To Update The Details !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update The Details !!"  
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_student");
            }
        }else{
            $profile=trim($this->input->post('old_profile'));
            $update=array(
                "name"=>$name,
                "description"=>$description,
                "profile"=>$profile
            );
            if($this->AdminModel->update_student($update,$id)){
                // $this->manage_student(0,"Details Updated Successfully  !!");
                $result=array(
                    "error"=>0,
                    "msg"=>"Details Updated Successfully  !!"  
                );
            }else{
                // $this->add_student(1,"Unable To Update The Details !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update The Details !!"  
                );
            }
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/manage_student");
        }
        
    }


    public function student_delete($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $path=$this->AdminModel->get_image_path('placementstudents','profile',$id);
        if($this->AdminModel->delete_student($id)){
            unlink($path);
            // $this->manage_student(0,"Student Deleted Successfully  !!");
            $result=array(
                "error"=>0,
                "msg"=>"Student Deleted Successfully  !!"
            );
        }else{
            // $this->manage_student(1,"Unable To Delete The Student !!");
            $result=array(
                "error"=>0,
                "msg"=>"Unable To Delete The Student !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/manage_student");
    }

    public function student_status_change($status,$id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->change_status_student($status,$id)){
            // $this->manage_student(0,"Student Updated Successfully  !!");
            $result=array(
                "error"=>0,
                "msg"=>"Student Updated Successfully  !!"
            );
        }else{
            // $this->manage_student(1,"Unable To Update The Student !!");
            $result=array(
                "error"=>0,
                "msg"=>"Student Updated Successfully  !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/manage_student");

    }


    public function add_news($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$error;
        $data['msg']=$msg;
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/add_news',$data);
        $this->load->view('admin/common/footer');
    }
    public function manage_news($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['news']=$this->AdminModel->get_news_list()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/list_news',$data);
        $this->load->view('admin/common/footer');
    }

    public function do_add_news(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $title=trim($this->input->post('title'));
        $description=trim($this->input->post('description'));
        $summary=trim($this->input->post('summary'));
        // $date=trim($this->input->post('date'));
        // $time=trim($this->input->post('time'));
        // $location=trim($this->input->post('location'));
        $image='';
        if(!empty($_FILES['image']['name'])){
            $config['upload_path']="uploads/news/";
            $config['size']="2048000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('image')){
                $data=$this->upload->data();
                $image=$config['upload_path'].$data['file_name'];

                $insert=array(
                    "image"=>$image,
                    "title"=>$title,
                    "description"=>$description,
                    "summary"=>$summary,
                    // "date"=>$date,
                    // "time"=>$time,
                    // "location"=>$location
                );
        
                if($this->AdminModel->add_news($insert)){
                    // $this->manage_news(0,"News Added Successfully  !!");
                    $result=array(
                        "error"=>0,
                        "msg"=>"News Added Successfully  !!"
                    );
                }else{
                    // $this->add_news(1,"Unable To Add The News !!");
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The News !!"
                    );
                    

                }
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_news");
            }
            else{
                // $this->add_news(1,"Image Size is Too Large !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Size is Too Large !!. The maximum image size is 2MB"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_news");
            }
        }
       
    }

    public function news_edit($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['editdata']=$this->AdminModel->get_news($id)->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/edit_news',$data);
        $this->load->view('admin/common/footer');
    }

    public function update_news(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $title=trim($this->input->post('title'));
        $description=trim($this->input->post('description'));
        $summary=trim($this->input->post('summary'));
        // $date=trim($this->input->post('date'));
        // $time=trim($this->input->post('time'));
        // $location=trim($this->input->post('location'));
        $id=trim($this->input->post('id'));
        $image='';
        if(!empty($_FILES['image']['name'])){
            $config['upload_path']="uploads/news/";
            $config['size']="2048000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('image')){
                $data=$this->upload->data();
                $image=$config['upload_path'].$data['file_name'];
                $update=array(
                    "image"=>$image,
                    "title"=>$title,
                    "description"=>$description,
                    "summary"=>$summary,
                  
                    // "time"=>$time,
                  
                );
        
                if($this->AdminModel->update_news($update,$id)){
                    // $this->manage_news(0,"News Added Successfully  !!");
                    $result=array(
                        "error"=>0,
                        "msg"=>"News Added Successfully  !!"
                    );
                }else{
                    // $this->add_news(1,"Unable To Add The News !!");
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The News !!"
                    );
                }
                $this->session->flashdata($result);
                redirect(base_url()."index.php/admin/manage_news");
            }
            else{
                // $this->add_news(1,"Image Size is Too Large !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Size is Too Large !!. The maximum image size is 2MB"
                );
                $this->session->flashdata($result);
                redirect(base_url()."index.php/admin/manage_news");
            }
        }
        else
        {
            $image=trim($this->input->post('old_image'));
            $update=array(
                "image"=>$image,
                "title"=>$title,
                "description"=>$description,
                "summary"=>$summary,
              
                // "time"=>$time,
              
            );
    
            if($this->AdminModel->update_news($update,$id)){
                // $this->manage_news(0,"News Added Successfully  !!");
                $result=array(
                    "error"=>0,
                    "msg"=>"News Updated Successfully  !!"
                );
                
            }else{
                // $this->add_news(1,"Unable To Add The News !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Add The News !!"
                );
            }
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/manage_news");
        }

        
    }

    public function news_delete($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $path=$this->AdminModel->get_image_path('news','image',$id);
        if($this->AdminModel->delete_news($id)){
            unlink($path);
            // $this->manage_news(0,"News Deleted Successfully  !!");
            $result=array(
                "error"=>0,
                "msg"=>"News Deleted Successfully  !!"
            );
        }else{
            // $this->manage_news(1,"Unable To Delete The News !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Delete The News !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/manage_news");
    }

    public function news_status_change($status,$id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->change_status_news($status,$id)){
            // $this->manage_news(0,"News Updated Successfully  !!");
            $result=array(
                "error"=>0,
                "msg"=>"News Updated Successfully  !!"
            );
        }else{
            // $this->manage_news(1,"Unable To Update The News !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Update The News !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/manage_news");

    }













    
    public function add_events($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$error;
        $data['msg']=$msg;
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/add_events',$data);
        $this->load->view('admin/common/footer');
    }
    public function manage_events($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['events']=$this->AdminModel->get_events_list()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/list_events',$data);
        $this->load->view('admin/common/footer');
    }

    public function do_add_events(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $title=trim($this->input->post('title'));
        $description=trim($this->input->post('description'));
        $summary=trim($this->input->post('summary'));
        $date=trim($this->input->post('date'));
        $time=trim($this->input->post('time'));
        $location=trim($this->input->post('location'));
        $image='';
        if(!empty($_FILES['image']['name'])){
            $config['upload_path']="uploads/events/";
            $config['size']="2048000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('image')){
                $data=$this->upload->data();
                $image=$config['upload_path'].$data['file_name'];

                $insert=array(
                    "image"=>$image,
                    "name"=>$title,
                    "description"=>$description,
                    "summary"=>$summary,
                    "date"=>$date,
                    "time"=>$time,
                    "place"=>$location
                );
        
                if($this->AdminModel->add_events($insert)){
                    // $this->manage_events(0,"Events Added Successfully  !!");
                    $result=array(
                        "error"=>0,
                        "msg"=>"Events Added Successfully  !!"
                    );
                }else{
                    // $this->add_events(1,"Unable To Add The events !!");
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The Event !!"
                    );
                }
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_events");
            }
            else{
                // $this->add_events(1,"Image Size is Too Large !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Size is Too Large !!. The maximum image size is 2MB"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_events");
            }
        }
        
    }

    public function events_edit($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['editdata']=$this->AdminModel->get_events($id)->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/edit_events',$data);
        $this->load->view('admin/common/footer');
    }

    public function update_events(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $title=trim($this->input->post('title'));
        $description=trim($this->input->post('description'));
        $summary=trim($this->input->post('summary'));
        $date=trim($this->input->post('date'));
        $time=trim($this->input->post('time'));
        $location=trim($this->input->post('location'));
        $id=trim($this->input->post('id'));
        $image='';
        if(!empty($_FILES['image']['name'])){
            $config['upload_path']="uploads/events/";
            $config['size']="2048000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('image')){
                $data=$this->upload->data();
                $image=$config['upload_path'].$data['file_name'];
                $update=array(
                    "image"=>$image,
                    "name"=>$title,
                    "description"=>$description,
                    "summary"=>$summary,
                    "date"=>$date,
                    "time"=>$time,
                    "place"=>$location,
                );
        
                if($this->AdminModel->update_events($update,$id)){
                    // $this->manage_events(0,"Events Added Successfully  !!");
                    $result=array(
                        "error"=>0,
                        "msg"=>"Events Added Successfully  !!"
                    );
                }else{
                    // $this->add_events(1,"Unable To Add The events !!");
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The events !!"
                    );
                    $this->session->set_flashdata($result);
                    redirect(base_url()."index.php/admin/manage_events");
                }
            }
            else{
                // $this->add_events(1,"Image Size is Too Large !!");

                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Size is Too Large !!. The maximum image size is 2MB"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_events");
            }
        }else{
            $image=trim($this->input->post('old_image'));
            $update=array(
                "image"=>$image,
                "name"=>$title,
                "description"=>$description,
                "summary"=>$summary,
                "date"=>$date,
                "time"=>$time,
                "place"=>$location,
            );
    
            if($this->AdminModel->update_events($update,$id)){
                // $this->manage_events(0,"Events Added Successfully  !!");
                
                $result=array(
                    "error"=>0,
                    "msg"=>"Event Added Successfully  !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_events");
            }else{
                // $this->add_events(1,"Unable To Add The events !!");

                
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Add The Event !!"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/manage_events");
            }
        }

        
    }

    public function events_delete($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $path=$this->AdminModel->get_image_path('events','image',$id);
        if($this->AdminModel->delete_events($id)){
            unlink($path);
            // $this->manage_events(0,"Events Deleted Successfully  !!");
            $result=array(
                "error"=>0,
                "msg"=>"Event Deleted Successfully  !!"
            );
        }else{
            // $this->manage_events(1,"Unable To Delete The events !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Delete The Event !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/manage_events");
    }

    public function events_status_change($status,$id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->change_status_events($status,$id)){
            // $this->manage_events(0,"Events Updated Successfully  !!");
            $result=array(
                "error"=>0,
                "msg"=>"Event Updated Successfully  !!"
            );
        }else{
            // $this->manage_events(1,"Unable To Update The events !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Update The Event!!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/manage_events");

    }



    public function contactus($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['details']=$this->AdminModel->get_contact_details()->result();
        $data['error']=$error;
        $data['msg']=$msg;
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/contactus',$data);
        $this->load->view('admin/common/footer');
    }


    public function contact_add(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $mailid=trim($this->input->post('mailid'));
        $ph_num_1=trim($this->input->post('number1'));
        $ph_num_2=trim($this->input->post('number2'));
        $address=trim($this->input->post('address'));
        $sitemap=trim($this->input->post('sitemap'));
        $facebook=trim($this->input->post('facebook'));
        $twitter=trim($this->input->post('twitter'));
        $linkedin=trim($this->input->post('linkedin'));
        $update=array(
            'address'=>$address,
            'sitemap'=>$sitemap,
            'mailid'=>$mailid,
            'phonenumber1'=>$ph_num_1,
            'phonenumber2'=>$ph_num_2,
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'linkedin'=>$linkedin
        );

        if($this->AdminModel->update_contact($update)){
            $this->contactus(0,"Contact Updated Successfully !!");
        }else{
            $this->contactus(1,"Unable To Update The Contact Details !!");
        }


    }

    public function contact_details_edit(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['details']=$this->AdminModel->get_contact_details()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/contactus_edit',$data);
        $this->load->view('admin/common/footer');
    }

    public function aboutus($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['aboutus']=$this->AdminModel->get_aboutus_details()->result();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/aboutus',$data);
        $this->load->view('admin/common/footer');
    }

    public function aboutus_add(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $title=trim($this->input->post('title'));
        $content=trim($this->input->post('content'));
        $image='';
        if(!empty($_FILES['image']['name'])){
            $config['upload_path']="uploads/aboutus/";
            $config['size']="1024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('image')){

                

                $data=$this->upload->data();

                $config=array(
                    'image_library'=>'gd2',
                    'source_image'=>$data['full_path'],
                    'create_thumb'=>false,
                    'maintain_ratio'=>true,
                    'width'=>450,
                    'height'=>450
                );
                $this->load->library('image_lib', $config);
                
                if($this->image_lib->resize()){
                    $upload_path="uploads/aboutus/";
                    $image=$upload_path.$data['file_name'];

                    $insert=array(
                        "image"=>$image,
                        "heading"=>$title,
                        "paragraph"=>$content
                    );
            
                    if($this->AdminModel->add_aboutus_details($insert)){
                        // $this->aboutus(0,"Details Added Successfully !!");
                        $result=array(
                            "error"=>0,
                            "msg"=>"Details Added Successfully !!"
                        );
                    }else{
                        // $this->aboutus(1,"Unable To Add The Details !!");
                        $result=array(
                            "error"=>1,
                            "msg"=>"Unable To Add The Details !!"
                        );
                    }
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The Details !!"
                    );
                }
                
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/aboutus");
            }
            else{
                // $this->aboutus(1,"Image Size is Too Large !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Size is Too Large !!. The maximum image size is 1MB"
                );
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/aboutus");
            }
        }

       

    }

    public function aboutus_details_edit($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['editdata']=$this->AdminModel->get_aboutus_detail($id)->result();
        $data['admin']=$this->AdminModel->get_admin_info();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/aboutus_edit',$data);
        $this->load->view('admin/common/footer');
    }


    
    public function aboutus_update(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $title=trim($this->input->post('title'));
        $content=trim($this->input->post('content'));
        $image='';
        $id=trim($this->input->post('id'));
        if(!empty($_FILES['image']['name'])){
            $config['upload_path']="uploads/aboutus/";
            $config['size']="1024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            $old_path=trim($this->input->post('old_image'));
            unlink($old_path);
            if($this->upload->do_upload('image')){
                $data=$this->upload->data();

                $image=$config['upload_path'].$data['file_name'];
                $update=array(
                    "image"=>$image,
                    "heading"=>$title,
                    "paragraph"=>$content
                );
        
                if($this->AdminModel->update_aboutus_details($update,$id)){
                    // $this->aboutus(0,"Details Updated Successfully !!");
                    $result=array(
                        "error"=>0,
                        "msg"=>"Details Updated Successfully !!"
                    );
                    
                }else{
                    // $this->aboutus(1,"Unable To Update The Details !!");
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Update The Details !!"
                    );
                }
                $this->session->set_flashdata($result);
                redirect(base_url()."index.php/admin/aboutus");
            }
            else{
                // $this->aboutus(1,"Image Size Is Too Large !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Image Or The Size Is Too Large !!. The maximum image size is 1MB"
                );
            }
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/aboutus");
                
            
        }
        else
        {
            $image=trim($this->input->post('old_image'));
            $update=array(
                "image"=>$image,
                "heading"=>$title,
                "paragraph"=>$content
            );
    
            if($this->AdminModel->update_aboutus_details($update,$id)){
                // $this->aboutus(0,"Details Updated Successfully !!");
                $result=array(
                    "error"=>0,
                    "msg"=>"Details Updated Successfully !!"
                );
            }
            else{
                // $this->aboutus(1,"Unable To Update The Details !!");
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update The Details !!"
                );
            }
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/aboutus");
            }
        
    }

    public function aboutus_details_delete($id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $path=$this->AdminModel->get_image_path('aboutus','image',$id);
        if($this->AdminModel->aboutus_details_delete($id)){
            unlink($path);
            // $this->aboutus(0,"Details Deleted Successfully !!");
            $result=array(
                "error"=>0,
                "msg"=>"Details Deleted Successfully !!"
            );
        }else{
            // $this->aboutus(1,"Unable To Delete The Successfully !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Delete The Successfully !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/aboutus");
    }

    public function aboutus_details_status($status,$id){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        if($this->AdminModel->aboutus_details_status($status,$id)){
            // $this->aboutus(0,"Details Updated Successfully !!");
            $result=array(
                "error"=>0,
                "msg"=>"Details Updated Successfully !!"
            );
        }else{
            // $this->aboutus(1,"Unable To Update The Successfully !!");
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Update The Successfully !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/aboutus");
    }

    public function text($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['text']=$this->AdminModel->get_text_content()->result();
        $data['error']=$error;
        $data['msg']=$msg;
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/text_content',$data);
        $this->load->view('admin/common/footer');
    }

    public function text_content_add(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $mission=trim($this->input->post('mission'));
        $vision=trim($this->input->post('vision'));
        $quote=trim($this->input->post('quote'));
        $craft=trim($this->input->post('college_craft'));

        $update=array(
            "mission"=>$mission,
            "vision"=>$vision,
            "quotes"=>$quote,
            "craft"=>$craft
        );

        if($this->AdminModel->update_text_content($update)){
            $this->text(0,"Content Updated Successfully !!");
        }else{
            $this->text(1,"Unable To Update The Content !!");
        }
    }



    public function info($error=3,$msg=''){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$error;
        $data['msg']=$msg;
        $data['info']=$this->AdminModel->get_info()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/info',$data);
        $this->load->view('admin/common/footer');
    }

    public function info_add(){
        if($this->session->has_userdata('is_admin_login')){
            if($this->session->userdata('is_admin_login') == false){
                redirect(base_url()."index.php/login/index",'refresh');
            }
        }else{
            redirect(base_url()."index.php/login/index",'refresh');
        }
        $name=trim($this->input->post('name'));
        $description=trim($this->input->post('description'));
        $logo='';
        if(!empty($_FILES['logo']['name'])){
            $config['upload_path']="img/";
            $config['size']="3024000";
            $config['allowed_types']='jpg|jpeg|png';
            $config['file_name'] = 'logo2';
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('logo')){
                $data=$this->upload->data();
                $logo=$config['upload_path'].$data['file_name'];

            }
            else{
                $this->info(1,"Logo Size Is Too Large !!");
            }
        }else{
            $logo="img/logo.png";
        }
        $update=array(
            "logo"=>$logo,
            "name"=>$name,
            "description"=>$description
        );

        if($this->AdminModel->update_info($update)){
            $this->info(0,"Info Updated Successfully !!");
        }else{
            $this->info(0,"Info Updated Successfully !!");
        }

    }
    
    public function logout(){
        $session=array(
            "is_admin_login"=>false,
            "login_by"=>"admin"
        );
        $this->session->set_userdata($session);
        $this->session->unset_userdata($session);
        redirect(base_url()."index.php/login/index",'refresh');
    }

    
    public function notification(){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/notification',$data);
        $this->load->view('admin/common/footer');
    }
    public function send_notification(){
        $subject=$this->input->post('subject');
        $message=trim($this->input->post('message'));
        $mail=$this->AdminModel->get_email()->result();
        $to=array();
        foreach ($mail as $value) {
            if($value->mailid != null)
                array_push($to,$value->mailid);
        }
        // print_r($to);
        $this->mail($subject,$message,$to);
    }

    public function mail($subject,$message,$to){

        // $smtp_user="yogeshkrishnan158@gmail.com";
        // $smtp_pass="9566789048";
       
        // $this->load->library('email');

        // $config['protocol']    = 'smtp';
        // $config['smtp_host']    = 'ssl://smtp.gmail.com';
        // $config['smtp_port']    = '465';
       
        // $config['smtp_user']    = $smtp_user;
        // $config['smtp_pass']    = $smtp_pass;
        // $config['charset']    = 'utf-8';
        // $config['newline']    = "\r\n";
        // $config['mailtype'] = 'text'; // or html
        // $config['validation'] = TRUE; // bool whether to validate email or not 
        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'smtp.gmail.com',
        //     'smtp_port' => 25,
        //     'smtp_user' => $smtp_user,
        //     'smtp_pass' => $smtp_pass,
        //     'mailtype'  => 'text', 
        //     'charset'   => 'utf-8'
        // );
        // $this->email->initialize($config);
        $from="developer.yogesh2513@gmail.com";
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'Balakrishna College Admin');
        $this->email->to($to); 
        $this->email->subject($subject);
        $this->email->message($message);

    
        if($this->email->send(FALSE)){
            $result=array(
                "error"=>0,
                "msg"=>"Notification Send Successfully !!"
            );
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/notification",'refresh');
        }else{
            if(count($to) == 0){
                $result=array(
                    "error"=>1,
                    "msg"=>"No Email IDs Are Found !!"
                );
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Send a Notification !! Please Try Again..."
                );
            }
            
            $this->session->set_flashdata($result);
            redirect(base_url()."index.php/admin/notification",'refresh');
        }
    }

    public function panorama(){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->AdminModel->panorama()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/panorama',$data);
        $this->load->view('admin/common/footer');
    }

    public function panorama_add(){
        
        $iframe=trim($this->input->post('iframe'));

        if($this->AdminModel->panorama_add($iframe)){
            $result=array(
                "error"=>0,
                "msg"=>"Iframe Updated Successfully !!"
            );
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Update The Iframe !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/panorama",'refresh');

    }

    public function panorama_status($status){
       
        if($this->AdminModel->panorama_status($status)){
            $result=array(
                "error"=>0,
                "msg"=>"Iframe Updated Successfully !!"
            );
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Update The Iframe !!"
            );
        }
        $this->session->set_flashdata($result);
        redirect(base_url()."index.php/admin/panorama",'refresh');
    }
    

    public function calender(){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->AdminModel->panorama()->result();
        $data['batch']=$this->AdminModel->get_batch()->result();
        $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/calender',$data);
        $this->load->view('admin/common/footer');
    }

    
    public function ajaxhandler(){
        $result=array(
            "error"=>"",
            "msg"=>""
        );
        $action=$this->input->post("action");
        if($action == "add_batch"){

            $starting_date=$this->input->post("starting_date");
            $ending_date=$this->input->post("ending_date");
            $startyear=explode("-",$starting_date)[0];
            $endyear=explode("-",$ending_date)[0];
            if($starting_date == "" || $ending_date == ""){
                $result['error']=1;
                $result['msg']="Both Fields Are Required !!";
                echo json_encode($result);
            }else{
                if($starting_date > $ending_date){
                    $result['error']=1;
                    $result['msg']="Invalid Ending Date !!";
                    echo json_encode($result);
                }else if($startyear == $endyear){
                    $result['error']=1;
                    $result['msg']="Starting and Ending Must Not Be Same !!";
                    echo json_encode($result);
                }
                else if(($endyear-$startyear)>1){
                    $result['error']=1;
                    $result['msg']="The Gap Between Starting and Ending Year is Too High !!";
                    echo json_encode($result);
                }else{
                    $insert=array(
                        "start"=>$starting_date,
                        "end"=>$ending_date
                    );
                    if($this->AdminModel->add_batch($insert)){
                        $result['error']=0;
                        $result['msg']="Batch Added Successfully !!";
                        echo json_encode($result);
                    }else{
                        $result['error']=1;
                        $result['msg']="Unable To Add Batch !!";
                        echo json_encode($result);
                    }
                }
            }

        }else if($action == "select_active_year"){
            $batch=$this->input->post("active_year");
            if($this->AdminModel->set_active_year($batch)){
                $result['error']=0;
                $result['msg']="Batch Activated Successfully !!";
                echo json_encode($result);
            }else{
                $result['error']=1;
                $result['msg']="Unable To Activate a Batch !!";
                echo json_encode($result);
            }
        }else if($action == "delete_batch"){
            $id=$this->input->post("id");
            $check=$this->AdminModel->get_active_batch()->result();
            $active_id='';
            foreach ($check as $value) {
                $active_id=$value->id;
            }
            if($active_id == $id){
                $result['error']=1;
                $result['msg']="You Can't Delete The Active Year !!";
                echo json_encode($result);
            }else{
                if($this->AdminModel->delete_batch($id)){
                    $result['error']=0;
                    $result['msg']="Batch Deleted Successfully !!";
                    echo json_encode($result);
                }else{
                    $result['error']=1;
                    $result['msg']="Unable To Delete The Batch !!";
                    echo json_encode($result);
                }
            }
            
        }else if($action == "csv_upload"){
            ini_set('max_execution_time', 1000);
            // $this->load->library('mycsvparser',$_FILES[''])
            // print_r($_FILES['csv']);
            $this->load->library("mycsvparser");
            $this->mycsvparser->set_file_path($_FILES['csv']['tmp_name']);
            $contents=$this->mycsvparser->get_contents();
            if(!$contents == ''){
                $count=count($contents);
                $flag=0;
                for ($i=0; $i <$count ; $i++) { 
                    $check=$this->isEventInFuture($contents[$i][1]);
                    if($check){
                        $active_batch='';
                        $get_active_batch=$this->AdminModel->get_active_batch()->result();
                        foreach ($get_active_batch as $value) {
                            $active_batch=$value->id;
                        }
                        $insert=array(
                            "batch_id"=>$active_batch,
                            "title"=>trim($contents[$i][0]),
                            "start"=>date_format(date_create(trim($contents[$i][1])),"Y-m-d"),
                            "end"=>date_format(date_create(trim($contents[$i][2])),"Y-m-d")
                        );
    
                        if($this->AdminModel->add_calender_event($insert)){
                            $flag++;
                        }
                    }
                    // else{
                        
                    //     $result=array(
                    //         "error"=>1,
                    //         "msg"=>"Some Events in The File is in Past !!",
                    //         "data"=>$contents
                    //     );
                    //     echo json_encode($result);
                    //     exit();
                        
                    // }
                    
                }
                if($flag == 0){
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Upload a File !!",
                        "data"=>$contents
                    );
                }else if($flag >0){
                    $result=array(
                        "error"=>0,
                        "msg"=>"File Uploaded Successfully !!",
                        "data"=>$contents
                    );
                }
                
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Invalid Data Format !!"
                );
                echo json_encode($result);
            }
            // echo $this->mycsvparser-> get_file_path();  
        }else if($action == "add_rule"){
            $rule=trim($this->input->post("rule"));
            $category=$this->input->post("category");
            $insert=array(
                "rule"=>$rule,
                "cat_id"=>$category
            );
            if($this->AdminModel->add_rule($insert)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Rule Addedd Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Add The Rule !!"
                );
                echo json_encode($result);
            }
        }else if($action == "delete_rule"){
            $id=$this->input->post('id');
            if($this->AdminModel->delete_rule($id)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Rule Deleted Successfully  !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Delete The Rule !!"
                );
                echo json_encode($result);
            }
        }else if($action == "edit_rule"){
            $id=$this->input->post('id');
            $rule=trim($this->input->post('rule'));
            $category=$this->input->post("category");
            $update=array(
                "rule"=>$rule,
                "cat_id"=>$category
            );
            if($this->AdminModel->edit_rule($id,$update)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Rule Updated Successfully  !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update The Rule !!"
                );
                echo json_encode($result);
            }
        }else if($action == "add_rule_category"){
            $category=$this->input->post("category");
            $insert=array(
                "category"=>$category
            );
            if($this->AdminModel->add_rule_category($insert)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Category Added Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Add The Category  !!"
                );
                echo json_encode($result);
            }
        }else if($action == "delete_category"){
            $id=$this->input->post('id');
            if($this->AdminModel->delete_rule_category($id)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Category Deleted Successfully  !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Delete The Category !!"
                );
                echo json_encode($result);
            }
        }else if($action == "edit_rule_category"){
            $id=$this->input->post('id');
            $category=trim($this->input->post('category'));
            $update=array(
                "category"=>$category
            );
            if($this->AdminModel->edit_rule_category($id,$update)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Category Updated Successfully  !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update The Category !!"
                );
                echo json_encode($result);
            }
        }else if($action == "add_faq"){
            $question=$this->input->post("question");
            $answer=$this->input->post("answer");
            $insert=array(
                "question"=>$question,
                "answer"=>$answer
            );
            if($this->AdminModel->add_faq($insert)){
                $result=array(
                    "error"=>0,
                    "msg"=>"FAQ Added Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Add FAQ !!"
                );
                echo json_encode($result);
            }
        }else if($action == "update_faq"){
            $question=$this->input->post("question");
            $answer=$this->input->post("answer");
            $id=$this->input->post('id');
            $update=array(
                "question"=>$question,
                "answer"=>$answer,
                
            );
            if($this->AdminModel->update_faq($id,$update)){
                $result=array(
                    "error"=>0,
                    "msg"=>"FAQ Updated Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update FAQ !!"
                );
                echo json_encode($result);
            }
        }else if($action == "status"){
            $id=$this->input->post('id');
            $status=$this->input->post('status');
            $update=array(
                "status"=>$status
            );  
            if($this->AdminModel->update_faq_status($id,$update)){
                $result=array(
                    "error"=>0,
                    "msg"=>"FAQ Updated Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Update The FAQ !!"
                );
                echo json_encode($result);
            }
        }else if($action == "delete_faq"){
            $id=$this->input->post('id');
            if($this->AdminModel->delete_faq($id)){
                $result=array(
                    "error"=>0,
                    "msg"=>"FAQ Deleted Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Deleted FAQ !!"
                );
                echo json_encode($result);
            }
        }
        
    }
    public function isEventInFuture($event_date){
        $today=date("Y-m-d");
        $eventdate=date_format(date_create($event_date),"Y-m-d");
        if($eventdate <= $today){
            return false;
        }else{
            return true;
        }
    }
    public function calender_event($action){
        if($action == "fetch"){
            $data=$this->AdminModel->get_calender_events()->result();
            $events=array();
            foreach ($data as $value) {
                array_push($events,$value);
            }
            echo json_encode($events);
        }else if($action == "add"){
            $title=$this->input->post("title");
            $start=$this->input->post("start");
            $end=$this->input->post("end");
            $today=date("Y-m-d");
            $event_date=date_format(date_create($start),"Y-m-d");
            if($event_date < $today){ 
                $result['error']=1;
                $result['msg']="Event Must Be in Future !!";
                echo json_encode($result);
            }else{
                $active_batch='';
                $get_active_batch=$this->AdminModel->get_active_batch()->result();
                foreach ($get_active_batch as $value) {
                    $active_batch=$value->id;
                }
                $insert=array(
                    "title"=>$title,
                    "batch_id"=>$active_batch,
                    "start"=>$start,
                    "end"=>$end
                );
                if($this->AdminModel->add_calender_event($insert)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Event Added Successfully !! :"
                    );
                    echo json_encode($result);
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Add The Event !!"
                    );
                    echo json_encode($result);
                }
            }
            

        }else if($action == "edit"){
            $id=$this->input->post('id'); 
            $title=$this->input->post("title");
            $start=$this->input->post("start");
            $end=$this->input->post("end");
            $update=array(  
                "title"=>$title,
                "start"=>$start,
                "end"=>$end
            );
            $event_date=date_format(date_create($start),"Y-m-d");
            $today=date("Y-m-d");
            if($event_date < $today){
                $result['error']=1;
                $result['msg']="Event Must Be in Future !!";
                echo json_encode($result);
            }else{
                if($this->AdminModel->update_calender_event($id,$update)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Event Updated Successfully !!"
                    );
                    echo json_encode($result);
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Update The Event !! Please Try Again..."
                    );
                    echo json_encode($result);
                }
            }
        }else if($action == "delete"){
            $id=$this->input->post('id');
            if($this->AdminModel->delete_calender_event($id)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Event Deleted Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Delete The Event !! Please Try Again..."
                );
                echo json_encode($result);
            }
        }
    }

    public function rule(){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->AdminModel->panorama()->result();
        $data['batch']=$this->AdminModel->get_batch()->result();
        $data['rule']=$this->AdminModel->get_rule()->result();
        // $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $data['category']=$this->AdminModel->get_rule_category()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/rule',$data);
        $this->load->view('admin/common/footer');
    }
    
    public function rule_edit($id){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->AdminModel->panorama()->result();
        $data['batch']=$this->AdminModel->get_batch()->result();
        $data['rule_list']=$this->AdminModel->get_rule()->result();
        $data['rule']=$this->AdminModel->get_rule_by_id($id)->result();
        $data['category']=$this->AdminModel->get_rule_category()->result();
        // $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/rule_edit',$data);
        $this->load->view('admin/common/footer');
    }

    public function add_rule_category(){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->AdminModel->panorama()->result();
        $data['category']=$this->AdminModel->get_rule_category()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/add_rule_category',$data);
        $this->load->view('admin/common/footer');
    }
    public function category_edit($id){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->AdminModel->panorama()->result();
        $data['batch']=$this->AdminModel->get_batch()->result();
        $data['category_list']=$this->AdminModel->get_rule_category()->result();
        $data['category']=$this->AdminModel->get_category_by_id($id)->result();
        // $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/edit_rule_category',$data);
        $this->load->view('admin/common/footer');
    }

    public function faq(){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['panorama']=$this->AdminModel->panorama()->result();
        $data['faq']=$this->AdminModel->get_faq()->result();
        // $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/faq',$data);
        $this->load->view('admin/common/footer');
    }

    public function edit(){
        $id=$this->input->post('id');
        $data=$this->AdminModel->get_faq_by_id($id)->row_array();
        echo json_encode($data);
    }
    
    public function form(){
        $data['admin']=$this->AdminModel->get_admin_info();
        $data['error']=$this->session->flashdata('error');
        $data['msg']=$this->session->flashdata('msg');
        $data['form']=$this->AdminModel->form()->result();
        // $data['form']=$this->AdminModel->get_faq()->result();
        // $data['active_batch']=$this->AdminModel->get_active_batch()->result();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/sidebar',$data);
        $this->load->view('admin/form',$data);
        $this->load->view('admin/common/footer');
    }
    public function upload_form(){
        $form_name=$this->input->post('form_name');
        if(!empty($_FILES['form']['name'])){
            $config['upload_path']="uploads/form/";
            $config['size']="10024000";
            $config['allowed_types']='pdf';
            $config['file_name'] = $_FILES['form']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $data='';
            if($this->upload->do_upload('form')){
                $data=$this->upload->data();
                $path=$config['upload_path'].$data['file_name'];
                $insert=array(
                    "path"=>$path,
                    "name"=>$form_name
                );
                if($this->AdminModel->add_form($insert)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Form Uploaded Successfully !!"
                    );
                    echo json_encode($result);
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Unable To Upload a Form !!"
                    );
                    echo json_encode($result);
                }
            
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Upload a Form !!"
                );
                echo json_encode($result);
            }
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Choose The Form !!"
            );
            echo json_encode($result);
        }
    }


    public function delete_form(){
        $id=$this->input->post('id');
        // $path=$_SERVER['DOCUMENT_ROOT'].'/balakrishna/'.trim($this->input->post('path'));
        $path=trim($this->input->post('path'));
        
        if(unlink($path))
        {
            if($this->AdminModel->delete_model($id)){
                $result=array(
                    "error"=>0,
                    "msg"=>"Form Deleted Successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    "error"=>1,
                    "msg"=>"Unable To Delete The Form !!"
                );
                echo json_encode($result);
            }
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable To Delete The Form !!"
            );
            echo json_encode($result);
        }
        
    }
    
    

}

?>