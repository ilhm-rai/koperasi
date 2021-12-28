<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class User extends BaseController
{
  protected $userModel;
  protected $db;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->db = \Config\Database::connect();
  }

  public function index()
  {

    $data = [
      'title' => 'Daftar User',
      'users' => $this->userModel->getUser(),
    ];

    return view('admin/user/index', $data);
  }

  public function detail($id = 0)
  {

    $data = [
      'title' => 'User Detail',
      'user' => $this->userModel->getUser($id),
    ];

    if (empty($data['user'])) {
      return redirect()->to('/user');
    }

    return view('admin/user/detail', $data);
  }

  public function create()
  {
    $roles = $this->db->table('auth_groups');
    $roles = $roles->get();

    $data = [
      'title' => 'Create New User',
      'roles' => $roles->getResult(),
    ];

    return view('admin/user/create', $data);
  }

  public function save()
  {
    if (!$this->validate([
      'fullname' => 'max_length[255]',
      'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
      'email'    => 'required|valid_email|is_unique[users.email]',
      'password'     => 'required|strong_password',
      'pass_confirm' => 'required|matches[password]'
    ])) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->userModel
      ->withGroup($this->request->getPost('role'))
      ->insert([
        'fullname' => $this->request->getPost('fullname'),
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'password_hash' => Password::hash($this->request->getPost('password')),
        'active' => 1
      ]);

    return redirect()->to('admin/user')->with('message', 'User baru berhasil ditambahkan.');
  }

  public function delete($id)
  {
    $this->userModel->delete($id);
    return redirect()->back()->with('message', 'User berhasil dihapus.');
  }

  public function edit($id = 0)
  {
    $roles = $this->db->table('auth_groups');
    $roles = $roles->get();
    $data = [
      'title' => 'User Edit',
      'user' => $this->userModel->getUser($id),
      'roles' => $roles->getResult(),
    ];

    if (empty($data['user'])) {
      return redirect()->back();
    }

    return view('admin/user/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate([
      'fullname' => 'max_length[255]',
      'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username,id,' . $id . ']',
      'email'    => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
    ])) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->userModel
      ->clearGroup()
      ->withGroup($this->request->getPost('role'))
      ->save([
        'id' => $id,
        'fullname' => $this->request->getPost('fullname'),
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
      ]);

    return redirect()->to('admin/user')->with('message', 'Data user berhasil diperbaharui.');
  }
}
