<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="templates.css">
</head>
<body>
<!--This is the main banner 
Last Altered 28 Feb. 2018-->
<div class="header">
<div class="title">Skill Scanner</div>
<button onclick="document.getElementById('login').style.display='block'" style="width:auto;" class="loginbtn">Login/Register</button>
</div>

<!--This is the Login Form 
Last Altered 28 Feb. 2018-->
<div id="login" class="modal">
 
    <form class="modal-content animate" action="login.php" method="post">
    <div class="closecontainer">
      <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Login">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
	  
	  <button onclick="document.getElementById('register').style.display='block'" type="submit">New User? Register Now.</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>  
</div>
<!--This is the Registration form
Last Altered 28 Feb. 2018-->
<div id="register" class="modal">
		
    <form class="modal-content animate" action="register.php" method="post">
	<div class="closecontainer">
      <span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Registration">&times;</span>
    </div>
	<div class="container">      
      <label for="uname"><b>Title</b></label>  
      Recruiter:<input type="radio" name="title" value="recruiter"><br> 
      Candidate:<input type="radio" name="title" value="candidate"><br> 
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Create Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
	  
	  <label for="psw2"><b>Confirm Password</b></label>
      <input type="password" placeholder="Re-Enter Password" name="password2" required>
      
	  <label for="email"><b>Email</b></label>
      <input type="text" placeholder="youremail@provider.com" name="email" required>
	  
	  <label for="email2"><b>Confirm Password</b></label>
      <input type="text" placeholder="Confirm Email" name="email2" required>
      <button type="submit">Register</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('register').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
	 
  </form>
</div>

<!--This is the main content area. As of 8 March it is being updated to include
the forms we will allow users to access
Last Altered 14 March 2018-->

<div class="mainContent">
	<div id="selector" class = "container">
	Are you a:
		<input id="seekCheck" type="radio" name="userType" value="seeker" checked onclick = "switchView()">Job Seeker
		<input id="recCheck" type="radio" name="userType" value="recruiter" onclick = "switchView()"> Recruiter
	</div>
	<form id = "forSeekers" action="/formscanning.php">
            <input name="file" type="file"/>
            <br><br>
		<label for="Company"><b>Preferred Company</b></label><br>
		<select name="company">
			<option value="noPref">No Preference</option>
			<option value="facebook">Facebook</option>
			<option value="google">Google</option>
			<option value="apple">Apple</option>
			<option value="microsoft">Microsoft</option>
			<option value="other">Other</option>
		</select><input type="text" placeholder="Other Company" name="otherC" style="width:auto;"><br>
		
		<br>
		
                
	  <button type="submit">Search</button>
	</form>
	
    
    <form id = "forRecruiters" style="display:none;" action="candidate.php" method="post" enctype="multipart/form-data">
            
	<label for="Company"><b>Company Name</b></label><br>
		<select name="company">
			<option value="noPref">No Preference</option>
			<option value="facebook">Facebook</option>
			<option value="google">Google</option>
			<option value="apple">Apple</option>
			<option value="microsoft">Microsoft</option>
			<option value="other">Other</option>
		</select><input type="text" placeholder="Other Company" name="otherC" style="width:auto;"><br>	
                
        <label for="recEXP"><b>Desired Work Experience(Years)</b></label><br>
		<select name="recEXP">
			<option value="noxp">0-1</option>
			<option value="lowxp">1-3</option>
			<option value="medxp">3-8</option>
			<option value="highxp">8+</option>
		</select><br>
		
                <div class="line"></div><br>
                <div class="skill">
                    
          	  <div class="software_skills">   
                    <label for="skillSetR"><b>Software</b></label><br><br>
       java<input type="checkbox" name="check[]" class="skills"><br> 
       c++<input type="checkbox" name="check[]" class="skills"><br> 
       c    <input type="checkbox" name="check[]" class="skills"><br> 
       java <input type="checkbox" name="check[]" class="skills"><br> 
       c++  <input type="checkbox" name="check[]" class="skills"><br> 
       c    <input type="checkbox" name="check[]" class="skills"><br> 
                </div> 
                    
                <div class="frontend_skills">  
                    <label for="skillSetR"><b>Front-End</b></label><br><br>
       java<input type="checkbox" name="check[]" class="skills"><br> 
       c++<input type="checkbox" name="check[]" class="skills"><br> 
       c    <input type="checkbox" name="check[]" class="skills"><br> 
       java <input type="checkbox" name="check[]" class="skills"><br> 
       c++  <input type="checkbox" name="check[]" class="skills"><br> 
       c    <input type="checkbox" name="check[]" class="skills"><br> 
                </div>
                    <div class="split"></div>
                <div class="backend_skills">                      
                    <label for="skillSetR"><b>Back-End</b></label><br><br>
       java<input type="checkbox" name="check[]" class="skills"><br> 
       c++<input type="checkbox" name="check[]" class="skills"><br> 
       c    <input type="checkbox" name="check[]" class="skills"><br> 
       java <input type="checkbox" name="check[]" class="skills"><br> 
       c++  <input type="checkbox" name="check[]" class="skills"><br> 
       c    <input type="checkbox" name="check[]" class="skills"><br>        
                </div>
                     
                <br><br><br>
        	

        <input name="file" type="file"/>
                </div>
        <button type="submit" name="submit">submit</button>        
        
        
        </form>
   
    
    
    
    
</div>

<!--This is the javascript section
UPDATE: Added functionality to switch between forms via radio button
Last Altered 8 March 2018-->
<script>
// Get the modal
var modal = document.getElementById('login');

// Get the modal
var modal2 = document.getElementById('register');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
	if (event.target == modal2) {
		modal2.style.display = "none";
	}
}


//Added 8 March 2018
function switchView(){
	var seek = document.getElementById('seekCheck');
	var rec = document.getElementById('recCheck');
	if(seek.checked == true){
		document.getElementById('forSeekers').style.display = "block";
		document.getElementById('forRecruiters').style.display = "none";
	}
	if(rec.checked == true){
		document.getElementById('forSeekers').style.display = "none";
		document.getElementById('forRecruiters').style.display = "block";
	}

}



</script>

</body>
</html>
