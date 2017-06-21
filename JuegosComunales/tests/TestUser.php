<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestUser extends TestCase
{
   
    public function testUser()
    {
         $IDPerson = '207570610';
       	$person = DB::table('users') 
    	               
    	                ->where('users.IDPerson', $IDPerson)
    	                -> get();
    	                
    	   $this->assertNotNull($person);
    }
}
