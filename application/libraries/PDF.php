<?php

include_once APPPATH . "/third_party/tcpdf/tcpdf.php";

class PDF extends TCPDF {
    public function __construct() {
        parent::__construct();
    }
}
