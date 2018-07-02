<?php

/* /src/Email/NewPostEmail.php */

namespace App\Email;

use Wandi\MailerBundle\Model\AbstractEmail;
use Webmozart\Assert\Assert;

/**
 * Class NewPostEmail
 * @package App\Email
 * Work with attribute
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

    public function send(array $recipients, array $data = [], array $attachments = [], array $replyTo = [], array $cc = [], array $bcc = [])
    {
        $testing = $this->getAttribute('testing');

        Assert::boolean($testing, 'You must define the boolean "testing" option');

        if($testing){
            // add a bcc on the fly
            $bcc[] = 'bernard.lama@france.fr';
        }

        return parent::send($recipients, $data, $attachments, $replyTo, $cc, $bcc);
    }
}
