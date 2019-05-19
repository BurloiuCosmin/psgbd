<?php

/**
 * This is the (only) entry point into our app.
 */

// Defining vital path constants.

defined( 'ROOT_PATH' ) || define( 'ROOT_PATH', dirname( __FILE__ ) . '/' );
define( 'TEMPLATE_PARTS_PATH', dirname( __FILE__ ) .'/template-parts/' );
define( 'TEMPLATES_PATH', dirname( __FILE__ ) . '/templates/' );

//require_once TEMPLATES_PATH . 'homepage.php';

/*
 * Define some helper constants for time values.
 */
define( 'MINUTE_IN_SECONDS', 60 );
define( 'HOUR_IN_SECONDS',   60 * MINUTE_IN_SECONDS );
define( 'DAY_IN_SECONDS',    24 * HOUR_IN_SECONDS   );
define( 'WEEK_IN_SECONDS',    7 * DAY_IN_SECONDS    );
define( 'MONTH_IN_SECONDS',  30 * DAY_IN_SECONDS    );
define( 'YEAR_IN_SECONDS',  365 * DAY_IN_SECONDS    );

/*
 * Initialize and check our query, passing it through our router (the front controller).
 */
//router