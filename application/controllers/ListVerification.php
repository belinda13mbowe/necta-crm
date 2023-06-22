<?php
/**
 * Created by PhpStorm.
 * User: belin
 * Date: 16/06/2023
 * Time: 08:02
 */

class ListRegistration extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Model_Admin', 'admin');
        $this->load->model('Model_Users', 'users');
        $this->init();
    }

    public function index(){
        if($this->session->has_userdata("user_id")){
            $this->data['mnu'] = mnu($this->users->getName($this->session->userdata("user_id")));
            $this->data['nav'] = nav($this->users->getName($this->session->userdata("user_id")));
            $this->data['admin'] = admin($this->users->getName($this->session->userdata("user_id")));
            $this->data['fname'] =  $this->session->user_name;
            $this->data['sname'] =  $this->session->user_surname;
            $this->data['phone'] =  $this->session->user_phone;
            $this->data['email'] =  $this->session->user_email;



            if ($this->session->userdata("is_admin") == 1) {
                $this->load->view("admin/registration", $this->data);
            }
            elseif($this->session->userdata("is_admin") == 0) {
                $this->load->view("registration/list", $this->data);
            } else {
                $this->load->view("registration/registration", $this->data);
            }
        } else {
            redirect("login");
        }
    }


    private function init(){
        $this->data['top'] = top();
        $this->data['nav'] = nav('user');
        $this->data['bottom'] = bottom();
        $this->data['footer'] = footer();
    }



    private function lists($_xml) {
        if ($_xml = simplexml_load_string($_xml)) {
            if (is_object($_xml)) {

                $xml = new SimpleXMLElement("<registration></registration>");
                $num = 0;
                foreach ($this->registration->get($_xml->start,$_xml->limit,$_xml->search) as $row) {
                    $name = $row->user_name . $row->user_surname;
                    $phone = $row->user_phone ;
                    $email = $row->user_email ;
                    $date = date('d-m-Y',strtotime($row->date));
                    $data = $xml->addChild("data");
                    $data->addChild("extension", "");
                    $data->addChild("name", $name);
                    $data->addChild("phone", $phone);
                    $data->addChild("email", $email);
                    $data->addChild("date", $date);
//                    $data->addChild("cert_no", $row->cer_number);
//                    $data->addChild("exam_no", $row->cer_reg_no);
                    $data->addChild("reg_name",$row->reg_name);
                    $data->addChild("region", $row->region_name);
                    $data->addChild("exam",$row->exam_name);
                    $data->addChild("action", $this->actions($row->id));
                    $num++;
                }

                $count = $this->registration->count($_xml->search);

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

}