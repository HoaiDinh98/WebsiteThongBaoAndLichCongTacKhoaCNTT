<?php include '../init.php' ;?>  
<?php include '../inc/header.php';?>
<?php include '../classes/Themnhomgv.php' ?>
<?php include 'header.php' ;?>    
<?php include 'menuleft.php' ;?>  
<?php
    if(!isset($_GET['IDNhomGV']) || $_GET['IDNhomGV']==NULL){
        echo "<script>window.location ='themnhomgianvienlist.php'</script>";
     }else{
          $id = $_GET['IDNhomGV']; 
     }
      $cat = new Themnhom();
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $catName = $_POST['IDNhomGV'];
         $GhiChu = $_POST['IDNguoiDung'];
         $updateCat = $cat->update_Congdoan($catName,$id,$GhiChu);
         
     }
   
?>
<div class="col-10">

    <div class=" text-left" style="margin-top:5vh;">
            <div class=" " style="height: 700px;margin-top: 70px">
                <div class="box round first grid">
                <h2>Thay Đổi Thông Tin Giản Viên</h2>
                <div class="block ">    
                <?php
                        if(isset($updateCat)){
                            echo $updateCat;
                        }

                    ?>        
                
                <?php
                $get_cate_name = $cat->getCongdoanbyId($id);
                if($get_cate_name){
                    while($result_product = $get_cate_name->fetch_assoc()){   
                ?>  
                <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                        <tr>
                            <td>
                                <label>Tên Giảng Viên</label>
                            </td>
                            <td>
                                <select id="select" name="IDNguoiDung">
                                    <option>--------Chọn Giảng Viên-------</option>

                                    <?php
                                    $brand = new Themnhom();
                                    $brandlist = $brand->show_GV();

                                    if($brandlist){
                                        while($result = $brandlist->fetch_assoc()){
                                    ?>

                                    <option

                                    <?php
                                    if($result['IDNguoiDung']==$result_product['IDNguoiDung']){ echo 'selected';  }
                                    ?>
                                    value="<?php echo $result['IDNguoiDung'] ?>"><?php echo $result['HoTen'] ?></option>

                                    <?php
                                        }
                                    }
                                ?>
                                
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nhóm Giảng Viên</label>
                            </td>
                            <td>
                                <select id="select" name="IDNhomGV" >
                                    <option>--------Chọn Nhóm Giảng Viên-------</option>

                                    <?php
                                    $brand = new Themnhom();
                                    $brandlist = $brand->show_Nhomgianvien();

                                    if($brandlist){
                                        while($result = $brandlist->fetch_assoc()){
                                    ?>

                                    <option

                                    <?php
                                    if($result['IDNhomGV']==$result_product['IDNhomGV']){ echo 'selected';  }
                                    ?>
                                    value="<?php echo $result['IDNhomGV'] ?>"><?php echo $result['TenNhom'] ?></option>

                                    <?php
                                        }
                                    }
                                ?>
                                
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
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
    </div>

</div>

<?php include 'footer.php';?>  

