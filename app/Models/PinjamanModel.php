<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamanModel extends Model
{
  protected $table = 'pinjaman';

  protected $returnType = 'object';

  protected $allowedFields = [
    'no_pinjaman', 'anggota_id', 'bunga', 'lama_angsuran',
    'jml_pinjaman', 'total_angsuran', 'sisa_angsuran', 'tgl_pinjaman', 'status', 'keterangan',
  ];

  protected $validationRules = [];

  public function getPinjaman($anggotaid = null)
  {
    $query = $this->select('pinjaman.id as pinjamanid, no_pinjaman, no_anggota, nama, jml_pinjaman, total_angsuran, lama_angsuran, sisa_angsuran, tgl_pinjaman, status, keterangan')
      ->join('anggota', 'anggota.id = pinjaman.anggota_id')
      ->orderBy('tgl_pinjaman', 'DESC')
      ->orderBy('status', 0);

    if ($anggotaid == null) {
      $query = $this->get();
      return $query->getResult();
    } else {
      $query = $this->where('pinjaman.anggota_id', $anggotaid);
      $query = $this->get();
      return $query->getRow();
    }
  }

  public function getPinjamanById($id)
  {
    $query = $this->select('pinjaman.id as pinjamanid, no_pinjaman, no_anggota, nama, jml_pinjaman, total_angsuran, lama_angsuran, sisa_angsuran, tgl_pinjaman, status, keterangan')
      ->join('anggota', 'anggota.id = pinjaman.anggota_id')
      ->where('pinjaman.id', $id)
      ->get();
    return $query->getRow();
  }
}
