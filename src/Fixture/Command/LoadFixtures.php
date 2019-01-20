<?php

namespace App\Fixture\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\Common\Persistence\ObjectManager;
use App\Security\Model\User;
use Nelmio\Alice\Loader\SimpleFileLoader as AliceLoader;

class LoadFixtures extends Command
{
    private $projectDirectory;
    private $em;
    private $aliceLoader;

    protected static $defaultName = 'fixtures:load';

    protected function configure()
    {
        $this
            ->setDescription('Loading fixtures')
        ;
    }

    public function __construct(string $projectDirectory, ObjectManager $em, AliceLoader $aliceLoader)
    {
        $this->projectDirectory = $projectDirectory;
        $this->em = $em;
        $this->aliceLoader = $aliceLoader;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->section('Loading fixtures…');

        $objectSet = $this->aliceLoader->loadFile(sprintf(
            '%s/resources/fixtures/el_professor.yml',
            $this->projectDirectory
        ));

        $entityCount = [];
        foreach ($objectSet->getObjects() as $entity) {
            $entityClass = get_class($entity);
            if (!isset($entityCount[$entityClass])) {
                $entityCount[$entityClass] = 0;
            }

            $entityCount[$entityClass]++;

            $this->em->persist($entity);
        }

        $this->em->flush();

        foreach ($entityCount as $entityClass => $count) {
            $io->text(sprintf('[%s] %d added.', $entityClass, $count));
        }

        $io->success('Fixtures loaded.');
    }
}
