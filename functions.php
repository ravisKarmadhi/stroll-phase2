<?php
ini_set('display_errors', 'off');
ini_set('error_reporting', E_ALL);
$curious_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php'  // Theme wrapper class
];

foreach ($curious_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(
    array(
      'page_title' => 'Header',
      'menu_title' => 'Header',
      'menu_slug' => 'header-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Footer',
      'menu_title' => 'Footer',
      'menu_slug' => 'footer-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Search Page Content',
      'menu_title' => 'Search Page Content',
      'menu_slug' => 'search-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
}

add_action('init', 'create_project_solution');
function create_project_solution()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'solution';
  $plural_name = 'Solutions';
  $singular_name = 'solution';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}

add_action('init', 'create_project_case_studies');
function create_project_case_studies()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'case Studies';
  $plural_name = 'Case Studies';
  $singular_name = 'case studies';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}

add_action('init', 'create_project_help_center');
function create_project_help_center()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'help center';
  $plural_name = 'Help Centers';
  $singular_name = 'help center';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}


add_action('init', 'create_project_link_post');
function create_project_link_post()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'link post';
  $plural_name = 'Link Posts';
  $singular_name = 'link post';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}

add_action('init', 'create_project_medical');
function create_project_medical()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'medical';
  $plural_name = 'Medicals';
  $singular_name = 'medical';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}


function add_acf_body_class($classes)
{
  global $post;
  $value = get_field('background_color');
  if ($value) {
    $classes[] = $value;
  }
  return $classes;
}
add_filter('body_class', 'add_acf_body_class');

function my_taxonomies_case()
{
  $plural_name = 'case';
  $singular_name = 'case';

  $labels = array(
    'name' => _x($singular_name, 'taxonomy general name'),
    'singular_name' => _x($singular_name . ' Category', 'taxonomy singular name'),
    'search_items' => __('Search ' . $singular_name . ' Categories'),
    'all_items' => __('All ' . $singular_name . ' Categories'),
    'parent_item' => __('Parent ' . $singular_name . ' Category'),
    'parent_item_colon' => __('Parent ' . $singular_name . ' Category:'),
    'edit_item' => __('Edit ' . $singular_name . ' Category'),
    'update_item' => __('Update ' . $singular_name . ' Category'),
    'add_new_item' => __('Add New ' . $singular_name . ' Category'),
    'new_item_name' => __('New ' . $singular_name . ' Category'),
    'menu_name' => __('' . $singular_name . ' Categories'),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy('case-term', 'casestudies', $args);
}
add_action('init', 'my_taxonomies_case', 0);

function blog_load_more()
{
  $blogs = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 9,
    'orderby' => 'date',
    'order' => 'DESC',
    'offset' => 9 * ($_POST['paged'] - 1)
  ]);
  $response = '';
  if ($blogs->have_posts()) {
    while ($blogs->have_posts()) : $blogs->the_post();
      $id       = get_the_ID();
      $ntitle   = get_the_title();
      $content  = get_the_excerpt();
      $time = get_field('time', $id);
      $current = get_the_terms($id, 'category');
      $people_and_company_links = get_field('people_and_company_links', $id); ?>
      <div class="col-xl-4 col-lg-6 dmb-80 tmb-20 filter <?php echo $current[0]->slug ?>">
        <a href="<?php echo get_permalink($id); ?>" class="w-100 d-block bg-white radiusX overflow-hidden text-decoration-none single-blog-card card-hover-new">
          <div class="single-blog-img overflow-hidden">
            <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="hover-img w-100 h-100 object-cover " alt="">
          </div>
          <div class="dpt-30 dpb-25 px-lg-4 px-3 mx-lg-0 mx-1 ms-lg-2">
            <p class="acid-bold textsecondary lh-1 fontX"><?php echo $current[0]->name ?></p>
            <div class="pe-4">
              <h4 class="acid-bold textlightblack leadingL dpt-15 me-lg-5 pe-lg-5 fontXM"><?php echo $ntitle; ?></h4>
            </div>
            <div class="dpt-20 d-flex align-items-center justify-content-between">
              <h5 class="textlightblack fontX  lh-1 acid-normal">
                <span class="acid-bold"><?php echo $time; ?> -</span>
                <?php echo get_the_date('j M, Y'); ?>
              </h5>
              <?php $id_master = $people_and_company_links[0]->ID; ?>
              <div class="rounded-circle aurthor-details-img overflow-hidden">
                <img src="<?php echo get_the_post_thumbnail_url($id_master); ?>" class="w-100 h-100 object-cover" alt="">
              </div>
            </div>
          </div>
        </a>
      </div>
<?php
    endwhile;
  } else {
  }
  echo $response;
  exit;
}
add_action('wp_ajax_blog_load_more', 'blog_load_more');
add_action('wp_ajax_nopriv_blog_load_more', 'blog_load_more');

