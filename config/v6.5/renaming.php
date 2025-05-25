<?php

declare(strict_types=1);

use Frosh\Rector\Rule\Class_\InterfaceReplacedWithAbstractClass;
use Frosh\Rector\Rule\Class_\InterfaceReplacedWithAbstractClassRector;
use Frosh\Rector\Rule\ClassConstructor\RemoveArgumentFromClassConstruct;
use Frosh\Rector\Rule\ClassConstructor\RemoveArgumentFromClassConstructRector;
use Frosh\Rector\Rule\v65\FakerPropertyToMethodCallRector;
use Frosh\Rector\Rule\v65\MigrateCaptchaAnnotationToRouteRector;
use Frosh\Rector\Rule\v65\MigrateLoginRequiredAnnotationToRouteRector;
use Frosh\Rector\Rule\v65\MigrateRouteScopeToRouteDefaults;
use Frosh\Rector\Rule\v65\ThumbnailGenerateSingleToMultiGenerateRector;
use Rector\Arguments\Rector\MethodCall\RemoveMethodCallParamRector;
use Rector\Arguments\ValueObject\RemoveMethodCallParam;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Transform\Rector\Assign\PropertyFetchToMethodCallRector;
use Rector\Transform\ValueObject\PropertyFetchToMethodCall;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename('Allincart\Core\Framework\Adapter\Twig\EntityTemplateLoader', 'clearInternalCache', 'reset'),
            new MethodCallRename('Allincart\Core\Content\ImportExport\Processing\Mapping\Mapping', 'getDefault', 'getDefaultValue'),
            new MethodCallRename('Allincart\Core\Content\ImportExport\Processing\Mapping\Mapping', 'getMappedDefault', 'getDefaultValue'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'Allincart\Core\Framework\Adapter\Asset\ThemeAssetPackage' => 'Allincart\Storefront\Theme\ThemeAssetPackage',
            'Maltyxx\ImagesGenerator\ImagesGeneratorProvider' => 'bheller\ImagesGenerator\ImagesGeneratorProvider',
            'Allincart\Core\Framework\Event\BusinessEventInterface' => 'Allincart\Core\Framework\Event\FlowEventAware',
            'Allincart\Core\Framework\Event\MailActionInterface' => 'Allincart\Core\Framework\Event\MailAware',
            'Allincart\Core\Framework\Log\LogAwareBusinessEventInterface' => 'Allincart\Core\Framework\Log\LogAware',
            'Allincart\Storefront\Event\ProductExportContentTypeEvent' => 'Allincart\Core\Content\ProductExport\Event\ProductExportContentTypeEvent',
            'Allincart\Storefront\Page\Product\Review\MatrixElement' => 'Allincart\Core\Content\Product\SalesChannel\Review\MatrixElement',
            'Allincart\Storefront\Page\Product\Review\RatingMatrix' => 'Allincart\Core\Content\Product\SalesChannel\Review\RatingMatrix',
            'Allincart\Storefront\Page\Address\Listing\AddressListingCriteriaEvent' => 'Allincart\Core\Checkout\Customer\Event\AddressListingCriteriaEvent',
            'Allincart\Administration\Service\AdminOrderCartService' => 'Allincart\Core\Checkout\Cart\ApiOrderCartService',
            'Allincart\Core\System\User\Service\UserProvisioner' => 'Allincart\Core\Maintenance\User\Service\UserProvisioner',
            'Allincart\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface' => 'Allincart\Core\Framework\DataAbstractionLayer\EntityRepository',
            'Allincart\Core\System\SalesChannel\Entity\SalesChannelRepositoryInterface' => 'Allincart\Core\System\SalesChannel\Entity\SalesChannelRepository',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RemoveMethodCallParamRector::class,
        [
            new RemoveMethodCallParam('Allincart\Core\Checkout\Cart\Tax\Struct\CalculatedTaxCollection', 'merge', 1),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RemoveArgumentFromClassConstructRector::class,
        [
            new RemoveArgumentFromClassConstruct('Allincart\Core\Checkout\Customer\Exception\DuplicateWishlistProductException', 0),
            new RemoveArgumentFromClassConstruct('Allincart\Core\Content\Newsletter\Exception\LanguageOfNewsletterDeleteException', 0),
            new RemoveArgumentFromClassConstruct('Allincart\Core\Content\Product\Events\ProductIndexerEvent', 1),
            new RemoveArgumentFromClassConstruct('Allincart\Core\Content\Product\Events\ProductIndexerEvent', 2),
        ],
    );

    $rectorConfig->rule(MigrateLoginRequiredAnnotationToRouteRector::class);
    $rectorConfig->rule(MigrateCaptchaAnnotationToRouteRector::class);
    $rectorConfig->rule(MigrateRouteScopeToRouteDefaults::class);
    $rectorConfig->rule(ThumbnailGenerateSingleToMultiGenerateRector::class);

    $rectorConfig->ruleWithConfiguration(
        PropertyFetchToMethodCallRector::class,
        [new PropertyFetchToMethodCall(
            'Allincart\Core\Content\Flow\Dispatching\FlowState',
            'sequenceId',
            'getSequenceId',
            null,
        )],
    );

    $rectorConfig->ruleWithConfiguration(
        InterfaceReplacedWithAbstractClassRector::class,
        [
            new InterfaceReplacedWithAbstractClass('Allincart\Core\Checkout\Cart\CartPersisterInterface', 'Allincart\Core\Checkout\Cart\AbstractCartPersister'),
            new InterfaceReplacedWithAbstractClass('Allincart\Core\Content\Sitemap\Provider\UrlProviderInterface', 'Allincart\Core\Content\Sitemap\Provider\AbstractUrlProvider'),
            new InterfaceReplacedWithAbstractClass('Allincart\Core\System\Snippet\Files\SnippetFileInterface', 'Allincart\Core\System\Snippet\Files\GenericSnippetFile'),
        ],
    );

    $rectorConfig->rule(FakerPropertyToMethodCallRector::class);
};
