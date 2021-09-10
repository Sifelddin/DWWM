<?php

require_once './src/Calcul.php';

use PHPUnit\Framework\TestCase;

class CalculTest extends TestCase{
    
    
    public function testDivideOk()
    {
        

        $oCalcul = new Calcul();

        $number = 10;
        $divide = 2;

        $result = $oCalcul->divide($number, $divide);

        // On attend le que le résultat de 10/2 soit 5 :
        $this->assertEquals(5, $result);
    } 

}