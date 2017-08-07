<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
use AppBundle\Entity\User;
//use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class SiteController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        // replace this example code with whatever you need
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/blog", name="blog_post")
     */
    public function BlogAction()
    {
        $blogposts = $this -> getDoctrine()
            ->getRepository('AppBundle:BlogPost')
            ->findAll();
        // replace this example code with whatever you need
        return $this->render('blog/blog.html.twig', array(
            'blogpost' => $blogposts,
            ));
    }


    /**
         * @Route("/blog/create", name="create_blog_post")
     */
    public function createAction(Request $request)
    {
        $blogposts = new BlogPost;

        $form = $this -> createFormBuilder($blogposts)
        ->add('title', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('description', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('body', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('submit', SubmitType::class, array('attr' => array('class' => 'btn btn-default', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            //récupérer les données
            $title= $form['title']->getData();
            $description = $form['description']->getData();
            $body = $form['description']->getData();

            $blogposts->setTitle($title);
            $blogposts->setDescription($description);
            $blogposts->setBody($body);

            $em = $this->getDoctrine()->getManager();
            $em->persist($blogposts);
            $em->flush();

            return $this->redirectToRoute('blog_post');
        }

        // replace this example code with whatever you need

            return $this->render('blog/create.html.twig', array(
                'form' => $form -> createView()
            ));



    }

    /**
     * @Route("/blog/details/{id}", name="details_blog_post")
     */
    public function DetailsAction($id)
    {
       $blogposts = $this -> getDoctrine()


            ->getRepository('AppBundle:BlogPost')
            ->find($id);



        // replace this example code with whatever you need
        return $this->render('blog/details.html.twig',array(
            'blogpost'=> $blogposts,
            'userid' => $userid =  $this->getUser()->getId(),
        ));
    }

    /**
     * @Route("/blog/edit/{id}", name="edit_blog_post")
     */
    public function editAction($id, Request $request )
    {

        return $this->render('blog/edit.html.twig');
    }
}
