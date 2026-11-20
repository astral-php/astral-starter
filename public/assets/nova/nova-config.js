/**
 * Nova — config 100 % JS (CDN / local).
 * Modifier ce fichier pour thème, mode et URLs d’assets.
 * Chargé avant nova-boot.js — aucun passage PHP.
 */
window.NovaConfig = {
  theme: 'green',
  mode: 'light', // light | dark | system
  storageKey: 'astral-nova-mode',
  /**
   * cdn  → CSS/icons/JS via jsDelivr
   * local → tout sous /assets/nova/
   */
  source: 'cdn',
  version: '1.2.0',
  assets: {
    cdn: {
      css: 'https://cdn.jsdelivr.net/gh/astral-php/astral-nova-css@1.2.0/dist/nova.min.css',
      icons: 'https://cdn.jsdelivr.net/gh/astral-php/astral-nova-icons@1.0.0/dist/nova-icons.css',
      js: 'https://cdn.jsdelivr.net/gh/astral-php/astral-nova-css@1.2.0/dist/nova.iife.min.js',
    },
    local: {
      css: '/assets/nova/nova.css',
      icons: '/assets/nova/nova-icons.css',
      js: '/assets/nova/nova.iife.min.js',
    },
  },
};
