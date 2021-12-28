<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
  protected $table = 'anggota';

  protected $returnType = 'object';

  protected $allowedFields = [
    'no_anggota', 'nik', 'nama', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin',
    'alamat', 'agama', 'status_perkawinan', 'pekerjaan', 'saldo', 'foto_ktp', 'tgl_daftar'
  ];

  protected $validationRules = [
    'nik' => 'required',
    'nama' => 'required',
    'tempat_lahir' => 'required',
    'tgl_lahir' => 'required',
    'jenis_kelamin' => 'required',
    'alamat' => 'required',
    'agama' => 'required',
    'status_perkawinan' => 'required',
    'pekerjaan' => 'required',
    'foto_ktp' => 'uploaded[foto_ktp]|max_size[foto_ktp,5024]|is_image[foto_ktp]',
    'tgl_daftar' => 'required',
  ];

  public function getAnggota($id)
  {
    return $this->getWhere(['id' => $id])->getRow();
  }
}