add_action('init', 'create_Location_post_type');
function create_Location_post_type()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'location';
  $plural_name = 'locations';
  $singular_name = 'location';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}

function my_acf_google_map_api($api)
{

  $api['key'] = 'AIzaSyBJLT6yLy9m1ywSmh0mvZQ9sBArAS5bXQM';

  return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function getCoordinates($address)
{

  $cleanAddress = strip_tags($address);
  $stringArray = explode(',', $cleanAddress);
  unset($stringArray[0]);

  $cleanAddress = implode(',', $stringArray);
  $string = str_replace(" ", "+", urlencode(strip_tags($cleanAddress)));


  //  var_dump($string);
  //  exit;


  $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $string . "&sensor=false&key=AIzaSyBJLT6yLy9m1ywSmh0mvZQ9sBArAS5bXQM";

  //  var_dump($details_url);
  //  exit;

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $details_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $response = json_decode(curl_exec($ch), true);

  // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
  if ($response['status'] != 'OK') {
    return null;
  }
  $geometry = $response['results'][0]['geometry'];

  $longitude = $geometry['location']['lng'];
  $latitude = $geometry['location']['lat'];

  $country = getCountry($response['results'][0]['address_components']);

  $array = array(
    'country' => $country,
    'latitude' => $geometry['location']['lat'],
    'longitude' => $geometry['location']['lng'],
  );

  return $array;
}


function getCountry($components)
{
  $data = array();
  foreach ($components as $element) {
    $data[implode(' ', $element['types'])] = $element['long_name'];
  }

  return $data['country political'];
}

function save_stockist_meta($post_id, $post, $update)
{
  global $wpdb;

  /*
     * In production code, $slug should be set only once in the plugin,
     * preferably as a class property, rather than in each function that needs it.
     */
  $post_type = get_post_type($post_id);
  setup_postdata($post_id);

  // If this isn't a 'book' post, don't update it.
  if ("location" != $post_type) return;

  $coordinates = get_field('coordinate', $post_id);


  $addressArray = [];

  if (get_field('address_detail', $post_id)['address']) {
    $addressArray[] = get_field('address_detail', $post_id)['address'];
  }

  if (get_field('address_detail', $post_id)['town']) {
    $addressArray[] = get_field('address_detail', $post_id)['town'];
  }

  if (get_field('address_detail', $post_id)['zip_code']) {
    $addressArray[] = get_field('address_detail', $post_id)['zip_code'];
  }

  $addressClean = implode(',', $addressArray);




  //   var_dump($fullAddress);
  //   exit();

  if (!$coordinates) {
    $address = getCoordinates($addressClean);
    // var_dump(get_field('address', $post_id));
    // exit();
    $latitude = $address['latitude'];
    $longitude = $address['longitude'];

    // var_dump($address);
    // exit;

  } else {
    $latitude = $coordinates['lat'];
    $longitude = $coordinates['lng'];
  }


  if ($latitude == '' || $longitude == '') {
    $emailContent = get_field('id', $post_id) . ' - ' . get_field('address', $post_id);
    //mail('arthur@thecuriousway.com', 'Stockists Import', $emailContent);
  }


  $propertyObject = $wpdb->get_results('SELECT id FROM markers WHERE propertyID = ' . $post_id . '');
  

  if (count($propertyObject) === 0) {

    $wpdb->insert(
      'markers',
      array(
        'lat' => $latitude,
        'lng' => $longitude,
        'propertyID' => $post_id
      )
    );
  } else {

    $wpdb->update(
      'markers',
      array(
        'lat' => $latitude,
        'lng' => $longitude
      ),
      array('propertyID' => $post_id)
    );
  }
  //sleep(2);

  // Define your data with latitude and longitude
  $data = array(
    array(
      'post_id' => $post_id, // ID of the post or custom post type where you want to update the ACF field
      'latitude' => $latitude, // Replace with your latitude value
      'longitude' => $longitude, // Replace with your longitude value
    ),
    // Add more data records as needed
  );

  // Loop through the data and update ACF map field
  foreach ($data as $record) {
    $post_id = $record['post_id'];
    $latitude = $record['latitude'];
    $longitude = $record['longitude'];

    // Update the ACF map field using update_field
    update_field('coordinate', array('lat' => $latitude, 'lng' => $longitude), $post_id);
  }

  // Optionally, you can also update the ACF field for a specific post type by using a WP_Query and loop through the posts
  /*
    $args = array(
        'post_type' => 'your_post_type',
        'posts_per_page' => -1, // Retrieve all posts of your custom post type
    );

    $posts = new WP_Query($args);

    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            $post_id = get_the_ID();
            // Update the ACF map field for each post here
            update_field('your_map_field', array('lat' => $latitude, 'lng' => $longitude), $post_id);
        }
        wp_reset_postdata();
    }
    */

  // You can add error handling and validation as needed.

  echo 'ACF map fields updated successfully.';
}
add_action('save_post', 'save_stockist_meta', 400, 3);

add_action('wp_ajax_get_stockists_ajax', 'getStockistsAJAX');
add_action('wp_ajax_nopriv_get_stockists_ajax', 'getStockistsAJAX');

function getStockistsAJAX()
{
    global $wpdb, $post;
    $type = $_POST['type']; //yyyymmdd

    $args = array(
      'post_type' => 'location',
      'meta_query' => array(
      array(
      'key' => 'type',
      'value' => $type,
      'compare' => '=',
      'type' => 'STRING'
      )
      )
      );
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post();

          $callback[] = array(
      'title' => get_the_title(),
      'coordinates' => get_field('coordinate'),
      );

    endwhile;
    endif;

    echo json_encode($callback);
    //print_r($post);

    wp_die();
}

add_action('wp_ajax_get_stockists_by_postcode_ajax', 'getStockistsByPostcodeAJAX');
add_action('wp_ajax_nopriv_get_stockists_by_postcode_ajax', 'getStockistsByPostcodeAJAX');

function getStockistsByPostcodeAJAX()
{
  global $wpdb, $post;
  $coordinates['lat'] = $_POST['lat'];
  $coordinates['lng'] = $_POST['lng'];
  $filterArrayString = isset($_POST['filterArrayString']) ?? null;
  $filterStringValuesSQL = '';

  if(isset($filterArrayString) && is_array($filterArrayString) && count($filterArrayString) > 0):
    for ($i = 0; $i < count($filterArrayString); $i++) {
      if ($i == 0) {
          $ANDOR = 'AND';
      } else {
          $ANDOR = 'OR';
      }
      $filterStringValuesSQL = $filterStringValuesSQL . $ANDOR . " wp_term_taxonomy.term_id = '" . $filterArrayString[$i] . "' ";
    }
  endif;

  /*$query = "
        SELECT SQL_CALC_FOUND_ROWS  wp_posts.ID, lat, lng, ( 3959 * acos( cos( radians(" . $coordinates['lat'] . ") ) * cos( radians( marker.lat ) ) * cos( radians( marker.lng ) - radians(" . $coordinates['lng'] . ") ) + sin( radians(" . $coordinates['lat'] . ") ) * sin( radians( marker.lat ) ) ) ) AS distance
        FROM wp_posts
        INNER JOIN markers AS marker ON (wp_posts.ID = marker.propertyID)
        INNER JOIN wp_term_relationships ON
        (wp_posts.ID = wp_term_relationships.object_id)
        INNER JOIN wp_term_taxonomy ON
        (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
        WHERE 1=1
        AND wp_posts.post_type = 'location'
        GROUP BY wp_posts.ID
        HAVING distance <= 50
        ORDER BY distance ASC
    ";*/

    //$searchedLocationCoordinates = getCoordinates($searchInput . ', UK');

  $query = "
        SELECT SQL_CALC_FOUND_ROWS  wp_posts.ID, lat, lng, ( 3959 * acos( cos( radians(" . $coordinates['lat'] . ") ) * cos( radians( marker.lat ) ) * cos( radians( marker.lng ) - radians(" . $coordinates['lng'] . ") ) + sin( radians(" . $coordinates['lat'] . ") ) * sin( radians( marker.lat ) ) ) ) AS distance
        FROM wp_posts
        INNER JOIN markers AS marker ON (wp_posts.ID = marker.propertyID)
        WHERE 1=1
        AND wp_posts.post_type = 'location'
        GROUP BY wp_posts.ID
        HAVING distance <= 50
        ORDER BY distance ASC
    ";

  $results = $wpdb->get_results($query);

  if (count($results) > 0) {
    foreach ($results as $result) {
        $id = $result->ID;
        $post = get_post($id);
        setup_postdata($post);
        $_coordinates = get_field('coordinate');

        if (!$_coordinates) {
            $_coordinates['lat'] = $result->lat;
            $_coordinates['lng'] = $result->lng;
        }

        if (get_the_post_thumbnail_url($id)) { 
          $imageURL = get_the_post_thumbnail_url(); 
        } else {
          $imageURL = get_home_url() . '/wp-content/uploads/2023/12/text-1.png';
        }

        $address_details = get_field('address_detail');
        $address_detail = $address_details['address'] ?? '';
        $address_town = $address_detail['town'] ?? '';
        $address_zip_code = $address_detail['zip_code'] ?? '';

        $callback[] = array(

          'title' => get_the_title(),
          'coordinates' => $_coordinates,
          'distance' => number_format($result->distance, 1),

          'id' => get_the_ID(),
          'title' => get_the_title(),
          'excerpt' => get_the_excerpt(),
          'miles' => get_field('miles'),
          'address_detail' => $address_detail,
          'address_town' => $address_town,
          'address_zip_code' => $address_zip_code,
          'link' => get_permalink(),
          'image' => $imageURL,
      );
    }
}


echo json_encode($callback);

wp_die();
}

function to_title_case($string)
{
  /* Words that should be entirely lower-case */
  $articles_conjunctions_prepositions = array(
    'a', 'an', 'the',
    'and', 'but', 'or', 'nor',
    'if', 'then', 'else', 'when',
    'at', 'by', 'from', 'for', 'in',
    'off', 'on', 'out', 'over', 'to', 'into', 'with'
  );
  /* Words that should be entirely upper-case (need to be lower-case in this list!) */
  $acronyms_and_such = array(
    'asap', 'unhcr', 'wpse', 'wtf'
  );
  /* split title string into array of words */
  $words = explode(' ', mb_strtolower($string));
  /* iterate over words */
  foreach ($words as $position => $word) {
    /* re-capitalize acronyms */
    if (in_array($word, $acronyms_and_such)) {
      $words[$position] = mb_strtoupper($word);
      /* capitalize first letter of all other words, if... */
    } elseif (
      /* ...first word of the title string... */
      0 === $position ||
      /* ...or not in above lower-case list*/
      !in_array($word, $articles_conjunctions_prepositions)
    ) {
      $words[$position] = ucwords($word);
    }
  }
  /* re-combine word array */
  $string = implode(' ', $words);
  /* return title string in title case */
  return $string;
}

add_action('init', 'create_project_faq');
function create_project_faq()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'faq';
  $plural_name = 'faq';
  $singular_name = 'faq';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}

add_action('init', 'create_project_testimonial');
function create_project_testimonial()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'testimonial';
  $plural_name = 'testimonials';
  $singular_name = 'testimonial';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}
