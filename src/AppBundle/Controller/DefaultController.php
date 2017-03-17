<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/todos", name="homepage")
     */
    public function todosAction(Request $request)
    {
        $todoRepository = $this->getDoctrine()->getRepository('AppBundle:Todo');
        $todos = $todoRepository->findAll();

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $json = $serializer->serialize($todos, 'json');
        $response = new Response($json);

        return $response;
    }

    /**
     * @Route("/posttodos", name="homepage")
     */
    public function posttodosAction(Request $request)
    {
        $todoRepository = $this->getDoctrine()->getRepository('AppBundle:Todo');
        $todos = $todoRepository->findAll();

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $json = $serializer->serialize($todos, 'json');
        $response = new Response($json);


    }
}
