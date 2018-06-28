<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Model;

use Wandi\MailerBundle\Sender\Sender;

abstract class AbstractEmail implements EmailInterface
{
    /**
     * @var Sender
     */
    protected $sender;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * TotoParent constructor.
     * @param Sender $sender
     */
    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
        $this->attributes = [];
    }

    /**
     * @param array $attributes
     * @return EmailInterface
     */
    public function addAttributes(array $attributes): EmailInterface{
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    /**
     * @param string $key
     * @param $value
     * @return EmailInterface
     */
    public function addAttribute(string $key, $value){
        return $this->addAttributes([$key => $value]);
    }

    /**
     * @return array
     */
    public function getAttributes(): array {
        return $this->attributes;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getAttribute(string $key) {
        return $this->attributes[$key] ?? null;
    }

    /**
     * @return null|string
     */
    public function getSenderName(): ?string
    {
        return null;
    }

    /**
     * @return null|string
     */
    public function getSenderAddress(): ?string
    {
        return null;
    }

    /**
     * @param array $recipients
     * @param array $data
     * @param array $attachments
     * @param array $replyTo
     * @return EmailInterface
     */
    public function send(array $recipients, array $data = [], array $attachments = [], array $replyTo = [])
    {
        $this->sender->send($this, $recipients, $data, $attachments, $replyTo);

        return $this;
    }
}
