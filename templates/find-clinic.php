<?php
/*
  * Template Name: Find Clinic
*/
?>

<?php

$meta_query = array();
$args = array(
    'post_type' => 'location',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => 1
);
if (!empty($_GET['town']) && !empty($_GET['zip_code'])) {
    //$args['s'] = $_GET['town'];
    $input_val = $_GET['town'] . " " . $_GET['zip_code'];
?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            get_nearest_locations("<?= $input_val; ?>");
        });
    </script>
<?php
} elseif (!empty($_GET['town'])) {
    $input_val = $_GET['town'];
?>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            get_nearest_locations("<?= $input_val; ?>");
        });
    </script>
<?php

} elseif (!empty($_GET['zip_code'])) {
    $input_val = $_GET['zip_code'];
?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            get_nearest_locations("<?= $input_val; ?>");
        });
    </script>
<?php

}
if (!empty($meta_query)) {
    $args['meta_query'] = $meta_query;
}
$news = new WP_Query($args);
?>
<div class="dpt-130 tpt-160"></div>

<section class=" position-relative map-section-main overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  position-absolute p-initial start-0 top-0 tmt-35">
                <div class="d-lg-none">
                    <h5 class="acid-bold textlightblack fontXL dmb-25 tmb-20 tmt-0 dmt-40 resfontXXS">Find a
                        Clinic
                    </h5>
                    <form class="search-form-faq pt-20 ">
                        <div class="search-input-clinic search-form-master">
                            <div class="position-relative">
                                <?php if (!empty($_GET['your-text'])) : ?>
                                    <input type="text" placeholder="Location Entered" class="location-input-mobile acid-normal textlightblack text-capitalize w-100  resfontL lh-1 radiusS fontXX border-lightPrimary" name="your-text" value="<?= $_GET['your-text']; ?>">
                                <?php else : ?>
                                    <input type="text" placeholder="Location Entered" class="location-input-mobile acid-normal textlightblack text-capitalize w-100  resfontL lh-1 radiusS fontXX border-lightPrimary" name="your-text" value="">
                                <?php endif; ?>
                                <div class="position-absolute d-flex flex-column justify-content-center  h-100 top-0 end-0">
                                    <button class="bgsecondary border-0 rounded-circle me-2">
                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/search-icon.svg" alt="">
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="map-section tmt-35">
                    <div class="google-map h-100 w-100 overflow-hidden">
                        <div style="width: 100%; height: 80vh;" id="map"></div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6  ms-auto px-lg-5 map-section-content">
                <div class="me-lg-2 ps-lg-5 pe-lg-1 d-flex justify-content-between flex-column h-100">
                    <div class="d-lg-block d-none">
                        <h5 class="acid-bold textlightblack fontXL dmb-25 tmb-20 tmt-0 dmt-40 resfontXXS">Find a
                            Clinic
                        </h5>
                        <form class="search-form-faq pt-20 ">
                            <div class="search-input-clinic search-form-master">
                                <div class="position-relative">
                                    <?php if (!empty($_GET['your-text'])) : ?>
                                        <input type="text" placeholder="Enter Location..." class="location-input-desktop acid-normal textlightblack text-capitalize w-100  resfontL lh-1 radiusS fontXX border-lightPrimary" name="your-text" value="<?= $_GET['your-text']; ?>">
                                    <?php else : ?>
                                        <input type="text" placeholder="Enter Location..." class="location-input-desktop acid-normal textlightblack text-capitalize w-100  resfontL lh-1 radiusS fontXX border-lightPrimary" name="your-text" value="">
                                    <?php endif; ?>
                                    <div class="position-absolute d-flex flex-column justify-content-center  h-100 top-0 end-0">
                                        <button class="bgsecondary border-0 rounded-circle me-2">
                                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/search-icon.svg" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="company-list dpt-15 tpt-30 d-lg-block ">
                        <?php $i = 0;
                        while ($news->have_posts()) : $news->the_post();
                            $id       = get_the_ID();
                            $ntitle   = get_the_title();
                            $post_excerpt = get_the_excerpt();
                            $miles = get_field('miles', $id);
                            $address_detail = get_field('address_detail', $id);
                        ?>
                            <div class="single-company-list d-flex dpt-15 dpb-35 border border-offwhite border-start-0 border-end-0 border-top-0">
                                <div class="pe-1">
                                    <div class="company-profile">
                                        <?php if (get_the_post_thumbnail_url($id)) : ?>
                                        <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="" alt="" />
                                        <?php else: ?>
                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/text-1.png" class="" alt="" />
                                        <?php endif; ?>
                                    </div>
                                    <h6 class="acid-normal textlightblack lh-1 fontS dmt-15 text-center"><?php echo $miles; ?>
                                    </h6>
                                </div>
                                <div class="ps-4 ms-2 mt-2 pt-1">
                                    <h5 class="acid-normal textlightblack fontXL lh-1"><?php echo $ntitle; ?></h5>
                                    <p class="acid-normal textlightblack dmt-15 fontM leadingX"><?php echo $address_detail['address'] ?>,<?php echo $address_detail['town'] ?>, <?php echo $address_detail['zip_code'] ?></p>
                                    <a href="<?php echo get_permalink($id); ?>" class="fontM textlightblack acid-bold lh-1 dmt-25 d-block">Learn
                                        more</a>
                                </div>
                            </div>
                        <?php $i++;
                        endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="dmt-140 tmt-55"></div>


