# Replace Task

[![Latest Stable Version](https://poser.pugx.org/soy-php/replace-task/v/stable)](https://packagist.org/packages/soy-php/replace-task) [![Total Downloads](https://poser.pugx.org/soy-php/replace-task/downloads)](https://packagist.org/packages/soy-php/replace-task) [![Latest Unstable Version](https://poser.pugx.org/soy-php/replace-task/v/unstable)](https://packagist.org/packages/soy-php/replace-task) [![License](https://poser.pugx.org/soy-php/replace-task/license)](https://packagist.org/packages/soy-php/replace-task)

## Introduction
This is a replace task for [Soy](https://github.com/soy-php/soy), you can use this task to replace strings in files based on a specific config.

## Usage
Include `soy-php/replace-task` in your project with composer:

```sh
$ composer require soy-php/replace-task
```

Then in your recipe you can use the task as follows:

```php
<?php

$recipe = new \Soy\Recipe();

$recipe->component('default', function (\Soy\Replace\ReplaceTask $replaceTask) {
    $replaceTask
        ->setReplacements([
            'task' => 'dog',
        ])
        ->setSource('README.md')
        ->setDestination('DONTREADME.md')
        ->run();
});

return $recipe;
```
