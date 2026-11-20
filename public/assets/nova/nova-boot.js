/**
 * Nova boot — injecte CSS/icons + charge le JS unique (IIFE), applique thème/mode.
 * Dépend de window.NovaConfig (nova-config.js).
 */
(function () {
  var cfg = window.NovaConfig || {};
  var source = cfg.source === 'cdn' ? 'cdn' : 'local';
  var assets = (cfg.assets && cfg.assets[source]) || {};
  var root = document.documentElement;
  var storageKey = cfg.storageKey || 'astral-nova-mode';

  function ensureLink(href, id) {
    if (!href || document.getElementById(id)) return;
    var link = document.createElement('link');
    link.id = id;
    link.rel = 'stylesheet';
    link.href = href;
    document.head.appendChild(link);
  }

  function applyMode(mode) {
    if (!root) return;
    if (mode === 'system') {
      var dark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      root.setAttribute('data-nova-mode', dark ? 'dark' : 'light');
      root.setAttribute('data-nova-mode-preference', 'system');
      return;
    }
    root.setAttribute('data-nova-mode', mode === 'dark' ? 'dark' : 'light');
    root.removeAttribute('data-nova-mode-preference');
  }

  if (cfg.theme) {
    root.setAttribute('data-nova-theme', cfg.theme);
  }

  var initialMode = cfg.mode || 'light';
  try {
    var stored = localStorage.getItem(storageKey);
    if (stored === 'dark' || stored === 'light' || stored === 'system') {
      initialMode = stored;
    }
  } catch (e) {}
  applyMode(initialMode);

  ensureLink(assets.css, 'nova-css');
  ensureLink(assets.icons, 'nova-icons');

  function wireThemeToggle() {
    var Nova = window.Nova;
    if (!Nova || !Nova.theme) return;
    if (typeof Nova.createInteractions === 'function') {
      Nova.createInteractions();
    }
    document.querySelectorAll('[data-nova-theme-toggle]').forEach(function (btn) {
      if (btn._novaBound) return;
      btn._novaBound = true;
      btn.addEventListener('click', function () {
        var next = Nova.theme.getMode() === 'dark' ? 'light' : 'dark';
        Nova.theme.setMode(next);
        try {
          localStorage.setItem(storageKey, next);
        } catch (e) {}
      });
    });
  }

  if (!assets.js) {
    console.warn('[Nova] JS URL manquante dans NovaConfig.assets.' + source);
    return;
  }

  if (document.getElementById('nova-js')) {
    wireThemeToggle();
    return;
  }

  var script = document.createElement('script');
  script.id = 'nova-js';
  script.src = assets.js;
  script.defer = true;
  script.onload = wireThemeToggle;
  script.onerror = function () {
    console.error('[Nova] Impossible de charger', assets.js);
  };
  document.head.appendChild(script);
})();
