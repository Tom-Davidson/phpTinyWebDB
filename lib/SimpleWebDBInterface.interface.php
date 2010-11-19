<?php
/**
 * Interface for a simpledb adapter
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
 * Interface for a simpledb adapter
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
interface SimpleWebDBInterface extends Countable
{
    /**
     * SimpleWebDBInterface::getvalue
     *
     * Retrieve a value
     *
     * @param string $tag Name of the entry
     *
     * @return mixed The contents of the DB, null if no value
     *
     */
    function getvalue($tag);
    /**
     * SimpleWebDBInterface::storeavalue
     *
     * Store a value
     *
     * @param string $tag   Name of the entry
     * @param string $value Value to store
     *
     * @return boolean Returns TRUE on success
     *
     */
    function storeavalue($tag, $value);
    /**
     * SimpleWebDBInterface::getlist
     *
     * Provides a list of all tags stored but not their values
     *
     * @return array List of tags stored
     *
     */
    function getlist();
}
