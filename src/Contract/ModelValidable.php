<?php

namespace Triun\ModelValidable\Contract;

use Illuminate\Http\Request;

interface ModelValidable
{
    /**
     * Get the validation rules.
     *
     * @param string[] $keys
     * @return array
     */
    public function rules($keys = null);

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
    public function validate(Request $request = null, $keys = null, $rules = null);

    /**
     * @param Request|null $request
     *
     * @return bool
     */
    public function validateAll(Request $request = null);
}