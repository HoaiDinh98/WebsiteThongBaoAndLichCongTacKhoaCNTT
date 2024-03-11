<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Chucvu.php' ?>
<?php
    $cat = new Chucvu();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $GhiChu = $_POST['GhiChu'];
        $insertCat = $cat->insert_Chucvu($catName,$GhiChu);
        
    }
    if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_Chucvu($id);
    }
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Chức Vụ</h2>
               <div class="block copyblock"> 
                 <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                 <form action="chucvuadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Hãy nhập tên chức vụ..." class="medium" />
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
                <h2>Danh Sách Chức Vụ</h2>
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
							<th>Ghi Chú</th>
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
							<td><?php echo $result['GhiChu'] ?></td>
							<td><a href="chucvuedit.php?catid=<?php echo $result['IDChucVu'] ?>">Thay Đổi</a> || <a onclick = "return confirm('Bạn có chắc chắn xóa không?')" href="?delid=<?php echo $result['IDChucVu'] ?>">Xóa</a></td>
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