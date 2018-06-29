<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Sender\Adapter;

use Wandi\MailerBundle\Event\EmailSendEvent;
use Wandi\MailerBundle\Event\WandiMailerEvents;
use Wandi\MailerBundle\Model\EmailInterface;
use Wandi\MailerBundle\Renderer\RenderedEmail;

class SwiftMailerAdapter extends AbstractAdapter
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function send(
        array $recipients,
        string $senderAddress,
        string $senderName,
        RenderedEmail $renderedEmail,
        EmailInterface $email,
        array $data,
        array $attachments = [],
        array $replyTo = []
    ): void {
        $message = (new \Swift_Message())
            ->setSubject($renderedEmail->getSubject())
            ->setFrom([$senderAddress => $senderName])
            ->setTo($recipients)
            ->setReplyTo($replyTo);

        $message->setBody($renderedEmail->getBody(), 'text/html');

        foreach ($attachments as $attachment) {
            $file = \Swift_Attachment::fromPath($attachment);

            $message->attach($file);
        }

        $emailSendEvent = new EmailSendEvent($message, $email, $data, $recipients, $replyTo);

        $this->dispatcher->dispatch(WandiMailerEvents::EMAIL_PRE_SEND, $emailSendEvent);

        $this->mailer->send($message);

        $this->dispatcher->dispatch(WandiMailerEvents::EMAIL_POST_SEND, $emailSendEvent);
    }
}
