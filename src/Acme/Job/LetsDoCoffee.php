<?php
namespace Acme\Worker\Job;

use Sergiors\Worker\Command\AbstractCommand;

class LetsDoCoffee extends AbstractCommand
{
    public function execute()
    {
        sleep(2);
        echo "Let's do more coffee now!\n";
    }
}
