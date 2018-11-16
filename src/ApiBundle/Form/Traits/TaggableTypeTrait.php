<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 16/11/2018
 * Time: 08:39
 */

namespace ApiBundle\Form\Traits;


use ApiBundle\Form\DataTransformer\TagTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

trait TaggableTypeTrait
{

    private $tagTransformer;

    /**
     * TaggableTypeTrait constructor.
     * @param TagTransformer $tagTransformer
     */
    public function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }

    /**
     * @param FormBuilderInterface $builder
     */
    private function buildTagForm(FormBuilderInterface $builder): void {
        $builder->add('tags', TextType::class);
        $builder->get('tags')->addModelTransformer($this->tagTransformer);
    }
}