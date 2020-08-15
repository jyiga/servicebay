<?php

/** Check if environment is development and display errors **/

function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    error_log(date('Y m d :g:i:s:a ').$value."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'attack.log') ;
	return $value;
}
//get sensitive to attacks
/*function removeMagicQuotes() {
if ( get_magic_quotes_gpc() ) {
	$_GET    = stripSlashesDeep($_GET   );
	$_POST   = stripSlashesDeep($_POST  );
	$_COOKIE = stripSlashesDeep($_COOKIE);
}
}*/

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    //unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main Call Function **/

function callHook()
{
   //if($_SESSION[''])
	global $url;
    //its here to
	$urlArray = array();
	$urlArray = explode("/",$url);
	//check


        //security here.
		$controller = $urlArray[0];
		array_shift($urlArray);
		$action = $urlArray[0];
		array_shift($urlArray);
		$queryString = $urlArray;
		$controllerName = $controller;
		//$controller = ucwords($controller);
		$controller = $controller;
		$model = rtrim($controller, 's');
		$controller .= 'Controller';
		$dispatch = new $controller($model, $controllerName, $action);

		if ((int)method_exists($controller, $action)) {
			call_user_func_array(array($dispatch, $action), $queryString);
		} else {
			/* Error Generation Code Here */
		}

}

/** Autoload any classes that are required **/

function __autoload($className) {
	error_log('Class: '.$className . '.php'."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'error.log') ;
	if(class_exists($className)==true){
        error_log('Class exits '.$className . '.php'."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'error.log') ;
    }else {


        if (strpos($className, "\\") > 0) {

            $haystack = explode('\\', $className);
            if (sizeof($haystack) > 2) {
                $className = '';
                for ($i = 1; $i < sizeof($haystack); $i++) {
                    if (sizeof($haystack) - 1 == $i) {

                        $className .= $haystack[$i];


                    } else {
                        $className .= $haystack[$i] . DS;
                    }

                }

            } else {
                $className = $haystack[sizeof($haystack) - 1];
            }

            error_log('@ haystack-' . $className . '.php' . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
        }
        if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
            require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');

        } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php')) {
            require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php');
        } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . $className . '.php')) {
            require_once(ROOT . DS . 'application' . DS . 'models' . DS . $className . '.php');
        } else if (file_exists(ROOT . DS . 'library' . DS . 'mailBuilder' . DS . $className . '.php')) {
            require_once(ROOT . DS . 'library' . DS . 'mailBuilder' . DS . $className . '.php');
        }else if (file_exists(ROOT . DS . 'library' . DS . 'proxy' . DS . $className . '.php')) {
            require_once(ROOT . DS . 'library' . DS . 'proxy' . DS . $className . '.php');
        }else if (file_exists(ROOT . DS . 'library' . DS . 'builderplus' . DS . $className . '.php')) {
            require_once(ROOT . DS . 'library' . DS . 'builderplus' . DS . $className . '.php');
        } else if (file_exists(ROOT . DS . 'library' . DS . 'pdfWriter' . DS . $className . '.php')) {
            require_once(ROOT . DS . 'library' . DS . 'pdfWriter' . DS . $className . '.php');
        }/*else if (file_exists(ROOT . DS . 'library' . DS . 'mpdf60' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'library' . DS . 'mpdf60' . DS . $className . '.php');
    }*/ else if (file_exists(ROOT . DS . 'library' . DS . 'mpdf' . DS . $className . '.php')) {
            // contains /
            //explode
            //
            if (strpos($className, "\\") > 0) {
                $haystack = explode('\\', $className);
                require_once(ROOT . DS . 'library' . DS . 'mpdf' . DS . $haystack[sizeof($haystack) - 1] . '.php');
            } else {
                require_once(ROOT . DS . 'library' . DS . 'mpdf' . DS . $className . '.php');
            }

        } else if (file_exists(ROOT . DS . 'library' . DS . 'dompdf' . DS . 'src' . DS . $className . '.php')) {
            //require_once(ROOT . DS . 'library' . DS . 'dompdf' . DS . $className . '.php');
            //require_once(ROOT . DS . 'library' . DS . 'dompdf' . DS .'src'. DS. 'Autoloader.php');
            if (class_exists($className) != true) {
                require_once(ROOT . DS . 'library' . DS . 'dompdf' . DS . 'src' . DS . $className . '.php');
                error_log("@ URL.." . ROOT . DS . 'library' . DS . 'dompdf' . DS . 'src' . DS . $className . '.php' . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
            }

            if ($className === 'CPDF' && class_exists($className) != true) {
                require_once(ROOT . DS . 'library' . DS . 'dompdf' . DS . 'lib' . DS . 'Cpdf.php');
                error_log("@ URL.." . ROOT . DS . 'library' . DS . 'dompdf' . DS . 'lib' . DS . 'Cpdf.php' . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
            }


        } else {


            if ($className == 'CPDF' && !class_exists($className)) {
                require_once(ROOT . DS . 'library' . DS . 'dompdf' . DS . 'lib' . DS . ucwords(strtolower($className)) . '.php');
                error_log("@ URL.." . ROOT . DS . 'library' . DS . 'dompdf' . DS . 'lib' . DS . ucwords(strtolower($className)) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
            }else{
                require_once(ROOT . DS . 'library' . DS . 'PHPMailer' . DS . 'class.phpmailer.php');
            }


            //require_once(ROOT . DS . 'library' . DS . 'dompdf' . DS .'src'. DS. 'Autoloader.php');
            error_log("Invalid URL PASSED ...  " . ucwords(strtolower($className)) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
            /* Error Generation Code Here */
        }
    }
}

//security
setReporting();
//removeMagicQuotes();
//unregisterGlobals();
//security
callHook();
