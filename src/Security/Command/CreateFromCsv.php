<?php

namespace App\Security\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\Common\Persistence\ObjectManager;
use App\Security\Model\User;
use Ramsey\Uuid\Uuid;

class CreateFromCsv extends Command
{
    private $em;

    protected static $defaultName = 'csv:import-user';

    protected function configure()
    {
        $this
            ->setDescription('Creating users from a CSV file')
            ->addArgument('file', InputArgument::REQUIRED, 'CSV file path')
        ;
    }

    public function __construct(ObjectManager $em)
    {
        $this->em = $em;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $csvFilePath = $input->getArgument('file');
        if (!is_string($csvFilePath)) {
            throw new \InvalidArgumentException('file argument must be a string.');
        }

        $io->section(sprintf('Importing users from "%s"…', $csvFilePath));

        $handle = fopen($csvFilePath, "r");
        if (!$handle) {
            throw new \RuntimeException('Could not open CSV file.');
        }

        // skip header
        fgetcsv($handle, 0, ",");

        $importedUsers = 0;
        while (($row = fgetcsv($handle, 0, ",")) !== false) {
            $user = new User();
            $names = explode(' ', $row[0]);
            
            if (preg_match('/\((.+)\.([^)]+)\)/', $row[1], $matches)) {
                $extension = $matches[2];
                $imageUrl = $matches[1].'.'.$extension;

                $pictureFile = sprintf('%s.%s', uniqid(), $extension);

                file_put_contents(sprintf(
                    "public/upload/profile_picture/%s",
                    $pictureFile
                ), fopen($imageUrl, 'r'));

                $user->setPicture($pictureFile);
            }

            $user->setUid(Uuid::uuid4()->toString());
            $user->setEmail($row[2]);
            $user->setRoles(['ROLE_STUDENT', 'ROLE_LOGBOOK']);
            $user->setFirstname(ucfirst($names[0]));
            $user->setLastname(ucfirst($names[1]));

            $this->em->persist($user);
            $importedUsers++;
        }

        $this->em->flush();

        $io->success(sprintf('%d users imported.', $importedUsers));
    }
}
