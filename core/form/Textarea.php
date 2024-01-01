<?php

namespace Fckin\core\form;

use Fckin\core\db\Model;

class Textarea
{
    public Model $model;
    public string $name;
    public string $classes;

    public function __construct(Model $model, string $name, string $classes)
    {
        $this->model = $model;
        $this->name = $name;
        $this->classes = $classes;
    }

    public function __toString()
    {
        return sprintf('
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">%s</span>
                </div>
                <textarea name="%s" placeholder="Type %s here" class="textarea textarea-bordered w-full %s %s">%s</textarea>
                <div className="label">
                    <span className="label-text-alt">%s</span>
                </div>
            </label>
        ',
            text_alt_formatter($this->name),
            $this->name,
            text_alt_formatter($this->name),
            $this->classes,
            $this->model->hasError($this->name) ? 'input-error' : '',
            $this->model->{$this->name},
            $this->model->getFirstError($this->name)
        );
    }
}