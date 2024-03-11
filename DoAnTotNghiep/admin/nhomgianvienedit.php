<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Nhomgianvien.php' ?>
<?php
   
    if(!isset($_GET['IDNhomGV']) || $_GET['IDNhomGV']==NULL){
       echo "<script>window.location ='chucvulist.php'</script>";
    }else{
         $id = $_GET['IDNhomGV']; 
    }
     $cat = new Nhomgianvien();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $catName = $_POST['catName'];
        $GhiChu = $_POST['GhiChu'];
        $updateCat = $cat->update_Nhomgianvien($catName,$id,$GhiChu);
        
    }

?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Tên Nhóm</h2>

               <div class="block copyblock"> 
                 <?php
                if(isset($updateCat)){
                    echo $updateCat;
                }
                ?>
                <?php
                    $get_cate_name = $cat->getNhomgianvienbyId($id);
                    if($get_cate_name){
                        while($result = $get_cate_name->fetch_assoc()){
                       
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['TenNhom'] ?>" name="catName" placeholder="Nhập tên nhóm cần thay đổi..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['GhiChu'] ?>" name="GhiChu" placeholder="Ghi chú ( nếu có )..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Xác Nhận" />
                            </td>
                        </tr>
                    </table>
                </form>

                <?php
                }
            }
                

                ?>

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>