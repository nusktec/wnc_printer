<?php

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Admin.php
 * 3:29 PM | 2019 | 12
 **/
const ROLE_NO = 2;
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load library
        $this->load->library("auth");
        $this->load->model("model_admin");
        $this->load->model("model_users");
        $this->load->model("model_prints");

        //auto load
        $this->auth->islogged(true);
        $this->auth->forcerole(ROLE_NO);
    }

    //dashboard
    public function index()
    {
        $data['users'] = $this->model_users->get_all_users();
        $data['printer'] = $this->model_prints->get_all_print_jobs();
        $data['printer_ready'] = $this->model_prints->get_ready_print_jobs();
        $data['title'] = "Dashboard";
        $data['contents'] = $this->load->view("admin/dashboard", $data, true);
        $this->load->view("admin/template", $data);
    }

    //users
    public function users()
    {
        $error = null;
        //check if form ready
        if (validateFormToken()) {
            $error = null;
            $action = $this->input->post("action");
            //do assigned task
            switch ($action) {
                case "adduser":
                    //add_new_user($un, $up, $ue, $upac, $upc = 10)
                    $uname = $this->input->post("name");
                    $uphone = $this->input->post("phone");
                    $uemail = $this->input->post("email");
                    $utype = $this->input->post("pkgtype");
                    $ucolor = $this->input->post("colorqty");
                    $ublack = $this->input->post("blackqty");
                    $ins = $this->model_users->add_new_user($uname, $uphone, $uemail, substr(strtoupper($uname), 0, 2) . rand(1111111, 9999999), $utype, $ucolor, $ublack);
                    if ($ins != 300) {
                        $error = array("message" => "User added successfully", "type" => "alert-success");
                    } else {
                        $error = array("message" => "User already existed", "type" => "alert-danger");
                    }
                    break;
                default:
                    //Do nothing
                    break;
            }
            setFormToken();
        }
        //proceed to viewing
        $data['error'] = $error;
        $data['title'] = "Users";
        $data['scripts'] = array("users");
        $data['users'] = $this->model_users->get_all_users();
        $data['contents'] = $this->load->view("admin/users", $data, true);
        $this->load->view("admin/template", $data);
    }

    //users
    public function pac()
    {
        $error = null;
        $search = null;
        $printer = null;
        //check if form ready
        if (validateFormToken()) {
            $action = $this->input->post("action");
            //do assigned task
            switch ($action) {
                case "adduser":
                    //add_new_user($un, $up, $ue, $upac, $upc = 10)
                    $uname = $this->input->post("name");
                    $uphone = $this->input->post("phone");
                    $uemail = $this->input->post("email");
                    $utype = $this->input->post("pkgtype");
                    $ucolor = $this->input->post("colorqty");
                    $ublack = $this->input->post("blackqty");
                    $ins = $this->model_users->add_new_user($uname, $uphone, $uemail, substr(strtoupper($uname), 0, 2) . rand(1111111, 9999999), $utype, $ucolor, $ublack);
                    if ($ins != 300) {
                        $error = array("message" => "User added successfully", "type" => "alert-success");
                    } else {
                        $error = array("message" => "User already existed", "type" => "alert-danger");
                    }
                    break;
                case "search":
                    //do search
                    $inp = trim($_POST['sinput'], " ");
                    if (strlen($inp) > 0) {
                        $search = $this->model_users->search_pac($inp);
                        $printer = $this->model_prints->get_user_print_pac($inp);
                        if (!$search) {
                            $error['message'] = "Invalid PAC No.";
                            $error['type'] = "alert-danger";
                        }
                    }
                    break;
                case "topup":
                    //do topup
                    $blk = $_POST['blk'];
                    $col = $_POST['col'];
                    $typ = $_POST['typ'];
                    $pac = $_POST['pac'];
                    $cmd = $_POST['command'];
                    if (strlen($pac) > 0) {
                        $updated = $this->model_users->update_pac($pac, $typ, $blk, $col, $cmd);
                        if ($updated) {
                            $error['message'] = "PAC extended with an updates ! ";
                            $error['type'] = "alert-success";
                        }
                    }
                    break;
                default:
                    //Do nothing

                    break;
            }
            setFormToken();
        }
        //proceed to viewing
        $data['error'] = $error;
        $data['title'] = "PAC";
        $data['scripts'] = array("users");
        $data['users'] = $this->model_users->get_all_users();
        $data['printer'] = $printer;
        $data['search'] = $search;
        $data['contents'] = $this->load->view("admin/pac", $data, true);
        $this->load->view("admin/template", $data);
    }

    //delete user
    public function delete($id = 0)
    {
        $this->model_users->delete_user($id);
        redirect(base_url("admin/users"));
    }

    //delete user
    public function validity($id = 0)
    {
        $this->model_users->validity_user($id);
        redirect(base_url("admin/users"));
    }

    //confirm job
    public function confirm($id = 0)
    {
        $this->model_prints->confirm_job($id);
        redirect(base_url("admin/"));
    }
}