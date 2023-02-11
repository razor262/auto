<?php
/*
Template Name: home
*/
?>

<?php get_header(); ?>
<section class="services">
  <div class="container">
    <h2 class="title">НАШИ УСЛУГИ</h2>
    <div class="services__inner">
      <div class="services__content">
          <?php the_field('service-text'); ?>
          <a class="button button--decor" href="#">КОНСУЛЬТАЦИЯ ЭКСПЕРТА</a>
      </div>
      <ol class="services__list">
          <?php the_field('service-item'); ?>
      </ol>
    </div>
  </div>
</section>


<section class="benefits">
  <div class="container">
    <div class="benefits__inner">
    <img data-wow-delay="2s" class="benefits__images wow animate__fadeInUp" src="<?php the_field('benefits-img'); ?>" alt="car">
      <!-- <img data-wow-delay="2s" class="benefits__images wow animate__fadeInUp" src="<?php bloginfo("template_url"); ?>/assets/images/car.png" alt="car"> -->
      <div class="benefits__content">
        <h2 class="title benefits__title">ПОЧЕМУ МЫ?</h2>
        <?php the_field('way_we_text'); ?>

      </div>
    </div>
  </div>
</section>


<section class="carousel">
  <div class="container">
    <h2 class="title">
      ПРИГНАННЫЕ НАМИ АВТО
    </h2>
    <div class="carousel__inner">

      <?php
      global $post;

      $myposts = get_posts([
        'numberposts' => -1,
        'category'    => 2
      ]);

      if ($myposts) {
        foreach ($myposts as $post) {
          setup_postdata($post);
      ?>
          <div class="carousel__item">
            <div class="carousel__item-box">
              <?php the_post_thumbnail(
                array(380, 250),
                array(
                  'class' => "carousel__item-img"
                )
              ); ?>
              <h4 class="carousel__item-title"><?php the_title(); ?></h4>
              <p class="carousel__item-text"><?php the_content(); ?></p>
            </div>
          </div>


      <?php }
      }
      wp_reset_postdata(); ?>






    </div>
  </div>
</section>



<section class="contacts">
  <div class="container">
    <div class="contacts__inner">
      <div class="contacts__info">
        <h2 class="title">
          КОНТАКТЫ
        </h2>
        <ul class="contacts__list">
          <li class="contacts__item">
            <p class="contacts__item-title">Адрес</p>
            <p class="contacts__item-text">
              <?php the_field('adress'); ?>
            </p>
          </li>
          <li class="contacts__item">
            <p class="contacts__item-title">Время работы</p>
            <p class="contacts__item-text">
            <?php the_field('working-hours'); ?>
            </p>
          </li>
          <li class="contacts__item">
            <p class="contacts__item-title">Телефон</p>
            <p class="contacts__item-text">
            <a  href="tel:<?php the_field('phone-number'); ?>"><?php the_field('phone'); ?></a>
            </p>
          </li>
        </ul>
      </div>
      <form class="contacts__form">
        <h2 class="title contacts__title">Оставить заявку</h2>
        <?php echo do_shortcode('[contact-form-7 id="142" title="Контактная форма"]') ?>
        <!-- <input class="contacts__input" type="text" placeholder="Как Вас зовут?">
        <input class="contacts__input" type="tel" placeholder="Ваш номер телефона">
        <button class="contacts__btn button" type="submit">Отправить заявку</button> -->
      </form>
    </div>
  </div>
</section>
<?php get_footer(); ?>