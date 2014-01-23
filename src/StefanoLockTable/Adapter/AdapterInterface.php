<?php
namespace StefanoLockTable\Adapter;

interface AdapterInterface
{
    /**
     * Exclusive Lock table sql string
     * @param string|array $tables table name or array of tables
     * @return string|null
     */
    public function getLockSqlString($tables);

    /**
     * Unlock table sql string
     * @return string|null
     */
    public function getUnlockSqlString();
}