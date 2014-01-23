<?php
namespace StefanoLockTableTest\Unit\Adapter;

abstract class AbstractTest
    extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \StefanoLockTable\Adapter\AdapterInterface
     */
    abstract protected function getAdapter();

    public function testAdapterImplementsRequiredInterface() {
        $this->assertInstanceOf('\StefanoLockTable\Adapter\AdapterInterface',
            $this->getAdapter());
    }
}
