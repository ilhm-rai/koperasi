<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\PinjamanModel;

class Pinjaman extends BaseController
{
  protected $pinjamanModel, $anggotaModel;

  public function __construct()
  {
    $this->pinjamanModel = new PinjamanModel();
    $this->anggotaModel = new AnggotaModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Daftar Pinjaman Anggota',
      'pinjaman' => $this->pinjamanModel->getPinjaman(),
    ];

    return view('pinjaman/index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Pinjaman Anggota',
      'anggota' => $this->anggotaModel->findAll(),
    ];

    return view('pinjaman/create', $data);
  }

  public function save()
  {

    $max_pinjaman = $this->request->getPost('max_pinjaman');

    if (!$this->validate([
      'anggota_id' => 'required',
      'bunga' => 'required',
      'lama_angsuran' => 'required',
      'jml_pinjaman' => 'required|less_than_equal_to[' . $max_pinjaman . ']',
      'total_angsuran' => 'required',
      'tgl_pinjaman' => 'required',
    ], [
      'jml_pinjaman' => [
        'less_than_equal_to' => 'Maaf. Jumlah pinjaman tidak boleh lebih dari maksimal peminjaman.'
      ]
    ])) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $total_angsuran = $this->request->getPost('total_angsuran');

    $this->pinjamanModel->save([
      'no_pinjaman' => uniqueid('no_pinjaman', 'pinjaman', 'PNJ'),
      'anggota_id' => $this->request->getPost('anggota_id'),
      'bunga' => $this->request->getPost('bunga') / 100,
      'lama_angsuran' => $this->request->getPost('lama_angsuran'),
      'jml_pinjaman' => $this->request->getPost('jml_pinjaman'),
      'total_angsuran' => $total_angsuran,
      'sisa_angsuran' => $total_angsuran,
      'tgl_pinjaman' => date_default_format($this->request->getPost('tgl_pinjaman')),
      'keterangan' => $this->request->getPost('keterangan'),
    ]);

    return redirect()->to('pinjaman')->with('message', 'Peminjaman anggota berhasil ditambahkan.');
  }
}
