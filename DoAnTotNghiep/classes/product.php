<?php

	$filepath = realpath(dirname(__FILE__));
	require '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class product
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function search_product($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM nguoidung WHERE HoTen LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

		}
		public function insert_product($data,$files){		

			$IDChucVu = mysqli_real_escape_string($this->db->link, $data['IDChucVu']);
			$IDPhongBan = mysqli_real_escape_string($this->db->link, $data['IDPhongBan']);
			$IDBoMon = mysqli_real_escape_string($this->db->link, $data['IDBoMon']);
			$IDCongDoan = mysqli_real_escape_string($this->db->link, $data['IDCongDoan']);

			$HoTen = mysqli_real_escape_string($this->db->link, $data['HoTen']);
			$NgaySinh = mysqli_real_escape_string($this->db->link, $data['NgaySinh']);
			$NgayVaoLam = mysqli_real_escape_string($this->db->link, $data['NgayVaoLam']);
			$NgayTaoTK = mysqli_real_escape_string($this->db->link, $data['NgayTaoTK']);
			$GioiTinh = mysqli_real_escape_string($this->db->link, $data['GioiTinh']);
			$SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
			$Email = mysqli_real_escape_string($this->db->link, $data['Email']);
			$MatKhau = mysqli_real_escape_string($this->db->link, $data['MatKhau']);
			$DiaChi = mysqli_real_escape_string($this->db->link, $data['DiaChi']);




			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['HinhAnh']['name'];
			$file_size = $_FILES['HinhAnh']['size'];
			$file_temp = $_FILES['HinhAnh']['tmp_name'];
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = $file_name;
			$uploaded_image = "uploads/".$unique_image;
			
			if($IDChucVu=="" || $IDPhongBan=="" || $IDBoMon=="" || $IDCongDoan=="" || $HoTen=="" || $NgaySinh == ""|| $NgayVaoLam=="" || $NgayTaoTK =="" || $GioiTinh =="" || $SDT =="" || $Email =="" || $MatKhau ==""|| $DiaChi =="" ){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM nguoidung WHERE Email='$Email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Product Name Already Exist</span>";
					return $alert;
				}
				else
				{
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO nguoidung(IDChucVu,IDPhongBan,IDBoMon,IDCongDoan,HoTen,NgaySinh,NgayVaoLam,NgayTaoTK,GioiTinh,SDT,Email,MatKhau,HinhAnh,DiaChi) VALUES('$IDChucVu','$IDPhongBan','$IDBoMon','$IDCongDoan','$HoTen','$NgaySinh','$NgayVaoLam','$NgayTaoTK','$GioiTinh','$SDT','$Email','$MatKhau','$unique_image','$DiaChi')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm giản viên thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm thất bại</span>";
						return $alert;
					}
			}
			}
		}
		public function insert_slider($data,$files){
			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sliderName=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Slider Added Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Slider Added Not Success</span>";
						return $alert;
					}
				}
				
				
			}
		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_product(){
			$query = "

			SELECT nguoidung.*, bomon.TenBoMon, phongban.TenPhongBan ,chucvu.TenChucVu, congdoan.TenCongDoan, danhsachgvnhan.TenNhom

			FROM nguoidung 

			INNER JOIN bomon ON nguoidung.IDBoMon = bomon.IDBoMon

			INNER JOIN phongban ON nguoidung.IDPhongBan = phongban.IDPhongBan 

			INNER JOIN chucvu ON nguoidung.IDChucVu = chucvu.IDChucVu

			INNER JOIN congdoan ON nguoidung.IDCongDoan = congdoan.IDCongDoan 

			order by nguoidung.IDNguoiDung desc";

			// $query = "SELECT * FROM tbl_product order by productId desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id){
			$query = "DELETE FROM tbl_slider where sliderId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Slider Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Slider Deleted Not Success</span>";
				return $alert;
			}
		}
		public function update_product($data,$files,$id){
			$IDChucVu = mysqli_real_escape_string($this->db->link, $data['IDChucVu']);
			
			$IDPhongBan = mysqli_real_escape_string($this->db->link, $data['IDPhongBan']);
			$IDBoMon = mysqli_real_escape_string($this->db->link, $data['IDBoMon']);
			$IDCongDoan = mysqli_real_escape_string($this->db->link, $data['IDCongDoan']);

			$HoTen = mysqli_real_escape_string($this->db->link, $data['HoTen']);
			$NgaySinh = mysqli_real_escape_string($this->db->link, $data['NgaySinh']);
			$NgayVaoLam = mysqli_real_escape_string($this->db->link, $data['NgayVaoLam']);
			$NgayTaoTK = mysqli_real_escape_string($this->db->link, $data['NgayTaoTK']);
			$GioiTinh = mysqli_real_escape_string($this->db->link, $data['GioiTinh']);
			$SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
			$Email = mysqli_real_escape_string($this->db->link, $data['Email']);
			$MatKhau = mysqli_real_escape_string($this->db->link, $data['MatKhau']);
			$DiaChi = mysqli_real_escape_string($this->db->link, $data['DiaChi']);



			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['HinhAnh']['name'];
			$file_size = $_FILES['HinhAnh']['size'];
			$file_temp = $_FILES['HinhAnh']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr((time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($IDChucVu=="" || $IDPhongBan=="" || $IDBoMon=="" || $IDCongDoan=="" || $HoTen=="" || $NgaySinh == ""|| $NgayVaoLam=="" || $NgayTaoTK =="" || $GioiTinh =="" || $SDT =="" || $Email =="" || $MatKhau ==""|| $DiaChi =="" ){
				$alert = "<span class='error'>Nhập đầy đủ thông tin</span>";
				return $alert;
			}else{
				// $check_email = "SELECT * FROM tbl_product WHERE productName='$productName' LIMIT 1";
				// $result_check = $this->db->select($check_email);
				// if($result_check){
				// 	$alert = "<span class='error'>Product Name Already Exist</span>";
				// 	return $alert;
				// }
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 20480) {

		    		 $alert = "<span class='success'>Kích thước hình ảnh nên nhỏ hơn 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE nguoidung SET HinhAnh ='$unique_image' , IDChucVu = '$IDChucVu', IDPhongBan = '$IDPhongBan', IDBoMon = '$IDBoMon', IDCongDoan = '$IDCongDoan', HoTen = '$HoTen', NgaySinh = '$NgaySinh', NgayVaoLam = '$NgayVaoLam', NgayTaoTK = '$NgayTaoTK', GioiTinh = '$GioiTinh', SDT = '$SDT', Email = '$Email', MatKhau = '$MatKhau', DiaChi = '$DiaChi' WHERE IDNguoiDung = '$id'";
					
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE nguoidung SET  IDChucVu = '$IDChucVu', IDPhongBan = '$IDPhongBan', IDBoMon = '$IDBoMon', IDCongDoan = '$IDCongDoan', HoTen = '$HoTen', NgaySinh = '$NgaySinh', NgayVaoLam = '$NgayVaoLam', NgayTaoTK = '$NgayTaoTK', GioiTinh = '$GioiTinh', SDT = '$SDT', Email = '$Email', MatKhau = '$MatKhau', DiaChi = '$DiaChi' WHERE IDNguoiDung = '$id'";
					
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Đã thay đổi thông tin giản viên</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thay đổi thất bại</span>";
						return $alert;
					}
				
			}

		}

		public function del_product($id){
			$query = "DELETE FROM `nguoidung` WHERE IDNguoiDung = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Đã xóa giản viên</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		public function del_wlist($proid,$customer_id){
			$query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id'";
			$result = $this->db->delete($query);
			return $result;
		}
		public function getproductbyId($id){
			$query = "SELECT * FROM nguoidung where IDNguoiDung = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		//END BACKEND 
		public function getproduct_feathered(){
			$query = "SELECT * FROM tbl_product where type = '0' order by productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;
		} 
		
		public function getproduct_new(){
			$query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		} 
		public function get_details($id){
			$query = "

			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'

			";

			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestDell(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '6' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestOppo(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '3' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestHuawei(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '4' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestSamsung(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '2' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_compare($customer_id){
			$query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_wishlist($customer_id){
			$query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertCompare($productid, $customer_id){
			
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_compare = $this->db->select($check_compare);

			if($result_check_compare){
				$msg = "<span class='error'>Product Already Added to Compare</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_compare = $this->db->insert($query_insert);

			if($insert_compare){
						$alert = "<span class='success'>Added Compare Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Added Compare Not Success</span>";
						return $alert;
					}
			}
		}
		public function insertWishlist($productid, $customer_id){
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "<span class='error'>Product Already Added to Wishlist</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span class='success'>Added to Wishlist Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Added to Wishlist Not Success</span>";
						return $alert;
					}
			}
		}


	}
?>