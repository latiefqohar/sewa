<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Keluhan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
           redirect('login','refresh');
         }
    }

    public function index()
    {
        $keluhan = $this->db->query("SELECT penyewa.nama,keluhan.* from keluhan join penyewa on keluhan.id_penyewa = penyewa.id")->result();
        $data['data_keluhan'] = $keluhan;

        $this->load->view('template/header');
        $this->load->view('list_keluhan', $data);
        $this->load->view('template/footer');
    }

    public function detail($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $this->input->post("status");
            $catatan = $this->input->post("catatan");
            $this->main_model->update_data(['id'=>$id],['status_keluhan'=>$status,'catatan'=>$catatan],'keluhan');
            $this->session->set_flashdata("msg",'swal("Sukses!", "Status berhasil diupdate!", "success");');
         }
         $keluhan = $this->main_model->find_data(['id'=>$id],'keluhan')->row_array();
         $data['keluhan'] = $keluhan;
         $this->load->view('template/header');
         $this->load->view('detail_keluhan', $data);
         $this->load->view('template/footer');
    }
}

/* End of file Keluhan.php */


?>