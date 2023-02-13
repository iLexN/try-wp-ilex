<?php
declare( strict_types=1 );

namespace IlexNg\WpIlex\Debug;

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\ServerDumper;
use Symfony\Component\VarDumper\VarDumper;

final class DebugDumper {
	public static function init(): void{
		VarDumper::setHandler(static function ($var) {
			$clone = new VarCloner();

			$dumper = new ServerDumper('tcp://127.0.0.1:9912', new CliDumper(), [
				'cli' => new CliContextProvider(),
				'source' => new SourceContextProvider(),
			]);
			//      $dumper = new HtmlDumper();


			$dumper->dump($clone->cloneVar($var));
		});
	}
}
