<?php

namespace Pajak\Id;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
interface TaxInterface
{
    /**
     * @param ReductionFactorInterface $reductionFactor
     */
    public function addReductionFactor(ReductionFactorInterface $reductionFactor);

    /**
     * @param BasicCalculationInterface $basicCalculation
     */
    public function addBasicCalculation(BasicCalculationInterface $basicCalculation);

    /**
     * @return float
     */
    public function calculate(): float;

    /**
     * @return string
     */
    public function getName(): string;
}
