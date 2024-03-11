<?php 
require '../init.php' ;   
require '../classes/Thongbao.php';
require '../classes/Database.php';
$db = new Database();
$pdo = $db->getConnect();
$perPage = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;
$limit = $perPage;
// $data = Thongbao::getPage($pdo, $limit, $offset);


$totalThongbao = Thongbao::countAll($pdo);
$totalPages = ceil($totalThongbao / $perPage);

$tukhoa = isset($_GET['tukhoa']) ? $_GET['tukhoa'] : null;
$tukhoa1 = isset($_GET['tukhoa1']) ? $_GET['tukhoa1'] : null;
$tukhoa2 = isset($_GET['tukhoa2']) ? $_GET['tukhoa2'] : null;
$tukhoa3 = isset($_GET['tukhoa3']) ? $_GET['tukhoa3'] : null;
$tukhoa4 = isset($_GET['tukhoa4']) ? $_GET['tukhoa4'] : null;
// $tukhoa = $_GET['tukhoa'];
echo "Search term: " . $tukhoa;

if ($tukhoa != '') {
    $data = Thongbao::getPageTimKiem($pdo,$tukhoa); 
}
elseif ( $tukhoa1 != '')
    {
        $data = Thongbao::getPageTimKiem_TheoTieuDe($pdo,$tukhoa1); 
    }
    elseif ( $tukhoa2 != '')
    {
        $data = Thongbao::getPageTimKiem_TheoNoiDung($pdo,$tukhoa2); 
    }
    elseif ( $tukhoa3 != '')
    {
        $data = Thongbao::getPageTimKiem_TheoNgayHetHan($pdo,$tukhoa3); 
    }
    elseif ( $tukhoa4 != '')
    {
        $data = Thongbao::getPageTimKiem_TheoNguoiTao($pdo,$tukhoa4); 
    }
    else{
        $data = Thongbao::getPage($pdo, $limit, $offset);
    }
