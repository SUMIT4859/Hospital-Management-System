<?php
include_once('../hms/admin/include/config.php');

?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HMS</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<style>
header img {
  margin:  12px 5px;
  width: 270px;
}
</style>
</head>

<body>

  <header>
    <div class="content flex_space">
      <div class="logo">
        <img src="images/logo.jpg" alt="">
      </div>
      <div class="navlinks">
        <ul id="menulist">
  <!--          <li class="link"><a href="#Book-Appointment">Book-Appointment</a></li>     -->
			<li class="link"><a href="#Our Rooms">Our Rooms</a></li>
			<li class="link"><a href="#Gallery">Gallery</a></li>
			<li class="link"><a href="#Services">Services</a></li>			
			<!--<li class="link"><a href="#">Doctors</a></li>-->
			<li class="link"><a href="#contact us">Contact</a></li>
			
			
			
          <li><a href="../hms/admin/index.php"<button type="button" class="primary-btn" target="_blank">Register Now</button></a></li>
        </ul>
        <span class="fa fa-bars" onclick="menutoggle()"></span>
      </div>
    </div>
  </header>
  
  <section class="home">
    <div class="content">
      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="images/d3.jpg" alt="">
          
        </div>
        <div class="item">
          <img src="images/d2.jpg" alt="">
         
        </div>
        <div class="item">
          <img src="images/d1.jpg" alt="">
         
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      dots: false,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  </script>

<!--


  <section class="book" id="Book-Appointment">
    <div class="container flex_space">
      <div class="text">
        <h1> <span>Book </span> Your Appointment </h1>
      </div>
      <div class="form">
        <form class="grid">
          <input type="text" id="text_id" name="geeks" placeholder="Enter Your Name">
          <input type="email" id="email" name="email"  placeholder="Enter Your Email" required>
		  <input type="text" id="contact" name="contact" minlength="10" maxlength="10" required onkeypress="validateNumberInput(event)" placeholder="Enter Your M.NO">
		  <script>
				 function validateNumberInput(event) {
            var key = event.key;
            if (!/^[0-9]$/.test(key)) {
                event.preventDefault();
            }
        }

		  </script>
         <input type="submit" value="BOOK" class="primary-btn" onclick="bookAppointment()" required>
		 
		 <script>
        function bookAppointment() {
            // Logic to book the appointment (e.g., form submission, database update, etc.)
            
            // After successfully booking the appointment, show the alert
            alert("You have successfully booked your appointment!");
        }
    </script>
        </form>
      </div>
    </div>
  </section>

-->

  <section class="about top">
    <div class="container flex" id="read more">
      <div class="left">
        <div class="heading">
          <h1>WELCOME</h1>
          <h2>Hospital</h2>
        </div>
        <p>As a HMS, we are dedicated to providing the highest quality of care to our patients. Our state-of-the-art facilities, cutting-edge technology, and compassionate staff ensure that every patient receives personalized and comprehensive treatment.</p>
     
<div class="col-sm-6 abut-yoiu">
                <h3>About Our Hospital</h3>
