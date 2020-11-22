<?php 
session_start();
//unset(($_SESSION['username']));
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="low budget hostel">
    <meta name="description" content="low budget hostel rent">
    <meta name="description" content="hostel">
    <title>Hostel Management</title>
  <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1 class="logo"><span class="highlight">HostelX</span></h1>
        </div>
        <nav>
        <ul>
          <li class="current"><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact US</a></li>
          <li><a href="login.php">login</a></li>
          <li><a href="register.php">Register</a></li>
          </ul>
        </nav>
      </div>
    </header>
  <section id="showcase">
    <div id="backgroundimage">
    <img src="./img/hostel.jpg" width="100%" height="750px";>
    </div>
   <div class="container">
     <h1>Affordable Hostel Room</h1>
     <p>While you are on the loose and just want to be the guest of this tremendous country, one thing you must keep a close weather on is accommodation. As Bangladesh is a small place with many people, accommodation out there can be very hectic. And if you spend a moment just talking about the Dhaka city, the capital of Bangladesh, you can make the case that this city is one of the most populated cities in the world. Resultantly, finding budget accommodation as a backpacker is back-breaking.

For your case, if you are stretching your legs for a pocket-friendly accommodation in Dhaka while saving a few bucks, then your quest is over. Here, we have drawn up a list of top 5 budget hostels for backpackers in Dhaka. Off you go!</p>
   </div>
  </section>
  <section id="newsletter">
    <div class="container">
      <h1>Subscribe to our newsletter</h1>
      <form>
        <input type="email" placeholder="Enter Email..." name="" value="">
        <button type="submit" class="button1">Subscribe</button>
      </form>
    </div>
  </section>
  <section id="boxes">
  <div class="container">
      <div class="box">
          <a href="lowrange.php"><img src="./img/lowroom.jpg" width="90%"> </a>
    <a href="lowrange.php"><h3 class="category">Low Budget</h3></a>
        <p>This is a Low budget room. With the maximum number of bed is single room is 3.</p>
      </div>
      <div class="box">
          <a href="midrange.php" ><img src="./img/midroom.jpg" width="90%"> </a>
          <a href="midrange.php" ><h3 class="category">Mid Budget</h3></a>
        <p>This is a Low budget room. With the maximum number of bed in single room is 1. Which is double bed.</p>
      </div>
      <div class="box">
        <a href="highrange.php">  <img src="./img/highroom.jpg" width="90%"></a>
        <a href="highrange.php"> <h3 class="category">High Budget</h3></a>
        <p>This is a High budget room. With the maximum number of bed is single room is 2. Which is a double bed and guest bed.</p>
      </div>
    </div>
  </section>
  <footer>
    <p>Hostel Management, Copyright &copy; 2020</p>
  </footer>
  </body>
</html>
