<?php

session_start();

include 'config/db.php';


/* ==============================
   LOGIN CHECK
   ============================== */

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


$user_id = (int) $_SESSION['user'];


/* ==============================
   GET USER
   ============================== */

$stmt = mysqli_prepare(
    $conn,
    "SELECT id, name, module_level
     FROM users
     WHERE id = ?
     LIMIT 1"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $user_id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);


if (!$user) {

    session_destroy();

    header("Location: login.php");

    exit();

}


$level = (int) $user['module_level'];

$user_name = $user['name'];

?>

<!DOCTYPE html>

<html>

<head>

<title>
LifeLink Dashboard
</title>


<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>


<style>

/* ==============================
   RESET
   ============================== */

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}


/* ==============================
   BODY
   ============================== */

body {

    font-family: Arial, sans-serif;

    background: #f7f8fa;

    color: #333;

    min-height: 100vh;

}


/* ==============================
   HEADER
   ============================== */

.header {

    background: linear-gradient(
        135deg,
        #d60000,
        #ef5350
    );

    color: white;

    padding: 25px 40px;

    box-shadow:
    0 4px 15px
    rgba(0,0,0,0.12);

}


.header-content {

    max-width: 1200px;

    margin: auto;

    display: flex;

    align-items: center;

    justify-content: space-between;

}


.logo {

    display: flex;

    align-items: center;

    gap: 12px;

}


.logo-icon {

    width: 50px;

    height: 50px;

    background: white;

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 28px;

}


.logo h1 {

    font-size: 27px;

}


.logo p {

    font-size: 13px;

    opacity: 0.9;

    margin-top: 3px;

}


.user-box {

    text-align: right;

}


.user-box span {

    font-size: 14px;

    opacity: 0.9;

}


.user-name {

    font-weight: bold;

    font-size: 16px;

}


/* ==============================
   MAIN
   ============================== */

.main {

    max-width: 1200px;

    margin: 35px auto;

    padding: 0 20px;

}


/* ==============================
   WELCOME
   ============================== */

.welcome {

    margin-bottom: 30px;

}


.welcome h2 {

    font-size: 27px;

    color: #222;

    margin-bottom: 8px;

}


.welcome p {

    color: #777;

    font-size: 15px;

}


/* ==============================
   MODULE GRID
   ============================== */

.modules {

    display: grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(220px, 1fr)
    );

    gap: 22px;

}


/* ==============================
   CARD
   ============================== */

.card {

    background: white;

    border-radius: 16px;

    padding: 25px;

    min-height: 180px;

    display: flex;

    flex-direction: column;

    justify-content: space-between;

    text-decoration: none;

    color: #333;

    border: 1px solid #eee;

    box-shadow:
    0 4px 15px
    rgba(0,0,0,0.06);

    transition:
    transform 0.25s,
    box-shadow 0.25s;

}


.card:hover {

    transform: translateY(-6px);

    box-shadow:
    0 10px 25px
    rgba(0,0,0,0.13);

}


/* ==============================
   CARD ICON
   ============================== */

.card-icon {

    width: 55px;

    height: 55px;

    border-radius: 14px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 28px;

    background: #fff0f0;

    margin-bottom: 18px;

}


/* ==============================
   CARD TITLE
   ============================== */

.card h3 {

    font-size: 18px;

    margin-bottom: 8px;

    color: #222;

}


.card p {

    font-size: 13px;

    color: #777;

    line-height: 1.5;

}


/* ==============================
   CARD ARROW
   ============================== */

.arrow {

    margin-top: 18px;

    color: #d60000;

    font-weight: bold;

    font-size: 14px;

}


/* ==============================
   EMERGENCY CARD
   ============================== */

.emergency {

    border: 1px solid #ffcaca;

}


.emergency .card-icon {

    background: #ffe5e5;

}


.emergency h3 {

    color: #d60000;

}


.emergency .arrow {

    color: #d60000;

}


/* ==============================
   NOTIFICATION
   ============================== */

.notification .card-icon {

    background: #fff5d9;

}


/* ==============================
   ADMIN
   ============================== */

.admin .card-icon {

    background: #eeeeee;

}


/* ==============================
   BOTTOM SECTION
   ============================== */

.bottom-section {

    margin-top: 35px;

    display: flex;

    justify-content: center;

    gap: 15px;

    flex-wrap: wrap;

}


.bottom-btn {

    text-decoration: none;

    padding: 12px 22px;

    border-radius: 8px;

    font-size: 14px;

    font-weight: bold;

}


.profile-btn {

    background: #333;

    color: white;

}


