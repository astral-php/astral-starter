<section class="nova-container" style="padding:2rem 0 3rem;max-width:920px;margin:0 auto">
    <p class="eyebrow" style="margin:0 0 0.75rem;color:var(--nova-text-muted,#64746b);font-size:.85rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase">Test local · hors roadmap</p>
    <h1 class="nova-heading" style="margin:0 0 0.75rem">Galerie Template Nova</h1>
    <p class="nova-text-muted" style="margin:0 0 1.75rem;max-width:40rem;line-height:1.55">
        Parcours de contrôle des <strong>layouts</strong> et <strong>partials</strong> <code>astral-template-nova</code>
        avec le thème <strong>nova:green</strong>.
    </p>

    <div class="nova-stack" style="gap:1rem">
        <article class="nova-card" style="padding:1.25rem 1.4rem">
            <h2 style="margin:0 0 .4rem;font-size:1.15rem">Nova Lab (packages)</h2>
            <p class="nova-text-muted" style="margin:0 0 1rem">
                Le playground design system est l’app
                <code>astral-nova-playground</code> (hors produit Starter).
            </p>
            <div style="display:flex;flex-wrap:wrap;gap:.6rem">
                <a class="nova-btn nova-btn-primary" href="http://astral-nova-playground.local/" target="_blank" rel="noopener">Nova Playground →</a>
                <a class="nova-btn nova-btn-outline" href="/">Accueil Starter</a>
            </div>
        </article>

        <article class="nova-card" style="padding:1.25rem 1.4rem">
            <h2 style="margin:0 0 .4rem;font-size:1.15rem">Partials</h2>
            <p class="nova-text-muted" style="margin:0 0 1rem">alert, breadcrumb, empty-state, page-header, table, sidebar, user-menu, theme-switcher, flash, error-page, field, field-error, pagination</p>
            <a class="nova-btn nova-btn-primary" href="/nova-templates/partials">Ouvrir la galerie partials →</a>
        </article>

        <article class="nova-card" style="padding:1.25rem 1.4rem">
            <h2 style="margin:0 0 .4rem;font-size:1.15rem">Layouts package</h2>
            <p class="nova-text-muted" style="margin:0 0 1rem">Prévisualisations standalone (hors layout <code>main</code> de l’app).</p>
            <div class="nova-cluster">
                <a class="nova-btn nova-btn-secondary" href="/nova-templates/layout/admin">layout/admin</a>
                <a class="nova-btn nova-btn-secondary" href="/nova-templates/layout/auth">layout/auth</a>
                <a class="nova-btn nova-btn-secondary" href="/nova-templates/layout/marketing">layout/marketing</a>
            </div>
        </article>

        <article class="nova-card" style="padding:1.25rem 1.4rem">
            <h2 style="margin:0 0 .4rem;font-size:1.15rem">Vues métier Starter (Nova CSS)</h2>
            <p class="nova-text-muted" style="margin:0 0 1rem">Pages app migrées — vérifier au fil du parcours auth / profil / admin.</p>
            <div class="nova-cluster">
                <a class="nova-btn nova-btn-outline" href="/login">Login</a>
                <a class="nova-btn nova-btn-outline" href="/register">Register</a>
                <a class="nova-btn nova-btn-outline" href="/forgot-password">Forgot</a>
                <a class="nova-btn nova-btn-outline" href="/profile">Profil*</a>
                <a class="nova-btn nova-btn-outline" href="/users">Users*</a>
                <a class="nova-btn nova-btn-outline" href="/admin/users">Admin*</a>
            </div>
            <p class="nova-text-muted" style="margin:1rem 0 0;font-size:.85rem">* nécessite authentification / rôle admin</p>
        </article>

        <article class="nova-card" style="padding:1.25rem 1.4rem">
            <h2 style="margin:0 0 .4rem;font-size:1.15rem">Pages d’erreur</h2>
            <p class="nova-text-muted" style="margin:0 0 1rem">Partial <code>feedback/error-page</code> (si dispatch Core actif).</p>
            <div class="nova-cluster">
                <a class="nova-btn nova-btn-outline" href="/nova-templates/errors/403">403</a>
                <a class="nova-btn nova-btn-outline" href="/nova-templates/errors/404">404</a>
                <a class="nova-btn nova-btn-outline" href="/nova-templates/errors/500">500</a>
                <a class="nova-btn nova-btn-outline" href="/nova-templates/errors/503">503</a>
            </div>
        </article>
    </div>
</section>
