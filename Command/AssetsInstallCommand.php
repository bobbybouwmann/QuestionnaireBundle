<?php

namespace Qaraqter\QuestionnaireBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class AssetsInstallCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('questionnaire:assets:install')
            ->setDescription('Installs questionnaire assets to QaraqterQuestionnaireBundle')
        ;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \InvalidArgumentException When the target directory does not exist or symlink cannot be used
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $filesystem = $container->get('filesystem');
        $bundleDir = $container->get('kernel')->getBundle('QaraqterQuestionnaireBundle')->getPath();

        $mirrorOptions = array(
            'override' => true,
            'copy_on_windows' => true,
            'delete' => false,
        );

        // mirror CSS
        $originDir = $bundleDir . '/../questionnaire/web/css';
        $targetDir = $bundleDir . '/Resources/public/css';

        if (!$filesystem->exists($targetDir)) {
            $filesystem->mkdir($targetDir);
        }

        $filesystem->mirror(
            $originDir,
            $targetDir,
            null,
            $mirrorOptions
        );

        // mirror JS
        $originDir = $bundleDir . '/../questionnaire/web/js';
        $targetDir = $bundleDir . '/Resources/public/js';

        if (!$filesystem->exists($targetDir)) {
            $filesystem->mkdir($targetDir);
        }

        $filesystem->mirror($originDir, $targetDir, null, $mirrorOptions);

        $output->writeln("Installing questionnaire assets to QaraqterQuestionnaireBundle");
    }
}
