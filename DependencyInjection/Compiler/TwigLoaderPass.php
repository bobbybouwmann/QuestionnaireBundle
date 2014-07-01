<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Qaraqter\QuestionnaireBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Exception\LogicException;

/**
 * Adds services tagged twig.loader as Twig loaders
 *
 * @author Daniel Leech <daniel@dantleech.com>
 */
class TwigLoaderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('twig')) {
            return;
        }

        $path = $container->getParameter('kernel.root_dir') . '/../vendor/qaraqter/questionnaire/twig';

        $container->getDefinition('twig.loader.filesystem')
            ->addMethodCall('addPath', array($path, 'Questionnaire'))
            ->addMethodCall('addPath', array($path, '__main__'));
    }
}
