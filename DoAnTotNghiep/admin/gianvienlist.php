<?php require 'inc/header.php';?>
<?php require 'inc/sidebar.php';?>
<?php require '../classes/Gianvien.php';?>

<?php
	$pd = new Gianvien();
	$fm = new Format();
	if(isset($_GET['productid'])){
        $id = $_GET['productid']; 
        $delpro = $pd->del_Gianvien($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Giản Viên</h2>
        <div class="block"> 
        <?php
        if(isset($delpro)){
        	echo $delpro;
        }
        ?> 
        	
            <table class="data display datatable" id="example" style = "width:100%">
			<thead >
				<tr>
					<th>ID</th>
					<th>Chức Vụ</th>
					<th>Phòng Ban</th>
					<th>Bộ Môn</th>
					<th>Công Đoàn</th>
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

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
