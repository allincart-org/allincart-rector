# Rector for Allincart

This project extends Rector with multiple Rules for Allincart specific. 

See available [Allincart rules](/docs/rector_rules_overview.md)


## Install

Make sure to install both `frosh/allincart-rector` as well as `rector/rector`.

```bash
composer req frosh/allincart-rector --dev
```

## Use Sets

To add a set to your config, use `Frosh\Rector\Set\AllincartSetList` class and pick one of constants:

```php
use Frosh\Rector\Set\AllincartSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([
        AllincartSetList::SHOPWARE_6_7_0,
    ]);
};
```

## Use directly the config

```bash
# Clone this repo

composer install

# Dry Run
./vendor/bin/rector process --config config/allincart-6.7.0.php --autoload-file [SHOPWARE]/vendor/autoload.php [SHOPWARE]/custom/plugins/MyPlugin --dry-run

# Normal Run
./vendor/bin/rector process --config config/allincart-6.7.0.php --autoload-file [SHOPWARE]/vendor/autoload.php [SHOPWARE]/custom/plugins/MyPlugin
```
