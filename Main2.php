<?php

use App\Consumer;

//namespace Main;
spl_autoload_extensions(".php");
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	
	$novoarquivo = fopen("post.txt", "a+");
	fwrite($novoarquivo, $fileName."\n\r");
	fclose($novoarquivo);
	
	$pos = strpos($fileName,"nusoap");
	
	if ($pos === false) {
     require $fileName;
	}
	
    
}
spl_autoload_register('autoload');

//require_once('../../../App/classes/log.php');



//use TestGetBooks;

// Pull in the NuSOAP code
include "NuSoap/nusoap.php";

$useCURL = isset($_POST['usecurl']) ? $_POST['usecurl'] : '0';
		
$client = new nusoap_client('http://139.82.114.4/pergamum/dar/Serv_Situacao2a.php');
		
$err = $client->getError();
		
		if ($err) {
			$novoarquivo = fopen("postRelatorioTesteBia2.txt", "a+");
			fwrite($novoarquivo, "ERR".$err."\n\r");
			fclose($novoarquivo);
			//return 0; 
		}
		
		$client->setUseCurl($useCURL);
		
		$client->useHTTPPersistentConnection();	

$consumer = new Consumer($client);

$usr = array('nip'=>'500077377','password'=>'387576');

$result = $consumer->AutenticaUsu($usr);

print_r(json_decode($result)); 
?>