<?php
namespace Acme\Worker\Job;

use Sergiors\Worker\Command\Command;

class BringMeBeer extends Command
{
    protected $who;

    public function setWho($who)
    {
        $this->who = $who;
    }

    public function execute()
    {
        echo "hey {$this->who}! go get me a beer\n";
    }
}
