# Astral Starter Nova — recommandations & avis

> **Contexte :** intégration locale hors roadmap feuille 2.1  
> **Bac :** `D:\laragon\www\astral-starter-nova`  
> **Sources :** `astral-nova-css` · `astral-template-nova` · maquette `Nova: green`  
> **MAJ :** 2026-11-06

---

## 1. Introduction — intégrer `astral-nova-css` dans une app Astral

Ce bac (**astral-starter-nova**) montre le **modèle d’intégration recommandé** : Nova CSS comme socle visuel, l’application comme couche de composition.

### Principe

| Élément | Rôle |
|---------|------|
| **`astral-nova-css`** | Design system CSS-first (tokens, composants `nova-*`, thèmes, modes clair/sombre). **0 dépendance runtime.** |
| **CSS applicatif** (`starter.css` ici) | Composition propre à l’app : hero, header métier, grilles landing, footer. **Consomme** les tokens Nova. |
| **Vues PHP** | Markup : classes `nova-*` + classes app (`starter-*`). |
| **`astral-template-nova`** (optionnel) | Layouts / partials PHP alignés Nova. |

**Dépendance :** `starter.css` **dépend de** `astral-nova-css` — volontairement. Ce n’est pas un second framework : c’est une couche qui s’appuie sur `--nova-*` et les composants déjà fournis.

### Ordre de chargement (layout Starter)

```html
<html lang="fr" data-nova-theme="green" data-nova-mode="light">
<head>
  <link rel="stylesheet" href="/assets/nova/nova.css">
  <link rel="stylesheet" href="/assets/nova/starter.css">
</head>
```

1. **`nova.css`** — reset, tokens, thèmes, boutons, cards, nav, formulaires…  
2. **`starter.css`** — composition Starter (doit être chargé **après** Nova).  
3. Attributs **`data-nova-theme`** / **`data-nova-mode`** sur `<html>` pour la palette et le mode.

JS optionnel (thème / interactions) :

```html
<script type="module" src="/assets/nova/nova.js"></script>
```

### Comment l’app utilise Nova

1. **Composants prêts à l’emploi** dans les vues :  
   `nova-btn`, `nova-btn-primary`, `nova-card`, `nova-alert`, `nova-input`, `nova-badge`, `nova-container`…  
2. **Tokens CSS** dans `starter.css` :  
   `var(--nova-primary)`, `var(--nova-surface)`, `var(--nova-border)`, `var(--nova-text-muted)`…  
   avec fallback possible : `var(--nova-primary, #087449)`.  
3. **Pas de duplication** des boutons / alertes / formulaires dans `starter.css` — seulement la mise en page métier.  
4. **Convention de noms** :  
   - `nova-*` → bibliothèque (ne pas les redéfinir dans l’app)  
   - `starter-*` (ou `{app}-*`) → composition locale  

### Schéma (Starter Nova)

```
astral-nova-css (dist/nova.css)
        │
        │  tokens + composants
        ▼
starter.css  ←  dépend de Nova (var(--nova-*), pas de runtime PHP)
        │
        ▼
vues PHP (layout/main, home, auth…)
        │
        ▼
astral-template-nova (partials / layouts optionnels)
```

### Recette minimale pour une autre app Astral

1. Copier / publier `dist/nova.css` (et éventuellement `nova.min.css` + JS) sous `public/assets/nova/`.  
2. Créer un CSS app (`mon-app.css`) chargé **après** `nova.css`.  
3. Poser `data-nova-theme` / `data-nova-mode` sur le layout.  
4. Utiliser les classes `nova-*` dans les vues ; réserver le CSS app à la composition.  
5. (Optionnel) brancher `astral-template-nova` via Composer path / Packagist.  
6. Éviter les couleurs en dur dans le CSS app quand un token Nova existe (meilleure compatibilité clair/sombre).

### Limite actuelle du bac

