<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
           redirect('login','refresh');
         }
    }

    public function index()
    {
        $data['data_user'] = $this->main_model->get_data("user")->result();
        $this->load->view('template/header');
        $this->load->view('list_user', $data);
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
        $this->load->view('tambah_user');
        $this->load->view('template/footer');
    }

    public function aksi_tambah(){
        $post = $this->input->post();
        $data = array(
            'email'=>$post['email'],
            'password' => md5($post['password']),
            'nama'=>$post['nama'],
            'role'=>'admin',
            'status'=>'Aktif'
        );

        $this->main_model->insert_data($data,'user');
        $this->session->set_flashdata("msg",'swal("Sukses!", "User berhasil ditambah!", "success");');
        redirect('user','refresh');
        
    }

    public function edit($id){
        $data['user'] = $this->main_model->find_data(['id'=>$id],'user')->row_array();
        $this->load->view('template/header');
        $this->load->view('edit_user',$data);
        $this->load->view('template/footer');
    }

    public function update(){
        $post = $this->input->post();
        if ($post['password']!=  "") {
            $data = array(
                'email'=>$post['email'],
                'nama'=>$post['nama'],
                'password'=>md5($post['password'])
            );
        }else{
            $data = array(
                'email'=>$post['email'],
                'nama'=>$post['nama']
            );
        }

        $this->main_model->update_data(['id'=>$post['id']],$data,'user');
        $this->session->set_flashdata("msg",'swal("Sukses!", "User berhasil diubah!", "success");');
        redirect('user','refresh');
        
    }

    public function delete($id){
        $this->main_model->delete_data(['id'=>$id],'user');
        $this->session->set_flashdata("msg",'swal("Sukses!", "User berhasil dihapus!", "success");');
        redirect('user','refresh');
    }

}

/* End of file User.php */


?>