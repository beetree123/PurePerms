<?php

namespace _64FF00\PurePerms\commands;

use _64FF00\PurePerms\PurePerms;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;

use pocketmine\utils\TextFormat;

class RemoveGroup extends Command implements PluginIdentifiableCommand
{
	public function __construct(PurePerms $plugin, $name, $description)
	{
		$this->plugin = $plugin;
		
		parent::__construct($name, $description);
		
		$this->setPermission("pperms.command.rmgroup");
	}
	
	public function execute(CommandSender $sender, $label, array $args)
	{
		if(!$this->testPermission($sender))
		{
			return false;
		}
		
		if(!isset($args[0]) || count($args) > 1)
		{
			$sender->sendMessage(TextFormat::BLUE . "[PurePerms] " . $this->plugin->getMessage("cmds.removegroup.usage"));
			
			return true;
		}
		
		if($this->plugin->removeGroup($args[0]))
		{
			$sender->sendMessage(TextFormat::BLUE . "[PurePerms] " . $this->plugin->getMessage("cmds.removegroup.messages.group_removed_successfully", $args[0]));
		}
		else
		{
			$sender->sendMessage(TextFormat::RED . "[PurePerms] " . $this->plugin->getMessage("cmds.removegroup.messages.group_not_exist", $args[0]));
		}
		
		return true;
	}
	
	public function getPlugin()
	{
		return $this->plugin;
	}
}