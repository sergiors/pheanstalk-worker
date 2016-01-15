<?php
namespace Acme\Worker;

use Pheanstalk\PheanstalkInterface;
use Sergiors\Worker\Worker as WorkerBase;
use Sergiors\Worker\Command\CommandInterface;

class PheanstalkWorker extends WorkerBase
{
    /**
     * @var PheanstalkInterface
     */
    protected $pheanstalk;

    public function __construct(PheanstalkInterface $pheanstalk)
    {
        $this->pheanstalk = $pheanstalk;
        parent::__construct();
    }

    public function put(CommandInterface $command)
    {
        $this->pheanstalk->put(serialize($command));
    }

    public function run(\Closure $callable)
    {
        $queue = $this->pheanstalk;

        while ($job = $queue->reserve()) {
            $command = unserialize($job->getData());

            if (false === $command instanceof CommandInterface) {
                continue;
            }

            $queue->delete($job);
            call_user_func($callable, $command);
        }
    }
}
