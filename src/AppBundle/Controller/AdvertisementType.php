<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Annonce;

class AdvertisementType extends Controller
{

    /**
     * @Route("/annonce/create")
     */
    public function create(Request $request) {

        $annonce = new Annonce();

        $form = $this->createFormBuilder(
                $annonce,
                array(
                    'method' => 'POST'
                )
            )
            -> add(
                'title',
                TextType::class,
                array(
                    'label' => 'Le titre de l\'annonce',
                    'attr' => array(
                        'placeholder' => 'Titre'
                    )
                )
            )
            -> add(
                'price',
                NumberType::class,
                array(
                    'label' => 'Le prix de l\'annonce',
                    'attr' => array(
                        'placeholder' => 'Prix'
                    )
                )
            )
            -> add(
                'content',
                TextareaType::class,
                array(
                    'label' => 'Contenu',
                    'attr' => array(
                        'placeholder' => 'Contenu'
                    )
                )
            )
            -> add(
                'zipcode',
                TextType::class,
                array(
                    'label' => 'Le Code Postal',
                    'attr' => array(
                        'placeholder' => 'Code Postal'
                    )
                )
            )
            -> add(
                'categorie',
                EntityType::class,
                array(
                    'class' => 'AppBundle:Categorie',
                    'label' => 'Categorie',
                    'choice_label' => function ($categorie) {
                        return $categorie->getNom();
                    }
                )
            )
            ->add(
                'save',
                SubmitType::class,
                array(
                    'label' => 'Valider',
                )
            )
            ->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $annonce = $form->getData();


            $entityManager->persist($annonce);
            $entityManager->flush();


            return $this->render(
                'new.html.twig',
                array(
                    'form' => $form->createView(),
                )
            );
            // return to -> annonce;
        } else {
            return $this->render(
                'new.html.twig',
                array(
                    'form' => $form->createView(),
                )
            );
        }
    }
}