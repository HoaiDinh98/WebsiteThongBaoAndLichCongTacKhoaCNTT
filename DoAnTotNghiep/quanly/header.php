
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <link href="css/style.css" rel="stylesheet" media="all"/>
            <!-- <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>  -->

     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
    <style></style>
    <script>
        // JavaScript để xử lý sự kiện khi click vào header
        function toggleAccordion(id) {
            var item = document.getElementById(id);
            item.style.display = (item.style.display === 'block') ? 'none' : 'block';
        }

                                                // function shortenText(text, maxLength) {
                                                //     if (text.length > maxLength) {
                                                //         return text.substr(0, maxLength) + '...';
                                                //     }
                                                //     return text;
                                                // }

                                                // function expandText(element) {
                                                //     var span = element.parentNode;
                                                //     var fullText = span.getAttribute('data-full-text');
                                                //     span.innerHTML = fullText;
                                                // }
    </script>

<script>
    function shortenText(text, maxLength) {
        if (text.length > maxLength) {
            return text.substr(0, maxLength) + '...';
        }
        return text;
    }

    function toggleText(element) {
        var span = element.parentNode;
        var shortenedText = span.querySelector('.shortened');
        var fullText = span.getAttribute('data-full-text');

        if (shortenedText.textContent === fullText) {
            shortenedText.textContent = shortenText(fullText, 20);
            element.textContent = 'Xem thêm';
        } else {
            shortenedText.textContent = fullText;
            element.textContent = 'Ẩn bớt';
        }
    }
</script>
<?php   
                            include_once '../classes/Thongbao.php';
                            include_once '../classes/Database.php';
                            $IDNguoiTao= $_SESSION['quanly_id'];
                            $db = new Database();
                            $pdo = $db->getConnect();
                            $sothongbao = Thongbao::DemThongBaoChuaXem($pdo,$IDNguoiTao);

                            ?>




    <title>Trường đại học Công Thương TPHCM</title>
</head>
<style>
</style>
<body style="overflow-x:hidden">
    
    <header>
    <div class="header" style=" width: 100%;top:0; position:fixed ;z-index:999">
        <div class="  text-center">
            <nav class="navbar navbar-expand-lg "  style=" height: 8vh;">
                <div class="container-fluid">
                    <div class="" style="margin-left:  -12px;">
                        <img src="image/logo_dashboard.png" style="width:100%;height: 8vh; padding-bottom: 1px;" />
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="danhsachthongbao.php">Thông báo</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="danhsachlichcongtacchung.php">Lịch công tác</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Hộp thư</a>
                            </li>
                        </ul>

                        <div class="header-login  justify-content-end align-items-center">
                            <ul class="navbar-nav ">
                                <li class="nav-item">
                                <ul class=" navbar-nav  ">
                                        <li class="nav-item dropdown">
                                        <a  style="text-decoration:none;font-size: 14px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-regular fa-bell"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li>                                                                                                                                                                                                                  
                                               <table  class="table  table-xl table-hover" >
                                                    <thead  style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                                        <tr>
                                                        <th scope="col" style="width: 100px;">Thông báo</th>
                                                        <th scope="col" style="width: 100px;">Hộp thư</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-bordered">
                                                        <tr> 
                                                            <td style="color: red;"><?php echo $sothongbao ?></td>
                                                            <td>0</td>
                                                            
                                                        </tr>                                           
                                                    </tbody>
                                                </table>                                                                                    
                                            </li>                                                                                                                         
                                            </ul>
                                        </li>
                                    </ul>

                                    
                                </li>
                                <li class="nav-item">
                                    <ul class=" navbar-nav  ">
                                        <li class="nav-item dropdown">
                                            <a style="text-decoration:none;font-size: 14px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $_SESSION['quanly']   ?>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a  style="text-decoration:none;color: black;" class="dropdown-item" href="">  <i class="fa-solid fa-circle-info"></i> Thay đổi thông tin</a></li>
                                                <li><a style="text-decoration:none;color: black;"class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                                            
                                            
                                            
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link"  style="color: #C9DFF5; margin-left:5px" href="#"> <i class="fa-solid fa-magnifying-glass"></i></a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link"  style="color: #C9DFF5; margin-left:5px" href="#"> <i class="fa-regular fa-circle-xmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>


        </div>
    </div> 
    </header>
    
   