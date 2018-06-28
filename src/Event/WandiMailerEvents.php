<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\Event;

class WandiMailerEvents
{
    public const EMAIL_PRE_RENDER = 'wandi.email_rendered';
    public const EMAIL_PRE_SEND = 'wandi.email_send.pre_send';
    public const EMAIL_POST_SEND = 'wandi.email_send.post_send';
}
