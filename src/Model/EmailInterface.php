<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Model;

interface EmailInterface
{
    /**
     * @return string
     */
    public function getTemplate(): string;

    /**
     * @param string $template
     *
     * @return EmailInterface
     */
    public function setTemplate(string $template): EmailInterface;

    /**
     * @return string|null
     */
    public function getSenderName(): ?string;

    /**
     * @param string $senderName
     *
     * @return EmailInterface
     */
    public function setSenderName(string $senderName): EmailInterface;

    /**
     * @return string|null
     */
    public function getSenderAddress(): ?string;

    /**
     * @param string $senderAddress
     *
     * @return EmailInterface
     */
    public function setSenderAddress(string $senderAddress): EmailInterface;

    /**
     * @param array $attributes
     *
     * @return EmailInterface
     */
    public function addAttributes(array $attributes): EmailInterface;

    /**
     * @param string $key
     * @param $value
     *
     * @return EmailInterface
     */
    public function addAttribute(string $key, $value);

    /**
     * @return array
     */
    public function getAttributes(): array;

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function getAttribute(string $key);

    /**
     * @param array $recipients
     * @param array $data
     * @param array $attachments
     * @param array $replyTo
     *
     * @return EmailInterface
     */
    public function send(array $recipients, array $data = [], array $attachments = [], array $replyTo = []);
}
