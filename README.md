# PHP Design Patterns
[![License](https://img.shields.io/badge/license-MIT-22C55E)](LICENSE)
[![Docs](https://img.shields.io/badge/docs-live-3B82F6)](https://becoming-a-senior.github.io/design-pattern-php/)
[![CI](https://github.com/becoming-a-senior/design-pattern-php/actions/workflows/deploy.yml/badge.svg)](https://github.com/becoming-a-senior/design-pattern-php/actions)

> **Work in Progress**: This project is actively being expanded. More design patterns and SOLID principles will be 
> added over time.

A collection of practical PHP implementations of the most common design patterns and SOLID principles.

---

## What's Included (so far)

- **Behavioural**: Observer, Strategy, Template Method
- **Creational**: Abstract Factory, Factory Method, Simple Factory
- **Structural**: Composite
- **SOLID**: Single Responsibility Principle

---

## Requirements

**To run the full project (docs + tests):**
- [Docker](https://www.docker.com/) and Docker Compose

**To just run the PHP tests locally:**
- PHP 8.4+
- [Composer](https://getcomposer.org/)

---

## Getting Started

**With Docker**: runs tests, builds and serves the documentation:

```bash
git clone https://github.com/becoming-a-senior/php-design-patterns.git
cd php-design-patterns
make up
```

If you don't have Make installed:

```bash
docker compose up --build
```

Then open [http://localhost:8080](http://localhost:8080) in your browser to view the documentation.

**Without Docker**: just install dependencies and run the tools:

```bash
git clone git@github.com:Becoming-a-Senior/php-design-patterns.git
cd php-design-patterns
composer install
composer tools
```

---

## Code Quality

```bash
composer lint      # Code style (PHP_CodeSniffer)
composer test      # Unit tests (PHPUnit)
composer analyse   # Static analysis (PHPStan)
composer tools     # Run all three
```

## Built With

- [PHPUnit 13](https://phpunit.de/): unit testing
- [PHP_CodeSniffer 4](https://github.com/squizlabs/PHP_CodeSniffer): code style
- [PHPStan 2](https://phpstan.org/): static analysis
- [PHPStan PHPUnit extension](https://github.com/phpstan/phpstan-phpunit): PHPUnit-aware static analysis
- [MkDocs Material](https://squidfunk.github.io/mkdocs-material/): documentation
- [hyperfine](https://github.com/sharkdp/hyperfine): benchmarking

---

## License

MIT — see [LICENSE](LICENSE) for details.

Made by [BecomingASenior.com](https://becomingasenior.com)