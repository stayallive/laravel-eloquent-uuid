<?php

namespace Tests;

use Illuminate\Support\Str;
use Tests\StubClasses\ModelWithUuid;
use Tests\StubClasses\ModelWithOtherUUID;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsesUUIDTest extends TestCase
{
    use RefreshDatabase;

    public function testKeyTypeIsSet(): void
    {
        $model = new ModelWithUuid;

        $this->assertSame('string', $model->getKeyType());
    }

    public function testIncrementingIsSet(): void
    {
        $model = new ModelWithUuid;

        $this->assertFalse($model->getIncrementing());
    }

    public function testIdIsFilledWithUUID(): void
    {
        /** @var ModelWithUuid $model */
        $model = tap(new ModelWithUuid([
            'name' => $name = Str::random(),
        ]))->save();

        $this->assertDatabaseHas(ModelWithUuid::class, compact('name'));

        $this->assertNotNull($model->id);
        $this->assertNull($model->other_id);
    }

    public function testIdIsNotOverridenWithUUID(): void
    {
        /** @var ModelWithUuid $model */
        $model = tap(new ModelWithUuid([
            'id'   => $id = Str::random(),
            'name' => $name = Str::random(),
        ]))->save();

        $this->assertDatabaseHas(ModelWithUuid::class, compact('id', 'name'));

        $this->assertSame($id, $model->id);
        $this->assertNull($model->other_id);
    }

    public function testDefinedAttributeIsFilledWithUUID(): void
    {
        /** @var ModelWithOtherUUID $model */
        $model = tap(new ModelWithOtherUUID([
            'name' => $name = Str::random(),
        ]))->save();

        $this->assertDatabaseHas(ModelWithOtherUUID::class, compact('name'));

        $this->assertNotNull($model->other_id);

        // This is `1` because Laravel casts the primary key to an int
        $this->assertSame(1, $model->id);
    }

    public function testKeyTypeIsNotSetWhenAnotherAttributeIsUUID(): void
    {
        $model = new ModelWithOtherUUID;

        $this->assertSame('int', $model->getKeyType());
    }

    public function testIncrementingIsNotSetWhenAnotherAttributeIsUUID(): void
    {
        $model = new ModelWithOtherUUID;

        $this->assertTrue($model->getIncrementing());
    }
}
