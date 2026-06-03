const debugToggleSlider = document.querySelector(".debug-toggle-slider");
const debugLayerButtons = Array.from(document.querySelectorAll("[data-debug-layer]"));
const heroMount = document.querySelector("#hero-slider-mount");
const componentMounts = Array.from(document.querySelectorAll("[data-component]"));
const logoControls = Array.from(document.querySelectorAll("[data-logo-control]"));
const logoOutputs = Object.fromEntries(
  Array.from(document.querySelectorAll("[data-logo-output]")).map((output) => [output.dataset.logoOutput, output])
);
const logoReadout = document.querySelector("[data-logo-readout]");
const logoReset = document.querySelector(".logo-reset");
const brandPanel = document.querySelector(".brand-panel");
const dropdownItems = Array.from(document.querySelectorAll(".nav-item.has-dropdown"));

const logoDefaults = {
  scale: "1",
  height: "81.8",
  x: "0",
  y: "12",
};

const logoStorageKey = "arkosLogoControlsV2";

let heroController;
const dropdownCloseTimers = new WeakMap();

const clearDropdownCloseTimer = (item) => {
  const timer = dropdownCloseTimers.get(item);

  if (timer) {
    window.clearTimeout(timer);
    dropdownCloseTimers.delete(item);
  }
};

const setDropdownState = (item, isOpen) => {
  const trigger = item.querySelector(".nav-link[aria-haspopup='true']");

  if (isOpen) {
    clearDropdownCloseTimer(item);
  }

  item.classList.toggle("is-open", isOpen);
  trigger?.setAttribute("aria-expanded", String(isOpen));
};

const closeDropdowns = (exceptItem) => {
  dropdownItems.forEach((item) => {
    if (item !== exceptItem) {
      setDropdownState(item, false);
    }
  });
};

dropdownItems.forEach((item) => {
  const trigger = item.querySelector(".nav-link[aria-haspopup='true']");
  const dropdown = item.querySelector(".nav-dropdown");

  item.addEventListener("mouseenter", () => {
    clearDropdownCloseTimer(item);
    setDropdownState(item, true);
  });

  item.addEventListener("mouseleave", () => {
    if (!item.contains(document.activeElement)) {
      clearDropdownCloseTimer(item);
      dropdownCloseTimers.set(
        item,
        window.setTimeout(() => {
          if (!item.matches(":hover") && !item.contains(document.activeElement)) {
            setDropdownState(item, false);
          }
        }, 220)
      );
    }
  });

  item.addEventListener("focusin", () => {
    closeDropdowns(item);
    setDropdownState(item, true);
  });

  item.addEventListener("focusout", () => {
    window.setTimeout(() => {
      if (!item.contains(document.activeElement) && !item.matches(":hover")) {
        setDropdownState(item, false);
      }
    }, 0);
  });

  trigger?.addEventListener("click", (event) => {
    event.preventDefault();
    closeDropdowns(item);
    setDropdownState(item, true);
  });

  trigger?.addEventListener("keydown", (event) => {
    if (event.key === "ArrowDown" || event.key === " ") {
      event.preventDefault();
      closeDropdowns(item);
      setDropdownState(item, true);
      dropdown?.querySelector("a")?.focus();
    }
  });
});

document.addEventListener("click", (event) => {
  if (dropdownItems.some((item) => item.contains(event.target))) return;
  closeDropdowns();
});

document.addEventListener("keydown", (event) => {
  if (event.key !== "Escape") return;

  const activeItem = dropdownItems.find((item) => item.contains(document.activeElement));
  closeDropdowns();
  activeItem?.querySelector(".nav-link")?.focus();
});

window.addEventListener("resize", () => closeDropdowns());

const loadComponent = async (mount) => {
  const componentUrl = mount.dataset.component;
  const response = await fetch(componentUrl);

  if (!response.ok) {
    throw new Error(`Could not load ${componentUrl}`);
  }

  mount.innerHTML = await response.text();
};

const loadComponents = async () => {
  await Promise.all(componentMounts.map(loadComponent));

  if (heroMount) {
    heroController = window.initHeroSlider?.();
  }
};

const renderComponentError = (mount, message) => {
  if (mount === heroMount) {
    mount.innerHTML = `<section class="hero-slider hero-slider--error" aria-label="Featured ARKOS banners">${message}</section>`;
    return;
  }

  mount.innerHTML = `<section role="status" aria-live="polite">${message}</section>`;
};

debugToggleSlider?.addEventListener("click", () => {
  const isOff = document.body.classList.toggle("slider-debug-off");
  debugToggleSlider.setAttribute("aria-pressed", String(isOff));
  debugToggleSlider.textContent = isOff ? "Show slider" : "Hide slider";

  if (isOff) {
    heroController?.stopAutoplay();
    return;
  }

  heroController?.startAutoplay();
});

debugLayerButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const layer = button.dataset.debugLayer;
    const className = `debug-hide-${layer}`;
    const isHidden = document.body.classList.toggle(className);
    button.setAttribute("aria-pressed", String(isHidden));
  });
});

const getSavedLogoValues = () => {
  try {
    return { ...logoDefaults, ...JSON.parse(localStorage.getItem(logoStorageKey)) };
  } catch {
    return { ...logoDefaults };
  }
};

const formatLogoValue = (name, value) => {
  if (name === "scale") return Number(value).toFixed(2);
  if (name === "height") return `${Number(value).toFixed(1)}%`;
  return `${Math.round(Number(value))}px`;
};

const applyLogoValues = (values, shouldSave = true) => {
  document.documentElement.style.setProperty("--logo-scale", values.scale);
  document.documentElement.style.setProperty("--logo-base-height", `${values.height}%`);
  document.documentElement.style.setProperty("--logo-offset-x", `${values.x}px`);
  document.documentElement.style.setProperty("--logo-offset-y", `${values.y}px`);

  logoControls.forEach((control) => {
    control.value = values[control.dataset.logoControl];
  });

  Object.entries(values).forEach(([name, value]) => {
    if (logoOutputs[name]) {
      logoOutputs[name].textContent = formatLogoValue(name, value);
    }
  });

  if (logoReadout && brandPanel) {
    const rect = brandPanel.getBoundingClientRect();
    logoReadout.textContent = `Scale: ${Number(values.scale).toFixed(2)} | Height: ${Number(values.height).toFixed(1)}% | X: ${Math.round(Number(values.x))}px | Y: ${Math.round(Number(values.y))}px | Logo height: ${rect.height.toFixed(1)}px | top: ${rect.top.toFixed(1)}px | bottom: ${rect.bottom.toFixed(1)}px`;
  }

  if (shouldSave) {
    localStorage.setItem(logoStorageKey, JSON.stringify(values));
  }
};

let logoValues = getSavedLogoValues();
applyLogoValues(logoValues, false);

logoControls.forEach((control) => {
  control.addEventListener("input", () => {
    logoValues = {
      ...logoValues,
      [control.dataset.logoControl]: control.value,
    };
    applyLogoValues(logoValues);
  });
});

logoReset?.addEventListener("click", () => {
  logoValues = { ...logoDefaults };
  applyLogoValues(logoValues);
});

window.addEventListener("resize", () => applyLogoValues(logoValues, false));

loadComponents().catch((error) => {
  componentMounts.forEach((mount) => {
    if (!mount.innerHTML.trim()) {
      renderComponentError(mount, error.message);
    }
  });
});
