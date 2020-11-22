<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="low budget hostel">
    <meta name="description" content="low budget hostel rent">
    <meta name="description" content="hostel">
    <title>Register</title>
  <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Hostel Management</span></h1>
        </div>
        <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li ><a href="contact.php">Contact US</a></li>
          <li><a href="login.php">login</a></li>
          <li class="current"><a href="register.php">Register</a></li>
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
    <div class="dark">
            <h1 class="pagetitle" align="center">Registration</h1>
            <div align="center" class="logo">
              <img src="img/logo.png" alt="hotel_logo" style="max-width:100%;height:auto;"</img> <br><br>
            </div>
            <form action="#" method="post">

            <div align="center" id="registration" >
              <table class="table" align="center" style="font-weight: bold; font-family:verdana;font-size:20px;width:800px;height:35px;background-color: silver; opacity: .7; border-radius:10px;color:black;">
              <b>  <tr>
                  <td><label>Full Name: </label></td>
                  <td><input type="text" name="f_name" placeholder="Enter full Name" value="" required></td>
                </tr>
                <tr>
                  <td><label>City</label></td>
                  <td>
                    <select class="city" name="">
                      <option>Dhaka</option>
                      <option>Chittagong</option>
                      <option>Rajshahi</option>
                      <option>Sylet</option>
                      <option> <input type="text" name="" value=""> </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><label>Distric</label></td>
                  <td>
                    <select class="city"  name="">
                      <option>Dhaka</option>
                      <option>Chittagong</option>
                      <option>Rajshahi</option>
                      <option>Sylet</option>
                      <option> <input type="text" name="" value=""> </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><label>Email: </label></td>
                  <td><input type="email" placeholder="Enter E-mail" name="email" value="" required></td>
                </tr>
                <tr>
                  <td><label>DOB: </label></td>
                  <td><input type="date" name="dob" placeholder="Enter date of birth" value="" required></td>
                </tr>
                <tr>
                  <td><label>Gender: </label></td>
                  <td>
                    <input type="radio" name="gender" value="male" checked required> Male
                    <input type="radio" name="gender" value="female"> Female
                    <input type="radio" name="gender" value="other"> Other
                  </td>
                </tr>
                <tr>
                  <td><label>Language: </label></td>
                  <td>
                    <input type="checkbox" name="eng" value="english"> English
                    <input type="checkbox" name="bd" value="bangla"> Bangla
                    <input type="checkbox" name="doth" value="doth"> Dothraki
                  </td>
                </tr>
                <tr>
                  <td>ID or passport Number</td>
                   <td><input type="text" name="idno" placeholder="EnterID or passport Number" value="">

              </tr>
                <tr>
                  <td><label>Number of Members</label></td>
                   <td><input type="text" name="member" placeholder="Enter number of members" value="">

              </tr>
                <tr>
                  <td><label>Mobile number</label></td>
                  <td> <input type="text" name="Mnumber" placeholder="Enter mobile Number" value=""> </td>
                </tr>
                <tr>
                  <td>Check In</td>
                  <td> <input type="date" placeholder="Enter check in date" name="checkin" value=""> </td>
                </tr>
                <tr>
                  <td>Check out</td>
                  <td> <input type="date" name="checkout" placeholder="Enter check out date" value=""> </td>
                </tr>
                <tr>
                  <td colspan="2" align="right"><input type="submit" class="button1" value="Register"></td>
                </tr>
</b>
              </table>
            </form>
           </div>

          </div>
  </section>
  <footer>
    <p>Hostel Management, Copyright &copy; 2020</p>
  </footer>
  </body>
</html>
