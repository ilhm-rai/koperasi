<?php

namespace App\Controllers;

use App\Models\AngsuranPinjamanModel;
use App\Models\PinjamanModel;

class Angsuran extends BaseController
{
  protected $angsuranPinjamanModel, $pinjamanModel;

  public function __construct()
  {
    $this->angsuranPinjamanModel = new AngsuranPinjamanModel();
    $this->pinjamanModel = new PinjamanModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Daftar Angsuran Anggota',
      'angsuran' => $this->angsuranPinjamanModel->getAngsuran(),
    ];

    return view('angsuran/index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Angsuran Anggota',
      'pinjaman' => $this->pinjamanModel->getPinjaman(),
    ];

    return view('angsuran/create', $data);
  }

  public function save()
  {
    if (!$this->validate($this->angsuranPinjamanModel->getValidationRules())) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $pinjamanid = $this->request->getPost('pinjaman_id');
    $jml_angsuran = $this->request->getPost('jml_angsuran');

    $sisa = $this->request->getPost('sisa_angsuran') - $jml_angsuran;

    $this->angsuranPinjamanModel->save([
      'no_angsuran' => uniqueid('no_angsuran', 'angsuran', 'AP'),
      'pinjaman_id' => $pinjamanid,
      'angsuran_ke' => $this->request->getPost('angsuran_ke'),
      'jml_angsuran' => $jml_angsuran,
      'tgl_pembayaran' => date_default_format($this->request->getPost('tgl_pembayaran')),
    ]);

    if ($sisa == 0) {
      $this->pinjamanModel->set('status', '1');
    }
    $this->pinjamanModel->set('sisa_angsuran', $sisa);
    $this->pinjamanModel->where('id', $pinjamanid);
    $this->pinjamanModel->update();

    return redirect()->to('angsuran')->with('message', 'Angsuran anggota berhasil ditambahkan.');
  }

  public function delete($angsuranid)
  {
    $old = $this->angsuranPinjamanModel->getAngsuranById($angsuranid);

    $this->pinjamanModel->set('sisa_angsuran', 'sisa_angsuran+' . $old->jml_angsuran, false);
    $this->pinjamanModel->where('id', $old->pinjaman_id);
    $this->pinjamanModel->update();

    $this->angsuranPinjamanModel->delete($angsuranid);

    return redirect()->to('angsuran')->with('message', 'Angsuran anggota berhasil dihapus.');
  }

  public function edit($angsuranid)
  {
    $data = [
      'title' => 'Tambah Angsuran Anggota',
      'angsuran' => $this->angsuranPinjamanModel->getAngsuranById($angsuranid)
    ];

    return view('angsuran/edit', $data);
  }

  public function update($angsuranid)
  {
    $this->angsuranPinjamanModel->save([
      'id' => $angsuranid,
      'tgl_pembayaran' => $this->request->getPost('tgl_pembayaran'),
    ]);

    return redirect()->to('angsuran')->with('message', 'Angsuran anggota berhasil diubah.');
  }
}
