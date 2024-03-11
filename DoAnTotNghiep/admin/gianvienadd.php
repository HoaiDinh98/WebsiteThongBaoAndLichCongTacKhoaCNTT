<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Gianvien.php';?>
<?php
    $pd = new Gianvien();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insertProduct = $pd->insert_Gianvien($_POST,$_FILES);
    }
    $fm = new Format();
	if(isset($_GET['productid'])){
        $id = $_GET['productid']; 
        $delpro = $pd->del_Gianvien($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Giảng Viên</h2>
        <div class="block">    
         <?php

                if(isset($insertProduct)){
                    echo $insertProduct;
                }

            ?>             
         <form action="gianvienadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Họ tên giảng viên</label>
                    </td>
                    <td>
                        <input type="text" name="HoTen" placeholder="Họ và tên giảng viên..." class="medium" />
                    </td>
                </tr>
				
                <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input type="text" name="SDT" placeholder="Số điện thoại liên lạc..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giới tính</label>
                    </td>
                    <td>
                        <select id="select" name="GioiTinh">
                        <option>--------Chọn Giới tính--------</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </td>
                        </select>
                    </td>
                </tr>
               <tr>
                    <td>
                        <label>Ngày sinh</label>
                    </td>
                    <td>
                        <input type="date" name="NgaySinh" placeholder="Ngày Sinh..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày vào làm</label>
                    </td>
                    <td>
                        <input type="date" name="NgayVaoLam" placeholder="Ngày Vào Làm..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày tạo tài khoản</label>
                    </td>
                    <td>
                        <input type="date" name="NgayTaoTK" placeholder="Ngày Tạo Tài Khoản..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="Email" placeholder="Email..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mật khẩu</label>
                    </td>
                    <td>
                        <input type="text" name="MatKhau" placeholder="Mật Khẩu..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Xác nhận mật khẩu</label>
                    </td>
                    <td>
                        <input type="text" name="MatKhau" placeholder="Xác Nhận Mật Khẩu..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chức vụ</label>
                    </td>
                    <td>
                        <select id="select" name="IDChucVu">
                            <option>--------Chọn Chức Vụ--------</option>
                            <?php
                            $cat = new Gianvien();
                            $catlist = $pd->show_ChucVu();

                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['IDChucVu'] ?>"><?php echo $result['TenChucVu'] ?></option>

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
                            <option>--------Chọn Phòng Ban--------</option>
                            <?php
                            $cat = new Gianvien();
                            $catlist = $pd->show_Phongban();

                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['IDPhongBan'] ?>"><?php echo $result['TenPhongBan'] ?></option>

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
                            $brandlist = $pd->show_Congdoan();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['IDCongDoan'] ?>"><?php echo $result['TenCongDoan'] ?></option>

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
                            $brandlist = $pd->show_Monhoc();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['IDBoMon'] ?>"><?php echo $result['TenBoMon'] ?></option>

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
                        <textarea name="DiaChi" class="tinymce"></textarea>
                    </td>
                </tr>

            
                <tr>
                    <td>
                        <label>Ảnh 3 x 4</label>
                    </td>
                    <td>
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
        </div>
    </div>
    <div class="box round first grid">
        <h2>Danh Sách Giảng Viên</h2>
        <div class="block"> 
        <?php
        if(isset($delpro)){
        	echo $delpro;
        }
        ?> 
        	
            <table class="data display datatable" id="example" style = "width:100%">
			<thead >
				<tr>
					<th>STT</th>
					<th>Chức Vụ</th>
					<th>Phòng Ban</th>
					<th>Bộ Môn</th>
					<th>Tổ Chức</th>
					<th>Họ Tên</th>
					<th>Ngày Sinh</th>
					<th>Ngày Vào Làm</th>
					<th>Ngày Tạo</th>
					<th>Giới Tính</th>
					<th>SDT</th>
					<th>Email</th>
					<th>Mật Khẩu</th>
					<th>Ảnh 3 x 4</th>
					<th>Địa Chỉ</th>
					<th>Chức Năng</th>
				</tr>
			</thead>
			<tbody>
				<?php
			
				$pdlist = $pd->show_Gianvien();
				if($pdlist){
					$i = 0;
					while($result = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['TenChucVu'] ?></td>
					<td><?php echo $result['TenPhongBan'] ?></td>
					<td><?php echo $result['TenBoMon'] ?></td>
					<td><?php echo $result['TenCongDoan'] ?></td>
					<td><?php echo $result['HoTen'] ?></td>
					<td><?php echo $result['NgaySinh'] ?></td>
					<td><?php echo $result['NgayVaoLam'] ?></td>
					<td><?php echo $result['NgayTaoTK'] ?></td>
					<td><?php echo $result['GioiTinh'] ?></td>
					<td><?php echo $result['SDT'] ?></td>
					<td><?php echo $result['Email'] ?></td>
					<td><?php echo $result['MatKhau'] ?></td>
					
					<td><img src="uploads/<?php echo $result['HinhAnh'] ?>" width="80"></td>
					<td><?php echo $result['DiaChi'] ?></td>
					
					<td><a href="gianvienedit.php?productid=<?php echo $result['IDNguoiDung'] ?>">Thay Đổi</a> || <a href="?productid=<?php echo $result['IDNguoiDung'] ?>">Xóa</a></td>
				</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>

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


