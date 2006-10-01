<?php

require_once 'HTMLPurifier/Lexer/DirectLex.php';

/**
 * General-purpose test-harness that makes testing functions that require
 * configuration and context objects easier when those two parameters are
 * meaningless.  See HTMLPurifier_ChildDefTest for a good example of usage.
 */
class HTMLPurifier_Harness extends UnitTestCase
{
    
    /**
     * Instance of the object that will execute the method
     */
    var $obj;
    
    /**
     * Name of the function to be executed
     */
    var $func;
    
    /**
     * Whether or not the method deals in tokens. If set to true, assertResult()
     * will transparently convert HTML to and back from tokens.
     */
    var $to_tokens = false;
    
    /**
     * Whether or not to convert tokens back into HTML before performing
     * equality check, has no effect on bools.
     */
    var $to_html = false;
    
    /**
     * Instance of an HTMLPurifier_Lexer implementation.
     */
    var $lexer;
    
    /**
     * Instance of HTMLPurifier_Generator
     */
    var $generator;
    
    function HTMLPurifier_Harness() {
        $this->lexer     = new HTMLPurifier_Lexer_DirectLex();
        $this->generator = new HTMLPurifier_Generator();
        parent::UnitTestCase();
    }
    
    /**
     * Asserts a specific result from a one parameter + config/context function
     * @param $input Input parameter
     * @param $expect Expectation
     * @param $config_array Configuration array in form of
     *                      Namespace.Directive => Value or an actual config
     *                      object.
     * @param $context_array Context array in form of Key => Value or an actual
     *                       context object.
     */
    function assertResult($input, $expect = true,
        $config_array = array(), $context_array = array()
    ) {
        
        // setup config object
        $config  = HTMLPurifier_Config::createDefault();
        foreach ($config_array as $key => $value) {
            list($namespace, $directive) = explode('.', $key);
            $config->set($namespace, $directive, $value);
        }
        
        // setup context object
        $context = new HTMLPurifier_Context();
        foreach ($context_array as $key => $value) {
            $context->register($key, $value);
        }
        
        if ($this->to_tokens && is_string($input)) {
            $input = $this->lexer->tokenizeHTML($input, $config, $context);
        }
        
        // call the function
        $func = $this->func;
        $result = $this->obj->$func($input, $config, $context);
        
        // test a bool result
        if (is_bool($result)) {
            $this->assertIdentical($expect, $result);
            return;
        } elseif (is_bool($expect)) {
            $expect = $input;
        }
        
        if ($this->to_html) {
            $result = $this->generator->
              generateFromTokens($result, $config, $context);
            if (is_array($expect)) {
                $expect = $this->generator->
                  generateFromTokens($expect, $config, $context);
            }
        }
        
        $this->assertEqual($expect, $result);
        
    }
    
}

?>
