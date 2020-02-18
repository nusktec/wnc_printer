<?php

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Installs.php
 * 3:42 PM | 2019 | 12
 **/
class Installs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function index()
    {
        //printing tables
        $adminTable = array(
            "pid" => array("type" => "INT", "auto_increment" => true),
            "pcopies" => array("type" => "VARCHAR", "constraint" => "200"),
            "pdesc" => array("type" => "VARCHAR", "constraint" => "200"),
            "puid" => array("type" => "VARCHAR", "constraint" => "200"),
            "ptype" => array("type" => "VARCHAR", "constraint" => "200"),
            "pext" => array("type" => "VARCHAR", "constraint" => "200"),
            "pupac" => array("type" => "VARCHAR", "constraint" => "200"),
            "pstatus" => array("type" => "VARCHAR", "constraint" => "200", "default" => 0),
        );
        $this->dbforge->add_key("pid");
        $this->dbforge->add_field($adminTable);
        $this->dbforge->add_field(['pcreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $this->dbforge->create_table("rs_print");
        echo "printer created...<br/>";

        //start creating tables
        $adminTable = array(
            "aid" => array("type" => "INT", "auto_increment" => true),
            "aname" => array("type" => "VARCHAR", "constraint" => "200"),
            "aphone" => array("type" => "VARCHAR", "constraint" => "200"),
            "aemail" => array("type" => "VARCHAR", "constraint" => "200", "unique" => true),
            "apassword" => array("type" => "VARCHAR", "constraint" => "200"),
        );
        $this->dbforge->add_key("aid");
        $this->dbforge->add_field($adminTable);
        $this->dbforge->add_field(['acreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $this->dbforge->create_table("rs_admins");
        echo "admin user created...<br/>";

        //user tables
        $adminTable = array(
            "uid" => array("type" => "INT", "auto_increment" => true),
            "uname" => array("type" => "VARCHAR", "constraint" => "200"),
            "uphone" => array("type" => "VARCHAR", "constraint" => "200"),
            "uemail" => array("type" => "VARCHAR", "constraint" => "200", "unique" => true),
            "upac" => array("type" => "VARCHAR", "constraint" => "200", "unique" => true),
            "upcount" => array("type" => "INT", "default" => 0),
        );
        $this->dbforge->add_key("uid");
        $this->dbforge->add_field($adminTable);
        $this->dbforge->add_field(['ucreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $this->dbforge->create_table("rs_users");
        echo "global users created...<br/>";
    }
}