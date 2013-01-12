<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    // ------------------------------------------------------------------------

    public function __construct() 
    {
        parent::__construct();
        
        // Get the last segment in the URI, and only redirect out of the
        // protected area if it is NOT the login form
        
        $section = $this->uri->segment_array();
        array_shift($section);
        
        if ($section[0] == 'login' || $section[0] == 'login' && $section[1] == 'submit') {
            
        }
        
        $section = end($this->uri->segment_array());
        if ($section != 'login' && $section != 'submit' 
                && $this->session->userdata('user_id') == false
                && $this->session->userdata('is_admin') == false
                ) {
            redirect(site_url('admin/login'));
        }
    }
    
    // ------------------------------------------------------------------------
    
    public function index()
    {
        redirect(site_url('admin/login'));
    }
    
    // ------------------------------------------------------------------------
    
    public function dashboard()
    {
        $this->load->model('user_model');
        $users = $this->user_model->get();
        
        $this->load->view('admin/inc/header');
        $this->load->view('admin/admin', ['users' => $users]);
        $this->load->view('admin/inc/footer');
    }
    
    // ------------------------------------------------------------------------
    
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
            $this->session->set_userdata('user_id', 1);
            $this->session->set_userdata('is_admin', 1);
            redirect(site_url('admin/dashboard'));
        } else {
            redirect(site_url('admin/login'));
        }
    }
    
    // ------------------------------------------------------------------------
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }
    
    // ------------------------------------------------------------------------
    
    public function create_user()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->load->model('user_model');
        $this->user_model->create($email, $password);
    }
    
    // ------------------------------------------------------------------------
    
    public function delete_user($user_id)
    {
        $this->load->model('user_model');
        echo $this->user_model->delete($user_id);
        
    }
    
    // ------------------------------------------------------------------------

}
