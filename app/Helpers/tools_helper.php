<?php

function date_default_format($date)
{
  return date_format(date_create($date), 'Y-m-d');
}

function uniqueid($field, $table, $uniqueCode)
{
  $uniqueCode .= date('dmy');
  $db = \Config\Database::connect();
  $builder = $db->table($table);
  $query = $builder->selectMax($field, 'max')->get();
  $row = $query->getRow();

  $last = (int) substr($row->max, strlen($uniqueCode));

  $new = $last + 1;
  $code = $uniqueCode . sprintf("%05s", $new);

  return $code;
}

function hide_char($str)
{
  return substr_replace($str, str_repeat('*', 6), (strlen($str) / 2) - 3, 6);
}

function strtorupiah($nominal)
{
  $rupiah = number_format($nominal, 2, ',', '.');
  return $rupiah;
}
