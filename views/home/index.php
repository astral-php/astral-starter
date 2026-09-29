<section style="padding: 2.5rem 0 1rem">
    <p style="font-size:0.8rem;letter-spacing:0.08em;text-transform:uppercase;color:var(--muted);margin:0 0 0.75rem">
        Application from scratch · v<?= htmlspecialchars((string) $version, ENT_QUOTES, 'UTF-8') ?>
    </p>
    <h1 style="font-family:Fraunces,Georgia,serif;font-size:clamp(2rem,5vw,2.75rem);line-height:1.15;margin:0 0 1rem">
        Astral Starter
    </h1>
    <p style="font-size:1.1rem;color:var(--muted);max-width:36rem;line-height:1.55;margin:0 0 1.75rem">
        Base vierge pour votre métier et votre design.
        Auth, admin utilisateurs, et le moteur <strong style="color:var(--ink)">astral-core</strong> — rien de plus.
    </p>

    <div style="display:flex;flex-wrap:wrap;gap:0.75rem;margin-bottom:2.5rem">
        <?php if (empty($hasUsers)): ?>
            <a class="btn btn-primary" href="/register">Créer le compte admin</a>
        <?php elseif (!$auth->check()): ?>
            <a class="btn btn-primary" href="/login">Se connecter</a>
            <a class="btn btn-ghost" href="/register">S’inscrire</a>
        <?php else: ?>
            <a class="btn btn-primary" href="/admin/users">Ouvrir l’admin</a>
            <a class="btn btn-ghost" href="/profile">Mon profil</a>
        <?php endif ?>
    </div>

    <div style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(220px,1fr))">
        <a href="<?= htmlspecialchars((string) $githubUrl, ENT_QUOTES, 'UTF-8') ?>"
           target="_blank" rel="noopener"
           style="display:block;padding:1.1rem 1.2rem;border:1px solid var(--line);border-radius:16px;background:var(--panel);color:inherit;text-decoration:none">
            <strong style="display:block;margin-bottom:0.35rem">GitHub astral-php</strong>
            <span style="font-size:0.9rem;color:var(--muted)">Organisation, core, packages</span>
        </a>
        <a href="<?= htmlspecialchars((string) $websiteUrl, ENT_QUOTES, 'UTF-8') ?>"
           target="_blank" rel="noopener"
           style="display:block;padding:1.1rem 1.2rem;border:1px solid var(--line);border-radius:16px;background:var(--panel);color:inherit;text-decoration:none">
            <strong style="display:block;margin-bottom:0.35rem">Site / docs</strong>
            <span style="font-size:0.9rem;color:var(--muted)">Documentation et ressources</span>
        </a>
    </div>

    <p style="margin:2rem 0 0;font-size:0.9rem;color:var(--muted);line-height:1.5">
        Ensuite : <code style="background:#e8eee9;padding:0.1rem 0.35rem;border-radius:4px">php bin/console make:module …</code>
        ou <code style="background:#e8eee9;padding:0.1rem 0.35rem;border-radius:4px">composer require astral-php/astral-form</code>.
    </p>
</section>
