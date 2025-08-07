<?php
	class Database{
		private $hostname ='localhost:3308';
		private $username ='root';
		private $password ='';
		private $dbname ='hthttinhocdaicuong';
		private $conn = NULL;
		private $result =NULL;


		public function connect(){
			$this->conn = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
			if(!$this->conn){
				echo("Kết nối thất bại");
				exit();
			}
			else{
				
				
				
			}
			return $this->conn;

		}

		// thực thi câu lệnh truy vẫn

		public function execute($sql){
			$this->result = $this->conn->query($sql);
			return $this->result;
		}


		// phương thức lấy dữ liệu
		public function getData($sql){
			if($this->result){
				$data =mysqli_fetch_array($this->result);
			}
			else{
				$data= 0;
			}
			return $data;
		}


		// phương thức lấy toàn bộ dữ liệu

		public function getAllData($sql){
			$this->execute($sql);
			if($this->num_row()==0){
				$data= 0;
			}
			else{
				while($datas = $this->getData($sql)){
					$data[] =  $datas;
				}
			}
			return $data;
		}

		// phương thức lấy dữ liệu
		public function getDatas($sql){
			$this->execute($sql);
			$s =$this->num_row();
			if($this->num_row()==0){
				$data= 0;
				
			}
			else{
				$data = mysqli_fetch_array($this->result);
				
			}
			return $data;
		}



		public function num_row(){
			if($this->result){
				$num =mysqli_num_rows($this->result);
			}
			else{
				$num =0;
			}
			return $num;
		}
		// phương thức thêm dữ liệu

		public function ThucThi($sql)
		{
			return $this->execute($sql);
		}

		/* 
		phuong thuc them: 	INSERT INTO <TenBang>(<giatri1>,<giatri2>,...) VALUSE(<gt1>,<gt2>,...)
		phuong thuc sua: 	UPDATE <TenBang> SET<giatri1> = <gt1>,<giatri2>=<gt2>,...) WHERE id ='$id'
		phuong thuc xoa: 	DELETE FROM <TenBang> WHERE  id ='$id'
		*/
	}

?>