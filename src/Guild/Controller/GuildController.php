<?php
/**
 * @copyright Copyright (c) Ares (https://www.ares.to)
 *
 * @see LICENSE (MIT)
 */

namespace Ares\Guild\Controller;

use Ares\Framework\Controller\BaseController;
use Ares\Framework\Exception\DataObjectManagerException;
use Ares\Framework\Exception\NoSuchEntityException;
use Ares\Guild\Entity\Guild;
use Ares\Guild\Repository\GuildMemberRepository;
use Ares\Guild\Repository\GuildRepository;
use Ares\Framework\Mapping\Annotation as AR;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class GuildController
 *
 * @AR\Router
 * @AR\Group(
 *     prefix="guilds",
 *     pattern="guilds",
 * )
 *
 * @package Ares\Guild\Controller
 */
class GuildController extends BaseController
{
    /**
     * GuildController constructor.
     *
     * @param   GuildRepository         $guildRepository
     * @param   GuildMemberRepository   $guildMemberRepository
     */
    public function __construct(
        private readonly GuildRepository $guildRepository,
        private readonly GuildMemberRepository $guildMemberRepository
    ) {}

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return Response
     * @throws DataObjectManagerException
     * @throws NoSuchEntityException
     */
    public function guild(Request $request, Response $response, array $args): Response
    {
        /** @var int $id */
        $id = $args['id'];

        /** @var Guild $guild */
        $guild = $this->guildRepository->getGuild($id);

        return $this->respond(
            $response,
            response()
                ->setData($guild)
        );
    }

    /**
     * @AR\Route(
     *     methods={"GET"},
     *     placeholders={"page": "[0-9]+","rpp": "[0-9]+"},
     *     pattern="/list/{page}/{rpp}"
     * )
     *
     * @param Request $request
     * @param Response $response
     *
     * @param array $args
     *
     * @return Response
     * @throws DataObjectManagerException
     */
    public function list(Request $request, Response $response, array $args): Response
    {
        /** @var int $page */
        $page = $args['page'];

        /** @var int $resultPerPage */
        $resultPerPage = $args['rpp'];

        $guilds = $this->guildRepository
            ->getPaginatedGuildList(
                $page,
                $resultPerPage
            );

        return $this->respond(
            $response,
            response()
                ->setData($guilds)
        );
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @param array    $args
     *
     * @return Response
     * @throws DataObjectManagerException
     */
    public function members(Request $request, Response $response, array $args): Response
    {
        /** @var int $guildId */
        $guildId = $args['guild_id'];

        /** @var int $page */
        $page = $args['page'];

        /** @var int $resultPerPage */
        $resultPerPage = $args['rpp'];

        $members = $this->guildMemberRepository
            ->getPaginatedGuildMembers(
                $guildId,
                $page,
                $resultPerPage
            );

        return $this->respond(
            $response,
            response()
                ->setData($members)
        );
    }

    /**
     *
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     * @throws NoSuchEntityException
     */
    public function mostMembers(Request $request, Response $response): Response
    {
        /** @var Guild $guild */
        $guild = $this->guildRepository->getMostMemberGuild();

        return $this->respond(
            $response,
            response()
                ->setData($guild)
        );
    }
}
