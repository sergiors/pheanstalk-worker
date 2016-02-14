<?php
namespace Acme\Worker\Job;

use Sergiors\Worker\Command\CommandInterface;

class BringMeBeer implements CommandInterface
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
