<!DOCTYPE html>
<!-- Received Help from the following sites in writing this file:
https://stackoverflow.com/questions/13246597/how-to-read-a-file-line-by-line-in-php
https://stackoverflow.com/questions/8753786/php-adding-divs-to-a-foreach-loop-every-4-times
https://stackoverflow.com/questions/7153637/php-generate-divs-based-on-a-specific-number
https://stackoverflow.com/questions/4977864/php-get-each-result-from-array-and-append-it-within-div-tags
https://stackoverflow.com/questions/4480803/two-arrays-in-foreach-loop
https://www.ntchosting.com/encyclopedia/scripting-and-programming/php/php-in/ 
-->
<html>
<title>What is America?</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="wardfinal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<script src="scripts.js"></script>

<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="display:none;z-index:3;width:300px" id="mySidebar"> <br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <!-- <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a> -->
    <img src="images/flag.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>SUBMISSIONS</b></h4>
    <p class="w3-text-grey">Phillips Academy</p>
  </div>
  <div class="w3-bar-block">
    <a href="#submissions" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>SUBMISSIONS</a>
    <a href="#submit" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-send fa-fw w3-margin-right"></i>SUBMIT</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
  </div>
  <!-- <div class="w3-panel w3-large">
  </div> -->
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="submissions">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>What is America?</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
    <h4>A Survey<h4>
    </div>
    </div>
  </header>

  <!-- Write data from submissions to the files -->
  <?php
    $handleNames = fopen("names.txt", "r");
    $handleComments = fopen("comments.txt", "r");
    // names and comments are array where the respective elements share one user's name and comment.
    $names = array();
    $comments = array();
    if ($handleNames && $handleComments) {
        while (($lineName = fgets($handleNames)) !== false && ($lineComment = fgets($handleComments)) !== false) {
          $names[] = $lineName;
          $comments[] = $lineComment;
        }

        fclose($handleNames);
        fclose($handleComments);
    } else {
        // error opening the file.
    }
    // echo '<script>console.log('.count($names).')</script>';
  ?>

  <!-- Write the data in the two arrays into the html divs. -->
  <?php $count = 1; ?>
  <?php foreach($names as $index => $name) { ?>
    <?php
      // if we have now iterated to the last 3 elements the amount of elements is not divisible by 3
      // if (count($names) - $count < 3 && $remainder = $count % 3 != 0) {
      if (count($names) - $count + 1== $remainder = count($names) % 3) {
        if ($remainder == 2) { ?>
          <?php for ($i = 0; $i < 2; $i++) { ?>
            <div class="w3-half w3-container w3-margin-bottom">
              <div class="w3-container w3-white our-height">
                <p><b> <?php echo $names[$index + $i]; ?> </b></p>
                <p> <?php echo $comments[$index + $i]; ?> </p>
              </div>
            </div>
          <?php 
          } 
        }
        // else == $remainder is 1
        else { ?>
          <div class="w3-third w3-container w3-margin-bottom">
            <div class="w3-container w3-light-grey our-height">
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <div class="w3-container w3-white our-height">
              <p><b> <?php echo $name; ?> </b></p>
              <p> <?php echo $comments[$index]; ?> </p>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <div class="w3-container w3-light-grey our-height">
            </div>
          </div>
        <?php }
        break;
      }
    ?>

    <!-- The code will normally let that conditional be false and follow these instructions: -->
    <?php if ($count%3 == 1) {
         echo '<div class="w3-row-padding">';
    } ?>

    <div class="w3-third w3-container w3-margin-bottom">
      <div class="w3-container w3-white our-height">
        <p><b> <?php echo $name; ?> </b></p>
        <p> <?php echo $comments[$index]; ?> </p>
      </div>
    </div>

    <?php
      if ($count%3 == 0) {
          echo "</div>";
      }
      $count++;
    ?>
  <?php } ?>

  <!-- Submit Section -->
  <div class="w3-container w3-padding-large">
    <h4 id="submit"><b>Submit</b></h4>
    <div id="form1"> 
      <form action="form2.php" method="POST">
        Name: <br>
        <br>
        <input type="text" placeholder="Enter your name" name="userName" value= >
          <br><br>
          What does America mean to you? 
          <br><br>
          <textarea name="comment" rows="5" cols="40"></textarea>
        </select>
        <br><br>
          <input type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>

  <!-- About Us Section -->
  <div class="w3-container w3-padding-large" style="margin-bottom:32px">
    <h4 id="about"><b>About Us</b></h4>
    <p>We are two students from Phillips Academy in Andover, Massachusetts set out to answer the question "What is America?". This project
    seeks to present the values of America while reflecting these same values.</p>
  </div>
  
  <!-- Contact Section -->
  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Contact Us</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
        <p>bbradt@andover.edu</p>
      </div>
      <div class="w3-third w3-teal">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
        <p>Andover, MA</p>
      </div>
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
        <p>arobitalle@andover.edu</p>
      </div>
    </div>
    <br>
  </div>    

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-half">
      <!-- <h3>FOOTER</h3> -->
      <p>Created by Ward Bradt.</p>
    </div>

    <div class="w3-half">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">America</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">United States</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Patriotism</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Democracy</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Freedom</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">History</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Washington</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">U.S</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Family</span>
      </p>
    </div>

  </div>
  </footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
