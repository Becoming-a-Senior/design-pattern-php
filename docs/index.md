# PHP Design Patterns

**Practical, minimal PHP implementations of the most important design patterns and SOLID principles.**

Each example is self-contained, focused, and written to be read — not just run.

---

!!! note "Work in Progress"
This project is actively being expanded. More design patterns and SOLID principles will be added over time.

---

## What's Inside

=== "Behavioural"

    Patterns that define **how objects communicate and delegate responsibility**.

    | Pattern | Intent |
    |---------|--------|
    | [Observer](behavioural/observer.md) | Notify dependents automatically when state changes |
    | [Strategy](behavioural/strategy.md) | Swap algorithms at runtime without changing the caller |
    | [Template Method](behavioural/template-method.md) | Define a skeleton algorithm; let subclasses fill in the steps |

=== "Creational"

    Patterns that control **how objects are created**.

    | Pattern | Intent |
    |---------|--------|
    | [Abstract Factory](creational/abstract-factory.md) | Create families of related objects without specifying concrete classes |
    | [Factory Method](creational/factory-method.md) | Delegate instantiation to subclasses |
    | [Simple Factory](creational/simple-factory.md) | Centralise object creation behind a single method |

=== "Structural"

    Patterns that describe **how objects are composed**.

    | Pattern | Intent |
    |---------|--------|
    | [Composite](structural/composite.md) | Treat individual objects and compositions uniformly |

=== "SOLID"

    Principles that guide **writing maintainable, extensible code**.

    | Principle | Summary |
    |-----------|---------|
    | [Single Responsibility](solid/srp.md) | A class should have only one reason to change |