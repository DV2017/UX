<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Slideshow</title>

  <style>

  * {
    box-sizing: border-box;
  }

/* Slideshow container */
  .slideshow-container{
    max-width:50%;
    position: relative;
    margin:auto;
    margin:0; padding:0;
  }

/* picture to fill the container */
  .mySlides img{
    width:100%;
    margin:0; padding:0;
  }

/*hide all images by default */
  .mySlides {
    display: none;
  }

/* style next & previous buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    /*margin-top: -22px;*/
    padding: 16px;
    color: grey;
    font-size: 40px;
    font-weight: bold;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    
  }

/* Position the "next button" to the right */
  .next {
    right:0;
    border-radius: 3px 0 0 3px;
  }

/* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover {
    background-color: rgba(0,0,0, 0.8);
  }


/* Caption text : this positions all text at one place */
  .text {
    color: #f2f2f2;
    font-size: 25px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

/* The dots/bullets/indicators */
  .dot {
    height: 15px;
    width: 15px;
    background-color: #bbb;
    border: 1px solid #000;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

/* change for active dot and if hovered */
.active, .dot:hover {
  background-color: #717171;
}

/* fade animation */
.fade{
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: 0.4}
  to {opacity: 1}
}

  </style>


<script>

var slideIndex = 1;
showSlides(slideIndex);

//if prev clicked, slide index is reduced by 1
function plusSlides(n){
  showSlides(slideIndex += n);
}

//user clicks on a specific dot (eg. 2)
function currentSlide(n){
  //slide index is equal the number passed to (eg. 2)
  showSlides(slideIndex = n);
}

//in the beginning, the slides are not displayed
function showSlides(n) {

    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

    //since 2nd slide is not more than slide.length, 2 is kept
    if(n > slides.length) slideIndex = 1;
    if(n < 1) slideIndex = slides.length;

    //all slides are hidden
    for(i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    //all dots have their active class removed
    for(i = 0; i < dots.length; i++){
      dots[i].className = dots[i].className.replace("active", "");
    }

    //displays the 1st slide.
    //the second slide has index 2-1 becuase array begins at 0.
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += "active";

}

</script>


</head>
<body>
  
<!-- slideshow container -->

<div class="slideshow-container">

<!-- full width images with a caption -->
  <div class="mySlides fade">
    <img src="assets/images/img1.jpg" alt="">
    <div class="text">Caption One</div>
  </div>

  <div class="mySlides fade ">
    <img src="assets/images/img2.jpeg" alt="">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <img src="assets/images/img3.jpeg" alt="">
    <div class="text">Caption Three</div>
  </div>


<!-- Next and previous buttons -->
  <a  onclick="plusSlides(-1)" class="prev">&#10094;</a>
  <a  onclick="plusSlides(1)" class="next">&#10095;</a>

</div><!--slideshow-container-->
<br>

<!-- Dots / circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>


</body>
</html>



