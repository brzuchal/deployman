<?php

/** @var Deployman\Deployman $deployman */
$deployman->add('watch', function() use ($deployman) {
    $files = $deployman->finder()->name('composer.*');
    foreach ($files as $file) {
        var_dump($file);
    }
    $deployman->encode();
});

$deployman->register('encode', function(\IteratorAggregate $files) use ($deployman) {
    $deployman->writeln('<info>Ala ma kota</info>');
});