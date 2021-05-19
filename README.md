# Plates Extension: Easily insert sections into Plates templates.
<p>This package is an extension for the template engine <a href="https://github.com/thephpleague/plates">Plates</a>.</p>
<p>Define sections content in diferent templates and just insert them into any template. Now it's easy to do it from the controller.</p>

## Usage
<p>Define different sections in your template:</p>

<code>template.php file</code> in templates folder

```php
<html>
<body>
<div id='div_header'><?= $this->section('up_section') ?></div><hr />
<?= $this->section('content') ?>
<hr /><div id='div_footer'><?= $this->section('down_section') ?></div>
</body>
</html>
```

<p>As allways, you can define another template and use the first one as a layout, so it will be inserted in the <b><code>content</code></b> section:

<code>othertemplate.php file</code> in templates folder 

```php
<?php $this->layout('template.php'); ?>
This is the main body of other template
```

 Define sections contents in different template files so you can use them later in any template:</p>

<code>welcome.php file</code> in templates folder

```php
Hello <?= $name ?>
```

<code>bybye.php file</code> in templates folder

```php
Goodbye
```

Now we put it together. From the controller we can set the content of a section. Remember you can not render before having set the sections content, so the way to do it is:
* <code>make</code> the template
* <code>setSectionContent</code> of all the sections you want
* <code>render</code> finally render the template

<code>index.php file</code>

```php
<?php
include "vendor/autoload.php";
use League\Plates\Engine;
use Kros\PlatesExtension\SectionsInsertion;
  
$engine = new Engine('route/to/templates');
$engine->loadExtension(new SectionsInsertion());

$t = $engine->make('othertemplate'); /* make the template
$t->setSectionContent('up_section', 'welcome', ['name'=>'John Doe']); // set content for 'header_section' section (with params)
$t->setSectionContent('down_section', 'bybye'); // set content for 'footer_section' (without params)
echo $t->render(); // finally render the template
  
```

## Installation

```
composer require kros/plates-sections-insertion
```

## Requirements

<p>Stand alone extension</p>
See <code>composer.json</code> file.

## License

<p>GNU General Public License v3.0 (see the LICENSE file for details)</p>
