<?php

/* /src/Email/NewPostEmail.php */

namespace App\Email;

use Wandi\MailerBundle\Model\AbstractEmail;

/**
 * Class NewPostEmail
 * @package App\Email
 * Override sender address and/or sender name
 */
class NewPostEmail extends AbstractEmail
{
    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return 'home/new_post.html.twig';
    }
    /**
     * @return null|string
     */
    public function getSenderName(): ?string
    {
        return 'Didier Deschamps';
    }

    /**
     * @return null|string
     */
    public function getSenderAddress(): ?string
    {
        return 'didier.deschamps@france.fr';
    }
}
