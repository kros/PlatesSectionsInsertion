# Plates Extension: Easily insert sections into Plate templates.
<p>This package is an extension for the template engine <a href="https://github.com/thephpleague/plates">Plates</a>.</p>
<p>Define sections content in diferent templates and just insert them into any template.</p>

## Usage
<p>Define different sections in your template:</p>

```php
/* template.php */

<html>
<body>
<div id='div_header'><?= $this->section('header_section') ?></div><hr />
<?= $this->section('content') ?>
<hr /><div id='div_footer'><?= $this->section('footer_section') ?></div>
</body>
</html>
```

<p>As allways, you can define another template and use the first one as a layout, so it will be inserted in the <b><code>content</code></b> section:

```php
/* othertemplate.php */

<?php $this->layout('template.php'); ?>
This is the main body of other template
```

 Define sections contents in different template files so you can use them later in any template:</p>

```php
/* welcome.php */

Hello <?= $name ?>
```
```php
/* bybye.php */

Goodbye
```

Now we put it together. Remember you can not render before having set the sections content, so the way to do it is:
* <code>make</code> the template
* <code>setSectionContent</code> of all the sections you want
* <code>render</code> finally render the template

```php
/* index.php */
<?php
include "vendor/autoload.php";
use League\Plates\Engine;
use Kros\PlatesSectionsInsertions\SectionsInsertion;
  
$engine = new Engine('route/to/templates');
$engine->loadExtension(new SectionsInsertion());

$t = $engine->make('othertemplate'); /* make the template
$t->setSectionContent('header_section', 'welcome', ['name'=>'John Doe']); // set content for 'header_section' section (with params)
$t->setSectionContent('footer_section', 'bybye'); // set content for 'footer_section' (without params)
echo $t->render(); // finally render the template
  
```

## Installation

```
composer require Kros/PlatesSectionsInsertion
```
