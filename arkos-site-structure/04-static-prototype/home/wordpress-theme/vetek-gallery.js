(function () {
  document.querySelectorAll('.vetek-product-page').forEach(function (page) {
    var mainImage = page.querySelector('.vetek-product-main__image');
    var thumbnails = page.querySelectorAll('.vetek-product-thumb[data-image]');

    if (!mainImage || !thumbnails.length) {
      return;
    }

    thumbnails.forEach(function (thumbnail) {
      thumbnail.addEventListener('click', function () {
        var nextImage = thumbnail.getAttribute('data-image');

        if (!nextImage || mainImage.getAttribute('src') === nextImage) {
          return;
        }

        mainImage.setAttribute('src', nextImage);
        thumbnails.forEach(function (item) {
          item.classList.remove('is-active');
        });
        thumbnail.classList.add('is-active');
      });
    });
  });
}());
