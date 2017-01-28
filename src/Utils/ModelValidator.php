<?php

namespace Triun\ModelValidable\Utils;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Validation\ValidationException as ValidationExceptionContract;

class ModelValidator
{
    use ValidatesRequests;

    /**
     * Validate base model rules.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param \Illuminate\Http\Request|null       $request
     * @param string[]|null                       $keys
     * @param array|null                          $rules
     *
     * @return bool
     * @throws \Illuminate\Foundation\Validation\ValidationException|ValidationExceptionContract|\Exception
     */
    public function validate(Model $model, Request $request = null, $keys = null, $rules = null)
    {
        // The default behaviour will be validate dirty keys
        if ($keys === null) {
            // If there is no changes, do not validate.
            if (!$model->isDirty()) {
                return true;
            }

            $data = $model->getDirty();
            $keys = array_keys($data);
        } else {
            $data = array_intersect_key($model->getAttributes(), array_flip($keys));
        }

        if ($rules === null) {
            if (!method_exists($model, 'rules')) {
                throw new \Exception('No rules specified for '.get_class($model));
            }

            $rules = $model->rules($keys);
        }

        $validator = $this->getValidationFactory()->make($data, $rules);

        if ($validator->fails()) {
            $request = $request?: request();

            if ($request instanceof Request) {
                $this->throwValidationException($request, $validator);
            }

            throw new ValidationExceptionContract($validator);
        }

        return true;
    }
}
