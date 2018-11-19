<?php

namespace ApiBundle\Form;

use ApiBundle\Entity\Video;
use ApiBundle\Form\Traits\MediaTypeTrait;
use ApiBundle\Form\Traits\TaggableTypeTrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{

    use MediaTypeTrait, TaggableTypeTrait;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("duration");
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Video::class,
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
