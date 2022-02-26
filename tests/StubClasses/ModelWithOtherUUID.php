<?php

namespace Tests\StubClasses;

class ModelWithOtherUUID extends ModelWithUuid
{
    public function getUUIDAttributeName(): string
    {
        return 'other_id';
    }
}
