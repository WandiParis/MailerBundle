<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Model;

use Wandi\MailerBundle\Sender\Sender;

abstract class AbstractEmail implements EmailInterface
{
    /**
     * @var string
     */
    private $template;

    /**
     * @var string
     */
    private $senderName;

    /**
     * @var string
     */
    private $senderAddress;

    /**
     * @var Sender
     */
    protected $sender;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * AbstractEmail constructor.
     *
     * @param Sender $sender
     */
    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
        $this->attributes = [];
        $this->template = null;
        $this->senderName = null;
        $this->senderAddress = null;
    }

    /**
     * @param array $attributes
     *
     * @return EmailInterface
     */
    public function addAttributes(array $attributes): EmailInterface
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    /**
     * @param string $key
     * @param $value
     *
     * @return EmailInterface
     */
    public function addAttribute(string $key, $value)
    {
        return $this->addAttributes([$key => $value]);
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function getAttribute(string $key)
    {
        return $this->attributes[$key] ?? null;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     *
     * @return EmailInterface
     */
    public function setTemplate(string $template): EmailInterface
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSenderName(): ?string
    {
        return $this->senderName;
    }

    public function setSenderName(string $senderName): EmailInterface
    {
        $this->senderName = $senderName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSenderAddress(): ?string
    {
        return $this->senderAddress;
    }

    public function setSenderAddress(string $senderAddress): EmailInterface
    {
        $this->senderAddress = $senderAddress;

        return $this;
    }

    /**
     * @param array $recipients
     * @param array $data
     * @param array $attachments
     * @param array $replyTo
     *
     * @param array $cc
     * @param array $bcc
     * @return EmailInterface
     */
    public function send(array $recipients, array $data = [], array $attachments = [], array $replyTo = [], array $cc = [], array $bcc = [])
    {
        $this->sender->send($this, $recipients, $data, $attachments, $replyTo, $cc, $bcc);

        return $this;
    }
}
