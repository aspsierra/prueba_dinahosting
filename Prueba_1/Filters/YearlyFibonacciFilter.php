<?php

namespace Filters;

class YearlyFibonacciFilter extends TimestampFilter {
    public function __construct() {
        $start = strtotime(date('Y-01-01 00:00:00'));
        $end = strtotime(date('Y-12-31 23:59:59'));
        parent::__construct($start, $end);
    }
}
