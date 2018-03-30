<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        // $user = factory(User::class)->create();
        $response = $this//->actingAs($user)
            ->json('POST', '/forms', ['name' => 'Survey']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created_at' => true,
                'id' => true,
            ]);
    }

    /**
     * test get
     */
    public function testGet()
    {
        \Goodwong\Form\Entities\Form::create(['name' => uniqid()]);
        $response = $this->json('GET', '/forms');
        $response->assertStatus(200);
        $forms = $response->decodeResponseJson();
        $this->assertGreaterThanOrEqual(1, count($forms));
    }

    /**
     * test get
     */
    public function testUpdate()
    {
        $name = 'FormUpdateTest';
        $form = \Goodwong\Form\Entities\Form::create(['name' => uniqid()]);
        $response = $this->json('PUT', '/forms/' . $form->id, ['name' => $name]);
        $response->assertStatus(200)
            ->assertJson([
                'name' => true,
            ]);
        $this->assertEquals($name, $response->decodeResponseJson()['name']);
        // $this->assertDatabaseHas('forms', [
        //     'id' => $form->id,
        //     'name' => $name,
        // ]);
    }
}
