<?php 
    require 'init.php' ;   
    require 'classes/Lichcongtac.php';
    require 'classes/Database.php';

    $db = new Database();
    $pdo = $db->getConnect();
    $day= date('Y-m-d');
    $day2= date('d-m-Y');
    $data = Lichcongtac::getDay($pdo,$day);


?>
<?php include 'header.php' ;?>    
<?php include 'menuleft.php' ;?>    
            <div class="col-10">

            <div class=" text-center" style="margin-top:10vh;">
                <div class="row" >
                    <div class="col-7 " style="border: 1px solid black;margin-left: 5px;height: 400px;">
                    <span> LỊCH CÔNG TÁC NGÀY <?php echo $day2 ?> </span>
                            <div style="height: 360px; overflow: auto;border-bottom: none;" >
                              

                            <div >
                                <table  class="table  table-xl table-hover" >
                                <thead  style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                    <tr>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Địa điểm</th>
                                    <th scope="col">Thành Phần</th>
                                    <th scope="col">Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                    <?php foreach($data as  $item ):?>    
                                        <tr>
                                    
                                                <td><?= date('H:i', strtotime($item['GioBatDau'])) ?> - <?= date('H:i', strtotime($item['GioKetThuc'])) ?> </td>
                                                <td><a style="color:black" href="chitietlichcongtac.php?IDLichCongTac=<?php echo $item['IDLichCongTac'] ?>"><?=$item['TieuDe'] ?></a> </td>      
                                                <td ><?=$item['DiaDiem'] ?></td> 
                                            
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
                                                <td ><?=$item['GhiChu'] ?></td> 
                                        </tr>
                                    <?php endforeach ;?>
                                </tbody>
                                </table>
                            </div>
                            </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-6"  style="margin-bottom: 20px;">
                                <div class="card">
                                    <div class=" ">
                                        <div class="clearfix">
                                            <div class="float-right">
                                                <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                            </div>
                                            <div class="float-left">
                                                <a class="txt" href="javascript:" onclick="createTab('Hộp thư', '/MailBox/HopThu', 47, false);">Hộp thư</a>

                                                <h3 class="number">0</h3>

                                            </div>
                                        </div>
                                        <a href="javascript:">
                                            <p class="text-muted">
                                                Vào hộp thư
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-content bt-notify badge_dashboard_thongbao">
                                        <div class="clearfix">
                                            <div class="float-right">
                                                <i class="fa fa-bullhorn icon" aria-hidden="true"></i>
                                            </div>
                                            <div class="float-left">
                                                <a class="txt" href="javascript:" onclick="createTab('Thông báo', '/ThongBao/ThongBao', 46, false);">Thông báo</a>
                                                <h3 class="number"> <?php echo $sothongbao ?> </h3>

                                            </div>
                                        </div>
                                        <a href="thongbao.php" onclick="createTab('Thông báo', '/ThongBao/ThongBao', 46, false);">
                                            <p class="text-muted">
                                                Xem thông báo
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        



                            <div class="col-md-6" style="margin-bottom: 20px;">
                                    <div class="card">
                                        <div class="card-content bt-notify badge_dashboard_dsks">
                                            <div class="clearfix">
                                                <div class="float-right">
                                                </div>
                                                <div class="float-left">
                                                    <a class="txt" href="javascript:" onclick="createTab('Phiếu khảo sát', '/giang-vien/khao-sat.html?pIsDaKhaoSat=false', 50, false);">Phiếu khảo sát</a>
                                                    <h3 class="number">0</h3>
                                                </div>
                                            </div>
                                            <a href="javascript:" onclick="createTab('Phiếu khảo sát', '/giang-vien/khao-sat.html?pIsDaKhaoSat=false', 50, false);">
                                                <p class="text-muted">
                                                    Xem danh sách
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            <div class="col-md-12">

                            <div class="card">
                                <div class="dashboard-tabs-head">
                                    <h3 class="dashboard-tabs-title">
                                        Công việc gần đến hạn</h3>
                                </div>
                                <div class="dashboard-tabs-body nicescroll-cl bangcongtac " tabindex="1" style="overflow: hidden; outline: none;">
                                    <div class="scroller" style="height:259px !important; overflow-y:auto;" data-always-visible="1" data-rail-visible="0">
                                            <!-- <div>
                                                <i class="checker" style="background-color:rgb(194 223 255)"></i> <label style="padding-right: 30px !important">Hoàn thành</label>
                                                <i class="checker" style="background-color:rgb(227 183 235);"></i> <label>Chưa hoàn thành</label>
                                            </div> -->
                                            <table class="table table-striped table-bordered my-md-2 w-100" id="grid-lct">
                                                <thead style=" background: linear-gradient(90deg, #2cd9ff , #7effb2);">
                                                    <tr>
                                                        <th class="tb_head tgian" scope="col" style="width:10%">STT</th>
                                                        <th class="tb_head" scope="col" style="width:60%">Tên công việc</th>
                                                        <th class="tb_head w-25" scope="col" style="width:150px">Hạn xử lý còn lại</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td colspan="3" style="text-align:center">
                                                                <p>Chưa có công việc gần đến hạn</p>
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>



            </div>
    </div>
</div>



<?php include 'footer.php';?>  