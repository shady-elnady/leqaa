<?php

namespace Core\Traits;

use Illuminate\Support\Str;

trait HasHumanReadableName
{
    /**
     * Get a human-readable singular name of the model.
     *
     * @return string
     */
    public function getSingularName()
    {
        return Str::singular(strtolower(class_basename($this)));
    }

    /**
     * Get a human-readable plural name of the model.
     *
     * @return string
     */
    public function getPluralName($className = null): string
    {
        $className = $className ?: get_class($this);
        return Str::plural(Str::snake(class_basename($className)));
    }
    /**
     * Get a human-readable plural name of the model.
     *
     * @return string
     */
    public function getMySingularName($className = null): string
    {
        $className = $className ?: get_class($this);
        return Str::singular(Str::snake(class_basename($className)));
    }
}
