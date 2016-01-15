<?php
use Acme\Worker\PheanstalkWorker;
use Acme\Worker\Job\BringMeBeer;
use Acme\Worker\Job\LetsDoCoffee;
use Pheanstalk\Pheanstalk;
use Faker\Factory;

require_once __DIR__.'/../bootstrap.php';

$queue = new PheanstalkWorker(new Pheanstalk('127.0.0.1'));
$who = Factory::create();

$coffee = new LetsDoCoffee();
$queue->put($coffee);

$beer = new BringMeBeer();
$beer->setWho($who->name);

$queue->put($beer);
