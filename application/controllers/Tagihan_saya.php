<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_saya extends CI_Controller {

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
        $tagihan = $this->db->query("SELECT penyewa.nama,tagihan.* from tagihan join penyewa on tagihan.id_penyewa = penyewa.id where id_penyewa=".$my_id)->result();
        $data['data_tagihan'] = $tagihan;

        $this->load->view('template/header');
        $this->load->view('list_tagihan_saya', $data);
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
         
            $my_id = $this->session->userdata("id_penyewa");
            $id_tagihan = $this->input->post('id_tagihan');
            

                // the user id contain dot, so we must remove it
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['overwrite']            = true;
            $config['max_size']             = 10024; // 1MB

            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
           
            if(! $this->upload->do_upload('file')) {
                $this->session->set_flashdata('msg','swal("Eror!", "'. $this->upload->display_errors().'", "error");');
            } else {
                $upload_data = array('uploads' =>$this->upload->data());
                $file_name = $upload_data['uploads']['file_name'];
                $this->main_model->update_data(['id'=>$id_tagihan],['bukti_pembayaran'=>$file_name],'tagihan');
                $this->session->set_flashdata("msg",'swal("Sukses!", "Pembayaran berhasil diupdate!", "success");');
            }
           
        }
        $tagihan = $this->main_model->find_data(['id'=>$id],'tagihan')->row_array();
        $data['tagihan'] = $tagihan;
        $this->load->view('template/header');
        $this->load->view('detail_tagihan_saya', $data);
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