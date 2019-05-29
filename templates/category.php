<?php require_once '../template-parts/header-in.php';
include '../utilities/connection.php';
?>

<section class="section">
    <div class="container-list">
        <div class="notification">

            <p class="has-text-black has-text-centered"><strong>Available games, while supply lasts</strong></p>
            <br>

            <!-- <?php include '../model/show-one-category.php'; ?> -->


            <?php
            require_once '../utilities/connection.php';
            require_once '../utilities/db-functions.php';
            $ok = 0;
            $requested_category = $_GET['category'];
            $categories         = array('action', 'adventure', 'fighting', 'puzzle', 'racing', 'RPG', 'sports', 'RTS', 'FPS', 'TPS');

            // foreach ($categories as $category) {

            // 	if ($requested_category == $category) {
            // 		$ok                 = 1;
            // 		$requested_category = $category;
            // 		//$games = filtrareDupaCategorii( $requested_category );

            $conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");
            $sql  = 'SELECT * FROM jocuri';
            $stid = oci_parse($conn, $sql);
            if (!$stid) {
                $e = oci_error($conn);
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            }
            //oci_bind_by_name($stid, ':categorie', $requested_category);
            oci_execute($stid);
            // if (!$r) {
            //     $e = oci_error($stid);
            //     trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            // }
            $i = 0;
            print "<table border='1'>\n";
            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                print "<tr>\n";
                $i = $i + 1;
                foreach ($row as $item) {
                    print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                }
                print "</tr>\n";
            }
            print "</table>\n";
            ?>


        </div>
    </div>
</section>

<?php require_once '../template-parts/footer.php';  ?>