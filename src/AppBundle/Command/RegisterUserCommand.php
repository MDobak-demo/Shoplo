<?php

namespace AppBundle\Command;

use AppBundle\User\Model\UserId;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\ConstraintViolation;

/**
 * Class RegisterUserCommand
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class RegisterUserCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:user:register')
            ->addOption(
                'email',
                null,
                InputOption::VALUE_REQUIRED
            )
            ->addOption(
                'password',
                null,
                InputOption::VALUE_REQUIRED
            )
            ->addOption(
                'first-name',
                null,
                InputOption::VALUE_REQUIRED
            )
            ->addOption(
                'last-name',
                null,
                InputOption::VALUE_REQUIRED
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id        = new UserId();
        $email     = $input->getOption('email');
        $password  = $input->getOption('password');
        $firstName = $input->getOption('first-name');
        $lastName  = $input->getOption('last-name');

        $commandBus = $this->getContainer()->get('tactician.commandbus.default');
        $validator  = $this->getContainer()->get('validator');
        $formatter  = $this->getHelper('formatter');

        $command = new \AppBundle\User\Command\RegisterUserCommand($id, $email, $password, $firstName, $lastName);
        $errors  = $validator->validate($command);

        if (count($errors)) {
            $errorsMessages = [];

            /** @var ConstraintViolation $error */
            foreach ($errors as $error) {
                $errorsMessages[] = "{$error->getPropertyPath()}: {$error->getMessage()}";
            }

            $formattedBlock = $formatter->formatBlock($errorsMessages, 'error', true);
            $output->writeln($formattedBlock);
        }

        $commandBus->handle($command);

        $output->writeln("<fg=green>User {$command->getEmail()} successfully registered</>");
    }
}