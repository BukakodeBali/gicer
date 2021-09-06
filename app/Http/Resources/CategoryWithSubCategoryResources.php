<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryWithSubCategoryResources extends JsonResource
{
    protected $dimensions = [100, 200, 500];
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $images = [];
        if ($this->image) {
            $images['original'] = asset("{$this->image->path}/{$this->image->name}");
            foreach ($this->dimensions as $dimension) {
                $images["w-{$dimension}"] = asset("{$this->image->path}/{$dimension}/{$this->image->name}");
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'images' => $images,
            'subcategories' => $this->whenLoaded('subcategory', function () {
                return CategoryWithSubCategoryResources::collection($this->subcategory);
            })
        ];
    }
}
