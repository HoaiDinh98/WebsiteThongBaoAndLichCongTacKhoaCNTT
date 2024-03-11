<?php 
    require '../init.php' ;  
    include_once '../classes/Database.php';
    include_once '../classes/Thongbao.php';
?>

<?php include 'header.php' ;?>    
<?php include 'menuleft.php' ;?>    

<?php
    
    $IDThongBao= isset($_GET['IDThongBao']) ? $_GET['IDThongBao'] : null;
    $db = new Database();
$pdo = $db->getConnect();
// $data = Thongbao::getAllNguoiDungDaXem($pdo,$IDThongBao);



$perPage = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;
$limit = $perPage;
$data = Thongbao::getPageAllNguoiDungDaXem($pdo,$IDThongBao, $limit, $offset);


$totalThongbao = Thongbao::DemNguoiDungDaXem($pdo,$IDThongBao);
$totalPages = ceil($totalThongbao / $perPage);
?>

<div class="col-10">

            <div class=" text-left" style="margin-top:10vh;">
                <div class="page-toolbar" style="display: flex;">
                    <h1 class="page-title pull-left">Danh Sách Đã Xem Thông báo</h1>
                </div>
            
                    <div class=" " style="border: 1px solid black;margin-left: 5px;height: 700px;">

                            <div style="height: 360px;border-bottom: none;" >
                              

                            <div >
                                <table  class="table  table-xl table-hover" >
                                <thead  style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                    <tr>
                                    <th scope="col" style="width: 10px;">STT</th>
                                    <th scope="col" style="width: 300px;">Họ Tên</th>
                                    <th scope="col" style="width: 300px;">Phòng ban</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">

                                <?php 
                                        $i = 0;
                                        foreach($data as  $thongbao ):?>    
                                            <tr> 
                                               <?php $i++;?>
                                                <td><?php echo $i; ?></td>                            
                                                <td><?=$thongbao['HoTen'] ?></td>   
                                                <td><?=$thongbao['TenPhongBan'] ?></td>   
                                            </tr>
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



<?php include 'footer.php';?> 
