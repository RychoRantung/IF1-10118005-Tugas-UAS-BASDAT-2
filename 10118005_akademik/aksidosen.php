<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='dosen')
{
    $sql="INSERT INTO dosen (nip, nama_dosen, jk_dosen)
        VALUES
		('$_POST[nip]',
        '$_POST[nama_dosen]',   
		'$_POST[jk_dosen]')";   
		 
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Dosen baru dengan nama :('.$_POST[nama_dosen].') Tersimpan")
            window.location.href="index1.php?page=dosen";
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
        mysqli_query($config,"UPDATE dosen SET
                nama_dosen='$_POST[nama_dosen]', 
                 jk_dosen='$_POST[jk_dosen]' WHERE nip='$_POST[nip]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Dosen dengan nama :('.$_POST[nama_dosen].') Di Update")
            window.location.href="index1.php?page=dosen";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM dosen where nip='$_GET[nip]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Dosen dengan NIP :('.$_GET[nip].') Di Terhapus")
            window.location.href="index1.php?page=dosen";
            </script>';
    }
//End Aksi Dosen
?>
