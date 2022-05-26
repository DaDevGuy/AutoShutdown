<?php
declare(strict_types=1);

namespace AutoRestart\DaDevGuy;
use AutoRestart\DaDevGuy\Tasks\RestartTask;
use pocketmine\plugin\PluginBase;

class AutoRestart extends PluginBase{

	/** @var self $instance */
	private static $instance;

	public function onEnable() : void{
		self::$instance = $this;
		$this->saveDefaultConfig();
		$this->getScheduler()->scheduleRepeatingTask(new RestartTask(), 20);
	}

	public static function getInstance() : self{
		return self::$instance;
	}
}