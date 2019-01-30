<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Annonce;

class AdvertisementType extends Controller
{

    /**
     * @Route("/creer_annonce") 
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
                TextType::class,
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
                TextType::class,
                array(
                    'label' => 'Categorie',
                    'attr' => array(
                        'placeholder' => 'La catégorie'
                    )
                )
            )
            ->add(
                'Valider',
                SubmitType::class,
                array(
                    'label' => 'Valider',
                )
            )
            ->getForm();

        $entityManager = $this->getDoctrine()->getManager();


        if ($form->isSubmitted() && $form->isValid()) {
            $annonce = $form->getData();

            $entityManager->persist($annonce);
            $entityManager->flush();

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