<?php

// Created By Yogesh2513 @14-06-2019

class HomeModel extends CI_Model{

    public function get_slideshow_images(){
        return $this->db->get_where('slideshow',['status'=>1]);
    }
    
    public function get_text_content(){
        return $this->db->get('textcontent');
    }

    public function get_course_list(){
        return $this->db->get_where('courses',['status'=>1]);
    }
    public function get_particular_course_list(){
        $this->db->limit(2);
        return $this->db->get_where('courses',['status'=>1]);
    }
    public function get_craft(){
        return $this->db->get('textcontent');
    }

    public function get_gallery_images(){
        return $this->db->get_where('gallery',['status'=>1]);
    }
    public function get_gallery_one(){
        $this->db->select("g.image,ec.name");
        $this->db->from("gallery g,extracurricular ec");
        $this->db->where("g.cat_id=ec.id AND g.status=1 ");
        $this->db->order_by('g.cat_id',"ASC");
        return $this->db->get();
    }
    public function get_gallery_two(){
        $this->db->select("g.image,gc.name");
        $this->db->from("gallery g,gallery_category gc");
        $this->db->where("g.cat_id=gc.id AND g.status=1");
        $this->db->order_by('g.cat_id',"ASC");
        return $this->db->get();
    }
    public function get_min_gallery_images(){
        $this->db->limit(12);
        return $this->db->get_where('gallery',['status'=>1]);
    }
    public function get_events(){
        return $this->db->get_where('events',['status'=>1]);
    }
    public function get_forms(){
        return $this->db->get('form');
    }
    
    public function get_event(){
        $this->db->limit(2);
        return $this->db->get_where('events',['status'=>1]);
    }
    public function get_aboutus_detail(){
        $this->db->limit(1);
        return $this->db->get_where('aboutus',['status'=>1]);
    }


    public function get_aboutus_details(){
        return $this->db->get_where('aboutus',['status'=>1]);
    }
    public function get_news(){
        return $this->db->get_where('news',['status'=>1]);
    }

    public function get_contactus_details(){
        return $this->db->get('contactus');
    }
    public function get_staff(){
        return $this->db->get_where('staff',['status'=>1]);
    }
    public function get_extracurricular_activities(){
        return $this->db->get_where('extracurricular',['status'=>1]);
    }
    public function get_placement_details(){
        return $this->db->get_where('placementstudents',['status'=>1]);
    }

    public function get_info(){
        return $this->db->get('info');
    }   

    public function get_course_info($id){
        return $this->db->get_where('courses',['status'=>1,'id'=>$id]);
    }
    public function get_course_by_graduation($graduation){
        return $this->db->get_where('courses',['status'=>1,'graduation'=>$graduation]);
        
    }
    
    public function get_event_info($id){
        return $this->db->get_where('events',['status'=>1,'id'=>$id]);
    }
    public function get_news_info($id){
        return $this->db->get_where('news',['status'=>1,'id'=>$id]);
    }
    public function get_panorama(){
        return $this->db->get('panorama');
    }
    public function get_rules(){
        $this->db->select("r.rule, c.category");
        $this->db->from("rule r,rule_category c");
        $this->db->where("r.cat_id = c.id");
        return $this->db->get();
    }
    public function get_faq(){
        return $this->db->get_where('faq',['status'=>1]);
    }
}
?>