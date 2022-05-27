<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;
	private $data_form = null;
	private $data = null;

	function TampilPasien()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$this->data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td class='table-secondary' align='center'>
				<a href='index.php?id_edit=". $this->prosespasien->getId($i) . "' id='text-edit' class='text-edit'><i id='edit' class='fa fa-fw fa-edit'></i> Edit</a> |
				<a href='index.php?id_hapus=". $this->prosespasien->getId($i) . "' id='text-delete' class='text-delete'><i id='delete' class='fa fa-fw fa-trash'></i> Delete</a> 
			</td>";
			
		}

	}

	function delete($id){

		$data = $this->prosespasien->prosesDelete($id);

	}
	

	function addform()
	{

		$this->data_form .= "<h2 class='card-title'>Tambah Pasien</h2>
				<form action='". $this->prosespasien->prosesAdd() ."' method='POST'>
					<div class='form-row'>
						<div class='form-group col'>
						<label for='nama'>Nama Pasien</label>
						<input type='text' class='form-control' name='nama' required />
						</div>
					</div>

					<div class='form-row'>
						<div class='form-group col'>
						<label for='nik'>NIK</label>
						<input type='text' class='form-control' name='nik' required />
						</div>
					</div>

					<div class='form-row'>
						<div class='form-group col'>
						<label for='tempat'>Tempat Lahir</label>
						<input type='text' class='form-control' name='tempat' required />
						</div>
					</div>

					<div class='form-row'>
						<div class='form-group col'>
						<label for='tl'>Tanggal Lahir</label>
						<input class='form-control' type='date' name='tl' required />
						</div>
					</div>
				
					<div class='row'>
						<div class='form-group col'>
						<label for='gender'>Gender</label>
						<div class='col-sm-10'>
							<div class='form-check'>
							<input class='form-check-input' type='radio' name='gender' id='gender' value='Perempuan' />
							<label class='form-check-label' for='gender'>Perempuan</label>
							</div>
							<div class='form-check'>
							<input class='form-check-input' type='radio' name='gender' id='gender' value='Laki-laki' />
							<label class='form-check-label' for='gender'>Laki-laki</label>
							</div>
						</div>
						</div>
					</div>

					<div class='form-row'>
						<div class='form-group col'>
						<label for='email'>Email</label>
						<input type='email' class='form-control' name='email' required />
						</div>
					</div>

					<div class='form-row'>
						<div class='form-group col'>
						<label for='telp'>No Telepon</label>
						<input type='text' class='form-control' name='telp' required />
						</div>
					</div>
				
					<button type='submit' name='add' class='btn btn-primary'>Add</button>
				</form>";


	}

	function editform($id)
	{

		$data = [];
		$data = $this->prosespasien->getUpdate($id);
		
		$this->data_form .= "<h2 class='card-title'>Update Pasien</h2>
							<form action='". $this->prosespasien->prosesUpdate() ."' method='POST'>
								<input type='hidden' name='id' value='". $id ."'>
								<div class='form-row'>
									<div class='form-group col'>
									<label for='nama'>Nama Pasien</label>
									<input type='text' class='form-control' name='nama' required value='". $data['nama']."'/>
									</div>
								</div>

								<div class='form-row'>
									<div class='form-group col'>
									<label for='nik'>NIK</label>
									<input type='text' class='form-control' name='nik' required value='". $data['nik']."'/>
									</div>
								</div>

								<div class='form-row'>
									<div class='form-group col'>
									<label for='tempat'>Tempat Lahir</label>
									<input type='text' class='form-control' name='tempat' required value='". $data['tempat']."'/>
									</div>
								</div>

								<div class='form-row'>
									<div class='form-group col'>
									<label for='tl'>Tanggal Lahir</label>
									<input class='form-control' type='date' name='tl' required value='". $data['tl']."'/>
									</div>
								</div>
							
								<div class='row'>
									<div class='form-group col'>
									<label for='gender'>Gender</label>
									<div class='col-sm-10'>
										<div class='form-check'>
										<input class='form-check-input' type='radio' name='gender' id='gender' value='Perempuan' ". (($data['gender'] == "Perempuan") ? "checked='checked'":'')."/>
										<label class='form-check-label' for='gender'>Perempuan</label>
										</div>
										<div class='form-check'>
										<input class='form-check-input' type='radio' name='gender' id='gender' value='Laki-laki' ". (($data['gender'] == "Laki-laki") ? "checked='checked'":'')."/>
										<label class='form-check-label' for='gender'>Laki-laki</label>
										</div>
									</div>
									</div>
								</div>

								<div class='form-row'>
									<div class='form-group col'>
									<label for='email'>Email</label>
									<input type='email' class='form-control' name='email' required value='". $data['email']."'/>
									</div>
								</div>

								<div class='form-row'>
									<div class='form-group col'>
									<label for='telp'>No Telepon</label>
									<input type='text' class='form-control' name='telp' required value='". $data['telp']."'/>
									</div>
								</div>
							
								<button type='submit' name='update' class='btn btn-primary'>Update</button>
							</form>";


	}


	function show(){
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dan Data Form dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $this->data);
		$this->tpl->replace("DATA_FORM", $this->data_form);

		// Menampilkan ke layar
		$this->tpl->write();
	}







}
