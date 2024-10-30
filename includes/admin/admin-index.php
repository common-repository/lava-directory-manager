<table class="form-table">
	<tbody>

		<!-- ## Page Settings ########### //-->
		<tr valign="top">
			<th scope="row"><?php _e( "Page Settings", 'Lavacode' ); ?></th>
			<td>
				<table class="widefat">
					<tbody>
						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "Add Listing", 'Lavacode' ); ?></th>
							<td>
								<select name="<?php echo $this->getOptionFieldName( 'page_add_' . $this->post_type ); ?>">
									<option value><?php _e( "Select a Page", 'Lavacode' ); ?></option>
									<?php echo lava_directory()->admin->getOptionsPagesLists( lava_directory_manager_get_option( "page_add_{$this->post_type}" ) ); ?>
								</select>
							</td>
						</tr>
						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>
						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "My Page", 'Lavacode' ); ?></th>
							<td>
								<select name="<?php echo $this->getOptionFieldName( 'page_my_page' ); ?>">
									<option value><?php _e( "Select a Page", 'Lavacode' ); ?></option>
									<?php echo lava_directory()->admin->getOptionsPagesLists( lava_directory_manager_get_option( 'page_my_page' ) ); ?>
								</select>
							</td>
						</tr>
						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>
						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "Login Page", 'Lavacode' ); ?></th>
							<td>
								<fieldset>
									<select name="<?php echo $this->getOptionFieldName( 'login_page' ); ?>">
										<option value><?php _e( "Wordpress Login Page", 'Lavacode' ); ?></option>
										<optgroup label="<?php _e( "Custom Login Page", 'Lavacode' ); ?>">
											<?php echo lava_directory()->admin->getOptionsPagesLists( lava_directory_manager_get_option( 'login_page' ) ); ?>
										</optgroup>
									</select>
								</fieldset>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>

		<!-- ## Add listing Settings ########### //-->
		<tr valign="top">
			<th scope="row"><?php _e( "Add listing Settings", 'Lavacode' ); ?></th>
			<td>
				<table class="widefat">
					<tbody>

						<!-- ## Map Settings > New listing Status //-->
						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "New listing Status", 'Lavacode' ); ?></th>
							<td>
								<label>
									<input
										type="radio"
										name="<?php echo $this->getOptionFieldName( 'new_' . $this->post_type . '_status' ); ?>"
										value=""
										<?php checked( '' == lava_directory_manager_get_option( "new_{$this->post_type}_status" ) ); ?>
									>
									<?php _e( "Publish", 'Lavacode' ); ?>
								</label>
								<label>
									<input
										type="radio"
										name="<?php echo $this->getOptionFieldName( 'new_' . $this->post_type . '_status' ); ?>"
										value="pending"
										<?php checked( 'pending' == lava_directory_manager_get_option( "new_{$this->post_type}_status" ) ); ?>
									>
									<?php _e( "Pending", 'Lavacode' ); ?>
								</label>
								<?php
								function_exists('lv_directory_payment') && printf(
									'<br><span class="description">%1$s</span>',
									esc_html__("This option doesn't work for listings which used payment packages.", 'Lavacode')
								); ?>
							</td>
						</tr>

						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>

						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "Preview listing", 'Lavacode' ); ?></th>
							<td>
								<select name="<?php echo $this->getOptionFieldName( 'preview_listing' ); ?>">
									<?php
									foreach(Array(
										'enabled' => esc_html__("Enabled", 'Lavacode'),
										'disabled' => esc_html__("Disabled", 'Lavacode'),
									) as $countryCode => $countryLabel) {
										printf(
											'<option value="%1$s"%2$s>%3$s</option>',
											$countryCode,
											selected($countryCode == $this->get_settings('preview_listing', 'enabled'), true, false),
											$countryLabel
										);
									} ?>
								</select>
							</td>
						</tr>
						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>

						<!-- ## Map Settings > New listing permit //-->
						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "Post new listing permit", 'Lavacode' ); ?></th>
							<td>
								<label>
									<input type="radio" name="<?php echo $this->getOptionFieldName( 'add_capability' ); ?>" value="" <?php checked( '' == lava_directory_manager_get_option( 'add_capability' ) ); ?>>
									<?php _e( "Anyone without login (it will generate an account automatically)", 'Lavacode' ); ?>
								</label>
								<br>
								<label>
									<input type="radio" name="<?php echo $this->getOptionFieldName( 'add_capability' ); ?>" value="member" <?php checked( 'member' == lava_directory_manager_get_option( "add_capability" ) ); ?>>
									<?php _e( "Only login members", 'Lavacode' ); ?>
								</label>
							</td>
						</tr>

						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>

						<!-- ## Map Settings > New listing Category Limit //-->
						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "Max category users can choose on front-end form", 'Lavacode' ); ?></th>
							<td>
								<input type="number" name="<?php echo $this->getOptionFieldName( 'limit_category' ); ?>" value="<?php echo $this->get_settings( 'limit_category', 0 );?>">
								<span class="description"><?php _e( "0 is unlimited (recommended 1 ).", 'Lavacode' ); ?></span>
							</td>
						</tr>

						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>

						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "Max location users can choose on front-end form", 'Lavacode' ); ?></th>
							<td>
								<input type="number" name="<?php echo $this->getOptionFieldName( 'limit_location' ); ?>" value="<?php echo $this->get_settings( 'limit_location', 0 );?>">
								<span class="description"><?php _e( "0 is unlimited (recommended 1 ).", 'Lavacode' ); ?></span>
							</td>
						</tr>

						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>

						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "Limit Detail image upload", 'Lavacode' ); ?></th>
							<td>
								<input type="number" name="<?php echo $this->getOptionFieldName( 'limit_detail_images' ); ?>" value="<?php echo $this->get_settings( 'limit_detail_images', 0 );?>">
								<span class="description"><?php _e( "0 is unlimited (recommended 6 ).", 'Lavacode' ); ?></span>
							</td>
						</tr>

						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>

						<tr valign="top">
							<td width="1%"></td>
							<th><?php _e( "Required Fields", 'Lavacode' ); ?></th>
							<td>
								<?php
								foreach( $this->getSubmitFields() as $field => $fieldMeta ) {
									printf(
										'<p><label><input type="checkbox" name="%1$s[]" value="%2$s"%3$s>%4$s</label></p>',
										$this->getOptionFieldName( 'required_fields' ),
										$field, checked( in_array( $field, $this->get_settings( 'required_fields', Array() ) ), true, false ),
										$fieldMeta[ 'label' ]
									);
								} ?>
							</td>
						</tr>

					</tbody>
				</table>
			</td>
		</tr>

		<!-- ## Map Settings ########### //-->
		<tr valign="top">
			<th scope="row"><?php _e( "Map Settings", 'Lavacode' ); ?></th>
			<td>
				<table class="widefat">
					<tbody>
						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Google Map API KEY", 'Lavacode' ); ?></th>
							<td>
								<input type="text" name="<?php echo $this->getOptionFieldName( 'google_map_api' ); ?>" value="<?php echo $this->get_settings( 'google_map_api' );?>" style="width:30%;">
								<?php
								printf(
									'<span class="description"><a href="%1$s" target="_blank">%2$s</a></span>',
									esc_url_raw( 'developers.google.com/maps/documentation/javascript/get-api-key' ),
									esc_html__( "More Detail", 'Lavacode' )
								); ?>
							</td>
						</tr>
						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>
						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Category search result setting", 'Lavacode' ); ?></th>
							<td>
								<?php
								foreach(
									Array(
										esc_html__( "Parent category + (related) child categories", 'Lavacode' ) => 'enable',
										esc_html__( "Each category only", 'Lavacode' ) => 'disable',
									) as $strOptionLabel => $strOption
								) {
									printf(
										'<label><input type="radio" name="%1$s" value="%2$s"%4$s>%3$s</label><br>',
										$this->getOptionFieldName( 'json_create_term_type' ),
										$strOption, $strOptionLabel,
										checked( $strOption == $this->get_settings( 'json_create_term_type' ), true, false )
									);
								} ?>
								<br>
								<div><span><?php esc_html_e( 'Note : After changes, "Save" and press "Data refresh".', 'Lavacode' ); ?></span></div>
								<div><span><?php esc_html_e( 'You need to refresh map data ( Data refresh) after you change this option.', 'Lavacode' ); ?></span></div>
							</td>
						</tr>
						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>
						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Data Refresh", 'Lavacode' ); ?></th>
							<td>
								<?php
								if(
									function_exists('icl_get_languages' ) &&
									false !== (bool)( $lava_wpml_langs = icl_get_languages('skip_missing=0') )
								){
									foreach( $lava_wpml_langs as $lang )
									{
										printf(
											"<button type='button' class='button button-primary lava-data-refresh-trigger' data-lang='%s'>\n\t
												<img src='%s'> %s %s\n\t
											</button>\n\t"
											, $lang['language_code']
											, $lang['country_flag_url']
											, $lang['native_name']
											, __("Refresh", 'Lavacode')
										);
									}
								}else{
									if(class_exists('\\LavaDirectoryManagerPro\\Base\\BaseController')) {
										printf('<h4>%s</h4>', esc_html__("Listing types", 'Lavacode'));
										$listingTypes = \LavaDirectoryManagerPro\Base\BaseController::ListingTypesArray();
										$output = '<div class="">';
										foreach($listingTypes as $typeID => $typeLabel) {
											$output .= sprintf(
												'<button type="button" class="button" data-listing-type-generator="%1$s">%2$s %3$s</button>',
												$typeID, $typeLabel,
												esc_html__("JSON Generator", 'Lavacode')
											);
										}
										$output .= '</div>';
										echo $output;
										printf('<h4>%s</h4>', esc_html__("All", 'Lavacode'));
									} ?>
									<button type="button" class="button button-primary lava-data-refresh-trigger" data-loading="<?php _e( "Processing", 'Lavacode' ); ?>...">
										<?php _e("JSON Generator", 'Lavacode');?>
									</button>
									<?php
								} ?>
								<div id="lava-setting-page-progressbar-wrap">
									<div class="progressbar"></div>
									<div class="text"></div>
								</div>
							</td>
						</tr>
						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>
						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Cross Domain", 'Lavacode' ); ?></th>
							<td>
								<label>
									<input type="radio" name="<?php echo $this->getOptionFieldName( 'crossdomain' ); ?>" value="" <?php checked( '' == lava_directory_manager_get_option( "crossdomain" ) ); ?>>
									<?php _e( "Disabled ( Default )", 'Lavacode' ); ?>
								</label>
								<br>
								<label>
									<input type="radio" name="<?php echo $this->getOptionFieldName( 'crossdomain' ); ?>" value="1" <?php checked( '1' == lava_directory_manager_get_option( 'crossdomain' ) ); ?>>
									<?php _e( "Enable", 'Lavacode' ); ?>
								</label>
							</td>
						</tr>
						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>
						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Selectable regional restrictions", 'Lavacode' ); ?></th>
							<td>
								<label>
									<select name="<?php echo $this->getOptionFieldName( 'restrictions_country' ); ?>">
										<?php
										foreach(array('all' => esc_html__("All", 'Lavacode'), "af" => __("Afghanistan", 'Lavacode'), "ax" => __("Åland Islands", 'Lavacode'), "al" => __("Albania", 'Lavacode'), "dz" => __("Algeria", 'Lavacode'), "as" => __("American Samoa", 'Lavacode'), "ad" => __("Andorra", 'Lavacode'), "ao" => __("Angola", 'Lavacode'), "ai" => __("Anguilla", 'Lavacode'), "aq" => __("Antarctica", 'Lavacode'), "ag" => __("Antigua and Barbuda", 'Lavacode'), "ar" => __("Argentina", 'Lavacode'), "am" => __("Armenia", 'Lavacode'), "aw" => __("Aruba", 'Lavacode'), "au" => __("Australia", 'Lavacode'), "at" => __("Austria", 'Lavacode'), "az" => __("Azerbaijan", 'Lavacode'), "bs" => __("Bahamas", 'Lavacode'), "bh" => __("Bahrain", 'Lavacode'), "bd" => __("Bangladesh", 'Lavacode'), "bb" => __("Barbados", 'Lavacode'), "by" => __("Belarus", 'Lavacode'), "be" => __("Belgium", 'Lavacode'), "bz" => __("Belize", 'Lavacode'), "bj" => __("Benin", 'Lavacode'), "bm" => __("Bermuda", 'Lavacode'), "bt" => __("Bhutan", 'Lavacode'), "bo" => __("Bolivia (Plurinational State of)", 'Lavacode'), "bq" => __("Bonaire, Sint Eustatius and Saba", 'Lavacode'), "ba" => __("Bosnia and Herzegovina", 'Lavacode'), "bw" => __("Botswana", 'Lavacode'), "bv" => __("Bouvet Island", 'Lavacode'), "br" => __("Brazil", 'Lavacode'), "io" => __("British Indian Ocean Territory", 'Lavacode'), "bn" => __("Brunei Darussalam", 'Lavacode'), "bg" => __("Bulgaria", 'Lavacode'), "bf" => __("Burkina Faso", 'Lavacode'), "bi" => __("Burundi", 'Lavacode'), "cv" => __("Cabo Verde", 'Lavacode'), "kh" => __("Cambodia", 'Lavacode'), "cm" => __("Cameroon", 'Lavacode'), "ca" => __("Canada", 'Lavacode'), "ky" => __("Cayman Islands", 'Lavacode'), "cf" => __("Central African Republic", 'Lavacode'), "td" => __("Chad", 'Lavacode'), "cl" => __("Chile", 'Lavacode'), "cn" => __("China", 'Lavacode'), "cx" => __("Christmas Island", 'Lavacode'), "cc" => __("Cocos (Keeling) Islands", 'Lavacode'), "co" => __("Colombia", 'Lavacode'), "km" => __("Comoros", 'Lavacode'), "cg" => __("Congo", 'Lavacode'), "cd" => __("Congo (Democratic Republic of the)", 'Lavacode'), "ck" => __("Cook Islands", 'Lavacode'), "cr" => __("Costa Rica", 'Lavacode'), "ci" => __("Côte d'Ivoire", 'Lavacode'), "hr" => __("Croatia", 'Lavacode'), "cu" => __("Cuba", 'Lavacode'), "cw" => __("Curaçao", 'Lavacode'), "cy" => __("Cyprus", 'Lavacode'), "cz" => __("Czech Republic", 'Lavacode'), "dk" => __("Denmark", 'Lavacode'), "dj" => __("Djibouti", 'Lavacode'), "dm" => __("Dominica", 'Lavacode'), "do" => __("Dominican Republic", 'Lavacode'), "ec" => __("Ecuador", 'Lavacode'), "eg" => __("Egypt", 'Lavacode'), "sv" => __("El Salvador", 'Lavacode'), "gq" => __("Equatorial Guinea", 'Lavacode'), "er" => __("Eritrea", 'Lavacode'), "ee" => __("Estonia", 'Lavacode'), "et" => __("Ethiopia", 'Lavacode'), "fk" => __("Falkland Islands (Malvinas)", 'Lavacode'), "fo" => __("Faroe Islands", 'Lavacode'), "fj" => __("Fiji", 'Lavacode'), "fi" => __("Finland", 'Lavacode'), "fr" => __("France", 'Lavacode'), "gf" => __("French Guiana", 'Lavacode'), "pf" => __("French Polynesia", 'Lavacode'), "tf" => __("French Southern Territories", 'Lavacode'), "ga" => __("Gabon", 'Lavacode'), "gm" => __("Gambia", 'Lavacode'), "ge" => __("Georgia", 'Lavacode'), "de" => __("Germany", 'Lavacode'), "gh" => __("Ghana", 'Lavacode'), "gi" => __("Gibraltar", 'Lavacode'), "gr" => __("Greece", 'Lavacode'), "gl" => __("Greenland", 'Lavacode'), "gd" => __("Grenada", 'Lavacode'), "gp" => __("Guadeloupe", 'Lavacode'), "gu" => __("Guam", 'Lavacode'), "gt" => __("Guatemala", 'Lavacode'), "gg" => __("Guernsey", 'Lavacode'), "gn" => __("Guinea", 'Lavacode'), "gw" => __("Guinea-Bissau", 'Lavacode'), "gy" => __("Guyana", 'Lavacode'), "ht" => __("Haiti", 'Lavacode'), "hm" => __("Heard Island and McDonald Islands", 'Lavacode'), "va" => __("Holy See", 'Lavacode'), "hn" => __("Honduras", 'Lavacode'), "hk" => __("Hong Kong", 'Lavacode'), "hu" => __("Hungary", 'Lavacode'), "is" => __("Iceland", 'Lavacode'), "in" => __("India", 'Lavacode'), "id" => __("Indonesia", 'Lavacode'), "ir" => __("Iran (Islamic Republic of)", 'Lavacode'), "iq" => __("Iraq", 'Lavacode'), "ie" => __("Ireland", 'Lavacode'), "im" => __("Isle of Man", 'Lavacode'), "il" => __("Israel", 'Lavacode'), "it" => __("Italy", 'Lavacode'), "jm" => __("Jamaica", 'Lavacode'), "jp" => __("Japan", 'Lavacode'), "je" => __("Jersey", 'Lavacode'), "jo" => __("Jordan", 'Lavacode'), "kz" => __("Kazakhstan", 'Lavacode'), "ke" => __("Kenya", 'Lavacode'), "ki" => __("Kiribati", 'Lavacode'), "kp" => __("Korea (Democratic People's Republic of)", 'Lavacode'), "kr" => __("Korea (Republic of)", 'Lavacode'), "kw" => __("Kuwait", 'Lavacode'), "kg" => __("Kyrgyzstan", 'Lavacode'), "la" => __("Lao People's Democratic Republic", 'Lavacode'), "lv" => __("Latvia", 'Lavacode'), "lb" => __("Lebanon", 'Lavacode'), "ls" => __("Lesotho", 'Lavacode'), "lr" => __("Liberia", 'Lavacode'), "ly" => __("Libya", 'Lavacode'), "li" => __("Liechtenstein", 'Lavacode'), "lt" => __("Lithuania", 'Lavacode'), "lu" => __("Luxembourg", 'Lavacode'), "mo" => __("Macao", 'Lavacode'), "mk" => __("Macedonia (the former Yugoslav Republic of)", 'Lavacode'), "mg" => __("Madagascar", 'Lavacode'), "mw" => __("Malawi", 'Lavacode'), "my" => __("Malaysia", 'Lavacode'), "mv" => __("Maldives", 'Lavacode'), "ml" => __("Mali", 'Lavacode'), "mt" => __("Malta", 'Lavacode'), "mh" => __("Marshall Islands", 'Lavacode'), "mq" => __("Martinique", 'Lavacode'), "mr" => __("Mauritania", 'Lavacode'), "mu" => __("Mauritius", 'Lavacode'), "yt" => __("Mayotte", 'Lavacode'), "mx" => __("Mexico", 'Lavacode'), "fm" => __("Micronesia (Federated States of)", 'Lavacode'), "md" => __("Moldova (Republic of)", 'Lavacode'), "mc" => __("Monaco", 'Lavacode'), "mn" => __("Mongolia", 'Lavacode'), "me" => __("Montenegro", 'Lavacode'), "ms" => __("Montserrat", 'Lavacode'), "ma" => __("Morocco", 'Lavacode'), "mz" => __("Mozambique", 'Lavacode'), "mm" => __("Myanmar", 'Lavacode'), "na" => __("Namibia", 'Lavacode'), "nr" => __("Nauru", 'Lavacode'), "np" => __("Nepal", 'Lavacode'), "nl" => __("Netherlands", 'Lavacode'), "nc" => __("New Caledonia", 'Lavacode'), "nz" => __("New Zealand", 'Lavacode'), "ni" => __("Nicaragua", 'Lavacode'), "ne" => __("Niger", 'Lavacode'), "ng" => __("Nigeria", 'Lavacode'), "nu" => __("Niue", 'Lavacode'), "nf" => __("Norfolk Island", 'Lavacode'), "mp" => __("Northern Mariana Islands", 'Lavacode'), "no" => __("Norway", 'Lavacode'), "om" => __("Oman", 'Lavacode'), "pk" => __("Pakistan", 'Lavacode'), "pw" => __("Palau", 'Lavacode'), "ps" => __("Palestine, State of", 'Lavacode'), "pa" => __("Panama", 'Lavacode'), "pg" => __("Papua New Guinea", 'Lavacode'), "py" => __("Paraguay", 'Lavacode'), "pe" => __("Peru", 'Lavacode'), "ph" => __("Philippines", 'Lavacode'), "pn" => __("Pitcairn", 'Lavacode'), "pl" => __("Poland", 'Lavacode'), "pt" => __("Portugal", 'Lavacode'), "pr" => __("Puerto Rico", 'Lavacode'), "qa" => __("Qatar", 'Lavacode'), "re" => __("Réunion", 'Lavacode'), "ro" => __("Romania", 'Lavacode'), "ru" => __("Russian Federation", 'Lavacode'), "rw" => __("Rwanda", 'Lavacode'), "bl" => __("Saint Barthélemy", 'Lavacode'), "sh" => __("Saint Helena, Ascension and Tristan da Cunha", 'Lavacode'), "kn" => __("Saint Kitts and Nevis", 'Lavacode'), "lc" => __("Saint Lucia", 'Lavacode'), "mf" => __("Saint Martin (French part)", 'Lavacode'), "pm" => __("Saint Pierre and Miquelon", 'Lavacode'), "vc" => __("Saint Vincent and the Grenadines", 'Lavacode'), "ws" => __("Samoa", 'Lavacode'), "sm" => __("San Marino", 'Lavacode'), "st" => __("Sao Tome and Principe", 'Lavacode'), "sa" => __("Saudi Arabia", 'Lavacode'), "sn" => __("Senegal", 'Lavacode'), "rs" => __("Serbia", 'Lavacode'), "sc" => __("Seychelles", 'Lavacode'), "sl" => __("Sierra Leone", 'Lavacode'), "sg" => __("Singapore", 'Lavacode'), "sx" => __("Sint Maarten (Dutch part)", 'Lavacode'), "sk" => __("Slovakia", 'Lavacode'), "si" => __("Slovenia", 'Lavacode'), "sb" => __("Solomon Islands", 'Lavacode'), "so" => __("Somalia", 'Lavacode'), "za" => __("South Africa", 'Lavacode'), "gs" => __("South Georgia and the South Sandwich Islands", 'Lavacode'), "ss" => __("South Sudan", 'Lavacode'), "es" => __("Spain", 'Lavacode'), "lk" => __("Sri Lanka", 'Lavacode'), "sd" => __("Sudan", 'Lavacode'), "sr" => __("Suriname", 'Lavacode'), "sj" => __("Svalbard and Jan Mayen", 'Lavacode'), "sz" => __("Swaziland", 'Lavacode'), "se" => __("Sweden", 'Lavacode'), "ch" => __("Switzerland", 'Lavacode'), "sy" => __("Syrian Arab Republic", 'Lavacode'), "tw" => __("Taiwan, Province of China", 'Lavacode'), "tj" => __("Tajikistan", 'Lavacode'), "tz" => __("Tanzania, United Republic of", 'Lavacode'), "th" => __("Thailand", 'Lavacode'), "tl" => __("Timor-Leste", 'Lavacode'), "tg" => __("Togo", 'Lavacode'), "tk" => __("Tokelau", 'Lavacode'), "to" => __("Tonga", 'Lavacode'), "tt" => __("Trinidad and Tobago", 'Lavacode'), "tn" => __("Tunisia", 'Lavacode'), "tr" => __("Turkey", 'Lavacode'), "tm" => __("Turkmenistan", 'Lavacode'), "tc" => __("Turks and Caicos Islands", 'Lavacode'), "tv" => __("Tuvalu", 'Lavacode'), "ug" => __("Uganda", 'Lavacode'), "ua" => __("Ukraine", 'Lavacode'), "ae" => __("United Arab Emirates", 'Lavacode'), "gb" => __("United Kingdom of Great Britain and Northern Ireland", 'Lavacode'), "us" => __("United States of America", 'Lavacode'), "um" => __("United States Minor Outlying Islands", 'Lavacode'), "uy" => __("Uruguay", 'Lavacode'), "uz" => __("Uzbekistan", 'Lavacode'), "vu" => __("Vanuatu", 'Lavacode'), "ve" => __("Venezuela (Bolivarian Republic of)", 'Lavacode'), "vn" => __("Viet Nam", 'Lavacode'), "vg" => __("Virgin Islands (British)", 'Lavacode'), "vi" => __("Virgin Islands (U.S.)", 'Lavacode'), "wf" => __("Wallis and Futuna", 'Lavacode'), "eh" => __("Western Sahara", 'Lavacode'), "ye" => __("Yemen", 'Lavacode'), "zm" => __("Zambia", 'Lavacode'), "zw" => __("Zimbabwe", 'Lavacode')
										) as $countryCode => $countryLabel) {
											printf(
												'<option value="%1$s"%2$s>%3$s</option>',
												$countryCode,
												selected($countryCode == $this->get_settings('restrictions_country', 'all'), true, false),
												$countryLabel
											);
										} ?>
									</select>
								</label>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>

		<!-- ## Single Page Settings ########### //-->

		<tr valign="top">
			<th scope="row"><?php _e( "Single Page Settings", 'Lavacode' ); ?></th>
			<td>
				<table class="widefat">
					<tbody>
						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Amenities display type", 'Lavacode' ); ?></th>
							<td>
								<label>
									<input type="radio" name="<?php echo $this->getOptionFieldName( 'display_amenities' ); ?>" value="showall" <?php checked( 'showall' == $this->get_settings( 'display_amenities', 'showall' ) ); ?>>
									<?php _e( "List all (unselected & selected) (Default)", 'Lavacode' ); ?>
								</label>
								<br>
								<label>
									<input type="radio" name="<?php echo $this->getOptionFieldName( 'display_amenities' ); ?>" value="showexists" <?php checked( 'showexists' == $this->get_settings( 'display_amenities', 'showall' ) ); ?>>
									<?php _e( "List only selected", 'Lavacode' ); ?>
								</label>

							</td>
						</tr>

						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>

						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Amenities : Icon type", 'Lavacode' ); ?></th>
							<td>
								<label>
									<input type="radio" name="<?php echo $this->getOptionFieldName( 'display_amenities_icon' ); ?>" value="" <?php checked( '' == $this->get_settings( "display_amenities_icon" ) ); ?>>
									<?php _e( "Default icons ( check, uncheck icons)", 'Lavacode' ); ?>
								</label>
								<br>
								<label>
									<input type="radio" name="<?php echo $this->getOptionFieldName( 'display_amenities_icon' ); ?>" value="with-own-icon" <?php checked( 'with-own-icon' == $this->get_settings( 'display_amenities_icon' ) ); ?>>
									<?php _e( "Custom icons ( You can add them on Amenities taxonomy setting. )", 'Lavacode' ); ?>
								</label>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>

		<!-- ## General Settings ########### //-->
		<tr valign="top">
			<th scope="row"><?php _e( "General Settings", 'Lavacode' ); ?></th>
			<td>
				<table class="widefat">
					<tbody>
						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Listing Slug", 'Lavacode' ); ?></th>
							<td>
								<input type="text" name="<?php echo $this->getOptionFieldName( 'main_slug_name' ); ?>" value="<?php echo $this->get_settings( 'main_slug_name', $this->getName() );?>">
								<span><?php printf( esc_html__( "Empty is default( %s )", 'Lavacode' ), $this->getName() ); ?></span>
							</td>
						</tr>

						<tr><td colspan="3" style="padding:0;"><hr style='margin:0;'></td></tr>

						<tr valign="top">
							<td width="1%"></td>
							<th>&nbsp;<?php _e( "Blank Image", 'Lavacode' ); ?></th>
							<td>
								<input type="text" name="<?php echo $this->getOptionFieldName( 'blank_image' ); ?>" value="<?php echo lava_directory_manager_get_option( 'blank_image' ); ?>" tar="lava-blank-image">
								<input type="button" class="button button-primary fileupload" value="<?php _e('Select an Image', 'Lavacode');?>" tar="lava-blank-image">
								<input class="fileuploadcancel button" tar="lava-blank-image" value="<?php _e('Delete', 'Lavacode');?>" type="button">
								<p>
									<?php
									_e("Preview","Lavacode");
									if( false === (boolean)( $strBlankImage = lava_directory_manager_get_option( 'blank_image' ) ) )
										$strBlankImage = lava_directory()->image_url . 'no-image.png';
									echo "<p><img src=\"{$strBlankImage}\" tar=\"lava-blank-image\" style=\"max-width:300px;\"></p>"; ?>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>

	</tbody>
</table>
<?php do_action( 'lava_directory_manager_settings_after' ); ?>