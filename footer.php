<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Noddenhus
 */

?>
	</div><!-- #content -->
	
	
<a href="https://api.whatsapp.com/send?phone=+549114532-9391&text=Hola!%20Quiero%20comprar%20yerba!" target="_blank" class="whapp-button flex fixed bottom-0 right-0 pa2 ma4 z-5 main-bg-dark">
	<?php get_template_part('template-parts/content/whapp');?>
</a>

<style>

	.whapp-button {
		width: 60px;
    height: 60px;
    background-color: var(--mainDarkColor);
    border-radius: 100px;
		box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.16);
		transition: var(--smooth);
		transition-timming: .2s
	}

	.whapp-button:hover {
	transform: scale(1.1)
	}

	body.page-template-archive-product .whapp-button {
		bottom: 8%;
	}

	.whapp-button svg {
    width: 25px;
    margin: auto;
	}

	.whapp-button svg path{
		fill: white;
	}

	@media (max-width: 580px) {
		.whapp-button {
			margin: 20px;
		}
	}
</style>


<footer id="colophon">
		<div class="contain site-footer pa4 relative bg-main-light">

	<!-- <div class="absolute footer-bg">
			<img src='/wp-content/uploads/2021/05/s0NpXc-1.png'>
	</div>	 -->

		<div class="relative z-2">
			<h1	class="black tc center measure mt5 mb6 f2">Explorá nuestra sección de <span><a href="/faq" class="black ">preguntas frecuentes</a></span> o <span><a href="/contacto" class="black ">mandanos un mail</a></span> si tenes alguna consulta.</h1>

			<div class="flex items-start column-mobile">
					<?php get_template_part('template-parts/subscribe', get_post_type()); ?>

			<div class="w-20-ns tr">
				<div class=" mb3">
					<!-- <p class="black">+54 11 4815-3515</p>
					<p class="black">Mt. de Alverar 1799</p>
					<p class="black">CABA / Argentina</p> -->
				</div>

				<a href="https://instagram.com/noddenhus" target="_blank" class="ml-auto mr0 db">
						<?php get_template_part('template-parts/content/insta'); ?>
				</a>
			
			</div>
		

			</div>
			<div class="mt6 flex justify-between items-stretch">
					<div class="flex column-mobile ">
						<div class="flex flex-column footer-links">
							<a href="/shop/" class="black mr4 mb4 no-deco has-after">Productos</a>
							<a href="#" class="black mr4 mb4 no-deco has-after">Terminos y Condiciones</a>
							<a href="#" class="black mr4 mb4 no-deco has-after">Contacto</a>
						</div>
						<div class="flex-column footer-links mh4 dn">
							<a href="/exhibiciones/" class="white mr4 mb4 no-deco has-after">Exhibiciones</a>
							<a href="/upside/" class="white mr4 mb4 no-deco has-after">Upside</a>
							<a href="https://mirandabosch.com.ar" target="_blank" class="flex items-start white mr4 mb4 no-deco has-after">Ir a Real State
								<svg class="ml1" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 8L8 1M8 1H2M8 1V6.5" stroke="white"/>
								</svg>
							</a>
						</div>

						<div class="flex-column footer-links mh4 dn">
							<a href="/tienda/" class="white mr4 mb4 no-deco has-after">Shop</a>
							<a href="/contacto/" class="white mr4 mb4 no-deco has-after">Contacto</a>
							<a href="https://mirandabosch.com.ar" target="_blank" class="flex items-start white mr4 mb4 no-deco has-after">Política de Privacidad
								<svg class="ml1" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 8L8 1M8 1H2M8 1V6.5" stroke="white"/>
								</svg>
							</a>
						</div>
					</div>			
					<div class="flex flex-column justify-between">
						<div class="white-icons flex jic">
							<?php get_template_part('template-parts/assets/landing-icons');?>
						</div>
						<a href="https://marcopolo.agency" target="_blank" class="barba-prevent black by-marco no-deco mb4">Hecho por Marco Polo</a>
					</div>
					</div>
			</div>
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- <script src="https://unpkg.com/@barba/core"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>


<!-- Global site tag (gtag.js) - Google Ads: 10819135589 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10819135589"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10819135589');
</script>


<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W42H9M9');</script>
<!-- End Google Tag Manager -->


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W42H9M9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<?php wp_footer(); ?>

</body>
</html>
