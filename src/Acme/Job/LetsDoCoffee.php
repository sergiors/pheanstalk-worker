<?php
namespace Acme\Worker\Job;

use Sergiors\Worker\Command\CommandInterface;

class LetsDoCoffee implements CommandInterface
{
    public function execute()
    {
        sleep(2);
        echo "Let's do more coffee now!\n";
    }
}
