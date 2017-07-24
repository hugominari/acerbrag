<?php


/**
 * Base class that represents a query for the 'a_usuario_permissao' table.
 *
 * 
 *
 * @method     AUsuarioPermissaoQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     AUsuarioPermissaoQuery orderByPermissaoId($order = Criteria::ASC) Order by the permissao_id column
 *
 * @method     AUsuarioPermissaoQuery groupByUsuarioId() Group by the usuario_id column
 * @method     AUsuarioPermissaoQuery groupByPermissaoId() Group by the permissao_id column
 *
 * @method     AUsuarioPermissaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AUsuarioPermissaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AUsuarioPermissaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AUsuarioPermissaoQuery leftJoinTPermissao($relationAlias = null) Adds a LEFT JOIN clause to the query using the TPermissao relation
 * @method     AUsuarioPermissaoQuery rightJoinTPermissao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TPermissao relation
 * @method     AUsuarioPermissaoQuery innerJoinTPermissao($relationAlias = null) Adds a INNER JOIN clause to the query using the TPermissao relation
 *
 * @method     AUsuarioPermissaoQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     AUsuarioPermissaoQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     AUsuarioPermissaoQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     AUsuarioPermissao findOne(PropelPDO $con = null) Return the first AUsuarioPermissao matching the query
 * @method     AUsuarioPermissao findOneOrCreate(PropelPDO $con = null) Return the first AUsuarioPermissao matching the query, or a new AUsuarioPermissao object populated from the query conditions when no match is found
 *
 * @method     AUsuarioPermissao findOneByUsuarioId(int $usuario_id) Return the first AUsuarioPermissao filtered by the usuario_id column
 * @method     AUsuarioPermissao findOneByPermissaoId(int $permissao_id) Return the first AUsuarioPermissao filtered by the permissao_id column
 *
 * @method     array findByUsuarioId(int $usuario_id) Return AUsuarioPermissao objects filtered by the usuario_id column
 * @method     array findByPermissaoId(int $permissao_id) Return AUsuarioPermissao objects filtered by the permissao_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAUsuarioPermissaoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAUsuarioPermissaoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AUsuarioPermissao', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AUsuarioPermissaoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AUsuarioPermissaoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AUsuarioPermissaoQuery) {
			return $criteria;
		}
		$query = new AUsuarioPermissaoQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$usuario_id, $permissao_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AUsuarioPermissao|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AUsuarioPermissaoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AUsuarioPermissaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    AUsuarioPermissao A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `USUARIO_ID`, `PERMISSAO_ID` FROM `a_usuario_permissao` WHERE `USUARIO_ID` = :p0 AND `PERMISSAO_ID` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new AUsuarioPermissao();
			$obj->hydrate($row);
			AUsuarioPermissaoPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    AUsuarioPermissao|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(AUsuarioPermissaoPeer::USUARIO_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(AUsuarioPermissaoPeer::PERMISSAO_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(AUsuarioPermissaoPeer::USUARIO_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(AUsuarioPermissaoPeer::PERMISSAO_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the usuario_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsuarioId(1234); // WHERE usuario_id = 1234
	 * $query->filterByUsuarioId(array(12, 34)); // WHERE usuario_id IN (12, 34)
	 * $query->filterByUsuarioId(array('min' => 12)); // WHERE usuario_id > 12
	 * </code>
	 *
	 * @see       filterByUsuario()
	 *
	 * @param     mixed $usuarioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AUsuarioPermissaoPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the permissao_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPermissaoId(1234); // WHERE permissao_id = 1234
	 * $query->filterByPermissaoId(array(12, 34)); // WHERE permissao_id IN (12, 34)
	 * $query->filterByPermissaoId(array('min' => 12)); // WHERE permissao_id > 12
	 * </code>
	 *
	 * @see       filterByTPermissao()
	 *
	 * @param     mixed $permissaoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPermissaoId($permissaoId = null, $comparison = null)
	{
		if (is_array($permissaoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AUsuarioPermissaoPeer::PERMISSAO_ID, $permissaoId, $comparison);
	}

	/**
	 * Filter the query by a related TPermissao object
	 *
	 * @param     TPermissao|PropelCollection $tPermissao The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function filterByTPermissao($tPermissao, $comparison = null)
	{
		if ($tPermissao instanceof TPermissao) {
			return $this
				->addUsingAlias(AUsuarioPermissaoPeer::PERMISSAO_ID, $tPermissao->getId(), $comparison);
		} elseif ($tPermissao instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AUsuarioPermissaoPeer::PERMISSAO_ID, $tPermissao->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTPermissao() only accepts arguments of type TPermissao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TPermissao relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function joinTPermissao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TPermissao');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'TPermissao');
		}

		return $this;
	}

	/**
	 * Use the TPermissao relation TPermissao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TPermissaoQuery A secondary query class using the current class as primary query
	 */
	public function useTPermissaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTPermissao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TPermissao', 'TPermissaoQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(AUsuarioPermissaoPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AUsuarioPermissaoPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Usuario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function joinUsuario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Usuario');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Usuario');
		}

		return $this;
	}

	/**
	 * Use the Usuario relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AUsuarioPermissao $aUsuarioPermissao Object to remove from the list of results
	 *
	 * @return    AUsuarioPermissaoQuery The current query, for fluid interface
	 */
	public function prune($aUsuarioPermissao = null)
	{
		if ($aUsuarioPermissao) {
			$this->addCond('pruneCond0', $this->getAliasedColName(AUsuarioPermissaoPeer::USUARIO_ID), $aUsuarioPermissao->getUsuarioId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(AUsuarioPermissaoPeer::PERMISSAO_ID), $aUsuarioPermissao->getPermissaoId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseAUsuarioPermissaoQuery