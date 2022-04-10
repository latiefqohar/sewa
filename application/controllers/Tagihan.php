<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

    public function index()
    {
        $tagihan = $this->db->query("SELECT penyewa.nama,tagihan.* from tagihan join penyewa on tagihan.id_penyewa = penyewa.id")->result();
        $data['data_tagihan'] = $tagihan;

        $this->load->view('template/header');
        $this->load->view('list_tagihan', $data);
        $this->load->view('template/footer');
    }

    public function menunggu_verifikasi()
    {
        $tagihan = $this->db->query("SELECT penyewa.nama,tagihan.* from tagihan join penyewa on tagihan.id_penyewa = penyewa.id where bukti_pembayaran != '' and status_bayar='Belum Lunas'")->result();
        $data['data_tagihan'] = $tagihan;

        $this->load->view('template/header');
        $this->load->view('list_tagihan', $data);
        $this->load->view('template/footer');
    }

    public function detail($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $status = $this->input->post("status");
           $this->main_model->update_data(['id'=>$id],['status_bayar'=>$status],'tagihan');
           $this->session->set_flashdata("msg",'swal("Sukses!", "Pembayaran berhasil diupdate!", "success");');
        }
        $tagihan = $this->main_model->find_data(['id'=>$id],'tagihan')->row_array();
        $data['tagihan'] = $tagihan;
        $this->load->view('template/header');
        $this->load->view('detail_tagihan', $data);
        $this->load->view('template/footer');
    }

}

/* End of file Tagihan.php */


?>