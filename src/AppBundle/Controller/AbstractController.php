<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AbstractController
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
abstract class AbstractController extends Controller
{
    const ALERT_ERROR   = 'danger';
    const ALERT_WARNING = 'warning';

    /**
     * @param array $messages
     */
    protected function addFlashMessages($messages)
    {
        foreach ($messages as $type => $messages) {
            foreach ($messages as $message) {
                $this->addFlash($type, $message);
            }
        }
    }
}
