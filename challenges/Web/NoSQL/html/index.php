<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: auth.php");
    exit();
}

if ($_SESSION["username"] === "admin") {
    $message = "PTITCTF{Ban_se_khong_bi_sql_injection_neu_ban_khong_dung_sql}";
} else {
    $message = $_SESSION["username"] . " à, bạn có biết sự khác biệt giữa bạn và admin là không?<br>        Là admin thì có flag còn bạn thì không. Lêu lêu ( ͡° ͜ʖ ͡°)";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-body">
                <span class="button" style="white-space: normal;">Ngạn và Hà Lan là đôi bạn cùng lớp ở ngôi làng Đo Đo. Hà Lan là cô bé có đôi mắt biếc tuyệt đẹp. Đã nhiều làn Ngạn quên mất mình đang ở trong lớp học mà theo mái tóc của Hà Lan khẽ bay bay, theo đôi mắt biếc to tròn của Hà Lan, rồi tưởng tượng về một gia đình nhỏ, có Hà Lan, có Ngạn.
Những kỉ niệm ở đồi sim, đánh trống trường, những chiều đón đưa,... đã khiến tình bạn trẻ thơ dần biến thành tình yêu thầm lặng
Ngạn thích Hà Lan, Hà Lan cũng thích Ngạn, nhưng chẳng ai dám nói ra...
</span><br><br>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>

            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <a href="auth.php?action=logout">Log out</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>