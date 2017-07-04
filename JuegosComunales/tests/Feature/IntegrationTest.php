<?php

namespace Tests\Feature;

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;

class ExampleTest extends IntegrationTest
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    
    public function testHome()
    {
         $this->visit('/')->see('Comité Cantonal de Deportes y Recreación de Grecia');

        
    }
    
}
