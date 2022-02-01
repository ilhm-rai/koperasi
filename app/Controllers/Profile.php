<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
use phpDocumentor\Reflection\Types\This;

use function PHPUnit\Framework\fileExists;

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

  public function changeProfile($userid)
  {
    $old = $this->userModel->getUser($userid);
    $password = $this->request->getPost('password');
    $email = $this->request->getPost('email');
    $username = $this->request->getPost('username');
    $user_image = $this->request->getFile('user_image');

    if ($user_image->isFile()) {
      $this->userModel->setValidationRule('user_image', 'max_size[user_image,5024]|is_image[user_image]');
    }

    if (!$this->validate($this->userModel->getValidationRules(['except' => ['password_hash']]))) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
      'id' => $userid,
      'fullname' => $this->request->getPost('fullname'),
      'email' => $email,
      'username' => $username,
    ];

    if ($password)
      $data['password_hash'] = Password::hash($password);

    if ($user_image->isValid()) {
      $filename = $user_image->getRandomName();
      $data['user_image'] = $filename;
    }

    $this->userModel->save($data);

    if ($user_image->isValid()) {
      if ($old->user_image != 'default.png' && file_exists('assets/img/avatar/' . $old->user_image)) {
        unlink('assets/img/avatar/' . $old->user_image);
      }
      $user_image->move('assets/img/avatar/',  $filename);
    }

    if ($email != $old->email || $username != $old->username) {
      return redirect()->to('logout');
    }

    return redirect()->to('profile');
  }
}
