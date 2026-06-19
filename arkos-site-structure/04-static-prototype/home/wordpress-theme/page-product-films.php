<?php
/**
 * Template Name: Product Films
 *
 * Custom template for the Product Films page.
 */

get_header();
?>

<article class="vetek-range-page product-films-page">
    <section class="vetek-range-hero" aria-label="Product films hero image">
        <img
            class="product-films-hero__image"
            src="https://arkos.in/wp-content/uploads/2024/01/Arkos-Website-Banner-Final.jpg"
            alt="Arkos Corporate and Bolt Product Films"
            width="1920"
            height="500"
        />
    </section>

    <section class="wp-content-section wp-content-section--product-films">
        <div class="real-section__inner product-films-inner">
            <header class="product-films-heading">
                <span>Product Films</span>
                <h1>Arkos Corporate &amp; Bolt Product Films</h1>
            </header>

            <div class="product-films-list">
                <article class="product-film-section">
                    <div class="product-film-copy">
                        <span class="product-film-number">01</span>
                        <h2>Arkos Presentation Film</h2>
                        <p>A focused introduction to Arkos product stories, brand capability, and business divisions.</p>
                    </div>

                    <button
                        type="button"
                        class="product-film-card__btn"
                        data-video-src="https://arkos.in/~arkosin/wp-content/uploads/2020/10/arkos-presentation-film.mp4"
                    >
                        <img
                            src="https://arkos.in/wp-content/uploads/2024/01/Arkos-Website-Banner-Final.jpg"
                            alt="Arkos presentation film preview"
                            class="product-film-preview"
                        />
                        <span class="product-film-play-overlay" aria-hidden="true"></span>
                    </button>
                </article>

                <article class="product-film-section product-film-section--reverse">
                    <div class="product-film-copy">
                        <span class="product-film-number">02</span>
                        <h2>Arkos Corporate Bolt Product Film</h2>
                        <p>A product-led film covering the Arkos corporate story and Bolt battery range.</p>
                    </div>

                    <button
                        type="button"
                        class="product-film-card__btn"
                        data-video-src="https://arkos.in/~arkosin/wp-content/uploads/2020/10/arkos-corporate-bolt-product-film.mp4"
                    >
                        <img
                            src="https://arkos.in/wp-content/uploads/2024/01/Arkos-Website-Banner-Final.jpg"
                            alt="Arkos corporate bolt product film preview"
                            class="product-film-preview"
                        />
                        <span class="product-film-play-overlay" aria-hidden="true"></span>
                    </button>
                </article>
            </div>
        </div>
    </section>
</article>

<section id="product-video-modal" class="product-video-modal" aria-hidden="true" aria-label="Product video player">
    <div class="product-video-modal__overlay" data-close-video></div>
    <div class="product-video-modal__dialog" role="dialog" aria-modal="true" aria-label="Video player">
        <button type="button" class="product-video-modal__close" data-close-video aria-label="Close video">x</button>
        <video id="product-video-player" class="product-video-modal__player" controls playsinline></video>
    </div>
</section>

