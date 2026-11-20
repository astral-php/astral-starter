(() => {
  // src/javascript/theme.js
  var THEMES = /* @__PURE__ */ new Set(["white", "blue", "maroon-light", "red", "indigo", "orange", "green"]);
  var MODES = /* @__PURE__ */ new Set(["light", "dark", "system"]);
  function rootElement() {
    return typeof document !== "undefined" ? document.documentElement : null;
  }
  function resolvedMode(mode) {
    var _a2;
    if (mode !== "system") return mode;
    return typeof window !== "undefined" && ((_a2 = window.matchMedia) == null ? void 0 : _a2.call(window, "(prefers-color-scheme: dark)").matches) ? "dark" : "light";
  }
  var theme = {
    names: [...THEMES],
    modes: [...MODES],
    set(name) {
      if (!THEMES.has(name)) throw new TypeError(`Unknown Nova theme: ${name}`);
      const root = rootElement();
      if (root) root.dataset.novaTheme = name;
    },
    get() {
      var _a2, _b;
      return (_b = (_a2 = rootElement()) == null ? void 0 : _a2.dataset.novaTheme) != null ? _b : null;
    },
    setMode(mode) {
      if (!MODES.has(mode)) throw new TypeError(`Unknown Nova mode: ${mode}`);
      const root = rootElement();
      if (!root) return;
      if (mode === "system") {
        root.dataset.novaMode = resolvedMode("system");
        root.dataset.novaModePreference = "system";
      } else {
        root.dataset.novaMode = mode;
        delete root.dataset.novaModePreference;
      }
    },
    getMode() {
      var _a2, _b;
      return (_b = (_a2 = rootElement()) == null ? void 0 : _a2.dataset.novaMode) != null ? _b : "light";
    },
    getModePreference() {
      var _a2, _b;
      return (_b = (_a2 = rootElement()) == null ? void 0 : _a2.dataset.novaModePreference) != null ? _b : this.getMode();
    }
  };

  // src/javascript/components.js
  var SELECTORS = {
    modalOpen: "[data-nova-modal-open]",
    modalClose: "[data-nova-modal-close]",
    dropdown: "[data-nova-dropdown]",
    dropdownToggle: "[data-nova-dropdown-toggle]",
    tab: "[data-nova-tab]",
    accordion: "[data-nova-accordion]",
    drawerOpen: "[data-nova-drawer-open]",
    drawerClose: "[data-nova-drawer-close]",
    toast: "[data-nova-toast]",
    header: "[data-nova-header]",
    headerToggle: "[data-nova-header-toggle]",
    shell: "[data-nova-shell]",
    shellToggle: "[data-nova-shell-toggle]",
    shellBackdrop: "[data-nova-shell-backdrop]"
  };
  var query = (root, selector) => {
    var _a2, _b;
    return (_b = (_a2 = root == null ? void 0 : root.querySelector) == null ? void 0 : _a2.call(root, selector)) != null ? _b : null;
  };
  var closest = (node, selector) => {
    var _a2, _b;
    return (_b = (_a2 = node == null ? void 0 : node.closest) == null ? void 0 : _a2.call(node, selector)) != null ? _b : null;
  };
  function setExpanded(button, expanded) {
    button == null ? void 0 : button.setAttribute("aria-expanded", String(expanded));
  }
  function closeDropdown(dropdown) {
    if (!dropdown) return;
    dropdown.classList.remove("is-open");
    setExpanded(query(dropdown, SELECTORS.dropdownToggle), false);
  }
  function closeDrawer(drawer) {
    var _a2, _b;
    if (!drawer) return;
    drawer.classList.remove("is-open");
    drawer.setAttribute("aria-hidden", "true");
    const opener = (_a2 = drawer._novaOpener) != null ? _a2 : document.querySelector(`[data-nova-drawer-open="${CSS.escape(drawer.id)}"]`);
    setExpanded(opener, false);
    drawer.removeAttribute("aria-modal");
    (_b = opener == null ? void 0 : opener.focus) == null ? void 0 : _b.call(opener);
    drawer._novaOpener = null;
  }
  function setHeaderOpen(header, open) {
    var _a2;
    if (!header) return;
    header.classList.toggle("is-open", open);
    const toggle = query(header, SELECTORS.headerToggle);
    setExpanded(toggle, open);
    const panelId = toggle == null ? void 0 : toggle.getAttribute("aria-controls");
    const panel = panelId ? query(header, `#${CSS.escape(panelId)}`) : query(header, ".nova-header-panel");
    if (open) focusFirst(panel != null ? panel : header);
    else (_a2 = toggle == null ? void 0 : toggle.focus) == null ? void 0 : _a2.call(toggle);
  }
  function closeHeader(header) {
    setHeaderOpen(header, false);
  }
  function setShellNavOpen(shell, open) {
    var _a2;
    if (!shell) return;
    shell.classList.toggle("is-nav-open", open);
    const toggle = query(shell, SELECTORS.shellToggle);
    setExpanded(toggle, open);
    const sidebar = query(shell, ".nova-sidebar");
    if (sidebar) {
      sidebar.setAttribute("aria-hidden", String(!open));
      if (open) sidebar.setAttribute("aria-modal", "true");
      else sidebar.removeAttribute("aria-modal");
    }
    const backdrop = query(shell, SELECTORS.shellBackdrop);
    if (backdrop) backdrop.hidden = !open;
    if (open) focusFirst(sidebar != null ? sidebar : shell);
    else (_a2 = toggle == null ? void 0 : toggle.focus) == null ? void 0 : _a2.call(toggle);
  }
  function closeShell(shell) {
    setShellNavOpen(shell, false);
  }
  function focusFirst(container) {
    var _a2;
    (_a2 = query(container, 'button:not([disabled]), [href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])')) == null ? void 0 : _a2.focus();
  }
  function createInteractions(root = typeof document !== "undefined" ? document : null) {
    if (!(root == null ? void 0 : root.addEventListener)) return { destroy() {
    } };
    const onClick = (event) => {
      var _a2;
      const target = event.target;
      const modalOpener = closest(target, SELECTORS.modalOpen);
      if (modalOpener) {
        const dialog = query(root, `#${CSS.escape(modalOpener.dataset.novaModalOpen)}`);
        if (dialog == null ? void 0 : dialog.showModal) dialog.showModal();
        else if (dialog) dialog.setAttribute("open", "");
        return;
      }
      const modalCloser = closest(target, SELECTORS.modalClose);
      if (modalCloser) {
        const dialog = closest(modalCloser, "dialog");
        if (dialog == null ? void 0 : dialog.close) dialog.close();
        else dialog == null ? void 0 : dialog.removeAttribute("open");
        return;
      }
      const dropdownToggle = closest(target, SELECTORS.dropdownToggle);
      if (dropdownToggle) {
        const dropdown = closest(dropdownToggle, SELECTORS.dropdown);
        const opening = !(dropdown == null ? void 0 : dropdown.classList.contains("is-open"));
        root.querySelectorAll(SELECTORS.dropdown).forEach((item) => closeDropdown(item));
        if (opening && dropdown) {
          dropdown.classList.add("is-open");
          setExpanded(dropdownToggle, true);
        }
        return;
      }
      const tab = closest(target, SELECTORS.tab);
      if (tab) {
        const list = closest(tab, '[role="tablist"]');
        const targetId = tab.getAttribute("aria-controls");
        if (!list || !targetId) return;
        const scope = list.parentElement;
        list.querySelectorAll(SELECTORS.tab).forEach((item) => {
          const selected = item === tab;
          item.setAttribute("aria-selected", String(selected));
          item.tabIndex = selected ? 0 : -1;
        });
        scope.querySelectorAll('[role="tabpanel"]').forEach((panel) => {
          panel.hidden = panel.id !== targetId;
        });
        return;
      }
      const accordion = closest(target, SELECTORS.accordion);
      if (accordion) {
        const panelId = accordion.getAttribute("aria-controls");
        const panel = panelId ? query(root, `#${CSS.escape(panelId)}`) : null;
        const expanded = accordion.getAttribute("aria-expanded") === "true";
        setExpanded(accordion, !expanded);
        if (panel) panel.hidden = expanded;
        return;
      }
      const drawerOpener = closest(target, SELECTORS.drawerOpen);
      if (drawerOpener) {
        const drawer = query(root, `#${CSS.escape(drawerOpener.dataset.novaDrawerOpen)}`);
        if (drawer) {
          drawer._novaOpener = drawerOpener;
          drawer.classList.add("is-open");
          drawer.setAttribute("aria-hidden", "false");
          drawer.setAttribute("aria-modal", "true");
          setExpanded(drawerOpener, true);
          focusFirst(drawer);
        }
        return;
      }
      const drawerCloser = closest(target, SELECTORS.drawerClose);
      if (drawerCloser) {
        closeDrawer(closest(drawerCloser, "[data-nova-drawer]"));
        return;
      }
      const headerToggle = closest(target, SELECTORS.headerToggle);
      if (headerToggle) {
        const header = closest(headerToggle, SELECTORS.header);
        setHeaderOpen(header, !(header == null ? void 0 : header.classList.contains("is-open")));
        return;
      }
      const shellToggle = closest(target, SELECTORS.shellToggle);
      if (shellToggle) {
        const shell = closest(shellToggle, SELECTORS.shell);
        setShellNavOpen(shell, !(shell == null ? void 0 : shell.classList.contains("is-nav-open")));
        return;
      }
      const shellBackdrop = closest(target, SELECTORS.shellBackdrop);
      if (shellBackdrop) {
        closeShell(closest(shellBackdrop, SELECTORS.shell));
        return;
      }
      const toastTrigger = closest(target, SELECTORS.toast);
      if (toastTrigger) showToast(toastTrigger.dataset.novaToast, { root, variant: (_a2 = toastTrigger.dataset.novaToastVariant) != null ? _a2 : "info" });
    };
    const onKeydown = (event) => {
      var _a2, _b;
      const activeDrawer = root.querySelector("[data-nova-drawer].is-open");
      if (event.key === "Tab" && activeDrawer) {
        const focusable = [...activeDrawer.querySelectorAll('a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])')].filter((item) => !item.hidden && item.getAttribute("aria-hidden") !== "true");
        if (focusable.length) {
          const first = focusable[0];
          const last = focusable[focusable.length - 1];
          if (event.shiftKey && (document.activeElement === first || !activeDrawer.contains(document.activeElement))) {
            event.preventDefault();
            last.focus();
          } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault();
            first.focus();
          }
        }
      }
      if (event.key.startsWith("Arrow")) {
        const tab = closest(event.target, SELECTORS.tab);
        const list = tab && closest(tab, '[role="tablist"]');
        if (list) {
          const tabs = [...list.querySelectorAll(SELECTORS.tab)].filter((item) => !item.disabled);
          const index = tabs.indexOf(tab);
          const next = event.key === "ArrowRight" || event.key === "ArrowDown" ? 1 : -1;
          if (index >= 0 && (event.key === "ArrowRight" || event.key === "ArrowLeft" || event.key === "ArrowDown" || event.key === "ArrowUp")) {
            event.preventDefault();
            (_a2 = tabs[(index + next + tabs.length) % tabs.length]) == null ? void 0 : _a2.click();
            (_b = tabs[(index + next + tabs.length) % tabs.length]) == null ? void 0 : _b.focus();
          }
        }
      }
      if (event.key !== "Escape") return;
      root.querySelectorAll(SELECTORS.dropdown).forEach(closeDropdown);
      root.querySelectorAll("[data-nova-drawer].is-open").forEach(closeDrawer);
      root.querySelectorAll(`${SELECTORS.header}.is-open`).forEach(closeHeader);
      root.querySelectorAll(`${SELECTORS.shell}.is-nav-open`).forEach(closeShell);
      root.querySelectorAll("dialog[open]").forEach((dialog) => {
        var _a3;
        return (_a3 = dialog.close) == null ? void 0 : _a3.call(dialog);
      });
    };
    const onPointer = (event) => {
      if (closest(event.target, SELECTORS.dropdown)) return;
      root.querySelectorAll(SELECTORS.dropdown).forEach(closeDropdown);
    };
    root.addEventListener("click", onClick);
    root.addEventListener("keydown", onKeydown);
    root.addEventListener("click", onPointer, true);
    return {
      destroy() {
        root.removeEventListener("click", onClick);
        root.removeEventListener("keydown", onKeydown);
        root.removeEventListener("click", onPointer, true);
      }
    };
  }
  function showToast(message, { root = typeof document !== "undefined" ? document : null, duration = 4e3, variant = "info" } = {}) {
    var _a2;
    if (!root || !message) return null;
    let region = query(root, "[data-nova-toast-region]");
    if (!region) {
      region = document.createElement("div");
      region.className = "nova-toast-region";
      region.dataset.novaToastRegion = "";
      region.setAttribute("aria-live", "polite");
      region.setAttribute("aria-atomic", "false");
      ((_a2 = root.body) != null ? _a2 : root).append(region);
    }
    const toast = document.createElement("div");
    toast.className = `nova-toast nova-toast-${["success", "warning", "danger", "info"].includes(variant) ? variant : "info"}`;
    toast.setAttribute("role", variant === "danger" ? "alert" : "status");
    toast.textContent = String(message);
    region.append(toast);
    const timer = setTimeout(() => toast.remove(), Math.max(0, duration));
    return { element: toast, dismiss() {
      clearTimeout(timer);
      toast.remove();
    } };
  }
  var interactions = { init: createInteractions, toast: showToast };

  // src/javascript/index.js
  var Nova = { theme, interactions, createInteractions, showToast };
  var _a;
  if (typeof window !== "undefined") {
    window.Nova = (_a = window.Nova) != null ? _a : Nova;
  }
})();
