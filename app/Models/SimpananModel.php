<?php

namespace App\Models;

use CodeIgniter\Model;

class SimpananModel extends Model
{
  protected $table = 'simpanan';

  protected $returnType = 'object';

  protected $allowedFields = [
    'anggota_id', 'jenis_simpanan_id', 'jml_simpanan', 'tgl_simpanan',
  ];

  protected $validationRules = [
    'anggota_id' => 'required',
    'jenis_simpanan_id' => 'required',
    'jml_simpanan' => 'required',
    'tgl_simpanan' => 'required',
  ];

  public function getSimpanan($anggotaid = null)
  {
    $query = $this->select('simpanan.id as simpananid, no_anggota, nama, tgl_simpanan, nama_simpanan, jml_simpanan')
      ->join('anggota', 'anggota.id = simpanan.anggota_id')
      ->join('jenis_simpanan', 'jenis_simpanan.id = simpanan.jenis_simpanan_id');

    if ($anggotaid == null) {
      $query = $this->get();
      return $query->getResult();
    } else {
      $query = $this->where('simpanan.anggota_id', $anggotaid);
      $query = $this->get();
      return $query->getRow();
    }
  }

  public function getSimpananById($simpananid)
  {
    $query = $this->select('simpanan.id as simpananid, jenis_simpanan_id, anggota_id, no_anggota, nama, tgl_simpanan, nama_simpanan, jml_simpanan')
      ->join('anggota', 'anggota.id = simpanan.anggota_id')
      ->join('jenis_simpanan', 'jenis_simpanan.id = simpanan.jenis_simpanan_id');
    $query = $this->getWhere(['simpanan.id' => $simpananid]);
    return $query->getRow();
  }
}
