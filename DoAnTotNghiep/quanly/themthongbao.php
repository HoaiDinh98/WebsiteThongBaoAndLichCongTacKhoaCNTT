<?php 
require '../init.php' ;   
require '../classes/Thongbao.php';
require '../classes/Database.php';
$db = new Database();
$pdo = $db->getConnect();
$IDNguoiTao= $_SESSION['quanly_id'];
$datand = Thongbao::getAllGianVien($pdo);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $thongbao = new Thongbao();
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
    $ThongBaoBuild = $thongbao->create($pdo,$IDNguoiTao,$nhom,$loaithongbao,$ngaytao,$ngayhethan,$tieude,$noidung,$thanhphan,$path . '/' . $pdf,0);
    if ($ThongBaoBuild) {
        move_uploaded_file($_FILES['tepdinhkem']['tmp_name'], $path . '/' . $pdf);
        $idthongbaolast = $thongbao->getLastInsertedId($pdo);
        foreach($datand as  $nguoidung ):
            $thongbao->createNguoiDungVaoDsXem($pdo, $nguoidung['IDNguoiDung'],$idthongbaolast,2);
        endforeach ;
          

        header("Location: danhsachthongbao.php");
    } else {
        echo 'Error creating product';
    }
}

$perPage = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;
$limit = $perPage;
$data = Thongbao::getPage($pdo, $limit, $offset);


$totalThongbao = Thongbao::countAll($pdo);
$totalPages = ceil($totalThongbao / $perPage);

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
                    
                    <div class=" " style="border: 1px solid black;margin-left: 5px">
                        <div class="accordion-item"  style="background-color: white;border: none;">
                                <h2 class="accordion-header" id="panelsStayOpen-heading16" style="color:#C9DFF5;">
                                <button style="background-color: #0a558c;color:#C9DFF5;border-bottom: 1px solid white; padding-left: 0px;border-radius: 0px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse16" aria-expanded="false" aria-controls="panelsStayOpen-collapse16">
                                    <span style="font-size: 30px;">Thêm thông báo mới </span> 
                                </button>
                                </h2>
                                <div  id="panelsStayOpen-collapse16" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading16">
                                    <div class="accordion-body" >
                                    <div class="page-toolbar" style="display: flex;">
                                        <h1 class="page-title pull-left"></h1>
                                    </div>
                                    <div class="grid_10" style="margin-left: 50px;">
                                        <div class="box round first grid">
                                            <div class="block">             
                                            <form action="themthongbao.php" method="POST" enctype="multipart/form-data">
                                                <table class="form" style="width: 100%;">
                                                    <tr class="form-roww">
                                                        <td style="width: 350px;" >
                                                            <label style="font-weight: bold;">Nhóm giảng viên nhận thông báo</label>
                                                        </td>
                                                        <td>
                                                            <select id="select" name="nhom" style="width: 60%">
                                                                <option>--------Chọn nhóm--------</option>
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
                                                            <select id="select" name="loaithongbao" style="width: 60%">
                                                                <option>--------Chọn Loại--------</option>
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
                                                        <td >
                                                            <label style="font-weight: bold;">Ngày tạo</label>
                                                        </td>
                                                        <td >
                                                            <input style="width: 200px;" type="datetime-local" name="ngaytao" placeholder="Ngày tạo..." class="medium" />
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td>
                                                            <label style="font-weight: bold;">Ngày hết hạn</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 200px;" type="date" name="ngayhethan" placeholder="Ngày hết hạn..." class="medium" />
                                                        </td>
                                                    </tr>                        
                                                    <tr class="form-roww">
                                                        <td>
                                                            <label style="font-weight: bold;">Tiêu đề</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 60%" type="text" name="tieude" placeholder="Tiêu đề..." class="medium" />
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="form-roww">
                                                        <td style="vertical-align: top; padding-top: 9px;">
                                                            <label style="font-weight: bold;">Nội dung</label>
                                                        </td>
                                                        <td>
                                                            <textarea style="width: 60%" name="noidung" class="tinymce"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr class="form-roww"> 
                                                        <td>
                                                            <label style="font-weight: bold;">Thành phần</label>
                                                        </td>
                                                        <td>
                                                            <input style="width: 60%" type="text" name="thanhphan" placeholder="Thành phần..." class="medium" />
                                                        </td>
                                                    </tr>
                                                
                                                    <tr class="form-roww">
                                                        <td>
                                                            <label style="font-weight: bold;">Tệp đính kèm</label>
                                                        </td>
                                                        <td>
                                                            <input type="file" name="tepdinhkem" accept=".pdf"/>
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

                    <div class=" " style="border: 1px solid black;margin-left: 5px">
                        <div class="accordion-item"  style="background-color: white;border: none;">
                                <h2 class="accordion-header" id="panelsStayOpen-heading13" style="color:#C9DFF5;">
                                <button style="background-color: #0a558c;color:#C9DFF5;border-bottom: 1px solid white; padding-left: 0px;border-radius: 0px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse13" aria-expanded="false" aria-controls="panelsStayOpen-collapse13">
                                    <span style="font-size: 30px;">Danh sách thông báo </span> 
                                </button>
                                </h2>
                                <div  id="panelsStayOpen-collapse13" class="accordion-collapse collapse show " aria-labelledby="panelsStayOpen-heading13" >
                                    <div class="accordion-body" >
                                    <div style="border: 1px solid black;border-bottom: none;" >
                              

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
                                      <th scope="col"></th>
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
                                                      <td>          
                                                       <a href="capnhapthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>">Thay Đổi</a>
                                                    </td> 
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
                                                      <td>          
                                                       <a href="capnhapthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>">Thay Đổi</a>
                                                    </td> 
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
                                                      <td>          
                                                       <a href="capnhapthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>">Thay Đổi</a>
                                                    </td>  
                                                     
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
                                                      <td>          
                                                       <a href="capnhapthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>">Thay Đổi</a>
                                                    </td> 
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
                                                      <td>          
                                                       <a href="capnhapthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>">Thay Đổi</a>
                                                    </td> 
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
                                                      <td>          
                                                       <a href="capnhapthongbao.php?IDThongBao=<?php echo $thongbao['IDThongBao'] ?>">Thay Đổi</a>
                                                    </td> 
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



            </div>
    </div>
</div>




<?php include 'footer.php';?>  

<script> 

function mydate()
{
    //alert("");
    document.getElementById("dt").hidden=false;
    document.getElementById("ndt").hidden=true;
}

function mydate1()
{
    d=new Date(document.getElementById("dt").value);
    dt=d.getDate();
    mn=d.getMonth();
    mn++;
    yy=d.getFullYear();
    document.getElementById("ndt").value=dt+"/"+mn+"/"+yy
    document.getElementById("ndt").hidden=false;
    document.getElementById("dt").hidden=true;
}

function enddate()
{
    //alert("");
    document.getElementById("edt").hidden=false;
    document.getElementById("endt").hidden=true;
}
function enddate1()
{
    d=new Date(document.getElementById("edt").value);
    dt=d.getDate();
    mn=d.getMonth();
    mn++;
    yy=d.getFullYear();
    document.getElementById("endt").value=dt+"/"+mn+"/"+yy
    document.getElementById("endt").hidden=false;
    document.getElementById("edt").hidden=true;
}
</script>
