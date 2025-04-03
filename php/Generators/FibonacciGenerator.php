<?php

declare(strict_types=1);

namespace Generators;

class FibonacciGenerator {    
    /**
     * Generates the Fibonacci Sequence up to the specified number
     *
     * @param  mixed $max
     * @return array
     */
    public function generateUpTo(int $max): array {
        $sequence = [0, 1];
        while (true) {
            $next = $sequence[count($sequence) - 1] + $sequence[count($sequence) - 2];
            if ($next > $max) {
                break;
            }
            $sequence[] = $next;
        }
        return $sequence;
    }
}
