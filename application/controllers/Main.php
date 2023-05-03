<?php
/**
 * Created by PhpStorm.
 * User: Elitebook
 * Date: 4/8/2021
 * Time: 3:46 PM
 * developer: Nickson Maro
 */

class Main extends CI_Controller{
    public function __construct(){
        parent :: __construct();
       // $this->load->model('Model_Users', 'users');
        $this->init();
    }

    public function index(){
        $this->load->view("main",$this->data);
    }

    private function init(){
        $this->data['top'] = top();
        $this->data['mnu'] = mnu('user');
        $this->data['nav'] = nav();
        $this->data['bottom'] = bottom();
        $this->data['footer'] = footer();
    }

}