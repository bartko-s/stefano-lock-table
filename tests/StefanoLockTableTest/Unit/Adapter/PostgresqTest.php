<?php
namespace StefanoLockTableTest\Unit\Adapter;

use StefanoLockTable\Adapter\Postgresql;

class PostgresqlTest
    extends AbstractTest
{
    protected function getAdapter() {
        return new Postgresql();
    }

    public function testUnlockTable() {
        $adapter = $this->getAdapter();
        $this->assertNull($adapter->getUnlockSqlString());
    }

    public function testLockOneTable() {
        $adapter = $this->getAdapter();

        $this->assertEquals('LOCK TABLE tableName',
            $adapter->getLockSqlString('tableName'));
    }

    public function testLockTables() {
        $adapter = $this->getAdapter();
        $tables = array('tableName', 'anotherTable');

        $this->assertEquals('LOCK TABLE tableName, anotherTable',
            $adapter->getLockSqlString($tables));
    }
}