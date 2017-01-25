<?php

namespace Pajak\Id;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
interface ReductionFactorInterface
{
    public function getName();

    public function getDescription();

    public function getValue();
}
