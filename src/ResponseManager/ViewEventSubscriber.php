<?php
namespace ResponseManager;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;


class ViewEventSubscriber implements EventSubscriberInterface
{
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $result = $event->getControllerResult();

        if ($result instanceOf ControllerResponse)
        {
            $options = $result->getOptions();
            $http_code = isset($options['http_code']) ? $options['http_code'] : 200;
            $headers = isset($options['headers']) ? $options['headers'] : array();

            $event->setResponse(new Response($result->createResponse(), $http_code, $headers));
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::VIEW => array('onKernelView', -15)
        );
    }
}
