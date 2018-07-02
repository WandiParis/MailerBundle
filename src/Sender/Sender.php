<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Sender;

use Wandi\MailerBundle\Model\EmailInterface;
use Wandi\MailerBundle\Renderer\Adapter\AdapterInterface as RendererAdapterInterface;
use Wandi\MailerBundle\Sender\Adapter\AdapterInterface as SenderAdapterInterface;

final class Sender implements SenderInterface
{
    /**
     * @var RendererAdapterInterface
     */
    private $rendererAdapter;

    /**
     * @var SenderAdapterInterface
     */
    private $senderAdapter;

    /**
     * @var array
     */
    private $defaultSender;

    /**
     * @param RendererAdapterInterface $rendererAdapter
     * @param SenderAdapterInterface   $senderAdapter
     * @param array                    $defaultSender
     */
    public function __construct(
        RendererAdapterInterface $rendererAdapter,
        SenderAdapterInterface $senderAdapter,
        array $defaultSender
    ) {
        $this->senderAdapter = $senderAdapter;
        $this->rendererAdapter = $rendererAdapter;
        $this->defaultSender = $defaultSender;
    }

    /**
     * {@inheritdoc}
     */
    public function send(EmailInterface $email, array $recipients, array $data = [], array $attachments = [], array $replyTo = [], array $cc = [], array $bcc = []): void
    {
        $senderAddress = $email->getSenderAddress() ?: $this->defaultSender['address'];
        $senderName = $email->getSenderName() ?: $this->defaultSender['name'];

        $renderedEmail = $this->rendererAdapter->render($email, $data);

        $this->senderAdapter->send(
            $recipients,
            $senderAddress,
            $senderName,
            $renderedEmail,
            $email,
            $data,
            $attachments,
            $replyTo
        );
    }
}
