<?php

require_once 'HTMLPurifier/HTMLModuleHarness.php';

class HTMLPurifier_HTMLModule_LegacyTest extends HTMLPurifier_HTMLModuleHarness
{
    
    function test() {
        
        $this->setupScaffold('Legacy');
        
        // max
        $this->assertResult(
            '<span>
                <u ac:common="yes">Text<span></span></u>
                <s ac:common="yes">Text<span></span></s>
                <strike ac:common="yes">Text<span></span></strike>
            </span>'
        );
        
        // redefinitions
        /*$this->assertResult(
            '<ol start="3">
                <li value="2">Foo</li>
            </ol>
            <address>Text<span></span><p></p></address>
            <blockquote>Text<span></span><div></div></blockquote>'
        );*/
        
    }
    
}

?>