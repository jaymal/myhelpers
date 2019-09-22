<?php 

namespace Helpful\MyHelpers\Tests;

use Helpful\MyHelpers\MyHelpers;

class SampleTest extends  \PHPUnit\Framework\TestCase
{
  
    /**
     * @test
     * @runInSeparateProcess
     */
    public function statusIsReturnedAsPartOfResponse()
    {
    	$helper =  new MyHelpers();
    	$data = ['name'=>'jamal', 'age'=>'15'];
    	$status= "success";
    	$message = "correct";
    	$code = 200;

    	$actualJson = $helper->printJson($data , $status, $code, $message);
    	$expectedJson = '{
			    "status" :  "success",
			    "message": "correct",
			    "code": 200,
			    "data" : { "name" : "jamal", "age":"15" }
			}';


    	$this->assertJsonStringEqualsJsonString($expectedJson,$actualJson);

    }

}
