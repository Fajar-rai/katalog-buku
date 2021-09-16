<?php
    include "config/koneksi.php";
    include "library/controller.php";

    $go = new controller;
    $tabel = "login";
    @$password = base64_encode($_POST['pass']);//enkripsi pake metode base64
    @$field = array('username'=>$_POST['user'], 'password'=>$password);
    $redirect = "?menu=user";
    @$where = "id =  $_GET[id]";
    
    if(isset($_POST['simpan'])){
        $go->simpan($con, $tabel, $field, $redirect);
    }
    if(isset($_GET['hapus'])){
        $go->hapus($con, $tabel, $where, $redirect);
    }
    if(isset($_GET['edit'])){
        $edit = $go->edit($con, $tabel, $where);
    }
    if(isset($_POST['ubah'])){
        $go->ubah($con, $tabel, $field, $where, $redirect);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <title>User</title>
</head>
<body>
    <div class="container">
    <!doctype html>
<html lang="en">

<head>

    <style>
        body {
        background-image:url(resources/4.jpg);
        background-size: cover;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <title>Dashboard</title>
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-3 px-5 mb-4 border-bottom mx-auto" style="background-color: #e3f2fd;">
        <!-- Navbar content -->
        <a class="d-flex align-items-center col-md-3 mb-2 mt-3 mb-md-0 text-dark text-decoration-none">
                <h3>Library</h3>
            </a>

            <ul class="nav nav-tabs col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item"><a href="dashboard.php" class="nav-link px-2 link-dark ">Home</a></li>
                <li class="nav-item"><a href="input-buku.php" class="nav-link px-2 link-dark">Input Buku</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <div>
                    <a href="user.php" class="btn btn-primary" role="button" tab-index="-1">Ubah Password </a>
                    <a href="login.php" class="btn btn-danger" role="button" tab-index="-1">Logout </a>
                </div>
                
            </div>
    </nav>
        <br>

        <form method="post" class="mx-auto mt-5 pb-5">
            <div class="form-floating mb-3">
                <input type="text" name="user" value="<?php echo @$edit['username'] ?>" class="form-control" id="floatingUsername" placeholder="Username">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating">
                <input type="text" name="pass" value="<?php echo base64_decode(@$edit['password']) ?>" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto pt-5">
                <?php if(@$_GET['id']==""){ ?>
                            <!-- <input type="submit" name="simpan" value="SIMPAN"> -->
                            <button class="btn btn-outline-success col-12 mt-9" type="submit" name="simpan" value="SIMPAN">Simpan</button>
                        <?php }else{?>
                            <!-- <input type="submit" name="ubah" value="UBAH"> -->
                            <button class="btn btn-outline-success col-12 mt-9" type="submit" name="ubah" value="UBAH">Ubah</button>
                        <?php } ?>  
            </div>
        
            <table align="center" border="1" class="display mt-5" id="tabel-data" style="width:90%">
                <thead>   
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $data = $go->tampil($con, $tabel);
                        $no = 0;
                        if($data ==""){
                            echo "<tr><td colspan='5'>No Record</td></tr>";
                        }else{
                            foreach($data as $r){
                                $no++
                    ?>
                    <tr>    
                        <td><?php echo $no; ?></td>
                        <td><?php echo $r['username']; ?></td>
                        <td><?php echo $r['password']; ?></td>
                        <td><button type="button" class="btn btn-outline-danger"><a style="text-decoration:none; color:black" href="?menu=user&hapus&id=<?php echo $r['id'] ?>" onclick="return confirm('Hapus Data?')">Hapus</a></button></td>
                        <td><button type="button" class="btn btn-link"><a style="text-decoration:none; color:blue; hover" href="?menu=user&edit&id=<?php echo $r['id'] ?>">Edit</a></button></td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>              
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        } );
    </script>

</body>
</html>
