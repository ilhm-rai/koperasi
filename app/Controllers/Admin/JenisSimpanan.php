<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JenisSimpananModel;

class JenisSimpanan extends BaseController
{
  protected $jenisSimpananModel;

  public function __construct()
  {
    $this->jenisSimpananModel = new JenisSimpananModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Jenis Simpanan',
      'jenissimpanan' => $this->jenisSimpananModel->findAll(),
    ];

    return view('admin/jenissimpanan/index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Jenis Simpanan',
    ];

    return view('admin/jenissimpanan/create', $data);
  }

  public function save()
  {
    if (!$this->validate($this->jenisSimpananModel->getValidationRules())) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->jenisSimpananModel->save([
      'nama_simpanan' => $this->request->getPost('nama_simpanan'),
      'besaran_simpanan' => $this->request->getPost('besaran_simpanan'),
    ]);

    return redirect()->to('admin/jenissimpanan')->with('message', 'Jenis simpanan baru berhasil ditambahkan.');
  }

  public function edit($id = 0)
  {
    $data = [
      'title' => 'Edit Jenis Simpanan',
      'jenissimpanan' => $this->jenisSimpananModel->getJenisSimpanan($id),
    ];

    if (empty($data['jenissimpanan'])) {
      return redirect()->back();
    }

    return view('admin/jenissimpanan/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->jenisSimpananModel->getValidationRules())) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->jenisSimpananModel->save([
      'id' => $id,
      'nama_simpanan' => $this->request->getPost('nama_simpanan'),
      'besaran_simpanan' => $this->request->getPost('besaran_simpanan'),
    ]);

    return redirect()->to('admin/jenissimpanan')->with('message', 'Data jenis simpanan berhasil diperbaharui.');
  }
}
