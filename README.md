# Php Utilities
This repository provides various utility methods for PHP.

> The bundle will be extended where applicable (when needed).

# Installation

```
composer require passioneight/php-utilities
```

# Usage
Most of the provided utilities are pretty straight forward and should become clear once you had a look
at the code directly. However, for the sake of a proper documentation, the various components are briefly explained.

#### Constants
When using constants it is often necessary to loop over all available constants of a class. To provide
a standardized way of doing this, the `Constant` class is available.

> You can simply extend the `Constant` class.

This class provides a `getAll` method (amongst others), which will return an array of all available constants in your class.

Additionally, [various constants](https://github.com/passioneight/php-utilities/tree/master/src/Constant) are available for your convenience.

#### Utility Classes
The `MethodUtility` lets you create method names based on the types available in the `MethodType` class.

The `NamespaceUtility` provides some convenience methods when working with namespaces, such as `getClassNameFromNamespace`.

The `StringUtil` only provides the `toCamelCase` method, for now.
 
> If you are missing functionality and/or want to help out, create a new pull request - as the bundle will be updated only
> when needed.