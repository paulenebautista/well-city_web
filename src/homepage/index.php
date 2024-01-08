<?php
		include ('../../server/connection.php');
?>

<!DOCTYPE html>
<html>
    <title> Home </title>
    <!---header and nav bar--->
    <?php 
        include ('../..//temp/header.php'); 
    ?>
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
   * {
       box-sizing: border-box
    }

    body  {
       font-family: Verdana, sans-serif; margin:0
    }
    .mySlides 
    {
      display: none}
    img  {
      vertical-align: middle;
    }
    /* Slideshow container */
  .slideshow-container  {
      max-width: 80%;
      position: relative;
      margin: auto;
      z-index:-2;
    }
    /* Next & previous buttons */
  .prev, .next  {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }
    /* Position the "next button" to the right */
  .next{
      right: 0;
      border-radius: 3px 0 0 3px;
    }
    /* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover  {
      background-color: rgba(0,0,0,0.8);
    }
    /* Caption text */
  .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }
    /* Number text (1/3 etc) */
  .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }
    /* The dots/bullets/indicators */
  .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 4s ease;
    }
  .active, .dot:hover {
      background-color: #717171;
    }
    /* Fading animation */
  .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 5s;
      animation-name: fade;
      animation-duration: 5s;
    }
  @-webkit-keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }
  @keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }
    /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
  .dot{
      height: 10px;
      width: 10px;
    }
  }
  @media only screen and (max-width: 500px) {
  .prev, .next,.text {font-size: 14px}
    }


    .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 27%;
  margin-left: 10%;
  z-index:-2;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}

table, th, td {
  border: 0px solid black;
  
}

.center {
  margin-left: auto;
  margin-right: auto;
}


    </style>
  </head>

<body>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="https://images.alphacoders.com/130/1305855.jpg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="https://images6.alphacoders.com/130/1306336.png" style="width:100%">
            <div class="text">Caption Two</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="https://images2.alphacoders.com/131/1315577.png" style="width:100%">
            <div class="text">Caption Three</div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
  
   
        <div class="johndoetext">    
          <br>
          <br>
          <img src="https://i.imgur.com/E1BkUI0.png" alt="Welcome" style= "float: right; max-width:60%; ; margin-right:2%; padding-top:1%">
         </div>
       
      
      
        
        <div class="card">
          <img src="https://img3.stockfresh.com/files/i/iofoto/m/91/13146_stock-photo-doctor-holding-carrots.jpg" alt="Avatar" style="width:100%; ">
            <div class="container">
              <br>
              <h4><b> John Doe </b></h4>
              <p> Architect & Engineer </p>
            </div>
        </div>
     <br><br><br><br><br><br><br>

<div style="align: center">
  <table class="center" style="text-align: center">
    <tr>
      <th>Comfort</th>
      <th>Punctionality</th>
      <th>Efficient</th>
    </tr>
    <tr>
      <td> <img src = "https://img.freepik.com/premium-vector/charity-vector-icon-heart-care-icon-flat-style_773376-20.jpg" 
      style= "width:50%;"> </td>
      <td> <img src = "https://img.freepik.com/free-vector/appointment-booking-with-calendar_52683-39831.jpg" 
      style= "width:100%;"> </td>
      <td> <img src = "https://img.freepik.com/free-vector/effective-coworking-colleagues-togetherness-workers-collaboration-teamwork-regulation-workflow-efficiency-increase-team-members-arranging-mechanism_335657-1623.jpg" 
      style= "width:70%;"> </td>
    </tr>
  </table>
</div>

  


    <!-- JAVA SCRIPT PART --> 

    <script>
      var slideIndex = 1;
        showSlides(slideIndex);
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
          if (n > slides.length) { slideIndex = 1 }
          if (n < 1) { slideIndex = slides.length }
          for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";
          }       
          for (i = 0; i < dots.length; i++) {
           dots[i].className = dots[i].className.replace(" active", "");
          }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
          }

      var slideIndex = 0;
      showSlides();
        function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        }
      slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
       slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 10000); // Change image every 2 seconds
        }
    </script>
    
</body>
<?php 
        include ('../../temp/footer.php');
    ?>
</html>