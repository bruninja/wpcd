<?php
/**
 * Plugin que acompanha o tema Epico, da Uberfacil.
 *
 * @package   Uf_Epico
 * @author    Uberfácil <contato@uberfacil.com>
 * @license   GPL-2.0+
 * @link      http://uberfacil.com/temas/epico
 * @copyright 2014-2016 Uberfácil
 */

/**
 * Plugin class.
 * @package Uf_Epico
 * @author  Marcio Duarte - Uberfácil <contato@uberfacil.com>
 */
class Uf_Epico {

	/**
	 * @var     string
	 */
	const VERSION = '1.8.2';
	/**
	 * @var      string
	 */
	protected $plugin_slug = 'uf-epico';
	/**
	 * @var      object
	 */
	protected static $instance = null;
	/**
	 * @var      array
	 */
	protected $element_instances = array();
	/**
	 * @var      array
	 */
	protected $element_css_once = array();
	/**
	 * @var      array
	 */
	protected $elements = array();
	/**
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting filters, and administration functions.
	 *
	 */
	private function __construct() {

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_stylescripts' ) );

		add_action( 'wp_footer', array( $this, 'footer_scripts' ) );

		// Detect element before rendering the page so that we can enqueue scripts and styles needed
		if ( ! is_admin() ) {
			add_action( 'wp', array( $this, 'detect_elements' ) );
		}

		add_action( 'init', array( $this, 'activate_post_types' ) );

		if ( is_admin() ) {
			add_action( 'media_buttons', array( $this, 'shortcode_insert_button' ), 11 );
			add_action( 'admin_footer', array( $this, 'shortcode_modal_template' ) );
		}

		// Add shortcodes
		add_shortcode( 'epico_capture_sc', array( $this, 'render_element' ) );
		$this->elements = array_merge( $this->elements, array(
			'shortcodes' => array(
				'epico_capture_sc' => '1',
			)
		) );

	}

	/**
	 * Return an instance of this class.
	 *
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when the plugin is activated.
	 *
	 *
	 * @param    boolean $network_wide True if WPMU superadmin uses "Network Activate" action, FALSE if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public static function activate( $network_wide ) {
		if ( function_exists( 'is_multisite' ) && is_multisite() ) {
			if ( $network_wide ) {
				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {
					switch_to_blog( $blog_id );
					self::single_activate();
				}
				restore_current_blog();
			} else {
				self::single_activate();
			}
		} else {
			self::single_activate();
		}
	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 *
	 * @param    boolean $network_wide True if WPMU superadmin uses "Network Deactivate" action, FALSE if WPMU is disabled or plugin is deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide ) {
		if ( function_exists( 'is_multisite' ) && is_multisite() ) {
			if ( $network_wide ) {
				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {
					switch_to_blog( $blog_id );
					self::single_deactivate();
				}
				restore_current_blog();
			} else {
				self::single_deactivate();
			}
		} else {
			self::single_deactivate();
		}
	}

	/**
	 * Fired when a new site is activated with a WPMU environment.
	 *
	 *
	 * @param    int $blog_id ID of the new blog.
	 */
	public function activate_new_site( $blog_id ) {
		if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
			return;
		}

