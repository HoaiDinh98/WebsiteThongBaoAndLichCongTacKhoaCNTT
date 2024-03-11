<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Monhoc.php' ?>
<?php
   
    if(!isset($_GET['IDBoMon']) || $_GET['IDBoMon']==NULL){
       echo "<script>window.location ='bomonlist.php'</script>";
    }else{
         $id = $_GET['IDBoMon']; 
    }
     $brand = new Monhoc();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $brandName = $_POST['TenBoMon'];
        $updateBrand = $brand->update_Monhoc($brandName,$id);
        
    }

?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Tên Bộ Môn</h2>

               <div class="block copyblock"> 
                 <?php
                if(isset($updateBrand)){
                    echo $updateBrand;
                }
                ?>
                <?php
                    $get_brand_name = $brand->getMonhocbyId($id);
                    if($get_brand_name){
                        while($result = $get_brand_name->fetch_assoc()){
                       
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['TenBoMon'] ?>" name="TenBoMon" placeholder="Tên môn học cần thay đổi..." class="medium" />
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