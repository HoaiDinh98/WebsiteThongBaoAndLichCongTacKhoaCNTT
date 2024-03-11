<?php 
require '../init.php' ;   
require '../classes/Thongbao.php';
require '../classes/Database.php';
$db = new Database();
$pdo = $db->getConnect();

$IDThongBao = $_GET['IDThongBao'];
$IDNguoiTao= $_SESSION['quanly_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $thongbaol = new Thongbao();
    $nhom = $_POST['nhom'];
    $loaithongbao = $_POST['loaithongbao'];
    $ngaytao = $_POST['ngaytao'];
    $ngayhethan = $_POST['ngayhethan'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $thanhphan = $_POST['thanhphan'];

    $pdf = $_FILES['tepdinhkem']['name'];
    $path = "../uploads";
    $pdf_ext = pathinfo($pdf, PATHINFO_EXTENSION);
    $file_name = time() . '.' . $pdf_ext;

    if ( $thongbaol->update($pdo,$IDThongBao,$IDNguoiTao,$nhom,$loaithongbao,$ngaytao,$ngayhethan,$tieude,$noidung,$thanhphan,$path . '/' . $pdf,0)) {
        move_uploaded_file($_FILES['tepdinhkem']['tmp_name'], $path . '/' . $pdf);
        header("Location: danhsachthongbao.php");
    } else {
        echo 'Error creating product';
    }
}else {
    $thongbao = Thongbao::getOneByID($pdo, $IDThongBao);
    
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
                                    <h1 class="page-title pull-left">Thêm Thông báo Mới</h1>
                                </div>
                            <div class="grid_10" style="margin-left: 50px;">
                                        <div class="box round first grid">
                                            <div class="block">             
                                            <form method="POST" enctype="multipart/form-data">
                                                <table class="form" style="width: 100%;">
                                                    <tr class="form-roww">
                                                        <td style="width: 350px;" >
                                                            <label style="font-weight: bold;">Nhóm GV nhận thông báo</label>
                                                        </td>
                                                        <td>
                                                            <select  id="select" name="nhom" value='<?php echo $thongbao[0]['TenNhom'] ?>'>

                                                                        <?php
                                                                            $Cats = Thongbao::getAllNhomNhan($pdo);
                                                                            foreach ($Cats as $Cat) {
                                                                            echo "<option value='{$Cat['IDNhomGV']}'>{$Cat['TenNhom']} </option>";

                                                                             }
                                                                            ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr  class="form-roww">
                                                        <td>
                                                            <label style="font-weight: bold;" >Loại thông báo</label>
                                                        </td>
                                                        <td>
                                                            <select id="select" name="loaithongbao" >
                                                                                                                                        <?php
                                                                            $Cats2 = Thongbao::getAllLoaiThongBao($pdo);
                                                                            foreach ($Cats2 as $Ca2t) {
                                                                            echo "<option value='{$Ca2t['IDLoaiThongBao']}'>{$Ca2t['TenLoaiThongBao']} </option>";

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
                                                            <input required   value='<?php echo $thongbao[0]['NgayTao'] ?>'  type="datetime-local" name="ngaytao" placeholder="Ngày tạo..." class="medium" />
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td>
                                                            <label  style="font-weight: bold;">Ngày hết hạn</label>
                                                        </td>
                                                        <td>
                                                            <input required  value='<?php echo $thongbao[0]['NgayHetHan'] ?>' type="date" name="ngayhethan" placeholder="Ngày hết hạn..." class="medium" />
                                                        </td>
                                                    </tr>                        
                                                    <tr class="form-roww">
                                                        <td>
                                                            <label  style="font-weight: bold;">Tiêu đề</label>
                                                        </td>
                                                        <td>
                                                            <input  style="width: 60%" type="text" name="tieude" placeholder="Tiêu đề..." class="medium"  required  value='<?php echo $thongbao[0]['TieuDe'] ?>'/>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="form-roww">
                                                        <td style="vertical-align: top; padding-top: 9px;">
                                                            <label  style="font-weight: bold;">Nội dung</label>
                                                        </td>
                                                        <td>
                                                            <textarea required  style="width: 60%" name="noidung" class="tinymce"> <?php echo $thongbao[0]['NoiDung'] ?></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr class="form-roww"> 
                                                        <td>
                                                            <label  style="font-weight: bold;">Thành phần</label>
                                                        </td>
                                                        <td>
                                                            <input required  value='<?php echo $thongbao[0]['ThanhPhan'] ?>' style="width: 60%" type="text" name="thanhphan" placeholder="Thành phần..." class="medium" />
                                                        </td>
                                                    </tr>
                                                
                                                    <tr class="form-roww">
                                                        <td>
                                                            <label  style="font-weight: bold;">Tệp đính kèm</label>
                                                        </td>
                                                        <td>
                                                            <input value='<?php echo $thongbao[0]['TepDinhKem'] ?>' type="file" name="tepdinhkem" accept=".pdf"/>
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
</div>




<?php include 'footer.php';?>  
