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
            'password' => base64_encode($password)

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

    public function user_login($email,$pass){

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where(array('email'=> $email));
        $query = $this->db->get();

        if($query->result()){

            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where(array('email'=> $email,'password'=> base64_encode($pass)));
            $query1 = $this->db->get();

            if($query1->result()){

                $_SESSION['user_logged'] = TRUE;
                $_SESSION['user_email']= $email;

                redirect("employee-list");

            }else{
                return 2;
            }

        }else{
            return 1;
        }

    }
    public function get_datatable_data(){

        //Column Index for Ordering
        $columns = array(
            0 =>'id',
            1 => 'name',
            2 => 'gender',
            3 => 'relationship',
            4 => 'address',
            5 => 'html',
            6 => 'css',
            7 => 'Javascript',
            8 => 'php',
            9 => 'phone',

        );

        $totalData  = $this->db->count_all('employee');
        $totalFiltered =  $totalData;

        //Only select column that want to show in datatable or you can filte it mnually when send it
        $this->db->start_cache();
        $this->db->select($columns);
        // if there is a search parameter, $_REQUEST['search']['value'] contains search parameter
        if( !empty($_REQUEST['search']['value']) ){
            $search_value = $_REQUEST['search']['value'];

            $this->db->like('name', $search_value);
            $this->db->or_like('address', $search_value);
            $this->db->or_like('phone', $search_value);
            $this->db->stop_cache();

            $totalFiltered  = $this->db->get('employee')->num_rows();
        }

        $this->db->stop_cache();

        $this->db->order_by($columns[$_REQUEST['order'][0]['column']], $_REQUEST['order'][0]['dir']);
        $this->db->limit($_REQUEST['length'], $_REQUEST['start']);

        $query = $this->db->get('employee');

        //Reset Key Array
        $data = array();
        foreach ($query->result_array() as $val) {
            $data[] = array_values($val);
        }

        for($i=0;$i<sizeof($data);$i++){

            if ($data[$i][2]=='Male'){
                $gender = '<select class="elementz" id="row_gender_'.$data[$i][0].'" disabled>
                                <option value="Male" selected >Male</option>
                                <option value="Female" >Female</option>
                            </select>';
            }else{
                $gender = '<select class="elementz" id="row_gender_'.$data[$i][0].'" disabled>
                                <option value="Male" >Male</option>
                                <option value="Female" selected>Female</option>
                            </select>';
            }

            if ($data[$i][3]=='Single'){
                $relationship='<select class="elementz" id="row_relationship_'.$data[$i][0].'" disabled>
                                <option value="Single" selected >Single</option>
                                <option value="Married" >Married</option>
                            </select>';
            }else{
                $relationship='<select class="elementz" id="row_relationship_'.$data[$i][0].'" disabled>
                                <option value="Single" >Single</option>
                                <option value="Married" selected>Married</option>
                            </select>';
            }

            if($data[$i][5]==1){
                $html='&emsp;<select class="elementz" id="row_html_'.$data[$i][0].'" disabled>
                            <option value="1" selected>&#10003</option>
                            <option value="0" >&#10007</option>
                        </select>';
            }else{
                $html='&emsp;<select class="elementz" id="row_html_'.$data[$i][0].'" disabled>
                            <option value="1">&#10003</option>
                            <option value="0" selected>&#10007</option>
                        </select>';
            }

            if($data[$i][6]==1){
                $css='&emsp;<select class="elementz" id="row_css_'.$data[$i][0].'" disabled>
                            <option value="1" selected>&#10003</option>
                            <option value="0" >&#10007</option>
                        </select>';
            }else{
                $css='&emsp;<select class="elementz" id="row_css_'.$data[$i][0].'" disabled>
                            <option value="1">&#10003</option>
                            <option value="0" selected>&#10007</option>
                        </select>';
            }


            if($data[$i][7]==1){
                $javascript='&emsp;<select class="elementz" id="row_javascript_'.$data[$i][0].'" disabled>
                            <option value="1" selected>&#10003</option>
                            <option value="0" >&#10007</option>
                        </select>';
            }else{
                $javascript='&emsp;<select class="elementz" id="row_javascript_'.$data[$i][0].'" disabled>
                            <option value="1">&#10003</option>
                            <option value="0" selected>&#10007</option>
                        </select>';
            }

            if($data[$i][8]==1){
                $php='&emsp;<select class="elementz" id="row_php_'.$data[$i][0].'" disabled>
                            <option value="1" selected>&#10003</option>
                            <option value="0" >&#10007</option>
                        </select>';
            }else{
                $php='&emsp;<select class="elementz" id="row_php_'.$data[$i][0].'" disabled>
                            <option value="1">&#10003</option>
                            <option value="0" selected>&#10007</option>
                        </select>';
            }

            $data[$i][1] = '<input type="text" value="'.$data[$i][1].'" id="row_name_'.$data[$i][0].'" class="elementz" readonly>';
            $data[$i][2] = $gender;
            $data[$i][3] = $relationship;
            $data[$i][4] = '<input type="text" value="'.$data[$i][4].'" id="row_address_'.$data[$i][0].'" class="elementz" readonly>';
            $data[$i][5] = $html;
            $data[$i][6] = $css;
            $data[$i][7] = $javascript;
            $data[$i][8] = $php;
            $data[$i][9] = '<input type="text" value="'.$data[$i][9].'" id="row_phone_'.$data[$i][0].'" class="elementz" readonly>';


            $button= '<input type="button" value="Edit" class="btn btn-primary" id="btn_id_'.$data[$i][0].'" onclick="editRow('.$data[$i][0].')">
                  <input type="button" value="Save" class="btn btn-success buttonHide" id="btn_save_id'.$data[$i][0].'" onclick="saveData('.$data[$i][0].')">
                  <input type="button" class="btn btn-danger" id="'.$data[$i][0].'" value="Delete" onclick="deleteRow(this)"></td>
                        ';
            $data[$i][10] = $button;
        }

        //Prepare Return Data
        $return = array(
            "draw"            => $_REQUEST['draw'] ,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal"    => $totalData,  // total number of records
            "recordsFiltered" => $totalFiltered, // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data  // total data array
        );

        return $return;

    }
}

