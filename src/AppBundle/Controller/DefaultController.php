<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/personnes", name="app_personnes")
     */
    public function chargerPersonnes() {
        $configDir = array('../var');
        $fileLocator = new FileLocator($configDir);
        $ymlPersonnesFiles = $fileLocator->locate('persons.yml', null, false);

        $configYml = Yaml::parse(file_get_contents($ymlPersonnesFiles[0], false, null));

        return $this->render('base.html.twig', [
            'personnes' => $configYml
        ]);
    }
}
