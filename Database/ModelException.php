<?php namespace Modules\LivewireCore\Database;

use Modules\LivewireCore\Exception\ValidationException;

/**
 * Used when validation fails. Contains the invalid model for easy analysis.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class ModelException extends ValidationException
{

    /**
     * @var Model The invalid model.
     */
    protected $model;

    /**
     * Receives the invalid model and sets the {@link model} and {@link errors} properties.
     * @param Model $model The troublesome model.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->errors = $model->errors();
        $this->evalErrors();
    }

    /**
     * Returns the model with invalid attributes.
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }
}
