<?php
/**
 * Helper class for Bitcoin Pricing Joomla Module
 * 
 * @package    Joomla
 * @link 	http://www.grnlight.net/index.php/bitcoin-prices-module
 * @license        GPL v3, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

echo "Bitcoin Price (". $btc_currency ." - ". $btc_time ."): <b>$". $bitcoinprices . "</b><br />"; 
echo "<p style=\"font-size:10px; text-align:center;\">Module from <a href=\"http://www.grnlight.net\">GrnLight.net</a></p>";
?>
