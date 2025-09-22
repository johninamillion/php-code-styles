<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfig;
use johninamillion\ScriptureHeader\ScriptureHeaderFixer;

$finder = Finder::create()
    ->in(getcwd())
    ->name('*.php')
    ->exclude([
        'cache',
        '*/cache',
        'node_modules',
        'tests',
        'tmp',
        '*/tmp',
        'vendor'
    ])
    ->ignoreDotFiles(true)
    ->ignoreUnreadableDirs()
    ->ignoreVCS(true);

$parallelConfig = new ParallelConfig(8, 16);
$rules = include __DIR__ . DIRECTORY_SEPARATOR . '.rules.php';

return new Config()
    ->registerCustomFixers([
        'MillionVisions/scripture_header' => new ScriptureHeaderFixer()
    ])
    ->setParallelConfig($parallelConfig)
    ->setCacheFile(__DIR__ . '/tmp/php-cs-fixer/cache/.php-cs-fixer.cache')
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules($rules);
