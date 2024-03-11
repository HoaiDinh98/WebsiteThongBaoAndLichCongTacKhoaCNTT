<?php
	$filepath = realpath(dirname(__FILE__));
	require '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Gianvien
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function search_Gianvien($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM nguoidung WHERE HoTen LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

		}
		public function insert_Gianvien($data,$files){		

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
				$alert = "<span class='error'>Vui lòng điền đầy đủ thông tin</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM nguoidung WHERE Email='$Email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Email này đã được sử dụng!</span>";
					return $alert;
				}
				else
				{
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO nguoidung(IDChucVu,IDPhongBan,IDBoMon,IDCongDoan,HoTen,NgaySinh,NgayVaoLam,NgayTaoTK,GioiTinh,SDT,Email,MatKhau,HinhAnh,DiaChi) VALUES('$IDChucVu','$IDPhongBan','$IDBoMon','$IDCongDoan','$HoTen','$NgaySinh','$NgayVaoLam','$NgayTaoTK','$GioiTinh','$SDT','$Email','$MatKhau','$unique_image','$DiaChi')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm giảng viên thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm thất bại</span>";
						return $alert;
					}
			}
			}
		}
        public function createPhanQuyen($pdo,$IDPhanQuyen,$IDNguoiDung)
        {
            
            $sql = "INSERT INTO phanquyen(IDPhanQuyen,IDNguoiDung)
             VALUES (:IDPhanQuyen,:IDNguoiDung)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':IDPhanQuyen', $IDPhanQuyen, PDO::PARAM_INT);
            $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
                $data = $product;
                return $data;
            }
            
        }
		public function show_Gianvien(){
			$query = "

			SELECT nguoidung.*, bomon.TenBoMon, phongban.TenPhongBan ,chucvu.TenChucVu, congdoan.TenCongDoan

			FROM nguoidung 

			INNER JOIN bomon ON nguoidung.IDBoMon = bomon.IDBoMon

			INNER JOIN phongban ON nguoidung.IDPhongBan = phongban.IDPhongBan 

			INNER JOIN chucvu ON nguoidung.IDChucVu = chucvu.IDChucVu

			INNER JOIN congdoan ON nguoidung.IDCongDoan = congdoan.IDCongDoan 

			Where nguoidung.IDChucVu !=5

			order by nguoidung.IDNguoiDung desc"
			;

			// $query = "SELECT * FROM tbl_product order by productId desc";

			$result = $this->db->select($query);
			return $result;
		}

		public function update_Gianvien($data,$files,$id){
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
					if ($file_size > 80480) {

		    		 $alert = "<span class='success'>Kích thước hình ảnh nên nhỏ hơn 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>Vui lòng chọn ảnh đúng định dạng:-".implode(', ', $permited)."</span>";
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
						$alert = "<span class='success'>Đã thay đổi thông tin giảng viên</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thay đổi thất bại</span>";
						return $alert;
					}
				
			}

		}

		public function del_Gianvien($id){
			$query = "DELETE FROM `nguoidung` WHERE IDNguoiDung = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Đã xóa giảng viên</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}

		public function getGianvienbyId($id){
			$query = "SELECT * FROM nguoidung where IDNguoiDung = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_GV_Nhom(){
			$query = "SELECT * FROM nguoidung order by IDNguoiDung desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_Phongban(){
			$query = "SELECT * FROM phongban order by IDPhongBan desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_Congdoan(){
			$query = "SELECT * FROM congdoan order by IDCongDoan desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_Nhomgianvien(){
			$query = "SELECT * FROM danhsachgvnhan order by IDNhomGV desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_Monhoc(){
			$query = "SELECT * FROM bomon order by IDBoMon desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insert_Chucvu($TenChucVu,$GhiChu){

			$catName = $this->fm->validation($TenChucVu);
			$catName = mysqli_real_escape_string($this->db->link, $TenChucVu);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			
			if(empty($catName)){
				$alert = "<span class='error'>Tên chức vụ không thể để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM chucvu WHERE TenChucVu='$TenChucVu' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Chức vụ đã tồn tại</span>";
					return $alert;
				}else
					{
					$query = "INSERT INTO chucvu(TenChucVu,GhiChu) VALUES('$TenChucVu','$GhiChu')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm chức vụ thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm thất bại</span>";
						return $alert;
					}
				}
		}

		}
		public function show_ChucVu(){
			$query = "SELECT * FROM chucvu where IDChucVu !=5 order by IDChucVu desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_Chucvu($catName,$id,$GhiChu){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Tên chức vụ không thể để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM chucvu WHERE TenChucVu='$catName' LIMIT 1";
				$result_check = $this->db->select($check_email);
				// if($result_check){
				// 	$alert = "<span class='error'>Chức vụ đã tồn tại</span>";
				// 	return $alert;
				// }
				$query = "UPDATE chucvu SET TenChucVu = '$catName' , GhiChu = '$GhiChu' WHERE IDChucVu = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi chức vụ thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			}

		}
		public function del_Chucvu($id){
			$query = "DELETE FROM chucvu where IDChucVu = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		public function getChucvubyId($id){
			$query = "SELECT * FROM chucvu where IDChucVu = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_Chucvu_fontend(){
			$query = "SELECT * FROM chucvu order by IDChucVu desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id){
			$query = "SELECT * FROM chucvu WHERE IDChucVu='$id' order by IDChucVu desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id){
			$query = "SELECT nguoidung.*,chucvu.TenChucVu,chucvu.IDChucVu FROM nguoidung,chucvu WHERE nguoidung.IDChucVu=chucvu.IDChucVu AND nguoidung.IDChucVu ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}



	}
?>