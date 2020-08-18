<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='matakuliah')
{
    $sql="INSERT INTO matakuliah (kode_mk, nama_mk, sks_mk)
        VALUES
		('$_POST[kode_mk]',
        '$_POST[nama_mk]',  
		'$_POST[sks_mk]')";   
		 
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Mata Kuliah baru dengan nama :('.$_POST[nama_mk].') Tersimpan")
            window.location.href="index1.php?page=matakuliah";
            </script>'; 
    }
    else{
        echo "Error : ".$sql.". ".mysqli_error($config);
    }
     //header('location:http://localhost/');
}

else 
    if($g=='edit')
    {
        mysqli_query($config,"UPDATE matakuliah SET
                nama_mk='$_POST[nama_mk]', 
                sks_mk='$_POST[sks_mk]' WHERE kode_mk='$_POST[kode_mk]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Mata Kuliah dengan nama :('.$_POST[nama_mk].') Di Update")
            window.location.href="index1.php?page=matakuliah";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM matakuliah where kode_mk='$_GET[kode_mk]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Mata Kuliah dengan Kode MK :('.$_GET[kode_mk].') Di Terhapus")
            window.location.href="index1.php?page=matakuliah";
            </script>';
    }
//End Aksi Matkul
?>
