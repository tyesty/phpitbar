# phpitbar
Library for creating bitbar plugins with php

## Usage

### Installation

```json
{
  "require": {
    "tyesty/phpitbar": "^1.0"
  }
}
```

or if you prefer, via command line:
````sh
$ composer require tyesty/phpitbar
````

### Structure
Due to the fact that Bitbar is executing every **file** in the plugins directory, you will have to move all your composer stuff (and other files beside the main executable php file) to a subdirectory. This could look something like this:

```
.
├── yourplugin/
│   ├── src/
│   ├── composer.json
│   └── vendor/
└── test.5m.php
```



### Example

`````php


`````