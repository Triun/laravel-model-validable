<?php

namespace Triun\ModelValidable;

use Illuminate\Http\Request;
use Triun\ModelValidable\Utils\ModelValidator;

/**
 * Class ModelValidable
 * @package Triun\ModelValidable
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait ModelValidable
{
    /**
     * The rules to be applied in validate().
     *
     * @var array
     */
    //protected $rules = [];

    /**
     * Get the validation rules.
     *
     * @param string[] $keys
     * @return array
     */
    public function rules($keys = null)
    {
        if (!property_exists($this, 'rules')) {
            return [];
        }

        return $keys === null ? $this->rules : array_intersect_key($this->rules, array_flip($keys));
    }

    /**
     * Validate base model rules.
     *
     * @param \Illuminate\Http\Request|null $request
     * @param string[]|null                 $keys
     * @param array|null                    $rules
     *
     * @return bool
     * @throws \Illuminate\Foundation\Validation\ValidationException
     */
    public function validate(Request $request = null, $keys = null, $rules = null)
    {
        return (new ModelValidator)->validate($this, $request, $keys, $rules);
    }

    /**
     * @param Request|null $request
     *
     * @return bool
     */
    public function validateAll(Request $request = null)
    {
        return $this->validate($request, array_keys($this->getAttributes()), $this->rules);
    }
}