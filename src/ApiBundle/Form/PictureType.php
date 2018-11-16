<?php

namespace ApiBundle\Form;

use ApiBundle\Entity\Picture;
use ApiBundle\Form\Traits\BookmarkTypeTrait;
use ApiBundle\Form\Traits\MediaTypeTrait;
use ApiBundle\Form\Traits\TaggableTypeTrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PictureType extends AbstractType
{

    use BookmarkTypeTrait, MediaTypeTrait, TaggableTypeTrait;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildBookmarkForm($builder);
        $this->buildMediaForm($builder);
        $this->buildTagForm($builder);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Picture::class,
            'csrf_protection' => false
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'apibundle_picture';
    }


}
