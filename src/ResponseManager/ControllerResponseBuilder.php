<?php
namespace ResponseManager;

class ControllerResponseBuilder
{
    protected $builders = array();

    public function addBuilder($name, $builder)
    {
        if (!is_callable($builder))
        {
            throw new \InvalidArgumentException(sprintf("Argument 'builder' must be a callable returning a `ControllerResponseInterface` ('%s' given).", gettype($builder)));
        }

        $this->builders[$name] = $builder;

        return $this;
    }

    public function build($name, Array $args)
    {
        return call_user_func_array($this->builders[$name], $args);
    }
}
