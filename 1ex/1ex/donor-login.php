<htmL>
    <head>
       <title>Donor Login and Registration page </title>
       <link rel="stylesheet" href="Cover.CSS">
       <link rel="stylesheet" href="login.css" >
       
    </head>
    <body>
   

         <div class="hero">
            <div class="form-box">
               <div class="button-box">
                   <div id="btn"></div>
                    <button type ="button" style="color: black; font-weight: bold;" class="toggle-btn" onclick="Login()">  Log In  </button>
                    <button type ="button" style="color: black; font-weight: bold;" class="toggle-btn" onclick="Register()">Register</button>
                </div>
                <!--for login-->
                <form action="donorlog.php" id="Login" class="input-group1" method="post">
                <?php
            session_start();
            if (isset($_SESSION['error'])) {
               $errorMessage = $_SESSION['error'];
               echo "<p class='error' style='color:red;'>$errorMessage</p>";
               unset($_SESSION['error']);
            }
            ?>
            
            <input type="text" class="input-field" name="username" placeholder="Username" required>
                    <input type="password" class="input-field" name="pw" placeholder="User Password" required> 
                    <input type="checkbox" class="chech-box"><span> Remember password </span>
                     <button type="submit" class="submit-btn" >Log In </button>
                </form>
                <!--for registration-->
                 <form action="donorreg.php" id="Register" class="input-group2" method ="post">
                
    

                    <input type="text" name="fullname" class="input-field" placeholder="Full Name" required>
                    <input type="text" name="location" class="input-field" placeholder="Location" required>
                    <input type="text" name="username" class="input-field" placeholder="User Id" required> 
                    <input type="email" name="email" class="input-field" placeholder="Email Id" required> 
                    <input type="text" name="mobile" class="input-field" placeholder="Mobile Number" required> 
                    <input type="password" name="pw" class="input-field" placeholder="User Password" required> 
                    <input type="password" name="confirm_pw" class="input-field" placeholder="Re-enter user Password" required>
                    
                    <input type="checkbox" class="chech-box"><span>I agree all the terms & conditions</span>
                     <button type="submit" class="submit-btn" >Register </button><br><br>
                </form>
            </div>
        </div>
        
        <script>
           
           var x =document.getElementById("Login");
           var y =document.getElementById("Register");
           var z =document.getElementById("btn");
        
         function Register()
         {
             x.style.left="-400px";
             y.style.left="50px";
             z.style.left="110px";
         }
          function Login()
         {
             x.style.left="50px";
             y.style.left="450px";
             z.style.left="0px";
         }
         </script>
         
        </body>
    </htmL>




































    
    
    
