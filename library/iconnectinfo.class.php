<?php

interface IConnectInfo
{
    const HOST="host=localhost";
    const UNAME="sbm";
    const PW="q8KqTbZciwGte6N";
    const DBN="sbm100_prd_db";
    const DSN="mysql:dbname=".IConnectInfo::DBN;
    
	/*const HOST="mysql:host=localhost";
    const UNAME="root";
    const PW="";
    const DBN="servicebay_db";
    const DSN="dbname=".IConnectInfo::DBN.";";*/
}

?>