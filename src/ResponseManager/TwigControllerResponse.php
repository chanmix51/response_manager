<?php
namespace ResponseManager;

class TwigControllerResponse extends ControllerResponse
{
    protected $twig;
    protected $template_path;

    public function __construct($twig, $template_path, $vars)
    {
        $this->twig = $twig;
        $this->template_path = $template_path;
        $this->vars = $vars;
    }

    public function createResponse()
    {
        return $this->twig->render($this->template_path, $this->vars);
    }
}
