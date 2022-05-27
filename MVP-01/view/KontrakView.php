<?php

interface KontrakView{
	public function tampil();
	public function editform($id);
	public function delete($id);
	public function addform();
	public function show();
}

?>