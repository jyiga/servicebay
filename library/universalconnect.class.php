<?php
//require_once('iconnectinfo.class.php');

class UniversalConnect implements IConnectInfo
{
    private static $server=IConnectInfo::HOST;
    private static $currentDB=IConnectInfo::DSN;
    private static $user=IConnectInfo::UNAME;
    private static $pass=IConnectInfo::PW;
    private static $hookUp;
    
    public static function doconnet(){
		
			try{
				if(is_null(self::$hookUp))
				{
					self::$hookUp=new PDO(self::$server.';'.self::$currentDB,self::$user,self::$pass);
					self::$hookUp->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				}
				return self::$hookUp;
			}catch(PDOException $e){
				//write the error to log file
				error_log($e->getMessage(),0);
				echo $e->getMessage();

                //mail('james2yiga@gmail.com','Database failure',$e->getMessage());
			}
    }

	public function close(){

		try{
			if(is_null(self::$hookUp))
			{

			}

		}catch(PDOException $e){

		}
	}
    
}

?>