# Wambo Composer Installer

[![Build Status](https://travis-ci.org/wambo-co/wambo-composer-installer.svg)](https://travis-ci.org/wambo-co/wambo-composer-installer)
[![Total Downloads](https://poser.pugx.org/wambo/wambo-composer-installer/d/total.svg)](https://packagist.org/packages/wambo/wambo-composer-installer)
[![Latest Stable Version](https://poser.pugx.org/wambo/wambo-composer-installer/v/stable.svg)](https://packagist.org/packages/wambo/wambo-composer-installer)
[![Latest Unstable Version](https://poser.pugx.org/wambo/wambo-composer-installer/v/unstable.svg)](https://packagist.org/packages/wambo/wambo-composer-installer)
[![License](https://poser.pugx.org/wambo/wambo-composer-installer/license.svg)](https://packagist.org/packages/wambo/wambo-composer-installer)

A composer plugin to install wambo modules to a wambo project.

## How to use

to install a module to a wambo project you can use a this installer. The installer checkes
the composer type and the autoload PSR-4 namespace.

```json
{
  "type": "wambo-module",
}
```

```json
{
 "autoload": {
    "psr-4": {
      "My\\Namespace\\": "src/My/Namespace/"
    }
  },
}
```