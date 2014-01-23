<?php
namespace StefanoLockTable\Adapter;

use StefanoLockTable\Adapter\AdapterInterface;

class Mysql
    implements AdapterInterface
{
    public function getLockSqlString($tables) {
        if(is_array($tables)) {
            foreach ($tables as &$table) {
                $table = $table . ' WRITE';
            }
            $sqlPart = implode(', ', $tables);
        } else {
            $sqlPart = $tables . ' WRITE';
        }

        return 'LOCK TABLES ' . (string) $sqlPart;
    }

    public function getUnlockSqlString() {
        return 'UNLOCK TABLES';
    }
}