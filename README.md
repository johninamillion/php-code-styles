# PHP Code-Styles
PHP Code-Styles for [PHP-CS-Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer).

[![PHPStan](https://github.com/johninamillion/php-code-styles/actions/workflows/phpstan.yml/badge.svg)](https://github.com/johninamillion/php-code-styles/actions/workflows/phpstan.yml)

---

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

---

## Installation

You can install the package via Composer:

```bash
composer require --dev johninamillion/php-code-styles
```

Add the following scripts to your `composer.json` file:

```json
{
    "scripts": {
        "post-install-cmd": [
            "johninamillion\\CodeStyles\\Composer::install"
        ],
        "post-update-cmd": [
            "johninamillion\\CodeStyles\\Composer::update"
        ],
        "code:analyse": "./vendor/bin/phpstan analyse",
        "code:format": "./vendor/bin/php-cs-fixer fix"
    }
}
```

---

## Usage

Fix code styles with PHP-CS-Fixer:
```bash
composer code:format
```

Analyse your code with PHPStan:
```bash
composer code:analyse
```

---

## License
This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---

<div style="text-align: center">All Glory To God - The Father, The Son, and The Holy Spirit.</div><br>
