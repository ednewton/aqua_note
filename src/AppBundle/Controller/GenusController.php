<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Entity\Genus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus")
     * @return Response|null
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $genuses = $em->getRepository(Genus::class)
            ->findAll();

        return $this->render('genus/list.html.twig', ['genuses' => $genuses]);
    }

    /**
     * @Route("/genus/new")
     */
    public function newAction()
    {
        $genus = new Genus();
        $name = 'Octopus' . rand(1, 100);
        $genus->setName($name);
        $genus->setSubFamily('Octopodinae');
        $genus->setSpeciesCount(rand(100, 9999));

        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->flush();

        return new Response('<html><body>Genus ' . $name . ' created!</body></html>');
    }

    /**
     * @Route("/genus/{genusName}", name="genus_show")
     * @param string $genusName
     *
     * @return Response
     */
    public function showAction(string $genusName): Response
    {
        $em = $this->getDoctrine()->getManager();

        $genus = $em->getRepository(Genus::class)
            ->findOneBy(['name' => $genusName]);

        if (!$genus) {
            throw $this->createNotFoundException('genus not found');
        }

//        $key = md5($funFact);
//        $cache = $this->get('doctrine_cache.providers.my_markdown_cache');
//        if ($cache->contains($key)) {
//            $funFact = $cache->fetch($key);
//        } else {
//            sleep(1);
//            $funFact = $this->get('markdown.parser')
//                ->transform($funFact);
//            $cache->save($key, $funFact);
//        }

        return $this->render(
            'genus/show.html.twig',
            ['genus' => $genus]
        );
    }

    /**
     * @Route("/genus/{genusName}/notes", name="genus_show_notes")
     * @Method("GET")
     */
    public function getNotesAction()
    {
        $notes = [
            [
                'id' => 1,
                'username' => 'AquaPelham',
                'avatarUri' => '/images/leanna.jpeg',
                'note' => 'Octopus asked me a riddle, outsmarted me',
                'date' => 'Dec. 10, 2015'
            ],
            [
                'id' => 2,
                'username' => 'AquaWeaver',
                'avatarUri' => '/images/ryan.jpeg',
                'note' => 'I counted 8 legs... as they wrapped around me',
                'date' => 'Dec. 1, 2015'
            ],
            [
                'id' => 3,
                'username' => 'AquaPelham',
                'avatarUri' => '/images/leanna.jpeg',
                'note' => 'Inked!',
                'date' => 'Aug. 20, 2015'
            ],
        ];

        $data = [
            'notes' => $notes,
        ];

        return new JsonResponse($data);
    }
}
