<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LifeLink - Save a Life</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#fff;
    color:#111;
}

/* HEADER */

header{
    width:100%;
    height:80px;
    background:#fff;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 80px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
    position:sticky;
    top:0;
    z-index:1000;
}

.logo{
    display:flex;
    align-items:center;
    gap:10px;
}

.logo img{
    width:45px;
}

.logo h2{
    color:#d60000;
    font-size:40px;
    font-weight:800;
}

nav{
    display:flex;
    gap:40px;
}

nav a{
    text-decoration:none;
    color:#222;
    font-size:18px;
    font-weight:600;
    transition:.3s;
}

nav a:hover{
    color:#d60000;
}

/* HERO */

.hero{
    min-height:90vh;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:50px 80px;
    background:#fafafa;
}

.hero-left{
    width:50%;
}

.tag{
    display:inline-block;
    background:#fff0f0;
    color:#222;
    padding:10px 18px;
    border-radius:30px;
    font-weight:600;
    margin-bottom:20px;
}

.hero-left h1{
    font-size:82px;
    line-height:1;
    font-weight:900;
}

.hero-left h1 span{
    color:#e60023;
}

.hero-left p{
    color:#555;
    font-size:18px;
    line-height:1.8;
    margin-top:20px;
    margin-bottom:30px;
    max-width:600px;
}

.buttons{
    display:flex;
    gap:15px;
    margin-bottom:35px;
}

.btn{
    text-decoration:none;
    padding:15px 28px;
    border-radius:6px;
    font-weight:700;
    transition:.3s;
}

.btn-red{
    background:#e60023;
    color:#fff;
}

.btn-red:hover{
    background:#c4001d;
}

.btn-white{
    border:1px solid #e60023;
    color:#e60023;
}

.btn-white:hover{
    background:#e60023;
    color:#fff;
}

/* STATS */

.stats{
    display:flex;
    justify-content:flex-start;
    align-items:center;
    gap:12px;
    flex-wrap:nowrap;
}
.card{
    width:110px;
    min-height:90px;
}
.card h3{
    color:#d60000;
    font-size:24px;
}

.card p{
    color:#666;
    margin-top:5px;
    font-size:14px;
}

/* RIGHT IMAGE */

.hero-right{
    width:50%;
    text-align:center;
}

.hero-right img{
    width:100%;
    max-width:750px;
}

.badge{
    display:inline-block;
    margin-top:15px;
    background:#e60023;
    color:#fff;
    padding:12px 20px;
    border-radius:8px;
    font-weight:700;
}

/* RESPONSIVE */

@media(max-width:1000px){

.hero{
    flex-direction:column;
    text-align:center;
}

.hero-left,
.hero-right{
    width:100%;
}

.hero-left h1{
    font-size:60px;
}

.buttons{
    justify-content:center;
}

.stats{
    justify-content:center;
}

header{
    padding:0 20px;
}

}

@media(max-width:600px){

header{
    flex-direction:column;
    height:auto;
    padding:20px;
    gap:15px;
}

nav{
    gap:20px;
}

.hero{
    padding:30px 20px;
}

.hero-left h1{
    font-size:45px;
}

.logo h2{
    font-size:30px;
}

}

</style>

</head>
<body>

<header>

    <div class="logo">
        <img src="assets/images/lifelink-blood.png" alt="">
        <h2>LifeLink</h2>
    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>

</header>

<section class="hero">

<div class="hero-left">

    <div class="tag">
        🩸 Be a Hero. Save a Life.
    </div>

    <h1>
        Connecting Donors.<br>
        <span>Saving Lives.</span>
    </h1>

    <p>
        LifeLink is an emergency blood donation network
        that connects blood donors, hospitals and people
        in need in real time.
    </p>

    <div class="buttons">
        <a href="register.php" class="btn btn-red">
            ❤️ I WANT TO DONATE
        </a>

        <a href="login.php" class="btn btn-white">
            🩸 I NEED BLOOD
        </a>
    </div>

    <div class="stats">

        <div class="card">
            <h3>980+</h3>
            <p>Donors</p>
        </div>

        <div class="card">
            <h3>320+</h3>
            <p>Requests</p>
        </div>

        <div class="card">
            <h3>150+</h3>
            <p>Hospitals</p>
        </div>

        <div class="card">
            <h3>2500+</h3>
            <p>Lives Saved</p>
        </div>

    </div>

</div>

<div class="hero-right">

    <img src="assets/images/hero.png" alt="LifeLink">

    <div class="badge">
        🩸 Every Drop Counts
    </div>

</div>

</section>

</body>
</html>