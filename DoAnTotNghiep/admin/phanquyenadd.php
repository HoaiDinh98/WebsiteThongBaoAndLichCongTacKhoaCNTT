<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Phanquyen.php' ?>
<?php
    $pd = new Phanquyen();
    $cat = new Phanquyen();
?>
<div class="grid_10">
    <!-- <div class="box round first grid">
        <h2>Phân Quyền</h2>
        <div class="block">    
         <?php

                if(isset($insertProduct)){
                    echo $insertProduct;
                }

            ?>             
         <form action="themnhomgianvienadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Giảng Viên</label>
                    </td>
                    <td>
                        <select id="select" name="IDNguoiDung">
                            <option>--------Chọn Giản Viên-------</option>
                             <?php
                            $brand = new Phanquyen();
                            $brandlist = $pd->show_GV();
                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['IDNguoiDung'] ?>"><?php echo $result['HoTen'] ?></option>

                               <?php
                                  }
                              }
                           ?>    
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nhóm Quyền</label>
                    </td>
                    <td>
                        <select id="select" name="IDPhanQuyen">
                            <option>--------Chọn Nhóm-------</option>
                             <?php
                            $brand = new Phanquyen();
                            $brandlist = $pd->show_Quyen();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['IDPhanQuyen'] ?>"><?php echo $result['TenQuyen'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
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
    </div> -->
    <div class="box round first grid">
                <h2>Danh Sách Phân Quyền Người Dùng</h2>
                <div class="block">    
                <?php

                if(isset($delcat)){
                    echo $delcat;
                }

                ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số Thứ Tự</th>						
							<th>Tên Giảng Viên</th>
                            <th>Tên Quyền</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cate = $cat->show_Congdoan();
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>					
							<td><?php echo $result['HoTen'] ?></td>
                            <td><?php echo $result['TenQuyen'] ?></td>
							<!-- <td><a href="phanquyenedit.php?IDPhanQuyen=<?php echo $result['IDPhanQuyen'] ?>">Thay Đổi</a></td> -->
						</tr>
						<?php
					}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
            <div class="box round first grid">
                <h2>Danh Sách Phân Quyền Chức Vụ</h2>
                <div class="block">    
                <?php

                if(isset($delcat)){
                    echo $delcat;
                }

                ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số Thứ Tự</th>						
							<th>Tên Chức Vụ</th>
                            <th>Tên Quyền</th>
                            <th>Chức Năng</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cate = $cat->show_Chucvu();
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>					
							<td><?php echo $result['TenChucVu'] ?></td>
                            <td><?php echo $result['TenQuyen'] ?></td>
							<td><a href="phanquyenedit.php?IDChucVu=<?php echo $result['IDChucVu'] ?>">Thay Đổi</a></td>
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


