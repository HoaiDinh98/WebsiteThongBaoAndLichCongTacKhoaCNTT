<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Themnhomgv.php' ?>
<?php
    $pd = new Themnhom();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        $IDNhomGV = $_POST['IDNhomGV'];
        $GhiChu = $_POST['IDNguoiDung'];
        $insertProduct = $pd->insert_NhomGV_GV($IDNhomGV,$GhiChu);
        
    }
    $cat = new Themnhom();
     if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_Congdoan($id);
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
                            $brand = new Themnhom();
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
                        <label>Nhóm Giảng Viên</label>
                    </td>
                    <td>
                        <select id="select" name="IDNhomGV">
                            <option>--------Chọn Nhóm-------</option>
                             <?php
                            $brand = new Themnhom();
                            $brandlist = $pd->show_Nhomgianvien();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['IDNhomGV'] ?>"><?php echo $result['TenNhom'] ?></option>

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
    </div>
    <div class="box round first grid">
                <h2>Danh Sách Nhóm Của Giảng Viên</h2>
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
							<th>Tên Nhóm</th>
							<th>Tên Giảng Viên</th>
							<th>Chức Năng</th>
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
							<td><?php echo $result['TenNhom'] ?></td>
							<td><?php echo $result['HoTen'] ?></td>
							<td><a href="themnhomgianvienedit.php?IDNhomGV=<?php echo $result['IDNhomGV'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="?delid=<?php echo $result['IDNguoiDung'] ?>">Xóa</a></td>
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


