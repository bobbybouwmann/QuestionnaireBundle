<?php
namespace Qaraqter\QuestionnaireBundle\Twig;

use Symfony\Component\Form\FormView;
class QuestionnaireExtension extends \Twig_Extension
{
    /**
     * Returns a list of global functions to add to the existing list.
     *
     * @return array An array of global functions
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('question', array($this, 'question')),
        );
    }

    public function getName()
    {
        return 'qaraqter_questionnaire.twig.extension.questionnaire';
    }

    public function question(FormView $view)
    {
        $question = array(
            'title' => $view->vars['label'],
            'description' => 'Denk aan de prioriteiten van onze mensen.',
            'answers' => array(),
        );

        foreach ($view->children as $child) {
            if ('_token' === $child->vars['name']) {
                continue;
            }
            $answer = array(
                'form' => array(
                    'label' => $child->vars['label'],
                    'value' => $child->vars['value'],
                    'name' => $child->vars['full_name'],
                    'checked' => false, //$child->vars['checked'],
                    'required' => $child->vars['required'],
                ),
            );
            $question['answers'][] = $answer;
        }

        return $question;
    }
}
