<?php


namespace App\Methods;

class GetVoos
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function execute($parameters){
    	
    	 $response = $this->client->call('AutenticaUsuario',array('nip' => $parameters['nip'],'password' => $parameters['password']));
    	
        //$response = $this->client->getBooks();

        // Transform the response as appropriate...

        return $response;
    }
}

?>