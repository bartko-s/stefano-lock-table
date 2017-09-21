<?php
namespace StefanoLockTableTest\Unit;

use StefanoLockTable\Adapter\Mysql as MysqlAdapter;
use StefanoLockTable\Adapter\Postgresql as PostgreSqlAdapter;
use StefanoLockTable\Exception\InvalidArgumentException;
use StefanoLockTable\Factory;
use StefanoLockTableTest\TestCase;

class FactoryTest
    extends TestCase
{
    public function dataProvider() {
        return array(
            //Mysql
            array('mysql', MysqlAdapter::class),
            array('Mysql', MysqlAdapter::class),
            array('mySQl', MysqlAdapter::class),
            //Postgresql
            array('postgresql', PostgreSqlAdapter::class),
            array('Postgresql', PostgreSqlAdapter::class),
            array('posTGrEsql', PostgreSqlAdapter::class),
            array('pgsql', PostgreSqlAdapter::class),
            array('PgSqL', PostgreSqlAdapter::class),
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $vendorName
     * @param string $expectedClass
     */
    public function test($vendorName, $expectedClass) {
        $factory = new Factory();
        $adapter = $factory->createAdapter($vendorName);

        $this->assertInstanceOf($expectedClass, $adapter);
    }

    public function testThrowExceptionIfVendorIsNotSupported() {
        $factory = new Factory();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Cannot create adapter. "unsupporteddatabase" is not supported');

        $factory->createAdapter('unsupportedDatabase');
    }
}
