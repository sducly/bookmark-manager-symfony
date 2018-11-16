<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 16/11/2018
 * Time: 08:39
 */

namespace ApiBundle\Form\Traits;

use ApiBundle\Form\BookmarkType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

trait BookmarkTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     */
    private function buildBookmarkForm(FormBuilderInterface $builder): void {
        $builder->add('bookmark', BookmarkType::class, [
            'constraints' => array(new Valid()),
        ]);
    }
}