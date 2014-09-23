<?php
namespace Qaraqter\QuestionnaireBundle\Form\Type;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Pcs\AdminBundle\Entity\Question;
use Pcs\AdminBundle\Entity\Scan;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Pcs\AdminBundle\Entity\TemplateQuestion;
use Doctrine\Common\Persistence\ObjectManager;

class ProgressType extends AbstractType
{
    /**
     * @var ObjectManager $manager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'progress';
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
                'attr' => array(
                    'class' => 'progress',
                ),
                'completedQuestions' => null,
                'templateQuestion' => null,
                'totalQuestions' => null,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['container'] = false;
        $view->vars['total'] = $options['totalQuestions'];
        $view->vars['current'] = $options['templateQuestion']->getPosition();
        $view->vars['percentage'] = $options['completedQuestions'] / ($view->vars['total'] / 100);
        $view->vars['completedQuestionsCurrent'] = $options['completedQuestions'];
        $view->vars['completedQuestionsTotal'] = $view->vars['total'];
    }
}
