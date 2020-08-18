<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='perkuliahan')
{
    $sql="INSERT INTO perkuliahan (nim, nip, kode_mk, nilai)
        VALUES
		('$_POST[nim]',
        '$_POST[nip]',
        '$_POST[kode_mk]',   
		'$_POST[nilai]')";   
		 
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Nilai baru dengan nim :('.$_POST[nim].') Tersimpan")
            window.location.href="index1.php?page=perkuliahan";
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
        mysqli_query($config,"UPDATE per SET
                nip='$_POST[nip]', 
                kode_mk='$_POST[kode_mk]',
                nilai='$_POST[nilai]' WHERE nim='$_POST[nim]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Nilai dengan nim :('.$_POST[nim].') Di Update")
            window.location.href="index1.php?page=matakuliah";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM perkuliahan where nim='$_GET[nim]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Nilai dengan NIM :('.$_GET[nim].') Di Terhapus")
            window.location.href="index1.php?page=matakuliah";
            </script>';
    }
//End Aksi Matkul
?>
