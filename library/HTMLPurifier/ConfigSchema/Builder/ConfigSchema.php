<?php

/**
 * Converts HTMLPurifier_ConfigSchema_Interchange to our runtime
 * representation used to perform checks on user configuration.
 */
class HTMLPurifier_ConfigSchema_Builder_ConfigSchema
{
    
    public function build($interchange) {
        $schema = new HTMLPurifier_ConfigSchema();
        foreach ($this->namespaces as $n) {
            $schema->addNamespace($n->namespace);
        }
        foreach ($this->directives as $d) {
            $schema->add(
                $d->id->namespace,
                $d->id->directive,
                $d->default,
                $d->type,
                $d->typeAllowsNull
            );
            if ($d->allowed !== null) {
                $schema->addAllowedValues(
                    $d->id->namespace,
                    $d->id->directive,
                    $d->allowed
                );
            }
            foreach ($d->aliases as $alias) {
                $schema->addAlias(
                    $alias->id->namespace,
                    $alias->id->directive,
                    $d->id->namespace,
                    $d->id->directive
                );
            }
            if ($d->valueAliases !== null) {
                $schema->addValueAliases(
                    $d->id->namespace,
                    $d->id->directive,
                    $d->valueAliases
                );
            }
        }
    }
    
}
