<?php

namespace Qaraqter\QuestionnaireBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Qaraqter\QuestionnaireBundle\DependencyInjection\Compiler\TwigLoaderPass;

class QaraqterQuestionnaireBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TwigLoaderPass());
    }
}
