<?php

declare(strict_types=1);

use Frosh\Rector\Set\AllincartSetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->importNames();

    $rectorConfig->sets([
        AllincartSetList::SHOPWARE_6_5_0,
        AllincartSetList::SHOPWARE_6_6_0,
        AllincartSetList::SHOPWARE_6_6_4,
        AllincartSetList::SHOPWARE_6_6_10,
        AllincartSetList::SHOPWARE_6_7_0,
    ]);
};
