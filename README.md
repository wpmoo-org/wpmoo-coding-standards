# WPMoo Coding Standards

This repository contains the shared PHP_CodeSniffer (PHPCS) ruleset and custom sniffs used across WPMoo projects.

## Installation

Add the package to your project as a development dependency. The package ships as a `phpcodesniffer-standard`, so the `dealerdirect/phpcodesniffer-composer-installer` plugin will automatically register the standard with PHPCS.

```bash
composer require --dev wpmoo/wpmoo-coding-standards
```

## Usage

Reference the WPMoo standard from your project-level `phpcs.xml` or `phpcs.xml.dist` file:

```xml
<?xml version="1.0"?>
<ruleset name="Project Standard">
    <rule ref="WPMoo" />

    <file>public_html/wp-content/plugins/example-plugin</file>
</ruleset>
```

Run PHPCS as usual and it will apply the shared rules (WordPress Core + Docs + Extra, PHPCompatibilityWP) plus any custom sniffs provided by this package.

```bash
vendor/bin/phpcs
```

## Development

- The canonical ruleset lives in `WPMoo/ruleset.xml`.
- Custom sniffs are placed under `WPMoo/Sniffs` following the PHPCS naming convention.
- A local `phpcs.xml.dist` is provided so you can run the standard on this package itself via `composer install && vendor/bin/phpcs`.

Feel free to extend the rules or add additional sniffs to match the WPMoo guidelines.
