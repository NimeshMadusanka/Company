<?php

class CompanyModel extends CI_Model
{

    /*employee data insert function */
    public function register_employee($name, $gender, $relationship, $address, $html, $css, $javascript, $php, $phone, $filename ,$email, $password)
    {

        $data = array(

            'name' => $name,
            'gender' => $gender,
            'relationship' => $relationship,
            'address' => $address,
            'html' => $html,
            'css' => $css,
            'javascript' => $javascript,
            'php' => $php,
            'phone' => $phone,
            'image' => $filename,
            'email' => $email,
            'password' => $password

        );

        $this->db->insert('employee', $data);

        $this->session->set_flashdata("success", "1");

    }

    /* function of get Employee data*/
    public function getEmployees()
    {

        $this->db->select('*');
        $this->db->from('employee');
        $query = $this->db->get();

        return $query->result();

    }

    public function getRows($params = array()){

        $this->db->select('*');
        $this->db->from('employee');

        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start", $params) && array_key_exists("limit", $params)){

                $this->db->limit($params['limit'],$params['start']);

            }elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)){

                $this->db->limit($params['limit']);

            }
            if (array_key_exists("returnType", $params) && $params['returnType'] == 'count'){

                $result = $this->db->count_all_results();
            }else{

                $query = $this->db->get();
                $result =($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        return $result;
    }

    /*function of delete employee details*/
    public function delete($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('employee');

        $this->session->set_flashdata("success", "2");

    }

    /*function of retrieve employee data */
    public function getData($id)
    {

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->result();

    }

    /*edit function */
    public function edit_emp($id, $name, $gender, $relationship, $address, $html, $css, $javascript, $php, $phone, $filename)
    {

        $data = array(

            'id' => $id,
            'name' => $name,
            'gender' => $gender,
            'relationship' => $relationship,
            'address' => $address,
            'html' => $html,
            'css' => $css,
            'javascript' => $javascript,
            'php' => $php,
            'phone' => $phone,
            'image' => $filename

        );

        $this->db->where(array('id' => $id));
        $this->db->set($data);
        $this->db->update('employee');

        $this->session->set_flashdata("success", "1");

    }
}

