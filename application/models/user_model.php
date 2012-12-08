<?php

class User_model extends CI_Model
{
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * Get one or many users
     * 
     * @param integer|void $user_id 
     * 
     * @return array
     */
    public function get($user_id = null)
    {
        if ($user_id == null) {
           $query = $this->db->get('user');
        } else {
           $query = $this->db->get_where('user', ['user_id' => $user_id]);
        }
        
        return $query->result();
    }
    
    public function login($email, $password)
    {
        $query = $this->db->get_where('user', [
            'email' => $email,
            'password' => sha1($password . HASH_KEY)
        ]);
        
        return $query->result();
    }
    
    public function create($email, $password)
    {
        // Make sure the email is not taken
        $this->db->where('email', $email);
        $duplicate = $this->db->count_all_results('user');
        
        if ($duplicate > 0) {
            return false;
        }

        // Create the record
        $result = $this->db->insert('user', [
            'email' => $email,
            'password' => sha1($password . HASH_KEY)
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