<?php

namespace Concrete\Core\Authentication\Type\Community\Factory;

use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Url\Resolver\Manager\ResolverManagerInterface;
use League\Url\UrlInterface;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Storage\SymfonySession;
use OAuth\ServiceFactory;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class CommunityServiceFactory
 * A simple factory class for creating community authentication services
 *
 * @package Concrete\Core\Authentication\Type\Community\Factory
 */
class CommunityServiceFactory
{

    /**
     * @var \Concrete\Core\Config\Repository\Repository
     */
    protected $config;

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    /**
     * @var \Concrete\Core\Url\Resolver\Manager\ResolverManagerInterface
     */
    protected $urlResolver;

    /**
     * CommunityServiceFactory constructor.
     * @param \Concrete\Core\Config\Repository\Repository $config
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     * @param \Concrete\Core\Url\Resolver\Manager\ResolverManagerInterface $url
     */
    public function __construct(Repository $config, Session $session, ResolverManagerInterface $url)
    {
        $this->config = $config;
        $this->session = $session;
        $this->urlResolver = $url;
    }

    /**
     * Create a service object given a ServiceFactory object
     *
     * @param \OAuth\ServiceFactory $factory
     * @return \OAuth\Common\Service\ServiceInterface
     */
    public function createService(ServiceFactory $factory)
    {
        $appId = $this->config->get('auth.community.appid');
        $appSecret = $this->config->get('auth.community.secret');

        // Get the callback url
        $callbackUrl = $this->urlResolver->resolve(['/ccm/system/authentication/oauth2/community/callback/']);

        // Create a credential object with our ID, Secret, and callback url
        $credentials = new Credentials($appId, $appSecret, (string) $callbackUrl);

        // Create a new session storage object and pass it the active session
        $storage = new SymfonySession($this->session, false);

        // Create the service using the oauth service factory
        return $factory->createService('community', $credentials, $storage);
    }

}

