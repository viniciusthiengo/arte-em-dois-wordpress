<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
$wl_nls_options = weblizar_nls_get_options();?> <!-- Call the option setting -->
<div class="col-xs-8 tab-content" id="spa_general"> <!-- plugin dashboard Main class div setting -->
	<div class="tab-pane col-md-12 block ui-tabs-panel active" id="templates-option"> <!-- plugin template selection setting -->	
		<div class="col-md-12 option">		
			<h1><?php _e('Templates Options', NLS_TEXT_DOMAIN );?></h1>
			<div class="tab-content">
				<div id="weblizar-template" class="tab-pane fade in active"><!-- plugin template free theme layout selection setting -->		
					<form method="post" id="weblizar_nls_template_option">
						<div class="activation col-md-12 form-group">
							<ul class="instruction_points theme_msg_heading">
								<li><?php _e('Use Shortcode = [nls_form] to show subscriber form at post and page.', NLS_TEXT_DOMAIN ); ?></li>
								<li><?php _e('Use Shortcode with Theme = [nls_theme1] to show subscriber form with theme 1 at post and page for theme 2 use [nls_theme2].', NLS_TEXT_DOMAIN ); ?></li>
								<li><?php _e('You can also use Newsletter Widget menu at widget section.', NLS_TEXT_DOMAIN ); ?></li>
							</ul>
						</div>
						<div class="col-md-12 form-group">
						<ul class="instruction_points theme_msg_heading">
								<li><?php _e('Activate ( Theme Switch ): ', NLS_TEXT_DOMAIN );?><span class="theme_msg"><?php _e('First select any below theme, then click on activate button.', NLS_TEXT_DOMAIN );?></span></li>	
								<li><?php _e('Restore Defaults : ', NLS_TEXT_DOMAIN );?><span class="theme_msg"><?php _e('Restored the default data of only theme and layout section', NLS_TEXT_DOMAIN );?></span></li>	
								<li><?php _e('Restored all settings : ', NLS_TEXT_DOMAIN );?><span class="theme_msg"><?php _e('Restored the default data of all sections. excluding the subscribers data table', NLS_TEXT_DOMAIN );?></span></li>	
							</ul>
						</div>
						<div class="activation col-md-12 form-group">
							<div class="col-md-12 restored">
								<input type="hidden" value="1" id="weblizar_nls_settings_save_template_option" name="weblizar_nls_settings_save_template_option" />
								<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_reset('template_option');">
								<input class="button theme_activate button-primary left" name="theme_activate" type="button" value="<?php _e('Activate', NLS_TEXT_DOMAIN );?>" id="theme-activation">
								<input class="button right all-restored" type="button" name="restored" value="<?php _e('Restored all settings', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_restored('template_option');">
							</div>
						</div>
						<input type="hidden" class="form-control" name="select_template" id="select_template" value="<?php echo $wl_nls_options['select_template']; ?>" readonly />					
						<div class="template-selection col-md-12 form-group">
						<?php for($i=1; $i<=2; $i++){ ?>
						<div class="col-md-6 col-sm-6 op_tem site_template <?php if($wl_nls_options['select_template']=='select_template'.$i) echo 'active'; ?>" id="select_template<?php echo $i?>">	
							<div class="col-md-12 selected_template <?php if($wl_nls_options['select_template']=='select_template'.$i) echo 'active'; ?>">	
								<div class="row op_show" data-orient="top">
									<div class="op_weblizar-pics-activated">
										<span class="image-shop-scroll" style="background-image: url('<?php echo plugin_dir_url( __FILE__ ).'images/screen-shot'.$i.'.png';?>" ></span>
									</div>
								</div>
								<h4 class="op_name"><?php _e('Theme', NLS_TEXT_DOMAIN );?><?php echo $i; ?></h4>
								<?php if($wl_nls_options['select_template']=='select_template'.$i) { ?>
								<span class="op_name1 green"><span class="activate"> <?php _e('Activated', NLS_TEXT_DOMAIN ); ?></span>
								</span>
								<?php } else{  ?>
								<span class="op_name1 blue"><span class="activate"> <h3><?php _e('Selected !!!', NLS_TEXT_DOMAIN );?> </h3> </br> <p><?php _e('Please Click On Activate Button', NLS_TEXT_DOMAIN );?></p> </span>
								</span>
								<?php } ?>
							</div>
						</div>
						<?php } ?>	
						<?php for($i=3; $i<=6; $i++){ ?>
						<div class="col-md-6 col-sm-6 op_tem site_template" id="select_template<?php echo $i?>">	
							<div class="selected_template">	
								<div class="row op_show" data-orient="top">
									<div class="op_weblizar-pics">
										<span class="image-shop-scroll" style="background-image: url('<?php echo plugin_dir_url( __FILE__ ).'images/screen-shot'.$i.'.png';?>" ></span>
									</div>
								</div>
								<h4 class="op_name"><?php _e('Template '.$i,NLS_TEXT_DOMAIN);?></h4>
								<span class="op_name1 blue"><span class="activate"><h3><?php _e('Available In Pro Version!!!',NLS_TEXT_DOMAIN);?> 
								</h3> </br><a class="btn btn-success pro-link" target="_new" href="https://weblizar.com/plugins/newsletter-subscription-form-pro/" rel="nofollow"><?php _e('Get Pro Plugin',NLS_TEXT_DOMAIN);?> </a> </span>
								</span>
							</div>
						</div>
						<?php } ?>	
						</div>
					</form>								
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane col-md-12 block ui-tabs-panel deactive" id="skin-layout-settings"><!-- plugin General selection setting -->		
		<div class="col-md-12 option">
			<h1><?php _e('Skin Color Settings', NLS_TEXT_DOMAIN ); ?></h1>
			<div class="tab-content">									
				<div id="skin-layout" class="tab-pane fade in active"> <!-- Appearance selection setting -->
					<form method="post" id="weblizar_nls_skin-layout_option">	
						<div class="col-md-12 form-group">
							<div class="col-md-6 no-pad">
								<div class="col-md-6">
								<label><?php _e('Theme Color Schemes', NLS_TEXT_DOMAIN ); ?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Select color Schemes for page theme layout.', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label></br>
								<?php $theme_color_schemes =$wl_nls_options['theme_color_schemes'];?>
								<select id="theme_color_schemes" name="theme_color_schemes" class="form-control">
									<option value="custom_colors" <?php echo selected($theme_color_schemes, 'custom_colors' ); ?> ><?php _e('Custom Color', NLS_TEXT_DOMAIN ); ?></option>
									<option value="default_color" <?php echo selected($theme_color_schemes, 'default_color' ); ?> ><?php _e('Default Color', NLS_TEXT_DOMAIN ); ?></option>
								</select>
								</div>
							</div>
							<div class="col-md-6 no-pad custom_color-option <?php if($wl_nls_options['theme_color_schemes']=='default_color') echo "active"; ?>" id="default_color">
								<div class="col-md-6">
								<?php $default_color_schemes =$wl_nls_options['default_color_schemes'];?>
								<label><?php _e('Default Color', NLS_TEXT_DOMAIN ); ?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Select default color for you theme.', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label></br>
								<select id="default_color_schemes" name="default_color_schemes" class="form-control">
									<option value="#eb5054" <?php echo selected($default_color_schemes, '#eb5054' ); ?> ><?php _e('Default', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#136597" <?php echo selected($default_color_schemes, '#136597' ); ?> ><?php _e('Blue', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#1ABC9c" <?php echo selected($default_color_schemes, '#1ABC9c' ); ?> ><?php _e('Green', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#f8504b" <?php echo selected($default_color_schemes, '#f8504b' ); ?> ><?php _e('Red', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#d63861" <?php echo selected($default_color_schemes, '#d63861' ); ?> ><?php _e('Pink', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#FFA500" <?php echo selected($default_color_schemes, '#FFA500' ); ?> ><?php _e('Orange', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#5c4b51" <?php echo selected($default_color_schemes, '#5c4b51' ); ?> ><?php _e('Brown', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#9370DB" <?php echo selected($default_color_schemes, '#9370DB' ); ?> ><?php _e('Purple', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#0ac2d2" <?php echo selected($default_color_schemes, '#0ac2d2' ); ?> ><?php _e('Sky-Blue', NLS_TEXT_DOMAIN ); ?></option>
									<option value="#f17d8a" <?php echo selected($default_color_schemes, '#f17d8a' ); ?> ><?php _e('Litered', NLS_TEXT_DOMAIN ); ?></option>
								</select>
								</div>
							</div>
							<div class="col-md-6 custom_color-option <?php if($wl_nls_options['theme_color_schemes']=='custom_colors') echo "active"; ?>" id="custom_colors">
								<label><?php _e('Custom Color', NLS_TEXT_DOMAIN );?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Enable Custom color Schemes and set your color Schemes using color picker.', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label></br>
								<div class="col-md-6 no-pad">
									<input class="color no-sliders" name="custom_color_schemes" id="custom_color_schemes" value="<?php echo $wl_nls_options['custom_color_schemes']; ?>" type="text">
								</div>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<div class="col-md-6 no-pad">
								<div class="col-md-6">
									<label><?php _e('Template Font Family', NLS_TEXT_DOMAIN );?></label>
								</div>
								<div class="col-md-6">	
									<?php $theme_font = $wl_nls_options['theme_font_family'];
									$google_font= array('Arial','Arial Black','Courier New','georgia','Grande','Helvetica Neue','Impact','Lucida','Lucida Grande','OpenSansBold','Palatino','Sans','Sans-Serif','Tahoma','Times New Roman','Trebuchet','Verdana','Abel','Abril Fatface','Aclonica','Acme','Actor','Adamina','Advent Pro','Aguafina Script','Aladin','Aldrich','Alegreya','Alegreya SC','Alex Brush','Alfa Slab One','Alice','Alike','Alike Angular','Allan','Allerta','Allerta Stencil','Allura','Almendra','Almendra SC','Amaranth','Amethysta','Andika','Angkor','Annie Use Your Telescope','Anonymous Pro','Antic','Antic Didone','Antic Slab','Anton','Arapey','Arbutus','Architects Daughter','Arimo','Arizonia','Armata','Artifika','Arvo','Asap','Asset','Astloch','Asul','Atomic Age','Aubrey','Audiowide','Average','Averia Gruesa Libre','Averia Libre','Averia Sans Libre','Averia Serif Libre','Bad Script','Balthazar','Bangers','Basic','Battambang','Baumans','Bayon','Belgrano','Belleza','Bentham','Berkshire Swash','Bevan','Bigshot One','Bilbo','Bilbo Swash Caps','Bitter','Black Ops One','Bokor','Bonbon','Boogaloo','Bowlby One','Bowlby One SC','Brawler','Bree Serif','Bubblegum Sans','Buda','Buenard','Butcherman','Butterfly Kids','Cabin','Cabin Condensed','Cabin Sketch','Caesar Dressing','Cagliostro','Calligraffitti','Cambo','Candal','Cantarell','Cantata One','Cardo','Carme','Carter One','Caudex','Cedarville Cursive','Ceviche One','Changa One','Chango','Chau Philomene One','Chelsea Market','Chenla','Cherry Cream Soda','Chewy','Chicle','Chivo','Coda','Coda Caption','Codystar','Comfortaa','Coming Soon','Concert One','Condiment','Content','Contrail One','Convergence','Cookie','Copse','Corben','Courgette','Cousine','Coustard','Covered By Your Grace','Crafty Girls','Creepster','Crete Round','Crimson Text','Crushed','Cuprum','Cutive','Damion','Dancing Script','Dangrek','Dawning of a New Day','Days One','Delius','Delius Swash Caps','Delius Unicase','Della Respira','Devonshire','Didact Gothic','Diplomata','Diplomata SC','Doppio One','Dorsa','Dosis','Dr Sugiyama','Droid Sans','Droid Sans Mono','Droid Serif','Duru Sans','Dynalight','EB Garamond','Eater','Economica','Electrolize','Emblema One','Emilys Candy','Engagement','Enriqueta','Erica One','Esteban','Euphoria Script','Ewert','Exo','Expletus Sans','Fanwood Text','Fascinate','Fascinate Inline','Federant','Federo','Felipa','Fjord One','Flamenco','Flavors','Fondamento','Fontdiner Swanky','Forum','Francois One','Fredericka the Great','Fredoka One','Freehand','Fresca','Frijole','Fugaz One','GFS Didot','GFS Neohellenic','Galdeano','Gentium Basic','Gentium Book Basic','Geo','Geostar','Geostar Fill','Germania One','Give You Glory','Glass Antiqua','Glegoo','Gloria Hallelujah','Goblin One','Gochi Hand','Gorditas','Goudy Bookletter 191','Graduate','Gravitas One','Great Vibes','Gruppo','Gudea','Habibi','Hammersmith One','Handlee','Hanuman','Happy Monkey','Henny Penny','Herr Von Muellerhoff','Holtwood One SC','Homemade Apple','Homenaje','IM Fell DW Pica','IM Fell DW Pica SC','IM Fell Double Pica','IM Fell Double Pica SC','IM Fell English','IM Fell English SC','IM Fell French Canon','IM Fell French Canon SC','IM Fell Great Primer','IM Fell Great Primer SC','Iceberg','Iceland','Imprima','Inconsolata','Inder','Indie Flower','Inika','Irish Grover','Istok Web','Italiana','Italianno','Jim Nightshade','Jockey One','Jolly Lodger','Josefin Sans','Josefin Slab','Judson','Julee','Junge','Jura','Just Another Hand','Just Me Again Down Here','Kameron','Karla','Kaushan Script','Kelly Slab','Kenia','Khmer','Knewave','Kotta One','Koulen','Kranky','Kreon','Kristi','Krona One','La Belle Aurore','Lancelot','Lato','League Script','Leckerli One','Ledger','Lekton','Lemon','Lilita One','Limelight','Linden Hill','Lobster','Lobster Two','Londrina Outline','Londrina Shadow','Londrina Sketch','Londrina Solid','Lora','Love Ya Like A Sister','Loved by the King','Lovers Quarrel','Luckiest Guy','Lusitana','Lustria','Macondo','Macondo Swash Caps','Magra','Maiden Orange','Mako','Marck Script','Marko One','Marmelad','Marvel','Mate','Mate SC','Maven Pro','Meddon','MedievalSharp','Medula One','Megrim','Merienda','Merienda One','Merriweather','Metal','Metamorphous','Metrophobic','Michroma','Miltonian','Miltonian Tattoo','Miniver','Miss Fajardose','Modern Antiqua','Molengo','Monofett','Monoton','Monsieur La Doulaise','Montaga','Montez','Montserrat','Moul','Moulpali','Mountains of Christmas','Mr Bedfort','Mr Dafoe','Mr De Haviland','Mrs Saint Delafield','Mrs Sheppards','Muli','Mystery Quest','Neucha','Neuton','News Cycle','Niconne','Nixie One','Nobile','Nokora','Norican','Nosifer','Nothing You Could Do','Noticia Text','Nova Cut','Nova Flat','Nova Mono','Nova Oval','Nova Round','Nova Script','Nova Slim','Nova Square','Numans','Nunito','Odor Mean Chey','Old Standard TT','Oldenburg','Oleo Script','Open Sans','Open Sans Condensed','Orbitron','Original Surfer','Oswald','Over the Rainbow','Overlock','Overlock SC','Ovo','Oxygen','PT Mono','PT Sans','PT Sans Caption','PT Sans Narrow','PT Serif','PT Serif Caption','Pacifico','Parisienne','Passero One','Passion One','Patrick Hand','Patua One','Paytone One','Permanent Marker','Petrona','Philosopher','Piedra','Pinyon Script','Plaster','Play','Playball','Playfair Display','Podkova','Poiret One','Poller One','Poly','Pompiere','Pontano Sans','Port Lligat Sans','Port Lligat Slab','Prata','Preahvihear','Press Start 2P','Princess Sofia','Prociono','Prosto One','Puritan','Quantico','Quattrocento','Quattrocento Sans','Questrial','Quicksand','Qwigley','Radley','Raleway','Rammetto One','Rancho','Rationale','Redressed','Reenie Beanie','Revalia','Ribeye','Ribeye Marrow','Righteous','Rochester','Rock Salt','Rokkitt','Ropa Sans','Rosario','Rosarivo','Rouge Script','Ruda','Ruge Boogie','Ruluko','Ruslan Display','Russo One','Ruthie','Sail','Salsa','Sancreek','Sansita One','Sarina','Satisfy','Schoolbell','Seaweed Script','Sevillana','hadows Into Light','Shadows Into Light Two','Shanti','Share','Shojumaru','Short Stack','Siemreap','Sigmar One','Signika','Signika Negative','Simonetta','Sirin Stencil','Six Caps','Slackey','Smokum','Smythe','Sniglet','Snippet','Sofia','Sonsie One','Sorts Mill Goudy','Special Elite','Spicy Rice','Spinnaker','Spirax','Squada One','Stardos Stencil','Stint Ultra Condensed','Stint Ultra Expanded','Stoke','Sue Ellen Francisco','Sunshiney','Supermercado One','Suwannaphum','Swanky and Moo Moo','Syncopate','Tangerine','Taprom','Telex','Tenor Sans','The Girl Next Door','Tienne','Tinos','Titan One','Trade Winds','Trocchi','Trochut','Trykker','Tulpen One','Ubuntu','Ubuntu Condensed','Ubuntu Mono','Ultra','Uncial Antiqua','UnifrakturCook','UnifrakturMaguntia','Unkempt','Unlock','Unna','VT323','Varela','Varela Round','Vast Shadow','Vibur','Vidaloka','Viga','Voces','Volkhov','Vollkorn','Voltaire','Waiting for the Sunrise','Wallpoet','Walter Turncoat','Wellfleet','Wire One','Yanone Kaffeesatz','Yellowtail','Yeseva One','Yesteryear','Zeyada',);?>				
									<select name="theme_font_family" id="theme_font_family" class="form-group">
										<?php foreach( $google_font as $font) { ?>
											<option value="<?php echo $font; ?>" <?php echo selected($theme_font, $font ); ?>><?php echo $font; ?></option>
										<?php } ?>
									</select>														
								</div>
							</div>	
							<div class="col-md-12 no-pad">
								<div class="col-md-6 no-pad">
									<div class="col-md-12">
										<h3><?php _e('All Section Settings', NLS_TEXT_DOMAIN );?>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Settings for all service, team, testimonials and others section', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										</h3></br>
									</div>
									<div class="col-md-6">
										<strong><?php _e('Headings Font Size ( H2 )', NLS_TEXT_DOMAIN );?></strong>
									</div>
									<div class="col-md-6">
										<div class="col-md-4">
											<input name="section_heading_size" id="section_heading_size" class="form-control" value="<?php echo $wl_nls_options['section_heading_size']; ?>" type="text">
										</div>
										<div class="col-md-2 style_sp">
											<span class="style_vl">PX</span>
										</div>
									</div>
									<div class="col-md-6">
										<strong><?php _e('Icon Size', NLS_TEXT_DOMAIN );?></strong>
									</div>
									<div class="col-md-6">
										<div class="col-md-4">
											<input name="section_icon_size" id="section_icon_size" class="form-control" value="<?php echo $wl_nls_options['section_icon_size']; ?>" type="text">
										</div>
										<div class="col-md-2 style_sp">
											<span class="style_vl">PX</span>
										</div>
									</div>
									<div class="col-md-6">
										<strong><?php _e('Sub Headings Font Size ( H4 )', NLS_TEXT_DOMAIN );?></strong>
									</div>
									<div class="col-md-6">
										<div class="col-md-4">
											<input name="section_sub_heading_size" id="section_sub_heading_size" class="form-control" value="<?php echo $wl_nls_options['section_sub_heading_size']; ?>" type="text">
										</div>
										<div class="col-md-2 style_sp">
											<span class="style_vl">PX</span>
										</div>
									</div>
									<div class="col-md-6">
										<strong><?php _e('description Font Size ( P )', NLS_TEXT_DOMAIN );?></strong>
									</div>
									<div class="col-md-6">
										<div class="col-md-4">
											<input name="section_description_size" id="section_description_size" class="form-control" value="<?php echo $wl_nls_options['section_description_size']; ?>" type="text">
										</div>
										<div class="col-md-2 style_sp">
											<span class="style_vl">PX</span>
										</div>
									</div>								
								</div>								
							</div>
						</div>	
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_nls_settings_save_skin-layout_option" name="weblizar_nls_settings_save_skin-layout_option" />			
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_reset('skin-layout_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_save('skin-layout_option')" >
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane col-md-12 block ui-tabs-panel deactive" id="social-option"> <!-- Social Media setting -->
		<div class="col-md-12 option">
			<h1><?php _e('Social Media', NLS_TEXT_DOMAIN );?></h1>
			<div class="tab-content">
				<div id="page-social" class="tab-pane fade in active"> <!-- Social link and icon setting -->
					<form action="post" id="weblizar_nls_social_option">
						<div class="col-md-12 form-group">
							<label><?php _e('Social Icons', NLS_TEXT_DOMAIN );?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Social Icons on Header On/OFF', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							<br/>
							<div class="col-md-6">
							<label class="checkbox-inline">
							<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_nls_options['social_icons_onoff']=='on') echo "checked='unchecked'"; ?> id="social_icons_onoff" name="social_icons_onoff" >
							</label>
							</div>											
						</div>										
						<div class="social-option <?php if($wl_nls_options['social_icons_onoff']=='on') echo "active"; ?>" id="nls_social">		
							<div id="nls_social_fields">
							<?php									
							if(isset($wl_nls_options['total_Social_links'])){
								for($i=1;$i<=$wl_nls_options['total_Social_links']; $i++){	?>
								<div class="col-md-12 form-group" id="nls_social-<?php echo $i;?>">
									<div class="row">
										<label><?php _e('Social Icon', NLS_TEXT_DOMAIN );?><?php echo ' '.$i; ?></label><br/>
										<div class="col-md-6">
											<input  class="form-control" type="text" name="social_icon_<?php echo $i;?>" id="social_icon_<?php echo $i;?>"  value="<?php echo $wl_nls_options['social_icon_'.$i]; ?>" >
											<label><?php _e('Get more font-awesome icon ',NLS_TEXT_DOMAIN); ?><a href="http://fontawesome.io/icons/" target="_blank"><?php _e('click here',NLS_TEXT_DOMAIN); ?></a></label>
										</div>
										<div class="col-md-6">
											<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Enter FontAwesome Social Icon Here', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										</div>
									</div>
									<div class="row">
										<label><?php _e('Color', NLS_TEXT_DOMAIN );?><?php echo ' '.$i; ?></label><br/>
										<div class="col-md-2">
											<input  class="color no-sliders" type="text" name="social_icolor_<?php echo $i;?>" id="social_icolor_<?php echo $i;?>"  value="<?php echo $wl_nls_options['social_icolor_'.$i]; ?>" >
										</div>
										<div class="col-md-10">
											<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Enter Social Icon and Background Color Here', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										</div>
									</div>
									<div class="row">
										<label><?php _e('Link', NLS_TEXT_DOMAIN );?><?php echo ' '.$i; ?></label><br/>
										<div class="col-md-6">
											<input  class="form-control" type="text" name="social_link_<?php echo $i;?>" id="social_link_<?php echo $i;?>"  value="<?php echo $wl_nls_options['social_link_'.$i]; ?>" >
											<label><?php _e('Open As New Tab  ', NLS_TEXT_DOMAIN );?></label>
											<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_nls_options['social_link_tab_'.$i]=='on') echo "checked='unchecked'"; ?> id="social_link_tab_<?php echo $i;?>" name="social_link_tab_<?php echo $i;?>" >
											<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Link Open Into New Tab ON/OFF","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										</div>
										<div class="col-md-6">
											<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter Social Link Here","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										</div>
									</div>
								</div>
								<?php } } ?>
							</div>
						</div>
						<input type="hidden"type="text" id="total_Social_links" name="total_Social_links" value="<?php echo $wl_nls_options['total_Social_links']; ?>" />
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_nls_settings_save_social_option" name="weblizar_nls_settings_save_social_option" />			
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_reset('social_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_save('social_option')" >
						</div>											
					</form>
				</div>
			</div>
		</div>	
	</div>					
	<!-- Subscriber Form option setting -->
	<div class="tab-pane col-md-12 block ui-tabs-panel deactive" id="subscriber-settings">	<!-- Subscriber Form general settings -->	
		<div class="col-md-12 option">
			<h1><?php _e('Subscribers Settings', NLS_TEXT_DOMAIN ); ?></h1>
			<div class="tab-content">
				<form action="post" id="weblizar_nls_subscriber_option">
					<div class="col-md-12 form-group">
						<h4><?php _e('Subscriber Section Settings', NLS_TEXT_DOMAIN ); ?></h4><br/>
						<div class="row">
							<label><?php _e('Title', NLS_TEXT_DOMAIN ); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Type here subscriber form Heading', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							<br/>
							<div class="col-md-6">
								<input  class="form-control" type="text" name="subscriber_form_title" id="subscriber_form_title"  value="<?php echo $wl_nls_options['subscriber_form_title']; ?>" >
							</div>
						</div>
						<div class="row">
							<label><?php _e('Font Awesome Icons', NLS_TEXT_DOMAIN ); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Type here subscriber form Sub Heading', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							<br/>						
							<div class="col-md-6">
								<input  class="form-control" type="text" name="subscriber_form_icon" id="subscriber_form_icon"  value="<?php echo $wl_nls_options['subscriber_form_icon']; ?>" >
							</div>
							<label><?php _e('Get more font-awesome icon',NLS_TEXT_DOMAIN); ?> <a href="http://fontawesome.io/icons/" target="_blank"><?php _e('click here</a>   ',NLS_TEXT_DOMAIN); ?></label>
						</div>
						<div class="row">
							<label><?php _e('Sub Title', NLS_TEXT_DOMAIN ); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Type here subscriber form Sub Heading', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							<br/>
							<div class="col-md-6">
								<input  class="form-control" type="text" name="subscriber_form_sub_title" id="subscriber_form_sub_title"  value="<?php echo $wl_nls_options['subscriber_form_sub_title']; ?>" >
							</div>
						</div>													
						<div class="row">
							<label><?php _e('Message', NLS_TEXT_DOMAIN ); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Type here subscriber form  Message', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							<br/>
							<div class="col-md-6">
								<textarea class="form-control" rows="8" cols="8" id="subscriber_form_message" name="subscriber_form_message" ><?php if($wl_nls_options['subscriber_form_message']!='') { echo esc_attr($wl_nls_options['subscriber_form_message']); } ?></textarea>														
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<h4><?php _e('Subscriber Form Settings', NLS_TEXT_DOMAIN ); ?>
						<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Type here subscriber form  Setting', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
						<br/></h4>								
						<div class="col-md-12 checkbox">
							<div class="col-md-4">
								<label><?php _e('Show First and Last Name', NLS_TEXT_DOMAIN );?>	</label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e('Enable to enter first and last name to user in form ', NLS_TEXT_DOMAIN ); ?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							</div>
							<div class="col-md-2">
								<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_nls_options['subscriber_form']=='on') echo "checked='unchecked'"; ?> id="subscriber_form" name="subscriber_form" >
							</div>
						</div>
						<div class="subscriber-option <?php if($wl_nls_options['subscriber_form'] == 'on') echo "active"; ?>" id="nls_subscriber">
							<div class="col-md-12 checkbox">
								<div class="col-md-4">
									<label><?php _e('First Name Placeholder ', NLS_TEXT_DOMAIN );?></label>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" name="sub_form_button_f_name" id="sub_form_button_f_name" value="<?php echo $wl_nls_options['sub_form_button_f_name']; ?>" size="20">
								</div>
							</div>
							<div class="col-md-12 checkbox">						
								<div class="col-md-4">
									<label><?php _e('Last Name Placeholder ', NLS_TEXT_DOMAIN );?></label>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" name="sub_form_button_l_name" id="sub_form_button_l_name" value="<?php echo $wl_nls_options['sub_form_button_l_name']; ?>" size="20">
								</div>
							</div>	
						</div>	
						<div class="col-md-12 checkbox">						
							<div class="col-md-4">
								<label><?php _e('Button Text', NLS_TEXT_DOMAIN );?></label>
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="sub_form_button_text" id="sub_form_button_text" value="<?php echo $wl_nls_options['sub_form_button_text']; ?>" size="20">
							</div> 					
						</div>				
						<div class="col-md-12 checkbox">
							<div class="col-md-4">
								<label><?php _e('Email Placeholder ', NLS_TEXT_DOMAIN );?></label>
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="sub_form_subscribe_title" id="sub_form_subscribe_title" value="<?php echo $wl_nls_options['sub_form_subscribe_title']; ?>" size="20">						
							</div>					
						</div>											
						<div class="col-md-12 checkbox">
							<div class="col-md-4">
								<label><?php _e('Button Hover Text Color', NLS_TEXT_DOMAIN );?></label>
							</div>
							<div class="col-md-2">
								<input type="text" class="color no-sliders" name="sub_form_button_ht_color" id="color" value="<?php echo $wl_nls_options['sub_form_button_ht_color']; ?>" />
							</div>
						</div>
						<div class="col-md-12 checkbox">
							<div class="col-md-4">
								<label><?php _e('Button Hover Background Color', NLS_TEXT_DOMAIN );?></label>
							</div>
							<div class="col-md-2">
								<div class="color-picker" style="position: relative;">
									<input type="text" class="color no-sliders" name="sub_form_button_hb_color" id="color" value="<?php echo $wl_nls_options['sub_form_button_hb_color']; ?>" />
								</div>	
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<label><?php _e('Subscribe Success Message', NLS_TEXT_DOMAIN );?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text message for Subscribed Success Message","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>							
								<input type="text" class="form-control" name="sub_form_subscribe_seuccess_message" id="sub_form_subscribe_seuccess_message" value="<?php echo $wl_nls_options['sub_form_subscribe_seuccess_message']; ?>">
							</div>
						</div>					
						<div class="col-md-12">
							<div class="col-md-6">
								<label><?php _e('Subscribe Invalid Message', NLS_TEXT_DOMAIN );?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text for Invalid Email Id Message","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>							
								<input type="text" class="form-control" name="sub_form_subscribe_invalid_message" id="sub_form_subscribe_invalid_message" value="<?php echo $wl_nls_options['sub_form_subscribe_invalid_message']; ?>">
							</div>
						</div>					
						<div class="col-md-12">
							<div class="col-md-6">
								<label><?php _e('Subscribe After Confirmation Success Message', NLS_TEXT_DOMAIN );?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text for a confirmation message.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>							
								<input type="text" class="form-control" name="sub_form_subscribe_confirm_success_message" id="sub_form_subscribe_confirm_success_message" value="<?php echo $wl_nls_options['sub_form_subscribe_confirm_success_message']; ?>">
							</div>
						</div>					
						<div class="col-md-12">
							<div class="col-md-6">
								<label><?php _e('Already Subscribed Information Message', NLS_TEXT_DOMAIN );?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text for a already subscribed message.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>							
								<input type="text" class="form-control" name="sub_form_subscribe_already_confirm_message" id="sub_form_subscribe_already_confirm_message" value="<?php echo $wl_nls_options['sub_form_subscribe_already_confirm_message']; ?>">
							</div>
						</div>					
						<div class="col-md-12">
							<div class="col-md-6">							
							<label><?php _e('Invaid Details send Error Message', NLS_TEXT_DOMAIN );?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text for a error message about showing of the Invalid details sent by subscribed users","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>						
								<input type="text" class="form-control" name="sub_form_invalid_confirmation_message" id="sub_form_invalid_confirmation_message" value="<?php echo $wl_nls_options['sub_form_invalid_confirmation_message']; ?>">
							</div>
						</div>
					</div>
					<div class="restore">
						<input type="hidden" value="1" id="weblizar_nls_settings_save_subscriber_option" name="weblizar_nls_settings_save_subscriber_option" />			
						<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_reset('subscriber_option');">
						<input class="button button-primary left" type="button" value="<?php _e('Save Options', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_save('subscriber_option')" >
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Subscriber Form provider option setting -->
	<div class="tab-pane col-md-12 block ui-tabs-panel deactive" id="subscriber-provider-option">
		<div class="col-md-12 option">
			<h1><?php _e('Subscribers Provider Options', NLS_TEXT_DOMAIN ); ?></h1>
			<div class="tab-content">
				<form action="post" id="weblizar_nls_subscriber_provider_option">		
					<div class="col-md-12 form-group">
						<div class="col-md-6 no-pad">
							<label><?php _e('Enable Email Based Subscriptions', NLS_TEXT_DOMAIN );?></label><br/>
							<div class="info">
								<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_nls_options['confirm_email_subscribe'] == 'on') echo "checked='unchecked'"; ?> id="confirm_email_subscribe" name="confirm_email_subscribe" >
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enable the email confirmation system for valid subscribers.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
							</div>
						</div>
					</div>			
					<div class="form_deactivate-option <?php if($wl_nls_options['confirm_email_subscribe'] == 'off') echo "active"; ?>" id="deactivated_confirm_email_subscribe">
						<div class="col-md-12 form-group">
							<ul class="instruction_points">
								<li><?php _e('If Email Subscription is Enable: You have option "Wp Mail"  to mail the subscribers and confirm its subscription through email.',  NLS_TEXT_DOMAIN );?></li>
								<li style="list-style: none;">&nbsp;</li>
								<li><?php _e('If email subscription option is disable: Email confirmation process not required. Users/Visitors will be added at subscriber list as active subscriber.',  NLS_TEXT_DOMAIN );?></li>
							</ul>				
						</div>			
					</div>
					<div class="form_select-option <?php if($wl_nls_options['confirm_email_subscribe'] == 'on') echo "active"; ?>" id="confirm_email_subscribe">
						<div class="col-md-12 form-group">
							<label><?php _e('Select Email Carrier Type',  NLS_TEXT_DOMAIN );?> </label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Select a email carrier type to send subscriber mails","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
							<div class="col-md-6 no-pad">
								<?php $subscribe_select =$wl_nls_options['subscribe_select'];?>
								<select name="subscribe_select" id="subscribe_select" class="form-control">
									<option value="wp_mail" <?php echo selected($subscribe_select, 'wp_mail' ); ?>><?php _e('WP Mail', NLS_TEXT_DOMAIN );?></option>
									<option value="madmimi" <?php selected($subscribe_select, 'madmimi'); ?>><?php _e('Mad Mimi', NLS_TEXT_DOMAIN );?></option>
									<option value="mailchimp" <?php selected($subscribe_select, 'mailchimp' ); ?>><?php _e('MailChimp', NLS_TEXT_DOMAIN );?></option>
								</select>
								<ul class="instruction_points theme_msg_heading">
									<li><?php _e('WordPress Guideline: PHP Mailer Library Removed due to not supported by WordPress.org 4.7.2.', NLS_TEXT_DOMAIN ); ?></li>
									
								</ul>
							</div>
						</div>
						<div class="col-md-12 form-group subscribe-option <?php if ($subscribe_select=='wp_mail') echo "active";?>" id="wp_mail">
							<label><?php _e('WP Mail Subscriber', NLS_TEXT_DOMAIN );?></label><br/><br/>
							<div class="col-md-12 no-pad">
								<div class="col-md-6">
									<label><?php _e('Mail ID', NLS_TEXT_DOMAIN );?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add Sender Email Id. By default User mail id has added","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
									<input type="text" class="form-control" name="wp_mail_email_id" id="wp_mail_email_id" value="<?php echo $wl_nls_options['wp_mail_email_id']; ?>" />
								</div>
							</div>
						</div>						
						
						<div class="col-md-12 form-group subscribe-option <?php if ($subscribe_select=='madmimi') echo "active";?>" id="madmimi">
						<label><?php _e('Mad Mimi Settings', NLS_TEXT_DOMAIN );?></label><br/><br/>
						<div class="col-md-12 no-pad">
							<div class="col-md-6">
								<label><?php _e('Username or Email : ', NLS_TEXT_DOMAIN )?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter your Madmimi username or email which are using in madmimi.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<input type="text" placeholder="Enter Username or Email" class="form-control" name="madmimi_username" id="madmimi_username" value="<?php echo $wl_nls_options['madmimi_username'] ?>"/>
							</div>
						</div>
						<div class="col-md-12 no-pad">
							<div class="col-md-6">	
								<label><?php _e('Api Key', NLS_TEXT_DOMAIN )?></label>									
								<!-- Meta Description tooltip ---->
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter madmimi api key.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<input type="text" class="form-control" name="madmimi_api_key" id="madmimi_api_key" placeholder="Enter Api Key" value="<?php echo $wl_nls_options['madmimi_api_key'] ?>"/>
							</div>
						</div>
						<?php
						if ($wl_nls_options['madmimi_username'] == "" && $wl_nls_options['madmimi_api_key'] == "" ){ 
						?>
							<div class="alert alert-error" id="madmini_alert1"><?php echo "</br><p>API key and UserId field blank </p>";  ?></div>
						<?php 
						}elseif ($wl_nls_options['madmimi_username'] != "" && $wl_nls_options['madmimi_api_key'] == "" ){ 
						?>
							<div class="alert alert-error" id="madmini_alert1"><?php echo "</br><p>API Key field is blank</p>";	?></div>
						<?php
						}elseif ($wl_nls_options['madmimi_username'] == "" && $wl_nls_options['madmimi_api_key'] != "" ){
						?>
						<div class="alert alert-error" id="madmini_alert1"><?php echo "</br><p>UserId field is blank</p>";?></div>
						<?php 
						}elseif ($wl_nls_options['madmimi_username'] != "" && $wl_nls_options['madmimi_api_key'] != "" ){
						?>
						<div class="col-md-12 no-pad">
							<div class="col-md-6">	
								<label><?php _e('List', NLS_TEXT_DOMAIN )?></label>
								<!-- Meta Description tooltip ---->
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Select Your List Option.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<?php 
									$madmimi_list =$wl_nls_options['madmimi_list_option'];
									$nls_madmimi_list = unserialize(get_option('weblizar_nls_madmimi_list'));
									if ($wl_nls_options['madmimi_username'] != "" && $wl_nls_options['madmimi_api_key'] != "" && $nls_madmimi_list == ""  )
							{ ?>
								<div class="alert alert-error" id="madmini_alert1"><?php echo "<p style='text-align:center!important;'>List is Empty !!!</p><span>API Connection Error (API key and UserId might be wrong) </br>  if not then craete a audience list in your madmimi account. </span>";  ?></div>
							<?php									
							}
							elseif ($wl_nls_options['madmimi_username'] != "" && $wl_nls_options['madmimi_api_key'] != "" && $nls_madmimi_list != ""  )
							{?>
								<select id="madmimi_list_option" name="madmimi_list_option" class="form-control">
									<?php
									foreach($nls_madmimi_list as $List) 
									{ ?>
										<option value="<?php echo $List['id']; ?>" <?php echo selected($madmimi_list,$List['id']); ?> >
										<?php _e(ucfirst($List['name']), NLS_TEXT_DOMAIN ); ?></option>
									<?php
									}
									?>
									<br>
								</select>
							<?php } ?>
							</div>
						</div>
						<?php	}	?>
						<div class="col-md-12 no-pad">
							<div class="col-md-6"></br>
							<label><?php _e('You can find all other Madmimi configuration settings ', NLS_TEXT_DOMAIN );?><a href="https://weblizar.com/how-to-use-mad-mimi-api/" target="_new"><?php _e('HERE', NLS_TEXT_DOMAIN );?></label></a>
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group subscribe-option <?php if ($subscribe_select=='mailchimp') echo "active";?>" id="mailchimp">
						<label><?php _e('MailChimp Settings', NLS_TEXT_DOMAIN );?></label><br/><br/>
						<div class="col-md-12 no-pad">
							<div class="col-md-6">
								<label><?php _e('API Key : ', NLS_TEXT_DOMAIN )?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter your Api key.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<span><a href='http://admin.mailchimp.com/account/api-key-popup' target='_new'><?php _e("Get your Api key","NLS_TEXT_DOMAIN")?></a></span>
								<input type="text" class="form-control" name="mailchimp_api_key" id="mailchimp_api_key" value="<?php echo $wl_nls_options['mailchimp_api_key'] ?>"/>
							</div>
						</div>
						<?php
						if ($wl_nls_options['mailchimp_api_key'] == ""){ 
						?>
						<div class="col-md-12 no-pad">	
							<div class="col-md-6">
								<div class="alert alert-error" id="madmini_alert1"><?php echo "</br><p>API Key field is blank</p>";  ?>
								</div>
							</div>
						</div>
						<?php 
						}elseif ($wl_nls_options['mailchimp_api_key'] != ""){ 
						?>
						<div class="col-md-12 no-pad">	
							<div class="col-md-6">
								<?php
								require(dirname(__FILE__).'/themes/form-include/mailchimp/MCAPI.class.php');
								$mailchimp_key  = stripslashes($wl_nls_options['mailchimp_api_key']);
								$apikey = $mailchimp_key;
								$api = new MCAPI($apikey);
								$lists = $api->lists();
								if($lists == false){
									?>
								<div class="alert alert-error" id="madmini_alert1"><?php echo "</br><p>API Connection Error : Please add valid API Key !!</p>";  ?></div>
								<?php 
								}else{
								$lists = $lists['data'];							
								if(isset($lists)){
									foreach($lists as $list) {
										$listId = $list['id'];
										$listName = $list['name'];
										$mailchimp_key_list[] = array('id' => $listId, 'name' => $listName);
									}
									if(isset($mailchimp_key_list)){
										foreach($mailchimp_key_list as $List) {
											$alllistid = $List['id'];
											$alllistname = $List['name'];
											$weblizar_nls_mailchimp_list[] = array('id' => $alllistid, 'name' => $alllistname);
										}
										update_option("weblizar_nls_mailchimp_list", serialize($weblizar_nls_mailchimp_list));
									}
								}
								
								
								$mailchimp_list = $wl_nls_options['mailchimp_list_id'];
								$weblizar_nls_mailchimp_list = unserialize(get_option('weblizar_nls_mailchimp_list'));
								?>
								<?php
								
								if ($wl_nls_options['mailchimp_api_key'] != "" && $weblizar_nls_mailchimp_list == ""){ 
								?>
								
								<div class="alert alert-error" id="madmini_alert1"><?php echo "</br><p>OOPs !! Your MailChimp list is empty. </br><span style='font-size:12px;'>Please create a list in your mailchimp cccount( Lists are where you store your contacts (subscribers))</span></p>";  ?></div>
								<?php }elseif($wl_nls_options['mailchimp_api_key'] != "" && $weblizar_nls_mailchimp_list != ""){ ?>
								<label><?php _e('List : ', NLS_TEXT_DOMAIN )?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Select you mailchimp list.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<select id="mailchimp_list_id" name="mailchimp_list_id" class="form-control" style="display:<?php if($wl_nls_options['mailchimp_api_key']=="") echo "none";?>">
								<?php foreach($weblizar_nls_mailchimp_list as $mail_list){ ?>		
									<option value="<?php echo $mail_list['id']; ?>" <?php echo selected($mailchimp_list,$mail_list['id']); ?>> <?php echo $mail_list['name']; ?></option>
								<?php } ?>
								</select>
								<?php } }	?>
							</div>
						</div>
						<?php }	?>
						<div class="col-md-12 no-pad">
							<div class="col-md-6"></br>
							<label><?php _e('You can find all Mailchimp configuration settings ', NLS_TEXT_DOMAIN );?><a href="https://weblizar.com/how-to-integrate-with-mailchimp-account" target="_new"><?php _e('HERE', NLS_TEXT_DOMAIN );?></a></label>
							</div>
						</div>
					</div>
				</div>				
				<div class="restore">
					<input type="hidden" value="1" id="weblizar_nls_settings_save_subscriber_provider_option" name="weblizar_nls_settings_save_subscriber_provider_option" />
					<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_reset('subscriber_provider_option');">
					<input class="button button-primary left" type="button" value="<?php _e('Save Options', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_save('subscriber_provider_option')" >
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Get the Subscriber Form database output setting -->
	<div class="tab-pane col-md-12 block ui-tabs-panel deactive" id="subscriber-list-option">
		<div class="col-md-12 option">
			<h1><?php _e('Subscribers Options and List', NLS_TEXT_DOMAIN ); ?></h1>
			<div class="tab-content">	
				<form action="post" id="weblizar_nls_subscribe_form">
					<div class="col-md-12 form-group">
					<div class="col-md-6 no-pad">
					<label><?php _e('Manual E-Mail To Subscribers', NLS_TEXT_DOMAIN );?></label>
					<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("This section used for mail to subscriber user","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
					<?php $sub_mail_option =$wl_nls_options['subscriber_users_mail_option'];?>
					</br>
					<span><?php _e('Select options', NLS_TEXT_DOMAIN ); ?></span>
					<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Below selection option have some types of user list (Active users , Pending users, Already mailed users)","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
					</br>
					<div class="col-md-12 no-pad" id="weblizar_nls_layout_switch">
						<select id="subscriber_users_mail_option" name="subscriber_users_mail_option" class="form-control">
							<option value="all_users" <?php echo selected($sub_mail_option, 'all_users' ); ?> ><?php _e('All Users', NLS_TEXT_DOMAIN ); ?></option>
							<option value="selected_users" <?php echo selected($sub_mail_option, 'selected_users' ); ?> ><?php _e('Selected Users', NLS_TEXT_DOMAIN ); ?></option>
							<option value="pending_users" <?php echo selected($sub_mail_option, 'pending_users' ); ?> ><?php _e('Pending Users', NLS_TEXT_DOMAIN ); ?></option>
							<option value="active_users" <?php echo selected($sub_mail_option, 'active_users' ); ?> ><?php _e('Active Users', NLS_TEXT_DOMAIN ); ?></option>
							<option value="already_mailed_users" <?php echo selected($sub_mail_option, 'already_mailed_users' ); ?> ><?php _e('Mail Received Users', NLS_TEXT_DOMAIN ); ?></option>
						</select>
					</div>
					<span><?php _e('Subject', NLS_TEXT_DOMAIN );?></span>
					<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a Subject for sending mail.","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
					<input  class="form-control" type="text" name="subscriber_mail_subject" id="subscriber_mail_subject"  value="<?php echo $wl_nls_options['subscriber_mail_subject']; ?>">
					<span><?php _e('Message', NLS_TEXT_DOMAIN );?></span>
					<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a Message to send subscriber users","NLS_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
					<textarea class="form-control" rows="8" cols="8" id="subscriber_mail_message" name="subscriber_mail_message" placeholder="<?php _e('Add a Message to send subscriber Users', NLS_TEXT_DOMAIN );?>"><?php if($wl_nls_options['subscriber_mail_message']!='') { echo esc_attr($wl_nls_options['subscriber_mail_message']); } ?></textarea>
					<input type="hidden" value="1" id="weblizar_nls_submit_subscriber" name="weblizar_nls_submit_subscriber" />
					<input class="subscriber_submit btn" id="submit_subscriber" name="submit_subscriber" type="button" value="<?php _e('Send', NLS_TEXT_DOMAIN );?>" >
					</div>
					</div> 
					<div class="col-md-12 form-group">
						<div class="subscribers-settings-wrap settings-content" >
							<label><?php _e('Manage Subscribed User Data-Table', NLS_TEXT_DOMAIN );?></label>
							<div class="row o_buttons">							
								<div style="float: right;" class="col-md-4 form-group">
									<?php 
									global $wpdb;
									$table_name = $table_name = $wpdb->prefix . "nls_subscribers";
									$user_sets_all = $wpdb->get_results("SELECT * FROM $table_name");
									if ($user_sets = $user_sets_all )
									if (count($user_sets) > 0) { ?>
									<input class="button button5 red" name="remove_subs" type="button" value="<?php _e('Remove Selected Subscriber', NLS_TEXT_DOMAIN );?>" id="remove-sub">
									<input class="button button4 red" type="button" name="remove-all-subs" value="<?php _e('Removed All Users', NLS_TEXT_DOMAIN );?>" id="remove-all-subs">
									<?php } ?>
								</div>
								<div class="modal fade" id="appearance_removed_option" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h2 class="modal-title"><?php _e('Data Delete SuccessFully', NLS_TEXT_DOMAIN );?></h2>
											</div>
											<div class="modal-body">
												<p><?php _e('Your Selected Data Removed SuccessFully', NLS_TEXT_DOMAIN );?></p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Close', NLS_TEXT_DOMAIN );?></button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							global $wpdb;
							$table_name = $table_name = $wpdb->prefix . "nls_subscribers";
							$user_sets_unsubscribe = $wpdb->get_results("SELECT * FROM $table_name WHERE flag = '0' ");
							$user_sets_subscribe = $wpdb->get_results("SELECT * FROM $table_name WHERE flag = '1' ");
							$user_sets_all = $wpdb->get_results("SELECT * FROM $table_name");
							?>
							<table class="wp-list-table widefat fixed posts" id="dataTables-example" data-wp-lists="list:post">
								<thead>
									<tr>
										<th scope="col" id="sub_cbx" class="manage-column column-title sortable asc" style=""></th>
										<th scope="col" id="sub_cbx" class="manage-column column-title sortable asc" style="">
											<span><?php _e('First Name',  NLS_TEXT_DOMAIN ); ?></span>
										</th>
										<th scope="col" id="sub_cbx" class="manage-column column-title sortable asc" style="">
											<span><?php _e('Last Name',  NLS_TEXT_DOMAIN ); ?></span>
										</th>
										<th scope="col" id="sub_email" class="manage-column column-title sortable asc" style="">
											<span><?php _e('Email',  NLS_TEXT_DOMAIN ); ?></span>
										</th>
										<th scope="col" id="sub_date" class="manage-column column-shortcode" style="">
											<span><?php _e('Date',  NLS_TEXT_DOMAIN ); ?></span>
										</th>
										<th scope="col" id="act_code" class="manage-column column-shortcode" style="">
											<span><?php _e('Subscription Status',  NLS_TEXT_DOMAIN ); ?></span>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									if ($user_sets = $user_sets_all )
										if (count($user_sets) > 0) {
											foreach ($user_sets as $user_set) { ?>
												<tr style="background-color: #f9f6f6;" class="all_users">
													<td class="check-column" ><?php echo '<input type="checkbox" name="rem[]" class="select_subs" value="'.esc_js(esc_html($user_set->id)).'">'; ?></td>
													<td class="shortcode column-shortcode"><?php echo $user_set->f_name; ?></td>
													<td class="shortcode column-shortcode"><?php echo $user_set->l_name; ?></td>
													<td class="shortcode column-shortcode"><?php echo $user_set->email; ?></td>
													<td class="shortcode column-shortcode"><?php echo $user_set->date; ?></td>
													<td class="shortcode column-shortcode"><?php if($user_set->flag == '1') {echo 'Active';}elseif($user_set->flag == '2'){echo 'Mail Send';}else{echo 'Pending';}?></td>
												</tr>
												<?php 
											}
										} else { ?>
												<tr>
													<td colspan="2"><div class="edmm-noresult"><?php _e('No Subscribers Found.', NLS_TEXT_DOMAIN );?></div></td>
												</tr>
												<?php   
										} ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="restore">
						<input type="hidden" value="1" id="weblizar_nls_settings_save_subscribe_form" name="weblizar_nls_settings_save_subscribe_form" />
						<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_reset('subscribe_form');">
						<input class="button button-primary left" type="button" value="<?php _e('Save Options', NLS_TEXT_DOMAIN );?>" onclick="weblizar_nls_option_data_save('subscribe_form')" >
					</div>
				</form>
			</div>								
		</div>
	</div>	
	<!-- Get Pro options Setting -->
	<div class="tab-pane col-md-12 block ui-tabs-panel deactive" id="get_pro_version">
		<div class="col-md-12 option">
			<h1><?php _e('Get Coming Soon Page & Maintenance Mode Pro',NLS_TEXT_DOMAIN);?></h1>
			<div class="tab-content">
				<div id="get_pro-settings" class="tab-pane fade in active">	 <!-- Advance options General Setting -->
					<div class="col-md-12 form-group">
						<div class="row weblizar-theme-feature-detail">
							<div class="col-md-4">
								<ul class="weblizar-pricing">
									<li class="pricing-heading"><?php _e('Feature Set',NLS_TEXT_DOMAIN);?><span> &nbsp;</span></li>
									<li class="table-price-tag"><span data-before="" class="price"><?php _e('Price',NLS_TEXT_DOMAIN);?></span></li>
									<li><?php _e('Multiple Pro Template',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('News Letter Subscription',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Download Subscriber List',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Auto & Manual Notification',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Major Browser Compatible',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Multi Site and Multilingual',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Social Media Promotion',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Font Family',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Custom Color Schemes',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Customized Form',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Forms shotcode',NLS_TEXT_DOMAIN );?></li>
									<li><?php _e('Form wise API',NLS_TEXT_DOMAIN );?></li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul class="weblizar-pricing">
									<li class="pricing-heading"><?php _e('Free Version',NLS_TEXT_DOMAIN );?> <span> &nbsp;</span></li>
									<li class="table-price-tag"><span data-before="" class="price">$0</span>
										<!--<div class="button-wrap">
											<a href="https://wordpress.org/plugins/newsletter-subscription-form/" class="btn"><strong>Sign Up Today!</strong></a>
										</div>-->
									</li>
														<li>2</li>
														<li><?php _e('2 API',NLS_TEXT_DOMAIN );?></li>
														<li><i class="fa icon fa-times danger"></i></li>
														<li><i class="fa icon fa-times danger"></i></li>
														<li><i class="fa icon fa-check success"></i></li>
														<li><i class="fa icon fa-check success"></i></li>
														<li><i class="fa icon fa-check success"></i></li>
														<li><?php _e('General Fonts',NLS_TEXT_DOMAIN );?></li>
														<li><?php _e('Few',NLS_TEXT_DOMAIN );?></li>
														<li><i class="fa icon fa-times danger"></i></li>
														<li><i class="fa icon fa-times danger"></i></li>
														<li><i class="fa icon fa-times danger"></i></li>
													<li class="price-info">
										<a class="btn-cart" href="https://wordpress.org/plugins/newsletter-subscription-form/"><i class="fa fa-download icon"></i><?php _e('Download',NLS_TEXT_DOMAIN );?></a>
									</li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul class="weblizar-pricing extended-table">
									<li class="pricing-heading"><?php _e('Premium Version',NLS_TEXT_DOMAIN );?> <span> &nbsp;</span></li>
									<li class="table-price-tag"><span data-before="$9" class="price">$7</span>
										<!--<div class="button-wrap">
											<a href="https://weblizar.com/amember/signup/newsletter-subscription-form-pro" class="btn">
											<strong>Sign Up Today!</strong></a>
										</div>-->
									</li>
													<li><?php _e('6 ( +4 More coming.. )',NLS_TEXT_DOMAIN );?>				</li>
													<li><?php _e('7 News Latter API',NLS_TEXT_DOMAIN );?>				</li>
													<li><i class="fa icon fa-check success"></i>
													</li>
													<li><i class="fa icon fa-check success"></i>
													</li>
													<li><i class="fa icon fa-check success"></i>
													</li>
													<li><i class="fa icon fa-check success"></i>
													</li>
													<li><i class="fa icon fa-check success"></i>
													</li>
													<li><?php _e('500+ Google Fonts',NLS_TEXT_DOMAIN );?>				</li>
													<li><?php _e('Unlmited',NLS_TEXT_DOMAIN );?>				</li>
													<li><i class="fa icon fa-check success"></i>
													</li>
													<li><i class="fa icon fa-check success"></i>
													</li>
													<li><i class="fa icon fa-check success"></i>
													</li>
													<li class="price-info">
										<a class="btn-cart" href="https://weblizar.com/amember/signup/newsletter-subscription-form-pro"><i class="fa fa-shopping-cart icon"></i><?php _e('Buy Now',NLS_TEXT_DOMAIN );?></a>
										<!--<a class="btn-view" href=""><i class="fa fa-eye icon"></i> View Demo</a>-->
									</li>
								</ul>
							</div>	
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>