<?php

namespace Filters;
 
class MonthlyFibonacciFilter extends TimestampFilter {
    public function __construct() {
        $start = strtotime(date('Y-m-01 00:00:00'));
        $end = strtotime(date('Y-m-t 23:59:59'));
        parent::__construct($start, $end);
    }
}
