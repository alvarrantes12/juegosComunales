<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    
     public function testUser()
    {
        $IDPerson = '207570618';
        $person = DB::table('users') 
            ->select ('IDPerson')
            ->where('users.IDPerson', $IDPerson)
    	                -> first();
    	                
    	   $this->assertNotNull($person);
    }
    
    public function testCreateUser() {
        $IDPerson = 'test'; 
        $password = 'test';
       
        DB::table('users')->insert(
            ['IDPerson' => $IDPerson , 'password' => $password]
        );
        $item = DB::table('users')->where('IDPerson', 'test')->first();
        $this->assertNotNull($item);
        
        DB::table('users')->where('IDPerson', $IDPerson)->delete();
    }
    
    public function testCreateTest() {
        
        $test = 'test';
        
        DB::table('test')
            ->insert(['nameTest' => $test]);
            
        $IDTest =  DB::table('test')
            ->where ('nameTest', 'test')->value('IDTest');
        
       
        $item = DB::table('test')->where('IDTest', $IDTest)->first();
        $this->assertNotNull($item);
        
        DB::table('test')->where('IDTest', $IDTest)->delete();
  
    }
    
     public function testCreateTestCategory() {
        
        $category = 'testCategory';
       
        DB::table('category')
            ->insert(['nameCategory' => $category, 'active' => 1, 'startDate' => '2017-01-01', 'endDate' => '2017-01-02']);
            
        $IDCategory =DB::table('category')
            ->where('nameCategory', 'testCategory')->value('IDCategory');

        $item = DB::table('category')->where('IDCategory', $IDCategory)->first();
        $this->assertNotNull($item);
        
        DB::table('category')->where('IDCategory', $IDCategory)->delete();
        
    }
    
     public function testCreateSport() {
        
        $sport = 'sport';
       
        DB::table('sport')
            ->insert(['nameSport' => $sport, 'active' => 1, 'athletesAmount' => 1, 'IDSportType' => 1]);
            
        $IDSport =DB::table('sport')
            ->where('nameSport', 'sport')->value('IDSport');

        $item = DB::table('sport')->where('IDSport', $IDSport)->first();
        $this->assertNotNull($item);
        
        DB::table('sport')->where('IDSport', $IDSport)->delete();
    }
    
     public function testCreateEdition() {
        
        $edition = 'edition';
       
        DB::table('edition')
            ->insert(['nameEdition' => $edition, 'year' => '2019', 'startDate' => '2017-01-01', 'endDate' => '2017-01-02']);
            
        $IDEdition =DB::table('edition')
            ->where('nameEdition', 'edition')->value('IDEdition');

        $item = DB::table('edition')->where('IDEdition', $IDEdition)->first();
        $this->assertNotNull($item);
        
        DB::table('edition')->where('IDEdition', $IDEdition)->delete();
    }
    
    public function testCreateCommunity() {
        
        $com = 'community';
       
        DB::table('community')
            ->insert(['nameCommunity' => $com]);
            
        $IDCommunity =DB::table('community')
            ->where('nameCommunity', 'community')->value('IDCommunity');

        $item = DB::table('community')->where('IDCommunity', $IDCommunity)->first();
        $this->assertNotNull($item);
        
        DB::table('community')->where('IDCommunity', $IDCommunity)->delete();
    }
    
     public function testCreateDistrict() {
        
        $dis = 'district';
       
        DB::table('district')
            ->insert(['nameDistrict' => $dis]);
            
        $IDDistrict =DB::table('district')
            ->where('nameDistrict', 'district')->value('IDDistrict');

        $item = DB::table('district')->where('IDDistrict', $IDDistrict)->first();
        $this->assertNotNull($item);
        
        DB::table('district')->where('IDDistrict', $IDDistrict)->delete();
    }
}
