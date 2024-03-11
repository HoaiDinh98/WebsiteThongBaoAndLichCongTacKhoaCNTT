<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Monhoc.php' ?>
 <?php
    $brand = new Monhoc();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];
        $insertBrand = $brand->insert_Monhoc($brandName);
        
    }
    if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delbrand = $brand->del_Monhoc($id);
    }
?> 
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Bộ Môn</h2>
               <div class="block copyblock"> 
                <?php
                if(isset($insertBrand)){
                    echo $insertBrand;
                }
                ?> 
                 <form action="bomonadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Hãy nhập tên môn cần thêm..." class="medium" />
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
                <h2>Danh Sách Bộ Môn</h2>
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
							<th>Tên Bộ Môn</th>
							<th>Chức Năng</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_brand = $brand->show_Monhoc();
						if($show_brand){
							$i = 0;
							while($result = $show_brand->fetch_assoc()){
								$i++;							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['TenBoMon'] ?></td>
							<td><a href="bomonedit.php?IDBoMon=<?php echo $result['IDBoMon'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="?delid=<?php echo $result['IDBoMon'] ?>">Xóa</a></td>
						</tr>
						<?php
					}
						}
						?>
					</tbody>
				</table>
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