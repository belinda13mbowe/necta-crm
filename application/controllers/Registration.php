<?php
/**
 * Created by PhpStorm.
 * User: belin
 * Date: 10/05/2023
 * Time: 17:42
 */

class Certification extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->model('Model_certification', 'certification');
        $this->load->model('Model_Users', 'users');
        $this->init();
    }

    public function index(){
        if($this->session->has_userdata("user_id")){
            $this->data['mnu'] = mnu($this->users->getName($this->session->userdata("user_id")));
//            $this->data['types'] = $this->types();
            $this->load->view("certification/certification",$this->data);
        }else{redirect("login");}
    }

    private function init(){
        $this->data['top'] = top();
        $this->data['nav'] = nav();
        $this->data['bottom'] = bottom();
        $this->data['footer'] = footer();
    }


//    private function lists($_xml) {
//        if ($_xml = simplexml_load_string($_xml)) {
//            if (is_object($_xml)) {
//
//                $xml = new SimpleXMLElement("<mikutano></mikutano>");
//                $num = 0;
//                foreach ($this->mikutano->get($_xml->start,$_xml->limit,$_xml->search) as $row) {
//                    $data = $xml->addChild("data");
//                    $data->addChild("extension", "");
//                    $data->addChild("name", $row->mkutano_name);
//                    $data->addChild("phone", $row->mkutano_phone);
//                    $data->addChild("location", $row->mkutano_location);
//                    $data->addChild("type", $row->type_name);
//                    $data->addChild("ahadi", number_format($row->mkutano_ahadi,2));
//                    $data->addChild("deni", number_format($row->mkutano_deni,2));
//                    $data->addChild("malipo", number_format($row->mkutano_malipo,2));
//                    $data->addChild("action", $this->action($row->mkutano_id));
//                    $num++;
//                }
//
//                $count = $this->mikutano->count($_xml->search);
//
//                if ($num == 0) {$xml->addChild("data");}
//                $xml->addChild("recordsTotal", $count);
//                $xml->addChild("recordsFiltered", $count);
//                $xml->addChild("num", $num);
//                return $xml->asXML();
//            }else{
//                response(array("code"=>0,"desc"=>"not valid object"));
//            }
//        }else{
//            response(array("code"=>0,"desc"=>"failed to load xml"));
//        }
//        return null;
//    }

//
//    public function data() {
//        if ($this->input->method() == "post") {
//            $start  = $this->input->post("start");
//            $limit  = $this->input->post("length");
//            $search = strtolower($this->input->post("search")["value"]);
//
//            $start = empty($search) ? $start : 0;
//
//            $xml = new SimpleXMLElement("<request></request>");
//            $xml->addChild("start",$start);
//            $xml->addChild("limit",$limit);
//            $xml->addChild("search",$search);
//
//            $xml = $this->lists($xml->asXML());
//
//            if (is_valid_xml($xml)) {
//                if ($xml = simplexml_load_string($xml)) {
//                    $json = json_encode(json_decode(json_encode($xml), true));
//                    if ($xml->num > 1) {
//                        print $json;
//                    } else {
//                        $json = str_replace("},", "}],", str_replace(":{", ":[{", $json));
//                        print $json;
//                    }
//                }else{
//                    response(array("code"=>0,"desc"=>"failed to load xml"));
//                }
//            }else{
//                response(array("code"=>0,"desc"=>"invalid xml"));
//            }
//        }
//    }

//    private function action($mid) {
//        return "
//            <span onclick=\"show_edit_mkutano({$mid})\" style=\"cursor: pointer;color:lightseagreen;margin-left: 10px\"><i class=\"fa fa-edit\" title='Hariri Taarifa'></i></span>
//            <span onclick=\"show_add_payments({$mid})\" style=\"cursor: pointer;color:lightseagreen;margin-left: 10px\"><i class=\"fa fa-money\" title='Ingiza Malipo'></i></span>
//            <span onclick=\"show_payments_details({$mid},3)\" style=\"cursor: pointer;color:lightseagreen;margin-left: 10px\"><i class=\"fa fa-align-justify\" title='Malipo'></i></span>
//            <span onclick=\"show_deactivate({$mid})\" style=\"cursor: pointer;color:red;margin-left: 10px\"><i class=\"fa fa-window-close\" title='Sitisha'></i></span>
//        ";
//    }

