<?php
namespace StefanoLockTable\Adapter;

use StefanoLockTable\Adapter\AdapterInterface;

class Postgresql
    implements AdapterInterface
{
    public function getLockSqlString($tables) {
        if(is_array($tables)) {
            $sqlPart = implode(', ', $tables);
        } else {
            $sqlPart = $tables;
        }

        return 'LOCK TABLE ' . (string) $sqlPart;
    }

    public function getUnlockSqlString() {
        return null;
    }
}