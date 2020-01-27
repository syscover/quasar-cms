# Quasar CMS App for Laravel

[![Total Downloads](https://poser.pugx.org/quasar/cms/downloads)](https://packagist.org/packages/quasar/cms)
[![Latest Stable Version](http://img.shields.io/github/release/syscover/quasar-cms.svg)](https://packagist.org/packages/quasar/cms)

Quasar is a application that generates a control panel where you can create custom solutions.

---

## Installation

**1 - After install Laravel framework, execute on console:**
```
composer require quasar/cms
```

**2 - Execute publish command**
```
php artisan vendor:publish --provider="Quasar\Cms\CmsServiceProvider"
```

**3 - Execute migrations and seed database**
```
composer dump-autoload
php artisan migrate
php artisan db:seed --class="CmsSeeder"
```

**4 - Add graphQL routes to graphql/schema.graphql file**
```
# Cms
#import ./../vendor/quasar/cms/src/Quasar/Cms/GraphQL/inputs.graphql
#import ./../vendor/quasar/cms/src/Quasar/Cms/GraphQL/types.graphql

type Query {
    # others imports

    # Cms
    #import ./../vendor/quasar/cms/src/Quasar/Cms/GraphQL/queries.graphql
}

type Mutation {
    # others imports

    # Cms
    #import ./../vendor/quasar/cms/src/Quasar/Cms/GraphQL/mutations.graphql
}
```

## Tips

[Documentation](https://github.com/syscover/quasar-cms/wiki/Publisher)