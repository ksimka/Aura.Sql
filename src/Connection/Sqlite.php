<?php
/**
 * 
 * This file is part of the Aura Project for PHP.
 * 
 * @package Aura.Sql
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Aura\Sql\Connection;

/**
 * 
 * SQLite connection adapter.
 * 
 * @package Aura.Sql
 * 
 */
class Sqlite extends AbstractConnection
{
    /**
     * 
     * The PDO DSN for the connection, typically a file path.
     * 
     * @var string
     * 
     */
    protected $dsn = null;

    /**
     * 
     * The PDO type prefix.
     * 
     * @var string
     * 
     */
    protected $dsn_prefix = 'sqlite';

    /**
     * 
     * The quote character before an entity name (table, index, etc).
     * 
     * @var string
     * 
     */
    protected $quote_name_prefix = '"';

    /**
     * 
     * The quote character after an entity name (table, index, etc).
     * 
     * @var string
     * 
     */
    protected $quote_name_suffix = '"';
}
