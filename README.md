# dreadlabs/media-type-encoding

## Description

This library provides a simple API for [Media type](#def_media_type) designation.

It can be used to generate Media type strings from string literals such as 
PHP class names. This is useful for APIs or serialization processes which should
denote a platform agnostic type literal.

This library leans on the [RFC 6838](#rfc_6838) specification.

## Installation

    composer install dreadlabs/mediatype-encoding:~1.0

## Usage

Example 1

> From a fully-qualified, namespaced PHP class name, designate a Media type within 
the **application/** top-level type. The subtype is located in the **Personal**
tree. The *UpperCamelCased* naming convention of PHP classes should be designated
to a hyphened form. The designated Media type comes with a *version* parameter and
a *+json* suffix.

    $mediaType = new Application(RegistrationTree::personal(new HyphenedFromUpperCamelCased(new Exploded('\\'))));
    $withParameter = $mediaType->withParameter(new Parameter('version', '1.0'));
    $withSuffix = $withParameter->withSuffix(new Json());
    
    echo (string)$withSuffix->designated('Acme\\Example\\Class');
    
    > 'application/prs.acme.example.class+json; version=1.0'

Example 2

> This example enhances Example 1. Let's imagine you are structuring your PHP
project in such a way, that the `Domain` namespace contains your business logic.
The PHP library you are building is named after a *Bounded context* called `SalesApi`.
There, you have a *Domain Event* called `UserCreated`. The Media type encoding
should not carry too much information about the *vendor* namespace and the
*physical* structures of the filesystem.

    $imaginaryClassName = 'Acme\\SalesApi\\Domain\\Event\\UserCreated';
    $namespace = 'Acme\\SalesApi\\Domain\\Event';
    $mediaType = new Application(RegistrationTree::vendor(new HyphenedFromUpperCamelCased(new Exploded('\\'))));

    $designatedMediaType = $mediaType->designated(str_replace($namespace, 'SalesApi', $imaginaryClassName));

    self::assertEquals('application/vnd.sales-api.user-created', (string)$designatedMediaType);

The reason why I am showing you this is, because I thought about implementing a
subtype `Prefixed` which allows replacing parts of the *FQCN*. But this would add
unnecessary complexity where a simple `str_replace` is sufficent.

## Development

### Requirements

Please read the [contribution guide](CONTRIBUTING.md) and ensure you have a 
working Docker environment.

### Setup

Fork and clone this repository as described in the [contribution guide](CONTRIBUTING.md).

Open a terminal and run the setup script:

    script/setup

### Run tests

    script/console run composer test:unit
    script/console run composer test:integration
    script/console run composer test:acceptance:fail-fast

## Links

  * [IANA Application for Media Types](#iana_application)
  * [registered IANA Media Types](#registered_media_types)
  * [IANA Structured Syntax Suffix Registry](#suffix_registry)
  
## License

[MIT](LICENSE)

[def_media_type]: https://en.wikipedia.org/wiki/Media_type
[iana_application]: https://www.iana.org/form/media-types
[registered_media_types]: https://www.iana.org/assignments/media-types/media-types.xhtml
[suffix_registry]: https://www.iana.org/assignments/media-type-structured-suffix/media-type-structured-suffix.xhtml
