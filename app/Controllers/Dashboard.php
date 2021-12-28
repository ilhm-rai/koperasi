<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\AngsuranPinjamanModel;
use App\Models\PinjamanModel;
use App\Models\SimpananModel;
use Myth\Auth\Models\UserModel;

class Dashboard extends BaseController
{
  public function index()
  {
    $user = new UserModel();
    $anggota = new AnggotaModel();
    $simpanan = new SimpananModel();
    $pinjaman = new PinjamanModel();
    $angsuran = new AngsuranPinjamanModel();

    $data = [
      'title' => 'Dashboard',
      'admin' => count($user->getUserByRole('admin')),
      'karyawan' => count($user->getUserByRole('karyawan')),
      'anggota' => count($anggota->findAll()),
      'simpanan' => $simpanan->selectSum('jml_simpanan')->get()->getRow(),
      'pinjaman' => $pinjaman->selectSum('jml_pinjaman')->get()->getRow(),
      'angsuran' => $pinjaman->select('SUM(total_angsuran) - SUM(jml_pinjaman) as angsuran')->get()->getRow(),
    ];

    return view('dashboard', $data);
  }
}
