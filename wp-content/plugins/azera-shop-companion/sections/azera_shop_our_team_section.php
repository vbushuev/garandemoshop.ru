<!-- =========================
 SECTION: TEAM   
============================== -->
<?php
	global $wp_customize;
	
	$azera_shop_our_team_show = get_theme_mod('azera_shop_our_team_show');
	
	$azera_shop_our_team_title = get_theme_mod('azera_shop_our_team_title',esc_html__('Our Team','azera-shop-companion'));
	$azera_shop_our_team_background = get_theme_mod('azera_shop_our_team_background',azera_shop_get_file('/images/background-images/parallax-img/team-img.jpg'));
	$azera_shop_our_team_subtitle = get_theme_mod('azera_shop_our_team_subtitle',esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','azera-shop-companion'));
	$azera_shop_team_content = get_theme_mod('azera_shop_team_content',
		json_encode(
			array(
					array('image_url' => azera_shop_get_file('/images/team/1.jpg'),'title' => esc_html__('Albert Jacobs','azera-shop-companion'),'subtitle' => esc_html__('Founder & CEO','azera-shop-companion')),
					array('image_url' => azera_shop_get_file('/images/team/2.jpg'),'title' => esc_html__('Tonya Garcia','azera-shop-companion'),'subtitle' => esc_html__('Account Manager','azera-shop-companion')),
					array('image_url' => azera_shop_get_file('/images/team/3.jpg'),'title' => esc_html__('Linda Guthrie','azera-shop-companion'),'subtitle' => esc_html__('Business Development','azera-shop-companion'))
			)
		)
	);

	/* If section is not disabled */
	if( isset($azera_shop_our_team_show) && $azera_shop_our_team_show != 1 ) {
	
		if( !empty($azera_shop_our_team_title) || !empty($azera_shop_our_team_subtitle) || !azera_shop_general_repeater_is_empty($azera_shop_team_content) ){
			
			if( !empty($azera_shop_our_team_background) ) {
				echo '<section class="team" id="team" role="region" aria-label="'.esc_html__('Team','azera-shop-companion').'" style="background:url('.$azera_shop_our_team_background.');">';
			}
			else {
				echo '<section class="team" id="team" role="region" aria-label="'.esc_html__('Team','azera-shop-companion').'">';
			}
	?>
				<div class="section-overlay-layer">
					<div class="container">

						<!-- SECTION HEADER -->
						<?php 
							if( !empty($azera_shop_our_team_title) || !empty($azera_shop_our_team_subtitle)){ ?>
								<div class="section-header">
								<?php
									if( !empty($azera_shop_our_team_title) ){
										echo '<h2 class="dark-text">'.esc_attr($azera_shop_our_team_title).'</h2><div class="colored-line"></div>';
									} elseif ( isset( $wp_customize )   ) {
										echo '<h2 class="dark-text azera_shop_only_customizer"></h2><div class="colored-line azera_shop_only_customizer"></div>';
									}

								?>

								<?php
									if( !empty($azera_shop_our_team_subtitle) ){
										echo '<div class="sub-heading">'.esc_attr($azera_shop_our_team_subtitle).'</div>';
									} elseif ( isset( $wp_customize )   ) {
										echo '<div class="sub-heading azera_shop_only_customizer"></div>';
									}
								?>
								</div>
						<?php 
							}
				

							if(!empty($azera_shop_team_content)){
								echo '<div class="row team-member-wrap">';
								$azera_shop_team_decoded = json_decode($azera_shop_team_content);
								foreach($azera_shop_team_decoded as $azera_shop_team_member){
									if( !empty($azera_shop_team_member->image_url) ||  !empty($azera_shop_team_member->title) || !empty($azera_shop_team_member->subtitle)){?>
										<div class="col-md-3 team-member-box">
											<div class="team-member border-bottom-hover">
												<div class="member-pic">
													<?php
														if( !empty($azera_shop_team_member->image_url)){
															if( !empty($azera_shop_team_member->title) ){
																echo '<img src="'.esc_url($azera_shop_team_member->image_url).'" alt="'.esc_attr($azera_shop_team_member->title).'">';
															} else {
																echo '<img src="'.esc_url($azera_shop_team_member->image_url).'" alt="'.esc_html__('Avatar','azera-shop-companion').'">';
															}
														} else {
															$default_url = azera_shop_get_file('/images/team/default.png');
															echo '<img src="'.$default_url.'" alt="'.esc_html__('Avatar','azera-shop-companion').'">';
														}
													?>
												</div><!-- .member-pic -->

												<?php if(!empty($azera_shop_team_member->title) || !empty($azera_shop_team_member->subtitle)){?>
												<div class="member-details">
													<div class="member-details-inner">
														<?php 
														if( !empty($azera_shop_team_member->title) ){
															if(function_exists('icl_t')){
																echo '<h5 class="colored-text">'.icl_t('Team',$azera_shop_team_member->id.'_team_title',esc_attr($azera_shop_team_member->title)).'</h5>';
															} else {
																echo '<h5 class="colored-text">'.esc_attr($azera_shop_team_member->title).'</h5>';
															}
														}
														if( !empty($azera_shop_team_member->subtitle) ){ ?>
															<div class="small-text">
																<?php
																	if(function_exists('icl_t')){
																		echo icl_t('Team',$azera_shop_team_member->id.'_team_subtitle',esc_attr($azera_shop_team_member->subtitle));
																	} else {
																		echo esc_attr($azera_shop_team_member->subtitle);
																	}
																?>	
															</div>

														<?php
														}
														?>
													</div><!-- .member-details-inner -->
												</div><!-- .member-details -->
												<?php } ?>
											</div><!-- .team-member -->
										</div><!-- .team-member -->         
										<!-- MEMBER -->
							<?php
									}
								}
								echo '</div>';
							}?>
					</div>
				</div><!-- container  -->
			</section><!-- #section9 -->
			
	<?php
		}
	/* If section is disabled, but we are in Customize, display section with class azera_shop_only_customizer */	
	} elseif( isset( $wp_customize ) ) {
		
		if( !empty($azera_shop_our_team_background) ) {
			echo '<section class="team azera_shop_only_customizer" id="team" role="region" aria-label="'.esc_html__('Team','azera-shop-companion').'" style="background:url('.$azera_shop_our_team_background.');">';
		}
		else {
			echo '<section class="team azera_shop_only_customizer" id="team" role="region" aria-label="'.esc_html__('Team','azera-shop-companion').'">';
		}
?>
			<div class="section-overlay-layer">
				<div class="container">

					<!-- SECTION HEADER -->
					<?php 
						if( !empty($azera_shop_our_team_title) || !empty($azera_shop_our_team_subtitle)){ ?>
							<div class="section-header">
							<?php
								if( !empty($azera_shop_our_team_title) ){
									echo '<h2 class="dark-text">'.esc_attr($azera_shop_our_team_title).'</h2><div class="colored-line"></div>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<h2 class="dark-text azera_shop_only_customizer"></h2><div class="colored-line azera_shop_only_customizer"></div>';
								}

							?>

							<?php
								if( !empty($azera_shop_our_team_subtitle) ){
									echo '<div class="sub-heading">'.esc_attr($azera_shop_our_team_subtitle).'</div>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<div class="sub-heading azera_shop_only_customizer"></div>';
								}
							?>
							</div>
					<?php 
						}
			

						if(!empty($azera_shop_team_content)){
							echo '<div class="row team-member-wrap">';
							$azera_shop_team_decoded = json_decode($azera_shop_team_content);
							foreach($azera_shop_team_decoded as $azera_shop_team_member){
								if( !empty($azera_shop_team_member->image_url) ||  !empty($azera_shop_team_member->title) || !empty($azera_shop_team_member->subtitle)){?>
									<div class="col-md-3 team-member-box">
										<div class="team-member border-bottom-hover">
											<div class="member-pic">
												<?php
													if( !empty($azera_shop_team_member->image_url)){
														if( !empty($azera_shop_team_member->title) ){
															echo '<img src="'.esc_url($azera_shop_team_member->image_url).'" alt="'.esc_attr($azera_shop_team_member->title).'">';
														} else {
															echo '<img src="'.esc_url($azera_shop_team_member->image_url).'" alt="'.esc_html__('Avatar','azera-shop-companion').'">';
														}
													} else {
														$default_url = azera_shop_get_file('/images/team/default.png');
														echo '<img src="'.$default_url.'" alt="'.esc_html__('Avatar','azera-shop-companion').'">';
													}
												?>
											</div><!-- .member-pic -->

											<?php if(!empty($azera_shop_team_member->title) || !empty($azera_shop_team_member->subtitle)){?>
											<div class="member-details">
												<div class="member-details-inner">
													<?php 
													if( !empty($azera_shop_team_member->title) ){
														if(function_exists('icl_t')){
															echo '<h5 class="colored-text">'.icl_t('Team',$azera_shop_team_member->id.'_team_title',esc_attr($azera_shop_team_member->title)).'</h5>';
														} else {
															echo '<h5 class="colored-text">'.esc_attr($azera_shop_team_member->title).'</h5>';
														}
													}
													if( !empty($azera_shop_team_member->subtitle) ){ ?>
														<div class="small-text">
															<?php
																if(function_exists('icl_t')){
																	echo icl_t('Team',$azera_shop_team_member->id.'_team_subtitle',esc_attr($azera_shop_team_member->subtitle));
																} else {
																	echo esc_attr($azera_shop_team_member->subtitle);
																}
															?>	
														</div>

													<?php
													}
													?>
												</div><!-- .member-details-inner -->
											</div><!-- .member-details -->
											<?php } ?>
										</div><!-- .team-member -->
									</div><!-- .team-member -->         
									<!-- MEMBER -->
						<?php
								}
							}
							echo '</div>';
						}?>
				</div>
			</div><!-- container  -->
		</section><!-- #section9 -->
		<?php
	}	
?>