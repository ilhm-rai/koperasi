<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\JenisSimpananModel;
use App\Models\SimpananModel;

class Simpanan extends BaseController
{
  protected $simpananModel, $jenisSimpananModel, $anggotaModel;

  public function __construct()
  {
    $this->simpananModel = new SimpananModel();
    $this->jenisSimpananModel = new JenisSimpananModel();
    $this->anggotaModel = new AnggotaModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Simpanan',
      'simpanan' => $this->simpananModel->getSimpanan(),
    ];

    return view('simpanan/index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Simpanan',
      'jenissimpanan' => $this->jenisSimpananModel->findAll(),
      'anggota' => $this->anggotaModel->findAll(),
    ];

    return view('simpanan/create', $data);
  }

  public function save()
  {
    if (!$this->validate($this->simpananModel->getValidationRules())) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $anggotaid = $this->request->getPost('anggota_id');
    $jml_simpanan = $this->request->getPost('jml_simpanan');

    $this->simpananModel->save([
      'anggota_id' => $anggotaid,
      'jenis_simpanan_id' => $this->request->getPost('jenis_simpanan_id'),
      'tgl_simpanan' =>  date_default_format($this->request->getPost('tgl_simpanan')),
      'jml_simpanan' => $jml_simpanan,
    ]);

    $this->anggotaModel->set('saldo', 'saldo+' . $jml_simpanan, false);
    $this->anggotaModel->where('id', $anggotaid);
    $this->anggotaModel->update();

    return redirect()->to('simpanan')->with('message', 'Simpanan anggota berhasil ditambahkan.');
  }

  public function delete($simpananid)
  {
    $simpanan = $this->simpananModel->getSimpananById($simpananid);

    $this->anggotaModel->set('saldo', 'saldo-' . $simpanan->jml_simpanan, false);
    $this->anggotaModel->where('id', $simpanan->anggota_id);
    $this->anggotaModel->update();

    $this->simpananModel->delete($simpananid);

    return redirect()->to('simpanan')->with('message', 'Simpanan anggota berhasil dihapus.');
  }

  public function edit($simpananid)
  {
    $data = [
      'title' => 'Tambah Simpanan',
      'jenissimpanan' => $this->jenisSimpananModel->findAll(),
      'anggota' => $this->anggotaModel->findAll(),
      'simpanan' => $this->simpananModel->getSimpananById($simpananid),
    ];

    return view('simpanan/edit', $data);
  }

  public function update($simpananid)
  {
    if (!$this->validate($this->simpananModel->getValidationRules())) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $old = $this->simpananModel->getSimpananById($simpananid);

    $anggotaid = $this->request->getPost('anggota_id');
    $jml_simpanan = $this->request->getPost('jml_simpanan');

    $this->simpananModel->save([
      'id' => $simpananid,
      'anggota_id' => $anggotaid,
      'jenis_simpanan_id' => $this->request->getPost('jenis_simpanan_id'),
      'tgl_simpanan' =>  date_default_format($this->request->getPost('tgl_simpanan')),
      'jml_simpanan' => $jml_simpanan,
    ]);

    $this->anggotaModel->set('saldo', 'saldo-' . $old->jml_simpanan . '+' . $jml_simpanan, false);
    $this->anggotaModel->where('id', $anggotaid);
    $this->anggotaModel->update();

    return redirect()->to('simpanan')->with('message', 'Simpanan anggota berhasil diubah.');
  }
}
