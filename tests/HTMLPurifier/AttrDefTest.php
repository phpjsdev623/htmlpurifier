<?php

require_once 'HTMLPurifier/AttrDef.php';

Mock::generatePartial(
        'HTMLPurifier_AttrDef',
        'HTMLPurifier_AttrDefTestable',
        array('validate'));

class HTMLPurifier_AttrDefTest extends HTMLPurifier_Harness
{
    
    function test_parseCDATA() {
        
        $def = new HTMLPurifier_AttrDefTestable();
        
        $this->assertIdentical('', $def->parseCDATA(''));
        $this->assertIdentical('', $def->parseCDATA("\t\n\r \t\t"));
        $this->assertIdentical('foo', $def->parseCDATA("\t\n\r foo\t\t"));
        $this->assertIdentical('ignorelinefeeds', $def->parseCDATA("ignore\nline\nfeeds"));
        $this->assertIdentical('translate to space', $def->parseCDATA("translate\rto\tspace"));
        
    }
    
    function test_make() {
        
        $def = new HTMLPurifier_AttrDefTestable();
        $def2 = $def->make('');
        $this->assertIdentical($def, $def2);
        
    }
    
}

