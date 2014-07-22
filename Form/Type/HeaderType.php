<?php
namespace Qaraqter\QuestionnaireBundle\Form\Type;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HeaderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'header';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'form';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'mapped' => false,
                'label' => false,
                'title' => null,
                'description' => null,
                'attr' => array(
                    'class' => 'panel-heading',
                ),
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['container'] = false;
        $view->vars['title'] = $options['title'];
        $view->vars['description'] = $options['description'];
    }
}
