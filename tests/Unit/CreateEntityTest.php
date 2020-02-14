<?php

namespace Tests\Unit;

use App\Entity;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateEntityTest extends TestCase
{
    use RefreshDatabase;

    public $entity;

    public function setUp(): void
    {
        parent::setUp();
        $this->entity = factory(Entity::class)->make()->toArray();
    }

    /**
     * Test entities can be created
     *
     * @return void
     */
    public function testEntitiesCanBeCreated()
    {
        $response = $this->json('POST', '/api/entities', $this->entity);
        $response
            ->assertStatus(201)
            ->assertJson([
                'status' => 'success',
            ]);
    }

    /**
     * Test incrementing barcode
     *
     * @return void
     */
    public function testIncrementingBarcode()
    {
        $entity = [
            'name' => 'Caddy',
            'description' => 'Laravel & VueJS developer'
        ];
        $response = $this->json('POST', '/api/entities', $entity);
        $response
            ->assertStatus(201)
            ->assertJson([
                'status' => 'success',
            ]);
    }
}
