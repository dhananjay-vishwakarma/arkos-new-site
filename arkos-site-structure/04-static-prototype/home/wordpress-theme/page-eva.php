<?php
get_header();

while (have_posts()) {
    the_post();
?>

<article class="vetek-product-page legacy-lubricant-page go-range-page">
  <section class="legacy-lubricant-intro legacy-lubricant-intro--image legacy-lubricant-intro--no-overlay" style="background-image: url(https://arkos.in/wp-content/uploads/2023/08/Arkos_eva_banner.jpg);">
    <div class="real-section__inner"></div>
  </section>

  <section class="legacy-lubricant-summary go-range-summary">
    <div class="real-section__inner go-range-summary__grid">
      <figure class="go-range-summary__logo">
        <img src="https://arkos.in/wp-content/uploads/2022/10/Eva-Logonew-1.png" alt="Arkos Gripp Eva" />
      </figure>
      <div>
        <h2>Segment: Electric Vehicle Tyres</h2>
        <p>With the Evolving Electric 3 Wheeler Market and India promoting electric vehicles for its fleet of public transportation that offers affordability and manoeuvrability across congested urban and rural roads.</p>
        <p>In Order to cater to the Electric 3 Wheeler Market, Arkos Gripp range of EVA tyres are being introduced. EVA range of tyres provide Excellent Durability/Better Wet Traction and Braking for Electric 3 Wheelers. Rigidity in tyres ensures smooth rides along with advanced load carrying capacity.</p>
      </div>
    </div>
  </section>
</article>

<?php
}

get_footer();
