# Usage
After installing this bundle, you can use any utility without further ado. The various [utilities](#utility-classes)
are listed and explained below. But first, let's start with the provided [constants](#constants) (aka. enums).

### Constants
Most projects contain some kind of constants. They increase readability and allow for low maintenance
when it comes to changing the value. While it is a good idea to implement constants, sometimes it is necessary to
provide utility methods, such as `getAll` in order to retrieve all constants at once, without needing to know the
available constants at all.

For this reason, the [`Constant`](src/Constant/Constant.php) class was introduced. This class provides some convenience
methods (such as the aforementioned `getAll` method).

To leverage these methods, create your own class and extend from the `Constant` class, like so:

```php
<?php

namespace App\Constant;  // Change as needed

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\Constant;

class TenantType extends Constant
{
    const B2C = "b2c";
    const B2E = "b2e";
}
```

Now you can call `TenantType::getAll()` to get all available constants, e.g., to check if the current tenant has any of
the specified types:

```php
if(!in_array($tenant->getType(), TenantType::getAll())) {
    throw new InvalidTenantTypeException($tenant);
}
```

> Note that it is considered best practice to **avoid plural** in constant class names, for the mere reason of increased
> readability. That is, `TenantType::B2C` makes more sense than `TenantTypes::B2C`.

> Also check out the [`Php`](src/Constant/Php.php) and [`MethodType`](src/Constant/MethodType.php) class.
> They are mostly used internally, but may come in handy in your project.

### Utility Classes
In addition to the provided `Constant` class, the bundle also provides utility classes.

#### MethodUtility
Whenever it is necessary to dynamically create methods, most developers probably go for `$methodName = "get" . ucfirst($fieldName);`
or something similar, depending on your use case.

With the `MethodUtility` class, you can use one of these lines instead:
```php
$methodName = MethodUtility::createGetter($fieldName);
$methodName = MethodUtility::createSetter($fieldName);
$methodName = MethodUtility::createIsser($fieldName);
$methodName = MethodUtility::createHasser($fieldName);
```

> If you need a method that is not supported, you can use `$methodName = MethodUtility::create($fieldName, $methodType);`.
> Additionally, you can check a given method for their type - e.g., `MethodUtility::isGetter($methodName);` or 
> `MethodUtility::is($methodName, $methodType);`.

> Note that `$fieldName` will only be passed to `ucfirst`. So, sanitizing the value of `$fieldName` will be up to you (e.g., `trim`ming the value). 

#### NamespaceUtility
Working with namespace can get quite cumbersome and prone to error. With the `NamespaceUtility`, you can create namespaces,
split them into their corresponding parts and much more. For example:

```php
$className = NamespaceUtility::getClassNameFromNamespace(App\Constant\TenantType::class); // Returns "TenantType"
```

#### PathUtility
The `PathUtility` comes in handy, when working with files or paths. For example, when creating paths:

```php
$path = PathUtility::join(__DIR__, "Resources", "Importer"); // This is just an example of how a path could be created
$didCreatePath = PathUtility::ensurePath($path); // You can also pass the permissions
```

> Checkout the unit tests for more examples.

#### UrlUtility
Occasionally, one needs to work with URLs - for example when adding a third party API to your project:

```php
$apiBaseUrl = $this->getApiBaseUrl();
$version = $this->getApiVersion();

$url = UrlUtility::join($apiBaseUrl, $version, "endpoint"); // Send your request to $url
```

> Checkout the unit tests for more examples.

### [Next Chapter: Testing](/documentation/30_testing.md)