<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/template');
        $this->load->view('template/footer');   
    }

}

/* End of file Test.php */


?>