?>
<?php include 'header.php' ;?>    
<?php include 'menuleft.php' ;?>    
<style>
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

            <div class=" text-left" style="margin-top:10vh;">
            <div>
                <div class="accordion-item"  style="background-color: white;border: none;">
                                    <h2 class="accordion-header" id="panelsStayOpen-heading23" style="color:#C9DFF5;">
                                    <button style="background-color: #0a558c;color:ghostwhite;border-bottom: 1px solid white; padding-left: 0px;border-radius: 0px; width: 100px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse23" aria-expanded="false" aria-controls="panelsStayOpen-collapse23">
                                        <span style="font-size: 20px; font-weight: bold;"> Tìm Kiếm</span>  
                                    </button>
                                    </h2>
                                    <div  id="panelsStayOpen-collapse23" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading23">
                                        <div class="accordion-body" >
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-2" > 
                                                    <li class="nav-item start open" idcha="0" >
                                                        <form action="danhsachthongbao.php" method="GET" style="margin-top:5px;" >
                                                            <label for="tukhoa">Ngày tạo</label>
                                                            <input style = "border-radius: 10px;" type="date" id="tukhoa" name="tukhoa" required>
                                                            <button style = "border-radius: 10px;width:40px;height:40px" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                            
                                                        </form>
                                                    </li>
                                                    <li class="nav-item start " idcha="0">
                                                        <form action="danhsachthongbao.php" method="GET" style="margin-top:5px;" >
                                                            <label for="tukhoa2">Nội dung</label>
                                                            <input style = "border-radius: 10px;" type="text" id="tukhoa2" name="tukhoa2" required>
                                                            <button style = "border-radius: 10px;width:40px;height:40px" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                            
                                                        </form>
                                                    </li> 
                                                    <li class="nav-item start " idcha="0">
                                                        <form action="danhsachthongbao.php" method="GET" style="margin-top:5px;" >
                                                            <label for="tukhoa1">Tiêu Đề</label>
                                                            <input style = "border-radius: 10px;" type="text" id="tukhoa1" name="tukhoa1" required>
                                                            <button style = "border-radius: 10px;width:40px;height:40px" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                            
                                                        </form>
                                                    </li>
                                                    <li class="nav-item start " idcha="0">
                                                        <form action="danhsachthongbao.php" method="GET" style="margin-top:5px;" >
                                                            <label for="tukhoa3"> Ngày hết hạn</label>
                                                            <input style = "border-radius: 10px;" type="date" id="tukhoa3" name="tukhoa3" required>
                                                            <button style = "border-radius: 10px;width:40px;height:40px" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                            
                                                        </form>
                                                    </li>
                                                    <li class="nav-item start " idcha="0">
                                                        <form action="danhsachthongbao.php" method="GET" style="margin-top:5px;" >
                                                            <label for="tukhoa4">Người Tạo</label>
                                                            <tr>
                                                                <td>
                                                                    <select id="select" name="tukhoa4" style ="width:350px" >
                                                                        <option>--------Chọn Giảng Viên-------</option>
                                                                        <?php
                                                                        $brand = new Thongbao();
                                                                        $brandlist = $brand->show_GV();
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

                                                            <button style = "border-radius: 10px;width:40px;height:40px" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                            
                                                        </form>
                                                    </li>
                                                    <li class="nav-item start " idcha="0">
                                                        <button  ><a href="danhsachthongbao.php" style="color: black;"> Làm mới</a></button>
                                                    </li>                                          
                                                </ul>
                                        </div>
                                    </div>
                </div>
            </div>
            <div class="page-toolbar" style="display: flex;">
                    <h1 class="page-title pull-left " style="text-align: center; margin: 0 auto;">DANH SÁCH THÔNG BÁO</h1>
                </div>
            
                    <div class=" " style="border: 1px solid black;margin-left: 5px;">

                            <div style="border-bottom: none;" >
                              

                            <div >
                                <table  class="table  table-xl " >
                                <thead  style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                    <tr>
                                    <th scope="col" style="width: 10px;">STT</th>
                                    <th scope="col" style="width: 400px;">Tiêu đề</th>
                                    <th scope="col" style="width: 50px;"></th>
                                    <th scope="col" style="width: 150px;">Ngày hết hạn</th>
                                    <th scope="col"style="width: 250px;">Người tạo</th>
                                    <th scope="col" >Ngày tạo</th>
                                    <th scope="col">Đã xem</th>
                                    <th scope="col">Chưa xem</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                <?php 
                                        $i = 0;
                                        
                                        foreach($data as  $thongbao ):?>    
                                            <?php $i++;?>
                                            <?php $songuoichuaxem = Thongbao::DemNguoiDungChuaXem($pdo,$thongbao['IDThongBao']) ?>
                                            <?php $songuoidaxem = Thongbao::DemNguoiDungDaXem($pdo,$thongbao['IDThongBao']) ?>
                                            <?php $idnguoidung = $_SESSION['quanly_id'] ?>
                                            <?php $kiemtra = Thongbao::KiemTraNguoiDungDaXem($pdo,$idnguoidung,$thongbao['IDThongBao'])?>
                                            <?php $kiemtrachuaxem = Thongbao::KiemTraNguoiDungChuaXem($pdo,$idnguoidung,$thongbao['IDThongBao'])?>
                                            <?php $ngayHetHanTimestamp = strtotime($thongbao['NgayHetHan']);
                                                $ngayHienTaiTimestamp = strtotime(date('Y-m-d'));
                                                // Chuyển thành kiểu DateTime
                                            $ngayHetHanDateTime = date('Y-m-d H:i:s', $ngayHetHanTimestamp);
                                            $ngayHienTaiDateTime = date('Y-m-d H:i:s', $ngayHienTaiTimestamp);

                                            // Hoặc sử dụng lớp DateTime để lấy ngày hiện tại
                                            $ngayHienTaiDateTime = new DateTime();
                                            $ngayHienTaiDateTimeFormatted = $ngayHienTaiDateTime->format('Y-m-d H:i:s');
                                            ?>
                                            <?php if ($ngayHetHanTimestamp > $ngayHienTaiTimestamp):?>
                                        
                                                <?php if ($kiemtra):?>
                                                <tr>             
                            
                                                    <td><?php echo $i; ?></td>
                                                    <td><a style="color:black" href="chitietthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>"><?=$thongbao['TieuDe'] ?></a> </td>
                                                    <td> <a href="../upload/<?=$thongbao['TepDinhKem']?>" download>
                                                        <i class="fa-solid fa-download"></i>
                                                    </a></td>
                                            
                                                    <td><?=$thongbao['NgayHetHan'] ?></td>   
                                                    <td><?=$thongbao['HoTen'] ?></td>   
                                                    <td style="text-align: center;"><?=$thongbao['NgayTao'] ?></td> 
                                                    
                                                    <td>[<a  href="danhsachdaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoidaxem ?></a>] </td>
                                                    <?php if ($kiemtrachuaxem):?>
                                                    <td >[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: red;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php else:?>
                                                        <td>[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php endif; ?> 
                                                    </tr>
                                                <?php else:?>
                                                    <tr> 
                                                    <td><?php echo $i; ?></td>
                                                    <td><a style="color:red" href="chitietthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>"><?=$thongbao['TieuDe'] ?></a> </td>
                                                    <td> <a href="../upload/<?=$thongbao['TepDinhKem']?>" download>
                                                    <i class="fa-solid fa-download"></i>
                                                    </a></td>
                                                    <td><?=$thongbao['NgayHetHan'] ?></td>   
                                                    <td><?=$thongbao['HoTen'] ?></td>   
                                                    <td style="text-align: center;"><?=$thongbao['NgayTao'] ?></td> 
                                                    <td>[<a  href="danhsachdaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoidaxem ?></a>] </td>
                                                    <?php if ($kiemtrachuaxem):?>
                                                    <td >[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: red;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php else:?>
                                                        <td>[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php endif; ?>  
                                                </tr>
                                                <?php endif; ?>  
                                            <?php elseif ($ngayHetHanTimestamp==$ngayHienTaiTimestamp): ?>
                                                
                                                <?php if ($kiemtra):?>
                                                <tr>                                            
                                                    <td><?php echo $i; ?></td>
                                                    <td><a style="color:black" href="chitietthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>"><?=$thongbao['TieuDe'] ?></a> </td>
                                                    <td> <a href="../upload/<?=$thongbao['TepDinhKem']?>" download>
                                                        <i class="fa-solid fa-download"></i>
                                                    </a></td>
                                            
                                                    <td style="color: red;"><?=$thongbao['NgayHetHan'] ?></td>   
                                                    <td><?=$thongbao['HoTen'] ?></td>   
                                                    <td style="text-align: center;"><?=$thongbao['NgayTao'] ?></td> 
                                                
                                                    <td>[<a  href="danhsachdaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoidaxem ?></a>] </td>
                                                    <?php if ($kiemtrachuaxem):?>
                                                    <td >[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: red;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php else:?>
                                                        <td>[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php endif; ?>  
                                                   
                                                </tr>
                                                <?php else:?>
                                                    <tr> 
                                                    <td><?php echo $i; ?></td>
                                                    <td><a style="color:red" href="chitietthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>"><?=$thongbao['TieuDe'] ?></a> </td>
                                                    <td> <a href="../upload/<?=$thongbao['TepDinhKem']?>" download>
                                                    <i class="fa-solid fa-download"></i>
                                                    </a></td>
                                                    <td style="color: red;"><?=$thongbao['NgayHetHan'] ?></td>      
                                                    <td><?=$thongbao['HoTen'] ?></td>   
                                                    <td style="text-align: center;"><?=$thongbao['NgayTao'] ?></td> 
                                                    <td>[<a  href="danhsachdaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoidaxem ?></a>] </td>
                                                    <?php if ($kiemtrachuaxem):?>
                                                    <td >[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: red;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php else:?>
                                                        <td>[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endif; ?> 
                                                
                                            <?php else:?>
                                               
                                                <?php if ($kiemtra):?>
                                                <tr>                                            
                                                    <td><?php echo $i; ?></td>
                                                    <td><a style="color:black" href="chitietthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>"><?=$thongbao['TieuDe'] ?></a> </td>
                                                    <td> <a href="../upload/<?=$thongbao['TepDinhKem']?>" download>
                                                        <i class="fa-solid fa-download"></i>
                                                    </a></td>
                                            
                                                    <td></td>   
                                                    <td><?=$thongbao['HoTen'] ?></td>   
                                                    <td style="text-align: center;"><?=$thongbao['NgayTao'] ?></td> 
                                                
                                                    <td>[<a  href="danhsachdaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoidaxem ?></a>] </td>
                                                    <?php if ($kiemtrachuaxem):?>
                                                    <td >[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: red;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php else:?>
                                                        <td>[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php endif; ?> 
                                                   
                                                </tr>
                                                <?php else:?>
                                                    <tr> 
                                                    <td><?php echo $i; ?></td>
                                                    <td><a style="color:red" href="chitietthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>"><?=$thongbao['TieuDe'] ?></a> </td>
                                                    <td> <a href="../upload/<?=$thongbao['TepDinhKem']?>" download>
                                                    <i class="fa-solid fa-download"></i>
                                                    </a></td>
                                                    <td></td>   
                                                    <td><?=$thongbao['HoTen'] ?></td>   
                                                    <td style="text-align: center;"><?=$thongbao['NgayTao'] ?></td> 
                                                    <td>[<a  href="danhsachdaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoidaxem ?></a>] </td>
                                                    <?php if ($kiemtrachuaxem):?>
                                                    <td >[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: red;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php else:?>
                                                        <td>[<a href="danhsachchuaxemthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>" style="color: black;"> <?php echo $songuoichuaxem ?></a>] </td>
                                                    <?php endif; ?> 

                                                </tr>
                                                <?php endif; ?> 

                                        <?php endif; ?>       
                                        <?php endforeach ;?>
                                </tbody>
                                </table>
                                
                            </div>
                            </div>
                            <div colspan="9">
                                <div class="pagination justify-content-center " style="margin-left:10vh; margin-top:8vh">
                                        <?php if ($totalPages > 1) : ?>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination d-flex justify-content-center">
                                                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                                        <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                    <?php endfor; ?>
                                                </ul>
                                            </nav>
                                        <?php endif; ?>
                                </div>
                            </div>
                    </div>
            </div>


            </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>


<?php include 'footer.php';?>  