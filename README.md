# Nova Resource Cards

This [Laravel Nova](https://nova.laravel.com/) package adds the functionality to add Resource Cards at the top of pages.

I consider this package feature complete, however I am open to feature requests and pull requests, if there's something you'd like to see feel free to submit an issue. 

## Requirements

- `php: >=7.4`
- `laravel/nova: ^4.0`

## Features

This package wraps the following Laravel Nova pages and adds the ability to display Resource Cards above them:

- Index
- Detail
- Create
- Update
- Attach
- Update Attached
- Replicate

As the package is wrapping the pages, it should be fairly robust with regards to Nova Updates.

This package also includes more fine grained control over the pages the cards are displayed on, following the same logic as is used for Fields:

- showOnIndex
- showOnDetail
- showOnCreating
- showOnUpdating
- showOnPreview
- showOnAttach
- showOnReplicate
- hideFromIndex
- hideFromDetail
- hideWhenCreating
- hideWhenUpdating
- hideWhenAttaching
- hideWhenReplicating
- onlyOnIndex
- onlyOnDetail
- onlyOnForms (Now includes Attach and Replicate)
- exceptOnForms (Now includes Attach and Replicate)

Cards should extend the included `ResourceCard` class rather than the standard class, but otherwise can be used like regular cards.

## Installation

Install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require formfeed-uk/nova-resource-cards
```

## Usage

### General

First create your Resource Card

```php

// MyResourceCard.php
use Formfeed\ResourceCards\ResourceCard;

class MyResourceCard extends ResourceCard {

    ...

}

```

Then simply include it like a normal card within your resource

```php
// MyNovaResource.php

use App\MyResourceCard;

...

class MyNovaResource extends Resource {

...

    public function cards(NovaRequest  $request) {
        return [
            MyResourceCard::make($request)
        ];
    }

...

}
```

Optionally chain visibility and authorisations: 

```php

    public function cards(NovaRequest  $request) {
        return [
            MyResourceCard::make($request)
                ->onlyOnForms()
                ->canSee(function ($request) {
                    return $request->user()->role === "admin";
                }),
        ];
    }
```

It's that simple!

## Available parameters

There are a number of parameters available to your card, depending on the page the card is currently on. These parameters are available on the request object as query parameters.

Note: Just because these parameters are available doesn't mean they will be populated for any given request. 

### Index:
- resourceName
- display: "index"

### Detail:
- resourceName
- resourceId
- display: "detail"

### Create:
- resourceName
- viaResource
- viaResourceId
- viaRelationship
- display: "create"

### Update:
- resourceName
- resourceId
- viaResource
- viaResourceId
- viaRelationship
- display: "update"

### Replicate:
- resourceName
- resourceId
- viaResource
- viaResourceId
- viaRelationship
- display: "replicate"

### Attach:
- resourceName
- resourceId
- viaResource
- viaResourceId
- viaRelationship
- parentResource
- polymorphic
- formUniqueId
- relatedResourceName
- display: "attach"

### Update Attached:
- resourceName
- resourceId
- viaResource
- viaResourceId
- viaRelationship
- parentResource
- polymorphic
- formUniqueId:
- relatedResourceName
- relatedResourceId
- viaPivotId
- display: "updateAttached"

## License

Nova Resource Cards is open-sourced software licensed under the [MIT license](LICENSE.md).
