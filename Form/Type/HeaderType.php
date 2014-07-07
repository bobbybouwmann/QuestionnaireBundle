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
                'label' => false,
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
//         var_dump(__FILE__, __LINE__, $view->vars['container']); die;
        $view->vars['container'] = false;
    }
}
