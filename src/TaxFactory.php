<?php

namespace Pajak\Id;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class TaxFactory
{
    /**
     * @var TaxInterface[]
     */
    private $taxes;

    /**
     * @var ReductionFactorInterface[]
     */
    private $reductionFactors;

    /**
     * @var BasicCalculationInterface[]
     */
    private $basicCalculations;

    /**
     * @param TaxInterface $tax
     */
    public function addTax(TaxInterface $tax)
    {
        $this->taxes[$tax->getName()] = $tax;
    }


    /**
     * @param ReductionFactorInterface $reductionFactor
     */
    public function addReductionFactor(ReductionFactorInterface $reductionFactor)
    {
        $this->reductionFactors[] = $reductionFactor;
    }

    /**
     * @param BasicCalculationInterface $basicCalculation
     */
    public function addBasicCalculation(BasicCalculationInterface $basicCalculation)
    {
        $this->basicCalculations[] = $basicCalculation;
    }

    /**
     * @param string $taxName
     *
     * @return float
     */
    public function calculate(string $taxName): float
    {
        $tax = $this->getTax($taxName);

        foreach ($this->reductionFactors as $reductionFactor) {
            $tax->addReductionFactor($reductionFactor);
        }

        foreach ($this->basicCalculations as $basicCalculation) {
            $tax->addBasicCalculation($basicCalculation);
        }

        return $tax->calculate();
    }

    /**
     * @param string $taxName
     *
     * @return TaxInterface
     */
    public function getCalculatorFor(string $taxName)
    {
        return $this->getTax($taxName);
    }

    /**
     * @param string $taxName
     *
     * @return bool
     */
    public function has(string $taxName)
    {
        try {
            $this->getTax($taxName);

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    /**
     * @param string $taxName
     *
     * @return TaxInterface
     */
    private function getTax(string $taxName)
    {
        if (!in_array($taxName, $this->taxes)) {
            throw new \InvalidArgumentException(sprintf('Tax with name "%s" not found.', $taxName));
        }

        return $this->taxes[$taxName];
    }
}
