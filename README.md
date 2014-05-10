Symfony2 Quill Bundle
=====================

Symfony 2 bundle integrating Quill editor as a form type.

[http://quilljs.com/](http://quilljs.com/)

## Installation

### Step 1: Add to composer.json

```json
"require":  {
    "astina/quill-bundle":"dev-master",
}
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Astina\Bundle\QuillBundle\AstinaQuillBundle(),
    );
}
```

### Step 3: Configure the bundle

Change the default config values if needed:

```yml
# app/config/config.yml
astina_quill:
    quill_url:            bundles/astinaquill/js/quill.min.js
    toolbar_template:     'AstinaQuillBundle:Editor:toolbar.html.twig'
    theme:                snow
```

**Note**: Make sure that the proper theme css file is loaded in the page where you want to use the editor.

```twig
<head>
    <link rel="stylesheet" href="{{ asset('bundles/astinaquill/css/themes/quill.snow.css') }}" />
</head>
```

## Usage

The bundle adds a form type named "quill" to be used in your form class:

```php
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder->add('content', 'quill');
}
```

All bundle config options can also be used for individual fields:

```php
$builder->add('content', 'quill', array(
    'toolbar_template': 'AcmeFooBundle::toolbar_template.html.twig',
);
```