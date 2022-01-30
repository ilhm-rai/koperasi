<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
  protected $anggotaModel;
  protected $religions = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha'];
  protected $genders = ['Laki-laki', 'Perempuan'];

  public function __construct()
  {
    $this->anggotaModel = new AnggotaModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Daftar Anggota',
      'anggota' => $this->anggotaModel->findAll(),
    ];

    return view('admin/anggota/index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Anggota',
      'religions' => $this->religions,
      'genders' => $this->genders,
    ];

    return view('admin/anggota/create', $data);
  }

  public function save()
  {
    if (!$this->validate($this->anggotaModel->getValidationRules())) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $file = $this->request->getFile('foto_ktp');
    $fileName = $file->getRandomName();

    $simpan = $this->anggotaModel->save([
      'no_anggota' => uniqueid('no_anggota', 'anggota', 'AGT'),
      'nik' => $this->request->getPost('nik'),
      'nama' => $this->request->getPost('nama'),
      'tempat_lahir' => $this->request->getPost('tempat_lahir'),
      'tgl_lahir' => date_default_format($this->request->getPost('tgl_lahir')),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'alamat' => $this->request->getPost('alamat'),
      'agama' => $this->request->getPost('agama'),
      'status_perkawinan' => $this->request->getPost('status_perkawinan'),
      'pekerjaan' => $this->request->getPost('pekerjaan'),
      'foto_ktp' => $fileName,
      'tgl_daftar' => date_default_format($this->request->getPost('tgl_daftar')),
    ]);

    if ($simpan)
      $file->store('ktp', $fileName);

    return redirect()->to('admin/anggota')->with('message', 'Anggota baru berhasil ditambahkan.');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Edit Anggota',
      'anggota' => $this->anggotaModel->getAnggota($id),
      'religions' => $this->religions,
      'genders' => $this->genders,
    ];

    return view('admin/anggota/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->anggotaModel->getValidationRules(['except' => ['foto_ktp']]))) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $file = $this->request->getFile('foto_ktp');
    $old_ktp = $this->request->getPost('old_ktp');

    if ($file->isFile())
      $fileName = $file->getRandomName();
    else
      $fileName = $old_ktp;

    $this->anggotaModel->skipValidation(true)->save([
      'id' => $id,
      'no_anggota' => $this->request->getPost('no_anggota'),
      'nik' => $this->request->getPost('nik'),
      'nama' => $this->request->getPost('nama'),
      'tempat_lahir' => $this->request->getPost('tempat_lahir'),
      'tgl_lahir' => date_default_format($this->request->getPost('tgl_lahir')),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'alamat' => $this->request->getPost('alamat'),
      'agama' => $this->request->getPost('agama'),
      'status_perkawinan' => $this->request->getPost('status_perkawinan'),
      'pekerjaan' => $this->request->getPost('pekerjaan'),
      'foto_ktp' => $fileName,
      'tgl_daftar' => date_default_format($this->request->getPost('tgl_daftar')),
    ]);

    if ($file->isValid()) {
      $file->store('ktp', $fileName);
      unlink(WRITEPATH . 'uploads/ktp/' . $old_ktp);
    }

    return redirect()->to('admin/anggota')->with('message', 'Anggota baru berhasil diubah.');
  }
}
