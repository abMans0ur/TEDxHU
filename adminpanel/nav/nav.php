<?php
if(isset($_SESSION['adminName'])){

}else{
    header('location:./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
<nav class="flex" id="nav">
        <div class="logo">
            <h4 id="logo">TedX</h4>
        </div>
        <ul class="nav-links flex">
            <li><a href="../board/board.php" class="nav-links">Board</a></li>
            <li><a href="../committee/committee.php" class="nav-links">Committee</a></li>
            <li><a href="../events/list.php" class="nav-links">Events</a></li>
            <li><a href="../Highboard/CURD.php" class="nav-links">HighBoard</a></li>
            <li><a href="../members/listmembers.php" class="nav-links">Members</a></li>
            <li><a href="../sections/listsection.php" class="nav-links">Sections</a></li>
            <li><a href="../speakers/listspeaker.php" class="nav-links">Speakers</a></li>
            <li><a href="../nav/logout.php" class="nav-links">logout</a></li>
        </ul>
        <!-- mobile view button -->
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    
    </nav>

<style>
     /* nav bar layout and style */
nav{
    width: 100%;
    position:fixed;
    justify-content: space-around;
    align-items: center;
    height: 10vh;
    background-color: #1d1d2c;
    padding: 25px 10px;
    top: 0;
    z-index: 99;
    transition: 0.4s;
}
#logo{
    font-size: 25px;
    font-weight: bold;
    transition: 0.4s;

}
.logo{
    color: #f5f5f5;
    text-transform: uppercase;
    letter-spacing: 5px;
    font-size: 20px;

}
.nav-links{
    width: 35%;
    color: #a0aecd;
}

.nav-links li{
    list-style-type: none;
}

/* mobile view for navbar button */
.burger{
    display: none;
    cursor: pointer;
}

.burger div{
    width: 25px;
    height: 3px;
    background-color: #a0aecd;
    margin: 5px;
    transition: all 0.3s ease;

}
.flex{
    display: flex;
    gap: 15px ;
    
}

/* to change the style of the burger button once we click on it To a X*/
.toggle .line1{
    transform: rotate(-45deg) translate(-5px,6px);
}
.toggle .line2{
    opacity: 0;
}
.toggle .line3{
    transform: rotate(45deg) translate(-5px,-6px);
}
@media (max-width:768px){
    /* so that the nav bar that shrunk cannot be seen if you scroll right */
    body{
        overflow-x: hidden;
    }
    /* navbar media query */
    #navbar {
        padding: 5px 10px;
    }
 
    /* mobile navbar positioning and style */
    .nav-links{
        /* position */
        position: absolute;
        right: 0px;
        height: 100vh;
        top: 8vh;
        background-color: #1d1d2c;
        flex-direction: column;
        align-items: center;
        width: 50%;
        /* hides the navbar until needed */
        transform: translateX(100%);
        transition: transform 0.5s ease-in;

    }
    /* to make the nav bar items show in a nice transition from fading out to appearing*/
    .nav-links li{
        opacity: 0;
        margin-bottom: 60px;
    }
    /* to make the burger of lines appear */
    .burger{
        display: block;
    }

}
@keyframes navLinkFade {
    from{
        opacity: 0%;
        transform: translateX(50px);
    }

    to{
        opacity: 1;
        transform: translateX(0px);
    }

}
/* to make the navbar appear on mobile */
.nav-active{
    transform: translateX(0%);
    transition: transform 0.5s ease-in;
}

</style>



<script>
    //    to change the class of the nav-links"which are hidden" to nav-active "which is shown"
// declaration of nav variables


const navSlide = () =>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li')


// toggle the navbar
        burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active')

 //animating the links
        navLinks.forEach((link,index)=> {  
            if(link.style.animation){
             link.style.animation = '';
            } else{
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 +0.5}s`;
            }
          
          });
//burger animation
          burger.classList.toggle('toggle')
    });

}

//navbar function so that it shrinks at two conditions met that the body isn't scrolled down more than 60px
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
    document.getElementById("nav").style.padding = "20px 10px";
    document.getElementById("logo").style.fontSize = "15px";
  } else {
    document.getElementById("nav").style.padding = "25px 10px";
    document.getElementById("logo").style.fontSize = "25px";
  }
}
navSlide();
</script>

</body>
</html>
