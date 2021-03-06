<?php
/**
 * 
 * This file is part of Aura for PHP.
 * 
 * @package Aura.Sql
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Aura\Sql;

/**
 * 
 * An interface to the Aura.Sql extended PDO object.
 * 
 * @package Aura.Sql
 * 
 */
interface ExtendedPdoInterface extends PdoInterface
{
    /**
     * 
     * Retains a single value to bind to the next query statement; it will
     * be merged with existing bound values, and will be reset after the
     * next query.
     * 
     * @param string $name The parameter name.
     * 
     * @param mixed $value The parameter value.
     * 
     * @return null
     * 
     */
    public function bindValue($name, $value);
    
    /**
     * 
     * Retains several values to bind to the next query statement; these will
     * be merged with existing bound values, and will be reset after the
     * next query.
     * 
     * @param array $bind_values An array where the key is the parameter name and
     * the value is the parameter value.
     * 
     * @return null
     * 
     */
    public function bindValues(array $bind_values);
    
    /**
     * 
     * Connects to the database and sets PDO attributes.
     * 
     * @return null
     * 
     * @throws \PDOException if the connection fails.
     * 
     */
    public function connect();
    
    /**
     * 
     * Fetches a sequential array of rows from the database; the rows
     * are represented as associative arrays.
     * 
     * @param string $statement The SQL statement to prepare and execute.
     * 
     * @param array $values Values to bind to the query.
     * 
     * @param callable $callable A callable to be applied to each of the rows
     * to be returned.
     * 
     * @return array
     * 
     */
    public function fetchAll($statement, array $values = array(), $callable = null);

    /**
     * 
     * Fetches an associative array of rows from the database; the rows
     * are represented as associative arrays. The array of rows is keyed
     * on the first column of each row.
     * 
     * N.b.: if multiple rows have the same first column value, the last
     * row with that value will override earlier rows.
     * 
     * @param string $statement The SQL statement to prepare and execute.
     * 
     * @param array $values Values to bind to the query.
     * 
     * @param callable $callable A callable to be applied to each of the rows
     * to be returned.
     * 
     * @return array
     * 
     */
    public function fetchAssoc($statement, array $values = array(), $callable = null);
    
    /**
     * 
     * Fetches the first column of rows as a sequential array.
     * 
     * @param string $statement The SQL statement to prepare and execute.
     * 
     * @param array $values Values to bind to the query.
     * 
     * @param callable $callable A callable to be applied to each of the rows
     * to be returned.
     * 
     * @return array
     * 
     */
    public function fetchCol($statement, array $values = array(), $callable = null);
    
    /**
     * 
     * Fetches one row from the database as an object, mapping column values
     * to object properties.
     * 
     * Warning: PDO "injects property-values BEFORE invoking the constructor -
     * in other words, if your class initializes property-values to defaults
     * in the constructor, you will be overwriting the values injected by
     * fetchObject() !"
     * <http://www.php.net/manual/en/pdostatement.fetchobject.php#111744>
     * 
     * @param string $statement The SQL statement to prepare and execute.
     * 
     * @param array $values Values to bind to the query.
     * 
     * @param string $class_name The name of the class to create.
     * 
     * @param array $ctor_args Arguments to pass to the object constructor.
     * 
     * @return object
     * 
     */
    public function fetchObject(
        $statement,
        array $values = array(),
        $class_name = 'StdClass',
        array $ctor_args = array()
    );

    /**
     * 
     * Fetches a sequential array of rows from the database; the rows
     * are represented as objects, where the column values are mapped to
     * object properties.
     * 
     * Warning: PDO "injects property-values BEFORE invoking the constructor -
     * in other words, if your class initializes property-values to defaults
     * in the constructor, you will be overwriting the values injected by
     * fetchObject() !"
     * <http://www.php.net/manual/en/pdostatement.fetchobject.php#111744>
     * 
     * @param string $statement The SQL statement to prepare and execute.
     * 
     * @param array $values Values to bind to the query.
     * 
     * @param string $class_name The name of the class to create from each
     * row.
     * 
     * @param array $ctor_args Arguments to pass to each object constructor.
     * 
     * @return array
     * 
     */
    public function fetchObjects(
        $statement,
        array $values = array(),
        $class_name = 'StdClass',
        array $ctor_args = array()
    );
    
    /**
     * 
     * Fetches one row from the database as an associative array.
     * 
     * @param string $statement The SQL statement to prepare and execute.
     * 
     * @param array $values Values to bind to the query.
     * 
     * @return array
     * 
     */
    public function fetchOne($statement, array $values = array());
    
    /**
     * 
     * Fetches an associative array of rows as key-value pairs (first 
     * column is the key, second column is the value).
     * 
     * @param string $statement The SQL statement to prepare and execute.
     * 
     * @param callable $callable A callable to be applied to each of the rows
     * to be returned.
     * 
     * @param array $values Values to bind to the query.
     * 
     * @return array
     * 
     */
    public function fetchPairs($statement, array $values = array(), $callable = null);
    
    /**
     * 
     * Fetches the very first value (i.e., first column of the first row).
     * 
     * @param string $statement The SQL statement to prepare and execute.
     * 
     * @param array $values Values to bind to the query.
     * 
     * @return mixed
     * 
     */
    public function fetchValue($statement, array $values = array());
    
    /**
     * 
     * Returns the array of values to bind to the next query.
     * 
     * @return array
     * 
     */
    public function getBindValues();

    /**
     * 
     * Returns the DSN for the connection.
     * 
     * @return string
     * 
     */
    public function getDsn();

    /**
     * 
     * Returns the name of the driver from the DSN.
     * 
     * @return string
     * 
     */
    public function getDriver();
    
    /**
     * 
     * Returns the profiler object.
     * 
     * @return ProfilerInterface
     * 
     */
    public function getProfiler();
    
    /**
     * 
     * Is the instance connected to a database?
     * 
     * @return bool
     * 
     */
    public function isConnected();
    
    /**
     * 
     * Sets the profiler object.
     * 
     * @param ProfilerInterface $profiler
     * 
     * @return null
     * 
     */
    public function setProfiler(ProfilerInterface $profiler);
}
