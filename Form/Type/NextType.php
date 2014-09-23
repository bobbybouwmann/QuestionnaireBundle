<?php
namespace Qaraqter\QuestionnaireBundle\Form\Type;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NextType extends SubmitType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'next';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'submit';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'label' => 'Volgende',
                'disabled' => false,
                'attr' => array(
                    'class' => 'btn btn-primary pull-right',
                    'data-loading-text' => 'Laden...',
                ),
                'completedQuestions' => null,
                'totalQuestions' => null,
                'lastQuestionToFillIn' => null,
                'currentQuestion' => null,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);
        $view->vars['total'] = $options['totalQuestions'];
        $view->vars['disabled'] = $options['disabled'];
        $view->vars['completedQuestionsCurrent'] = $options['completedQuestions'];
        $view->vars['lastQuestionToFillIn'] = $options['lastQuestionToFillIn'];
        $view->vars['currentQuestion'] = $options['currentQuestion'];
    }
}
