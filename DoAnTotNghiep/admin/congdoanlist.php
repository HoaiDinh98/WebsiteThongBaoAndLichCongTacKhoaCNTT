<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Congdoan.php' ?>
<?php
    $cat = new Congdoan();
     if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_Congdoan($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Tổ Chức Chính Trị Xã Hội </h2>
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
							<th>Tên Tổ Chức</th>
							<th>Ghi Chú</th>
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
							<td><?php echo $result['TenCongDoan'] ?></td>
							<td><?php echo $result['GhiChu'] ?></td>
							<td><a href="congdoanedit.php?IDCongDoan=<?php echo $result['IDCongDoan'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="?delid=<?php echo $result['IDCongDoan'] ?>">Xóa</a></td>
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

