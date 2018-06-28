<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Event;

use Wandi\MailerBundle\Model\EmailInterface;
use Symfony\Component\EventDispatcher\Event;

final class EmailSendEvent extends Event
{
    /**
     * @var mixed
     */
    protected $message;

    /**
     * @var string[]
     */
    protected $recipients;

    /**
     * @var EmailInterface
     */
    protected $email;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string[]
     */
    protected $replyTo;

    /**
     * @param mixed $message
     * @param EmailInterface $email
     * @param array $data
     * @param array $recipients
     * @param array $replyTo
     */
    public function __construct($message, EmailInterface $email, array $data, array $recipients = [], array $replyTo = [])
    {
        $this->message = $message;
        $this->email = $email;
        $this->data = $data;
        $this->recipients = $recipients;
        $this->replyTo = $replyTo;
    }

    /**
     * @return array
     */
    public function getRecipients(): array
    {
        return $this->recipients;
    }

    /**
     * @return EmailInterface
     */
    public function getEmail(): EmailInterface
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string[]
     */
    public function getReplyTo(): array
    {
        return $this->replyTo;
    }
}
