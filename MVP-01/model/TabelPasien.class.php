<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien() //select all data 
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasienDetail($id) //funsgi select pasien by id
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function add($data){ //fungsi untuk menambahkan data

		$nik = $data['nik'];
        $nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

        $query = "INSERT INTO pasien VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";

        // Mengeksekusi query
        return $this->execute($query);

    }

	function update($data) //fungsi update data
    {
		$id = $data['id'];
		$nik = $data['nik'];
        $nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];


        $query = "update pasien       
                  set nik = '$nik',
				  nama = '$nama',
				  tempat = '$tempat',
				  tl = '$tl',
				  gender = '$gender',
				  email = '$email',
				  telp = '$telp'
                  where id = '$id'";

        return $this->execute($query);
    }

	function delete($id) //fungsi delete data
    {

        $query = "DELETE FROM pasien where id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
