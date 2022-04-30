<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function index()
    {
        $my_id = $this->session->userdata("id_penyewa");
        $data_penyewa =  $this->main_model->find_data(['id'=>$my_id],'penyewa')->row_array();
        $data['data_penyewa'] = $data_penyewa;
        $this->load->view('template/header');
        $this->load->view('profil',$data);
        $this->load->view('template/footer');
    }

    public function update(){
        $my_id = $this->session->userdata("id_penyewa");
        $config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['overwrite']            = true;
		$config['max_size']             = 1024; // 1MB
		$config['max_width']            = 1080;
		$config['max_height']           = 1080;
        $config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

        if(! $this->upload->do_upload('file_ktp')) {
            $this->session->set_flashdata('msg','swal("Eror!", "'. $this->upload->display_errors().'", "error");');
        } else {
            $upload_data = array('uploads' =>$this->upload->data());
            $file_name = $upload_data['uploads']['file_name'];
        }


        $post = $this->input->post();

 
        if ($_FILES['file_ktp']["size"]!=0) {
            $data = array(
                "nama"=>$post['nama'],
                "email"=>$post['email'],
                "nik"=>$post['nik'],
                "tanggal_lahir"=>$post['tanggal_lahir'],
                "foto_ktp"=>$file_name
            );
        }else{
            $data = array(
                "nama"=>$post['nama'],
                "email"=>$post['email'],
                "nik"=>$post['nik'],
                "tanggal_lahir"=>$post['tanggal_lahir'],
            );
    

        }
        
        $this->main_model->update_data(['id'=>$my_id],$data,"penyewa");
        $this->session->set_flashdata('msg','swal("Sukses!", "Data Berhasil Diupdate", "success");');
        redirect('profil','refresh');
        
        
    }

}

/* End of file Profil.php */



?>