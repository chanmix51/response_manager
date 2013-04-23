<?php
namespace ResponseManager;

abstract class ControllerResponse implements ControllerResponseInterface, \ArrayAccess
{
    protected $vars;
    protected $options = array();

    public function getVars()
    {
        return $this->vars;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function offsetExists($offset)
    {
        return isset($this->vars[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->vars[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->vars[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->vars[$offset]);
    }
}
