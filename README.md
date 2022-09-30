Stefano Lock Table
===================

[![Build Status](https://app.travis-ci.com/bartko-s/stefano-lock-table.svg?branch=master)](https://app.travis-ci.com/bartko-s/stefano-lock-table)
[![Coverage Status](https://coveralls.io/repos/bartko-s/stefano-lock-table/badge.png?branch=master)](https://coveralls.io/r/bartko-s/stefano-lock-table?branch=master)

Instalation using Composer
--------------------------
1. Run command  ``` composer require stefano/stefano-lock-table ```

Features
------------
- build lock table sql string
- build unlock table sql string
- supported vendors mysql, postgresql

Usage
-----

```
$factory = new \StefanoLockTable\Factory();

$vendor = 'Mysql'; //or any supported database
$adapter = $factory->createAdapter($vendor);

//build lock table sql string (exclusive lock)
$adapter->getLockSqlString('tableName');
$adapter->getLockSqlString(array('tableName', 'anotherTable'));

//build unlock table sql string
$adapter->getUnlockSqlString();
```
