<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ZipCodes;

class ZipCodesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function test_list_all_codes()
    {
        $this->withoutExceptionHandling();

        /** create one zip code item into db */
        $zipCodes = ZipCodes::factory()->create();

        $response = $this->get('api/zip-codes')
            ->assertStatus(200)
            ->assertJsonCount(1, $key = null)
            ->assertJsonStructure([
                '*' => [
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
                    'created_at',
                    'updated_at',
                ]
            ]);
    }
    /** @test */
    public function test_get_zipcode_find() {
        $this->withoutExceptionHandling();
        /** create one zip code item into db */
        $zipCodes = ZipCodes::factory(1)->create();
        /** get zip code of item save into db */
        $response = $this->get("api/zip-codes/{$zipCodes[0]->d_codigo}")
            ->assertStatus(200)
            ->assertJsonStructure([
                'zip_code',
                'locality',
                'federal_entity' => [
                    'key',
                    'name',
                    'code',
                ],
                'settlements' => [
                    '*' => [
                        'key',
                        'name',
                        'zone_type',
                        'settlement_type' => [
                            'name',
                        ],
                    ]
                ],
                'municipality' => [
                    'key',
                    'name',
                ]
            ]);
    }
}
