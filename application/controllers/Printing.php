<?php

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Printing.php
 * 2:25 PM | 2019 | 12
 **/
const ROLE_NO = 1;
class Printing extends CI_Controller
{
    public $uid = null;
    public $uPac = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->library("auth");
        $this->load->model("model_users");
        $this->load->model("model_prints");

        //auto load
        $this->auth->islogged(true);
        $this->auth->forcerole(ROLE_NO);

        //assign user id
        $this->uid = $this->auth->getUser()['uid'];
        $this->uPac = $this->auth->getUser()['upac'];
    }

    //load default printing info
    public function index()
    {
        $error = null;
        $printer = $this->model_prints->get_user_print_jobs_pac($this->uid, $this->uPac);
        $user = $this->model_users->get_user_by_id($this->uid);
        //add new print job
        if (validateFormToken()) {
            //loop through all printed
            $dtyp = $_POST['ptype'];
            $dnoc = (int)$_POST['noc'];
            $dblk = (int)$user['ublack'];
            $dcol = (int)$user['ucolor'];
            //check if requested copies is above
            if ($dtyp === "B" && $dnoc > $dblk) {
                $error = "<strong style='color: red'>No. of copies is more than the available black paper assigned to you</strong>";
            }
            if ($dtyp === "C" && $dnoc > $dcol) {
                $error = "<strong style='color: red'>No. of copies is more than the available color paper assigned to you</strong>";
            }
            if (!$error) {
                $array = explode('.', $_FILES['pfile']['name']);
                $extension = end($array);
                $_POST['pext'] = $extension;
                $pid = $this->model_prints->add_new_print($_POST, $this->uid, $dnoc, $dtyp);
                $fn = "uploads/" . $pid . "_" . sha1($pid) . "." . $extension;
                move_uploaded_file($_FILES['pfile']['tmp_name'], $fn);
                chmod($fn, 0777);
                $error = "<strong>Your printing job has been sent...</strong>";
            }
            setFormToken();
        }
        //display printing view
        $data['title'] = "Printing";
        $data['printer'] = $printer;
        $data['user'] = $user;
        $data['error'] = $error;
        $this->load->view('printing', $data);
    }

//user printing history
    public
    function history()
    {
        $error = null;
        $printer = $this->model_prints->get_user_print_jobs_pac($this->uid, $this->uPac);
        $user = $this->model_users->get_user_by_id($this->uid);
        //display printing view
        $data['title'] = "History";
        $data['printer'] = $printer;
        $data['user'] = $user;
        $data['error'] = $error;
        $this->load->view('history', $data);
    }
}