<?php

namespace org\projecttl\plugin\test;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;


class TestPlugin extends PluginBase implements CommandExecutor {

    public function onLoad() {
        $this->getLogger()->info(TextFormat::GOLD, "Plugin is now loading...");
    }

    public function onEnable() {
        $this->getLogger()->info(TextFormat::GREEN, "Plugin is enabled.");
        $this->getCommand("test")->execute($this::onCommand());
    }

    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED, "Plugin is disabled.");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (sender instanceof Player) {
            if ($command->getName() == "test") {
                if ($args.length == 0) {
                    $sender->sendMessage("Hello!");
                    return true;
                }
            }
        }

        return false;
    }
}