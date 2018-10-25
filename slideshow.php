<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.content{max-width:700px;margin:auto}
.display-container{position:relative}
.mySlides{
  width:100%;
  object-fit: cover;
  object-position: top;
}
.button{
  border:none;
  display:inline-block;
  padding:8px 16px;
  cursor:pointer;
  font-size:20px;
  }
  .button:hover{
    background:grey;
  }
  .display-left{
    position:absolute;
    top:50%;
    left:0%;
    transform:translate(0%,-50%);-ms-transform:translate(-0%,-50%)
  }
  .display-right{
    position:absolute;
    top:50%;
    right:0%;
    transform:translate(0%,-50%);-ms-transform:translate(0%,-50%)
  }
  .black{color:#fff;background-color:#000}
</style>
<body>


<div class="content display-container">
  <img class="mySlides" src="assets/images/img1.jpg">
  <img class="mySlides" src="assets/images/img2.jpeg">
  <img class="mySlides" src="assets/images/img3.jpeg">
  <img class="mySlides" src="assets/images/img4.jpg">

  <button class="button black display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="button black display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}


/*
Javascript explained
W3 schools
First, set the slideIndex to 1. (First picture)
Then call showDivs() to display the first image.
When the user clicks one of the buttons call plusDivs().
The plusDivs() function subtracts one or  adds one to the slideIndex.
The showDiv() function hides (display="none") all elements with the class name "mySlides", and displays (display="block") the element with the given slideIndex.
If the slideIndex is higher than the number of elements (x.length), the slideIndex is set to zero.
If the slideIndex is less than 1 it is set to number of elements (x.length).
*/
</script>


</body>
</html>