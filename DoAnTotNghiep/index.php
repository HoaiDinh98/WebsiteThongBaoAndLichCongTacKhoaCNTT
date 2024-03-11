<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="https://thombrownevn.com/wp-content/uploads/2018/07/cropped-111-32x32.png" sizes="32x32">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
          rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css"
          rel="stylesheet" />
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
            <link rel="stylesheet" href="css/layout.css">
            <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
            <!-- <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>  -->

     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>

    <style>
    .form-control{
    border-radius: 15px;
    padding: 15px;
    }
    </style>
</head>
<?php
    require 'init.php';
    require 'classes/Auth.php';
    require 'classes/Database.php';
    $db = new Database();

    $pdo = $db->getConnect();
    $error='';

    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error  = Auth::login($pdo,$email,$password);
    }


?>
<body style="background-image: url('https://egov.hufi.edu.vn/Content/login2/img/bg.jpg');">


<div class="container text-center" style="margin-top:20vh;">
  <div class="row">
    <div class="col-7">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://egov.hufi.edu.vn/Content/login2/img/slide1.png" class="d-block w-200" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://egov.hufi.edu.vn/Content/login2/img/slide2.png" class="d-block w-200" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            </button>
        </div>
    </div>
    <div class="col-3">
        <div class=" p-4 text-center">
                        <div class="col-4">
                            <div class="background p-3">
                                <img src="https://egov.hufi.edu.vn/Content/AConfig/images/eoffice-login.png" alt="">
                            <h1 style="color: #095f90;line-height: 42px;font-size: 120%;">Đăng Nhập Hệ Thống</h1>
                            <form method="post" class="form">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name = "email" placeholder="Email..." required>                                                   
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name = "password" placeholder="Password..." required>
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                                </form>
                                <?php if($error): ?>
                                <div> 
                                    <p class="text-danger"><?=$error ?></p>
                                </div>
                             <?php endif; ?>
                        </div>
                     
                    </div>                 
        </div> 
    </div>
  </div>
</div>

</body>
</html>
  