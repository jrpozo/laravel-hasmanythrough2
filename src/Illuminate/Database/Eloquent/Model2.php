<?php

namespace Illuminate\Database\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough2;

class Model2 extends Model
{
    /**
     * Define a Rails-like has-many-through relationship.
     *
     * @param  string  $related
     * @param  string  $through
     * @param  string|null  $firstKey
     * @param  string|null  $secondKey
     * @param  string|null  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function hasManyThrough2($related, $through, $firstKey = null, $secondKey = null, $localKey = null)
    {
        $related = new $related;

        $firstKey = $firstKey ?: $this->getForeignKey();

        $secondKey = $secondKey ?: $related->getForeignKey();

        $localKey = $localKey ?: $this->getKeyName();

        return new HasManyThrough2($related->newQuery(), $this, new $through, $firstKey, $secondKey, $localKey);
    }
}
