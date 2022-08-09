<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Home extends BaseController
{
    public function index()
    {
        $usersModel = new UsersModel();

        $numRows = $usersModel->getUsersCount();
        $pager = paginate(20, $numRows);
        $data['users'] = $usersModel->getUsersPaginated(20, $pager->offset);

        return view('welcome_message', $data);
    }
}
