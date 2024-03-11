<?php 
require '../init.php' ;   
require '../classes/Lichcongtac.php';
require '../classes/Database.php';

// $IDThongBao = $_GET['IDThongBao'];
$IDLichCongTac= isset($_GET['IDLichCongTac']) ? $_GET['IDLichCongTac'] : null;
$IDNguoiTao= $_SESSION['quanly_id'];
$db = new Database();
$pdo = $db->getConnect();


$lichcongtac = Lichcongtac::getOneByID($pdo,$IDLichCongTac);

$kiemtra = Lichcongtac::updateSoLichCongTac($pdo,$IDNguoiTao,$IDLichCongTac,1);
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
                    <h1 class="page-title pull-left" style="text-align: center; margin: 0 auto;">Chi tiết lịch công tác</h1>
                </div>
            
                    <div class=" " style="margin-left: 5px;height: 700px;">

                            <div style="height: 360px;border-bottom: none;" >
                              

                            <div >
                                <table  class="table  table-xl table-hover" >
                                <thead  style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                    <tr>
                                    <th scope="col" style="width: 300px;">Tiêu đề</th>
                                    <th scope="col" style="width: 300px;">Thời gian</th>
                                    <th scope="col" style="width: 400px;">Nội dung</th>
                                    <th scope="col" style="width: 80px;">Chủ trì</th>
                                    <th scope="col" style="width: 300px;">Tham dự</th>
                                    <th scope="col"style="width: 100px;">Địa điểm</th>
                                    <th scope="col"style="width: 150px;" >Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
 
                                    <tr> 
                                    <td><a style="color:black"><?=$lichcongtac[0]['TieuDe'] ?></a> </td>  
                                    <td> Ngày: <p style="color: black; font-weight: bold;"><?=$lichcongtac[0]['NgayTao']?> </p>  đến ngày <p style="color: black; font-weight: bold;"><?=$lichcongtac[0]['NgayHetHan']?> </p>  Thời gian: <p style="color: black; font-weight: bold;"><?= date('H:i', strtotime($lichcongtac[0]['GioBatDau'])) ?> - <?= date('H:i', strtotime($lichcongtac[0]['GioKetThuc'])) ?> </p>   </td>
                                    <td><?=$lichcongtac[0]['NoiDung'] ?></td>         
                                    <td><?=$lichcongtac[0]['TenNguoiChuTri'] ?></td> 
                                    <td>
                                                                                      
                                          <?php $dataNhomNguoiNhan = Lichcongtac::getNhomNguoiNhan($pdo,$lichcongtac[0]['IDNhomNguoiNhan']);
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
                                    <td ><?=$lichcongtac[0]['DiaDiem'] ?></td> 
                                          
 
                                    <td ><?=$lichcongtac[0]['gc'] ?></td> 
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