<?php

class CompanyController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CompanyModel');
    }

    public function Register()
    {

        if (isset($_POST['name'])) {

            $name = $_POST['name'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $relationship = $_POST['relationship'];
            $phone = $_POST['phone'];

            if (isset($_POST['css'])) {
                $css = 1;
            } else {
                $css = 0;
            }

            if (isset($_POST['html'])) {
                $html = 1;
            } else {
                $html = 0;
            }

            if (isset($_POST['javascript'])) {
                $javascript = 1;
            } else {
                $javascript = 0;
            }

            if (isset($_POST['php'])) {
                $php = 1;
            } else {
                $php = 0;
            }
            $this->CompanyModel->register_employee($name, $gender, $relationship, $address, $html, $css, $javascript, $php, $phone);

        }

        $this->load->view('Register');
    }

    public function EmployeeList()
    {
        if (isset($_POST['delete_id'])) {
            $this->CompanyModel->delete($_POST['delete_id']);
        }

        $data['emp'] = $this->CompanyModel->getEmployees();

        $this->load->view('EmployeeList', $data);
    }

    public function edit_empoyee()
    {

        if (isset($_POST['change_id']) || isset($_POST['id'])) {

            if (isset($_POST['id'])) {

                $id = $_POST['id'];
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $relationship = $_POST['relationship'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];

                if (isset($_POST['html'])) {
                    $html = 1;
                } else {
                    $html = 0;
                }

                if (isset($_POST['css'])) {
                    $css = 1;
                } else {
                    $css = 0;
                }

                if (isset($_POST['javascript'])) {
                    $javascript = 1;
                } else {
                    $javascript = 0;
                }

                if (isset($_POST['php'])) {
                    $php = 1;
                } else {
                    $php = 0;
                }

                $this->CompanyModel->edit_emp($id, $name, $gender, $relationship, $address, $html, $css, $javascript, $php, $phone);

                redirect('CompanyController/EmployeeList');

            }

            $data['emp'] = $this->CompanyModel->getData($_POST['change_id']);

            $this->load->view('EditEmployee', $data);
        }
    }
}