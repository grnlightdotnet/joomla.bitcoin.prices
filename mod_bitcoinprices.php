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

// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );

Error_Reporting(E_ERROR);

$btc_currency = $params->get('btc_currency');
$btc_time = $params->get('btc_time');

$bitcoinprices = modBitcoinPricesHelper::getBitcoinPrices($btc_currency, $btc_time);
require( JModuleHelper::getLayoutPath( 'mod_bitcoinprices' ) );
?>
