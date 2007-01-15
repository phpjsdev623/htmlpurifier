<?php

require_once 'HTMLPurifier/AttrDef.php';

/**
 * Validates shorthand CSS property list-style.
 * @warning Does not support url tokens that have internal spaces.
 */
class HTMLPurifier_AttrDef_ListStyle extends HTMLPurifier_AttrDef
{
    
    /**
     * Local copy of component validators.
     * @note See HTMLPurifier_AttrDef_Font::$info for a similar impl.
     */
    var $info;
    
    function HTMLPurifier_AttrDef_ListStyle($config) {
        $def = $config->getCSSDefinition();
        $this->info['list-style-type']     = $def->info['list-style-type'];
        $this->info['list-style-position'] = $def->info['list-style-position'];
        $this->info['list-style-image'] = $def->info['list-style-image'];
    }
    
    function validate($string, $config, &$context) {
        
        // regular pre-processing
        $string = $this->parseCDATA($string);
        if ($string === '') return false;
        
        // assumes URI doesn't have spaces in it
        $bits = explode(' ', strtolower($string)); // bits to process
        
        $caught = array();
        $caught['type']     = false;
        $caught['position'] = false;
        $caught['image']    = false;
        
        $i = 0; // number of catches
        
        foreach ($bits as $bit) {
            if ($i >= 3) return; // optimization bit
            if ($bit === '') continue;
            foreach ($caught as $key => $status) {
                if ($status !== false) continue;
                if ($key == 'type' && $bit == 'none') {
                    // there's no none for image, since you simply
                    // omit it if you don't want to use it.
                    $r = 'none';
                } else {
                    $r = $this->info['list-style-' . $key]->validate($bit, $config, $context);
                }
                if ($r === false) continue;
                $caught[$key] = $r;
                $i++;
            }
        }
        
        if (!$i) return false;
        
        $ret = array();
        
        // construct type
        if ($caught['type']) $ret[] = $caught['type'];
        
        // construct image
        if ($caught['image']) $ret[] = $caught['image'];
        
        // construct position
        if ($caught['position']) $ret[] = $caught['position'];
        
        if (empty($ret)) return false;
        return implode(' ', $ret);
        
    }
    
}

?>