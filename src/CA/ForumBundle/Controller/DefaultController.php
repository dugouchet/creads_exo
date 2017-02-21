<?php

namespace CA\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	public  function likeArticleAction(Request $request)
	{
		
	}
	public function articlesAction(Request $request)
	{
		$em =$this->getDoctrine()->getManager();
		$listArticles= $em->getRepository('CAForumBundle:Article')->findAll();
		
		return $this->render('CAForumBundle:Default:articles.html.twig',array( 'listArticles' => $listArticles));
	}
    public function indexAction(Request $request)
    {
    	// gere la connection
    	$session = $request->getSession();
    	
    	$authErrorKey = Security::AUTHENTICATION_ERROR;
    	$lastUsernameKey = Security::LAST_USERNAME;
    	
    	// get the error if any (works with forward and redirect -- see below)
    	if ($request->attributes->has($authErrorKey)) {
    		$error = $request->attributes->get($authErrorKey);
    	} elseif (null !== $session && $session->has($authErrorKey)) {
    		$error = $session->get($authErrorKey);
    		$session->remove($authErrorKey);
    	} else {
    		$error = null;
    	}
    	
    	if (!$error instanceof AuthenticationException) {
    		$error = null; 
    	}
    	
    	// last username entered by the user
    	$lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);
    	
    	$csrfToken = $this->has('security.csrf.token_manager') ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue(): null;
    	
    	//add cache
    	return $this->render('CAForumBundle:Default:index.html.twig',array('last_username' => $lastUsername,'error' => $error,'csrf_token' => $csrfToken));

    }
}
