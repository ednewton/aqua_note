<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GenusController
{
    /**
     * @Route("/genus/{genusName}")
     * @param string $genusName
     *
     * @return Response
     */
    public function showAction(string $genusName): Response
    {
        return new Response('The genus ' . $genusName);
    }
}
