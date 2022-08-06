<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrakan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
           redirect('login','refresh');
         }
    }

    public function index()
    {
        $data['data_kontrakan'] = $this->main_model->get_data("kontrakan")->result();
        $this->load->view('template/header');
        $this->load->view('list_kontrakan', $data);
        $this->load->view('template/footer');
    }

    public function nonaktifkan($id){
        $this->main_model->update_data(['id'=>$id],['status'=>'Tidak Aktif'],'user');
        $this->session->set_flashdata("msg",'swal("Sukses!", "Status berhasil diupdate!", "success");');
        
        redirect('user','refresh');
        
    }

    public function aktifkan($id){
        $this->main_model->update_data(['id'=>$id],['status'=>'Aktif'],'user');
        $this->session->set_flashdata("msg",'swal("Sukses!", "Status berhasil diupdate!", "success");');
        
        redirect('user','refresh');
    }

    public function tambah(){
        $this->load->view('template/header');
        $this->load->view('tambah_kontrakan');
        $this->load->view('template/footer');
    }

    public function aksi_tambah(){
        $post = $this->input->post();
        $cek = $this->db->get_where('kontrakan', array('no_unit' => $post['no_unit']))->num_rows(); 
        if ($cek > 0) {
            $this->session->set_flashdata("msg",'swal("Gagal!", "Unit sudah didaftarkan!", "error");');
            redirect('kontrakan','refresh');
        }

        $data = array(
            'no_unit'=>$post['no_unit'],
            'tipe'=>$post['tipe'],
        );

        $this->main_model->insert_data($data,'kontrakan');
        $this->session->set_flashdata("msg",'swal("Sukses!", "Kontrakan berhasil ditambah!", "success");');
        redirect('kontrakan','refresh');
        
    }

    public function edit($id){
        $data['kontrakan'] = $this->main_model->find_data(['id'=>$id],'kontrakan')->row_array();
        $this->load->view('template/header');
        $this->load->view('edit_kontrakan',$data);
        $this->load->view('template/footer');
    }

    public function update(){
        $post = $this->input->post();
            $data = array(
                'no_unit'=>$post['no_unit'],
                'tipe'=>$post['tipe']
            );

        $this->main_model->update_data(['id'=>$post['id']],$data,'kontrakan');
        $this->session->set_flashdata("msg",'swal("Sukses!", "data kontrakan berhasil diubah!", "success");');
        redirect('kontrakan','refresh');
        
    }

    public function delete($id){
        $this->main_model->delete_data(['id'=>$id],'kontrakan');
        $this->session->set_flashdata("msg",'Kontrakan("Sukses!", "User berhasil dihapus!", "success");');
        redirect('kontrakan','refresh');
    }

}

/* End of file User.php */


?>