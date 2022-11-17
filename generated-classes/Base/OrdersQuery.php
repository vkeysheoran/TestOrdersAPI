<?php

namespace Base;

use \Orders as ChildOrders;
use \OrdersQuery as ChildOrdersQuery;
use \Exception;
use \PDO;
use Map\OrdersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `orders` table.
 *
 * @method     ChildOrdersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOrdersQuery orderByDeliveryAddress($order = Criteria::ASC) Order by the delivery_address column
 * @method     ChildOrdersQuery orderByBillingAddress($order = Criteria::ASC) Order by the billing_address column
 * @method     ChildOrdersQuery orderByExpectedDelivery($order = Criteria::ASC) Order by the expected_delivery column
 * @method     ChildOrdersQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOrdersQuery orderByOrderItems($order = Criteria::ASC) Order by the order_items column
 * @method     ChildOrdersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildOrdersQuery groupById() Group by the id column
 * @method     ChildOrdersQuery groupByDeliveryAddress() Group by the delivery_address column
 * @method     ChildOrdersQuery groupByBillingAddress() Group by the billing_address column
 * @method     ChildOrdersQuery groupByExpectedDelivery() Group by the expected_delivery column
 * @method     ChildOrdersQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOrdersQuery groupByOrderItems() Group by the order_items column
 * @method     ChildOrdersQuery groupByStatus() Group by the status column
 *
 * @method     ChildOrdersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrdersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrdersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrdersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrdersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrdersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrdersQuery leftJoinCustomers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customers relation
 * @method     ChildOrdersQuery rightJoinCustomers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customers relation
 * @method     ChildOrdersQuery innerJoinCustomers($relationAlias = null) Adds a INNER JOIN clause to the query using the Customers relation
 *
 * @method     ChildOrdersQuery joinWithCustomers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Customers relation
 *
 * @method     ChildOrdersQuery leftJoinWithCustomers() Adds a LEFT JOIN clause and with to the query using the Customers relation
 * @method     ChildOrdersQuery rightJoinWithCustomers() Adds a RIGHT JOIN clause and with to the query using the Customers relation
 * @method     ChildOrdersQuery innerJoinWithCustomers() Adds a INNER JOIN clause and with to the query using the Customers relation
 *
 * @method     \CustomersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildOrders|null findOne(?ConnectionInterface $con = null) Return the first ChildOrders matching the query
 * @method     ChildOrders findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrders matching the query, or a new ChildOrders object populated from the query conditions when no match is found
 *
 * @method     ChildOrders|null findOneById(int $id) Return the first ChildOrders filtered by the id column
 * @method     ChildOrders|null findOneByDeliveryAddress(string $delivery_address) Return the first ChildOrders filtered by the delivery_address column
 * @method     ChildOrders|null findOneByBillingAddress(string $billing_address) Return the first ChildOrders filtered by the billing_address column
 * @method     ChildOrders|null findOneByExpectedDelivery(string $expected_delivery) Return the first ChildOrders filtered by the expected_delivery column
 * @method     ChildOrders|null findOneByCustomerId(int $customer_id) Return the first ChildOrders filtered by the customer_id column
 * @method     ChildOrders|null findOneByOrderItems(int $order_items) Return the first ChildOrders filtered by the order_items column
 * @method     ChildOrders|null findOneByStatus(int $status) Return the first ChildOrders filtered by the status column
 *
 * @method     ChildOrders requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrders by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOne(?ConnectionInterface $con = null) Return the first ChildOrders matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrders requireOneById(int $id) Return the first ChildOrders filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByDeliveryAddress(string $delivery_address) Return the first ChildOrders filtered by the delivery_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByBillingAddress(string $billing_address) Return the first ChildOrders filtered by the billing_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByExpectedDelivery(string $expected_delivery) Return the first ChildOrders filtered by the expected_delivery column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByCustomerId(int $customer_id) Return the first ChildOrders filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByOrderItems(int $order_items) Return the first ChildOrders filtered by the order_items column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByStatus(int $status) Return the first ChildOrders filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrders[]|Collection find(?ConnectionInterface $con = null) Return ChildOrders objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrders> find(?ConnectionInterface $con = null) Return ChildOrders objects based on current ModelCriteria
 *
 * @method     ChildOrders[]|Collection findById(int|array<int> $id) Return ChildOrders objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildOrders> findById(int|array<int> $id) Return ChildOrders objects filtered by the id column
 * @method     ChildOrders[]|Collection findByDeliveryAddress(string|array<string> $delivery_address) Return ChildOrders objects filtered by the delivery_address column
 * @psalm-method Collection&\Traversable<ChildOrders> findByDeliveryAddress(string|array<string> $delivery_address) Return ChildOrders objects filtered by the delivery_address column
 * @method     ChildOrders[]|Collection findByBillingAddress(string|array<string> $billing_address) Return ChildOrders objects filtered by the billing_address column
 * @psalm-method Collection&\Traversable<ChildOrders> findByBillingAddress(string|array<string> $billing_address) Return ChildOrders objects filtered by the billing_address column
 * @method     ChildOrders[]|Collection findByExpectedDelivery(string|array<string> $expected_delivery) Return ChildOrders objects filtered by the expected_delivery column
 * @psalm-method Collection&\Traversable<ChildOrders> findByExpectedDelivery(string|array<string> $expected_delivery) Return ChildOrders objects filtered by the expected_delivery column
 * @method     ChildOrders[]|Collection findByCustomerId(int|array<int> $customer_id) Return ChildOrders objects filtered by the customer_id column
 * @psalm-method Collection&\Traversable<ChildOrders> findByCustomerId(int|array<int> $customer_id) Return ChildOrders objects filtered by the customer_id column
 * @method     ChildOrders[]|Collection findByOrderItems(int|array<int> $order_items) Return ChildOrders objects filtered by the order_items column
 * @psalm-method Collection&\Traversable<ChildOrders> findByOrderItems(int|array<int> $order_items) Return ChildOrders objects filtered by the order_items column
 * @method     ChildOrders[]|Collection findByStatus(int|array<int> $status) Return ChildOrders objects filtered by the status column
 * @psalm-method Collection&\Traversable<ChildOrders> findByStatus(int|array<int> $status) Return ChildOrders objects filtered by the status column
 *
 * @method     ChildOrders[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrders> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class OrdersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrdersQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'orders', $modelName = '\\Orders', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdersQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdersQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildOrdersQuery) {
            return $criteria;
        }
        $query = new ChildOrdersQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOrders|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrdersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrdersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOrders A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, delivery_address, billing_address, expected_delivery, customer_id, order_items, status FROM orders WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOrders $obj */
            $obj = new ChildOrders();
            $obj->hydrate($row);
            OrdersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildOrders|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(OrdersTableMap::COL_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(OrdersTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the delivery_address column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliveryAddress('fooValue');   // WHERE delivery_address = 'fooValue'
     * $query->filterByDeliveryAddress('%fooValue%', Criteria::LIKE); // WHERE delivery_address LIKE '%fooValue%'
     * $query->filterByDeliveryAddress(['foo', 'bar']); // WHERE delivery_address IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $deliveryAddress The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDeliveryAddress($deliveryAddress = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deliveryAddress)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_DELIVERY_ADDRESS, $deliveryAddress, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billing_address column
     *
     * Example usage:
     * <code>
     * $query->filterByBillingAddress('fooValue');   // WHERE billing_address = 'fooValue'
     * $query->filterByBillingAddress('%fooValue%', Criteria::LIKE); // WHERE billing_address LIKE '%fooValue%'
     * $query->filterByBillingAddress(['foo', 'bar']); // WHERE billing_address IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billingAddress The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBillingAddress($billingAddress = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billingAddress)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_BILLING_ADDRESS, $billingAddress, $comparison);

        return $this;
    }

    /**
     * Filter the query on the expected_delivery column
     *
     * Example usage:
     * <code>
     * $query->filterByExpectedDelivery('2011-03-14'); // WHERE expected_delivery = '2011-03-14'
     * $query->filterByExpectedDelivery('now'); // WHERE expected_delivery = '2011-03-14'
     * $query->filterByExpectedDelivery(array('max' => 'yesterday')); // WHERE expected_delivery > '2011-03-13'
     * </code>
     *
     * @param mixed $expectedDelivery The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByExpectedDelivery($expectedDelivery = null, ?string $comparison = null)
    {
        if (is_array($expectedDelivery)) {
            $useMinMax = false;
            if (isset($expectedDelivery['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_EXPECTED_DELIVERY, $expectedDelivery['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expectedDelivery['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_EXPECTED_DELIVERY, $expectedDelivery['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_EXPECTED_DELIVERY, $expectedDelivery, $comparison);

        return $this;
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @see       filterByCustomers()
     *
     * @param mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, ?string $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_CUSTOMER_ID, $customerId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the order_items column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderItems(1234); // WHERE order_items = 1234
     * $query->filterByOrderItems(array(12, 34)); // WHERE order_items IN (12, 34)
     * $query->filterByOrderItems(array('min' => 12)); // WHERE order_items > 12
     * </code>
     *
     * @param mixed $orderItems The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrderItems($orderItems = null, ?string $comparison = null)
    {
        if (is_array($orderItems)) {
            $useMinMax = false;
            if (isset($orderItems['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ORDER_ITEMS, $orderItems['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderItems['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ORDER_ITEMS, $orderItems['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_ORDER_ITEMS, $orderItems, $comparison);

        return $this;
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByStatus($status = null, ?string $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_STATUS, $status, $comparison);

        return $this;
    }

    /**
     * Filter the query by a related \Customers object
     *
     * @param \Customers|ObjectCollection $customers The related object(s) to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustomers($customers, ?string $comparison = null)
    {
        if ($customers instanceof \Customers) {
            return $this
                ->addUsingAlias(OrdersTableMap::COL_CUSTOMER_ID, $customers->getId(), $comparison);
        } elseif ($customers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            $this
                ->addUsingAlias(OrdersTableMap::COL_CUSTOMER_ID, $customers->toKeyValue('PrimaryKey', 'Id'), $comparison);

            return $this;
        } else {
            throw new PropelException('filterByCustomers() only accepts arguments of type \Customers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customers relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinCustomers(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customers');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Customers');
        }

        return $this;
    }

    /**
     * Use the Customers relation Customers object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CustomersQuery A secondary query class using the current class as primary query
     */
    public function useCustomersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customers', '\CustomersQuery');
    }

    /**
     * Use the Customers relation Customers object
     *
     * @param callable(\CustomersQuery):\CustomersQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withCustomersQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useCustomersQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Customers table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \CustomersQuery The inner query object of the EXISTS statement
     */
    public function useCustomersExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Customers', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Customers table for a NOT EXISTS query.
     *
     * @see useCustomersExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \CustomersQuery The inner query object of the NOT EXISTS statement
     */
    public function useCustomersNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Customers', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param ChildOrders $orders Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($orders = null)
    {
        if ($orders) {
            $this->addUsingAlias(OrdersTableMap::COL_ID, $orders->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the orders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrdersTableMap::clearInstancePool();
            OrdersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrdersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrdersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrdersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
