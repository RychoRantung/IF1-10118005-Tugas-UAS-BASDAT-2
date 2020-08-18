<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];
 
if ( empty($get))
{
   include ('master/dashboard.php');	
}

elseif ($get=='mahasiswa')
{
  include ('master/mahasiswa.php');
}
elseif ($get=='dosen')
{
  include ('master/dosen.php');
}
elseif ($get=='matakuliah')
{
  include ('master/matakuliah.php');
}
elseif ($get=='perkuliahan')
{
  include ('master/perkuliahan.php');
}
?>