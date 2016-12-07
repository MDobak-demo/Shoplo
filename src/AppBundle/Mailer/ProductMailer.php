<?php

namespace AppBundle\Mailer;

use AppBundle\Product\Model\Product;
use AppBundle\User\Model\User;

/**
 * Class ProductMailer
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class ProductMailer
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var string
     */
    protected $notificationEmailAddress;

    /**
     * ProductMailer constructor.
     *
     * @param \Swift_Mailer     $mailer
     * @param \Twig_Environment $twig
     * @param string            $notificationEmailAddress
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig, $notificationEmailAddress)
    {
        $this->mailer                   = $mailer;
        $this->twig                     = $twig;
        $this->notificationEmailAddress = $notificationEmailAddress;
    }

    /**
     * @param Product $product
     */
    public function newProductNotify(Product $product)
    {
        /** @var \Twig_Template $twigTemplate */
        $twigTemplate = $this->twig->loadTemplate("AppBundle:product/mail:new_product.html.twig");
        $subject      = $twigTemplate->renderBlock('subject', ['product' => $product]);
        $body         = $twigTemplate->renderBlock('body', ['product' => $product]);

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom('send@example.com')
            ->setTo($this->notificationEmailAddress)
            ->setBody($body, 'text/html')
        ;

        $this->mailer->send($message);
    }
}