<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Nhomgianvien.php' ?>
<?php
    $cat = new Nhomgianvien();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $GhiChu = $_POST['GhiChu'];
        $insertCat = $cat->insert_Nhomgianvien($catName,$GhiChu);
        
    }
    if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_Nhomgianvien($id);
    }
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Nhóm Mới</h2>
               <div class="block copyblock"> 
                 <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                 <form action="nhomgianvienadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Hãy nhập tên nhóm..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="GhiChu" placeholder="Ghi chú ( nếu có )..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Xác Nhận" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
            <div class="box round first grid">
                <h2>Danh Sách Nhóm Giảng Viên</h2>
                <div class="block">    
                <?php

                if(isset($delcat)){
                    echo $delcat;
                }

                ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Tên Nhóm</th>
							<th>Ghi Chú</th>
							<th>Chức Năng</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cate = $cat->show_Nhomgianvien();
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['TenNhom'] ?></td>
							<td><?php echo $result['GhiChu'] ?></td>
							<td><a href="nhomgianvienedit.php?IDNhomGV=<?php echo $result['IDNhomGV'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="?delid=<?php echo $result['IDNhomGV'] ?>">Xóa</a></td>
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