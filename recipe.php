<?php

$recipe = new \Soy\Recipe();

$recipe->component('replace', function (\Soy\Replace\ReplaceTask $replaceTask) {
    $replaceTask
        ->setReplacements([
            'task' => 'dog',
        ])
        ->setSource('README.md')
        ->setDestination('DONTREADME.md')
        ->run();
});

$recipe->component('default', null, ['replace']);

return $recipe;
