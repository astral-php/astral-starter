<?php

declare(strict_types=1);

namespace App\Controllers;

use Astral\TemplateNova\Template;
use Controller\AbstractController;
use Core\Http\Response;
use Core\View;

/**
 * Galerie de test — layouts et partials astral-template-nova (hors roadmap).
 */
final class NovaTemplatesController extends AbstractController
{
    public function __construct(View $view)
    {
        parent::__construct($view);
    }

    public function index(): Response
    {
        return $this->render('nova/templates-index', [
            'title' => 'Galerie Template Nova',
        ]);
    }

    public function partials(): Response
    {
        return $this->render('nova/partials-gallery', [
            'title' => 'Partials Template Nova',
        ]);
    }

    public function layoutAdmin(): Response
    {
        $content = Template::partial('page-header', [
            'heading'     => 'Layout admin',
            'subtitle'    => 'Prévisualisation du shell admin Template Nova',
            'actionHref'  => '/nova-templates',
            'actionLabel' => 'Retour galerie',
        ]) . Template::partial('table', [
            'headers' => ['Utilisateur', 'Rôle', 'Statut'],
            'rows'    => [
                ['Alice', 'Admin', 'Actif'],
                ['Bob', 'User', 'Actif'],
            ],
        ]);

        return $this->rawLayout('admin', [
            'title'         => 'Admin preview',
            'brand'         => 'Astral Starter',
            'theme'         => 'green',
            'mode'          => 'light',
            'novaCss'       => '/assets/nova/nova.css',
            'novaJs'        => '/assets/nova/nova.js',
            'userName'      => 'Demo Admin',
            'userMenuHref'  => '/profile',
            'adminNav'      => [
                ['href' => '/nova-templates', 'label' => 'Galerie', 'active' => false],
                ['href' => '/nova-templates/layout/admin', 'label' => 'Admin', 'active' => true],
                ['href' => '/admin/users', 'label' => 'Utilisateurs', 'active' => false],
            ],
            'content'       => $content,
            'sidebarFooter' => 'Template Nova · green',
        ]);
    }

    public function layoutAuth(): Response
    {
        $inner = '<p class="nova-text-muted">Prévisualisation du layout <code>auth</code>.</p>'
            . '<p><a class="nova-btn nova-btn-primary" href="/nova-templates">Retour galerie</a></p>';

        return $this->rawLayout('auth', [
            'title'   => 'Auth preview',
            'brand'   => 'Astral Starter',
            'theme'   => 'green',
            'mode'    => 'light',
            'novaCss' => '/assets/nova/nova.css',
            'content' => $inner,
        ]);
    }

    public function errorPreview(string $code): Response
    {
        $map = [
            '403' => 'errors/403',
            '404' => 'errors/404',
            '500' => 'errors/500',
            '503' => 'errors/503',
        ];
        if (!isset($map[$code])) {
            return new Response('Unknown error preview', 404);
        }

        return $this->render($map[$code], [
            'title' => 'Erreur ' . $code,
        ]);
    }

    public function layoutMarketing(): Response
    {
        $content = Template::partial('page-header', [
            'heading'  => 'Layout marketing',
            'subtitle' => 'Prévisualisation Template Nova',
        ]) . '<p class="nova-text-muted">Contenu marketing de démonstration.</p>'
            . '<p><a class="nova-btn nova-btn-primary" href="/nova-templates">Retour galerie</a></p>';

        return $this->rawLayout('marketing', [
            'title'        => 'Marketing preview',
            'brand'        => 'Astral Starter',
            'theme'        => 'green',
            'mode'         => 'light',
            'novaCss'      => '/assets/nova/nova.css',
            'marketingNav' => [
                ['href' => '/', 'label' => 'Accueil'],
                ['href' => '/nova-templates', 'label' => 'Galerie'],
                ['href' => '/docs', 'label' => 'Docs'],
            ],
            'content'      => $content,
            'footer'       => 'Astral Starter Nova · test local',
        ]);
    }

    /** @param array<string, mixed> $data */
    private function rawLayout(string $layout, array $data): Response
    {
        $file = Template::layoutPath($layout);
        extract($data, EXTR_SKIP);
        ob_start();
        require $file;
        $html = (string) ob_get_clean();

        return new Response($html, 200, ['Content-Type' => 'text/html; charset=UTF-8']);
    }
}
