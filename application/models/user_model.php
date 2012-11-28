<?php

class User_model extends CI_Model
{
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function create($email, $password)
    {
        $this->db->insert('user', [
            'email' => $email,
            'password' => $password
        ]);
    }
    
    public function delete($user_id)
    {
        $this->db->where(['user_id' => $user_id]);
        $this->db->delete('user');
    }
    
}