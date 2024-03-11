<?php 
include_once '../init.php' ;   
include_once '../classes/Lichcongtac.php';
include_once '../classes/Database.php';
include_once '../classes/Themnhomgv.php';
include_once '../classes/Nhomgianvien.php';
$db = new Database();
$pdo = $db->getConnect();
$IDNguoiTao= $_SESSION['quanly_id'];
$currentYear = date("Y");
$datand = Lichcongtac::getAllGianVien($pdo);
$IDNhomGVtam= "";
$perPage = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;
$limit = $perPage;
$currentYear = date("Y");
$currentDate = date("Y-m-d"); 
$weekNumber = date("W", strtotime($currentDate));
$startDate = date("Y-m-d", strtotime( $currentYear . "-W" . $weekNumber . "-1")); 
$endDate = date("Y-m-d", strtotime( $currentYear . "-W" . $weekNumber . "-7"));
$data = Lichcongtac::getPage($pdo, $limit, $offset);
$dataDay = Lichcongtac::TimkiemLichTheoTuan($pdo,$startDate,$endDate);

$totalLichcongtac = Lichcongtac::countAll($pdo);
$totalPages = ceil($totalLichcongtac / $perPage);
$pd = new Themnhom();

if (isset($_POST['ThemLich'])) {

    $Lichcongtac = new Lichcongtac();
    $nhom = $_POST['nhom'];
    $chutri = $_POST['chutri'];
    $ngaytao = $_POST['ngaytao'];
    $ngayhethan = $_POST['ngayhethan'];
    $giobatdau = $_POST['giobatdau'];
    $gioketthuc = $_POST['gioketthuc'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $diadiem = $_POST['diadiem'];
    $ghichu = $_POST['ghichu'];


    $LichcongtacBuild = $Lichcongtac->create($pdo,$IDNguoiTao,$nhom,$chutri,$ngaytao,$ngayhethan,$giobatdau,$gioketthuc,$tieude,$noidung,$diadiem,$ghichu);
    if ($LichcongtacBuild) {
        $idLichcongtaclast = $Lichcongtac->getLastInsertedId($pdo);
        foreach($datand as  $nguoidung ):
            $Lichcongtac->createNguoiDungVaoDsXem($pdo, $nguoidung['IDNguoiDung'],$idLichcongtaclast,2);
        endforeach ;
          
        header("Location: themlichcongtacchung.php");
    } else {
        echo 'Error creating product';
    }
}
    if (isset($_POST['ThemNguoidungGV'])) {
    
        $IDNhomGV = $_POST['IDNhomGV'];
        $GhiChu = $_POST['IDNguoiDung'];
        $insertProduct = $pd->insert_NhomGV_GV($IDNhomGV,$GhiChu);
        
    }
$cat = new Themnhom();

if (isset($_GET['idngv']) && $_GET['idnd']) {
$idngv = $_GET['idngv'];
$idnd = $_GET['idnd'];
$result =  $cat->del_Congdoan2($idnd,$idngv);

}
$nhomgv = new Nhomgianvien();
if (isset($_POST['ThemNhomGV'])) {
    $catName = $_POST['catName'];
    $GhiChu = $_POST['GhiChu'];
    $insertCat = $nhomgv->insert_Nhomgianvien($catName,$GhiChu);
    
}
if(isset($_GET['deletenhomgvid'])){
    $id = $_GET['deletenhomgvid']; 
    $delcat = $nhomgv->del_Nhomgianvien($id);
}




if (isset($_POST['search'])) {
    $selectedYear = $_POST['year'];
    $selectedWeek = $_POST['week'];
    $startDate = date("Y-m-d", strtotime($selectedYear . "-W" . $selectedWeek . "-1")); 
    $endDate = date("Y-m-d", strtotime($selectedYear . "-W" . $selectedWeek . "-7"));
    $dataDay = Lichcongtac::TimkiemLichTheoTuan($pdo, $startDate, $endDate);
}

?>



<?php include 'header.php' ;?>    
<?php include 'menuleft.php' ;?>    
<style>
#dt{text-indent: -500px;height:25px; width:200px;}
.div-chu-thich div div{
    float: right;
    width: 50px;
    height: 20px;
    background-color: #2cd9ff;
   

}
.bg-chu-thich{
    display: flex;
    float: left;
    margin-top: 5px;
    margin-right: 5px;
    
}
.pull-right{
    float: left;
    margin-left: 100px;
}
</style>

<div class="col-10">

            <div class=" text-left" style="margin-top:5vh;">
                    <div class=" " style="border: 1px solid black;margin-left: 5px;">
                        <div class="accordion-item"  style="background-color: white;border: none;">
                                <h2 class="accordion-header" id="panelsStayOpen-heading11" style="color:#C9DFF5;">
                                <button style="background-color: #0a558c;color:#C9DFF5;border-bottom: 1px solid white; padding-left: 0px;border-radius: 0px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse11" aria-expanded="false" aria-controls="panelsStayOpen-collapse11">
                                    <span style="font-size: 30px;">Thêm người chủ trì </span> 
                                </button>
                                </h2>
                                <div  id="panelsStayOpen-collapse11" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading11">
                                    <div class="accordion-body" >
                                <div class="grid_10" style="margin-left: 50px;">
                                        <div class="box round first grid">
                                            <div class="block">   
                                                          
                                            <form action="themchutri.php" method="POST" enctype="multipart/form-data">
                                                <table class="form" style="width: 80%;">
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Tên người chủ trì</label>
                                                        </td>
                                                        <td>
                                                        <input style="width: 60%" type="text" name="TenNguoiChuTri" placeholder="Họ và tên người chủ trì..." class="medium" />
                                                        </td>
                                                    </tr>  
                                                    <tr class="form-roww"> 
                                                        <td>
                                                            <label  style="font-weight: bold;">Ghi chú</label>
                                                        </td>
                                                        <td>
                                                        <textarea style="width: 60%" name="ghichu" class="tinymce"></textarea>
                                                        </td>
                                                    </tr>
                                                
                                                

                                                    <tr class="form-roww">
                                                        <td></td>
                                                        <td>
                                                            <input type="submit" name="submit" Value="Lưu" />
                                                        </td>
                                                    </tr>
                                                </table>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                                    </div>
                                </div>
                        </div>



                    </div>
                    <div class=" " style="border: 1px solid black;margin-left: 5px;">
                        <div class="accordion-item"  style="background-color: white;border: none;">
                                <h2 class="accordion-header" id="panelsStayOpen-heading21" style="color:#C9DFF5;">
                                <button style="background-color: #0a558c;color:#C9DFF5;border-bottom: 1px solid white; padding-left: 0px;border-radius: 0px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse21" aria-expanded="false" aria-controls="panelsStayOpen-collapse21">
                                    <span style="font-size: 30px;">Thêm nhóm giảng viên  </span> 
                                </button>
                                </h2>
                                <div  id="panelsStayOpen-collapse21" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading21">
                                    <div class="accordion-body" >
                                <div class="grid_10" style="margin-left: 50px;">
                                    <div ></div>

                                        <div class=" text-left" style="margin-top:5vh;">
                                                <div class=" " style="height: 700px;margin-top: 70px">
                                                    <div class="box round first grid" style = "margin-top: 100px">
                                                        <h2>Thêm nhóm giảng viên</h2>
                                                        <div class="block">               
                                                                <form name="ThemNhomGV" method="post" enctype="multipart/form-data">
                                                                    <table class="form" style ="width: 80%;">					
                                                                        <tr>
                                                                            <td>
                                                                                <input style="width: 50%" type="text" name="catName" placeholder="Hãy nhập tên nhóm..." class="medium" />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input style="width: 50%" type="text" name="GhiChu" placeholder="Ghi chú ( nếu có )..." class="medium" />
                                                                            </td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>
                                                                                <input type="submit" name="ThemNhomGV" Value="Xác Nhận" />
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </form>
                                                        </div>
                                                        <div class="box round first grid">
                                                            <h2>Danh sách nhóm của giảng viên</h2>
                                                            <div class="block">      
                                                                    <table class="table  table-xl ">
                                                                    <thead style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                                                        <tr>
                                                                            <th scope="col">Số thứ tự</th>
                                                                            <th scope="col">Tên Nhóm</th>
                                                                            <th scope="col">Ghi Chú</th>
                                                                            <th scope="col">Chức Năng</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="table-bordered">
                                                                    <?php
                                                                       $show_cate = $nhomgv->show_Nhomgianvien();
                                                                       if($show_cate){
                                                                           $i = 0;
                                                                           while($result = $show_cate->fetch_assoc()){
                                                                               $i++;
                                                                            
                                                                    ?>
                                                                        <tr class="odd gradeX">
                                                                            <td><?php echo $i; ?></td>
                                                                            <td><?php echo $result['TenNhom'] ?></td>
                                                                            <td><?php echo $result['GhiChu'] ?></td>
                                                                            <td><a href="nhomgianvienedit.php?IDNhomGV=<?php echo $result['IDNhomGV'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="?deletenhomgvid=<?php echo $result['IDNhomGV'] ?>"   >Xóa </a></td>
                                                                            
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                        </div>



                                    </div>
                                
                                
                                
                     
                                </div>
                                    </div>
                                </div>
                    </div>



                    <div class=" " style="border: 1px solid black;margin-left: 5px;">
                        <div class="accordion-item"  style="background-color: white;border: none;">
                                <h2 class="accordion-header" id="panelsStayOpen-heading20" style="color:#C9DFF5;">
                                <button style="background-color: #0a558c;color:#C9DFF5;border-bottom: 1px solid white; padding-left: 0px;border-radius: 0px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse20" aria-expanded="false" aria-controls="panelsStayOpen-collapse20">
                                    <span style="font-size: 30px;">Thêm giảng viên vào nhóm </span> 
                                </button>
                                </h2>
                                <div  id="panelsStayOpen-collapse20" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading20">
                                    <div class="accordion-body" >
                                <div class="grid_10" style="margin-left: 50px;">
                                    <div ></div>

                                        <div class=" text-left" style="margin-top:5vh;">
                                                <div class=" " style="height: 700px;margin-top: 70px">
                                                <div class="box round first grid" style = "margin-top: 100px">
                                        <h2>Thêm Giảng Viên Vào Nhóm</h2>
                                        <div class="block">    
                                        <?php

                                            if(isset($insertProduct)){
                                                echo $insertProduct;
                                            }

                                        ?>             
                                        <form   name="ThemNguoidungGV" method="post" enctype="multipart/form-data">
                                            <table class="form">
                                                <tr>
                                                    <td>
                                                        <label  style="font-weight: bold;">Giảng Viên</label>
                                                    </td>
                                                    <td>
                                                        <select id="select" name="IDNguoiDung" style ="width:250px">
                                                            <option>--------Chọn Giảng Viên-------</option>
                                                            <?php
                                                            $brand = new Themnhom();
                                                            $brandlist = $pd->show_GV();
                                                            if($brandlist){
                                                                while($result = $brandlist->fetch_assoc()){
                                                            ?>

                                                            <option value="<?php echo $result['IDNguoiDung'] ?>"><?php echo $result['HoTen'] ?></option>

                                                            <?php
                                                                }
                                                            }
                                                        ?>    
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label  style="font-weight: bold;">Nhóm Giảng Viên</label>
                                                    </td>
                                                    <td>
                                                        <select id="select" name="IDNhomGV"  style ="width:250px">
                                                            <option>--------Chọn Nhóm Giảng Viên-------</option>
                                                            <?php
                                                            $brand = new Themnhom();
                                                            $brandlist = $pd->show_Nhomgianvien();

                                                            if($brandlist){
                                                                while($result = $brandlist->fetch_assoc()){
                                                            ?>

                                                            <option value="<?php echo $result['IDNhomGV'] ?>"><?php echo $result['TenNhom'] ?></option>

                                                            <?php
                                                                }
                                                            }
                                                        ?>
                                                        
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="submit" name="ThemNguoidungGV" Value="Lưu" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                        </div>
                                        <div class="box round first grid" >
                                            <h2>Danh sách nhóm của giảng viên</h2>
                                            <div class="block" style="overflow: auto;border-bottom: none;height: 300px;">    
                                            <?php

                                            if(isset($delcat)){
                                                echo $delcat;
                                            }

                                            ?>    
                                                <table class="table  table-xl ">
                                                <thead style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                                    <tr>
                                                        <th scope="col">Số thứ tự</th>
                                                        <th scope="col">Tên Nhóm</th>
                                                        <th scope="col">Tên Giảng Viên</th>
                                                        <th scope="col">Chức Năng</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-bordered">
                                                <?php
                                                    $show_cate = $cat->show_Congdoan();
                                                    if($show_cate){
                                                        $i = 0;
                                                        while($result = $show_cate->fetch_assoc()){
                                                            $i++;
                                                        
                                                ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $result['TenNhom'] ?></td>
                                                        <td><?php echo $result['HoTen'] ?></td>
                                                        <!-- <?php $_SESSION['IDNhomGV'] = $result['idngv']?>
                                                        <td><?php echo $$result['idngv'] ?> </td> -->
                                                        <td><a href="themnhomgianvienedit.php?IDNhomGV=<?php echo $result['IDNhomGV'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="themlichcongtacchung.php?idngv=<?php echo$result['idngv']?>&idnd=<?php echo $result['idnd']?>"   >Xóa </a></td>
                                                           
                                                    </tr>
                                                    <?php
                                                }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        </div>

                                                </div>
                                        </div>



                                    </div>
                                
                                
                                
                     
                                </div>
                                    </div>
                                </div>
                    </div>



                    
                    <div class=" " style="border: 1px solid black;margin-left: 5px">
                        <div class="accordion-item"  style="background-color: white;border: none;">
                                <h2 class="accordion-header" id="panelsStayOpen-heading12" style="color:#C9DFF5;">
                                <button style="background-color: #0a558c;color:#C9DFF5;border-bottom: 1px solid white; padding-left: 0px;border-radius: 0px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse12" aria-expanded="false" aria-controls="panelsStayOpen-collapse12">
                                    <span style="font-size: 30px;">Thêm lịch công tác mới </span> 
                                </button>
                                </h2>
                                <div  id="panelsStayOpen-collapse12" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading12">
                                    <div class="accordion-body" >
                                    <div class="page-toolbar" style="display: flex;">
                                    <h1 class="page-title pull-left"></h1>
                                </div>
                            <div class="grid_10" style="margin-left: 50px;">
                                        <div class="box round first grid">
                                            <div class="block">   
                                                          
                                            <form  method="POST" name="ThemLich" enctype="multipart/form-data">
                                                <table class="form" style="width: 100%;">
                                                    <tr class="form-roww">
                                                        <td style="width: 350px;" >
                                                            <label style="font-weight: bold;">Nhóm GV nhận thông báo</label>
                                                        </td>
                                                        <td>
                                                            <select id="select" name="nhom" style="width: 60%">
                                                                <option>--------Chọn nhóm--------</option>
                                                                        <?php
                                                                            $Cats = Lichcongtac::getAllNhomNhan($pdo);
                                                                            foreach ($Cats as $Cat) {
                                                                            echo "<option value='{$Cat['IDNhomGV']}'>{$Cat['TenNhom']} </option>";

                                                                             }
                                                                            ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr class="form-roww">
                                                        <td style="width: 350px;" >
                                                            <label style="font-weight: bold;">Người chủ trì</label>
                                                        </td>
                                                        <td>
                                                            <select id="select" name="chutri" style="width: 60%">
                                                                <option>--------Chọn người chủ trì--------</option>
                                                                        <?php
                                                                            $Cats = Lichcongtac::getAllChuTri($pdo);
                                                                            foreach ($Cats as $Cat) {
                                                                            echo "<option value='{$Cat['IDChuTri']}'>{$Cat['TenNguoiChuTri']} </option>";

                                                                             }
                                                                            ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Ngày tạo</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 30%" type="date" name="ngaytao" placeholder="Ngày tạo..." class="medium" />
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Ngày hết hạn</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 30%"  type="date" name="ngayhethan" placeholder="Ngày hết hạn..." class="medium" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Giờ bắt đầu</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 30%"  type="time" name="giobatdau" placeholder="Giờ bắt đầu..." class="medium" />
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Giờ kết thúc</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 30%"  type="time" name="gioketthuc" placeholder="Giờ kết thúc..." class="medium" />
                                                        </td>
                                                    </tr>                           
                                                    <tr class="form-roww">
                                                        <td>
                                                            <label  style="font-weight: bold;">Tiêu đề</label>
                                                        </td>
                                                        <td>
                                                        <textarea style="width: 60%" name="tieude" class="tinymce"></textarea>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="form-roww">
                                                        <td style="vertical-align: top; padding-top: 9px;">
                                                            <label  style="font-weight: bold;">Nội dung</label>
                                                        </td>
                                                        <td>
                                                            <textarea style="width: 60%" name="noidung" class="tinymce"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr class="form-roww"> 
                                                        <td>
                                                            <label  style="font-weight: bold;">Địa điểm</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 60%" type="text" name="diadiem" placeholder="Địa điểm..." class="medium" />
                                                        </td>
                                                    </tr>
                                                    <tr class="form-roww"> 
                                                        <td>
                                                            <label  style="font-weight: bold;">Ghi chú</label>
                                                        </td>
                                                        <td>
                                                        <textarea style="width: 60%" name="ghichu" class="tinymce"></textarea>
                                                        </td>
                                                    </tr>
                                                
                                                

                                                    <tr class="form-roww">
                                                        <td></td>
                                                        <td>
                                                            <input type="submit" name="ThemLich" Value="Lưu" />
                                                        </td>
                                                    </tr>
                                                </table>
                                                </form>
                                            </div>
                                        </div>
                            </div>
                                    </div>
                                </div>
                        </div>



                    </div>

                    <div class=" " style="border: 1px solid black;margin-left: 5px">
                        <div class="accordion-item"  style="background-color: white;border: none;">
                        
                        
                                <h2 class="accordion-header" id="panelsStayOpen-heading13" style="color:#C9DFF5;">
                                <button style="background-color: #0a558c;color:#C9DFF5;border-bottom: 1px solid white; padding-left: 0px;border-radius: 0px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse13" aria-expanded="false" aria-controls="panelsStayOpen-collapse13">
                                    <span style="font-size: 30px;">Danh sách lịch công tác chung </span> 
                                </button>
                                </h2>
                                <div class="d-flex gap-2 justify-content-center" >
                                <form name="from-search" method="POST" class="d-flex gap-2 justify-content-center" >
                                        <select class="form-control" name="year" id="yearSelect">
                                            <?php
                                            $startYear = date("Y") - 5; 
                                            $endYear = date("Y") + 5; 
                                            for ($year = $startYear; $year <= $endYear; $year++) {
                                                $selectedYear = ($year == $currentYear) ? "selected" : "";
                                                echo '<option value="' . $year . '" ' . $selectedYear . '>' . $year . '</option>';
                                            }
                                            ?>
                                        </select>
                                        
                                        <select class="form-control" name="week" id="weekSelect" value='<?=$weekNumber?>'>
                                            <?php
                                            $weekCount = date("W", mktime(0, 0, 0, 12, 31, $currentYear)); 
                                            for ($week = 1; $week <= $weekCount; $week++) {
                                                $startDate = date("Y-m-d", strtotime($currentYear . "W" . str_pad($week, 2, "0", STR_PAD_LEFT))); 
                                                $endDate = date("Y-m-d", strtotime($startDate . " +6 days")); 
                                                $selected = ($week == $weekNumber) ? "selected" : "";
                                                echo '<option value="' . $week. '" ' . $selected . '>Tuần thứ ' . $week . ' (Từ ' . $startDate . ' đến ' . $endDate . ')</option>';
                                            }
                                            ?>
                                        </select>
                                        
                                        <button class="btn btn-primary" type="submit" name='search'>Search</button>
                                    </form>

                                </div>

                                <div  id="panelsStayOpen-collapse13" class="accordion-collapse collapse show " aria-labelledby="panelsStayOpen-heading13">
                                    <div class="accordion-body" >
                                        <div style="border: 1px solid black; overflow: auto;border-bottom: none;height: 900px;" >
                                            <div >
                                                <table  class="table  table-xl " >
                                                <thead  style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                                    <tr>
                                                    <th scope="col">Ngày</th>
                                                    <th scope="col">Thời gian</th>
                                                    <th scope="col" style="width: 260px;">Tiêu đề</th>
                                                    <th scope="col">Chủ trì</th>
                                                    <th scope="col">Địa điểm</th>
                                                    <th scope="col">Thành Phần tham dự</th>
                                                    <th scope="col" style="width: 150px;">Ghi chú</th>
                                                    <th scope="col">Đã xem</th>
                                                    <th scope="col" style="width: 50px;">Chưa xem</th>
                                                    <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-bordered">
                                                <?php 
                                                $previousDay = null;
                                                foreach($dataDay as  $lichcongtac1 ):?> 
                                                    <tr>
                                                    <?php $count23= Lichcongtac::getDayDistritCount($pdo,$lichcongtac1['NgayTao']) ?>
                                                    
                                                    <td rowspan="<?=$count23?>" style="text-align: center; vertical-align: middle; display: table-cell;"> 
                                                        <?php 
                                                        $englishDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                                        $timestamp = strtotime($lichcongtac1['NgayTao']); 
                                                        $dayOfWeek = date("l", $timestamp);
                                                        
                                                        $vietnameseDays = ['Monday' => 'Thứ Hai', 'Tuesday' => 'Thứ Ba', 'Wednesday' => 'Thứ Tư', 'Thursday' => 'Thứ Năm', 'Friday' => 'Thứ Sáu', 'Saturday' => 'Thứ Bảy', 'Sunday' => 'Chủ Nhật'];
                                                        $dayOfWeekVietnamese = $vietnameseDays[$dayOfWeek];
                                                        ?>
                                                        <?=$dayOfWeekVietnamese?> <?=$lichcongtac1['NgayTao']?>
                                                    </td>                                                                                                                                       
                                                    <?php $data = Lichcongtac::getDay($pdo, $lichcongtac1['NgayTao']); ?>
                                                        <?php foreach($data as  $item ):?>    
                                                            <?php $songuoichuaxem = Lichcongtac::DemNguoiDungChuaXem($pdo,$item['IDLichCongTac']) ?>
                                                            <?php $songuoichuaxem2 = Lichcongtac::DemNguoiDungChuaXem2($pdo,$item['IDNhomNguoiNhan'],$item['IDLichCongTac']) ?>
                                                            <?php $songuoidaxem = Lichcongtac::DemNguoiDungDaXem($pdo,$item['IDLichCongTac']) ?>
                                                            <?php $songuoidaxem2 = Lichcongtac::DemNguoiDungDaXem2($pdo,$item['IDNhomNguoiNhan'],$item['IDLichCongTac']) ?>
                                                            <?php $idnguoidung = $_SESSION['quanly_id'] ?>
                                                            <?php $kiemtra = Lichcongtac::KiemTraNguoiDungDaXem($pdo,$idnguoidung,$item['IDLichCongTac'])?>
                                                            <?php $kiemtrachuaxem = Lichcongtac::KiemTraNguoiDungChuaXem($pdo,$idnguoidung,$item['IDLichCongTac'])?>  
                                                            <?php $kiemtrachuaxem2 = Lichcongtac::KiemTraNguoiDungChuaXem2($pdo,$idnguoidung,$item['IDNhomNguoiNhan'],$item['IDLichCongTac'])?> 
                                                            <td><?= date('H:i', strtotime($item['GioBatDau'])) ?> - <?= date('H:i', strtotime($item['GioKetThuc'])) ?> </td>
                                                            <td><a style="color:black" href="chitietlichcongtac.php?IDLichCongTac=<?php echo $item['IDLichCongTac'] ?>"><?=$item['TieuDe'] ?></a> </td>      
                                                            <td><?=$item['TenNguoiChuTri'] ?></td> 
                                                            <td ><?=$item['DiaDiem'] ?></td> 
                                                            <?php $DemNhomNguoiNhan = Lichcongtac::DemNhomNguoiNhan($pdo,$item['IDNhomNguoiNhan']); ?>
                                                            <?php if($DemNhomNguoiNhan==0): ?>
                                                                <td ><?= $item['tn'] ?></td> 
                                                            <?php else:?>    
                                                                <td>
                                                            
                                                            
                                                            <?php $dataNhomNguoiNhan = Lichcongtac::getNhomNguoiNhan($pdo,$item['IDNhomNguoiNhan']);
                                                            
                                                                $first = true; 
                                                                foreach ($dataNhomNguoiNhan as $itemnn): ?>
                                                                    <?php if (!$first): ?>
                                                                        <span>, </span>
                                                                    <?php endif; ?>
                                                                    <span><?= $itemnn['HoTen'] ?></span>
                                                                    <?php $first = false; ?>
                                                                <?php endforeach; ?>
                                                                .
                                                                </td>
                                                            <?php endif; ?>
                                                            <td ><?=$item['gc'] ?></td> 
                                                            <td>[<a  href="danhsachdaxemlichcongtac.php?IDLichCongTac=<?php echo $item['IDLichCongTac']?>&IDNhomNguoiNhan=<?php echo $item['IDNhomNguoiNhan']?>" style="color: black;"> <?php echo $songuoidaxem2 ?></a>] </td>
                                                                    <?php if ($kiemtrachuaxem2):?>
                                                                    <td >[<a href="danhsachchuaxemlichcongtac.php?IDLichCongTac=<?php echo $item['IDLichCongTac']?>&IDNhomNguoiNhan=<?php echo $item['IDNhomNguoiNhan']?>" style="color: red;"> <?php echo $songuoichuaxem2 ?></a>] </td>
                                                                    <?php else:?>
                                                                        <td>[<a href="danhsachchuaxemlichcongtac.php?IDLichCongTac=<?php echo $item['IDLichCongTac']?>&IDNhomNguoiNhan=<?php echo $item['IDNhomNguoiNhan']?>" style="color: black;"> <?php echo $songuoichuaxem2 ?></a>] </td>
                                                                    <?php endif; ?> 
                                                            <td>          
                                                                <a href="capnhaplichcongtac.php?IDLichCongTac=<?php echo $item['IDLichCongTac'] ?>">Thay Đổi</a>
                                                            </td> 
                                                        </tr>
                                                    <?php endforeach ;
                                                    if ($lichcongtac1['NgayTao'] !== $previousDay): ?>
                                                        <tr><td style="background-color: #f0f0f0;" colspan="10"> </td></tr>
                                                        <?php
                                                    endif;
                                                    $previousDay = $lichcongtac1['NgayTao'];
                                                endforeach;
                                                ?>




                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>



                    </div>
                </div>
</div>



            </div>
    </div>
</div>




<?php include 'footer.php';?>  

