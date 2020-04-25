<?php

ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

    public function login_view() {

        $this->load->view('user/login_view');
    }

    public function register() {
        if (file_exists($this->employee_count_path)) {
            $emp_count_open = fopen($this->employee_count_path, "r");
            $emp_count = fread($emp_count_open, filesize($this->employee_count_path));
            fclose($emp_count_open);
            $count = json_decode($emp_count, true);
            $data['id'] = $count['count'] + 1;
            $new_count['count'] = $data['id'];
            write_file($this->employee_count_path, json_encode($new_count));

            $data['user_name'] = $this->input->post('user_name');
            $data['address'] = $this->input->post('address');
            $data['password'] = $this->input->post('password');
            $data['user_email'] = $this->input->post('user_email');
            $data['mobile_no'] = $this->input->post('mobile_no');
            $data['profile_name'] = $this->input->post('profile_name');
            $data['gender'] = $this->input->post('gender');
            $data['user_type'] = 2;
            $data['active'] = 1;
            $data['register_date'] = date('y-m-d');
            $data_string = json_encode($data);
            if (!write_file($this->data_store_path . $data['user_email'] . '.json', $data_string)) {
                $this->session->set_flashdata('Toast_Message', 'Something Wrong Please try after some time');
                $this->redirect('home');
            }
        }
        $this->session->set_flashdata('Toast_Message', 'User Added Successfully');
        redirect('home');
    }

}
