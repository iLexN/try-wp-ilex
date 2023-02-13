<?php
declare( strict_types=1 );

namespace IlexNg\WpIlex\Debug;

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;

final class DebugLogger {

	private static $instance;

	private function __construct() {

	}

	public static function get(): Logger {
		if ( self::$instance === null ) {
			$log = new Logger( 'ilexDebug' );
			$log->pushHandler( new StreamHandler( __DIR__ . '/../ilex.log', Level::Info ) );
			//$log->pushHandler( new StreamHandler( 'php://stdout', Level::Debug ) );
			$log->pushProcessor(new UidProcessor());
			self::$instance = $log;
		}

		return self::$instance;
	}
}
