<?php
namespace StefanoLockTable;

use StefanoLockTable\Adapter\AdapterInterface;
use StefanoLockTable\Exception\InvalidArgumentException;

class Factory
{
    /**
     * @param string $vendorName
     * @return AdapterInterface
     */
    public function createAdapter($vendorName) {
        $vendorName = (string) ucfirst(strtolower(trim($vendorName)));

        $adapterClass = '\\' . __NAMESPACE__ . '\\Adapter\\' . $vendorName;

        if(class_exists($adapterClass)) {
            return new $adapterClass();
        } else {
            throw new InvalidArgumentException('Cannot create adapter. "'
                . $vendorName . '" is not supported');
        }
    }
}
