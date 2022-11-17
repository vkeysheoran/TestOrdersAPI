<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'orders' => 
  array (
    'tablesByName' => 
    array (
      'customers' => '\\Map\\CustomersTableMap',
      'items' => '\\Map\\ItemsTableMap',
      'orders' => '\\Map\\OrdersTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Customers' => '\\Map\\CustomersTableMap',
      '\\Items' => '\\Map\\ItemsTableMap',
      '\\Orders' => '\\Map\\OrdersTableMap',
    ),
  ),
));
