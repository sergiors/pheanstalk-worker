<?php
namespace Acme\Worker\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimple\Container;
use Sergiors\Worker\Command\Invoker;
use Sergiors\Worker\Command\CommandInterface;

class DaemoniseCommand extends Command
{
    /**
     * @var Container $container
     */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('daemon:daemonise')
            ->setDescription('Starts the daemon to run commands.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $invoker = new Invoker($this->container);
        $worker = $this->container['worker']();

        $output->writeln('<info>Instance Hash</info>: '.$worker->getInstanceHash());

        $worker->run(function (CommandInterface $command) use ($invoker, $output) {
            $now = (new \DateTime())->format('d/m/Y H:i:s');
            $output->write("<comment>$now</comment>: ");

            $invoker->setCommand($command);
            $invoker->run();
        });
    }
}
