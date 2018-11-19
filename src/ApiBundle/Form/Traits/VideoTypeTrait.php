<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 16/11/2018
 * Time: 08:39
 */

namespace ApiBundle\Form\Traits;

use ApiBundle\Form\VideoType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

trait VideoTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     */
    private function buildVideoForm(FormBuilderInterface $builder): void {
        $builder->add('video', VideoType::class, [
            'required' => false
        ]);
    }
}