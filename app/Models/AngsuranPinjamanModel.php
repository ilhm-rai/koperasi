<?php

namespace App\Models;

use CodeIgniter\Model;

class AngsuranPinjamanModel extends Model
{
  protected $table = 'angsuran';

  protected $returnType = 'object';

  protected $allowedFields = [
    'no_angsuran', 'pinjaman_id', 'angsuran_ke', 'jml_angsuran', 'tgl_pembayaran',
  ];

  protected $validationRules = [
    'pinjaman_id' => 'required',
    'angsuran_ke' => 'required',
    'jml_angsuran' => 'required',
    'tgl_pembayaran' => 'required',
  ];

  public function getAngsuran($anggotaid = false)
  {
    $query = $this->select('angsuran.id as angsuranid, no_angsuran, no_pinjaman, no_anggota, nama, angsuran_ke, jml_angsuran, tgl_pembayaran')
      ->join('pinjaman', 'pinjaman.id = angsuran.pinjaman_id')
      ->join('anggota', 'anggota.id = pinjaman.anggota_id');

    if ($anggotaid == null) {
      $query = $this->get();
      return $query->getResult();
    } else {
      $query = $this->where('angsuran.anggota_id', $anggotaid);
      $query = $this->get();
      return $query->getRow();
    }
  }

  public function getAngsuranKe($pinjamanid)
  {
    $query = $this->selectMax('angsuran_ke', 'max')
      ->where('pinjaman_id', $pinjamanid)
      ->get();
    $row = $query->getRow();

    $new = $row->max + 1;

    return $new;
  }

  public function getAngsuranById($angsuranid)
  {
    $query = $this->select('angsuran.id as angsuranid, pinjaman_id, no_angsuran, no_pinjaman, no_anggota, nama, angsuran_ke, jml_angsuran, sisa_angsuran, tgl_pembayaran')
      ->join('pinjaman', 'pinjaman.id = angsuran.pinjaman_id')
      ->join('anggota', 'anggota.id = pinjaman.anggota_id');
    $query = $this->where('angsuran.id', $angsuranid);
    $query = $this->get();
    return $query->getRow();
  }
}
