<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Wandi\MailerBundle\Renderer\RenderedEmail;

class EmailRenderEvent extends Event
{
    /**
     * @var RenderedEmail
     */
    protected $renderedEmail;

    /**
     * @var string[]
     */
    protected $recipients;

    /**
     * @param RenderedEmail $renderedEmail
     * @param array         $recipients
     */
    public function __construct(RenderedEmail $renderedEmail, array $recipients = [])
    {
        $this->renderedEmail = $renderedEmail;
        $this->recipients = $recipients;
    }

    /**
     * @return RenderedEmail
     */
    public function getRenderedEmail(): RenderedEmail
    {
        return $this->renderedEmail;
    }

    /**
     * @param RenderedEmail $renderedEmail
     */
    public function setRenderedEmail(RenderedEmail $renderedEmail): void
    {
        $this->renderedEmail = $renderedEmail;
    }

    /**
     * @return array
     */
    public function getRecipients(): array
    {
        return $this->recipients;
    }

    /**
     * @param array $recipients
     */
    public function setRecipients(array $recipients): void
    {
        $this->recipients = $recipients;
    }
}
