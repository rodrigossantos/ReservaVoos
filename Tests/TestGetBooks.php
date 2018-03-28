<?php

namespace Tests;

use \Mockery as m;  


//include_once('Mockery.php');
use App\Consumer;
//use Tests\Mockery as m;
//use Tests\simpletest\unit_tester;
//use Tests\TestCase;

//require_once('simpletest/autorun.php');

class TestGetBooks {
    /** @test */
    function it_gets_books()
    {
        // Mock the client to return our XML...
        $client = m::mock()
            ->shouldReceive('getBooks')
            ->once()
            ->andReturn(simplexml_load_string($this->getXml()))
            ->getMock();

        // Inject our mock SoapClient into the consumer
        // and make the call that we're testing...
        $response = (new Consumer($client))->getBooks();
		
		print_r($response);
		
		//$this->assertTrue(1);	
        // Assert that the response is what we would expect..
		/*$this->assertEqual([
            [
                'title' => 'The Alchemist',
            ], [
                'title' => 'Veronica Decides To Die',
            ], [
                'title' => 'The Second Machine Age',
            ],
        ], $response);
        */
		
    }

private function getXml()
{
     
     
    return "<?xml version='1.0'?>
<document>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>"; 

}
    
}

?>