<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css" media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Student Assignment Repository</title>
  </head>

  <body>
    <!-- navbar -->
   <nav>
     <div class="nav-wrapper blue-grey">
       <a href="../index.php" class="brand-logo">XTRAY</a>
       <ul class="right">
         <li><a href="../about%20us.html">About us</a></li>
       </ul>
     </div>
   </nav>

   <!-- login buttons card -->
   <center>
   <div class="card blue" style="width: 50%;padding: 5%">
     <div class="card-content center">
       <div class="card-title white-text"  href="#" style="font-weight: bolder">Log In As Lecturer</div>
         <div class="white-text red">
             <?php require("../database/connection.php") ?>
         </div>
       <form>
         <div class="row">
           <div class=" input-field col s12 m12 l12">
             <input type="text" class="validate" id="regno">
             <label for="regno">Staff No</label>
            </div>
            <div class=" input-field col s12 m12 l12">
              <input type="password" class="validate" id="Password">
              <label for="Password">Password</label>
             </div>
           <div class="col s12 m12 l12">
              <a class="btn white black-text" href="lecturer.php" style="font-weight: bolder; margin: 10%">Log in</a>
           </div>

         </div>
       </form>
       
     </div>
   </div>
  </center>
  
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
  </body>
</html>
      