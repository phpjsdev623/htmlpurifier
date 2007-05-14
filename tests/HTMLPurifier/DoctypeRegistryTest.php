<?php

require_once 'HTMLPurifier/DoctypeRegistry.php';

class HTMLPurifier_DoctypeRegistryTest extends UnitTestCase
{
    
    function test_register() {
        
        $registry = new HTMLPurifier_DoctypeRegistry();
        
        $d =& $registry->register(
            $name = 'XHTML 1.0 Transitional',
            $modules = array('module-one', 'module-two'),
            $modulesForModes = array(
                'lenient' => array('lenient-module'),
            ),
            $aliases = array('X10T')
        );
        
        $d2 = new HTMLPurifier_Doctype($name, $modules, $modulesForModes, $aliases);
        
        $this->assertIdentical($d, $d2);
        $this->assertReference($d, $registry->get('XHTML 1.0 Transitional'));
        
        // test shorthand
        $d =& $registry->register(
            $name = 'XHTML 1.0 Strict', 'module', array(), 'X10S'
        );
        $d2 = new HTMLPurifier_Doctype($name, array('module'), array(), array('X10S'));
        
        $this->assertIdentical($d, $d2);
        
    }
    
    function test_get() {
        
        // see also alias and register tests
        
        $registry = new HTMLPurifier_DoctypeRegistry();
        
        $this->expectError('Doctype XHTML 2.0 does not exist');
        $registry->get('XHTML 2.0');
        
        // prevent XSS
        $this->expectError('Doctype &lt;foo&gt; does not exist');
        $registry->get('<foo>');
        
    }
    
    function testAliases() {
        
        $registry = new HTMLPurifier_DoctypeRegistry();
        
        $d1 =& $registry->register('Doc1', array(), array(), array('1'));
        
        $this->assertReference($d1, $registry->get('Doc1'));
        $this->assertReference($d1, $registry->get('1'));
        
        $d2 =& $registry->register('Doc2', array(), array(), array('2'));
        
        $this->assertReference($d2, $registry->get('Doc2'));
        $this->assertReference($d2, $registry->get('2'));
        
        $d3 =& $registry->register('1', array(), array(), array());
        
        // literal name overrides alias
        $this->assertReference($d3, $registry->get('1'));
        
        $d4 =& $registry->register('One', array(), array(), array('1'));
        
        $this->assertReference($d4, $registry->get('One'));
        // still it overrides
        $this->assertReference($d3, $registry->get('1'));
        
    }
    
}

?>