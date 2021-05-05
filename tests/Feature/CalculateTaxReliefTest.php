<?php


namespace Kenyalang\TaxReliefCalculator\Tests\Feature;

use Illuminate\Support\Arr;
use Kenyalang\TaxReliefCalculator\TaxReliefCalculator;
use Kenyalang\TaxReliefCalculator\Tests\TestCase;

class CalculateTaxReliefTest extends TestCase
{
    public function test_can_calculate_tax_relief()
    {
        $numberOfParents = null;

        $claimType = Arr::random(['parent_medical', 'parent_relief']);

        $claimType === 'parent_relief' && $numberOfParents = Arr::random([1,2]);

        $taxRelief = TaxReliefCalculator::calculateTaxRelief($claimType, $numberOfParents);

        switch ($claimType) {
            case 'parent_medical':
                $this->assertTrue($taxRelief === 14000);
                break;
            case 'parent_relief' && $numberOfParents === 1:
                $this->assertTrue($taxRelief === 10500);
                break;
            case 'parent_relief' && $numberOfParents === 2:
                $this->assertTrue($taxRelief === 12000);
                break;
        }
    }
}