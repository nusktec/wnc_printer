<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library("auth");
        $this->load->model("model_admin");
        $this->load->model("model_users");
    }

    public function index()
    {
        //no show login page
        if ($this->auth->islogged()) {
            if ($this->auth->getRole() == 2) {
                redirect(base_url("admin"));
            } else {
                redirect(base_url("printing"));
            }
        }
        $data = [];
        $error = null;

        if (validateFormToken()) {
            $pac = strtoupper(@$_POST['pac']);
            //check and allow printing session
            if (strlen($pac) > 8) {
                //check db
                $get = $this->model_users->find_pac($pac);
                if (count($get) > 0) {
                    //check for expiration
                    $exp = (31 - (int)dateDiffTs($get['uusage'], getTimeStamp()));
                    if ($exp > 0) {
                        //success login
                        $error = "Logged successfully !";
                        $this->auth->setLogin($get);
                        $this->auth->setRole(1);
                        redirect(current_url());
                    } else {
                        $error = "Your PAC has expired...";
                    }
                } else {
                    $error = "Invalid PAC No.";
                }
            } else {
                $error = "Not a valid PAC No.";
            }
            setFormToken();
        }
        $data['title'] = "Welcome";
        $data['error'] = $error;
        $this->load->view('welcome', $data);
    }

    //login
    public function login()
    {
        //no show login page
        if ($this->auth->islogged()) {
            if ($this->auth->getRole() == 2) {
                redirect(base_url("admin"));
            } else {
                redirect(base_url("printing"));
            }
        }
        $error = null;
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        if (!empty($email) && !empty($password)) {
            //check login
            $res = $this->model_admin->find_admin($email, $password);
            if (count($res) > 0) {
                //is logged
                $this->auth->setLogin($res);
                $this->auth->setRole(2);
                redirect(base_url("admin"));
            } else {
                $error = "Invalid login";
            }
        }
        $data['error'] = $error;
        $data['title'] = "Welcome";
        $this->load->view("login", $data);
    }

    //logout every
    public function logout()
    {
        //logout from every
        $this->auth->logout();
    }
}
