<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
           redirect('login','refresh');
         }
    }
    

    public function index()
    {
        if ($this->session->userdata('role')=="admin") {
           $this->admin();
        }else{
            $this->penyewa();
        }
    }

    public function admin(){
        $data['tagihan'] = $this->db->query("SELECT sum(total_tagihan) as tagihan FROM tagihan where status_bayar = 'Belum Lunas'")->row_array();
        $data['penyewa'] = $this->main_model->get_data('penyewa')->num_rows();
        $data['keluhan'] = $this->main_model->find_data(['status_keluhan !='=>'Selesai'],'keluhan')->num_rows();
        $tagihan = $this->db->query("SELECT penyewa.nama,tagihan.* from tagihan join penyewa on tagihan.id_penyewa = penyewa.id")->result();
        $data['data_tagihan'] = $tagihan;

        $this->load->view('template/header');
        $this->load->view('dashboard_admin',$data);
        $this->load->view('template/footer');  
    }

    public function penyewa(){
        $my_id = $this->session->userdata("id_penyewa");
        $data['tagihan'] = $this->db->query("SELECT sum(total_tagihan) as tagihan FROM tagihan where status_bayar = 'Belum Lunas' and id_penyewa=".$my_id)->row_array();
        $data['keluhan'] = $this->main_model->find_data(['status_keluhan !='=>'Selesai','id_penyewa'=>$my_id],'keluhan')->num_rows();
        $tagihan = $this->db->query("SELECT penyewa.nama,tagihan.* from tagihan join penyewa on tagihan.id_penyewa = penyewa.id where penyewa.id=".$my_id )->result();
        $data['data_tagihan'] = $tagihan;

        $data['penyewa'] = $this->main_model->find_data(['id'=>$my_id], "penyewa")->row_array();
        $this->load->view('template/header');
        $this->load->view('dashboard_penyewa',$data);
        $this->load->view('template/footer'); 
    }

}

/* End of file Dashboard.php */



?>