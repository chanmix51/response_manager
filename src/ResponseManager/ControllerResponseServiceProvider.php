<?php
namespace ResponseManager;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ControllerResponseServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['response_manager'] = $app->share(function() use ($app) {
            $response_builder = new ControllerResponseBuilder();

            return $response_builder
                ->addBuilder('string', function($string, $vars) { return new StringControllerResponse($string, $vars); })
                ->addBuilder('twig', function($file, $vars) use ($app) { return new TwigControllerResponse($app['twig'], $file, $vars); })
                ->addBuilder('csv', function($headers, $data) { return new CSVControllerResponse($headers, $data); })
                ;
        });

        $app['dispatcher']->addSubscriber(new ViewEventSubscriber());
    }

    public function boot(Application $app)
    {
    }
}
