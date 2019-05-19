<?php
/**
 * Created by PhpStorm.
 * User: cosmin
 * Date: 19/05/2019
 * Time: 21:48
 */

// Defining some constants that will help us in writing the proper paths.

define( 'ROOT_PATH', '/' );
define( 'TEMPLATE_PARTS_PATH', 'template-parts/' );
define( 'TEMPLATES_PATH', 'templates/' );

require_once TEMPLATES_PATH . 'homepage.php';

//vom face un router in care vom observa query-ul si ne vom folosi de un regex pentru a incarca o anumita pagina,
//dorita de client
//.........................
