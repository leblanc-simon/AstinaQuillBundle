<?php

namespace Astina\Bundle\QuillBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuillType extends AbstractType
{
    private $quillUrl;

    private $toolbarTemplate;

    private $theme;

    function __construct($quillUrl, $toolbarTemplate, $theme)
    {
        $this->quillUrl = $quillUrl;
        $this->toolbarTemplate = $toolbarTemplate;
        $this->theme = $theme;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['quill_url'] = $options['quill_url'];
        $view->vars['toolbar_template'] = $options['toolbar_template'];
        $view->vars['theme'] = $options['theme'];
        $view->vars['attr']['style'] = 'display: none';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'quill_url' => $this->quillUrl,
            'toolbar_template' => $this->toolbarTemplate,
            'theme' => $this->theme,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'quill';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'textarea';
    }
}