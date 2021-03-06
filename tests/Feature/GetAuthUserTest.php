<?php


        namespace Tests\Feature;

        use App\User;
        use Illuminate\Foundation\Testing\RefreshDatabase;
        use Illuminate\Foundation\Testing\WithFaker;
        use Tests\TestCase;

        class GetAuthUserTest extends TestCase
        {
            use RefreshDatabase;
            /**
             * A basic feature test example.
             *
             * @test
             */
            public function test_auth_user_can_be_fetched()
            {
                $this->withoutExceptionHandling;

                $this->actingAs($user = User::factory()->create(), 'api');

                $response = $this->get('/api/auth-user');
                $response->assertStatus(200)
                    ->assertJson([
                        'data' => [
                            'user_id' => $user->id,
                            'attributes' => [
                                'name' => $user->name,
                            ]
                        ],
                        'links' => [
                            'self' => url('/users/'.$user->id),
                        ]

                    ]);


            }
        }
        $response = $this->get('/api/auth-user');
        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'user_id' => $user->id,
                    'attributes' => [
                        'name' => $user->name,
                    ]
                ],
                'links' => [
                    'self' => url('/users/'.$user->id),
                ]

            ]);


