<?php

/* /src/Email/NewPostEmail.php */

namespace App\Email;

use Wandi\MailerBundle\Model\AbstractEmail;
use Symfony\Component\Translation\TranslatorInterface;
use Wandi\MailerBundle\Sender\Sender;

/**
 * Class NewPostEmail
 * @package App\Email
 * Work with service
 */
class NewPostEmail extends AbstractEmail
{
    private $translator;

    public function __construct(Sender $sender, TranslatorInterface $translator)
    {
        parent::__construct($sender);
        $this->translator = $translator;
    }

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
        return $this->translator->trans('email.sender.name');
    }

    /**
     * @return null|string
     */
    public function getSenderAddress(): ?string
    {
        return $this->translator->trans('email.sender.address');
    }
}
