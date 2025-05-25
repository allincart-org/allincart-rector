<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;
use Rector\Renaming\ValueObject\RenameStaticMethod;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename('Allincart\Elasticsearch\Framework\Indexing\IndexerOffset', 'setNextDefinition', 'selectNextDefinition'),
            new MethodCallRename('Allincart\Elasticsearch\Framework\Indexing\IndexerOffset', 'setNextLanguage', 'selectNextLanguage'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameStaticMethodRector::class,
        [
            new RenameStaticMethod('Allincart\Core\Framework\DataAbstractionLayer\FieldSerializer\JsonFieldSerializer', 'encodeJson', 'Allincart\Core\Framework\Util\Json', 'encode'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'Allincart\Core\Framework\DataAbstractionLayer\Event\BeforeDeleteEvent' => 'Allincart\Core\Framework\DataAbstractionLayer\Event\EntityDeleteEvent',
            'Allincart\Core\Framework\Api\Exception\ExceptionFailedException' => 'Allincart\Core\Framework\Api\Exception\ExpectationFailedException',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassConstFetchRector::class,
        [
            new RenameClassAndConstFetch('Allincart\Core\Checkout\Cart', 'CHECKOUT_ORDER_PLACED', 'Allincart\Core\Framework\Event\BusinessEvents', 'CHECKOUT_ORDER_PLACED'),
            new RenameClassAndConstFetch('Allincart\Elasticsearch\Product\ElasticsearchProductDefinition', 'KEYWORD_FIELD', 'Allincart\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'KEYWORD_FIELD'),
            new RenameClassAndConstFetch('Allincart\Elasticsearch\Product\ElasticsearchProductDefinition', 'BOOLEAN_FIELD', 'Allincart\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'BOOLEAN_FIELD'),
            new RenameClassAndConstFetch('Allincart\Elasticsearch\Product\ElasticsearchProductDefinition', 'FLOAT_FIELD', 'Allincart\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'FLOAT_FIELD'),
            new RenameClassAndConstFetch('Allincart\Elasticsearch\Product\ElasticsearchProductDefinition', 'INT_FIELD', 'Allincart\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'INT_FIELD'),
            new RenameClassAndConstFetch('Allincart\Elasticsearch\Product\ElasticsearchProductDefinition', 'SEARCH_FIELD', 'Allincart\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'SEARCH_FIELD'),
        ],
    );
};
