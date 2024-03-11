<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Phongban.php' ?>
<?php
    $cat = new Phongban();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $TenPhongBan = $_POST['TenPhongBan'];
        $GhiChu = $_POST['GhiChu'];
       
        $insertCat = $cat->insert_Phongban($TenPhongBan,$GhiChu);
        
    }
    if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_Phongban($id);
    }
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Phòng Ban</h2>
               <div class="block copyblock"> 
                 <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                 <form action="phongbanadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="TenPhongBan" placeholder="Hãy nhập tên phòng ban..." class="medium" />
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
                <h2>Danh Sách Phòng Ban</h2>
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
							<th>Tên Phòng Ban</th>
							<th>Ghi Chú</th>
							<th>Chức Năng</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cate = $cat->show_Phongban();
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['TenPhongBan'] ?></td>
							<td><?php echo $result['GhiChu'] ?></td>
							<td><a href="phongbanedit.php?IDPhongBan=<?php echo $result['IDPhongBan'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="?delid=<?php echo $result['IDPhongBan'] ?>">Xóa</a></td>
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