<style>
    .product-films-hero__image {
        width: 100%;
        height: auto;
        display: block;
    }

    .wp-content-section--product-films {
        padding: clamp(36px, 5vw, 70px) 0 clamp(44px, 6vw, 84px);
        background: #ffffff;
    }

    .product-films-inner {
        width: min(1180px, calc(100% - 40px));
        margin: 0 auto;
    }

    .product-films-heading {
        max-width: 760px;
        margin: 0 0 clamp(28px, 4vw, 48px);
    }

    .product-films-heading span {
        display: block;
        color: #c91f2d;
        font-size: 0.85rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        margin-bottom: 0.7rem;
        text-transform: uppercase;
    }

    .product-films-heading h1 {
        margin: 0;
        color: #151515;
        font-size: clamp(2rem, 4vw, 3.8rem);
        font-weight: 800;
        line-height: 1.05;
    }

    .product-films-list {
        display: grid;
        gap: clamp(28px, 5vw, 64px);
    }

    .product-film-section {
        display: grid;
        grid-template-columns: minmax(240px, 0.68fr) minmax(320px, 1.32fr);
        gap: clamp(22px, 4vw, 52px);
        align-items: center;
        padding-top: clamp(24px, 4vw, 42px);
        border-top: 1px solid #d9dee3;
    }

    .product-film-section--reverse {
        grid-template-columns: minmax(320px, 1.32fr) minmax(240px, 0.68fr);
    }

    .product-film-section--reverse .product-film-copy {
        grid-column: 2;
        grid-row: 1;
    }

    .product-film-section--reverse .product-film-card__btn {
        grid-column: 1;
        grid-row: 1;
    }

    .product-film-copy {
        border-left: 4px solid #f2c300;
        padding-left: clamp(18px, 3vw, 30px);
    }

    .product-film-number {
        display: block;
        color: #c91f2d;
        font-size: 0.8rem;
        font-weight: 800;
        margin-bottom: 0.85rem;
    }

    .product-film-copy h2 {
        margin: 0 0 0.8rem;
        color: #111827;
        font-size: clamp(1.45rem, 2.4vw, 2.35rem);
        font-weight: 800;
        line-height: 1.12;
    }

    .product-film-copy p {
        max-width: 470px;
        margin: 0;
        color: #425466;
        font-size: 1rem;
        line-height: 1.65;
    }

    .product-film-card__btn {
        border: 0;
        background: #0d253f;
        color: #fff;
        border-radius: 0;
        padding: 0;
        width: 100%;
        overflow: hidden;
        position: relative;
        line-height: 0;
        cursor: pointer;
    }

    .product-film-card__btn:hover,
    .product-video-modal__close:hover {
        opacity: 0.9;
    }

    .product-film-preview {
        width: 100%;
        aspect-ratio: 16 / 5;
        object-fit: cover;
        display: block;
    }

    .product-film-play-overlay {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 58px;
        height: 58px;
        transform: translate(-50%, -50%);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #ffffff;
        background: rgba(201, 31, 45, 0.92);
        pointer-events: none;
    }

    .product-film-play-overlay::before {
        content: "";
        width: 0;
        height: 0;
        margin-left: 4px;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 16px solid #ffffff;
    }

    .product-video-modal {
        position: fixed;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 1rem;
    }

    .product-video-modal.is-open {
        display: flex;
    }

    .product-video-modal__overlay {
        position: absolute;
        inset: 0;
        background: rgba(7, 13, 24, 0.85);
        cursor: pointer;
    }

    .product-video-modal__dialog {
        position: relative;
        width: min(920px, 95vw);
        z-index: 1;
        background: transparent;
    }

    .product-video-modal__close {
        position: absolute;
        top: -14px;
        right: -14px;
        width: 34px;
        height: 34px;
        border: none;
        border-radius: 50%;
        background: #ffffff;
        color: #0f172a;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .product-video-modal__player {
        width: 100%;
        aspect-ratio: 16 / 9;
        border: 0;
        border-radius: 0;
        background: #000;
        display: block;
    }

    @media (max-width: 768px) {
        .product-films-inner {
            width: min(100% - 28px, 680px);
        }

        .product-film-section,
        .product-film-section--reverse {
            grid-template-columns: 1fr;
        }

        .product-film-section--reverse .product-film-copy,
        .product-film-section--reverse .product-film-card__btn {
            grid-column: auto;
            grid-row: auto;
        }

        .product-film-preview {
            aspect-ratio: 16 / 7;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('product-video-modal');
    const modalPlayer = document.getElementById('product-video-player');
    const buttons = document.querySelectorAll('[data-video-src]');
    const closeTriggers = document.querySelectorAll('[data-close-video]');

    const openModal = function (src) {
        modalPlayer.src = src;
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        modalPlayer.play().catch(function () {});
    };

    const closeModal = function () {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        modalPlayer.pause();
        modalPlayer.removeAttribute('src');
        modalPlayer.load();
    };

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            const src = button.getAttribute('data-video-src');
            if (src) {
                openModal(src);
            }
        });
    });

    closeTriggers.forEach(function (trigger) {
        trigger.addEventListener('click', closeModal);
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && modal.classList.contains('is-open')) {
            closeModal();
        }
    });
});
</script>

<?php
get_footer();
