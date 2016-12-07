<?php

namespace AppBundle\Controller;

use AppBundle\Form\Handler\RegisterFormHandler;
use AppBundle\Form\Type\RegisterFormType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

/**
 * Class SecurityController
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class SecurityController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();

        if ($error) {
            $this->addFlash(
                AbstractController::ALERT_ERROR,
                $this->getErrorMessage($error)
            );
        }

        return $this->redirectToRoute('app_home');
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function logoutAction(Request $request)
    {
        // This controller will be not executed,
        // as the route is handled by the Security system.
    }

    /**
     * @param \Exception|null $error
     *
     * @return null|string
     *
     * @throws null
     */
    protected function getErrorMessage(\Exception $error = null)
    {
        if (null !== $error) {
            if ($error instanceof BadCredentialsException) {
                return 'Podany login lub hasło są niepoprawne.';
            }

            return 'Przepraszamy! Wystąpił nieokreślony błąd podczas logowania. Jeśli problem będzie się powtarzał '.
                   'prosimy o kontakt.';
        }

        return null;
    }
}
