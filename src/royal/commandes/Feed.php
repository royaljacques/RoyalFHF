<?php


namespace royal\commandes;


use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;
use royal\Main;

class Feed extends PluginCommand
{
    public function __construct(string $name, Main $owner)
    {
        parent::__construct($name, $owner);
        $this->setDescription("/feed");
        $this->setUsage("/feed");
        $this->setAliases(["fd"]);
        $this->setPermission("feed.royal");
        $this->plugin = $owner;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if (!$this->testPermission($sender)){
            return true;
        }
        if (!$sender instanceof Player){
            $sender->sendMessage(TextFormat::GOLD . "tu ne peux pas utiliser le /feed de la console ");
            return true;
        }
        if($sender instanceof Player){
            if(!$sender->hasPermission("feed.royal")) {
                $sender->sendMessage("Tu n'as pas la permission de te nourrir");
            }else{
                $sender->setFood(20);
                $sender->setSaturation(20);
                $sender->sendMessage("§bTu as bien été §4nourri");
                return true;
            }

            return true;
        }
        return true;
    }
}