<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Sender;

use Wandi\MailerBundle\Model\EmailInterface;

interface SenderInterface
{
    /**
     * @param EmailInterface $email
     * @param array          $recipients
     * @param array          $data
     * @param array          $attachments
     * @param array          $replyTo
     */
    public function send(EmailInterface $email, array $recipients, array $data = [], array $attachments = [], array $replyTo = []): void;
}
