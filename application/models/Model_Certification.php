<?php
/**
 * Created by PhpStorm.
 * User: Elitebook
 * Date: 5/1/2021
 * Time: 9:31 PM
 */
class Model_users extends  CI_Model{

    public function add($data) {
        $this->db->insert("tbl_users",$data);
        if($this->db->affected_rows() > 0){return array("code"=>1,"desc"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }

    public function update($data) {
        $this->db->where(array("user_id" => $data['user_id']));
        $this->db->update("tbl_users",$data);
        if($this->db->affected_rows() > 0){return array("code"=>1,"desc"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }

    public function get($start,$limit,$search) {
        $this->db->where(array("user_node_id"=>$this->node,"user_id !=" =>1));
        $this->db->order_by("user_id desc");
        $this->db->group_start();
        $this->db->like('lower(user_name)',$search,'both');
        $this->db->or_like('lower(user_mobile)',$search,'both');
        $this->db->or_like('lower(user_email)',$search,'both');
        $this->db->or_like('lower(dept_name)',$search,'both');
        $this->db->or_like('lower(role_name)',$search,'both');
        $this->db->or_like('lower(branch_name)',$search,'both');
        $this->db->or_like('lower(branch_code)',$search,'both');
        $this->db->group_end();
        $this->db->limit($limit,$start);
        return $this->db->get("view_users")->result();
    }

    public function count($search) {
        $this->db->where(array("user_node_id"=>$this->node,"user_id !=" =>1));
        $this->db->order_by("user_id desc");
        $this->db->group_start();
        $this->db->like('lower(user_name)',$search,'both');
        $this->db->or_like('lower(user_mobile)',$search,'both');
        $this->db->or_like('lower(user_email)',$search,'both');
        $this->db->or_like('lower(dept_name)',$search,'both');
        $this->db->or_like('lower(role_name)',$search,'both');
        $this->db->or_like('lower(branch_name)',$search,'both');
        $this->db->or_like('lower(branch_code)',$search,'both');
        $this->db->group_end();
        $this->db->from("view_users");
        return $this->db->count_all_results();
    }

    public function get_roles(){
        $this->db->select("*");
        return $this->db->get("tbl_roles")->result();
    }

    public function get_departments(){
        return $this->db->get("tbl_departments")->result();
    }

    public function getOne($user_id) {
        $this->db->where(array("user_id"=>$user_id));
        return $this->db->get("tbl_users")->result();
    }

    public function getName($user_id) {
        $this->db->select("user_name as name");
        $this->db->where(array("user_id"=>$user_id));
        return $this->db->get("tbl_users")->row()->name;
    }

    public function getEmail($user_id) {
        $this->db->select("user_email as email");
        $this->db->where(array("user_id"=>$user_id));
        return $this->db->get("tbl_users")->row()->email;
    }

    public function branchCode($bid) {
        $this->db->select("code as code");
        $this->db->where(array("id"=>$bid));
        return $this->db->get("tbl_branches")->row()->code;
    }

    public function login($identity,$pwd) {
        $this->db->where(array("user_email"=>$identity,"user_active"=>1));
        $row = $this->db->get("tbl_users")->row();
        //log_message("ERROR","user details ".print_r($row,true));
        if (is_object($row)) {
            if (password_verify($pwd,$row->user_pwd)) {
                log_message("ERROR","user password verified");
                $this->session->set_userdata("user_id", $row->user_id);
                $this->session->set_userdata("user_name", $row->user_name);
                $this->session->set_userdata("user_email", $row->user_email);
                $this->session->set_userdata("is_admin", $row->is_admin);
                $this->logged($row->user_id);
                return true;
            }
        }
        return false;
    }

    private function logged($uid){
        $this->db->where(array("user_id" => $uid));
        $this->db->update("tbl_users",array("user_login"=>date('Y-m-d H:i:s'),"user_status" =>1));
    }

    public function out($uid){
        $this->db->where(array("user_id" => $uid));
        $this->db->update("tbl_users",array("user_status" =>0));
    }

    public function hashed($pwd){
        return password_hash($pwd, PASSWORD_BCRYPT);
    }

    public function changePwd($data) {
        $this->db->query("call sp_change_password(?,?,@code,@sms)", $data);
        $q = $this->db->query("select @code as code,@sms as sms")->row();
        if ($q->code==0) {return array("code"=>1,"desc"=>"success");}
        return array("code"=>0,"desc"=>$q->sms);
    }


    public function deactivate($uid){
        $this->db->where(array("user_id" => $uid));
        $this->db->update("tbl_users",array("user_active"=>2));
        if($this->db->affected_rows() > 0){return array("code"=>1,"desc"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }

    public function activate($uid){
        $this->db->where(array("user_id" => $uid));
        $this->db->update("tbl_users",array("user_active"=>1));
        if($this->db->affected_rows() > 0){return array("code"=>1,"desc"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }

    public function get_branches(){
        $this->db->where(array("node_id"=>$this->node));
        return $this->db->get("tbl_branches")->result();
    }

}

