<?php
namespace StefanoLockTableTest\Unit\Adapter;

use StefanoLockTable\Adapter\AdapterInterface;
use StefanoLockTableTest\TestCase;

abstract class AbstractTest
    extends TestCase
{
    /**
     * @return \StefanoLockTable\Adapter\AdapterInterface
     */
    abstract protected function getAdapter();

    public function testAdapterImplementsRequiredInterface() {
        $this->assertInstanceOf(AdapterInterface::class, $this->getAdapter());
    }
}
