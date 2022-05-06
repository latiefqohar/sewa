<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Keluhan_saya extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
           redirect('login','refresh');
         }
    }

    public function index()
    {
        $my_id = $this->session->userdata("id_penyewa");
        $keluhan = $this->db->query("SELECT penyewa.nama,keluhan.* from keluhan join penyewa on keluhan.id_penyewa = penyewa.id where id_penyewa=".$my_id)->result();
        $data['data_keluhan'] = $keluhan;

        $this->load->view('template/header');
        $this->load->view('list_keluhan_saya', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $post = $this->input->post();
        $data = array(
            "id_penyewa" => $this->session->userdata("id_penyewa"),
            "keluhan"=>$post['keluhan'],
            "tanggal"=>date("Y-m-d H:i:s"),
            "status_keluhan"=>"Belum Selesai"
        );
        $this->main_model->insert_data($data,'keluhan');
        $this->session->set_flashdata("msg",'swal("Sukses!", "Keluhan Berhasil Ditambah!", "success");');
        
        redirect('keluhan_saya','refresh');
        
    }

    public function delete($id){
        $this->main_model->delete_data(['id'=>$id],"keluhan");
        $this->session->set_flashdata("msg",'swal("Sukses!", "Keluhan Berhasil Dihapus!", "success");');
        redirect('keluhan_saya','refresh');
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