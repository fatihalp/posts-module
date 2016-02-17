<?php namespace Anomaly\PostsModule\Post\Table\Filter;

use Anomaly\Streams\Platform\Ui\Table\Component\Filter\Contract\FilterInterface;
use Anomaly\Streams\Platform\Ui\Table\Component\Filter\Query\GenericFilterQuery;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class StatusFilterQuery
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Table\Filter
 */
class StatusFilterQuery extends GenericFilterQuery
{

    /**
     * Handle the filter query.
     *
     * @param Builder         $query
     * @param FilterInterface $filter
     */
    public function handle(Builder $query, FilterInterface $filter)
    {
        if ($filter->getValue() == 'active') {
            $query->where('enabled', true)->where('activated', true);
        }

        if ($filter->getValue() == 'inactive') {
            $query->where('enabled', true)->where('activated', false);
        }

        if ($filter->getValue() == 'disabled') {
            $query->where('enabled', false);
        }
    }
}
