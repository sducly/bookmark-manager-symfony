<?php

namespace ApiBundle\Form;

use ApiBundle\Entity\Bookmark;
use ApiBundle\Form\Traits\VideoTypeTrait;
use Symfony\Component\Form\AbstractType;
use ApiBundle\Form\Traits\MediaTypeTrait;
use ApiBundle\Form\Traits\TaggableTypeTrait;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookmarkType extends AbstractType
{

    use MediaTypeTrait, TaggableTypeTrait, VideoTypeTrait;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildTagForm($builder);
        $this->buildMediaForm($builder);
        $this->buildVideoForm($builder);

        $builder
            ->add('url')
            ->add('title')
            ->add('authorName');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Bookmark::class,
            'csrf_protection' => false
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'apibundle_bookmark';
    }


}
