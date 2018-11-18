<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 16/11/2018
 * Time: 08:39
 */

namespace ApiBundle\Form\Traits;

use Symfony\Component\Form\FormBuilderInterface;

trait MediaTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     */
    private function buildMediaForm(FormBuilderInterface $builder): void {
        $builder
            ->add('width')
            ->add('height')
            ->add('thumbnailUrl');
    }
}