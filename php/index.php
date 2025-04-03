<?php

declare(strict_types=1);

date_default_timezone_set('UTC');


// Autoloader function
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
    if (file_exists($file)) {
        require $file;
    }
});

use Filters\MonthlyFibonacciFilter;
use Filters\YearlyFibonacciFilter;
use Filters\CustomFibonacciFilter;
use Services\FibonacciService;


function run(){
    echo password_hash('1234', PASSWORD_DEFAULT);
    global $argv;

    if (count($argv) === 2 && $argv[1] === 'month') {
        $dateRange = new MonthlyFibonacciFilter();
    } elseif (count($argv) === 2 && $argv[1] === 'year') {
        $dateRange = new YearlyFibonacciFilter();
    } elseif (count($argv) === 4 && $argv[1] === 'custom') {
        $dateRange = new CustomFibonacciFilter($argv[2], $argv[3]);
    } else {
        echo "Usage:\n";
        echo "  php index.php month   -> Fibonacci numbers in current month\n";
        echo "  php index.php year    -> Fibonacci in current year timestamp\n";
        echo "  php index.php custom 'YYYY-MM-DD HH:MM:SS' 'YYYY-MM-DD HH:MM:SS' -> Fibonacci numbers in selected date range\n";
        exit(1);
    }

    $fibonacciService = new FibonacciService($dateRange);
    $fibonacciService->getFilteredFibonacci();

    echo($fibonacciService);
}    

if (php_sapi_name() === 'cli') {
    run();
}