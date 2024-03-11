<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Loaithongbao.php' ?>
<?php
    $brand = new Loaithongbao();
     if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delbrand = $brand->del_Loaithongbao($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Loại Thông Báo</h2>
                <div class="block">    
                <?php
                if(isset($delbrand)){
                    echo $delbrand;
                }
                ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sô Thứ Tự</th>
							<th>Tên Loại Thông Báo</th>
							<th>Chức Năng</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_brand = $brand->show_Loaithongbao();
						if($show_brand){
							$i = 0;
							while($result = $show_brand->fetch_assoc()){
								$i++;							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['TenLoaiThongBao'] ?></td>
							<td><a href="loaithongbaoedit.php?IDLoaiThongBao=<?php echo $result['IDLoaiThongBao'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="?delid=<?php echo $result['IDLoaiThongBao'] ?>">Xóa</a></td>
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

