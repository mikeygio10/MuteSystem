<?php

namespace mutesystem\permission;

use DateTime;
use InvalidArgumentException;
use pocketmine\permission\BanEntry;
use pocketmine\permission\BanList;

class MuteList extends BanList {
    
    public function add(BanEntry $entry) {
        if ($entry instanceof MuteEntry) {
            throw new InvalidArgumentException();
        }
        parent::add($entry);
    }
    
    /**
     * 
     * @param string $target
     * @param string $reason
     * @param \DateTime $expires
     * @param string $source
     */
    public function addBan(string $target, string $reason = null, \DateTime $expires = null, string $source = null) : BanEntry{
        $entry = new MuteEntry($target);
        $entry->setSource($source ?? $entry->getSource());
        $entry->setExpires($expires);
        $entry->setReason($reason ?? $entry->getReason());
        parent::addBan($entry->getName(), $entry->getReason(), $entry->getExpires(), $entry->getSource());
    }
}
