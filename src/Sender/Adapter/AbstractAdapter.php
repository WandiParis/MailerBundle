<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Sender\Adapter;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @param EventDispatcherInterface $dispatcher
     */
    public function setEventDispatcher(EventDispatcherInterface $dispatcher): void
    {
        $this->dispatcher = $dispatcher;
    }
}
