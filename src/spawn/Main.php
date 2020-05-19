<?php

namespace spawn;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\level\Position;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
  
  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
    $this->getLogger()->info("Plugin Enabled");
    $this->saveDefaultConfig();
    $this->reloadConfig();
    }
  
  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
    if($cmd->getName() == "spawn") {
      if(!$sender instanceof Player) {
        $world = $this->getConfig()->get("spawn-world");
        $sender->teleport($this->getServer()->getLevelbyName($world)->getSafeSpawn());
      } else {
      $player->sendMessage("Use this command in-game.");
      }
    }
    return true;
  }
  
}
