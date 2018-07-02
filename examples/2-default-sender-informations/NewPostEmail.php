<?php

/* /src/Email/NewPostEmail.php */

namespace App\Email;

use Wandi\MailerBundle\Model\AbstractEmail;

/**
 * Class NewPostEmail
 * @package App\Email
 * Use the config file to set the default value of the sender
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
}
