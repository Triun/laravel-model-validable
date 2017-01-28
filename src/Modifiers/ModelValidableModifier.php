<?php

namespace Triun\ModelValidable\Modifiers;

use Triun\ModelBase\Lib\ModifierBase;
use Triun\ModelBase\Definitions\Skeleton;

use Triun\ModelValidable\ModelValidable;
use Triun\ModelValidable\Contract\ModelValidable as ModelValidableContract;

class ModelValidableModifier extends ModifierBase
{
    /**
     * Apply the modifications of the class.
     *
     * @param \Triun\ModelBase\Definitions\Skeleton
     */
    public function apply(Skeleton $skeleton)
    {
        // Load interface
        $skeleton->addInterface(ModelValidableContract::class, 'ModelValidableContract');

        // Load trait
        $skeleton->addTrait(ModelValidable::class);
    }
}
