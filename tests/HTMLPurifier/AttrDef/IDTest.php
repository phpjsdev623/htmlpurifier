<?php

require_once 'HTMLPurifier/AttrDefHarness.php';
require_once 'HTMLPurifier/AttrDef/ID.php';
require_once 'HTMLPurifier/IDAccumulator.php';

class HTMLPurifier_AttrDef_IDTest extends HTMLPurifier_AttrDefHarness
{
    
    function test() {
        
        $this->context = new HTMLPurifier_AttrContext();
        $this->context->id_accumulator = new HTMLPurifier_IDAccumulator();
        $this->def = new HTMLPurifier_AttrDef_ID();
        
        // valid ID names
        $this->assertDef('alpha');
        $this->assertDef('al_ha');
        $this->assertDef('a0-:.');
        $this->assertDef('a');
        
        // invalid ID names
        $this->assertDef('<asa', false);
        $this->assertDef('0123', false);
        $this->assertDef('.asa', false);
        
        // test duplicate detection
        $this->assertDef('a', false);
        
        // valid once whitespace stripped, but needs to be amended
        $this->assertDef(' whee ', 'whee');
        
    }
    
}

?>