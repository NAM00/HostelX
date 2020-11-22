<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="low budget hostel">
    <meta name="description" content="low budget hostel rent">
    <meta name="description" content="hostel">
    <title>Services</title>
  <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">HostelX</span></h1>
        </div>
        <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li ><a href="about.php">About</a></li>
          <li class="current"><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact US</a></li>
          <li><a href="login.php">login</a></li>
          <li><a href="register.php">Register</a></li>
          </ul>
        </nav>
      </div>
    </header>

  <section id="newsletter">
    <div class="container">
      <h1>Subscribe to our newsletter</h1>
      <form>
        <input type="email" placeholder="Enter Email..." name="" value="">
        <button type="submit" class="button1">Subscribe</button>
      </form>
    </div>
  </section>
  <section id="main">
    <div class="container">
      <article id="maincol">
        <h1 class="pagetitle">High Budget Rooms</h1>
        <div class="hr_site">
            <a href="highrange.php">  <img src="./img/highroom.jpg" width="90%"></a>
            <a href="highrange.php"> <h3 class="category">High Budget</h3></a>
            <p>This is a High budget room. With the maximum number of bed is single room is 2. Which is a double bed and guest bed.</p>
          </div>
        <ul id="range">
          <li>
            <h3>High Budget Room</h3>
            <p>There are several facilities for the backpackers inside Golpata B & B hostel comprising hostel amenities and rooms’ amenities. If you spend a moment just talking about hostel amenities, these are as under:<br>
<br>Common kitchen where you can do your culinary experiments
<br>Common lounge with television and refrigerator
<br>Free Wi-Fi service throughout the hostel
<br>Free parking service and bicycle hire is also available
<br>Cafeteria available
<br>Shared and separate toilets with free towels
<br>24 hours security and separate lockers in each room
<br>Air-conditioned rooms
<br>Power plugs next to beds
<br>24 hours front desk service</p>
<p>Pricing: 12000tk-15000tk per month</p>
          </li>
          <li>
            <div class="bed">
              <h1>how many beds required ?</h1>
              <form>
                <input type="text" placeholder="Enter the number of beds" class="bedentry" name="" value="">
                <button type="submit" class="button1">Confirm</button>
              </form>
            </div>
          </li>
        </ul>

      </article>


      <aside id="sidebar">
        <div class="dark">
        <h3>Get A Quote</h3>
          <form class="quote">
            <div>
              <label>Name</label><br>
              <input type="text" placeholder="Name" name="" value="">
            </div>
            <div>
              <label>Email</label><br>
              <input type="email" placeholder="Email" name="" value="">
            </div>
            <div>
              <label>Message</label><br>
              <input type="text" placeholder="Message" name="" value="">
            </div><br>
            <button type="submit" class="button1">Send</button>
          </form>
        </div>
      </aside>
      <aside id="sidebar2">
        <div class="light">
        <h3>Get Your Rooms</h3>
          <ul>
            <li> <a href="lowrange.php" class="category"> <label>Low Budget Rooms</label> </a> </li>
              <li> <a href="midrange.php" class="category"> <label>Mid Budget Rooms</label> </a> </li>
          </ul>
        </div>
      </aside>
    </div>
  </section>
  <footer>
    <p>Hostel Management, Copyright &copy; 2020</p>
  </footer>
  </body>
</html>
