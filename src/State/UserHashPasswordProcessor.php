<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\User;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsDecorator('api_platform.doctrine.orm.state.persist_processor')]
class UserHashPasswordProcessor implements ProcessorInterface
{
    public function __construct(private ProcessorInterface $decorated, private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        if ($data instanceof User && $data->getPassword()) {
            $data->setPassword($this->userPasswordHasher->hashPassword($data, $data->getPassword()));
        }
        $this->decorated->process($data, $operation, $uriVariables, $context);
    }
}
