<?php

namespace CA\ForumBundle\EventListner;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use FOS\UserBundle\FOSUserEvents;


class RegistrationConfirmedListner implements EventSubscriberInterface
{
	private $router;

	public function __construct(UrlGeneratorInterface $router)
	{
		$this->router = $router;
	}

	/**
	 * {@inheritDoc}
	 */
	public static function getSubscribedEvents()
	{
		return array(
				FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationConfirm'
		);
	}

	public function onRegistrationConfirm(\FOS\UserBundle\Event\FormEvent $event)
	{
		$url = $this->router->generate('ca_forum_articles');

		$event->setResponse(new RedirectResponse($url));
	}
}