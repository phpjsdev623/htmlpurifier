<?php

require_once 'HTMLPurifier/StrategyHarness.php';
require_once 'HTMLPurifier/Strategy/MakeWellFormed.php';

class HTMLPurifier_Strategy_MakeWellFormed_InjectorTest extends HTMLPurifier_StrategyHarness
{
    
    function setUp() {
        parent::setUp();
        $this->obj = new HTMLPurifier_Strategy_MakeWellFormed();
        $this->config->set('AutoFormat', 'AutoParagraph', true);
        $this->config->set('AutoFormat', 'Linkify', true);
    }
    
    function testOnlyAutoParagraph() {
        $this->assertResult(
            'Foobar',
            '<p>Foobar</p>'
        );
    }
    
    function testParagraphWrappingOnlyLink() {
        $this->assertResult(
            'http://example.com',
            '<p><a href="http://example.com">http://example.com</a></p>'
        );
    }
    
    function testParagraphWrappingNodeContainingLink() {
        $this->assertResult(
            '<b>http://example.com</b>',
            '<p><b><a href="http://example.com">http://example.com</a></b></p>'
        );
    }
    
    function testParagraphWrappingPoorlyFormedNodeContainingLink() {
        $this->assertResult(
            '<b>http://example.com',
            '<p><b><a href="http://example.com">http://example.com</a></b></p>'
        );
    }
    
    function testTwoParagraphsContainingOnlyOneLink() {
        $this->assertResult(
            "http://example.com\n\nhttp://dev.example.com",
            '<p><a href="http://example.com">http://example.com</a></p><p><a href="http://dev.example.com">http://dev.example.com</a></p>'
        );
    }
    
    function testParagraphNextToDivWithLinks() {
        $this->assertResult(
            'http://example.com <div>http://example.com</div>',
            '<p><a href="http://example.com">http://example.com</a> </p><div><a href="http://example.com">http://example.com</a></div>'
        );
    }
    
    function testRealisticLinkInSentence() {
        $this->assertResult(
            'This URL http://example.com is what you need',
            '<p>This URL <a href="http://example.com">http://example.com</a> is what you need</p>'
        );
    }
    
}
