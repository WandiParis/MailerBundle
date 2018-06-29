<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Renderer\Adapter;

use Wandi\MailerBundle\Event\EmailRenderEvent;
use Wandi\MailerBundle\Event\WandiMailerEvents;
use Wandi\MailerBundle\Model\EmailInterface;
use Wandi\MailerBundle\Renderer\RenderedEmail;

class EmailTwigAdapter extends AbstractAdapter
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Throwable
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render(EmailInterface $email, array $data = []): RenderedEmail
    {
        $renderedEmail = $this->getRenderedEmail($email, $data);

        /** @var EmailRenderEvent $event */
        $event = $this->dispatcher->dispatch(
            WandiMailerEvents::EMAIL_PRE_RENDER,
            new EmailRenderEvent($renderedEmail)
        );

        return $event->getRenderedEmail();
    }

    /**
     * @param EmailInterface $email
     * @param array          $data
     *
     * @return RenderedEmail
     *
     * @throws \Throwable
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    private function getRenderedEmail(EmailInterface $email, array $data): RenderedEmail
    {
        $data = $this->twig->mergeGlobals($data);

        /** @var \Twig_Template $template */
        $template = $this->twig->loadTemplate($email->getTemplate());

        $subject = $template->renderBlock('subject', $data);
        $body = $template->renderBlock('body', $data);

        return new RenderedEmail($subject, $body);
    }
}
