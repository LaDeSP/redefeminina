<?php

namespace App\Action;

use App\Domain\User\Data\UserCreateData;
use App\Domain\User\Service\UserCreator;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

/**
 * Action
 */
final class UserCreateAction
{
	/**
	 * @var UserCreator - a service for creating users
	 */
    private $userCreator;
	
	//Receiving an UserCreator instance by injection
    public function __construct(UserCreator $userCreator)
    {
        $this->userCreator = $userCreator;
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {
		$userId = $this->userCreator->create();
		
        // Transform the result into the JSON representation
        $result = [
            'user_id' => $userId
        ];

        // Build the HTTP response
        return $response->withJson($result)->withStatus(201);
    }
}

