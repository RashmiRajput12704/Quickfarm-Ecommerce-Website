<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>QuickFarm is an innovative website that aims to revolutionize the way people buy and sell agricultural products. It is built using HTML, CSS, and JavaScript as front-end technologies, and PHP ,MYSQL as the back-end language.
The website offers a user-friendly interface that allows farmers and buyers to connect directly, eliminating intermediaries and reducing costs. QuickFarm also provides valuable resources such as  Organic Fertilizer for plant growth, Gujarat Dhenu Organic Liquid and many more.
</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">client's reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="images/pic-1.png" alt="">
         <p>QuickFarm is an innovative website that aims to revolutionize the way people buy and sell agricultural products. It is built using HTML, CSS, and JavaScript as front-end technologies, and PHP ,MYSQL as the back-end language.
The website offers a user-friendly interface that allows farmers and buyers to connect directly, eliminating intermediaries and reducing costs. QuickFarm also provides valuable resources such as  Organic Fertilizer for plant growth, Gujarat Dhenu Organic Liquid and many more.
</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ram sharma</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-2.png" alt="">
         <p>QuickFarm is an innovative website that aims to revolutionize the way people buy and sell agricultural products. It is built using HTML, CSS, and JavaScript as front-end technologies, and PHP ,MYSQL as the back-end language.
The website offers a user-friendly interface that allows farmers and buyers to connect directly, eliminating intermediaries and reducing costs. QuickFarm also provides valuable resources such as  Organic Fertilizer for plant growth, Gujarat Dhenu Organic Liquid and many more.
</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>surbhi</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-3.png" alt="">
         <p>QuickFarm is an innovative website that aims to revolutionize the way people buy and sell agricultural products. It is built using HTML, CSS, and JavaScript as front-end technologies, and PHP ,MYSQL as the back-end language.
The website offers a user-friendly interface that allows farmers and buyers to connect directly, eliminating intermediaries and reducing costs. QuickFarm also provides valuable resources such as  Organic Fertilizer for plant growth, Gujarat Dhenu Organic Liquid and many more.
</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>surya</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-4.png" alt="">
         <p>QuickFarm is an innovative website that aims to revolutionize the way people buy and sell agricultural products. It is built using HTML, CSS, and JavaScript as front-end technologies, and PHP ,MYSQL as the back-end language.
The website offers a user-friendly interface that allows farmers and buyers to connect directly, eliminating intermediaries and reducing costs. QuickFarm also provides valuable resources such as  Organic Fertilizer for plant growth, Gujarat Dhenu Organic Liquid and many more.
</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Rashmi verma</h3>
      </div>
   
   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>


<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});


<!-- swiper js link-->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

</script>

</body>
</html>