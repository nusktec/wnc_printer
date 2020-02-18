<?php

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Model_admin.php
 * 1:16 AM | 2019 | 12
 **/
const TABLE_NAME = "rs_admins";

class Model_admin extends CI_Model
{
    public $aname = null;
    public $aphone = null;
    public $aemail = null;
    public $apassword = null;
    public $acreated = null;

    //add new admin
    public function add_new_admin()
    {
        $this->aname = "Onuche Ameh";
        $this->aphone = "09876567893";
        $this->aemail = "hello@gmail.com";
        $this->apassword = sha1("12345ty");
        $this->acreated = time();
        //insert now
        $this->db->insert(TABLE_NAME, $this);
    }

    //get admin
    public function find_admin($email, $pass)
    {
        $this->db->where("aemail", $email);
        $this->db->where("apassword", sha1($pass));
        //find in db
        $this->db->from(TABLE_NAME);
        $res = $this->db->get();
        return $res->row_array();
    }
}