//    public function add() {
//        if ($this->input->post()) {
//            $data = array
//            (
//                "name"        => $this->input->post("txt_name", true),
//                "phone"       => str_replace(" ", "", $this->input->post("txt_phone", true)),
//                "location"    => $this->input->post("txt_location", true),
//                "type"        => $this->input->post("txt_type", true),
//                "ahadi"       => $this->input->post("txt_ahadi", true),
//            );
//            $res=$this->mikutano->add($data);
//            json_array_response($res);
//        }
//    }

//    public function update() {
//        if ($this->input->post()) {
//            $data = array
//            (
//                "name"        => $this->input->post("txt_name", true),
//                "phone"       => str_replace(" ", "", $this->input->post("txt_phone", true)),
//                "location"    => $this->input->post("txt_location", true),
//                "type"        => $this->input->post("txt_type", true),
//                "ahadi"       => $this->input->post("txt_ahadi", true),
//                "payments"    => $this->input->post("txt_payments", true),
//                "mkutano"      => $this->input->post("txt_mkutano_id", true),
//            );
//            $res=$this->certification->update($data);
//            json_array_response($res);
//        }
//    }


//    public function fetch() {
//        $mid = $this->input->post("mkutano_id",true);
//        $res = $this->mikutano->getOne($mid);
//        foreach ($res as $row) {
//            $data = array
//            (
//                "name"      =>$row->mkutano_name,
//                "phone"     =>$row->mkutano_phone,
//                "makazi"    =>$row->mkutano_location,
//                "type"      =>$row->mkutano_aina,
//                "ahadi"     =>$row->mkutano_ahadi,
//                "deni"      =>$row->mkutano_deni,
//                "paid"      =>$row->mkutano_malipo,
//                "payment"   =>$row->payment_status,
//            );
//            json_array_response($data);
//        }
//    }

//
//    public function add_payments() {
//        if ($this->input->post()) {
//            $data = array
//            (
//                "payment_cat" => $this->input->post("payment_cat", true),
//                "mid"         => $this->input->post("mid", true),
//                "deni"        => $this->input->post("deni", true),
//                "amt"         => $this->input->post("amt", true),
//                "balance"     => $this->input->post("balance", true),
//                "paid"        => $this->input->post("paid", true),
//                "uid"         => $this->session->userdata("user_id"),
//            );
//            $res = $this->mikutano->add_payments($data);
//            json_array_response($res);
//        }
//    }
////
//    private function payments($rid,$cat) {
//        $rows = '';
//        $res = $this->mikutano->payments_details($rid,$cat);
//        foreach ($res as $row) {
//            $rows.='
//            <tr>
//                <td class="crock">'.date('d-m-Y',strtotime($row->payment_date)).'</td>
//                <td class="dile">'.number_format($row->payment_debt,2).'</td>
//                <td class="dile">'.number_format($row->payment_amt,2).'</td>
//                <td class="dile">'.number_format($row->payment_balance,2).'</td>
//            </tr>';
//        }
//        return $rows;
//    }

//    public function get_payments(){
//        if($this->input->post()){
//            $rid = $this->input->post("rid",true);
//            $cat = $this->input->post("cat",true);
//            $res = $this->payments($rid,$cat);
//            json_response($res);
//        }
//    }
//
//    private function types(){
//        $rows = "<option value=''>--Chagua aina--</option>";
//        $res = $this->mikutano->meeting_types();
//        foreach($res as $row){
//            $rows.="<option value='{$row->type_id}'>".$row->type_name."</option>";
//        }
//        return $rows;
//    }

}