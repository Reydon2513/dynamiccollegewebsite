<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 1000);
class Mycsvparser{
    private $filepath='';
    public function set_file_path($filepath){
        $this->filepath=$filepath;
    }
    public function  get_file_path(){
        return $this->filepath;
    }
    public function filehandler(){
        return fopen($this->get_file_path(),'r');
    }
    public function get_contents(){
        $result=array();
        $handler=$this->filehandler();
        if($handler){
            while($temp=array_filter(fgetcsv($handler))){

                if(!empty($temp))
                {
                    $data=array_filter($temp);
                
                    if(count($data) != 3 ){
                        return null;
                        break;
                    }else{
                        array_push($result,$data);
                    }
                }

            }   
            return $result;
        }else{
            return null;
        }
        
    }
}

?>