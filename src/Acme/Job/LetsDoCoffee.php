<?php
namespace Acme\Worker\Job;

use Sergiors\Worker\Command\Command;

class LetsDoCoffee extends Command
{
    public function execute()
    {
        sleep(2);
        echo "Let's do more coffee now!\n";
    }
}
