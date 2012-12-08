<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        redirect(site_url('admin/login'));
    }
    
    public function dashboard()
    {
        $this->load->model('user_model');
        $users = $this->user_model->get();
        
        $this->load->view('admin/inc/header');
        $this->load->view('admin/admin', ['users' => $users]);
        $this->load->view('admin/inc/footer');
    }
    
    public function login($submit = null)
    {
        if ($submit == null) {
            $this->load->view('admin/inc/header');
            $this->load->view('admin/login');
            $this->load->view('admin/inc/footer');
            return true;
        }
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->load->model('user_model');
        $result = $this->user_model->login('admin', $email, $password);
        
        if ($result == true) {
            echo 'We do login data here!';
        }
    }
    
    public function create_user()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->load->model('user_model');
        $this->user_model->create($email, $password);
    }
    
    public function delete_user($user_id)
    {
        $this->load->model('user_model');
        echo $this->user_model->delete($user_id);
        
    }

}
