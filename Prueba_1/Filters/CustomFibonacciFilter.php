<?php

namespace Filters;

class CustomFibonacciFilter extends TimestampFilter {
    public function __construct(string $startDate, string $endDate) {
        $start = strtotime($startDate);
        $end = strtotime($endDate);
        parent::__construct($start, $end);
    }
}