.photo-btn {

    background: #eeeeee;

    color: #333;

}


.logout-btn {

    background: #d60000;

    color: white;

}


.bottom-btn:hover {

    opacity: 0.85;

}


/* ==============================
   FOOTER
   ============================== */

.footer {

    text-align: center;

    padding: 25px;

    margin-top: 30px;

    color: #999;

    font-size: 13px;

}


/* ==============================
   MOBILE
   ============================== */

@media(max-width:700px) {


    .header {

        padding: 20px;

    }


    .header-content {

        flex-direction: column;

        gap: 15px;

        text-align: center;

    }


    .user-box {

        text-align: center;

    }


    .welcome h2 {

        font-size: 23px;

    }


    .modules {

        grid-template-columns: 1fr;

    }


}

</style>

</head>


<body>


<!-- ==============================
     HEADER
     ============================== -->

<header class="header">

<div class="header-content">


<div class="logo">



<div>

<h1>
LifeLink
</h1>

<p>
Emergency Blood & Donor Network
</p>

</div>

</div>


<div class="user-box">

<span>
Welcome
</span>

<br>

<span class="user-name">

<?php

echo htmlspecialchars(
    $user_name
);

?>

</span>

</div>


</div>

</header>



<!-- ==============================
     MAIN
     ============================== -->

<main class="main">


<div class="welcome">

<h2>
 LifeLink Dashboard
</h2>

<p>
Find donors, manage blood requests and respond to emergencies.
</p>

</div>



<!-- ==============================
     MODULE CARDS
     ============================== -->

<div class="modules">


<!-- VIEW DONORS -->

<a
href="modules/view_donors.php"
class="card"
>

<div>

<div class="card-icon">
👥
</div>

<h3 style="color: red;">
View Donors
</h3>

<p>
View available blood donors and their details.
</p>

</div>

<div class="arrow">
View Donors →
</div>

</a>



<!-- NEARBY DONORS -->

<a
href="modules/nearby_donors.php"
class="card"
>

<div>

<div class="card-icon">
📍
</div>

<h3 style="color: red;">
Nearby Donors
</h3>

<p>
Find available donors near your location.
</p>

</div>

<div class="arrow">
Find Nearby →
</div>

</a>



<!-- BLOOD STOCK -->

<a
href="modules/blood_stock.php"
class="card"
>

<div>

<div class="card-icon">
🩸
</div>

<h3 style="color: red;">
Blood Stock
</h3>

<p>
Check available blood groups and stock information.
</p>

</div>

<div class="arrow">
View Blood Stock →
</div>

</a>



<!-- SET LOCATION -->

<a
href="modules/donor_location.php"
class="card"
>

<div>

<div class="card-icon">
📌
</div>

<h3 style="color: red;">
Set My Location
</h3>

<p>
Save your current location to help patients find you.
</p>

</div>

<div class="arrow">
Set Location →
</div>

</a>



<!-- EMERGENCY -->

<a
href="modules/emergency_alert.php"
class="card emergency"
>

<div>

<div class="card-icon">
🚨
</div>

<h3 style="color: red;">
Emergency Blood Request
</h3>

<p>
Send an urgent blood request to matching donors.
</p>

</div>

<div class="arrow">
Send Emergency Alert →
</div>

</a>



<!-- NOTIFICATIONS -->

<a
href="notifications.php"
class="card notification"
>

<div>

<div class="card-icon">
🔔
</div>

<h3 style="color: red;">
Notifications
</h3>

<p>
View emergency alerts and donor responses.
</p>

</div>

<div class="arrow">
View Notifications →
</div>

</a>



<!-- ADMIN -->

<a
href="admin/dashboard.php"
class="card admin"
>

<div>

<div class="card-icon">
🛠️
</div>

<h3 style="color: red;" >
Admin Dashboard
</h3>

<p>
Manage donors, requests, blood stock and alerts.
</p>

</div>

<div class="arrow">
Open Admin →
</div>

</a>


</div>



<!-- ==============================
     BOTTOM BUTTONS
     ============================== -->

<div class="bottom-section">


<a
href="profile.php"
class="bottom-btn profile-btn"
>

👤 My Profile

</a>


<a
href="upload_photo.php"
class="bottom-btn photo-btn"
>

📸 Upload Photo

</a>


<a
href="logout.php"
class="bottom-btn logout-btn"
>

🚪 Logout

</a>


</div>


</main>



<!-- ==============================
     FOOTER
     ============================== -->

<footer class="footer">

© 2026 LifeLink — Emergency Blood & Donor Network

</footer>


</body>

</html>