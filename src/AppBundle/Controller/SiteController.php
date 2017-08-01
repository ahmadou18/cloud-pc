<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        // replace this example code with whatever you need
        return $this->render('blog/blog.html.twig');
    }


    /**
         * @Route("/blog/create", name="create_blog_post")
     */
    public function createAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('blog/create.html.twig');
    }

    /**
     * @Route("/blog/details/{$id}", name="details_blog_post")
     */
    public function DetailsAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('blog/details.html.twig');
    }

    /**
     * @Route("/blog/edit/{id}", name="edit_blog_post")
     */
    public function editAction($id, Request $request )
    {
        // replace this example code with whatever you need
        return $this->render('blog/edit.html.twig');
    }
}
