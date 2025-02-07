<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2025 pdir / digital agentur <develop@pdir.de>
 *
 * @package    contao-themes-net/mate-theme-bundle
 * @link       https://github.com/contao-themes-net/mate-theme-bundle
 * @license    pdir contao theme licence
 * @author     Mathias Arzberger <develop@pdir.de>
 * @author     Philipp Seibt <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\MateThemeBundle\EventListener;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\Security\Authentication\Token\TokenChecker;
use Contao\System;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment as TwigEnvironment;

/**
 * Taken from core-bundle/src/EventListener/PreviewToolbarListener.php.
 *
 * Injects the back end preview toolbar on any response within the /preview.php
 * entry point.
 *
 * The onKernelResponse method must be connected to the "kernel.response" event.
 *
 * The toolbar is only injected on well-formed HTML with a proper </body> tag, so
 * is never included in sub-requests or ESI requests.
 *
 * @internal
 */
#[AsEventListener]
class PreviewToolbarListener
{
    public function __construct(
        private readonly ScopeMatcher $scopeMatcher, private readonly TokenChecker $tokenChecker, private readonly TwigEnvironment $twig, private readonly RouterInterface $router, private readonly string $previewScript = '',)
    {
    }

    public function __invoke(ResponseEvent $event): void
    {
        $request = $event->getRequest();
        $response = $event->getResponse();

        // Do not capture redirects, errors, or modify XML HTTP Requests
        if (
            !$request->attributes->get('_preview', false)
            || $request->isXmlHttpRequest()
            || !$response->isSuccessful() && !$response->isClientError()
        ) {
            return;
        }

        // Do not inject the toolbar in the back end
        if ($this->scopeMatcher->isBackendMainRequest($event) || !$this->tokenChecker->hasBackendUser()) {
            return;
        }

        // Only inject the toolbar into HTML responses
        if (
            'html' !== $request->getRequestFormat()
            || !str_contains((string) $response->headers->get('Content-Type'), 'text/html')
            || false !== stripos((string) $response->headers->get('Content-Disposition'), 'attachment;')
        ) {
            return;
        }

        $this->injectToolbar($response, $request);
    }

    private function injectToolbar(Response $response, Request $request): void
    {
        $content = $response->getContent();

        // Check for existing toolbar
        $pos = strripos($content, 'id="matePreviewToolbar"');

        if (false !== $pos) {
            return;
        }

        // Injection only in fully rendered HTML
        $pos = strripos($content, '</body>');

        if (false === $pos) {
            return;
        }

        $session = System::getContainer()->get('request_stack')->getSession();

        $toolbar = $this->twig->render('@Contao_ContaoThemesNetMateThemeBundle/Frontend/preview_toolbar.html.twig', [
            'mateColor' => $session->get('mate_color'),
        ]);

        $response->setContent(substr($content, 0, $pos)."\n".$toolbar."\n".substr($content, $pos));
    }
}
