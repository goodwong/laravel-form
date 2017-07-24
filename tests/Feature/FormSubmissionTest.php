<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormSubmissionTest extends TestCase
{
    use DatabaseTransactions;

    var $form = null;

    /**
     * setup
     */
    protected function setUp()
    {
        parent::setUp();

        $this->form = \Goodwong\LaravelForm\Entities\Form::create(['name' => 'Test for submission']);
        $this->api = '/forms/' . $this->form->id . '/submissions';
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        // $user = factory(User::class)->create();
        $response = $this//->actingAs($user)
            ->json('POST', $this->api, ['data' => ['name' => 'William']]);

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
        \Goodwong\LaravelForm\Entities\FormSubmission::create(['form_id' => $this->form->id, 'data' => ['name' => 'test']]);
        $response = $this->json('GET', $this->api);
        $response->assertStatus(200);
        $forms = $response->decodeResponseJson();
        $this->assertGreaterThanOrEqual(1, count($forms));
    }
}
