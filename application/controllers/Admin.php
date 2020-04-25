<?php

ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    var $employee_count_path; //path file emplyee count
    var $data_store_path; //path to store data

    function __construct() {
        parent::__construct();
        $this->employee_count_path = 'user_data/temp.json';
        $this->data_store_path = 'user_data/all_files/';
    }

    public function index() {
        
    }

    public function show_user() {
        if ($_SESSION['user_type'] == 1) {
            $dir = $this->data_store_path;
            $collect_employee = array();
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file != '.' && $file != '..') {
                            if (file_exists($dir . $file)) {
                                $emp_data_read = fopen($dir . $file, "r");
                                $emp_data = fread($emp_data_read, filesize($dir . $file));
                                fclose($emp_data_read);
                                $current_employee = json_decode($emp_data, true);
                                if ($current_employee['user_type'] != 1) {
                                    array_push($collect_employee, $current_employee);
                                }
                            }
                        }
                    }
                    closedir($dh);
                }
            }
            $show_array['all_user_detail'] = $collect_employee;
            $this->load->view('admin/view_user', $show_array);
        } else {
            redirect('login/logout');
        }
    }

    public function get_single_user() {
        $current_id = $this->input->post('id');
        $path = $this->data_store_path . $current_id . '.json';
        if (file_exists($path)) {
            $emp_data_read = fopen($path, "r");
            $emp_data = fread($emp_data_read, filesize($path));
            fclose($emp_data_read);
            echo $emp_data;
        }
    }

    public function update_user() {
        if ($_SESSION['user_type'] == 1) {
            $user_name = $this->input->post('edit_uname');
            $user_address = $this->input->post('edit_address');
            $user_mobile = $this->input->post('edit_mobile_no');
            $current_id = $this->input->post('uniq_email');
            $c_password = $this->input->post('edit_password');

            $path = $this->data_store_path . $current_id . '.json';
            if (file_exists($path)) {
                $emp_data_read = fopen($path, "r");
                $emp_data = fread($emp_data_read, filesize($path));
                fclose($emp_data_read);
                $current_employee = json_decode($emp_data, true);
                $current_employee['user_name'] = $user_name;
                $current_employee['address'] = $user_address;
                $current_employee['mobile_no'] = $user_mobile;
                $current_employee['password'] = $c_password;
                $store_data = json_encode($current_employee);
                if (!write_file($path, $store_data)) {
//                    error
                    $this->session->set_flashdata('Toast_Message', 'Not Update');
                    redirect('admin/show_user');
                } else {
                    $this->session->set_flashdata('Toast_Message', 'Update Successfullt..');
                    redirect('admin/show_user');
                }
            }
        } else {
            redirect('login/logout');
        }
    }

    public function delete_user() {
        if ($_SESSION['user_type'] == 1) {
            $user_email = $this->input->post('id');

            $path = $this->data_store_path . $user_email . '.json';
            if (file_exists($path)) {
                $emp_data_read = fopen($path, "r");
                $emp_data = fread($emp_data_read, filesize($path));
                fclose($emp_data_read);
                $current_employee = json_decode($emp_data, true);
                $current_employee['active'] = 0;

                $store_data = json_encode($current_employee);
                if (!write_file($path, $store_data)) {
//                    error
                    $this->session->set_flashdata('Toast_Message', 'Not Update');
                    echo 0;
                } else {
                    $this->session->set_flashdata('Toast_Message', 'Update Successfullt..');
                    echo 1;
                }
            }
        } else {
            redirect('login/logout');
        }
    }

    public function active_user() {
        if ($_SESSION['user_type'] == 1) {
            $user_email = $this->input->post('id');

            $path = $this->data_store_path . $user_email . '.json';
            if (file_exists($path)) {
                $emp_data_read = fopen($path, "r");
                $emp_data = fread($emp_data_read, filesize($path));
                fclose($emp_data_read);
                $current_employee = json_decode($emp_data, true);
                $current_employee['active'] = 1;

                $store_data = json_encode($current_employee);
                if (!write_file($path, $store_data)) {
//                    error
                    $this->session->set_flashdata('Toast_Message', 'Not Update');
                    echo 0;
                } else {
                    $this->session->set_flashdata('Toast_Message', 'Update Successfullt..');
                    echo 1;
                }
            }
        } else {
            redirect('login/logout');
        }
    }

}
