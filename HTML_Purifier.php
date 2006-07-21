<?php

class HTML_Purifier
{
    
    var $lexer;
    var $definition;
    var $generator;
    
    function HTML_Purifier() {
        $this->lexer = new HTMLPurifier_Lexer();
        $this->definition = new PureHTMLDefinition();
        $this->generator = new HTMLPurifier_Generator();
    }
    
    function purify($html) {
        
        $tokens = $this->lexer->tokenizeHTML($html);
        $tokens = $this->definition->purifyTokens($tokens);
        return $this->generator->generateFromTokens($tokens);
        
    }
    
}

?>