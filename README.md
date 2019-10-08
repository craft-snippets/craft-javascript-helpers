# Javascript helpers plugin for Craft CMS 3.x

This plugin allows you to output all static translation messages into Javascript object and to easily transfer any Twig variables into Javascript.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require /javascript-helpers

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Javascript helpers.

## Javascript helpers Overview

Javascript helpers plugin provides two Twig variables and one filter.

### Twig variables

* `craft.jsHelpers.getMessages('locale_code')` - returns all static message translations as Twig array. By default it returns them for current sites locale, but you can pass specific locale code as optional paramater to overwrite it.

* `craft.jsHelpers.outputMessages('array_name', 'locale_code')` - outputs static message translations into Template as Javascript array. First parameter specifies Javascript array name. By default static message translations are returned for current sites locale, but you can pass specific locale code as optional second paramater to overwrite it.

### Twig filters

* `jsVar('variable_name')` - outputs Twig variable as Javascript variable. For example:

```
{{someTwigVariable|jsVar('some_js_variable')}}
```

Will output Javascript variable named `some_js_variable` into template, containing contents of `someTwigVariable`. Works both for variables with single value and for arrays or objests.

Brought to you by [Piotr Pogorzelski](http://craftsnippets.com)
