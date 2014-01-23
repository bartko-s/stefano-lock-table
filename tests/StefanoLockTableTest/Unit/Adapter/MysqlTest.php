<?php
namespace StefanoLockTableTest\Unit\Adapter;

use StefanoLockTable\Adapter\Mysql;
use StefanoLockTableTest\Unit\Adapter\AbstractTest;

class MysqlTest
    extends AbstractTest
{
    protected function getAdapter() {
        return new Mysql();
    }

    public function testUnlockTable() {
        $adapter = $this->getAdapter();
        $this->assertEquals('UNLOCK TABLES',
            $adapter->getUnlockSqlString());
    }

    public function testLockOneTable() {
        $adapter = $this->getAdapter();

        $this->assertEquals('LOCK TABLES tableName WRITE',
            $adapter->getLockSqlString('tableName'));
    }

    public function testLockTables() {
        $adapter = $this->getAdapter();
        $tables = array('tableName', 'anotherTable');

        $this->assertEquals('LOCK TABLES tableName WRITE, anotherTable WRITE',
            $adapter->getLockSqlString($tables));
    }
}