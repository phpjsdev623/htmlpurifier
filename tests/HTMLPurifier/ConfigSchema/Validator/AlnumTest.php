<?php

class HTMLPurifier_ConfigSchema_Validator_AlnumTest extends HTMLPurifier_ConfigSchema_ValidatorHarness
{
    
    public function setup() {
        $this->validator = new HTMLPurifier_ConfigSchema_Validator_Alnum('ID');
        parent::setup();
    }
    
    public function testValidate() {
        $this->expectSchemaException('R&D in ID must be alphanumeric');
        $arr = array('ID' => 'R&D');
        $this->validator->validate($arr, $this->interchange);
    }
    
}
