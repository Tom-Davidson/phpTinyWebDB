<?php
/**
 * A null interface for SimpleDB
 *
 * PHP version 5
 *
 * @category  AndroidAppInventor
 * @package   SimpleWebDB
 * @author    Tom Davidson <tom@davidson.me.uk>
 * @copyright 2010 The Authors
 * @license   http://opensource.org/licenses/bsd-license.php New BSD License
 * @version   SVN: $Id: $
 * @link      http://www.yuki-onna.co.uk/
 * @since     File available since Release 0.1
 */

/**
 * A null interface for SimpleDB
 *
 * @category  AndroidAppInventor
 * @package   SimpleWebDB
 * @author    Tom Davidson <tom@davidson.me.uk>
 * @copyright 2010 The Authors
 * @license   http://opensource.org/licenses/bsd-license.php New BSD License
 * @version   Release: 0.9
 * @link      http://www.yuki-onna.co.uk/
 * @since     0.9
 */
class SimpleWebDBSession implements SimpleWebDBInterface
{
    /**
     * SimpleWebDBSession::__construct
     *
     * Sets up the database
     *
     */
    function __construct()
    {
        if (session_id() == '') {
            session_start();
        }
        if (!array_key_exists('SimpleWebDB', $_SESSION)) {
            $_SESSION['SimpleWebDB'] = array();
        }
    }
    /**
     * SimpleWebDBSession::getvalue
     *
     * Retrieve a value
     *
     * @param string $tag Name of the entry
     *
     * @return mixed The contents of the DB, null if no value
     *
     */
    function getvalue($tag)
    {
        if (array_key_exists('SimpleWebDB', $_SESSION) && array_key_exists($tag, $_SESSION['SimpleWebDB'])) {
            return $_SESSION['SimpleWebDB'][$tag];
        } else {
            return null;
        }
    }
    /**
     * SimpleWebDBSession::storeavalue
     *
     * Store a value
     *
     * @param string $tag   Name of the entry
     * @param string $value Value to store
     *
     * @return boolean Returns TRUE on success
     *
     */
    function storeavalue($tag, $value)
    {
        $_SESSION['SimpleWebDB'][$tag] = $value;
        return true;
    }
    /**
     * SimpleWebDBSession::count
     *
     * Provides a list of all tags stored but not their values
     *
     * @return array List of tags stored
     *
     */
    function count()
    {
        return count($_SESSION['SimpleWebDB']);
    }
    /**
     * SimpleWebDBSession::getlist
     *
     * Provides a list of all tags stored but not their values
     *
     * @return array List of tags stored
     *
     */
    function getlist()
    {
        return array_keys($_SESSION['SimpleWebDB']);
    }
}
