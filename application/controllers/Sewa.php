<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

    public function index()
    {
        $data_penyewa = $this->main_model->get_data('penyewa')->result();

        $data['data_penyewa'] = $data_penyewa;

        $this->load->view('template/header');
        $this->load->view('list_penyewa', $data);
        $this->load->view('template/footer');
    }

    public function detail($id){
        $data_penyewa =  $this->main_model->find_data(['id'=>$id],'penyewa')->row_array();

        $data_tagihan = $this->main_model->find_data(['id_penyewa'=>$data_penyewa['id']],'tagihan')->result();
        $data['data_penyewa'] = $data_penyewa;
        $data['data_tagihan'] = $data_tagihan;
        

        $this->load->view('template/header');
        $this->load->view('detail_penyewa', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $this->load->view('template/header');
        $this->load->view('tambah_penyewa');
        $this->load->view('template/footer');
    }

    public function aksi_tambah(){
        $post = $this->input->post();
        $password = $this->passwordRandom();
        $data_penyewa = array(
            "nama"=>$post['nama'],
            "no_unit"=>$post['no_unit'],
            "no_telpon"=>$post['no_telpon'],
            "email"=>$post['email'],
            "nik"=>$post['nik'],
            "tanggal_lahir"=>$post['tanggal_lahir'],
            "tipe_sewa" => $post['tipe_sewa'],
            "harga_sewa" => $post['harga_sewa'],
            "password" => $password
        );
        
        $this->main_model->insert_data($data_penyewa,'penyewa');
        $id_penyewa = $this->db->insert_id();

        $data_tagihan = array(
            "id_penyewa" => $id_penyewa,
            "tanggal_tagihan" => date("Y-m-d"),
            "total_tagihan" => $post['harga_sewa'],
            "tipe_tagihan"=>$post['tipe_sewa']
        );

        $data_user = array(
            'email'=>$post['email'],
            'nama'=>$post['nama'],
            "password" => md5($password),
            "role"=>"penyewa",
            "id_penyewa"=>$id_penyewa
        );

        $this->main_model->insert_data($data_tagihan,'tagihan');
        $this->main_model->insert_data($data_user,'user');

        
        redirect('sewa/selesai/'.$id_penyewa,'refresh');
        
    }
    public function selesai($id){
        $data['penyewa'] = $this->main_model->find_data(['id'=>$id],"penyewa")->row_array();
        $this->load->view('template/header');
        $this->load->view('regis_selesai',$data);
        $this->load->view('template/footer');
    }

    private function passwordRandom($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

/* End of file Sewa.php */



?>