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
       <a href="admin.php" class="brand-logo">S.A.R</a>
       <ul class="right">
         <li><a href="admin.php">Log Out</a></li>
       </ul>
     </div>
   </nav>
   
 
   <center>
        <div class="card blue" style="width: 50%;padding: 15%">
          <div class="card-content center">
            <div class="card-title white-text"  href="#" style="font-weight: bolder; ">Add Unit</div>  
          </div>
          <form>
                <div class="row">
                        <div class=" input-field col s12 m12 l12">
                        <input type="text" class="validate" id="name">
                        <label for="name">Name</label>
          </form>
          <div class="row">
              <div>
                <div class=" col s12 m12 l12" style="width: auto;">
                  <select>
                    <option value="" disabled selected>UNITS</option>
                    <option value="1">COM 313</option>
                    <option value="2">COM 319</option>
                    <option value="3">COM 318</option>
                    <option value="4">COM 311</option>
                  </select>
                
                
                </div>
            </div>
          <div class="btn blue-grey white-text">ADD</div>
          <div class="center">
              <a class="btn white black-text" href="admin.php" style="font-weight: bolder; margin: 10%"> Save</a>
          </div>

        </div>
        
    </center>

       <div class="col s4 m4 l4">
            <a href="#"></a>
        </div>

        <div class="col s4 m4 l4">
            
                <a  href="#" ></a>
            </div>
   </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../assets/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
    <script src="../assets/SAR.js"></script>
    
  </body>
</html>
      