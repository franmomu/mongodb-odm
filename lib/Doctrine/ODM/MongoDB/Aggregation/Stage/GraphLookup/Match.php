<?php

declare(strict_types=1);

namespace Doctrine\ODM\MongoDB\Aggregation\Stage\GraphLookup;

use Doctrine\ODM\MongoDB\Aggregation\Builder;
use Doctrine\ODM\MongoDB\Aggregation\Stage\GraphLookup;
use function trigger_deprecation;

/**
 * @deprecated This class was deprecated in doctrine/mongodb-odm 2.2. Please use the MatchStage class instead
 */
class Match extends MatchStage
{
    public function __construct(Builder $builder, GraphLookup $graphLookup)
    {
        trigger_deprecation(
            'doctrine/mongodb-odm',
            '2.2',
            'The "%s" class is deprecated. Please use "%s" instead.',
            self::class,
            MatchStage::class
        );

        parent::__construct($builder, $graphLookup);
    }
}
