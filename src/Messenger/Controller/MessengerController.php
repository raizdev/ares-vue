<?php
/**
 * @copyright Copyright (c) Ares (https://www.ares.to)
 *
 * @see LICENSE (MIT)
 */

namespace Ares\Messenger\Controller;

use Ares\Framework\Mapping\Annotation as AR;
use Ares\Framework\Controller\BaseController;
use Ares\Framework\Exception\AuthenticationException;
use Ares\Framework\Exception\DataObjectManagerException;
use Ares\Framework\Exception\NoSuchEntityException;
use Ares\Messenger\Repository\MessengerRepository;
use Ares\User\Entity\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class MessengerController
 *
 * @AR\Router
 * @AR\Group(
 *     prefix="friends",
 *     pattern="friends"
 * )
 *
 * @package Ares\Messenger\Controller
 */
class MessengerController extends BaseController
{
    /**
     * MessengerController constructor.
     *
     * @param MessengerRepository $messengerRepository
     */
    public function __construct(
        private readonly MessengerRepository $messengerRepository
    ) {}

    /**
     * @AR\Route(
     *     methods={"GET"},
     *     placeholders={"page": "[0-9]+", "rpp": "[0-9]+"},
     *     pattern="/list/{page}/{rpp}"
     * )
     *
     * @param Request  $request
     * @param Response $response
     *
     * @param array    $args
     *
     * @return Response
     * @throws AuthenticationException
     * @throws DataObjectManagerException
     * @throws NoSuchEntityException
     */
    public function friends(Request $request, Response $response, array $args): Response
    {
        /** @var int $page */
        $page = $args['page'];

        /** @var int $resultPerPage */
        $resultPerPage = $args['rpp'];

        /** @var User $user */
        $user = user($request);

        $friends = $this->messengerRepository
            ->getPaginatedMessengerFriends(
                $user->getId(),
                $page,
                $resultPerPage
            );

        return $this->respond(
            $response,
            response()
                ->setData($friends)
        );
    }
}
