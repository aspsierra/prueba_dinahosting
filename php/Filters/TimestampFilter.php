<?php

declare(strict_types=1);

namespace Filters;

abstract class TimestampFilter implements FibonacciFilter {
    protected int $start;
    protected int $end;

    public function __construct(int $start, int $end) {
        $this->start = $start;
        $this->end = $end;
    }
    
    /**
     * Filters the array to select the nubers between the specified range
     *
     * @param  mixed $sequence
     * @return array
     */
    public function filter(array $sequence): array {
        return array_filter($sequence, fn($num) => $num >= $this->start && $num <= $this->end);
    }

    public function getStart() : int{
        return $this->start;
    }
    public function getEnd() : int{
        return $this->end;
    }
}

