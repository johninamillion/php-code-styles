<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
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

$rules = include __DIR__ . DIRECTORY_SEPARATOR . '.rules.php';

return (new Config())
    ->registerCustomFixers([
        'MillionVisions/scripture_header' => new ScriptureHeaderFixer()
    ])
    ->setCacheFile(__DIR__ . '/tmp/php-cs-fixer/cache/.php-cs-fixer.cache')
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules($rules);
