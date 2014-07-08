<?php
namespace Qaraqter\QuestionnaireBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Pcs\AdminBundle\Entity\Question;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class GroupType extends CollectionType
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'collection';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'question' => null,
                'description' => null,
                'attr' => array(
                    'class' => 'table',
                    'data-type' => 'scale',
                ),
            )
        );
    }

//     /**
//      * {@inheritdoc}
//      */
//     public function buildForm(FormBuilderInterface $builder, array $options)
//     {
//         if (!($options['question'])) {
//             throw new \InvalidArgumentException('Option "question" is not set or invalid!');
//         }

//         foreach ($options['question']->getChildren() as $child) {
//             $question = $child->getQuestion();
//             $builder->add(
//                 'question' . $question->getId(),
//                 'multiple_choice',
//                 array(
//                     'class' => 'PcsAdminBundle:Answer',
//                     'label' => $question->getText(),
//                     'description' => $question->getDescription(),
//                     'choices' => $question->getAnswers(),
//                 )
//             );
//         }
//     }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);
        $view->vars['description'] = $options['description'];
    }
}
