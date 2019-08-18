<?php
// Created By Yogesh2513 @14-06-2019
class AdminModel extends CI_Model{
    public function get_admin_info(){
        return $this->db->get('admin');
    }
    public function get_login(){
        return $this->db->get('admin');
    }
    public function upload_image($imagepath,$table,$cat_id=''){
        if($cat_id==''){
            $data=array(
                'image'=>$imagepath,
            );
        }else{
            $data=array(
                'image'=>$imagepath,
                'cat_id'=>$cat_id
            );
        }
        if($this->db->insert($table,$data)){
            return true;
        }else{
            return false;
        }
    }
    public function get_slideshow_images(){
        // $images=$this->db->get('slideshow');
        return $this->db->get('slideshow');
    }
    public function delete_slideshow_image($id){
        if($this->db->delete('slideshow','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public function slideshow_status_change($status,$id){

        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('slideshow',['status'=>$status])){
            return true;
        }else{
            return false;
        }
    }

    public function get_gallery_images(){
        // $images=$this->db->get('slideshow');
        return $this->db->get('gallery');
    }
    public function upload_gallery_image($imagepath){
        $data=array('image'=>$imagepath);
        if($this->db->insert('gallery',$data)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_gallery_image($id){
        if($this->db->delete('gallery','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public function gallery_status_change($status,$id){
        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('gallery',['status'=>$status])){
            return true;
        }else{
            return false;
        }
    }


    public function staff_add($insert){
        if($this->db->insert('staff',$insert)){
            return true;
        }else{
            return false;
        }
    }

    public function get_staff(){
        return $this->db->get('staff');
    }
    public function get_staff_info($id){
        return $this->db->get_where('staff',['id'=>$id]);
    }
    public function staff_update($update,$id){
        $this->db->set($update);
        $this->db->where('id',$id);
        if($this->db->update('staff',$update)){
            return true;
        }else{
            return false;
        }
    }

    public function staff_delete($id){
        if($this->db->delete('staff','id='.$id)){
            return true;
        }else{
            return false;
        }
    }

    public function staff_status_change($id,$status){
        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('staff',['id'=>$id])){
            return true;
        }else{
            return false;
        }
    }


    public function get_courses(){
        return $this->db->get('courses');
    }
    public function add_course($insert){
        if($this->db->insert('courses',$insert)){
            return true;
        }else{
            return false;
        }
    }

    public function get_course($id){
        return $this->db->get_where('courses',['id'=>$id]);
    }
    public function update_course($update,$id){
        $this->db->set($update);
        $this->db->where('id',$id);
        if($this->db->update('courses',$update)){
            return true;
        }else{
            return false;
        }
    }

    public function course_status_change($id,$status){
        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('courses',['id'=>$id])){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_course($id){
        if($this->db->delete('courses','id='.$id)){
            return true;
        }else{
            return false;
        }
    }

    public function get_extra_curricular(){
        return $this->db->get('extracurricular');
    }
    public function add_extra_curricular($insert){
        if($this->db->insert('extracurricular',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_activity($id){
        return $this->db->get_where('extracurricular',['id'=>$id]);
    }
    public function update_activity($update,$id){
        $this->db->set($update);
        $this->db->where('id',$id);
        if($this->db->update('extracurricular',['id'=>$id])){
            return true;
        }else{
            return false;
        }
    }
    public function delete_activity($id){
        if($this->db->delete('extracurricular','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public function activity_status_change($status,$id){
        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('extracurricular',['id'=>$id])){
            return true;
        }else{
            return false;
        }
    }


    public function get_students(){
        return $this->db->get('placementstudents');
    }

    public function add_student($insert){
        if($this->db->insert('placementstudents',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_student($id){
        return $this->db->get_where('placementstudents',['id'=>$id]);
    }
    public function update_student($update,$id){
        $this->db->set($update);
        $this->db->where('id',$id);

        if($this->db->update('placementstudents',['id'=>$id])){
            return true;
        }else{
            return false;
        }
    }
    public function delete_student($id){
        if($this->db->delete('placementstudents','id='.$id)){
            return true;
        }else{
            return false;
        }
    }

    public function change_status_student($status,$id){
        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('placementstudents',['id'=>$id])){
            return true;
        }else{
            return false;
        }

    }









    public function get_news_list(){
        return $this->db->get('news');
    }

    public function add_news($insert){
        if($this->db->insert('news',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_news($id){
        return $this->db->get_where('news',['id'=>$id]);
    }
    public function update_news($update,$id){
        $this->db->set($update);
        $this->db->where('id',$id);

        if($this->db->update('news',['id'=>$id])){
            return true;
        }else{
            return false;
        }
    }
    public function delete_news($id){
        if($this->db->delete('news','id='.$id)){
            return true;
        }else{
            return false;
        }
    }

    public function change_status_news($status,$id){
        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('news',['id'=>$id])){
            return true;
        }else{
            return false;
        }

    }






    public function get_events_list(){
        return $this->db->get('events');
    }

    public function add_events($insert){
        if($this->db->insert('events',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_events($id){
        return $this->db->get_where('events',['id'=>$id]);
    }
    public function update_events($update,$id){
        $this->db->set($update);
        $this->db->where('id',$id);

        if($this->db->update('events',['id'=>$id])){
            return true;
        }else{
            return false;
        }
    }
    public function delete_events($id){
        if($this->db->delete('events','id='.$id)){
            return true;
        }else{
            return false;
        }
    }

    public function change_status_events($status,$id){
        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('events',['id'=>$id])){
            return true;
        }else{
            return false;
        }
    }


    public function get_contact_details(){
        return $this->db->get('contactus');
    }
    public function update_contact($update){
        if($this->db->update('contactus',$update)){
            return true;
        }else{
            return false;
        }
    }


    public function get_aboutus_details(){
        return $this->db->get('aboutus');
    }
    public function add_aboutus_details($insert){
        if($this->db->insert('aboutus',$insert)){
            return true;
        }else{
            return false;
        }
    }

    public function get_aboutus_detail($id){
        return $this->db->get_where('aboutus',['id'=>$id]);
    }

    public function update_aboutus_details($update,$id){
        $this->db->set($update);
        $this->db->where('id',$id);
        if($this->db->update('aboutus',$update)){
            return true;
        }else{
            return false;
        }
    }

    public function aboutus_details_delete($id){
        if($this->db->delete('aboutus','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
     
    public function aboutus_details_status($status,$id){
        $this->db->set(['status'=>$status]);
        $this->db->where('id',$id);
        if($this->db->update('aboutus',['status'=>$status])){
            return true;
        }else{
            return false;
        }
    }

    public function get_text_content(){
        return $this->db->get('textcontent');
    }

    public function update_text_content($update){
        if($this->db->update('textcontent',$update)){
            return true;
        }else{
            return false;
        }
    }


    public function update_info($update){
        if($this->db->update('info',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function get_info(){
        return $this->db->get('info');
    }

    public function get_image_path($table,$column_name,$id){
        $get_path=$this->db->get_where($table,['id'=>$id])->result();
        $path='';
        foreach ($get_path as $result) {
            $path=$result->$column_name;
        }
        return $path;
    }
    public function get_email(){
        return $this->db->get('staff');
    }
    public function panorama(){
        return $this->db->get('panorama');
    }


    public function panorama_add($iframe){
        $this->db->set(['iframe'=>$iframe]);
        // $this->db->where('1');
        if($this->db->update('panorama',['iframe'=>$iframe])){
            return true;
        }else{
            return false;
        }
    }

    public function panorama_status($status){
        $this->db->set(['status'=>$status]);
        // $this->db->where('1');
        if($this->db->update('panorama',['status'=>$status])){
            return true;
        }else{
            return false;
        }
    }

    public function get_calender_events(){
        $get_active_batch=$this->get_active_batch()->result();
        $batch_id='';
        foreach ($get_active_batch as  $value) {
            $batch_id=$value->id;
        }
        return $this->db->get_where("calender",["batch_id"=>$batch_id]);
    }

    public function add_calender_event($insert){
        if($this->db->insert('calender',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_calender_event($id){
        if($this->db->delete("calender","id=".$id)){
            return true;
        }else{
            return false;
        }
    }
    public function update_calender_event($id,$update){
        $this->db->set($update);
        $this->db->where("id",$id);
        if($this->db->update("calender",$update)){
            return true;
        }else{
            return false;
        }
    }

    public function add_batch($insert){
        if($this->db->insert('batch',$insert)){
            return true;
        }else{
            return false;
        }
    }

    public function get_batch(){
        return $this->db->get('batch');
    }
    public function get_active_batch(){
        return $this->db->get_where('batch',['status'=>1]);
    }
    public function set_active_year($id){
        $this->db->set(['status'=>0]);
        if($this->db->update('batch',['status'=>0])){
            $this->db->set(['status'=>1]);
            $this->db->where("id",$id);
            if($this->db->update('batch',['status'=>1])){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function delete_batch($id){
        if($this->db->delete('batch','id='.$id)){
            if($this->db->delete('calender','batch_id='.$id)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function get_event_dates($start,$end){
        $where="start >= '".$start."' AND end <='".$end."'";
        $this->db->where($where);
        return $this->db->get('calender');
    }
    public function add_rule($insert){
        if($this->db->insert('rule',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_rule(){
        return $this->db->get('rule');
    }
    public function get_rule_by_id($id){
        return $this->db->get_where('rule',['id'=>$id]);
    }
    public function delete_rule($id){
        if($this->db->delete('rule','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public function edit_rule($id,$update){
        $this->db->set($update);
        $this->db->where("id",$id);
        if($this->db->update("rule",$update)){
            return true;
        }else{
            return false;
        }
    }
    public function add_rule_category($insert){
        if($this->db->insert('rule_category',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_rule_category($id){
        if($this->db->delete('rule_category','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public function get_rule_category(){
        return $this->db->get('rule_category');
    }
    public function get_category_by_id($id){
        return $this->db->get_where('rule_category',['id'=>$id]);
    }
    public function edit_rule_category($id,$update){
        $this->db->set($update);
        $this->db->where("id",$id);
        if($this->db->update("rule_category",$update)){
            return true;
        }else{
            return false;
        }
    }

    public function add_faq($insert){
        if($this->db->insert('faq',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_faq(){
        return $this->db->get('faq');
    }
    public function get_faq_by_id($id){
        return $this->db->get_where('faq',['id'=>$id]);
    }
    public function update_faq($id,$update){
        $this->db->set($update);
        $this->db->where('id',$id);
        
        if($this->db->update('faq',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function update_faq_status($id,$update){
        $this->db->set($update);
        $this->db->where('id',$id);
        
        if($this->db->update('faq',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_faq($id){
        if($this->db->delete('faq','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public function add_form($insert){
        if($this->db->insert('form',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function form(){
        return $this->db->get('form');
    }
    public function delete_model($id){
        if($this->db->delete('form','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public function add_gallery_category($insert){
        if($this->db->insert('gallery_category',$insert)){
            return true;
        }else{
            return false;
        }

    }
    public function get_gallery_category_by_id($id){
        return $this->db->get_where('gallery_category',['id'=>$id]);
    }
    public function delete_gallery_category($id){
        if($this->db->delete('gallery_category','id='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public function get_gallery_category(){
        return $this->db->get('gallery_category');
    }
    public function edit_gallery_category($update,$id){
        $this->db->set($update);
        $this->db->where('id',$id);
        if($this->db->update('gallery_category',$update)){
            return true;
        }else{
            return false;
        }
    }
}
?>