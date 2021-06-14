<?php


namespace ALPIXEL\Bundle\RedirectBundle\EventListener;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class KernelListener
{
    private array $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $uri = $request->getRequestUri();

        foreach ($this->rules as $rule) {
            if ($rule['from'] === $uri) {
                $event->setResponse(new RedirectResponse($rule['to']));
            }
        }
    }
}
