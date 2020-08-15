# Usage
After installing this bundle, you can use any utility without further ado. The various utilities
are listed and explained below.

### Constants
Most projects contain some kind of constants (aka. enums). They increase readability and allow for low maintenance
when it comes to changing the value. While it is a good idea to implement constants, sometimes it is necessary to
provide utility methods, such as `getAll` in order to retrieve all constants at once, without needing to know the
available constants at all.

For this reason, the [`Constant`](src/Constant/Constant.php)
class was introduced. This class provides some convenience methods (such as the aforementioned `getAll` method).

To leverage these utility methods, create your own class and extend from the `Constant` class, like so:

```php
<?php

namespace AppBundle\Constant;  // Change as needed

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\Constant;

class TenantType extends Constant
{
    const B2C = "b2c";
    const B2E = "b2e";
}
```

Now you can call `TenantType::getAll()` to get all available constants, e.g. to check if the current tenant has any of
the specified types, like so:

```php
if(!in_array($tenant->getType(), TenantType::getAll())) {
    throw new InvalidTenantTypeException($tenant);
}
```

> Note that it is considered best practice to **avoid plural** in constat class names, for the mere reason of increased
> readability. That is, `TenanType::B2C` makes more sense than `TenanTypes::B2C`.

#### Utility Classes
In addition to the provided `Constant` class, the bundle also provides utility classes.

###### MethodUtility
The `MethodUtility` class provides an easy-to-use interface for creating certain methods:
- getters
- setters
- is-ers
- has-ers

The class was introduced due to a lot of developers generically creating method names, such as
`$methodName = "get" . ucfirst($fieldName);`. Instead of doing this, you can now just call the needed method, like
so:

```php
$methodName = MethodUtility::createGetter($fieldName);
```
> This utility uses a _convenience constant class_, the `MethodType` class.

###### NamespaceUtility
The `NamespaceUtility` class provides some aid when working with namespaces. For example, one can easily
retrieve the name of a class from a given namespace:

```php
$namespace = NamespaceUtility::join("AppBundle", "Constant", "TenantType"); // This is just an example of how a namespace could be created
$className = NamespaceUtility::getClassNameFromNamespace($namespace); // Returns "TenantType"
```

> This utility uses a _convenience constant class_, the `Php` class.

###### StringUtility
More often than not, one needs to work with `string`s. Thus, the `StringUtility` class was introduced.
This class comes in handy, for example, when converting a string to camel-case:

```php
$value = "myvalue";
StringUtility::toCamelCase($value); // Returns "myValue"
```

> Note that currently only the `toCamelCase` method is available. If you are in need of another method, please,
> create a PR.