

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-wrap align-items-left justify-content-start justify-content-md-between p-3 px-5 mb-4 border-bottom mx-auto" style="background-color: #e3f2fd;">
        <!-- Navbar content -->
        <a class="d-flex align-items-left col-md-3 mb-2 mt-3 mb-md-0 text-dark text-decoration-none">
                <h3>Library</h3>
            </a>

            <ul class="nav nav-tabs col-12 col-md-auto mb-2 justify-content-start mb-md-0">
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
        <header class="">
           
        </header>

        <div class="px-3 text-center mx-auto" style="width:70%">
            <h1>Main Page</h1>
            <p class="lead"></p>
        </div>
    </div>
    <br>
</body>
</html>