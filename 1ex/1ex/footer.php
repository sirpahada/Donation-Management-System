<html>
<head>
<script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script></head>
<style>
    html, body {
  height: 100%;
}

.footer{
    height: 350px!important;
    position: relative;
    background-image: url('images/nepalikids.jpg');
    background-size:1400px 500px;
    bottom: 0;
    left: 0;
    right: 0;
}
.footer::before {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
  }
.footer .footer-content{
    position: relative;
    z-index: 1;
    height:350px!important;
    display:flex;
    color:gainsboro;

}

.footer .footer-content .footer-section{
      flex:1;
      padding:25px;
}

.footer .footer-content .footer-section h2{
    color:#ffdf00;
      
}

.footer .footer-content .footer-section li a{
    
    color:gainsboro;
    text-decoration: none;
    list-style: decimal;
}

.footer .footer-content .footer-section li:hover{
    margin-left:8px;
    transition:.2s;
    font-size:1.1em;
    
}

.footer .footer-content .contact-form .contact-input{
    box-sizing: border-box;
  width: 350px;
  border: 1px solid #ccc;
  background-color:#ccc;
}

.sa {
  color: blue;
  font-size: 35px;
  font-weight: bolder;
  font-family: 'Poppins', sans-serif;
}

.nn {
  color: red;
  font-size: 35px;
  font-weight: bolder;
  font-family: 'Poppins', sans-serif;
}
</style>
</head>
<body>
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about" >
          <span class="sa" style="font-size: 55px;">SA</span><span class="nn" style="font-size:55px;">NN</span>
          <p style="text-align:justify; margin-left:50px; line-spacing:1.15cm;">
                Saan is a collective of some of Nepal's Young leaders and change-makers to makeadynamic change in community.
                It is a youth-led nonprofit who mobilize communtiy-based projects in Nepal.
          </p><br/>
          <div class="contact">
                <span><i class="fas fa-phone" style="color:#ffdf00"></i> &nbsp; 123-456-789</span><br/><br/>
                <span><i class="fas fa-envelope" style="color:#ffdf00"></i> &nbsp; info@saan.com</span>
          </div>     
        </div>
        <div class="footer-section links" style="margin-left:140px;">
            <h2>Quick Links</h2>
              
              <li><a href="index.php">Home</a></li><br/>
              <li><a href="about.php">About us</a></li><br/>
              <li><a href="#program">Our Programs</a></li><br/>
              
        </div>
        <div class="footer-section contact-form" id="contact">
            <h2>Contact Us</h2>
            <?php $IPATH=$_SERVER["DOCUMENT_ROOT"]."/1ex/1ex/"; include($IPATH."contact.php"); ?>
        </div>

    </div>
</div>       
</body>
</html>