<?php
/*

Template Name: Consultoria

*/
?>




	<!-- CONTENT -->
	<div class="content-two left">
		<div class="wrapper">
			<div class="bg-content left fullwidth">


				<div class="title-page left">
					<div class="title-breadcrambs left">
						<h1><?php the_title(); ?></h1>
						<h2>Junte-se à segurança de mais de 132 clientes satisfeitos em 20 anos de experiência na área de implementações ao redor de todo o Brasil.</h2>
					</div>
				</div><!--/title-page-->



				<div class="shortcodes left">

					<h3>Certificações:</h3>
					<ul>
						<li>ISO 9001</li>
						<li>ISO 14001</li>
						<li>ISO 45001</li>
						<li>SASSMAQ</li>
						<li>PBQP-H</li>
					</ul>

					  <?php
							wp_reset_query();
							if ( have_posts() ) : while ( have_posts() ) : the_post();
									the_content();
								endwhile;
							else:
							endif;
							wp_reset_query();
						?>

				</div><!-- /shortcodes-right -->



			</div><!--/bg-content-->

			<div class="content-border left"></div><!--/content-border-->
		</div><!--/wrapper-->
	</div><!--/content-two-->






<?php //get_footer(); ?>