Certains verts du hero / brand restent **en dur** (`#087449`, etc.) dans `starter.css`. À terme, les remplacer par des tokens Nova pour que le mode sombre et les autres palettes restent cohérents.

---

## 2. Verdict global

Oui — on peut **se rapprocher fortement** de la maquette avec Nova CSS.

L’état actuel est une **ébauche structurelle** (~60–70 %), pas la maquette. L’écart est surtout dans **`starter.css` + markup home**, pas un échec de Nova.

---

## 3. Répartition saine des responsabilités

| Couche | Rôle |
|--------|------|
| **nova-css** | Tokens, boutons, cards, nav, badge, alertes, tables, focus, thèmes clair/sombre |
| **starter.css** | Composition landing : hero, fenêtre code, flottants, grille features, principes, footer app |
| **vues PHP** | Contenu, icônes, CTA, checklist, textes métier |
| **template-nova** | Layouts admin/auth/marketing + partials réutilisables |

**Règle :** Nova ne doit **pas** embarquer toute la landing Starter (sinon ce n’est plus un design system).

Classes :

- `nova-*` → bibliothèque  
- `starter-*` → composition applicative

---

## 4. État des lieux vs maquette

| Zone | Maquette | Aujourd’hui | Écart |
|------|----------|-------------|-------|
| Header | Logo A, nav centrée, actif souligné, Connexion outline, Créer compte + icône | Proche ; icônes unicode ; lien galerie templates en plus | Moyen |
| Hero | Badge, H1, lead, **2 CTA**, code + `</>` + checklist + grand A | 1 CTA, code simple, **pas** flottants ni 2e bouton | **Fort** |
| Features | 4 cards + **SVG outline** + chevron | Cards OK, glyphes provisoires | Moyen |
| Principes | N° + **icône** + titre + texte | N° + texte seulement | Moyen |
| Footer | Logo + badge + liens \| + cœur | Texte plat (liens stylés depuis correctif `starter.css`) | Moyen |
| Typo / profondeur | Ombres douces, glow, radius soigné | Correct mais plus plat | Léger |

La direction artistique le notait déjà : *icônes provisoires · bibliothèque SVG Nova à définir*.

---

## 5. Ce que Nova a déjà (base solide)

- Thème **green** (+ clair / sombre)
- `nova-btn` primary / secondary / outline / sm / lg
- `nova-card`, `nova-badge`, `nova-alert`, `nova-nav-link`
- Forms, tables, pagination, tabs, shell admin
- Tokens, reset, focus, accessibilité
- JS thème / interactions optionnelles
- Partials Template Nova testés (galerie `/nova-templates`)

---

## 6. Recommandations — priorités

### P1 — Starter (gain visuel immédiat)

Rapprochement maquette **sans** gonfler Nova :

1. Hero : 2e CTA « Découvrir le starter », carte checklist, badge `</>`, watermark A  
2. Features / principes : SVG + chevrons  
3. Header : état actif nav, icônes propres  
4. Footer : logo, pipes, cœur (aligné maquette)  
5. Ombres / glow hero plus proches du PNG  

### P2 — Nova CSS (bonne base design system)

1. **`nova-link`** (+ éventuellement `.nova-page-footer a`) — liens texte sans style brut  
2. **Kit icônes SVG** accessible (`nova-icon`, tailles, `currentColor`) — prioritaire  
3. **Utilities** ciblées : stack/cluster/gap, shadow soft, radius, soft surface (sans devenir Tailwind)  
4. Affiner tokens **green** vs maquette (primary un peu plus vif, surfaces blanches vs `#f0fdf4` partout)  
5. Variante bouton **ghost / soft** si besoin (Connexion type maquette)  
6. Documenter le contrat : *composants génériques vs composition app*

### P3 — Suite

- Parcours auth / admin : déjà OK fonctionnellement ; polish UI si besoin  
- Adapters Tailwind / Bootstrap : **après** stabilisation visuelle et 1.0 Nova  
- Packagist / dépôts publics : seulement après validation bac Starter  

