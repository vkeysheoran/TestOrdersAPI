<?php

namespace Map;

use \Orders;
use \OrdersQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'orders' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrdersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.OrdersTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'orders';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'orders';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Orders';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Orders';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Orders';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'orders.id';

    /**
     * the column name for the delivery_address field
     */
    public const COL_DELIVERY_ADDRESS = 'orders.delivery_address';

    /**
     * the column name for the billing_address field
     */
    public const COL_BILLING_ADDRESS = 'orders.billing_address';

    /**
     * the column name for the expected_delivery field
     */
    public const COL_EXPECTED_DELIVERY = 'orders.expected_delivery';

    /**
     * the column name for the customer_id field
     */
    public const COL_CUSTOMER_ID = 'orders.customer_id';

    /**
     * the column name for the order_items field
     */
    public const COL_ORDER_ITEMS = 'orders.order_items';

    /**
     * the column name for the status field
     */
    public const COL_STATUS = 'orders.status';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Id', 'DeliveryAddress', 'BillingAddress', 'ExpectedDelivery', 'CustomerId', 'OrderItems', 'Status', ],
        self::TYPE_CAMELNAME     => ['id', 'deliveryAddress', 'billingAddress', 'expectedDelivery', 'customerId', 'orderItems', 'status', ],
        self::TYPE_COLNAME       => [OrdersTableMap::COL_ID, OrdersTableMap::COL_DELIVERY_ADDRESS, OrdersTableMap::COL_BILLING_ADDRESS, OrdersTableMap::COL_EXPECTED_DELIVERY, OrdersTableMap::COL_CUSTOMER_ID, OrdersTableMap::COL_ORDER_ITEMS, OrdersTableMap::COL_STATUS, ],
        self::TYPE_FIELDNAME     => ['id', 'delivery_address', 'billing_address', 'expected_delivery', 'customer_id', 'order_items', 'status', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Id' => 0, 'DeliveryAddress' => 1, 'BillingAddress' => 2, 'ExpectedDelivery' => 3, 'CustomerId' => 4, 'OrderItems' => 5, 'Status' => 6, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'deliveryAddress' => 1, 'billingAddress' => 2, 'expectedDelivery' => 3, 'customerId' => 4, 'orderItems' => 5, 'status' => 6, ],
        self::TYPE_COLNAME       => [OrdersTableMap::COL_ID => 0, OrdersTableMap::COL_DELIVERY_ADDRESS => 1, OrdersTableMap::COL_BILLING_ADDRESS => 2, OrdersTableMap::COL_EXPECTED_DELIVERY => 3, OrdersTableMap::COL_CUSTOMER_ID => 4, OrdersTableMap::COL_ORDER_ITEMS => 5, OrdersTableMap::COL_STATUS => 6, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'delivery_address' => 1, 'billing_address' => 2, 'expected_delivery' => 3, 'customer_id' => 4, 'order_items' => 5, 'status' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Orders.Id' => 'ID',
        'id' => 'ID',
        'orders.id' => 'ID',
        'OrdersTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'DeliveryAddress' => 'DELIVERY_ADDRESS',
        'Orders.DeliveryAddress' => 'DELIVERY_ADDRESS',
        'deliveryAddress' => 'DELIVERY_ADDRESS',
        'orders.deliveryAddress' => 'DELIVERY_ADDRESS',
        'OrdersTableMap::COL_DELIVERY_ADDRESS' => 'DELIVERY_ADDRESS',
        'COL_DELIVERY_ADDRESS' => 'DELIVERY_ADDRESS',
        'delivery_address' => 'DELIVERY_ADDRESS',
        'orders.delivery_address' => 'DELIVERY_ADDRESS',
        'BillingAddress' => 'BILLING_ADDRESS',
        'Orders.BillingAddress' => 'BILLING_ADDRESS',
        'billingAddress' => 'BILLING_ADDRESS',
        'orders.billingAddress' => 'BILLING_ADDRESS',
        'OrdersTableMap::COL_BILLING_ADDRESS' => 'BILLING_ADDRESS',
        'COL_BILLING_ADDRESS' => 'BILLING_ADDRESS',
        'billing_address' => 'BILLING_ADDRESS',
        'orders.billing_address' => 'BILLING_ADDRESS',
        'ExpectedDelivery' => 'EXPECTED_DELIVERY',
        'Orders.ExpectedDelivery' => 'EXPECTED_DELIVERY',
        'expectedDelivery' => 'EXPECTED_DELIVERY',
        'orders.expectedDelivery' => 'EXPECTED_DELIVERY',
        'OrdersTableMap::COL_EXPECTED_DELIVERY' => 'EXPECTED_DELIVERY',
        'COL_EXPECTED_DELIVERY' => 'EXPECTED_DELIVERY',
        'expected_delivery' => 'EXPECTED_DELIVERY',
        'orders.expected_delivery' => 'EXPECTED_DELIVERY',
        'CustomerId' => 'CUSTOMER_ID',
        'Orders.CustomerId' => 'CUSTOMER_ID',
        'customerId' => 'CUSTOMER_ID',
        'orders.customerId' => 'CUSTOMER_ID',
        'OrdersTableMap::COL_CUSTOMER_ID' => 'CUSTOMER_ID',
        'COL_CUSTOMER_ID' => 'CUSTOMER_ID',
        'customer_id' => 'CUSTOMER_ID',
        'orders.customer_id' => 'CUSTOMER_ID',
        'OrderItems' => 'ORDER_ITEMS',
        'Orders.OrderItems' => 'ORDER_ITEMS',
        'orderItems' => 'ORDER_ITEMS',
        'orders.orderItems' => 'ORDER_ITEMS',
        'OrdersTableMap::COL_ORDER_ITEMS' => 'ORDER_ITEMS',
        'COL_ORDER_ITEMS' => 'ORDER_ITEMS',
        'order_items' => 'ORDER_ITEMS',
        'orders.order_items' => 'ORDER_ITEMS',
        'Status' => 'STATUS',
        'Orders.Status' => 'STATUS',
        'status' => 'STATUS',
        'orders.status' => 'STATUS',
        'OrdersTableMap::COL_STATUS' => 'STATUS',
        'COL_STATUS' => 'STATUS',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('orders');
        $this->setPhpName('Orders');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Orders');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('delivery_address', 'DeliveryAddress', 'VARCHAR', true, 255, null);
        $this->addColumn('billing_address', 'BillingAddress', 'VARCHAR', true, 255, null);
        $this->addColumn('expected_delivery', 'ExpectedDelivery', 'DATE', true, null, null);
        $this->addForeignKey('customer_id', 'CustomerId', 'INTEGER', 'customers', 'id', true, null, null);
        $this->addColumn('order_items', 'OrderItems', 'INTEGER', true, null, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Customers', '\\Customers', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':customer_id',
    1 => ':id',
  ),
), null, null, null, false);
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? OrdersTableMap::CLASS_DEFAULT : OrdersTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Orders object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = OrdersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrdersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrdersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrdersTableMap::OM_CLASS;
            /** @var Orders $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrdersTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = OrdersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrdersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Orders $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrdersTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(OrdersTableMap::COL_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_DELIVERY_ADDRESS);
            $criteria->addSelectColumn(OrdersTableMap::COL_BILLING_ADDRESS);
            $criteria->addSelectColumn(OrdersTableMap::COL_EXPECTED_DELIVERY);
            $criteria->addSelectColumn(OrdersTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_ORDER_ITEMS);
            $criteria->addSelectColumn(OrdersTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.delivery_address');
            $criteria->addSelectColumn($alias . '.billing_address');
            $criteria->addSelectColumn($alias . '.expected_delivery');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.order_items');
            $criteria->addSelectColumn($alias . '.status');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(OrdersTableMap::COL_ID);
            $criteria->removeSelectColumn(OrdersTableMap::COL_DELIVERY_ADDRESS);
            $criteria->removeSelectColumn(OrdersTableMap::COL_BILLING_ADDRESS);
            $criteria->removeSelectColumn(OrdersTableMap::COL_EXPECTED_DELIVERY);
            $criteria->removeSelectColumn(OrdersTableMap::COL_CUSTOMER_ID);
            $criteria->removeSelectColumn(OrdersTableMap::COL_ORDER_ITEMS);
            $criteria->removeSelectColumn(OrdersTableMap::COL_STATUS);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.delivery_address');
            $criteria->removeSelectColumn($alias . '.billing_address');
            $criteria->removeSelectColumn($alias . '.expected_delivery');
            $criteria->removeSelectColumn($alias . '.customer_id');
            $criteria->removeSelectColumn($alias . '.order_items');
            $criteria->removeSelectColumn($alias . '.status');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(OrdersTableMap::DATABASE_NAME)->getTable(OrdersTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Orders or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Orders object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Orders) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrdersTableMap::DATABASE_NAME);
            $criteria->add(OrdersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = OrdersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrdersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrdersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the orders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return OrdersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Orders or Criteria object.
     *
     * @param mixed $criteria Criteria or Orders object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Orders object
        }

        if ($criteria->containsKey(OrdersTableMap::COL_ID) && $criteria->keyContainsValue(OrdersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrdersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = OrdersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
