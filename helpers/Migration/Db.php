<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 24.03.2015
 * Time: 08:32
 *
 * @author      wu3rstle
 */

namespace Migration;

//---- includes --------------------------------------
use Illuminate\Database\Capsule\Manager as Capsule;

//---- global settings -------------------------------

//---- class -----------------------------------------

/**
 * Class Db
 *
 * @author wu3rstle
 *
 * CreateDate: 24.03.2015 @ 08:32
 * LastChangesDate: 09.04.2015
 */
class Db {
	/**
	 * constructor
	 *
	 * @param array $args command line parameters
	 */
	public function __construct($args) {
		$this->args = $args;
	}

	/**
	 * get path to migration classes from config file
	 *
	 * @return mixed path to migration classes
	 */
	private function    getMigrationPath() {
		global $config;

		return $config['database']['migrationPath'];
	}

	/**
	 * display help
	 */
	private function help() {
		echo "usage: php {$this->args[0]} <command>\n";
		echo "allowed commands: \"migrate\", \"migrate:rollback\"\n";
	}

	/**
	 * command handle
	 */
	public function run() {
		if (count($this->args) <= 1) {
			$this->help();
		} else {
			switch ($this->args[1]) {
				case "migrate":
					$this->runMigrations();
					break;

				case 'migrate:rollback':
					$this->rollbackMigrations();
					break;

				case "help":
				case "--help":
					$this->help();
					break;

				default:
					echo 'Function "' . $this->args[1] . '" unknown';
					break;
			}
		}
	}

	/**
	 * command migrate
	 */
	private function runMigrations() {
		$files = glob($this->getMigrationPath() . '/*.php');

		if(!Capsule::schema()->hasTable('migrations')) {
			Capsule::schema()->create('migrations', function($table) {
				$table->string('migration');
				$table->integer('batch');
			});
		}

		$migrations = Migration::all();

		foreach ($migrations as $migration) {
			$filename = $this->getMigrationPath().'/'.$migration->migration.'.php';
			if(in_array($filename, $files)) {
				$key = array_keys($files, $filename);
				unset($files[$key[0]]);
			}
		}

		$batch = Migration::all()->max('batch') + 1;

		foreach ($files as $file) {
			require_once($file);
			$filename = basename($file, '.php');
			$class = substr($filename, 18);
			$migration = new $class;
			$migration->up();
			Migration::create(array('migration' => $filename, 'batch' => $batch));
			$this->line("<success>File \"$filename.php\" processed</success>\n");
		}
	}

	/**
	 * command migration:rollback
	 */
	private function rollbackMigrations() {

		$batch = Migration::all()->max('batch');

		$migrations = Migration::where('batch', '=', $batch)->orderBy('migration', 'desc')->get();

		foreach($migrations as $dbMigration) {
			$class = substr($dbMigration->migration, 18);
			$filename = $dbMigration->migration.'.php';
			require_once($this->getMigrationPath() . '/' . $filename);
			$migration = new $class;
			$migration->down();
			Migration::where('migration', '=', $dbMigration->migration)->where('batch', '=', $dbMigration->batch)->delete();
			$this->line("<success>File \"$filename.php\" processed</success>\n");
		}
	}

	/**
	 * prepare output lines
	 *
	 * @param string $line output
	 */
	public function line($line) {
		$line = str_replace('</info>', chr(27) . '[0m', str_replace('<info>', chr(27) . '[36m ', $line));
		$line = str_replace('</error>', chr(27) . '[0m', str_replace('<error>', chr(27) . '[31m ', $line));
		$line = str_replace('</success>', chr(27) . '[0m', str_replace('<success>', chr(27) . '[32m ', $line));
		echo $line;
	}
}
