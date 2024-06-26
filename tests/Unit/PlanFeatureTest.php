<?php

namespace Ljsharp\LaraSub\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Ljsharp\LaraSub\Tests\TestCase;

class PlanFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Plan creation with already existing tag in database.
     */
    public function testUnableToCreatePlanFeatureWithExistingTag()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $this->expectExceptionMessage('UNIQUE constraint failed: plan_features.tag, plan_features.plan_id');
        $this->testPlanBasic->features()->create(['tag' => 'social_profiles', 'name' => 'Social profiles available', 'value' => 3, 'sort_order' => 1]);
    }
}
