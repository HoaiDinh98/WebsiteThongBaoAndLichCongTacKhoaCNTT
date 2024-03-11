<?php 
require '../init.php' ;   
require '../classes/Thongbao.php';
require '../classes/Database.php';

// $IDThongBao = $_GET['IDThongBao'];
$IDThongBao= isset($_GET['IDThongBao']) ? $_GET['IDThongBao'] : null;
$IDNguoiTao= $_SESSION['quanly_id'];
$db = new Database();
$pdo = $db->getConnect();


$thongbao = Thongbao::getOneByID($pdo,$IDThongBao);

$kiemtra = Thongbao::updateSoThongBao($pdo,$IDNguoiTao,$IDThongBao,1);
if ($kiemtra) {
} else {
    echo 'Error creating product';
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
                <div class="page-toolbar" style="display: flex;">
                    <h1 class="page-title pull-left" style="text-align: center; margin: 0 auto;">Chi tiết thông báo</h1>
                </div>
            
                    <div class=" " style="margin-left: 5px;height: 700px;">

                            <div style="height: 360px;border-bottom: none;" >
                              

                            <div >
                                <table  class="table  table-xl table-hover" >
                                <thead  style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                    <tr>
                                    <th scope="col" style="width: 300px;">Tiêu đề</th>
                                    <th scope="col" style="width: 400px;">Nọi dung</th>
                                    <th scope="col" style="width: 80px;">Tải về</th>
                                    <th scope="col" style="width: 150px;">Ngày hết hạn</th>
                                    <th scope="col"style="width: 250px;">Người tạo</th>
                                    <th scope="col"style="width: 150px;" >Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
 
                                    <tr> 
                                        <td><a style="color:#003F59" href=""><?=$thongbao[0]['TieuDe'] ?></a> </td>
                                        <td><?=$thongbao[0]['NoiDung'] ?></td>
                                        <td>  <a  href="../upload/<?=$thongbao[0]['TepDinhKem'] ?>" download> <i class="fa-solid fa-download"></i></a> </td>
                                        <td><?=$thongbao[0]['NgayHetHan'] ?></td>   
                                        <td><?=$thongbao[0]['HoTen'] ?></td>   
                                        <td style="text-align: center;" ><?=$thongbao[0]['NgayTao'] ?></td> 
                                    </tr>
                             
                                </tbody>
                                </table>
                                
                            </div>

                            </div>
                    </div>
            </div>

            


            </div>
    </div>
</div>






<?php include 'footer.php';?>  