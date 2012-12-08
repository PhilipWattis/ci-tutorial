<?php

class User_model extends CI_Model
{
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function create($email, $password)
    {
        $result = $this->db->insert('user', [
            'email' => $email,
            'password' => $password
        ]);
        return $result;
    }
    
    public function delete($user_id)
    {
        $this->db->where(['user_id' => $user_id]);
        $result = $this->db->delete('user');
        return $result;
    }
    
}