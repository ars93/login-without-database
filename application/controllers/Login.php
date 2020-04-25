<?php

ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    var $employee_count_path; //path file emplyee count
    var $data_store_path; //path to store data

    function __construct() {
        parent::__construct();
        $this->employee_count_path = 'user_data/temp.json';
        $this->data_store_path = 'user_data/all_files/';
    }

    public function index() {

        $this->load->view('user/home_view');
    }

    public function check_login() {
        $user_email = $this->input->post('login_email');
        $pass = $this->input->post('login_password');
        $path = $this->data_store_path . $user_email . '.json';
        if (file_exists($path)) {
            $emp_data_read = fopen($path, "r");
            $emp_data = fread($emp_data_read, filesize($path));
            fclose($emp_data_read);
            $current_employee = json_decode($emp_data, true);
            if ($current_employee['password'] == $pass && $current_employee['active'] == 1) {
                $_SESSION['user_id'] = $current_employee['id'];
                $_SESSION['user_type'] = $current_employee['user_type'];
                if ($current_employee['user_type'] == 1) {
                    redirect('admin/show_user');
                } else {
                    $data_user['user_detail'] = $current_employee;
                    $this->load->view('user/view_user', $data_user);
                }
            } else {
                $this->session->set_flashdata('Toast_Message', 'Password not correct or Inactive User');
                redirect('home/login_view');
            }
        } else {
            $this->session->set_flashdata('Toast_Message', 'Username Password not Correct');
            redirect('home/login_view');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

}
