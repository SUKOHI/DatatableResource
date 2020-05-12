# DatatableResource
A Laravel package that provides resource data for Datatable which is jQuery plugin with pagination.  

This package is for [Datatable](https://datatables.net/) and maintained under Laravel 6.x.

# Installation

    composer require sukohi/datatable-resource:1.*

# Usage

## Basic usage

    // in Route

    Route::get('item_resource', function(){
    
        $query = \App\Item::query();
        
        // Of course you can add any methods here like `where()`, `orderBy()` and even `with()`.
        
        return new DatatableResource($query);
    
    });

Now you can get JSON data that Datatable needs.

## with additional values

    return new DatatableResource($query, [
        'key_1' => 'value_1',
        'key_2' => 'value_2',
        'key_3' => 'value_3',
    ]);

# Trait

This package contains `DatatableResourceTrait` that provides kind of useful methods.  

In order to use them, set `DatatableResourceTrait` into your Model as follows.

    use Sukohi\DatatableResource\Traits\DatatableResourceTrait;
    
    class class Item extends Model
    {
        use DatatableResourceTrait;

## hasDatatableSearch()

Check if current access has search parameters.

    if($this->hasDatatableSearch()) {

        // Do something...

    }

## getDatatableSearchKeywords()

You can get search keywords that `Datatable` submitted.

    $keywords = $this->getDatatableSearchKeywords();
    
    foreach($keywords as $keyword) {

        // Do someting...

    }

## hasDatatableSort()

Check if current access has sort parameters.

    if($this->hasDatatableSort()) {
    
        // Do something...
    
    }

## getDatatableSort()

You can get sort parameters that `Datatable` submitted.

    $order_by = $this->getDatatableSort();
    
    // Usage
    $column = $order_by->column;
    $direction = $order_by->direction;
    
# License

This package is licensed under the MIT License.

Copyright 2020 Sukohi Kuhoh
