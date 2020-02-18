<?php
date_default_timezone_set("Africa/Lagos");
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Model_users.php
 * 10:35 PM | 2019 | 12
 **/
const TABLE_NAME_USERS = "rs_users";

class Model_users extends CI_Model
{
    public $uname = null;
    public $uphone = null;
    public $uemail = null;
    public $upac = null;
    public $utype = null;
    public $ublack = null;
    public $ucolor = null;
    public $uusage = null;

    //add new users
    public function add_new_user($un, $up, $ue, $upac, $utype = "BC", $col = 10, $blk = 10)
    {
        //check conditions
        if ($utype == 'C') {
            $blk= 0;
        }
        if ($utype == 'B') {
            $col = 0;
        }
        //assign timestamp
        $d = new DateTime();
        $this->db->where("uemail", $ue);
        $chk = $this->db->get(TABLE_NAME_USERS);
        if (!count($chk->row_array()) > 0) {
            $this->db->reset_query();
            $this->uname = $un;
            $this->uphone = $up;
            $this->uemail = $ue;
            $this->upac = $upac;
            $this->utype = $utype;
            $this->ublack = (int)$blk;
            $this->ucolor = (int)$col;
            $this->uusage = $d->getTimestamp();
            //insert to db
            $this->db->insert(TABLE_NAME_USERS, $this);
            return 200;
        } else {
            return 300;
        }
    }

    //get all the users
    public function get_all_users()
    {
        $read = $this->db->get(TABLE_NAME_USERS);
        return $read->result_array();
    }

    //get all the users
    public function get_user_by_id($id)
    {
        $this->db->where("uid", $id);
        $read = $this->db->get(TABLE_NAME_USERS);
        return $read->row_array();
    }

    //validity user
    public function validity_user($id = null)
    {
        if ($id != null) {
            //assign timestamp
            $d = new DateTime();
            $this->db->update(TABLE_NAME_USERS, array("uusage" => $d->getTimestamp()), array("uid" => $id));
        }
        return true;
    }

    //delete user
    public function delete_user($id = null)
    {
        if ($id != null) {
            $this->db->where("uid", $id);
            $this->db->delete(TABLE_NAME_USERS);
        }
    }

    //find with pac
    public function find_pac($pac)
    {
        $this->db->where("upac", $pac);
        $res = $this->db->get(TABLE_NAME_USERS);
        return $res->row_array();
    }

    //search pac
    public function search_pac($pac)
    {
        $this->db->reset_query();
        return $this->db->select("*")->from(TABLE_NAME_USERS)->where("upac", $pac)->get()->row_array();
    }

    //update user pac
    public function update_pac($pac, $typ, $blk, $col, $cmd)
    {
        //$this->output->enable_profiler(TRUE);
        $this->db->reset_query();
        $rd = $this->db->select("*")->from(TABLE_NAME_USERS)->where("upac", $pac)->get()->row_array();
        if (count($rd) > 0) {
            //cancel updates
            if ($typ === "B") {
                $col = 0;
            }
            if ($typ === "C") {
                $blk = 0;
            }
            $blk = (int)$blk;
            $col = (int)$col;
            //$command
            $arit = ((int)$cmd == 1) ? "+" : "-";
            //update
            $this->db->reset_query();
            $this->db->where("upac", $pac);
            $this->db->set("utype", $typ);
            if ($typ === "B") {
                $col = 0;
                $this->db->set("ucolor", "0", FALSE);
                $this->db->set("ublack", "`ublack`" . $arit . $blk, FALSE);
            }
            if ($typ === "C") {
                $blk = 0;
                $this->db->set("ucolor", "`ucolor`" . $arit . $col, FALSE);
                $this->db->set("ublack", "0", FALSE);
            }
            if ($typ === "BC") {
                $this->db->set("ucolor", "`ucolor`" . $arit . $col, FALSE);
                $this->db->set("ublack", "`ublack`" . "$arit" . "$blk", FALSE);
            }
            //extends time again
            $this->db->set("uusage", time(), FALSE);
            $this->db->update(TABLE_NAME_USERS);
            return true;
        }
        return false;
    }
}