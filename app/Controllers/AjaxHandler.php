<?php

namespace App\Controllers;

use App\Models\JenisSimpananModel;
use App\Models\AnggotaModel;
use App\Models\AngsuranPinjamanModel;
use App\Models\PinjamanModel;
use App\Models\SimpananModel;

class AjaxHandler extends BaseController
{
  protected $jenisSimpananModel, $anggotaModel, $simpananModel,
    $pinjamanModel, $angsuranPinjamanModel;

  public function __construct()
  {
    $this->jenisSimpananModel = new JenisSimpananModel();
    $this->anggotaModel = new AnggotaModel();
    $this->simpananModel = new SimpananModel();
    $this->pinjamanModel = new PinjamanModel();
    $this->angsuranPinjamanModel = new AngsuranPinjamanModel();
  }

  public function getJenisSimpanan()
  {
    $data = $this->jenisSimpananModel->getJenisSimpanan($this->request->getGet('id'));
    echo json_encode($data);
  }

  public function getAnggota()
  {
    $data = $this->anggotaModel->getAnggota($this->request->getGet('id'));
    echo json_encode($data);
  }

  public function getPinjaman()
  {
    $data = $this->pinjamanModel->getPinjaman($this->request->getGet('id'));
    echo json_encode($data);
  }

  public function getPinjamanById()
  {
    $data = $this->pinjamanModel->getPinjamanById($this->request->getGet('id'));
    echo json_encode($data);
  }

  public function getAngsuranKe()
  {
    $data = $this->angsuranPinjamanModel->getAngsuranKe($this->request->getGet('id'));
    echo json_encode($data);
  }
}
