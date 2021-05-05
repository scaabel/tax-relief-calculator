<?php

namespace Kenyalang\TaxReliefCalculator;

use Illuminate\Support\Str;

class TaxReliefCalculator
{
    public static int $individualRelief = 9000;

    public static array $claimTypes = [
        'parent_medical',
        'parent_relief'
    ];

    /**
     * @param string $claimType
     * @param int|null $numberOfParents
     * @return int
     * @throws \Exception
     */
    public static function calculateTaxRelief(string $claimType, ?int $numberOfParents)
    {
        if (!in_array($claimType, static::$claimTypes)) {
            throw new \Exception('Invalid claim type');
        }

        $method = Str::studly($claimType);

        $action = "calculate{$method}";

        switch ($numberOfParents) {
            case 1:
            case 2:
                $currentTaxRelief = static::{$action}($numberOfParents);
                break;
            default:
                $currentTaxRelief = static::{$action}();
        }

        return static::$individualRelief + $currentTaxRelief;
    }

    /*
     * @return int
     */
    public static function calculateParentMedical(): int
    {
        return 5000;
    }

    /*
     * @return int
     */
    public static function calculateParentRelief(int $numberOfParents): int
    {
        if ($numberOfParents > 2 || $numberOfParents === 0) {
            throw new \Exception('Invalid number of parents');
        }

        return $numberOfParents === 1 ? 1500 : 3000;
    }
}
