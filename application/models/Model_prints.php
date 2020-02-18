<?php

/**
 * Created by PhpStorm.
 * User: revelation
 * Date: 12/14/19
 * Time: 9:01 PM
 */
const MODEL_BD_NAME = "rs_print";
const TABLE_NAME_USERS_TMP = "rs_users";
class Model_prints extends CI_Model
{
    public $pcopies;
    public $pdesc;
    public $puid;
    public $pupac;
    public $ptype;
    public $pext;

    //get all printing jobs
    public function get_all_print_jobs()
    {
        $this->db->select("*");
        $this->db->from(MODEL_BD_NAME);
        $this->db->join("rs_users as u", "u.uid=rs_print.puid");
        $read = $this->db->get();
        return $read->result_array();
    }

    //get ready to print jobs
    public function get_ready_print_jobs()
    {
        $this->db->where("pstatus", 1);
        $read = $this->db->get(MODEL_BD_NAME);
        return $read->result_array();
    }

    //get user print jobs
    public function get_user_print_jobs($id)
    {
        $this->db->reset_query();
        $this->db->where("puid", $id);
        $read = $this->db->get(MODEL_BD_NAME);
        return $read->result_array();
    }

    //get user print jobs by pac
    public function get_user_print_jobs_pac($id, $pac)
    {
        //$this->output->enable_profiler(true);
        $this->db->reset_query();
        $this->db->where("puid", $id);
        $this->db->where("pupac", $pac);
        $this->db->join("rs_users as u", "u.uid=rs_print.puid");
        $read = $this->db->get(MODEL_BD_NAME);
        return $read->result_array();
    }

    //get user print jobs by pac
    public function get_user_print_pac($pac)
    {
        $this->db->reset_query();
        $this->db->reset_query();
        $this->db->where("pupac", $pac);
        $read = $this->db->get(MODEL_BD_NAME);
        return $read->result_array();
    }

    //add new print job
    public function add_new_print($data, $uid, $dnoc, $dtyp)
    {
        $this->db->reset_query();
        //reduce based on type
        if ($dtyp === "B") {
            $dnoc = (int)$dnoc;
            $this->db->set("ublack", "`ublack`-$dnoc", FALSE);
        }
        if ($dtyp === "C") {
            $dnoc = (int)$dnoc;
            $this->db->set("ucolor", "`ucolor`-$dnoc", FALSE);
        }
        $this->db->update(TABLE_NAME_USERS_TMP);
        //do add new printing job
        $this->db->reset_query();
        $this->pcopies = $data['noc'];
        $this->pdesc = $data['pdesc'];
        $this->puid = $uid;
        $this->pupac = $data['pupac'];
        $this->ptype = $data['ptype'];
        $this->pext = $data['pext'];
        //insert now
        $this->db->insert(MODEL_BD_NAME, $this);
        return $this->db->insert_id();
    }

    //confirm print and undone
    public function confirm_job($id)
    {
        $check = $this->db->select("*")->from(MODEL_BD_NAME)->where("pid", $id)->get()->row_array();
        if (count($check) > 0) {
            $this->db->reset_query();
            if ((int)$check['pstatus'] === 1) {
                $this->db->update(MODEL_BD_NAME, array("pstatus" => 0), array("pid" => $id));
            } else {
                $this->db->update(MODEL_BD_NAME, array("pstatus" => 1), array("pid" => $id));
            }
        }
    }
}