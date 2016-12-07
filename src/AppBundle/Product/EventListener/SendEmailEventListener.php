<?php

namespace AppBundle\Product\EventListener;

use AppBundle\Mailer\ProductMailer;
use AppBundle\Product\Model\Product;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

/**
 * Class SendEmailEventListener
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class SendEmailEventListener
{
    /**
     * @var ProductMailer
     */
    protected $productMailer;

    /**
     * SendEmailEventListener constructor.
     *
     * @param ProductMailer $mailer
     */
    public function __construct(ProductMailer $mailer)
    {
        $this->productMailer = $mailer;
    }

    /**
     * @param LifecycleEventArgs $event
     */
    public function postPersist(LifecycleEventArgs $event)
    {
        $object = $event->getObject();

        if ($object instanceof Product) {
            $this->productMailer->newProductNotify($object);
        }
    }
}