<?php
session_start();
include "../../koneksi.php";
if (!isset($_SESSION['username'])) {
    header("Location:../login.php");
}
$id_user = $_GET['id_user'];
$query = mysqli_query($db, "SELECT * FROM user WHERE id_user='$id_user'");
$result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RW 06 Kebonsari</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Custom Master CSS -->
    <link rel="stylesheet" href="../../assets/css/master.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <?php include('../../layouts/master/sidebar.php'); ?>
            </div>
            <div class="col py-3">
                <div class="title mb-4">
                    <h2 class="page-header">Data User</h2>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Data User</h5>
                    </div>
                    <form action="proses-edit-user.php?id_user=<?php echo $id_user; ?>" method="post">
                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                        <div class="card-body">
                            <div class="title-form-group mb-3">
                                <h6>A. Data Pribadi</h6>
                            </div>
                            <table class="table table-striped table-middle">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">Nama User</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td> <input type="text" name="nama_user" class="form-control" value="<?php echo $result['nama_user']; ?>" autocomplete="off" required> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Username</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="username_user" value="<?php echo $result['username_user']; ?>" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Password</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="password" class="form-control" name="password_user" value="<?php echo $result['password_user']; ?>" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="email" class="form-control" name="email_user" value="<?php echo $result['email_user']; ?>" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Role</th>
                                        <th class="align-middle">:</th>
                                        <td>
                                            <select name="role" class="form-select" required>
                                                <option value="">-- PILIH --</option>
                                                <option value="admin" <?php if($result['role'] == 'admin') : echo "selected"; endif;?>>Admin</option>
                                                <option value="rw" <?php if($result['role'] == 'rw') : echo "selected"; endif;?>>RW</option>
                                                <option value="rt" <?php if($result['role'] == 'rt') : echo "selected"; endif;?>>RT</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                            <button type="reset" name="reset" class="btn btn-sm btn-danger">
                                Batal
                            </button>
                            <button type="submit" name="edit" class="btn btn-sm btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>