<?php
$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
while ($row=mysqli_fetch_array($ret)) {
?>

    <p><?php  echo $row['PageDescription'];?>.</p><?php } ?>
            </div>

	 </div>
      <div class="right">
        <img src="images/wlecome.jpg" alt="">
      </div>
    </div>
  </section>

  <section class="rooms" id="Our Rooms">
    <div class="container top" id="room">
      <div class="heading">
        <h1>EXPLORE</h1>
        <h2>Our Rooms</h2>
        <p>Our rooms are designed to provide you with comfort, privacy, and a peaceful environment for your recovery.</p>
      </div>

      <div class="content mtop">
        <div class="owl-carousel owl-carousel1 owl-theme">
          <div class="items">
            <div class="image">
              <img src="images/r2.jpg" alt="">
            </div>
            <div class="text">
              <h2>General-Ward</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
             
              </div>
             
              <div class="button flex">
                <button class="primary-btn">BOOK NOW</button>
                <h3>₹1000<span> <br> Per Day </span> </h3>
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="images/r5.jpg" alt="">
            </div>
            <div class="text">
              <h2>ICU</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                
              </div>
              <div class="button flex">
                <button class="primary-btn">BOOK NOW</button>
                <h3>₹3500 <span> <br> Per Day </span> </h3>
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="images/r4.jpg" alt="">
            </div>
            <div class="text">
              <h2>Deluxe</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half"></i>
              </div>
              
              <div class="button flex">
                <button class="primary-btn">BOOK NOW</button>
                <h3>₹2000 <span> <br> Per Day </span> </h3>
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="images/r3.jpg" alt="">
            </div>
            <div class="text">
              <h2>Super Deluxe</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              
              </p>
              <div class="button flex">
                <button class="primary-btn">BOOK NOW</button>
                <h3>₹2500 <span> <br> Per Day </span> </h3>
              </div>
            </div>
          </div>
          
         
        </div>
      </div>
    </div>
  </section>
  
  <script>
    $('.owl-carousel1').owlCarousel({
      loop: true,
      margin: 40,
      nav: true,
      dots: false,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2,
          margin: 10,
        },
        1000: {
          items: 3
        }
      }
    })
  </script>

  <section class="gallery" id ="Gallery">
    <div class="container top">
      <div class="heading1">
        <h1></h1>
        <h2>Our Gallery</h2>
        <p>Take a look at our gallery to experience the modern and caring environment we’ve created for our patients.</p>
	
      </div>
    </div>

    <div class="content mtop">
      <div class="owl-carousel owl-carousel1 owl-theme">
        <div class="items">
          <div class="img">
            <img src="images/g1.jpg" alt="">
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="images/g2.jpg" alt="">
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="images/g3.jpg" alt="">
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="images/g4.jpg" alt="">
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="images/g5.jpg" alt="">
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="images/g6.jpg" alt="">
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="images/g7.jpg" alt="">
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="images/g8.jpg" alt="">
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <script>
    $('.owl-carousel1').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 1500,
      autoplayHoverPause: true,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 4,
        },
        1000: {
          items: 6
        }
      }
    })
  </script>

  <section class="services top" id="Services">
    <div class="container">
      <div class="heading1">
        <h1></h1>
        <h2>Our Services</h2>
        <p>Your health is our priority, and we’re here to support you with care and compassion, 24/7, every step of the way.</p>
      </div>

      <div class="content flex_space">
        <div class="left grid2">
          <div class="box">
            <div class="text">
              <i class="fa fa-ambulance"></i>
              <h3>Emergency Care</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa fa-user-md"></i>
              <h3>Surgery</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa fa-heartbeat"></i>
              <h3>Cardiology</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa fa-bed"></i>
              <h3>Accommodation</h3>
            </div>
          </div>
		  <div class="box">
            <div class="text">
              <i class="fas fa-flask"></i>
              <h3>Laboratory</h3>
            </div>
          </div><div class="box">
            <div class="text">
              <i class="fas fa-first-aid"></i>
              <h3>Pharmacy</h3>
            </div>
          </div>
        </div>
				 <div class="right">
					<img src="images/care.jpg" alt="">
				</div>
      </div>
    </div>
  </section>
  
  <footer>
    <div class="container grid" id="contact us">
      <div class="box">
        <p> "We created this system to help manage hospital tasks efficiently. In this system, patients can book appointments, view records, and handle billing easily. Feel free to reach out to us for any support."</p>
        <div class="icon">
          <i class="fa fa-facebook-f"></i>
          <i class="fa fa-instagram"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-youtube"></i>
        </div>
      </div>

      <div class="box">
       
      </div>

      <div class="box">
        <h2>Contact Us</h2>
        <p>Feel free to contact us anytime. </p>
        
        
		
		
		
		<?php
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
while ($row=mysqli_fetch_array($ret)) {
?>


 <i class="fa fa-location-dot"></i>             <?php  echo $row['PageDescription'];?> <br>
 <i class="fa fa-phone"></i>      Phone: <?php  echo $row['MobileNumber'];?> <br>
 <i class="fa fa-envelope"></i>       Email: <a href="mailto:<?php  echo $row['Email'];?>" class=""><?php  echo $row['Email'];?></a><br>
<i class="fa fa-clock"></i>					Timing: <?php  echo $row['OpenningTime'];?>
                    </address>

        <?php } ?>
      </div>
    </div>
  </footer>

  <div class="legal" id="about">
    <p class="container">Copyright (c) 2024 Copyright Holder All Rights Reserved.</p>
  </div>

  <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>
</body>
</html>