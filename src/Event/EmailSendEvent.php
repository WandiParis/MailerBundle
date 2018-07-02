<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Wandi\MailerBundle\Model\EmailInterface;

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
     * @var string[]
     */
    protected $cc;

    /**
     * @var string[]
     */
    protected $bcc;

    /**
     * @param mixed $message
     * @param EmailInterface $email
     * @param array $data
     * @param array $recipients
     * @param array $replyTo
     * @param array $cc
     * @param array $bcc
     */
    public function __construct($message, EmailInterface $email, array $data, array $recipients = [], array $replyTo = [], array $cc = [], array $bcc = [])
    {
        $this->message = $message;
        $this->email = $email;
        $this->data = $data;
        $this->recipients = $recipients;
        $this->replyTo = $replyTo;
        $this->cc = $cc;
        $this->bcc = $bcc;
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

    /**
     * @return string[]
     */
    public function getCc(): array
    {
        return $this->cc;
    }

    /**
     * @return string[]
     */
    public function getBcc(): array
    {
        return $this->bcc;
    }
}
