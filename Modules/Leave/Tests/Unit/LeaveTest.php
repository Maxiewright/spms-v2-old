<?php

namespace Modules\Leave\Tests\Unit;

use Modules\Leave\Entities\Leave;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LeaveTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->artisan('module:seed Leave');

    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $leave = Leave::factory()->create();
        $this->assertDatabaseHas('leaves', ['id' => $leave->id]);
    }
}
