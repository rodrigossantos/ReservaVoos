<?php

use App\Consumer;

//VERSAO FINAL
/*
$cityFrom = $_POST["cityfrom"];
$cityTo = $_POST["cityto"];
$dateDepart = $_POST["datedepart"];
$dateReturn = $_POST["datereturn"];
*/

//VERSAO TESTE
$nip = $_POST["cityfrom"];
$password = $_POST["cityto"];



//namespace Main;
spl_autoload_extensions(".php");
function autoload($className){
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

	//VERSAO TESTE		
	$client = new nusoap_client('http://139.82.114.4/pergamum/dar/Serv_Situacao2a.php');


	//VERSAO FINAL
	/*$client = new nusoap_client('WebService');*/
			
	$err = $client->getError();
			
	if($err){
		$novoarquivo = fopen("postRelatorioTesteBia2.txt", "a+");
		fwrite($novoarquivo, "ERR".$err."\n\r");
		fclose($novoarquivo);
		//return 0; 
	}

	$client->setUseCurl($useCURL);

	$client->useHTTPPersistentConnection();	

	$consumer = new Consumer($client);
	
	//VERSAO TESTE
	$infoBusca = array('nip'=>'500077377','password'=>'387576');
	
	//VERSAO FINAL
	/*$infoBusca = array('origem'=>$cityFrom,'destino'=>$cityTo,'dataIda'=>$dateDepart,'dataVota'=>$dateReturn);*/
	
	//VERSAO TESTE
	$infoBusca = array('nip'=>$nip,'password'=>$password);
	
	//VERSAO FINAL
	/*$result = $consumer->GetVoos($infoBusca);*/
	
	//VERSAO TESTE
	$resultEnc = $consumer->AutenticaUsu($infoBusca);
	$result = json_decode($resultEnc);
	
	//VERSAO FINAL
	/*$vooList = new VoosList();*/
	
	//VERSAO TESTE
	$vooList = new VoosList();

	foreach($result as $res){
		$vooList->addVoo($res);
	}

	$vooListIterator = new VooListIterator($vooList);

//print_r(json_decode($result)); 

?>
<!DOCTYPE html>


<html>

<head>

<title>Flight List</title>

<script>


function getCookie(name) {
	
	//var cookies = decodeURIComponent(document.cookie);
    var cookies = document.cookie;
    alert (cookies);
    return;
    var prefix = name + "=";
    var begin = cookies.indexOf("; " + prefix);
 
    if (begin == -1) {
 
        begin = cookies.indexOf(prefix);
         
        if (begin != 0) {
            return null;
        }
 
    } else {
        begin += 2;
    }
 
    var end = cookies.indexOf(";", begin);
     
    if (end == -1) {
        end = cookies.length;                        
    }
 
    return unescape(cookies.substring(begin + prefix.length, end));
}


</script>

</head>
	
<body>



<div id="flightlist">

<?php

	while($vooListIterator->hasNextVoo()){
		$voo = $vooListIterator->getNextVoo();
		
		//imprime infos do voo
		echo "<article class='box'>";
		echo "Nome: <p id='nome'>".$voo['nome']."</p>"
		echo "Nip: <p id='nip'>".$voo['nip']."</p>"
		echo "Email: <p id='email'>".$voo['email']."</p>"
		echo "</article>";
		
	}
 
?>

<!--
<article class="box">
    <figure class="col-xs-3 col-sm-2">
                                        <span><img width="94" height="90" alt="" src="images/shortcodes/listings/style02/flight/2.png"></span>
    </figure>
    <div class="details col-xs-9 col-sm-10">
        <div class="details-wrapper">
            <div class="first-row">
             <div>
                <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                <a class="button btn-mini stop">1 STOP</a>
               
            </div>
              <div>
                <span class="price"><small>AVG/PERSON</small>$620</span>
              </div>
            </div>
            <div class="second-row">
                <div class="time">
                    <div class="take-off col-sm-4">
                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                        <div>
                            <span class="skin-color">Take off</span><br>Wed Nov 13, 2013 7:50 Am
                        </div>
                    </div>
                    <div class="landing col-sm-4">
                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                        <div>
                            <span class="skin-color">landing</span><br>Wed Nov 13, 2013 9:20 am
                        </div>
                    </div>
                    <div class="total-time col-sm-4">
                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                        <div>
                            <span class="skin-color">total time</span><br>13 Hour, 40 minutes
                        </div>
                    </div>
                </div>
                <div class="action">
                    <a href="flight-detailed.html" class="button btn-small full-width">SELECT NOW</a>
                </div>
            </div>
      </div>
    </div>
</article>
-->		
</div>

</body>

</html>


