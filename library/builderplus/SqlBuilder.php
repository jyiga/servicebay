<?php
interface SqlBuilder{
	
	public function getCommand();
	public function getTable();
	public function getWhat();
	public function getCriteria();
	
}




?>