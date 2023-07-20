<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Advert;
use App\Enum\AdvertFilter;
use App\Exception\AdvertSearchUnauthorizedParamException;
use App\Repository\AdvertRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class AdvertSearchAction extends AbstractController
{
    public function __construct(private AdvertRepository $advertRepository, private LoggerInterface $logger)
    {
    }

    /**
     * @return Advert[]
     */
    public function __invoke(Request $request): array
    {
        $params = $request->query->all();

        if ($this->isContainsInvalidParam(array_keys($params))) {
            throw new AdvertSearchUnauthorizedParamException('At least one invalid query param');
        }

        return $this->advertRepository->findByApiSearchParams($params);
    }

    /**
     * @param array<string> $queryParams
     */
    private function isContainsInvalidParam(array $queryParams): bool
    {
        $unwanted = array_diff(array_keys($queryParams), AdvertFilter::getAllowedQueryParams());

        return empty($unwanted);
    }
}
