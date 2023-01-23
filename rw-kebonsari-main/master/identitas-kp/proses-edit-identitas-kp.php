<?php
session_start();
include "../../koneksi.php";
if (isset($_POST['edit'])) {

    $id_identitas_kp = $_POST['id_identitas_kp'];
    $id_warga = $_POST['id_warga'];
    $nama_kp = $_POST['nama_kp'];
    $alamat_kp = $_POST['alamat_kp'];
    $email_kp = $_POST['email_kp'];
    $no_tlp_kp = $_POST['no_tlp_kp'];

    // Upload Logo
    $logo_kp = $_FILES['logo_kp']['name'];
    $logo_kp_old = $_POST['logo_kp_old'];
    $destination_logo = '../../image_identitas/'.$logo_kp;
    $extension_logo = pathinfo($logo_kp, PATHINFO_EXTENSION);
    $logo = $_FILES['logo_kp']['tmp_name'];
    $size_logo = $_FILES['logo_kp']['size'];

    // Upload Foto
    $foto_kp = $_FILES['foto_kp']['name'];
    $foto_kp_old = $_POST['foto_kp_old'];
    $destination_foto = '../../image_identitas/'.$foto_kp;
    $extension_foto = pathinfo($foto_kp, PATHINFO_EXTENSION);
    $foto = $_FILES['foto_kp']['tmp_name'];
    $size_foto = $_FILES['foto_kp']['size'];

    if ($logo_kp!="") {
        if (!in_array($extension_logo,['png','PNG','jpg','JPG','jpeg','JPG'])) {
            echo "<script>alert('Format Logo Harus png, jpg dan jpeg'); window.location.href='edit-data-identitas-kp.php?id_identitas_kp=$id_identitas_kp'</script>";
        } elseif ($size_logo > 1000000) {
            echo "<script>alert('Ukuran Logo Maksimal 1 GB');  window.location.href='edit-data-identitas-kp.php?id_identitas_kp=$id_identitas_kp'</script>";
        } else {
            move_uploaded_file($logo,$destination_logo);
            $query_edit = mysqli_query($db, "UPDATE identitas_kp SET id_warga='$id_warga', nama_kp='$nama_kp', alamat_kp='$alamat_kp', email_kp='$email_kp', no_tlp_kp='$no_tlp_kp', logo_kp='$logo_kp' WHERE id_identitas_kp=$id_identitas_kp");
            if ($query_edit) {
                echo "<script>alert('Edit Identitas Berhasil'); window.location.href='index.php'</script>";
            }
        }
    } elseif ($foto_kp!="") {
        if (!in_array($extension_foto,['png','PNG','jpg','JPG','jpeg','JPG'])) {
            echo "<script>alert('Format Foto Harus png, jpg dan jpeg'); window.location.href='edit-data-identitas-kp.php?id_identitas_kp=$id_identitas_kp'</script>";
        } elseif ($size_foto > 1000000) {
            echo "<script>alert('Ukuran Foto Maksimal 1 GB');  window.location.href='edit-data-identitas-kp.php?id_identitas_kp=$id_identitas_kp'</script>";
        } else {
            move_uploaded_file($foto,$destination_foto);
            $query_edit = mysqli_query($db, "UPDATE identitas_kp SET id_warga='$id_warga', nama_kp='$nama_kp', alamat_kp='$alamat_kp', email_kp='$email_kp', no_tlp_kp='$no_tlp_kp', foto_kp='$foto_kp' WHERE id_identitas_kp=$id_identitas_kp");
            if ($query_edit) {
                echo "<script>alert('Edit Identitas Berhasil'); window.location.href='index.php'</script>";
            }
        }
    } else {
        $logo_kp = $logo_kp_old;
        $foto_kp = $foto_kp_old;
        $query_edit = mysqli_query($db, "UPDATE identitas_kp SET id_warga='$id_warga', nama_kp='$nama_kp', alamat_kp='$alamat_kp', email_kp='$email_kp', no_tlp_kp='$no_tlp_kp', foto_kp='$foto_kp' logo_kp='$logo_kp' WHERE id_identitas_kp=$id_identitas_kp");
        if ($query_edit) {
            echo "<script>alert('Edit Identitas Berhasil'); window.location.href='index.php'</script>";
        }
    }



}
?>