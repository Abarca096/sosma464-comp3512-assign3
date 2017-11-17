<?php
    function generateProfile(){
        $profile = '';
        //if there's a session, display the user
         if($_SESSION['Email'] != null){
            $profile .= '<img src="images/users/' . $_SESSION['PicID'] . '.jpg" class="avatar">';
            if(isset($_SESSION['FirstName'])&&isset($_SESSION['LastName'])){
                $profile .= " <h4 id='profilePic'>" . $_SESSION['FirstName'] . " " . $_SESSION['LastName'] . "</h4>";
            }
            $profile .= '<span>' . $_SESSION['Email'] . '</span>';
        }
        //otherwise display a generic user
        else {
            $profile .= '<img src="/images/users/generic.jpg" class="avatar"> <span> <a href="login.php">Login to view your profile</a></span>';
        }
        return $profile;
    }
?>
<div class="mdl-layout__drawer mdl-color--blue-grey-800 mdl-color-text--amber-200">
       <div class="profile">
           <?php echo generateProfile(); ?>
          <!-- <img src="images/profile.jpg" class="avatar">
           <h4>Josh Blair</h4>           
           <span>jblai698@mtroyal.ca</span> -->
       </div>

    <nav class="mdl-navigation mdl-color-text--blue-grey-300">
        <a class="mdl-navigation__link mdl-color-text--green-A400" href="index.php"><i class="material-icons" role="presentation">dashboard</i> Dashboard</a>
        <a class="mdl-navigation__link mdl-color-text--cyan-A400" href="aboutus.php"><i class="material-icons" role="presentation">message</i> About Us</a>
        <a class="mdl-navigation__link mdl-color-text--green-A400" href="browse-universities.php"><i class="material-icons" role="presentation">view_list</i> Browse Universities</a>
        <a class="mdl-navigation__link mdl-color-text--cyan-A400" href="browse-employees.php"><i class="material-icons" role="presentation">contacts</i> Browse Employees</a>
        <a class="mdl-navigation__link mdl-color-text--green-A400" href="browse-books.php"><i class="material-icons" role="presentation">view_list</i> Browse Books</a>
        <a class="mdl-navigation__link mdl-color-text--cyan-A400" href="analytics.php"><i class="material-icons" role="presentation">insert_chart</i> Analytics</a> 
        <a class="mdl-navigation__link mdl-color-text--amber-200" href="users.php"><i class="material-icons" role="presentation">person_outline</i> User Profile</a> 
    </nav>
  </div>