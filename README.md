Stefano Lock Table
===================

| Test Status | Code Coverage | Dependencies |
| :---: | :---: | :---: |
| <a href="https://travis-ci.org/bartko-s/stefano-lock-table"><img src="https://secure.travis-ci.org/bartko-s/stefano-lock-table.png?branch=master" /></a> | <a href='https://coveralls.io/r/bartko-s/stefano-lock-table?branch=master'><img src='https://coveralls.io/repos/bartko-s/stefano-lock-table/badge.png?branch=master' alt='Coverage Status' /></a> | <a href='https://www.versioneye.com/user/projects/52e13769ec13751a000000b0'><img src='https://www.versioneye.com/user/projects/52e13769ec13751a000000b0/badge.png' alt="Dependency Status" /></a> |

Instalation using Composer
--------------------------
1. Add following line to composer.json  ``` "stefano/stefano-lock-table": "*" ```

Features
------------
- build lock table sql query
- supported vendors mysql, postgresql

Usage
-----

```
$factory = new \StefanoLockTable\Factory();

$vendor = 'Mysql'; //or any supported database
$adapter = $factory->createAdapter($vendor);

//buil lock table sql string (exclusive lock)
$adapter->getLockSqlString('tableName');
$adapter->getLockSqlString(array('tableName', 'anotherTable'));

//buil unlock table sql string
$adapter->getUnlockSqlString();
```
