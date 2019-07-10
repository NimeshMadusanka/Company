<?php

class CompanyModel extends CI_Model{

    /*employee data insert function */
    public function register_employee($name,$gender,$relationship,$address,$html,$css,$javascript,$php,$phone){

        $data = array(

            'name'=>$name,
            'gender'=>$gender,
            'relationship'=>$relationship,
            'address'=>$address,
            'html'=>$html,
            'css'=>$css,
            'javascript'=>$javascript,
            'php'=>$php,
            'phone'=>$phone

        );

        $this->db->insert('employee',$data);

        $this->session->set_flashdata("success", "1");

    }


}