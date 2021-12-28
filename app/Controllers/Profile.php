<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class Profile extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Profile',
      'user' => $this->userModel->getUser(user_id()),
    ];

    return view('profile/index', $data);
  }
}
