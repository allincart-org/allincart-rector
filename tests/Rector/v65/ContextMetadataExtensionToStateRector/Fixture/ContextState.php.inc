<?php
namespace Frosh\Rector\Tests\Rector\v65\ContextMetadataExtensionToStateRector\Fixture;

$context = new \Allincart\Core\Framework\Context();
$context->addExtension(\Allincart\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry::USE_INDEXING_QUEUE, new \Allincart\Core\Framework\Struct\ArrayEntity());
?>
-----
<?php
namespace Frosh\Rector\Tests\Rector\v65\ContextMetadataExtensionToStateRector\Fixture;

use Allincart\Core\Framework\Context;
use Allincart\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;

$context = new Context();
$context->addState(EntityIndexerRegistry::USE_INDEXING_QUEUE);
?>
