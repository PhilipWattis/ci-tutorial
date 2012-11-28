<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $this->load->view('admin');
    }
    
    public function create_user()
    {
        $this->load->model('user_model');
        $this->user_model->create($email, $password);
    }
    
    public function delete_user()
    {
        $this->load->model('user_model');
        $this->user_model->delete($user_id);
    }

}
