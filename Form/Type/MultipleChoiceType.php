<?php
namespace Qaraqter\QuestionnaireBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Pcs\AdminBundle\Entity\Question;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\Common\Proxy\Exception\InvalidArgumentException;

class MultipleChoiceType extends AbstractType
{
//     private $question;

//     public function __construct(Question $question)
//     {
//         $this->question = $question;
//     }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'entity';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'multiple_choice';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'description' => null,
                'expanded' => true,
                'attr' => array(
                    'class' => 'panel-body inner-question'
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

        $view->vars['description'] = $options['description'];
        $view->vars['checked'] = $view->vars['is_selected'];
    }
}
