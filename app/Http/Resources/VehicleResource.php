<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

final class VehicleResource extends JsonResource
{
    public static $wrap = 'vehicle';

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'modal_name' => $this->model,
            'rating' => $this->rating,
            'company' => $this->company
        ];
    }

    public function with($request): array
    {
        return ['status' => 'success'];
    }
}
