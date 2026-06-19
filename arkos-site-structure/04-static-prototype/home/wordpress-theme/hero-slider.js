window.initHeroSlider = function initHeroSlider() {
  const slider = document.querySelector(".hero-swiper");
  const slides = Array.from(document.querySelectorAll(".hero-slide"));
  const pagination = document.querySelector(".hero-slider__pagination");
  const prevButton = document.querySelector(".hero-slider__button--prev");
  const nextButton = document.querySelector(".hero-slider__button--next");
  const toggleButton = document.querySelector(".hero-slider__button--toggle");
  const toggleIcon = toggleButton?.querySelector(".fa-solid");
  const progressBar = document.querySelector(".hero-slider__progress span");
  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  if (!slider || !slides.length || slider.dataset.initialized === "true") return null;

  let activeIndex = 0;
  let autoplayTimer;
  let isPaused = prefersReducedMotion;
  let dragStartX = 0;
  let dragDeltaX = 0;
  let isDragging = false;
  const autoplayDelay = 4500;

  const resetProgress = () => {
    if (!progressBar) return;
    progressBar.style.animation = "none";
    progressBar.offsetHeight;
    progressBar.style.animation = isPaused ? "none" : "";
  };

  const showSlide = (index) => {
    activeIndex = (index + slides.length) % slides.length;

    slides.forEach((slide, slideIndex) => {
      const isActive = slideIndex === activeIndex;
      slide.classList.toggle("is-active", isActive);
      slide.setAttribute("aria-hidden", String(!isActive));
      slide.tabIndex = isActive ? 0 : -1;
    });

    paginationButtons.forEach((button, buttonIndex) => {
      const isActive = buttonIndex === activeIndex;
      button.classList.toggle("is-active", isActive);
      button.setAttribute("aria-current", isActive ? "true" : "false");
    });

    resetProgress();
  };

  const stopAutoplay = () => {
    window.clearInterval(autoplayTimer);
    autoplayTimer = undefined;
  };

  const startAutoplay = () => {
    stopAutoplay();
    if (isPaused || slides.length < 2) return;
    autoplayTimer = window.setInterval(() => showSlide(activeIndex + 1), autoplayDelay);
  };

  const setDragOffset = (value) => {
    slider.style.setProperty("--hero-drag-x", `${value}px`);
  };

  const clearDrag = () => {
    isDragging = false;
    dragStartX = 0;
    dragDeltaX = 0;
    slider.classList.remove("is-dragging");
    setDragOffset(0);
  };

  const finishDrag = () => {
    if (!isDragging) return;

    const threshold = Math.max(42, slider.clientWidth * 0.06);
    const shouldMove = Math.abs(dragDeltaX) >= threshold;

    if (shouldMove) {
      showSlide(activeIndex + (dragDeltaX < 0 ? 1 : -1));
    }

    clearDrag();
    startAutoplay();
  };

  const paginationButtons = slides.map((_, index) => {
    const button = document.createElement("button");
    button.type = "button";
    button.className = "hero-slider__bullet";
    button.setAttribute("aria-label", `Show banner ${index + 1}`);
    button.addEventListener("click", () => {
      showSlide(index);
      startAutoplay();
    });
    pagination?.appendChild(button);
    return button;
  });

  prevButton?.addEventListener("click", () => {
    showSlide(activeIndex - 1);
    startAutoplay();
  });

  nextButton?.addEventListener("click", () => {
    showSlide(activeIndex + 1);
    startAutoplay();
  });

  toggleButton?.addEventListener("click", () => {
    isPaused = !isPaused;
    toggleButton.setAttribute("aria-pressed", String(isPaused));
    toggleButton.setAttribute("aria-label", isPaused ? "Play banner slider" : "Pause banner slider");
    toggleIcon?.classList.toggle("fa-pause", !isPaused);
    toggleIcon?.classList.toggle("fa-play", isPaused);

    if (isPaused) {
      stopAutoplay();
      if (progressBar) progressBar.style.animation = "none";
      return;
    }

    resetProgress();
    startAutoplay();
  });

  slider.addEventListener("keydown", (event) => {
    if (event.key === "ArrowLeft") {
      showSlide(activeIndex - 1);
      startAutoplay();
    }

    if (event.key === "ArrowRight") {
      showSlide(activeIndex + 1);
      startAutoplay();
    }
  });

  slider.addEventListener("pointerdown", (event) => {
    if (event.target.closest("button, a")) return;

    isDragging = true;
    dragStartX = event.clientX;
    dragDeltaX = 0;
    slider.classList.add("is-dragging");
    stopAutoplay();
    slider.setPointerCapture?.(event.pointerId);
  });

  slider.addEventListener("pointermove", (event) => {
    if (!isDragging) return;

    dragDeltaX = event.clientX - dragStartX;
    setDragOffset(Math.max(-80, Math.min(80, dragDeltaX * 0.32)));
  });

  slider.addEventListener("pointerup", finishDrag);
  slider.addEventListener("pointercancel", clearDrag);
  slider.addEventListener("lostpointercapture", finishDrag);

  if (prefersReducedMotion && toggleButton) {
    toggleButton.hidden = true;
  }

  slider.dataset.initialized = "true";
  showSlide(0);
  startAutoplay();

  return {
    startAutoplay,
    stopAutoplay
  };
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", () => window.initHeroSlider?.(), { once: true });
} else {
  window.initHeroSlider?.();
}
