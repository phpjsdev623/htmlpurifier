<?php

/**
 * Structure that stores an HTML element definition. Used by
 * HTMLPurifier_HTMLDefinition and HTMLPurifier_HTMLModule.
 */
class HTMLPurifier_ElementDef
{
    
    /**
     * Does the definition work by itself, or is it created solely
     * for the purpose of merging into another definition?
     */
    var $standalone = true;
    
    /**
     * Associative array of attribute name to HTMLPurifier_AttrDef
     * @note Before being processed by HTMLPurifier_AttrCollections
     *       when modules are finalized during
     *       HTMLPurifier_HTMLDefinition->setup(), this array may also
     *       contain an array at index 0 that indicates which attribute
     *       collections to load into the full array. It may also
     *       contain string indentifiers in lieu of HTMLPurifier_AttrDef,
     *       see HTMLPurifier_AttrTypes on how they are expanded during
     *       HTMLPurifier_HTMLDefinition->setup() processing.
     * @public
     */
    var $attr = array();
    
    /**
     * Indexed list of tag's HTMLPurifier_AttrTransform to be done before validation
     * @public
     */
    var $attr_transform_pre = array();
    
    /**
     * Indexed list of tag's HTMLPurifier_AttrTransform to be done after validation
     * @public
     */
    var $attr_transform_post = array();
    
    
    
    /**
     * HTMLPurifier_ChildDef of this tag.
     * @public
     */
    var $child;
    
    /**
     * Abstract string representation of internal ChildDef rules. See
     * HTMLPurifier_ContentSets for how this is parsed and then transformed
     * into an HTMLPurifier_ChildDef.
     * @public
     */
    var $content_model;
    
    /**
     * Value of $child->type, used to determine which ChildDef to use,
     * used in combination with $content_model.
     * @warning This must be lowercase
     * @public
     */
    var $content_model_type;
    
    
    
    /**
     * Lookup table of tags that close this tag. Used during parsing
     * to make sure we don't attempt to nest unclosed tags.
     * @public
     */
    var $auto_close = array();
    
    /**
     * Does the element have a content model (#PCDATA | Inline)*? This
     * is important for chameleon ins and del processing in 
     * HTMLPurifier_ChildDef_Chameleon. Dynamically set: modules don't
     * have to worry about this one.
     * @public
     */
    var $descendants_are_inline;
    
    /**
     * Lookup table of tags excluded from all descendants of this tag.
     * @public
     */
    var $excludes = array();
    
    /**
     * Is this element safe for untrusted users to use?
     */
    var $safe = false;
    
    /**
     * Low-level factory constructor for creating new standalone element defs
     * @static
     */
    function create($safe, $content_model, $content_model_type, $attr) {
        $def = new HTMLPurifier_ElementDef();
        $def->safe = (bool) $safe;
        $def->content_model = $content_model;
        $def->content_model_type = $content_model_type;
        $def->attr = $attr;
        return $def;
    }
    
    /**
     * Merges the values of another element definition into this one.
     * Values from the new element def take precedence if a value is
     * not mergeable.
     */
    function mergeIn($def) {
        
        // later keys takes precedence
        foreach($def->attr as $k => $v) {
            if ($k === 0) {
                // merge in the includes
                // sorry, no way to override an include
                foreach ($v as $v2) {
                    $this->attr[0][] = $v2;
                }
                continue;
            }
            if ($v === false) {
                if (isset($this->attr[$k])) unset($this->attr[$k]);
                continue;
            }
            $this->attr[$k] = $v;
        }
        $this->_mergeAssocArray($this->attr_transform_pre, $def->attr_transform_pre);
        $this->_mergeAssocArray($this->attr_transform_post, $def->attr_transform_post);
        $this->_mergeAssocArray($this->auto_close, $def->auto_close);
        $this->_mergeAssocArray($this->excludes, $def->excludes);
        
        if(!is_null($def->child)) $this->child = $def->child;
        if(!empty($def->content_model)) $this->content_model .= ' | ' . $def->content_model;
        if(!empty($def->content_model_type)) $this->content_model_type = $def->content_model_type;
        if(!is_null($def->descendants_are_inline)) $this->descendants_are_inline = $def->descendants_are_inline;
        
    }
    
    /**
     * Merges one array into another, removes values which equal false
     * @param $a1 Array by reference that is merged into
     * @param $a2 Array that merges into $a1
     */
    function _mergeAssocArray(&$a1, $a2) {
        foreach ($a2 as $k => $v) {
            if ($v === false) {
                if (isset($a1[$k])) unset($a1[$k]);
                continue;
            }
            $a1[$k] = $v;
        }
    }
    
}

?>
