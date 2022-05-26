<?php
declare(strict_types=1);

namespace AutoRestart\DaDevGuy\Tasks;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;
use AutoRestart\DaDevGuy\AutoRestart;

class RestartTask extends Task{

	/** @var int $seconds */
	private $seconds = 0;

	public function onRun(): void
	{
		$this->seconds++;
		$time = intval(AutoRestart::getInstance()->getConfig()->get("restart-time")) * 60;
		$restartTime = $time - $this->seconds;
		switch($restartTime){
			case 100:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 2 minutes");
				return;
			case 50:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 1 minute");
				return;
			case 25:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 30 seconds");
				return;
			case 10:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 10 seconds");
				return;
			case 5:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 5 seconds");
				return;
			case 4:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 4 seconds");
				return;
			case 3:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 3 seconds");
				return;
			case 2:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 2 seconds");
				return;
			case 1:
				AutoRestart::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 1 second");
				return;
			case 0:
				foreach(AutoRestart::getInstance()->getServer()->getOnlinePlayers() as $player) $player->kick(strval(AutoRestart::getInstance()->getConfig()->get("restart-message")));
				AutoRestart::getInstance()->getServer()->shutdown();
				return;
		}
	}		
}