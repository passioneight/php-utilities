# Php Utilities
This repository provides various utility methods for PHP, such as:

- a generic `Constant` class,
- `Php`, `MethodType` constants,
- `NamespaceUtility` class,
- `StringUtility` class,
- `MethodUtility` class.

> The bundle will be extended where applicable (when needed).

# Installation

```
composer require passioneight/php-utilities
```

# Usage
Most of the provided utilities are pretty straight forward and should become clear once the code you had a look
at the code directly. However, for the sake of a proper documentation, the various components are briefly explained.

#### Constants
A generic `Constant` class is available to extend from, thus, providing your constants-classes with convenient methods,
such as `getAll`.

Additionally, [various constants](https://github.com/passioneight/php-utilities/tree/master/src/Constant) are available for your convenience.

#### Utility Classes
The `MethodUtility` lets you create method names based on the types available in the `MethodType` class.

The `NamespaceUtility` provides some convenience methods when working with namespaces, such as `getClassNameFromNamespace`.

The `StringUtil` only provides the `toCamelCase` method, for now.
 
> If you are missing functionality and/or want to help out, create a new pull request - as the bundle will be updated only
> when needed.