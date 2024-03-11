<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Congdoan.php' ?>
<?php
    $cat = new Congdoan();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $TenCongDoan = $_POST['TenCongDoan'];
        $GhiChu = $_POST['GhiChu'];
        
       
        $insertCat = $cat->insert_Congdoan($TenCongDoan,$GhiChu);
        
    }
    if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_Congdoan($id);
    }
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Tổ Chức Chính Trị Xã Hội</h2>

               <div class="block copyblock"> 
                 <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                 <form action="congdoanadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="TenCongDoan" placeholder="Hãy nhập tên của tổ chức..." class="medium" />
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
                <h2>Tổ Chức Của Giản Viên</h2>
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
							<th>Tên Giảng Viên</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cate = $cat->show_Doanvien();
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['TenCongDoan'] ?></td>
							<td><?php echo $result['HoTen'] ?></td>
						
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