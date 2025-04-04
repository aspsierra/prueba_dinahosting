<?php

namespace Filters;

interface FibonacciFilter {
    public function filter(array $sequence): array;
}