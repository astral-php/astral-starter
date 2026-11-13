import { theme, createInteractions } from './javascript/index.js?v=1.0.0';
createInteractions();
document.querySelector('[data-nova-theme-toggle]')?.addEventListener('click', () => theme.setMode(theme.getMode() === 'dark' ? 'light' : 'dark'));
