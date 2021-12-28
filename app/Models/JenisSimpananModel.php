<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisSimpananModel extends Model
{
  protected $table = 'jenis_simpanan';

  protected $returnType = 'object';

  protected $allowedFields = [
    'nama_simpanan', 'besaran_simpanan'
  ];

  protected $validationRules = [
    'nama_simpanan' => 'required',
    'besaran_simpanan' => 'required',
  ];

  public function getJenisSimpanan($id)
  {
    return $this->getWhere(['id' => $id])->getRow();
  }
}
