<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ZipCodesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //  return parent::toArray($request);
        return [
            'id' => $this->id,
            'd_codigo' => $this->d_codigo,
            'd_asenta' => $this->d_asenta,
            'd_tipo_asenta' => $this->d_tipo_asenta,
            'd_mnpio' => $this->d_mnpio,
            'd_estado' => $this->d_estado,
            'd_ciudad' => $this->d_ciudad,
            'd_cp' => $this->d_cp,
            'c_estado' => $this->c_estado,
            'c_oficina' => $this->c_oficina,
            'c_cp' => $this->c_cp,
            'c_tipo_asenta' => $this->c_tipo_asenta,
            'c_mnpio' => $this->c_mnpio,
            'id_asenta_cpcons' => $this->id_asenta_cpcons,
            'd_zona' => $this->d_zona,
            'c_cve_ciudad' => $this->c_cve_ciudad,
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'columns' => [
                    'id',
                    'd_codigo',
                    'd_asenta',
                    'd_tipo_asenta',
                    'd_mnpio',
                    'd_estado',
                    'd_ciudad',
                    'd_cp',
                    'c_estado',
                    'c_oficina',
                    'c_cp',
                    'c_tipo_asenta',
                    'c_mnpio',
                    'id_asenta_cpcons',
                    'd_zona',
                    'c_cve_ciudad',
                ],
            ]
        ];
    } 
}
