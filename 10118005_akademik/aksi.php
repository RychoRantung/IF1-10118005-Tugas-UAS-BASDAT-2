<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='mahasiswa')
{
    $sql="INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, jk_mahasiswa)
        VALUES
		('$_POST[nim]',
        '$_POST[nama_mhs]',
		'$_POST[tgl_lahir]',
         '$_POST[alamat]',   
		 '$_POST[jk_mahasiswa]')";   
		 
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("mahasiswa baru dengan nama :('.$_POST[nama_mhs].') Tersimpan")
            window.location.href="index1.php?page=mahasiswa";
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
        mysqli_query($config,"UPDATE mahasiswa SET
                nama_mhs='$_POST[nama_mhs]', tgl_lahir='$_POST[tgl_lahir]',
                alamat='$_POST[alamat]', jk_mahasiswa='$_POST[jk_mahasiswa]' WHERE nim='$_POST[nim]'");
         echo '<script LANGUAGE="JavaScript">
            alert("mahasiswa dengan nama :('.$_POST[nama_mhs].') Di Update")
            window.location.href="index1.php?page=mahasiswa";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM mahasiswa where nim='$_GET[nim]'");
         echo '<script LANGUAGE="JavaScript">
            alert("mahasiswa dengan Id :('.$_GET[nim].') Di Terhapus")
            window.location.href="index1.php?page=mahasiswa";
            </script>';
    }
//End Aksi mahasiswa
?>
