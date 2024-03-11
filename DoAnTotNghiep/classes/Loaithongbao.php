<?php
	$filepath = realpath(dirname(__FILE__));
	require '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Loaithongbao
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_Loaithongbao($TenLoaiThongBao){

			$brandName = $this->fm->validation($TenLoaiThongBao);
			$brandName = mysqli_real_escape_string($this->db->link, $TenLoaiThongBao);
			if(empty($TenLoaiThongBao)){
				$alert = "<span class='error'>Tên môn học không thể để trống</span>";
				return $alert;
			}
			else{
				$check_email = "SELECT * FROM loaithongbao WHERE TenLoaiThongBao='$TenLoaiThongBao' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Tên loại thông báo đã tồn tại</span>";
					return $alert;
				}else
				{
					$query = "INSERT INTO loaithongbao(TenLoaiThongBao) VALUES('$TenLoaiThongBao')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm loại thông báo thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Không thê thêm loại thông báo</span>";
						return $alert;
					}
			}
			}
		}
		public function show_Loaithongbao(){
			$query = "SELECT * FROM loaithongbao order by IDLoaiThongBao desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLoaithongbaobyId($id){
			$query = "SELECT * FROM loaithongbao where IDLoaiThongBao = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_Loaithongbao($TenLoaiThongBao,$id){

			$brandName = $this->fm->validation($TenLoaiThongBao);
			$brandName = mysqli_real_escape_string($this->db->link, $TenLoaiThongBao);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($brandName)){
				$alert = "<span class='error'>Tên loại thông báo không thể để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM loaithongbao WHERE TenLoaiThongBao='$TenLoaiThongBao' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Tên loại thông báo đã tồn tại</span>";
					return $alert;
				}
				$query = "UPDATE loaithongbao SET TenLoaiThongBao = '$TenLoaiThongBao' WHERE IDLoaiThongBao = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi tên loại thông báo thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			}

		}
		public function del_Loaithongbao($id){
			$query = "DELETE FROM loaithongbao where IDLoaiThongBao = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa loại thông báo thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		

	}
?>