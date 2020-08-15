<?php

interface IConnectInfo
{
	const HOST="mysql:host=localhost";
    const UNAME="root";
    const PW="";
    const DBN="servicebay_db";
    const DSN="dbname=".IConnectInfo::DBN.";";
}

?>