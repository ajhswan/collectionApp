<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTests extends TestCase
//Unit tests for displayData function
{

 // success test
        public function testSuccessDisplayData() {
            $expected = '';
            //What I think will be output
             $expected .= "<div class='receipt'>";
             $expected .= '<h2> Receipt </h2>';
             $expected .= "<div class='supplier'>" . "<h3>" . 'Dont Care' . "</h3>" . "</div>";
             $expected .= "<div class='details'>" . "<h4>" . 'blabla' . "</h4>" . "</div>";
             $expected .= "<div class='amount'>" . "<h4>£" . '1000' . "</h4>" . "</div>";
             $expected .= "<div class='id'>" . "<h5>" . "INV". 1 . "</h5>" . "</div>";
             $expected .= "<div class='date'>" . "<h5>" . '2020-02-03' . "</h5>" . "</div>";
             $expected .= "</div>";
            //the inputs
            $firstInput = [['supplier_name'=>'Dont Care', 'details'=>'blabla', 'amount'=>1000, 'id'=>1, 'date'=> '2020-02-03']];
            //call the function using the inputs
            $case = displayData($firstInput);
            //inspect the outputs and see if the same as expected
            $this->assertEquals($expected, $case);
     }

    // fail test wrong key name
     public function testFailWrongKeyDisplayData() {
            //What I think will be output
            $expected = 'Error! Missing array key!';
            //the inputs with supplier_name as supplier_names
            $firstInput = [['supplier_names'=>'Dont Care', 'details'=>'blabla', 'amount'=>1000, 'id'=>1, 'date'=> '2020-02-03']];
            //call the function using the inputs
            $case = displayData($firstInput);
            //inspect the outputs and see if the same as expected
            $this->assertEquals($expected, $case);
     }

    // malformed test for a string expecting an array
     public function testMalformedTestString() {
        //What I think will be output
        $this->expectException(TypeError::class);
        //the inputs
        $firstInput = 'string';
        //call the function using the inputs
        $case = displayData($firstInput);
    }

    // malformed test for an int expecting an array
    public function testMalformedTestInt() {
            //What I think will be output
            $this->expectException(TypeError::class);
            //the inputs
            $firstInput = 100;
            //call the function using the inputs
            $case = displayData($firstInput);
        }
}

