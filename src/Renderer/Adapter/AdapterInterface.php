<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Renderer\Adapter;

use Wandi\MailerBundle\Model\EmailInterface;
use Wandi\MailerBundle\Renderer\RenderedEmail;

interface AdapterInterface
{
    /**
     * @param EmailInterface $email
     * @param array          $data
     *
     * @return RenderedEmail
     */
    public function render(EmailInterface $email, array $data = []): RenderedEmail;
}
