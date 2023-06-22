<?php
/**
 * Time: 9:31 PM
 */
class Model_Registration extends  CI_Model{
    public function __construct(){
        parent::__construct();
        $this->user  = $this->session->userdata("user_id");
    }

    public function add($data) {
        $this->db->insert("tbl_registration",$data);
        if($this->db->affected_rows() > 0){return array("code"=>1,"rid"=>$this->db->insert_id());}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }

    public function add_payment_receipt($data) {
        $this->db->insert("tbl_payment_receipt",$data);
        if($this->db->affected_rows() > 0){return array("code"=>1,"rid"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }


    public function add_nida($data) {
        $this->db->insert("tbl_nida",$data);
        if($this->db->affected_rows() > 0){return array("code"=>1,"rid"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }


    public function add_loss($data) {
        $this->db->insert("tbl_loss_reports",$data);
        if($this->db->affected_rows() > 0){return array("code"=>1,"rid"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }

    public function add_newspaper($data) {
        $this->db->insert("tbl_news_papers",$data);
        if($this->db->affected_rows() > 0){return array("code"=>1,"rid"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }

    public function add_passport($data) {
        $this->db->insert("tbl_passports",$data);
        if($this->db->affected_rows() > 0){return array("code"=>1,"rid"=>"success");}
        else{return array("code"=>0,"desc"=>"Process failed");}
    }

    public function update($data) {
        $this->db->query("call sp_update_certification (?,?,?,?,?,?,?,@code,@sms)", $data);
        $q = $this->db->query("select @code as code,@sms as sms")->row();
        if ($q->code==0) {return array("code"=>1,"desc"=>"success");}
        return array("code"=>0,"desc"=>$q->sms);
    }

    public function get($start,$limit,$search) {
        $this->db->where(array("user_id" => $this->user));
        $this->db->order_by("id desc");
        $this->db->group_start();
        $this->db->like('lower(reg_name)',$search,'both');
        $this->db->or_like('lower(region_name)',$search,'both');
        $this->db->or_like('lower(exam_name)',$search,'both');
        $this->db->group_end();
        $this->db->limit($limit,$start);
        return $this->db->get("view_registration")->result();
    }

    public function count($search) {
        $this->db->group_start();
        $this->db->like('lower(reg_name)',$search,'both');
        $this->db->or_like('lower(region_name)',$search,'both');
        $this->db->or_like('lower(exam_name)',$search,'both');
        $this->db->group_end();
        $this->db->from("view_registration");
        return $this->db->count_all_results();
    }

    public function nida_exist($type,$report) {
        $this->db->where(["report_type" => $type,"report_id"=>$report]);
        return $this->db->get("tbl_nida")->num_rows() > 0;
    }

    public function getNidaPath($type,$report){
        $this->db->select("file_path as file_path");
        $this->db->where(["report_type"=>$type,"report_id"=>$report]);
        return  $this->db->get("tbl_nida")->row()->file_path;
    }

    public function loss_report_exist($type,$report) {
        $this->db->where(["report_type" => $type,"report_id"=>$report]);
        return $this->db->get("tbl_loss_reports")->num_rows() > 0;
    }

    public function getLossReportPath($type,$report){
        $this->db->select("file_path as file_path");
        $this->db->where(["report_type"=>$type,"report_id"=>$report]);
        return  $this->db->get("tbl_loss_reports")->row()->file_path;
    }

    public function news_paper_exist($type,$report) {
        $this->db->where(["report_type" => $type,"report_id"=>$report]);
        return $this->db->get("tbl_news_papers")->num_rows() > 0;
    }


    public function passport_exist($type,$report) {
        $this->db->where(["report_type" => $type,"report_id"=>$report]);
        return $this->db->get("tbl_passports")->num_rows() > 0;
    }



    public function getOne($mid) {
        $this->db->where(array("mkutano_id"=>$mid));
        return $this->db->get("tbl_mikutano")->result();
    }
//
    public function school_types(){
        return $this->db->get("tbl_exam_type")->result();
    }

    public function exam_types(){
        return $this->db->get("tbl_exam_type")->result();
    }

    public function region(){
        return $this->db->get("tbl_region")->result();
    }


    public function registration_cats(){
        return $this->db->get("tbl_registration_cats")->result();
    }
    public function reg_user_id(){
        return $this->db->get("tbl_registration")->result();
    }
}

