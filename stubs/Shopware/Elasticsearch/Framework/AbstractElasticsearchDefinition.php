<?php declare(strict_types=1);

namespace Allincart\Elasticsearch\Framework;

use OpenSearchDSL\Query\Compound\BoolQuery;
use Allincart\Core\Framework\Context;
use Allincart\Core\Framework\DataAbstractionLayer\Search\Criteria;

abstract class AbstractElasticsearchDefinition
{
    abstract public function buildTermQuery(Context $context, Criteria $criteria): BoolQuery;
}
