<?php
namespace Qaraqter\QuestionnaireBundle\Form\Type;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PreviousType extends SubmitType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'previous';
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
                'label' => 'Vorige',
                'attr' => array(
                    'class' => 'btn btn-primary pull-left',
                    'data-loading-text' => 'Laden...',
                ),
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);

//         var_dump(__FILE__, __LINE__, $view); die;
    }
}
