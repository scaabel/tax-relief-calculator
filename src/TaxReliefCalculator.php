<?php

namespace Kenyalang\TaxReliefCalculator;

use Illuminate\Support\Str;

class TaxReliefCalculator
{
    public int $individualRelief = 9000;

    public array $claimTypes = [
        'parent_medical',
        'parent_relief'
    ];

    /**
     * @param string $claimType
     * @param int|null $numberOfParents
     * @return int
     * @throws \Exception
     */
    public function calculateTaxRelief(string $claimType, ?int $numberOfParents)
    {
        if (!in_array($claimType, $this->claimTypes)) {
            throw new \Exception('Invalid number of parents');
        }

        $method = Str::studly($claimType);

        $action = "calculate{$method}";

        switch ($numberOfParents) {
            case 1:
            case 2:
                $currentTaxRelief = $this->{$action}($numberOfParents);
                break;
            default:
                $currentTaxRelief = $this->{$action}();
        }

        return $this->individualRelief + $currentTaxRelief;
    }

    /*
     * @return int
     */
    public function calculateParentMedical(): int
    {
        return 5000;
    }

    /*
     * @return int
     */
    public function calculateParentRelief(int $numberOfParents): int
    {
        if ($numberOfParents > 2 || $numberOfParents === 0) {
            throw new \Exception('Invalid number of parents');
        }

        return $numberOfParents === 1 ? 1500 : 3000;
    }
}
