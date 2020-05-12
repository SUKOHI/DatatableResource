<?php

namespace Sukohi\DatatableResource\Resources;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;

class DatatableResource extends JsonResource
{
    private $default_data;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct(Builder $query, $default_data = [])
    {
        $request = request();
        $start = intval($request->start);
        $per_page = intval($request->length);
        $current_page = ($per_page === 0) ? 1 : $start / $per_page + 1;
        $resource = $query->paginate($per_page, ['*'], '', $current_page);
        $this->default_data = $default_data;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $additional_data = [
            'recordsTotal' => $data['total'],
            'recordsFiltered' => $data['total']
        ];
        return array_merge($data, $additional_data, $this->default_data);
    }
}
