<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style type="text/css">
		/* The side navigation menu */
.sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0;
    left: 0;
    background-color: #1985A7;
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
    padding-top: 15px;
}
 
/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 1.3rem;
    color:white;
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
    overflow:hidden;
    width:auto;
    background-color: #A1B5BF;
    
}
body {
  overflow-x: hidden;
}
 
/* Add a black background color to the top navigation */
.topnav {
    background-color: #33647D;
    overflow: hidden;
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
    background-color: white;
    color: black;
}
.mg{
  padding-left: 5%;
}
.small{
  font-size: 1.2rem!important;
}
.small:hover{
  background-color: #F8C040;
  border-radius: 10px;
}
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
}
 
a svg{
  transition:all .5s ease;
 
  &:hover{
    #transform:rotate(180deg);
  }
}
 

@media screen and (max-width: 991px) {
    .sidenav a {font-size: 18px;}
}
.taikhoan{
  float: right!important;
  padding: 19.5px 16px!important;
  border-radius: 10px;
}
  </style>
</head>
<body>
	<div id="sideNavigation" class="sidenav">
  <a href="dich-vu">Logo</a>
  <a href="dich-vu">Trang Chủ</a>
  <!------------------------->

         <a class="" href="#" data-toggle="collapse" data-target="#target1">
             FACEBOOK BUFF<i class=" mg fa fa-caret-down" aria-hidden="true"></i>
         </a>
         <div id="target1" class="collapse">
            <a href="fb-buy-sell" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Mua Bán Fanpage, Nick Facebook</a>
            <a href="fb-rip-nick" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Rip Nick, Bài Đăng, Page, Group</a>
            <a href="fb-rename" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Đổi Tên Profile Và Page Quá 60 Ngày</a>
            <a href="fb-security" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Bảo Mật Và Bảo Kê Facebook</a>
            <a href="fb-like-post" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Buff Like Post</a>
            <a href="fb-follow" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Buff Sub</a>
            <a href="fb-fan-page" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Buff Like Fanpage</a>
            <a href="fb-cmt-post" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Buff Comment Post</a>
            <a href="fb-share-post" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Buff Share Post</a>
         </div>


         <a class="" href="#" data-toggle="collapse" data-target="#target2">
             FACEBOOK VIP<i class="mg fa fa-caret-down" aria-hidden="true"></i>
         </a>
         <div id="target2" class="collapse">
            <a href="vip-like-clone" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> VIP Like Clone Giá Rẻ</a>
            <a href="vip-like-month" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> VIP Like Bài Viết Tháng</a>
            <a href="vip-like-mount" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> VIP Like Bài Viết Theo Số Lượng</a>
            <a href="vip-reaction-month" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> VIP Cảm Xúc Bài Viết Tháng</a>
            <a href="vip-comment-month" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> VIP Bình Luận Bài Viết Tháng</a>

         </div>

         <a class="" href="#" data-toggle="collapse" data-target="#target3">
             INSTAGRAM BUFF<i class="mg fa fa-caret-down" aria-hidden="true"></i>
         </a>
         <div id="target3" class="collapse">
            <a href="insta-like" class="small"> <i class="fa fa-caret-right" aria-hidden="true"></i> Buff Like Instagram</a>
            <a href="insta-follow" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Buff Follow Instagram</a>
            <a href="insta-comment" class="small"><i class="fa fa-caret-right" aria-hidden="true"></i> Buff Comment Instagram</a>
         </div>
  
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!------------------------->

</div>
<div id="main">
<nav class="topnav">
  <a href="#" id="topnav" isClick="close">
    <svg width="30" height="30" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
    </svg>
  </a>
  <a class="taikhoan" href="tai-khoan" ><i class="fa fa-user"></i>Tài khoản</a>
</nav> 

@yield('content')

</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$('#topnav').click(function () {
  let tt = $(this).attr('isClick');
  if(tt == 'close')
  {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    $(this).attr('isClick','open');
  }
  if (tt == 'open')
  {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    $(this).attr('isClick','close');
  }
});
</script>
</body>

</html>