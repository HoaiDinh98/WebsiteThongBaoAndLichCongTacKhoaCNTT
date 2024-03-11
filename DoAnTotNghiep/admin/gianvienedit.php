<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Gianvien.php';?>
<?php
    $pd = new Gianvien();

    if(!isset($_GET['productid']) || $_GET['productid']==NULL){
       echo "<script>window.location ='gianvienlist.php'</script>";
    }else{
         $id = $_GET['productid']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateProduct = $pd->update_Gianvien($_POST,$_FILES, $id);
        
    }
    $get_product_by_id = $pd ->getGianvienbyId($id);
   
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thay Đổi Thông Tin Giảng Viên</h2>
        <div class="block ">    
         <?php
                if(isset($updateProduct)){
                    echo $updateProduct;
                }

            ?>        
        <?php
         
            if($get_product_by_id){
                while($result_product = $get_product_by_id->fetch_assoc()){
        ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Họ tên giảng viên</label>
                    </td>
                    <td>
                        <input value='<?=$result_product['HoTen'] ?>' type="text" name="HoTen" placeholder="Họ và tên giảng viên..." class="medium" />
                    </td>
                </tr>
				
                <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input value='<?=$result_product['SDT'] ?>' type="text" name="SDT" placeholder="Số điện thoại liên lạc..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giới tính</label>
                    </td>
                    <td>
                        <select id="select" name="GioiTinh">
                        <option>--------Giới Tính--------</option>
                            <?php
                            if($result_product['GioiTinh'] == "Nam"){
                            ?>
                            <option selected value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <?php
                        }else{
                            ?>
                            <option value="Nam">Nam</option>
                            <option selected value="Nữ">Nữ</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
               <tr>
                    <td>
                        <label>Ngày sinh</label>
                    </td>
                    <td>
                        <input value='<?=$result_product['NgaySinh'] ?>' type="date" name="NgaySinh" placeholder="Ngày Sinh..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày vào làm</label>
                    </td>
                    <td>
                        <input  value='<?=$result_product['NgayVaoLam'] ?>' type="date" name="NgayVaoLam" placeholder="Ngày Vào Làm..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày tạo tài khoản</label>
                    </td>
                    <td>
                        <input value='<?=$result_product['NgayTaoTK'] ?>' type="date" name="NgayTaoTK" placeholder="Ngày Tạo Tài Khoản..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input value='<?=$result_product['Email'] ?>' type="text" name="Email" placeholder="Email..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mật khẩu</label>
                    </td>
                    <td>
                        <input value='<?=$result_product['MatKhau'] ?>'  type="text" name="MatKhau" placeholder="Mật Khẩu..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Xác nhận mật khẩu</label>
                    </td>
                    <td>
                        <input value='<?=$result_product['MatKhau'] ?>' type="text" name="MatKhau" placeholder="Xác Nhận Mật Khẩu..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chức vụ</label>
                    </td>
                    <td>
                        <select id="select" name="IDChucVu">
                            <option>--------Chọn Chức Vụ-------</option>

                             <?php
                            $brand = new Gianvien();
                            $brandlist = $brand->show_Chucvu();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option

                            <?php
                            if($result['IDChucVu']==$result_product['IDChucVu']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['IDChucVu'] ?>"><?php echo $result['TenChucVu'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phòng ban</label>
                    </td>
                    <td>
                        <select id="select" name="IDPhongBan">
                            <option>--------Chọn Phòng Ban-------</option>

                             <?php
                            $brand = new Gianvien();
                            $brandlist = $brand->show_Phongban();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option

                            <?php
                            if($result['IDPhongBan']==$result_product['IDPhongBan']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['IDPhongBan'] ?>"><?php echo $result['TenPhongBan'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tổ chức</label>
                    </td>
                    <td>
                        <select id="select" name="IDCongDoan">
                            <option>--------Chọn Tổ Chức-------</option>

                             <?php
                            $brand = new Gianvien();
                            $brandlist = $brand->show_Congdoan();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option

                            <?php
                            if($result['IDCongDoan']==$result_product['IDCongDoan']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['IDCongDoan'] ?>"><?php echo $result['TenCongDoan'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                    </td>
                </tr>
                
				<tr>
                    <td>
                        <label>Bộ môn</label>
                    </td>
                    <td>
                        <select id="select" name="IDBoMon">
                            <option>--------Chọn Bộ Môn-------</option>

                             <?php
                            $brand = new Gianvien();
                            $brandlist = $brand->show_Monhoc();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option

                            <?php
                            if($result['IDBoMon']==$result_product['IDBoMon']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['IDBoMon'] ?>"><?php echo $result['TenBoMon'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <textarea name="DiaChi" class="tinymce"><?php echo $result_product['DiaChi'] ?></textarea>
                    </td>
                </tr>

        
                <tr>
                    <td>
                        <label>Ảnh 3 x 4</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['HinhAnh'] ?>" width="90"><br>
                        <input type="file" name="HinhAnh" />
                    </td>
                </tr>
				

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Xác Nhận" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
        }

        }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