<script>
    //* Google MAPS Code Starts *//
    var map;
    var markers = [];
    var markerCluster;


    function initialize() {
        var mapOptions = {
            zoom: 6.5,
            center: new google.maps.LatLng(51.520370, -0.111630),
            styles: [{
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#e9e9e9"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#dedede"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                            "saturation": 36
                        },
                        {
                            "color": "#333333"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#f2f2f2"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                }
            ]
        }
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);

        console.log(map);

        setMarkers(map, locations);
    }

    var locations = [
        <?php
        $query = 'SELECT * from markers GROUP BY propertyID';
        $results = $wpdb->get_results($query);
        $i = 1;
        foreach ($results as $result) :
            $coordinates = get_field('coordinate');
            $icon = '';

            $i = 0;
            $args = array(
                'post_type' => 'location',
                'post__in' => array($result->propertyID),
                'status' => 'published'
            );
            $the_query = new WP_Query( $args );
            if (!$the_query->have_posts()) {
                continue;
            }
            if ($result->lat <= 0){
            continue;
            }

            


        ?>['<?php echo '<div class="map--popup">';
            echo '<img src=" ' . get_the_post_thumbnail_url($result->propertyID) . ' ">';
            echo '<br>';
            echo get_the_title($result->propertyID);
            echo '<br>';
            echo '<br>';

            if ( have_rows( 'address_detail', $result->propertyID ) ) :
                while ( have_rows( 'address_detail', $result->propertyID ) ) :
                    the_row();

                    if ( $address = get_sub_field( 'address' ) ) :
                        echo esc_html( $address );
                    endif;

                    echo '<br>';

                    if ( $town = get_sub_field( 'town' ) ) :
                        echo esc_html( $town );
                    endif;

                    echo '<br>';

                    if ( $zip_code = get_sub_field( 'zip_code' ) ) :
                        echo esc_html( $zip_code );
                    endif;

                endwhile;
            endif;

            echo '<br>';
            echo get_field('website_link', $result->propertyID);
            echo '</div>'; ?>', <?php echo $result->lat; ?>, <?php echo $result->lng; ?>, <?php echo $i; ?>, '<?php echo $icon; ?>'],
        <?php $i++;
        endforeach;
        wp_reset_query(); ?>
    ];

    function setMarkers(map, locations) {

        var image = {
            url: 's'
        };


        for (var i = 0; i < locations.length; i++) {

            var location = locations[i];
            var icon = '/wp-content/themes/stroll/assets/images/pin.png';

            var myLatLng = new google.maps.LatLng(location[1], location[2]);

            console.log(location);

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: icon,
                shadow: 'https://chart.googleapis.com/chart?chst=d_map_pin_shadow',
                title: location[0],
                zIndex: location[3],
            });

            markers.push(marker);

            console.log(markers);


            var infowindow = new google.maps.InfoWindow({
                content: location[0]
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
        var clusterStyles = [{
                textColor: 'white',
                url: '/wp-content/themes/stroll/assets/images/pin.png',
                height: 57,
                width: 45
            },
            {
                textColor: 'white',
                url: '/wp-content/themes/stroll/assets/images/pin.png',
                height: 57,
                width: 45
            },
            {
                textColor: 'white',
                url: '/wp-content/themes/stroll/assets/images/pin.png',
                height: 57,
                width: 45
            }
        ];

        var mcOptions = {
            gridSize: 50,
            styles: clusterStyles,
            maxZoom: 10
        };

        markerCluster = new MarkerClusterer(map, markers, mcOptions);

    }


    //* Google MAPS Code ENDS *//

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    function clearMarkersGmap() {
        setMapOnAll(null);
    }

    function deleteMarkers() {
        clearMarkersGmap();
        markerCluster.clearMarkers();
        markers = [];
    }
</script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&callback=initialize&key=AIzaSyBJLT6yLy9m1ywSmh0mvZQ9sBArAS5bXQM"></script>

