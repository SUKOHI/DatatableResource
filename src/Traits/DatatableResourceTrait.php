<?php

namespace Sukohi\DatatableResource\Traits;

trait DatatableResourceTrait {

    public function hasDatatableSearch() {

        return (request()->filled('search.value'));

    }

    public function getDatatableSearchKeywords() {

        $search_value = trim(
            mb_convert_kana(request('search.value'), 's')
        );
        return explode(' ', $search_value);

    }

    public function hasDatatableSort() {

        return (request()->filled('order.0.column'));

    }

    public function getDatatableSort() {

        $order_by = new \stdClass();
        $request = request();
        $order_column_index = $request->input('order.0.column');
        $order_by->column = $request->input('columns.'. $order_column_index .'.data');
        $order_by->direction = $request->input('order.0.dir');
        return $order_by;

    }

}
