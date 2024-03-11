<?php 
require '../init.php' ;   
require '../classes/Lichcongtac.php';
require '../classes/Database.php';
$db = new Database();
$pdo = $db->getConnect();
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

 $idnguoidung = $_SESSION['quanly_id'];

 if (isset($_POST['search'])) {
    $selectedYear = $_POST['year'];
    $selectedWeek = $_POST['week'];
    $startDate = date("Y-m-d", strtotime($selectedYear . "-W" . $selectedWeek . "-1")); 
    $endDate = date("Y-m-d", strtotime($selectedYear . "-W" . $selectedWeek . "-7"));
    $dataDay = Lichcongtac::TimkiemLichTheoTuan($pdo, $startDate, $endDate);
}


?>
<script>
function shortenText2(text, maxLength) {
    if (text.length > maxLength) {
        return text.substr(0, maxLength) + '...';
    }
    return text;
}

</script>
<?php include 'header.php' ;?>    
<?php include 'menuleft.php' ;?>    
            <div class="col-10">

            <div class=" text-center" style="margin-top:10vh;">
            <div class="d-flex gap-2 justify-content-center">
            <form name="from-search" method="POST" class="d-flex gap-2 justify-content-center">
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
                    <div class=" " style="margin-left: 5px;height: 400px;">
                    <h3> LỊCH CÔNG TÁC CÁ NHÂN </h3>
                            <div style="border: 1px solid black; overflow: auto;border-bottom: none; height: 900px;" >
                            <div >
                                <table  class="table  table-xl" >
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
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                <?php 
                                  $previousDay = null;
                                foreach($dataDay as  $lichcongtac1 ):?> 
                                    <tr>
                                    <?php $count23= Lichcongtac::getDayDistritCountCaNhan($pdo,$idnguoidung,$lichcongtac1['NgayTao']) ?>
                                    <?php if($count23>0): ?>
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
                                    <?php $data = Lichcongtac::getDayCaNhan($pdo,$idnguoidung,$lichcongtac1['NgayTao']); ?>
                                        <?php foreach($data as  $item ):?>  
                                            <?php $songuoichuaxem = Lichcongtac::DemNguoiDungChuaXem($pdo,$item['IDLichCongTac']) ?>
                                            <?php $songuoichuaxem2 = Lichcongtac::DemNguoiDungChuaXem2($pdo,$item['IDNhomNguoiNhan'],$item['IDLichCongTac']) ?>
                                            <?php $songuoidaxem = Lichcongtac::DemNguoiDungDaXem($pdo,$item['IDLichCongTac']) ?>
                                            <?php $songuoidaxem2 = Lichcongtac::DemNguoiDungDaXem2($pdo,$item['IDNhomNguoiNhan'],$item['IDLichCongTac']) ?>

                                            <?php $kiemtra = Lichcongtac::KiemTraNguoiDungDaXem($pdo,$idnguoidung,$item['IDLichCongTac'])?>
                                            <?php $kiemtrachuaxem = Lichcongtac::KiemTraNguoiDungChuaXem($pdo,$idnguoidung,$item['IDLichCongTac'])?>  
                                            <?php $kiemtrachuaxem2 = Lichcongtac::KiemTraNguoiDungChuaXem2($pdo,$idnguoidung,$item['IDNhomNguoiNhan'],$item['IDLichCongTac'])?> 

                                            <td><?= date('H:i', strtotime($item['GioBatDau'])) ?> - <?= date('H:i', strtotime($item['GioKetThuc'])) ?> </td>
                                            <td><a style="color:black;text-decoration: none;" href="chitietlichcongtac.php?IDLichCongTac=<?php echo $item['IDLichCongTac'] ?>"><?=$item['TieuDe'] ?></a> </td>        
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
                                        </tr>
                                    <?php endforeach ;
                                    if ($lichcongtac1['NgayTao'] !== $previousDay): ?>
                                        <tr><td style="background-color: #f0f0f0;" colspan="9"> </td></tr>
                                        <?php
                                    endif;
                                    $previousDay = $lichcongtac1['NgayTao'];
                                endif;    
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





<?php include 'footer.php';?>  


                                

