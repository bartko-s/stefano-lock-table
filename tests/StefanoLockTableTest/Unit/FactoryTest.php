<?php
namespace StefanoLockTableTest\Unit;

use StefanoLockTable\Factory;

class FactoryTest
    extends \PHPUnit_Framework_TestCase
{
    public function dataProvider() {
        return array(
            //Mysql
            array('mysql', '\StefanoLockTable\Adapter\Mysql'),
            array('Mysql', '\StefanoLockTable\Adapter\Mysql'),
            array('mySQl', '\StefanoLockTable\Adapter\Mysql'),
            //Postgesql
            array('postgresql', '\StefanoLockTable\Adapter\Postgresql'),
            array('Postgresql', '\StefanoLockTable\Adapter\Postgresql'),
            array('posTGrEsql', '\StefanoLockTable\Adapter\Postgresql'),
            array('pgsql', '\StefanoLockTable\Adapter\Postgresql'),
            array('PgSqL', '\StefanoLockTable\Adapter\Postgresql'),
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function test($vendorName, $expectedClass) {
        $factory = new Factory();
        $adapter = $factory->createAdapter($vendorName);

        $this->assertInstanceOf($expectedClass, $adapter);
    }

    public function testThrowExcecptionIfVendorIsNotSupported() {
        $factory = new Factory();

        $this->setExpectedException('\StefanoLockTable\Exception\InvalidArgumentException',
            'Cannot create adapter. "unsupporteddatabase" is not supported');

        $factory->createAdapter('unsupportedDatabase');
    }
}
