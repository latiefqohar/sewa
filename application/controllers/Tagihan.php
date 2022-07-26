<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
           redirect('login','refresh');
         }
    }

    public function index()
    {
        $tagihan = $this->db->query("SELECT penyewa.nama,penyewa.no_unit,tagihan.* from tagihan join penyewa on tagihan.id_penyewa = penyewa.id")->result();
        $data['data_tagihan'] = $tagihan;

        $this->load->view('template/header');
        $this->load->view('list_tagihan', $data);
        $this->load->view('template/footer');
    }

    public function menunggu_verifikasi()
    {
        $tagihan = $this->db->query("SELECT penyewa.nama,penyewa.no_unit,tagihan.* from tagihan join penyewa on tagihan.id_penyewa = penyewa.id where bukti_pembayaran != '' and status_bayar='Belum Lunas'")->result();
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

    public function generate_tagihan(){
        $penyewa = $this->db->get("penyewa")->result();
        foreach ($penyewa as $p ) {
            if ($p->tipe_sewa == "Bulanan") {
                $data_tagihan = array(
                    "id_penyewa" => $p->id,
                    "tanggal_tagihan"=> date("Y-m-d"),
                    "total_tagihan"=>$p->harga_sewa,
                    "tipe_tagihan"=>$p->tipe_sewa
                );


                $this->main_model->insert_data($data_tagihan,'tagihan');
            }else{
                if (date("m")=="01") {
                    $data_tagihan = array(
                        "id_penyewa" => $p->id,
                        "tanggal_tagihan"=> date("Y-m-d"),
                        "total_tagihan"=>$p->harga_sewa,
                        "tipe_tagihan"=>$p->tipe_sewa
                    );
    
                    $this->main_model->insert_data($data_tagihan,'tagihan');
                }
            }
           
        }
        $this->session->set_flashdata("msg",'swal("Sukses!", "Tagihan sukses dibuat!", "success");');
        
        redirect('tagihan','refresh');
        
    }


}

/* End of file Tagihan.php */


?>