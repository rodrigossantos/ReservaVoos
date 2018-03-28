<?php

namespace App;

use Exception;

class Consumer
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function __call($method, $parameters)
    {
        if (! class_exists($class = $this->getClassNameFromMethod($method))) {
            throw new Exception("Method {$method} does not exist");
        }

        $instance = new $class($this->client);
        
        // Delegate the handling of this method call to the appropriate class
        return call_user_func_array([$instance, 'execute'], $parameters);
    }

    /**
     * Get class name that handles execution of this method
     *
     * @param $method
     * @return string
     */
    private function getClassNameFromMethod($method)
    {
        return 'App\\Methods\\' . ucwords($method);
    }
}