<?php

namespace _64FF00\PurePerms\commands;

use _64FF00\PurePerms\PurePerms;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;

use pocketmine\utils\TextFormat;

class UnsetUPerm extends Command implements PluginIdentifiableCommand
{
	public function __construct(PurePerms $plugin, $name, $description)
	{
		$this->plugin = $plugin;
		
		parent::__construct($name, $description);
		
		$this->setPermission("pperms.command.unsetuperm");
	}
	
	public function execute(CommandSender $sender, $label, array $args)
	{
		if(!$this->testPermission($sender))
		{
			return false;
		}
		
		if(count($args) < 2 || count($args) > 3)
		{
			$sender->sendMessage(TextFormat::BLUE . "[PurePerms] " . $this->plugin->getMessage("cmds.unsetuperm.usage"));
			
			return true;
		}
		
		$player = $this->plugin->getPlayer($args[0]);
		
		$permission = $args[1];
		
		$levelName = isset($args[2]) ?  $this->plugin->getServer()->getLevelByName($args[2])->getName() : null;
		
		$this->plugin->getUser($player)->unsetUserPermission($permission, $levelName);
		
		$sender->sendMessage(TextFormat::BLUE . "[PurePerms] " . $this->plugin->getMessage("cmds.unsetuperm.messages.uperm_removed_successfully", $permission, $player->getName()));
		
		return true;
	}
	
	public function getPlugin()
	{
		return $this->plugin;
	}
}