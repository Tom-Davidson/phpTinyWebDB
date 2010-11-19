<?php
/**
 * SimpleWebDB front controller
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

error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Autoloader
spl_autoload_register(null, false);
spl_autoload_extensions('.php, .class.php, .interface.php');
spl_autoload_register('autoloader');
// Fetch input and set defaults
$function = array_pop(explode('/', $_SERVER['REQUEST_URI']));
if (isset($_POST['tag'])) {
    $tag = $_POST['tag'];
} else {
    $tag = '';
}
if (isset($_POST['value'])) {
    $value = $_POST['value'];
} else {
    $value = '';
}
// Set your SimpleWebDB adapter/provider here:
$db = new SimpleWebDBSession();
// What are we supposed to do? get/set/?
switch ($function) {
case 'storeavalue':
    //header('Content-type: application/json');
    try{
        $success = $db->storeavalue($tag, $value);
        if ($success == true) {
            print json_encode(array('STORED', $tag, $value));
        } else {
            throw new Exception('Save failed');
        }
    } catch (Exception $e) {
        print json_encode(array('ERROR', $tag, $e->getMessage()));
    }
    break;
case 'getvalue':
    //header('Content-type: application/json');
    try{
        $value = $db->getvalue($tag);
        if ($value != null) {
            print json_encode(array('VALUE', $tag, $value));
        } else {
            throw new Exception('Load failed');
        }
    } catch (Exception $e) {
        print json_encode(array('ERROR', $tag, $e->getMessage()));
    }
    break;
default:
    include 'lib/debug.html';
    break;
}
// Clean up
unset($db);

// ---------------------------FUNCTIONS----------------------------------------------
/**
 * Searches for the correct file to include to get a class definition
 *
 * @param string $class Name of the class to load
 *
 * @return mixed Returns the filename to include or false if one cannot be found
 *
 */
function autoloader($class)
{
    if (file_exists('lib/adapters/'.$class.'.class.php')) {
        include 'lib/adapters/'.$class.'.class.php';
    } elseif (file_exists('lib/'.$class.'.class.php')) {
        include 'lib/'.$class.'.class.php';
    } elseif (file_exists('lib/'.$class.'.interface.php')) {
        include 'lib/'.$class.'.interface.php';
    } else {
        return false;
    }
}

/**
 * Reference
 * http://appinvtinywebdb.appspot.com/
 * http://appinventor.googlelabs.com/learn/reference/other/tinywebdb.html
 *
 * Test
 * http://www.yuki-onna.co.uk/projects/experimental/appcreator_simplewebdb/
 */