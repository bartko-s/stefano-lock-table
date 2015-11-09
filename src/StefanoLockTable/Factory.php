<?php
namespace StefanoLockTable;

use StefanoLockTable\Adapter;
use StefanoLockTable\Exception\InvalidArgumentException;

class Factory
{
    /**
     * @param string $vendorName
     * @return Adapter\AdapterInterface
     */
    public function createAdapter($vendorName) {
        $vendorName = (string) strtolower(trim($vendorName));

        if('mysql' == $vendorName) {
            $adapter = new Adapter\Mysql();
        } elseif(in_array($vendorName, array('postgresql', 'pgsql'))) {
            $adapter = new Adapter\Postgresql();
        } else {
            throw new InvalidArgumentException('Cannot create adapter. "'
                . $vendorName . '" is not supported');
        }

        return $adapter;
    }
}
