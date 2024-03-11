<?php 
include_once '../init.php' ;   
include_once '../classes/Thongbao.php';
include_once '../classes/Lichcongtac.php';
include_once '../classes/Database.php';
$db = new Database();
$pdo = $db->getConnect();

$IDLichCongTac = $_GET['IDLichCongTac'];
$IDNguoiTao= $_SESSION['quanly_id'];
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
    $ketqua = $_POST['ketqua'];

    $LichcongtacBuild = $Lichcongtac->update($pdo,$IDLichCongTac,$IDNguoiTao,$nhom,$chutri,$ngaytao,$ngayhethan,$giobatdau,$gioketthuc,$tieude,$noidung,$diadiem,$ghichu,$ketqua);
    if ($LichcongtacBuild) {
          
        header("Location: themlichcongtacchung.php");
    } else {
        echo 'Error creating product';
    }
}else {
    $lichcongtac = Lichcongtac::getOneByID($pdo, $IDLichCongTac);
    
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

                    <div class=" " style="border: 1px solid black;margin-left: 5px;height: 700px;">
                                <div class="page-toolbar" style="display: flex;">
                                    <h1 class="page-title pull-left">Cập nhập lịch công tác</h1>
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
                                                            <select id="select" name="nhom" style="width: 60%" value='<?php echo $lichcongtac[0]['TenNhom'] ?>'>
                                                                
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
                                                            <select id="select" name="chutri" style="width: 60%" value='<?php echo $lichcongtac[0]['TenNguoiChuTri'] ?>'>
                                                               
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
                                                            <input style="width: 30%"  value='<?php echo $lichcongtac[0]['NgayTao'] ?>' type="date" name="ngaytao" placeholder="Ngày tạo..." class="medium" />
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Ngày hết hạn</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 30%"  value='<?php echo $lichcongtac[0]['NgayHetHan'] ?>'  type="date" name="ngayhethan" placeholder="Ngày hết hạn..." class="medium" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Giờ bắt đầu</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 30%" value='<?php echo $lichcongtac[0]['GioBatDau'] ?>'  type="time" name="giobatdau" placeholder="Giờ bắt đầu..." class="medium" />
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Giờ kết thúc</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 30%" value='<?php echo $lichcongtac[0]['GioKetThuc'] ?>'  type="time" name="gioketthuc" placeholder="Giờ kết thúc..." class="medium" />
                                                        </td>
                                                    </tr>                           
                                                    <tr class="form-roww">
                                                        <td>
                                                            <label  style="font-weight: bold;">Tiêu đề</label>
                                                        </td>
                                                        <td>
                                                        <textarea style="width: 60%"  name="tieude" class="tinymce"><?php echo $lichcongtac[0]['TieuDe'] ?></textarea>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="form-roww">
                                                        <td style="vertical-align: top; padding-top: 9px;">
                                                            <label  style="font-weight: bold;">Nội dung</label>
                                                        </td>
                                                        <td>
                                                            <textarea style="width: 60%"  name="noidung" class="tinymce"><?php echo $lichcongtac[0]['NoiDung'] ?></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr class="form-roww"> 
                                                        <td>
                                                            <label  style="font-weight: bold;">Địa điểm</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 60%" value='<?php echo $lichcongtac[0]['DiaDiem'] ?>' type="text" name="diadiem" placeholder="Địa điểm..." class="medium" />
                                                        </td>
                                                    </tr>
                                                    <tr class="form-roww"> 
                                                        <td>
                                                            <label  style="font-weight: bold;">Ghi chú</label>
                                                        </td>
                                                        <td>
                                                        <textarea style="width: 60%"  name="ghichu" class="tinymce"><?php echo $lichcongtac[0]['GhiChu'] ?></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr class="form-roww"> 
                                                        <td>
                                                            <label  style="font-weight: bold;">Kết quả</label>
                                                        </td>
                                                        <td>
                                                        <textarea style="width: 60%"  name="ketqua" class="tinymce"><?php echo $lichcongtac[0]['KetQua'] ?></textarea>
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
</div>




<?php include 'footer.php';?>  
