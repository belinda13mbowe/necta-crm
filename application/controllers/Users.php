<?php
/**
 * Created by PhpStorm.
 * User: Elitebook
 * Date: 4/8/2021
 * Time: 3:46 PM
 * developer: Nickson Maro
 */

class Users extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->model('Model_Users','users');
        $this->init();
    }

    public function index(){
        if($this->session->has_userdata("user_id")){
            $this->data['mnu'] = mnu($this->users->getName($this->session->userdata("user_id")));
            $this->data['roles'] = $this->roles();
            $this->load->view("users/list",$this->data);
        }else{redirect('Login');}
    }

    private function init(){
        $this->data['top'] = top();
        $this->data['nav'] = nav();
        $this->data['bottom'] = bottom();
        $this->data['footer'] = footer();
    }

    public function add() {
        if ($this->input->post()) {
            $data = array
            (
                "user_role"    => $this->input->post("txt_role", true),
                "user_name"    => $this->input->post("txt_name", true),
                "user_email"   => $this->input->post("txt_email", true),
                "user_phone"   => str_replace(" ", "", $this->input->post("txt_phone", true)),
                "user_add"     => $this->input->post("txt_add", true),
                "user_pwd"     => $this->users->hashed($this->input->post("txt_pwd", true)),
                "user_id"      => $this->session->userdata("user_id"),
            );
            $res=$this->users->add($data);
            json_array_response($res);
        }
    }

    public function update() {
        if ($this->input->post()) {
            $data = array
            (
                "user_role"        => $this->input->post("txt_role", true),
                "user_name"        => $this->input->post("txt_name", true),
                "user_email"       => $this->input->post("txt_email", true),
                "user_phone"       => str_replace(" ", "", $this->input->post("txt_phone", true)),
                "user_add"         => $this->input->post("txt_add", true),
                "user_id"          => $this->input->post("txt_user_id", true),
                "update_user_id"   => $this->session->userdata("user_id")
            );
            $res=$this->users->update($data);
            json_array_response($res);
        }
    }

    public function login() {
        if ($this->input->post()) {
            $identity = $this->input->post('identity', true);
            $pwd = $this->input->post('pwd',true);
            $res = $this->users->login($identity, $pwd);
            if ($res) {
                json_response( "success");
                exit;
            }
            json_response( "Login failed!");
        }
    }

    public function logout() {
        $this->session->unset_userdata("user_id");
        if (!$this->session->has_userdata("user_id")) {
            redirect("Login");
        }
    }

    public function changePwd(){
        if ($this->input->post()) {
            $data = array
            (
                "pwd"   => $this->users->hashed($this->input->post("pwd", true)),
                "uid"   => $_SESSION['user_id']
            );
            $res = $this->users->changePwd($data);
            json_array_response($res);
        }
    }


    public function fetch() {
        $uid = $this->input->post("user_id",true);
        $res = $this->users->getOne($uid);
        foreach ($res as $row) {
            $data = array
            (
                "role_id" =>$row->user_role_id,
                "name"    =>$row->user_name,
                "email"   =>$row->user_email,
                "phone"   =>$row->user_mobile,
                "add"     =>$row->user_address,
            );
            json_array_response($data);
        }
    }


    public function roles(){
        $rows = "<option value=''>Select Role</option>";
        $res = $this->users->get_roles();
        foreach($res as $row){
            $rows.="<option value='{$row->role_id}'>".$row->role_name."</option>";
        }
        return $rows;
    }


    private function lists($_xml) {
        if ($_xml = simplexml_load_string($_xml)) {
            if (is_object($_xml)) {

                $xml = new SimpleXMLElement("<users></users>");
                $num = 0;
                foreach ($this->users->get($_xml->start,$_xml->limit,$_xml->search) as $row) {
                    $data = $xml->addChild("data");
                    $data->addChild("extension", "");
                    $data->addChild("name", $row->user_name);
                    $data->addChild("phone", $row->user_mobile);
                    $data->addChild("email", $row->user_email);
                    $data->addChild("address", $row->user_address);
                    if($row->user_active == 1){$data->addChild("status", "<span style='font-family: Calibri;font-size: 1.1em;font-weight: 900;color: rgb(64,173,173);'>Active</span>");}
                    if($row->user_active == 2){$data->addChild("status", "<span style='font-family: Calibri;font-size: 1.1em;font-weight: 900;color: red;'>Deactivated</span>");}
                    $data->addChild("action", $this->action($row->user_id,$row->user_active));
                    $num++;
                }

                $count = $this->users->count($_xml->search);

                if ($num == 0) {$xml->addChild("data");}
                $xml->addChild("recordsTotal", $count);
                $xml->addChild("recordsFiltered", $count);
                $xml->addChild("num", $num);
                return $xml->asXML();
            }else{
                response(array("code"=>0,"desc"=>"not valid object"));
            }
        }else{
            response(array("code"=>0,"desc"=>"failed to load xml"));
        }
        return null;
    }


    public function data() {
        if ($this->input->method() == "post") {
            $start  = $this->input->post("start");
            $limit  = $this->input->post("length");
            $search = strtolower($this->input->post("search")["value"]);

            $start = empty($search) ? $start : 0;

            $xml = new SimpleXMLElement("<request></request>");
            $xml->addChild("start",$start);
            $xml->addChild("limit",$limit);
            $xml->addChild("search",$search);

            $xml = $this->lists($xml->asXML());

            if (is_valid_xml($xml)) {
                if ($xml = simplexml_load_string($xml)) {
                    $json = json_encode(json_decode(json_encode($xml), true));
                    if ($xml->num > 1) {
                        print $json;
                    } else {
                        $json = str_replace("},", "}],", str_replace(":{", ":[{", $json));
                        print $json;
                    }
                }else{
                    response(array("code"=>0,"desc"=>"failed to load xml"));
                }
            }else{
                response(array("code"=>0,"desc"=>"invalid xml"));
            }
        }
    }

    private function action($uid,$active) {
        if($this->session->userdata("user_role_id") == 1){
            if($active == 1){
                return "
                        <span onclick=\"show_edit_user({$uid})\" style=\"cursor: pointer;margin-right: 6px;\"><i class=\"fa fa-edit\" title='Edit User'></i></span>
                        <span onclick=\"deactivate_user({$uid})\" style=\"cursor: pointer;color: red\"><i class=\"fa fa-window-close\" title='Deactivate User'></i></span>
                ";
            }elseif($active == 2){
                return "
                    <span onclick=\"show_edit_user({$uid})\" style=\"cursor: pointer;margin-right: 6px;\"><i class=\"fa fa-edit\" title='Edit User'></i></span>
                    <span onclick=\"activate_user({$uid})\" style=\"cursor: pointer;color: green\"><i class=\"fa fa-check-square\" title='Activate User'></i></span>
                ";
            }
        }
        return null;
    }

    public function deactivate() {
        if ($this->input->post()) {
            $uid = $this->input->post("uid",true);
            $res = $this->users->deactivate($uid);
            json_array_response($res);
        }
    }

    public function activate() {
        if ($this->input->post()) {
            $uid = $this->input->post("uid",true);
            $res = $this->users->activate($uid);
            json_array_response($res);
        }
    }

}