		switch_to_blog( $blog_id );
		self::single_activate();
		restore_current_blog();
	}

	/**
	 * Get all blog ids of blogs in the current network that are:
	 * - not archived
	 * - not spam
	 * - not deleted
	 *
	 *
	 * @return    array|FALSE    The blog ids, FALSE if no matches.
	 */
	private static function get_blog_ids() {
		global $wpdb;

		// get an array of blog ids
		$sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

		return $wpdb->get_col( $sql );
	}

	/**
	 * Fired for each blog when the plugin is activated.
	 *
	 */
	private static function single_activate() {

	}

	/**
	 * Fired for each blog when the plugin is deactivated.
	 *
	 */
	private static function single_deactivate() {
		// TODO: Define deactivation functionality here needed
	}

	/**
	 * Register post types.
	 *
	 *
	 * @return    null
	 */
	public function activate_post_types() {

		$args = array(
			'labels'              => array(
				'name'               => __( 'Capture (shortcode)', 'uf-epico' ),
				'singular_name'      => __( 'Capture', 'uf-epico' ),
				'add_new'            => __( 'Add new', 'uf-epico' ),
				'add_new_item'       => __( 'Add new Capture', 'uf-epico' ),
				'edit_item'          => __( 'Edit Capture', 'uf-epico' ),
				'all_items'          => __( 'All Captures', 'uf-epico' ),
				'view_item'          => __( 'View Capture', 'uf-epico' ),
				'search_items'       => __( 'Search Captures', 'uf-epico' ),
				'not_found'          => __( 'No Capture defined', 'uf-epico' ),
				'not_found_in_trash' => __( 'No Capture found in trash', 'uf-epico' ),
				'parent_item_colon'  => '',
				'menu_name'          => __( 'Capture', 'uf-epico' )
			),
			'public'              => FALSE,
			'publicly_queryable'  => FALSE,
			'show_ui'             => TRUE,
			'show_in_menu'        => TRUE,
			'query_var'           => TRUE,
			'rewrite'             => FALSE,
			'exclude_from_search' => TRUE,
			'capability_type'     => 'post',
			'has_archive'         => TRUE,
			'hierarchical'        => FALSE,
			'menu_position'       => 100,
			'menu_icon'           => "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj48c3ZnIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAxNyAxNyIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS1taXRlcmxpbWl0OjEuNDE0MjE7Ij48cGF0aCBkPSJNMi40NzksMi40NzljLTEuNTk2LDEuNjEzIC0yLjQ3OSwzLjczNiAtMi40NzksNi4wMTFjMCwyLjI3NiAwLjg4Myw0LjM5OCAyLjQ3OSw2LjAxMWMxLjU5NiwxLjYxNCAzLjczNiwyLjQ4IDYuMDExLDIuNDhjMi4yNzYsMCA0LjM5OCwtMC44ODMgNi4wMTEsLTIuNDhjMS42MTQsLTEuNTk2IDIuNDgsLTMuNzM1IDIuNDgsLTYuMDExYzAsLTEuOTM1IC0wLjYyOSwtMy43NTIgLTEuODM0LC01LjI2NGMtMC45NTEsLTEuMjA1IC0yLjIwOCwtMi4xMjIgLTMuNjUxLC0yLjY2NmwwLDEuOGMwLjkxNywwLjQ0MiAxLjczMiwxLjEwNCAyLjM2LDEuOTAyYzAuOTY4LDEuMjIzIDEuNDc3LDIuNjgzIDEuNDc3LDQuMjQ1YzAsMy43NyAtMy4wNzMsNi44NDMgLTYuODQzLDYuODQzYy0zLjc2OSwwIC02Ljg0MywtMy4wOSAtNi44NDMsLTYuODZjMCwtMy4zNzkgMi41MTMsLTYuMjgzIDUuODU4LC02Ljc1OGwwLjE1MywtMC4wMzRsMCw2Ljc5MmMwLDAuNDU5IDAuMzc0LDAuODMyIDAuODMyLDAuODMyYzAuNDU5LDAgMC44MzIsLTAuMzczIDAuODMyLC0wLjgzMmwwLC04LjQ5bC0wLjgzMiwwYy0yLjI3NSwwIC00LjM5OCwwLjg4MyAtNi4wMTEsMi40NzlsMCwwWk00LjY1Myw1Ljc1NmMtMC40NTksMCAtMC44MzIsMC4zNzQgLTAuODMyLDAuODMybDAsMS45MDJjMCwyLjU2NCAyLjA4OCw0LjY1MyA0LjY1Miw0LjY1M2MyLjU2NCwwIDQuNjcsLTIuMDg5IDQuNjcsLTQuNjUzbDAsLTEuOTE5YzAsLTAuNDU4IC0wLjM3NCwtMC44MzIgLTAuODMyLC0wLjgzMmMtMC40NTksMCAtMC44MTUsMC4zNzQgLTAuODE1LDAuODMybDAsMS45MTljMCwxLjY2NCAtMS4zNDIsMy4wMDYgLTMuMDA2LDMuMDA2Yy0xLjY2NCwwIC0zLjAwNSwtMS4zNDIgLTMuMDA1LC0zLjAwNmwwLC0xLjkxOWMwLC0wLjQ1OCAtMC4zNzQsLTAuODE1IC0wLjgzMiwtMC44MTVsMCwwWiIgc3R5bGU9ImZpbGw6IzllYTNhODtmaWxsLXJ1bGU6bm9uemVybzsiLz48L3N2Zz4=",
			'supports'            => array(
				'title',

			),
		);
		register_post_type( 'epico_capture_sc', $args );
		$this->elements = array_merge( $this->elements, array(
			'posttypes' => array(
				'epico_capture_sc' => 'element',
			)
		) );

		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ), 5, 4 );
		add_action( 'save_post', array( $this, 'save_post_metaboxes' ), 1, 2 );
		add_filter( 'manage_epico_capture_sc_posts_columns', array( $this, 'posts_column' ), 10, 2 );
		add_action( 'manage_epico_capture_sc_posts_custom_column', array( $this, 'custom_postcolumn' ), 10, 2 );
		add_filter( 'post_updated_messages', array( $this, 'updated_messages' ) );
	}

	/**
	 * setup post type messages.
	 *
	 *
	 * @return    array
	 */
	function updated_messages( $messages ) {
		global $post, $post_ID;


		$messages['epico_capture_sc'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf( __( 'Capture updated.', 'uf-epico' ), esc_url( get_permalink( $post_ID ) ) ),
			2  => __( 'Custom field updated.', 'uf-epico' ),
			3  => __( 'Custom field deleted.', 'uf-epico' ),
			4  => __( 'Capture updated.', 'uf-epico' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Capture restored to revision from %s', 'uf-epico' ), wp_post_revision_title( (int) $_GET['revision'], FALSE ) ) : FALSE,
			6  => sprintf( __( 'Capture published.', 'uf-epico' ), esc_url( get_permalink( $post_ID ) ) ),
			7  => __( 'Capture saved.', 'uf-epico' ),
			8  => sprintf( __( 'Capture submitted.', 'uf-epico' ), esc_url( add_query_arg( 'preview', 'TRUE', get_permalink( $post_ID ) ) ) ),
			9  => sprintf( __( 'Capture scheduled for: <strong>%1$s</strong>.', 'uf-epico' ), // translators: Publish box date format, see http://php.net/date
				date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
			10 => sprintf( __( 'Capture draft updated.', 'uf-epico' ), esc_url( add_query_arg( 'preview', 'TRUE', get_permalink( $post_ID ) ) ) ),
		);


		return $messages;
	}


	/**
	 * setup meta boxes.
	 *
	 *
	 * @return    null
	 */
	function add_metabox( $slug, $post ) {
		global $post;

		if ( ! empty( $post ) ) {
			// Always good to have.
			wp_enqueue_media();
			wp_enqueue_script( 'media-upload' );

			wp_enqueue_script( $this->plugin_slug . '-panel-script-sc', self::get_url( 'assets/js/panel-sc.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			add_meta_box( '458101112', __( 'Texts', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* or side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'texts'
			) );
			add_meta_box( '1011141128', __( 'Icon', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* or side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'icon'
			) );
			add_meta_box( '2146812', __( 'Email Marketing', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* or side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'email-marketing'
			) );
			add_meta_box( '01130151', __( 'Customization', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* or side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'customization'
			) );
			add_meta_box( '121521305', __( 'Theme Overrides', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* or side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'theme-overrides'
			) );
		}

	}

	/**
	 * render meta boxes.
	 *
	 *
	 * @return    null
	 */
	function render_metabox( $post, $args ) {
		global $post;

		if ( ! empty( $post ) ) {
			// include the metabox view
			echo '<input type="hidden" name="uf_epico_metabox" id="uf_epico_metabox" value="' . wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';
			echo '<input type="hidden" name="uf_epico_metabox_prefix[]" value="' . $args['args']['slug'] . '" />';

			include self::get_path( __FILE__ ) . 'configs/' . $post->post_type . '-' . $args['args']['file'] . '.php';

			echo "<div class=\"group uf-epico-row-sorter\" id=\"rowitems\">\r\n";
			// build instance
			$depth    = 1;
			$instance = get_post_meta( $post->ID, $args['args']['slug'], TRUE );
			if ( ! empty( $group['multiple'] ) ) {
				foreach ( $group['fields'] as $field => $settings ) {
					if ( isset( $instance[ $field ] ) ) {
						if ( count( $instance[ $field ] ) > $depth ) {
							$depth = count( $instance[ $field ] );
						}
					}
				}
			}
			for ( $i = 0; $i < $depth; $i ++ ) {

				if ( $i > 0 ) {
					echo '  <div class="button button-primary right uf-epico-removeRow" style="margin-top:5px;">' . __( 'Remove', 'uf-epico' ) . '</div>';
				}

				echo "<table class=\"form-table rowGroup groupitems " . ( ! empty( $group['multiple'] ) ? 'group-multiple row-sorter' : '' ) . "\" id=\"groupitems_" . $i . "\" ref=\"items\">\r\n";
				echo "	<tbody>\r\n";
				foreach ( $group['fields'] as $field => $settings ) {
					$id      = 'field_' . $field;
					$groupid = $args['id'];
					$name    = $args['args']['slug'] . '[' . $field . ']';
					$single  = TRUE;
					$value   = $settings['default'];
					if ( ! empty( $group['multiple'] ) ) {
						$name = $args['args']['slug'] . '[' . $field . '][]';
						if ( isset( $instance[ $field ][ $i ] ) ) {
							$value = $instance[ $field ][ $i ];
						}
					} else {
						if ( isset( $instance[ $field ] ) ) {
							$value = $instance[ $field ];
						}
					}
					$label   = $settings['label'];
					$caption = $settings['caption'];
					echo "<tr valign=\"top\">\r\n";
					echo "<th scope=\"row\">\r\n";
					echo "<label for=\"" . $id . "\">" . $label . "</label>\r\n";
					echo "</th>\r\n";
					echo "<td>\r\n";
					include self::get_path( __FILE__ ) . 'includes/field-' . $settings['type'] . '.php';
					if ( ! empty( $caption ) ) {
						echo '<p class="description">' . $caption . '</p>';
					}
					echo "</td>\r\n";
					echo "</tr>\r\n";

				}
				echo "	</tbody>\r\n";
				echo "</table>\r\n";
			}
			if ( ! empty( $group['multiple'] ) ) {
				echo "<div class=\"toolrow\"><button class=\"button uf-epico-add-group-row\" type=\"button\" data-rowtemplate=\"group-" . $args['id'] . "-tmpl\">" . __( 'Add Another', 'uf-epico' ) . "</button></div>\r\n";
			}
			echo "</div>\r\n";
			// Place html template for repeated fields.
			if ( ! empty( $group['multiple'] ) ) {
				echo "<script type=\"text/html\" id=\"group-" . $args['id'] . "-tmpl\">\r\n";
				echo '  <div class="button button-primary right uf-epico-removeRow" style="margin-top:5px;">' . __( 'Remove', 'uf-epico' ) . '</div>';
				echo "	<table class=\"form-table rowGroup groupitems " . ( ! empty( $group['multiple'] ) ? 'group-multiple row-sorter' : '' ) . "\" id=\"groupitems\" ref=\"items\">\r\n";
				echo "		<tbody>\r\n";
				foreach ( $group['fields'] as $field => $settings ) {

					$id      = 'field_{{id}}';
					$groupid = $args['id'];
					$name    = $args['args']['slug'] . '[' . $field . ']';
					$single  = TRUE;
					if ( ! empty( $group['multiple'] ) ) {
						$name = $args['args']['slug'] . '[' . $field . '][]';
					}
					$label   = $settings['label'];
					$caption = $settings['caption'];
					$value   = $settings['default'];
					echo "<tr valign=\"top\">\r\n";
					echo "<th scope=\"row\">\r\n";
					echo "<label for=\"" . $id . "\">" . $label . "</label>\r\n";
					echo "</th>\r\n";
					echo "<td>\r\n";
					include self::get_path( __FILE__ ) . 'includes/field-' . $settings['type'] . '.php';
					if ( ! empty( $caption ) ) {
						echo '<p class="description">' . $caption . '</p>';
					}

					echo "</td>\r\n";
					echo "</tr>\r\n";

				}
				echo "		</tbody>\r\n";
				echo "	</table>\r\n";
				echo "</script>";
			}
		}
	}


	/**
	 * setup meta boxes.
	 *
	 *
	 * @return    null
	 */


	/**
	 * Custom Post type columns.
	 *
	 *
	 * @return    columns
	 */
	function posts_column( $hd ) {
		unset( $hd['date'] );
		$hd['shortcode_slug'] = __( 'Shortcode', 'uf-epico' );
		$hd['date']           = __( 'Date', 'uf-epico' );

		return $hd;
	}

	/**
	 * Custom Post type column render.
	 *
	 *
	 */
	function custom_postcolumn( $col, $id ) {
		echo '[' . $_GET['post_type'] . ' id="' . $id . '"]';
	}

	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 *
	 * @return    null
	 */
	public function enqueue_admin_stylescripts() {

		$screen = get_current_screen();


		if ( $screen->post_type == 'epico_capture_sc' && $screen->base == 'post' ) {
			wp_enqueue_script( $this->plugin_slug . '-image-script-image-modal-js', self::get_url( 'assets/js/image-modal.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		}

		if ( $screen->post_type == 'epico_capture_sc' && $screen->base == 'post' ) {
			wp_enqueue_style( $this->plugin_slug . '-onoff-styles-toggles-css', self::get_url( 'assets/css/toggles.css', __FILE__ ), array(), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-onoff-script-toggles-min-js', self::get_url( 'assets/js/toggles.min.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		}

		if ( $screen->post_type == 'epico_capture_sc' && $screen->base == 'post' ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( $this->plugin_slug . '-script-color-picker-sc-js', self::get_url( 'assets/js/colorpicker-sc.js', __FILE__ ), array( 'wp-color-picker' ), self::VERSION );
		}

		if ( $screen->base == 'post' ) {
			wp_enqueue_script( $this->plugin_slug . '-shortcode-modal-script', self::get_url( 'assets/js/shortcode-modal.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-panel-script', self::get_url( 'assets/js/panel.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			wp_enqueue_style( $this->plugin_slug . '-panel-styles', self::get_url( 'assets/css/panel.css', __FILE__ ), array(), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-image-script-image-modal-js', self::get_url( 'assets/js/image-modal.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			wp_enqueue_style( $this->plugin_slug . '-onoff-styles-toggles-css', self::get_url( 'assets/css/toggles.css', __FILE__ ), array(), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-onoff-script-toggles-min-js', self::get_url( 'assets/js/toggles.min.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		}

		if ( $screen->base == 'widgets' ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( $this->plugin_slug . '-script-color-picker-js', self::get_url( 'assets/js/colorpicker.js', __FILE__ ), array( 'wp-color-picker' ), self::VERSION );
		}


		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		if ( in_array( $screen->id, $this->plugin_screen_hook_suffix ) ) {
			$slug = array_search( $screen->id, $this->plugin_screen_hook_suffix );

			if ( file_exists( self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $slug . '.php' ) ) {
				include self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $slug . '.php';
			} else {
				return;
			}

			if ( ! empty( $configfiles ) ) {
				// Always good to have.
				wp_enqueue_media();
				wp_enqueue_script( 'media-upload' );

				foreach ( $configfiles as $key => $fieldfile ) {
					include $fieldfile;
					if ( ! empty( $group['scripts'] ) ) {
						foreach ( $group['scripts'] as $script ) {
							if ( is_array( $script ) ) {
								foreach ( $script as $remote => $location ) {
									$infoot = FALSE;
									if ( $location == 'footer' ) {
										$infoot = TRUE;
									}
									if ( FALSE !== strpos( $remote, '.' ) ) {
										wp_enqueue_script( $this->plugin_slug . '-' . strtok( basename( $remote ), '.' ), $remote, array( 'jquery' ), FALSE, $infoot );
									} else {
										wp_enqueue_script( $remote, FALSE, array(), FALSE, $infoot );
									}
								}
							} else {
								if ( FALSE !== strpos( $script, '.' ) ) {
									wp_enqueue_script( $this->plugin_slug . '-' . strtok( $script, '.' ), self::get_url( 'assets/js/' . $script, __FILE__ ), array( 'jquery' ), FALSE, TRUE );
								} else {
									wp_enqueue_script( $script );
								}
							}
						}
					}
					if ( ! empty( $group['styles'] ) ) {
						foreach ( $group['styles'] as $style ) {
							if ( is_array( $style ) ) {
								foreach ( $style as $remote ) {
									wp_enqueue_style( $this->plugin_slug . '-' . strtok( basename( $remote ), '.' ), $remote );
								}
							} else {
								wp_enqueue_style( $this->plugin_slug . '-' . strtok( $style, '.' ), self::get_url( 'assets/css/' . $style, __FILE__ ) );
							}
						}
					}
				}
			}
			wp_enqueue_style( $this->plugin_slug . '-admin-styles', self::get_url( 'assets/css/panel.css', __FILE__ ), array(), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-admin-scripts', self::get_url( 'assets/js/panel.js', __FILE__ ), array(), self::VERSION );
		}

	}


	/**
	 * Process a field value
	 *
	 */
	public function process_value( $type, $value ) {

		switch ( $type ) {
			default:
				return $value;
				break;
			case "image":
				$attachment = explode( ',', $value );
				if ( floatval( $attachment[0] ) > 0 ) {
					$image = wp_get_attachment_image_src( $attachment[0], $attachment[1] );
					$value = $image[0];
				}
				break;

		}

		return $value;

	}


	/**
	 * Insert template into footer
	 *
	 *
	 */
	public function footer_template() {

		echo $this->render_element( get_option( "_epico_global_assets_options" ), FALSE, 'epico_global_assets' );

	}


	/**
	 * Insert shortcode media button
	 *
	 *
	 */
	function shortcode_insert_button() {
		global $post;
		if ( ! empty( $post ) ) {
			echo "<a id=\"uf-epico-shortcodeinsert\" title=\"" . __( 'Shortcodes', 'uf-epico' ) . "\" style=\"padding-left: 0.4em;\" class=\"button uf-epico-editor-button\" href=\"#inst\">\n";
			echo "	<img src=\"" . self::get_url( __FILE__ ) . "assets/images/icon.svg\" width=\"17px\" height=\"17px\" alt=\"" . __( "Insert Shortcode", "uf-epico" ) . "\" style=\"padding:0 3px 1px;\" /> " . __( 'Capture', 'uf-epico' ) . "\n";
			echo "</a>\n";
		}
	}

	/**
	 * render shortcode config panel.
	 *
	 *
	 * @return    null
	 */
	function render_shortcode_panel( $shortcode, $type = 1, $template = FALSE ) {


		if ( ! empty( $template ) ) {
			echo "<script type=\"text/html\" id=\"uf-epico-" . $shortcode . "-config-tmpl\">\r\n";
		}
		echo "<input id=\"uf-epico-shortcodekey\" class=\"configexclude\" type=\"hidden\" value=\"" . $shortcode . "\">\r\n";
		echo "<input id=\"uf-epico-shortcodetype\" class=\"configexclude\" type=\"hidden\" value=\"" . $type . "\">\r\n";
		echo "<input id=\"uf-epico-default-content\" class=\"configexclude\" type=\"hidden\" value=\" " . __( 'Your content goes here', 'uf-epico' ) . " \">\r\n";

		if ( ! empty( $this->elements['posttypes'][ $shortcode ] ) ) {
			$posts = get_posts( array( 'post_type' => $shortcode ) );

			if ( empty( $posts ) ) {
				echo 'No items available';
			} else {
				foreach ( $posts as $post ) {
					echo '<div class="posttype-item"><label><input type="radio" value="' . $post->ID . '" name="id"> ' . $post->post_title . '</label></div>';
				}
			}
			if ( ! empty( $template ) ) {
				echo "</script>\r\n";
			}

			return;
		}

		if ( file_exists( self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $shortcode . '.php' ) ) {
			include self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $shortcode . '.php';
		} else {
			if ( ! empty( $template ) ) {
				echo "</script>\r\n";
			}

			return;
		}

		$groups = array();
		echo "<div class=\"uf-epico-shortcode-config-nav\">\r\n";
		echo "	<ul>\r\n";
		foreach ( $configfiles as $key => $fieldfile ) {
			include $fieldfile;
			$groups[] = $group;
			echo "		<li class=\"" . ( $key === 0 ? "current" : "" ) . "\">\r\n";
			echo "			<a title=\"" . $group['label'] . "\" href=\"#row" . $group['master'] . "\"><strong>" . $group['label'] . "</strong></a>\r\n";
			echo "		</li>\r\n";
		}
		echo "	</ul>\r\n";
		echo "</div>\r\n";

		echo "<div class=\"uf-epico-shortcode-config-content " . ( count( $configfiles ) > 1 ? "" : "full" ) . "\">\r\n";
		foreach ( $groups as $key => $group ) {
			echo "<div class=\"group\" " . ( $key === 0 ? "" : "style=\"display:none;\"" ) . " id=\"row" . $group['master'] . "\">\r\n";
			echo "<h3 class=\"uf-epico-config-header\">" . $group['label'] . "</h3>\r\n";
			echo "<table class=\"form-table rowGroup groupitems\" id=\"groupitems\" ref=\"items\">\r\n";
			echo "	<tbody>\r\n";
			foreach ( $group['fields'] as $field => $settings ) {

				$id      = 'field_' . $field;
				$groupid = $group['id'];
				$name    = $field;
				$single  = TRUE;
				if ( ! empty( $group['multiple'] ) ) {
					$name = $field . '[]';
				}
				$label   = $settings['label'];
				$caption = $settings['caption'];
				$value   = $settings['default'];
				echo "<tr valign=\"top\">\r\n";
				echo "<th scope=\"row\">\r\n";
				echo "<label for=\"" . $id . "\">" . $label . "</label>\r\n";
				echo "</th>\r\n";
				echo "<td>\r\n";
				include self::get_path( __FILE__ ) . 'includes/field-' . $settings['type'] . '.php';
				if ( ! empty( $caption ) ) {
					echo "<p class=\"description\">" . $caption . "</p>\r\n";
				}
				echo "</td>\r\n";
				echo "</tr>\r\n";
			}
			echo "	</tbody>\r\n";
			echo "</table>\r\n";

			if ( ! empty( $group['multiple'] ) ) {
				echo "<div class=\"toolrow\"><button class=\"button uf-epico-add-group-row\" type=\"button\" data-rowtemplate=\"group-" . $group['id'] . "-tmpl\">" . __( 'Add Another', 'uf-epico' ) . "</button></div>\r\n";
			}
			echo "</div>\r\n";
		}
		echo "</div>\r\n";

		if ( ! empty( $template ) ) {
			echo "</script>\r\n";
		}
		// go get the loop templates
		foreach ( $groups as $group ) {
			// Place html template for repeated fields.
			if ( ! empty( $group['multiple'] ) ) {
				echo "<script type=\"text/html\" id=\"group-" . $group['id'] . "-tmpl\">\r\n";
				echo '  <div class="button button-primary right uf-epico-removeRow" style="margin:5px 5px 0;">' . __( 'Remove', 'uf-epico' ) . '</div>';
				echo "	<table class=\"form-table rowGroup groupitems\" id=\"groupitems\" ref=\"items\">\r\n";
				echo "		<tbody>\r\n";
				foreach ( $group['fields'] as $field => $settings ) {

					$id      = 'field_{{id}}';
					$groupid = $group['id'];
					$name    = $field . '[__count__]';
					$single  = TRUE;
					$label   = $settings['label'];
					$caption = $settings['caption'];
					$value   = $settings['default'];
					echo "<tr valign=\"top\">\r\n";
					echo "<th scope=\"row\">\r\n";
					echo "<label for=\"" . $id . "\">" . $label . "</label>\r\n";
					echo "</th>\r\n";
					echo "<td>\r\n";
					include self::get_path( __FILE__ ) . 'includes/field-' . $settings['type'] . '.php';
					if ( ! empty( $caption ) ) {
						echo "<p class=\"description\">" . $caption . "</p>\r\n";
					}
					echo "</td>\r\n";
					echo "</tr>\r\n";

				}
				echo "		</tbody>\r\n";
				echo "	</table>\r\n";
				echo "</script>";
			}
		}
	}

	/**
	 * Insert shortcode modal template
	 *
	 *
	 */
	function shortcode_modal_template() {
		$screen = get_current_screen();

		if ( $screen->base != 'post' ) {
			return;
		}

		echo "<script type=\"text/html\" id=\"uf-epico-shortcode-panel-tmpl\">\r\n";
		echo "	<div tabindex=\"0\" id=\"uf-epico-shortcode-panel\" class=\"hidden\">\r\n";
		echo "		<div class=\"media-modal-backdrop\"></div>\r\n";
		echo "		<div class=\"uf-epico-modal-modal\">\r\n";
		echo "			<div class=\"uf-epico-modal-content\">\r\n";
		echo "				<div class=\"uf-epico-modal-header\">\r\n";
		echo "					<a title=\"Close\" href=\"#\" class=\"media-modal-close\">\r\n";
		echo "						<span class=\"media-modal-icon\"></span>\r\n";
		echo "					</a>\r\n";
		echo "					<h2 style=\"background: url(" . self::get_url( '/assets/images/icon.svg', __FILE__ ) . ") no-repeat scroll 0px 2px transparent;background-size: 17px;padding-left: 23px;\">" . __( 'Capture', 'uf-epico' ) . " <small>" . __( "Shortcodes", "uf-epico" ) . "</small></h2>\r\n";
		echo "				</div>\r\n";
		echo "				<div class=\"uf-epico-modal-body\">\r\n";
		echo "					<span id=\"uf-epico-categories\">\r\n";
		echo "					<span class=\"uf-epico-autoload\" data-shortcode=\"epico_capture_sc\"></span>\r\n";
		echo "					</span>\r\n";
		echo "					<div id=\"uf-epico-shortcode-config\" class=\"uf-epico-shortcode-config\">\r\n";
		echo "					</div>\r\n";
		echo "				</div>\r\n";
		echo "				<div class=\"uf-epico-modal-footer\">\r\n";
		echo "					<button class=\"button button-primary button-large\" id=\"uf-epico-insert-shortcode\">" . __( "Insert Shortcode", "uf-epico" ) . "</button>\r\n";
		echo "				</div>\r\n";
		echo "			</div>\r\n";
		echo "		</div>\r\n";
		echo "	</div>\r\n";
		echo "</script>\r\n";

		foreach ( $this->elements['shortcodes'] as $shortcode => $type ) {
			$this->render_shortcode_panel( $shortcode, $type, TRUE );
		}

	}

	/**
	 * Gets a list of shorcodes used within the content provided
	 *
	 * @return    array
	 */
	function get_regex() {

		// this makes it easier to cycle through and get the used codes for inclusion
		$validcodes = join( '|', array_map( 'preg_quote', array_keys( $this->elements['shortcodes'] ) ) );

		return '\\['                           // Opening bracket
		       . '(\\[?)'                      // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
		       . "($validcodes)"               // 2: selected codes only
		       . '\\b'                         // Word boundary
		       . '('                           // 3: Unroll the loop: Inside the opening shortcode tag
		       . '[^\\]\\/]*'                  // Not a closing bracket or forward slash
		       . '(?:' . '\\/(?!\\])'          // A forward slash not followed by a closing bracket
		       . '[^\\]\\/]*'                  // Not a closing bracket or forward slash
		       . ')*?' . ')' . '(?:' . '(\\/)' // 4: Self closing tag ...
		       . '\\]'                         // ... and closing bracket
		       . '|' . '\\]'                   // Closing bracket
		       . '(?:' . '('                   // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
		       . '[^\\[]*+'                    // Not an opening bracket
		       . '(?:' . '\\[(?!\\/\\2\\])'    // An opening bracket not followed by the closing shortcode tag
		       . '[^\\[]*+'                    // Not an opening bracket
		       . ')*+' . ')' . '\\[\\/\\2\\]'  // Closing shortcode tag
		       . ')?' . ')' . '(\\]?)';        // 6: Optional second closing brocket for escaping shortcodes: [[tag]]

	}

	function get_used_shortcodes( $content, $return = array(), $internal = TRUE, $preview = FALSE ) {

		$regex = self::get_regex();

		preg_match_all( '/' . $regex . '/s', $content, $found );

		foreach ( $found[5] as $innerContent ) {
			if ( ! empty( $innerContent ) ) {
				$new = self::get_used_shortcodes( $innerContent, $found, $internal );
				if ( ! empty( $new ) ) {
					foreach ( $new as $key => $val ) {
						$found[ $key ] = array_merge( $found[ $key ], $val );
					}
				}
			}
		}

		return $found;
	}


	/**
	 * setup meta boxes.
	 *
	 *
	 * @return    null
	 */
	public function get_post_meta( $id, $key = null, $single = FALSE ) {

		if ( ! empty( $key ) ) {

			if ( file_exists( self::get_path( __FILE__ ) . 'configs/fieldgroups-uf_epico.php' ) ) {
				include self::get_path( __FILE__ ) . 'configs/fieldgroups-uf_epico.php';
			} else {
				return;
			}

			$field_type = 'text';
			foreach ( $configfiles as $config => $file ) {
				include $file;
				if ( isset( $group['fields'][ $key ]['type'] ) ) {
					$field_type = $group['fields'][ $key ]['type'];
					break;
				}
			}
			$key = 'uf_epico_' . $key;
		}
		if ( FALSE === $single ) {
			$metas = get_post_meta( $id, $key );
			foreach ( $metas as $key => &$value ) {
				$value = $this->process_value( $field_type, $value );
			}

			return $metas;
		}

		return $this->process_value( $field_type, get_post_meta( $id, $key, $single ) );

	}


	/**
	 * save metabox data
	 *
	 *
	 */
	function save_post_metaboxes( $pid, $post ) {

		if ( ! isset( $_POST['uf_epico_metabox'] ) || ! isset( $_POST['uf_epico_metabox_prefix'] ) ) {
			return;
		}


		if ( ! wp_verify_nonce( $_POST['uf_epico_metabox'], plugin_basename( __FILE__ ) ) ) {
			return $post->ID;
		}
		if ( ! current_user_can( 'edit_post', $post->ID ) ) {
			return $post->ID;
		}
		if ( $post->post_type == 'revision' ) {
			return;
		}

		foreach ( $_POST['uf_epico_metabox_prefix'] as $prefix ) {
			if ( ! isset( $_POST[ $prefix ] ) ) {
				continue;
			}

			delete_post_meta( $post->ID, $prefix );
			add_post_meta( $post->ID, $prefix, $_POST[ $prefix ] );
		}
	}

	/**
	 * create and register an instance ID
	 *
	 */
	public function element_instance_id( $id, $process ) {

		$this->element_instances[ $id ][ $process ][] = TRUE;
		$count                                        = count( $this->element_instances[ $id ][ $process ] );
		if ( $count > 1 ) {
			return $id . ( $count - 1 );
		}

		return $id;
	}

	/**
	 * Render the element
	 *
	 */
	public function render_element( $atts, $content, $slug, $head = FALSE ) {

		$raw_atts = $atts;

		// is this a post type ID?
		if ( ! empty( $atts['id'] ) ) {
			$content = get_post_field( 'post_content', $atts['id'] );
			$atts    = get_post_meta( $atts['id'], $slug, TRUE );
		}

		if ( ! empty( $head ) ) {
			$instanceID = $this->element_instance_id( 'uf_epico' . $slug, 'header' );
		} else {
			$instanceID = $this->element_instance_id( 'uf_epico' . $slug, 'footer' );
		}


		// Set the custom ID based on user input (1.2.1 forward)
		if ( empty( $atts['widget_id'] ) ) {
			$custom_id = $instanceID;
		} else {
			$custom_id = $atts['widget_id'];
			$custom_id = sanitize_file_name( $custom_id );

		}


		if ( file_exists( self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $slug . '.php' ) ) {
			include self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $slug . '.php';

			$defaults = array();
			foreach ( $configfiles as $file ) {

				include $file;
				foreach ( $group['fields'] as $variable => $conf ) {
					if ( ! empty( $group['multiple'] ) ) {
						$value = array( $this->process_value( $conf['type'], $conf['default'] ) );
					} else {
						$value = $this->process_value( $conf['type'], $conf['default'] );
					}
					if ( ! empty( $group['multiple'] ) ) {
						if ( isset( $atts[ $variable . '_1' ] ) ) {
							$index = 1;
							$value = array();
							while ( isset( $atts[ $variable . '_' . $index ] ) ) {
								$value[] = $this->process_value( $conf['type'], $atts[ $variable . '_' . $index ] );
								$index ++;
							}
						} elseif ( isset( $atts[ $variable ] ) ) {
							if ( is_array( $atts[ $variable ] ) ) {
								foreach ( $atts[ $variable ] as &$varval ) {
									$varval = $this->process_value( $conf['type'], $varval );
								}
								$value = $atts[ $variable ];
							} else {
								$value[] = $this->process_value( $conf['type'], $atts[ $variable ] );
							}
						}
					} else {
						if ( isset( $atts[ $variable ] ) ) {
							$value = $this->process_value( $conf['type'], $atts[ $variable ] );
						}
					}

					if ( ! empty( $group['multiple'] ) && ! empty( $value ) ) {
						foreach ( $value as $key => $val ) {
							$groups[ $group['master'] ][ $key ][ $variable ] = $val;
						}
					}
					$defaults[ $variable ] = $value;
				}
			}
			$atts = $defaults;
		}
		// pull in the assets
		$assets = array();
		if ( file_exists( self::get_path( __FILE__ ) . 'assets/assets-' . $slug . '.php' ) ) {
			include self::get_path( __FILE__ ) . 'assets/assets-' . $slug . '.php';
		}

		ob_start();
		if ( file_exists( self::get_path( __FILE__ ) . 'includes/element-' . $slug . '.php' ) ) {
			include self::get_path( __FILE__ ) . 'includes/element-' . $slug . '.php';
		} else if ( file_exists( self::get_path( __FILE__ ) . 'includes/element-' . $slug . '.html' ) ) {
			include self::get_path( __FILE__ ) . 'includes/element-' . $slug . '.html';
		}
		$out = ob_get_clean();


		if ( ! empty( $head ) ) {

			// process headers - CSS
			if ( file_exists( self::get_path( __FILE__ ) . 'assets/css/styles-' . $slug . '.php' ) ) {
				ob_start();
				include self::get_path( __FILE__ ) . 'assets/css/styles-' . $slug . '.php';
				$this->element_header_styles[] = ob_get_clean();
				add_action( 'wp_enqueue_scripts', array(
					$this,
					'header_styles'
				), 15 ); // Adiciona estilos inline do plugin apos estilos do tema
			} else if ( file_exists( self::get_path( __FILE__ ) . 'assets/css/styles-' . $slug . '.css' ) ) {
				wp_enqueue_style( $this->plugin_slug . '-' . $slug . '-styles', self::get_url( 'assets/css/styles-' . $slug . '.css', __FILE__ ), array(), self::VERSION );
			}
			// process headers - JS
			if ( file_exists( self::get_path( __FILE__ ) . 'assets/js/scripts-' . $slug . '.php' ) ) {
				ob_start();
				include self::get_path( __FILE__ ) . 'assets/js/scripts-' . $slug . '.php';
				$this->element_footer_scripts[] = ob_get_clean();
			} else if ( file_exists( self::get_path( __FILE__ ) . 'assets/js/scripts-' . $slug . '.js' ) ) {
				wp_enqueue_script( $this->plugin_slug . '-' . $slug . '-script', self::get_url( 'assets/js/scripts-' . $slug . '.js', __FILE__ ), array( 'jquery' ), self::VERSION, TRUE );
			}
			// get clean do shortcode for header checking
			ob_start();
			do_shortcode( $out );
			ob_get_clean();

			return;
		}

		return do_shortcode( $out );
	}

	/**
	 * Detect elements used on the page to allow us to enqueue needed styles and scripts
	 *
	 */
	public function detect_elements() {
		global $wp_query;


		// is this a post type?
		if ( isset( $this->elements['posttypes'] ) ) {
			$this_post_type = get_post_type();
			if ( isset( $this->elements['posttypes'][ $this_post_type ] ) ) {
				if ( $this->elements['posttypes'][ $this_post_type ] === 'browsable' ) {
					// Browseable - render element over content.
					foreach ( $wp_query->posts as $key => &$post ) {
						// process header portion
						$this->render_element( array( 'id' => $post->ID ), $post->post_content, $this_post_type, TRUE );
						// render content portion and replace content
						$post->post_content = $this->render_element( array( 'id' => $post->ID ), $post->post_content, $this_post_type );
					}
				}
			}
		}


		// find used shortcodes within posts
		foreach ( $wp_query->posts as $key => &$post ) {
			$shortcodes = self::get_used_shortcodes( $post->post_content );
			if ( ! empty( $shortcodes[2] ) ) {
				foreach ( $shortcodes[2] as $foundkey => $shortcode ) {
					$atts = array();
					if ( ! empty( $shortcodes[3][ $foundkey ] ) ) {
						$atts = shortcode_parse_atts( $shortcodes[3][ $foundkey ] );
					}

					// process header portion
					$this->render_element( $atts, $post->post_content, $shortcode, TRUE );
				}
			}
		}


		wp_enqueue_style( 'epico_global_assets-epico_capture_styles', self::get_url( '/assets/css/capture-styles-min.css', __FILE__ ) );
		wp_enqueue_script( 'Jquery', FALSE, FALSE, FALSE, FALSE );
		wp_enqueue_script( 'epico_global_assets-epico_capture_plugin', self::get_url( '/assets/js/capture-plugin.js', __FILE__ ), array( 'jquery' ), FALSE, TRUE );

		$this->render_element( get_option( "_epico_global_assets_options" ), FALSE, 'epico_global_assets', TRUE );

		add_action( 'wp_footer', array( $this, 'footer_template' ) );

		add_filter( 'plugin_row_meta', 'add_plugin_page_links', 10, 2 );

	}

	/**
	 * Render any header styles
	 *
	 */
	public function header_styles() {
		if ( ! empty( $this->element_header_styles ) ) {

			$custom_styles = '';

			foreach ( $this->element_header_styles as $styles ) {
				$custom_styles .= $styles . "\r\n";
			}
			wp_add_inline_style( 'style', $custom_styles ); // Adiciona estilos inline, logo apos estilos de cor de sobreposicao do tema

		}
	}

	/**
	 * Render any footer scripts
	 *
	 */
	public function footer_scripts() {

		if ( ! empty( $this->element_footer_scripts ) ) {
			echo "<script type=\"text/javascript\">\r\n";
			foreach ( $this->element_footer_scripts as $script ) {
				echo $script . "\r\n";
			}
			echo "</script>\r\n";
		}
	}

	/***
	 * Get the current URL
	 *
	 */
	static function get_url( $src = null, $path = null ) {
		if ( ! empty( $path ) ) {
			return plugins_url( $src, $path );
		}

		return trailingslashit( plugins_url( $path, __FILE__ ) );
	}

	/***
	 * Get the current URL
	 *
	 */
	static function get_path( $src = null ) {
		return plugin_dir_path( $src );

	}

	/**
	 * Uses WP's wp_kses to clear some of the html tags but allow some attribs
	 * usage: orbisius_html_util::strip_tags($str);
	 * uses WordPress' wp_kses()
	 *
	 * @param str $buffer string buffer
	 *
	 * @return str cleaned up text
	 */
	public static function strip_tags( $buffer ) {

		$allowed_tags = array(
			'input' => array(
				'name'  => array(),
				'value' => array(),
				'type'  => array(
					'hidden' => array(),
					'email'  => array(),
				),
			),
			'form'  => array(
				'action' => array(),
			),
		);

		$allowed_protocols = array( 'http', 'https' );

		$buffer = wp_kses( $buffer, $allowed_tags, $allowed_protocols );

		$buffer = trim( $buffer );

		return $buffer;
	}

	public static function filter_form_html( $string ) {
		$result = preg_replace( '/(<.*?\b[^>]*>).*?(<\/.*?>)/i', '$1$2', $string );

		return $result;
	}
}
