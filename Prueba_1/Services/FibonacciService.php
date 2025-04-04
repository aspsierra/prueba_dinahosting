<?php

declare(strict_types=1);

namespace Services;

use Filters\FibonacciFilter;
use Generators\FibonacciGenerator;


class FibonacciService {
    private FibonacciGenerator $generator;
    private FibonacciFilter $filter;
    private array $filtered = [];
    
    public function __construct($filter) {
        $this->generator = new FibonacciGenerator();
        $this->filter = $filter;
    }
    
    /**
     * Filters the fibonachi sequence using the specified filter
     *
     * @return void
     */
    public function getFilteredFibonacci(): void {
        $sequence = $this->generator->generateUpTo($this->filter->getEnd());
        $this->filtered = $this->filter->filter($sequence);
    }

    public function __toString(){
        $msg = "The date range between " . date('Y-m-d H:i:s', $this->filter->getStart()) . " and " . date('Y-m-d H:i:s', $this->filter->getEnd());
        
        if(count($this->filtered) == 0) {
            $msg = $msg . " doesn't contain any timestamp that matches with the Fibonacci Sequence.\n";
        } else {
            $msg = $msg . " contains " . count($this->filtered) . " timestamp that matches the Fibonacci Sequence:\n";
            foreach ($this->filtered as $timestamp) {
                $msg = $msg . "\t" . $timestamp . " ===> " . date('Y-m-d H:i:s', $timestamp) . "\n";
            }
        }
        return $msg;
    }
}
