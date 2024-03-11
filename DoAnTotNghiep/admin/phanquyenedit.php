<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Phanquyen.php' ?>
<?php include_once '../classes/Database.php';
$db = new Database();
$pdo = $db->getConnect(); ?>
<?php
    if(!isset($_GET['IDChucVu']) || $_GET['IDChucVu']==NULL){
        echo "<script>window.location ='phanquyenadd.php'</script>";
     }else{
          $id = $_GET['IDChucVu']; 
     }
      $cat = new Phanquyen();
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $IDPhanQuyen = $_POST['phanquyen'];
         $updateCat = $cat->update($pdo,$id,$IDPhanQuyen);                
         if ($updateCat) {
               
            echo "<script>window.location ='phanquyenadd.php'</script>";
         } else {
             echo 'Error creating product';
         }
     }else{
        $get_cate_name = $cat->getCongdoanbyId($id);
        $result_product = $get_cate_name->fetch_assoc();
     }
     

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thay đổi quyền giảng viên</h2>
        <div class="block ">    
         <?php
                if(isset($updateCat)){
                    echo $updateCat;
                }

            ?>        
         

         <form action="" method="post" enctype="multipart/form-data">
         <table class="form">
         <tr>
                    <td>
                        <label>Tên Chức Vụ</label>
                    </td>
                    <td>

                        <input style="width: 190px;" value="<?php echo $result_product['TenChucVu'] ?>" name="IDChucVu" disabled placeholder="Nhập tên chức vụ cần thay đổi..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tên Quyền</label>
                    </td>
                    <td>

                        <select id="select" name="phanquyen" value='<?php echo $result_product['TenQuyen'] ?>'>
                                                               
                                                               <?php
                                                                    $brand = new Phanquyen();
                                                                   $Cats = $brand->show_Quyen();
                                                                   foreach ($Cats as $Cat) {
                                                                   echo "<option value='{$Cat['IDPhanQuyen']}'>{$Cat['TenQuyen']} </option>";

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
</div>
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


