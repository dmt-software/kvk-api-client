<?php

namespace DMT\KvK\Api;

use DMT\KvK\Api\Command\CommandInterface;
use DMT\Kvk\Api\Model\ResultData;
use League\Tactician\CommandBus;

class Client
{
    /** @var CommandBus */
    protected $commandBus;

    /**
     * Client constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * Execute the command
     *
     * @param CommandInterface $command
     * @return ResultData
     */
    public function execute(CommandInterface $command): ResultData
    {
        return $this->commandBus->handle($command);
    }
}