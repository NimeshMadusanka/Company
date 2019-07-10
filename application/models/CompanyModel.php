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


    public function getEmployees(){

        $this->db->select('*');
        $this->db->from('employee');
        $query = $this->db->get();

        return $query->result();

    }

    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('employee');

        $this->session->set_flashdata("success", "2");

    }

    public function getData($id){

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->result();

    }

    public function edit_emp($id,$name,$gender,$relationship,$address,$html,$css,$javascript,$php,$phone){

        $data = array(

            'id'=>$id,
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

        $this->db->where(array('id'=> $id));
        $this->db->set($data);
        $this->db->update('employee');

        $this->session->set_flashdata("success", "1");

    }
}