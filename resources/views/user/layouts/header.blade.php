<style type="text/css">
  .seach{
    border: 1px solid gray;
    border-radius: 5px;
    margin: 0;
    background-color: white;
  }
  input[type="search"]{
    border: none;
    border-radius: 5px;
    width: 85%;
    padding: 2%;
    outline:none;
  }
  .navbar-nav{
    font-weight: bold;
    padding: 10px;
    margin-left: 10px;
  }
  .nav-item{
    margin-right: 20px;
  }
  .sicon{
    border: none;
    padding: 0;
    float: right;
    color: #265185;
  }
  .sicon:hover{
    background-color: #265185;
  }
  .login{
    background-color: #265185;
    color: white;
    border: none;
    font-weight: bold;
  }
  .login:hover{
    border-radius: 20px;
    color: white
  }
  .navbar{
    border-bottom: 1px solid #D4D9D7;
  }
  .navbar-brand{

  }
</style>
<nav class="navbar navbar-expand-lg navbar-light ">
  <nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="30" height="30" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
    </svg>
  </a>
</nav>
  <a class="navbar-brand" href="home">Logo</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0 seach">
      <input style="box-shadow: 0px 0px 0px 0px;" class=" mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn sicon btn-outline-success  " type="submit"><i class="fa fa-search"></i></button>
    </form>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home">TRANG CHỦ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="dich-vu">DỊCH VỤ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="lien-he">LIÊN HỆ</a>
      </li>
    </ul>
  </div>
   <a class="login btn" href="login">ĐĂNG NHẬP</a>
</nav>
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">
    /* The side navigation menu */
.sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0;
    left: 0;
    background-color: #1C4A65;
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}
/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
    transition: 0.3s
}
 
/* When you mouse over the navigation links, change their color */
.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}
 
/* Position and style the close button (top right corner) */
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
 
/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
    transition: margin-left .5s;
    padding: 20px;
    overflow:hidden;
    width:100%;
}
body {
  overflow-x: hidden;
}
 
/* Add a black background color to the top navigation */
.topnav {
    background-color: white;
    overflow: hidden;
    display: none;
}
 
/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}
 
/* Change the color of links on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}
 
/* Add a color to the active/current link */
.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
 
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
 
a svg{
  transition:all .5s ease;
 
  &:hover{
    #transform:rotate(180deg);
  }
}
#ico{
  display: none;
}
.menu{
  background: #000;
  display: none;
  padding: 5px;
  width: 320px;
  border-radius(5px);
 
  #transition: all 0.5s ease;
  a{
    display: block;
    color: #fff;
    text-align: center;
    padding: 10px 2px;
    margin: 3px 0;
    text-decoration: none;
    background: #444;
 
    &:nth-child(1){
      margin-top: 0;
      border-radius(3px 3px 0 0 );
    }
    &:nth-child(5){
      margin-bottom: 0;
       border-radius(0 0 3px 3px);
    }
 
    &:hover{
      background: #555;
    }
  }
}
@media screen and (max-width: 991px)
{
  .topnav {
    display: block;
}
}
  
</style>

<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home">Trang chủ</a>
  <a href="dich-vu">Dịch Vụ</a>
  <a href="lien-he">Liên hệ</a>
  <form class="form-inline my-2 my-lg-0 seach">
      <input class=" mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn sicon btn-outline-success  " type="submit"><i class="fa fa-search"></i></button>
  </form>

</div>
<script>
function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
}
 
function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
}
</script>