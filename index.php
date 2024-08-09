<?php
    include "conn.php";

    if(isset($_SESSION["kakao_member_code"]) == false || !$_SESSION["kakao_member_code"] ) {
        ?>
        <script>
            location.replace("login.php")
        </script>
        <?php
        exit;
    }
?>

로그인한 상태입니다.