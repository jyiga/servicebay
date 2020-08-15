<?php
include_once('SqlBuilder.php');
//the class helps to builder the final object of the query
class Director{
	public static function buildSql(SqlBuilder $builder){
		$sql_query=NULL;
		$sql_query.=$builder->getCommand();
		$sql_query.=$builder->getTable();
		$sql_query.=$builder->getWhat();
		$sql_query.=$builder->getCriteria();
		return $sql_query;
	}
	
}

?>