<?php

namespace Pajak\Id;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
interface TaxInterface
{
    public function addReductionFactor(ReductionFactorInterface $reductionFactor);

    public function addBasicCalculation(BasicCalculationInterface $basicCalculation);
}
