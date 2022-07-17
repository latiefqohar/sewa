<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('login');
    }

    public function aksi_login(){
        $post = $this->input->post();
        $data = array(
            "email"=>$post['email'],
            "password"=>md5($post['password']),
            "status"=>'Aktif'
        );

        $cek = $this->main_model->find_data($data,"user")->num_rows();
        if ($cek>0) {
           $data = $this->main_model->find_data($data,"user")->row_array();
           $this->session->set_userdata( $data );
           redirect('dashboard','refresh');
        }else {
            $this->session->set_flashdata("msg",'swal("Gagal!", "Username atau password salah!", "error");');
            redirect('login','refresh');
            
        }
        
    }

    public function logout(){
        
        $this->session->sess_destroy();

        redirect('login','refresh');
        
    }

    public function update_password(){
        $id = $this->session->userdata('id');
        $password = md5($this->input->post('password'));
        $this->main_model->update_data(['id'=>$id],["password"=>$password],"user");
        $this->session->set_flashdata("msg",'swal("Sukses!", "Password berhasil diubah!", "success");');
        redirect('dashboard','refresh');
    }

}

/* End of file Login.php */


?>