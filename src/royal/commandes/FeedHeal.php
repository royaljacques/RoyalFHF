<?php


namespace royal\commandes;


use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;
use royal\Main;

class FeedHeal extends PluginCommand
{
    public function __construct(string $name, Main $owner)
    {
        parent::__construct($name, $owner);
        $this->setDescription("/feedheal");
        $this->setUsage("/feedheal");
        $this->setAliases(["fh"]);
        $this->setPermission("feed.heal.royal");
        $this->plugin = $owner;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if (!$this->testPermission($sender)) {
            return true;
        }
        if (!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::GOLD . "tu ne peux pas utiliser le /feedheal de la console ");
            return true;
        }
        if ($sender instanceof Player) {
            if (!$sender->hasPermission("feed.heal.royal")) {
                $sender->sendMessage("Tu n'as pas la permission de te nourrir ni de te soigner");
            } else {
                $sender->setFood(20);
                $sender->setSaturation(20);
                $sender->setHealth(20);
                $sender->sendMessage("§bTu as bien été §4nourri");
                $sender->sendMessage("§bTu as bien été §4soigné");
                return true;
            }

            return true;
        }
        return true;
    }
}