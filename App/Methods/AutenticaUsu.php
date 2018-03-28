<?php

namespace App\Methods;

class AutenticaUsu
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function execute($parameters)
    {
    	
    	//print_r($parameters);
    	
        //$response = $this->client->AutenticaUsuario($parameters['nip'],$parameters['password']);
        
        $response = $this->client->call('AutenticaUsuario',array('nip' => $parameters['nip'],'password' => $parameters['password'])); 
        
        //echo $response;
        
        //$response = $this->$client->call('AutenticaUsuario',array('usuario' => $parameters['nip'],'senha' => $parameters['password'],'alias_database' => $alias_database,'database_name' => $database_name,'nip_user' => $nip_user));

        // Transform the response as appropriate...

        return $response;
    }
}