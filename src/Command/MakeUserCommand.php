<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[AsCommand(
    name: 'app:make-user',
    description: 'Creates a user.',
)]
class MakeUserCommand extends Command
{
    public function __construct(
        string $name = null,
        private ?UserRepository $userRepository = null,
        private ?EntityManagerInterface $entityManager = null,
        private ?UserPasswordHasherInterface $passwordHasher = null
    ) {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $username = $io->ask('Username?');

        if ($this->userRepository->findOneBy([ 'username' => $username ])) {
            $io->error('Username already exists.');
            return Command::FAILURE;
        }

        $password1 = $io->askHidden('Password?');
        $password2 = $io->askHidden('Confirm password?');

        if ($password1 !== $password2) {
            $io->error('Passwords do not match.');
            return Command::FAILURE;
        }

        $user = new User();
        $user
            ->setUsername($username)
            ->setPassword(
                $this->passwordHasher->hashPassword($user, $password1)
            );
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success('User created.');

        return Command::SUCCESS;
    }
}
