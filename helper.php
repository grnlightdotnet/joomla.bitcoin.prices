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
 
class modBitcoinPricesHelper
{
 
    function getBitcoinPrices($btccurrency, $btctime)
    {
		$currencies = array("ARS","AUD","BRL","CAD","CHF","CNY","CZK","DKK","EUR","GBP","HKD","ILS","INR","JPY","LTC","MXN","NOK","NZD","PLN","RUB","SEK","SGD","SLL","THB","USD","XRP","ZAR");
		$times = array("24h","7d","30d");
		$cache_filename = "bitcoin_weighted_prices.json";
		
		if (!in_array($btccurrency, $currencies)){
			$error = "<b>Error!</b> Currency not supported." . $btccurrency;
			return $error;
			exit;
		} elseif (!in_array($btctime, $times)){
			$error = "<b>Error!</b> Time/date not supported." . $btctime;
			return $error;
			exit;
		}
		
		if (file_exists($cache_filename) && filemtime($cache_filename)>=strtotime("-1 hour"))
		{
			$content = file_get_contents($cache_filename);
		}
		else
		{
			$url = "http://api.bitcoincharts.com/v1/weighted_prices.json";
			$content = @file_get_contents($url);
			if (!$content){ //Check to see if anything was actually grabbed from URL and added to the variable
				$error = "<b>Error!</b> Error retrieving JSON file from BitcoinCharts.com";
				return $error;
				exit;
			}
			file_put_contents($cache_filename, $content);
		}
		
		$json = json_decode($content, true);
		
		if (!$json) {
			$error = "<b>Error!</b> Error decoding JSON data.";
			return $error;
			exit;
		}
		if (!$error) {
		return $json[$btccurrency][$btctime];
		}
    }
}
?>
