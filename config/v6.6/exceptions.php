<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Transform\Rector\New_\NewToStaticCallRector;
use Rector\Transform\ValueObject\NewToStaticCall;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        NewToStaticCallRector::class,
        [
            // RoutingException
            new NewToStaticCall('Allincart\Core\Framework\Routing\Exception\InvalidRequestParameterException', 'Allincart\Core\Framework\Routing\RoutingException', 'invalidRequestParameter'),
            new NewToStaticCall('Allincart\Core\Framework\Routing\Exception\MissingRequestParameterException', 'Allincart\Core\Framework\Routing\RoutingException', 'missingRequestParameter'),
            new NewToStaticCall('Allincart\Core\Framework\Routing\Exception\LanguageNotFoundException', 'Allincart\Core\Framework\Routing\RoutingException', 'languageNotFound'),

            // DataAbstractionLayerException
            new NewToStaticCall('Allincart\Core\Framework\DataAbstractionLayer\Exception\InvalidSerializerFieldException', 'Allincart\Core\Framework\DataAbstractionLayer\DataAbstractionLayerException', 'invalidSerializerField'),
            new NewToStaticCall('Allincart\Core\Framework\DataAbstractionLayer\Exception\VersionMergeAlreadyLockedException', 'Allincart\Core\Framework\DataAbstractionLayer\DataAbstractionLayerException', 'versionMergeAlreadyLocked'),

            // ElasticsearchException
            new NewToStaticCall('Allincart\Elasticsearch\Exception\UnsupportedElasticsearchDefinitionException', 'Allincart\Elasticsearch\ElasticsearchException', 'unsupportedElasticsearchDefinition'),
            new NewToStaticCall('Allincart\Elasticsearch\Exception\ElasticsearchIndexingException', 'Allincart\Elasticsearch\ElasticsearchException', 'indexingError'),
            new NewToStaticCall('Allincart\Elasticsearch\Exception\ServerNotAvailableException', 'Allincart\Elasticsearch\ElasticsearchException', 'serverNotAvailable'),

            // ProductExportException
            new NewToStaticCall('Allincart\Core\Content\ProductExport\Exception\EmptyExportException', 'Allincart\Core\Content\ProductExport\ProductExportException', 'productExportNotFound'),
            new NewToStaticCall('Allincart\Core\Content\ProductExport\Exception\RenderFooterException', 'Allincart\Core\Content\ProductExport\ProductExportException', 'renderFooterException'),
            new NewToStaticCall('Allincart\Core\Content\ProductExport\Exception\RenderHeaderException', 'Allincart\Core\Content\ProductExport\ProductExportException', 'renderHeaderException'),
            new NewToStaticCall('Allincart\Core\Content\ProductExport\Exception\RenderProductException', 'Allincart\Core\Content\ProductExport\ProductExportException', 'renderProductException'),
        ],
    );
};
