<?php
namespace ResponseManager;

class StringControllerResponse extends ControllerResponse
{
    protected $string;

    public function __construct($string, $vars)
    {
        $this->string = $string;
        $this->vars = $vars;
    }

    public function createResponse()
    {
        $string = $this->string;

        foreach ($this->getVars() as $name => $value)
        {
            $string = strtr($string, sprintf("{{ %s }}", strtoupper($name)), $value);
        }

        return $string;
    }
}
