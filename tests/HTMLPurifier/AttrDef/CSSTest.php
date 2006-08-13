<?php

require_once 'HTMLPurifier/AttrDef/CSS.php';

class HTMLPurifier_AttrDef_CSSTest extends HTMLPurifier_AttrDefHarness
{
    
    function test() {
        
        $this->def = new HTMLPurifier_AttrDef_CSS();
        
        // regular cases, singular
        $this->assertDef('text-align:right;');
        $this->assertDef('border-style:solid;');
        $this->assertDef('clear:right;');
        $this->assertDef('float:left;');
        $this->assertDef('font-style:italic;');
        $this->assertDef('font-variant:small-caps;');
        $this->assertDef('font-weight:bold;');
        $this->assertDef('list-style-position:outside;');
        $this->assertDef('list-style-type:upper-roman;');
        $this->assertDef('text-transform:capitalize;');
        
        // duplicates
        $this->assertDef('text-align:right;text-align:left;',
                                          'text-align:left;');
        
        // a few composites
        $this->assertDef('font-variant:small-caps;font-weight:900;');
        $this->assertDef('float:right;text-align:right;');
        
        // selective removal
        $this->assertDef('text-transform:capitalize;destroy:it;',
                         'text-transform:capitalize;');
        
        // inherit works for everything
        $this->assertDef('text-align:inherit;');
        
        // bad props
        $this->assertDef('nodice:foobar;', false);
        $this->assertDef('position:absolute;', false);
        $this->assertDef('background-image:url(javascript:alert\(\));', false);
        
    }
    
}

?>