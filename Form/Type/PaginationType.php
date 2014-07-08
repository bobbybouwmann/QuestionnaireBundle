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

class PaginationType extends AbstractType
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
        return 'pagination';
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
                    'class' => 'pagination',
                ),
                'scan' => null,
                'templateQuestion' => null,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (!($options['scan'] instanceof Scan)) {
            throw new \InvalidArgumentException('Option "scan" is not set or invalid!');
        }

        if (!($options['templateQuestion'] instanceof TemplateQuestion)) {
            throw new \InvalidArgumentException('Option "templateQuestion" is not set or invalid!');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['container'] = false;

        // count total
        $view->vars['total'] = $this->manager->getRepository('PcsAdminBundle:TemplateQuestion')
            ->countByTemplate($options['scan']->getTemplate());

        // get current position

        //@todo
    }
}