---

## 7. Avis — architecture bibliothèque SVG

### Question

Pour la future bibliothèque SVG Astral Nova :

| Option | Description |
|--------|-------------|
| **A** | Intégrer directement les SVG dans `astral-nova-css` |
| **B** | Package indépendant `astral-nova-icons` |
| **C** | Package indépendant + intégration simplifiée / automatique dans Nova CSS et Template Nova |

Objectif : icônes + illustrations Hero communes, compatibles palettes et modes clair/sombre, **sans alourdir** le framework.

### Avis (recommandation : **C**)

**Préférer l’option C**, alignée avec l’expérience d’intégration actuelle Starter Nova.

#### Pourquoi pas A

- `astral-nova-css` doit rester **CSS-first, 0 dépendance runtime**.  
- Les SVG Hero / illustrations grossissent vite le bundle `dist/nova.css` (ou forcent un second asset lourd toujours livré).  
- Beaucoup d’apps n’ont besoin que d’une **dizaine** d’icônes UI, pas du set Hero complet.  
- L’intégration Starter montre déjà que la composition landing (hero, flottants) vit mieux dans **l’app** que dans le cœur CSS.

#### Pourquoi pas B seul

- Un package isolé **sans** pont vers Nova / Template oblige chaque app à réinventer chemins, sprites, classes, thème.  
- Risque de divergence (couleurs en dur vs `currentColor` / tokens Nova).  
- Plus de friction pour Template Nova (partials `icon`, layouts).

#### Pourquoi C

- **Package `astral-nova-icons`** : source unique (icônes UI + illustrations Hero), versionnée à part, tree-shake / import sélectif.  
- **Intégration automatique optionnelle** dans Nova CSS (ex. entrée `nova-icons.css` ou mapping `data-nova-icon`) et Template Nova (partial `icon`, helpers).  
- Compatibilité **thèmes / modes** via `currentColor` + tokens `--nova-*` (pas de couleurs figées dans le SVG).  
- Starter / Forum / Forge consomment le même kit sans coller les assets dans chaque app.  
- Le cœur `nova.css` reste léger : l’app **opte in** pour le set d’icônes.

#### Contrat recommandé (C)

| Élément | Choix |
|---------|--------|
| Format | SVG (inline ou sprite), `fill="currentColor"` / stroke currentColor |
| Thème | Hérite de `--nova-primary`, `--nova-text`, etc. |
| API Template | `Template::partial('icon', ['name' => 'shield', 'size' => 'md'])` |
| API CSS | `.nova-icon`, `.nova-icon-sm|md|lg` ; illustrations `.nova-illust-*` hors bundle core |
| Distribution | Package Composer/NPM dédié ; **suggest** depuis nova-css / template-nova |
| Starter | Compose Hero avec illustrations du package ; ne copie pas le set entier dans `starter.css` |

#### Anti-patterns

- Couleurs hardcodées dans les SVG  
- Tout coller dans `dist/nova.min.css`  
- Deux kits divergents (Starter vs Forum)  
- Dépendance **obligatoire** icons → cassage du principe « 0 dépendance » du CSS core  

---

## 8. Synthèse

| Sujet | Position |
|-------|----------|
| Fidélité maquette | Oui, surtout via **Starter** (P1) |
| Base Nova CSS | Solide ; compléter **liens + icons + utilities** (P2) |
| SVG | **Option C** — package `astral-nova-icons` + pont Nova / Template |
| Roadmap feuille 2.1 | **Hors file** tant que bac local non validé |

---

## 9. Liens locaux utiles

| URL | Rôle |
|-----|------|
| `/` | Home green (ébauche maquette) |
| `/nova-templates` | Galerie layouts / partials |
| `/nova-templates/partials` | Tous les partials Template Nova |
| `/login` · `/register` | Auth métier |

---

*Document de travail bac Starter Nova — à faire évoluer au fil des itérations P1/P2.*
