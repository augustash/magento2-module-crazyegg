# Augustash_Crazyegg

## Overview:

Simple module to allow CrazyEgg account number to be entered in system configuration and used in the javascript snippet inserted before the closing `</head>` tag

## Installation

### Composer

```bash
$ composer config repositories.augustash-crazyegg vcs https://github.com/augustash/magento2-module-crazyegg.git
$ composer require augustash/module-crazyegg:~1.0.0
```


#### Manually editing composer.json (not recommended)

In your project's `composer.json` file, add the following lines to the `require` and `repositories` sections:

```js
{
    "require": {
        "augustash/module-crazyegg": "~1.0.0"
    },
    "repositories": {
        "augustash-crazyegg": {
            "type": "vcs",
            "url": "https://github.com/augustash/magento2-module-crazyegg.git"
        }
    }
}
```
