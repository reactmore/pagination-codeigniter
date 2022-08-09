<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $allowedFields = ['username', 'address'];

    public function __construct()
    {
        parent::__construct();
        $this->builder = $this->db->table('users');
    }

    //users filter
    public function filterUsers()
    {
    }

    //get paginated users count
    public function getUsersCount()
    {
        $this->filterUsers();
        return $this->builder->countAllResults();
    }

    //get paginated users
    public function getUsersPaginated($perPage, $offset)
    {
        $this->filterUsers();
        return $this->builder->orderBy('created_at DESC')->limit($perPage, $offset)->get()->getResult();
    }

    
}
