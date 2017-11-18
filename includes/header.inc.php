<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
     <h1 class="mdl-layout-title"><span>CRM</span> Admin</h1>
     
     <div class="mdl-layout-spacer"></div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right" >
  <?php
  //If there's a session create a log out button
  if($_SESSION['Email'] != null){
      echo "<i class='material-icons' id = 'logout'><a href='logOut.php'>exit_to_app </a></i>
            <div class='mdl-tooltip' for='logout'>Log Out</div>";
  }
  ?>
 
 
<label id="tt2" class="material-icons mdl-badge mdl-badge--overlap" data-badge="5">account_box</label>  
<div class="mdl-tooltip" for="tt2">Messages</div>                     
                 
<label id="tt3" class="material-icons mdl-badge mdl-badge--overlap" data-badge="4">notifications</label> 
 <div class="mdl-tooltip" for="tt3">Notifications</div>           
                  
        <label class="mdl-button mdl-js-button mdl-button--icon" ><i class="material-icons" id = "main">search</i> </label>
        <div id = "searchbar">
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="fixed-header-drawer-exp">
        </div>
        <input type="text" id="search" value="">
       
         <p class="tooltip">Search Format: <br> Search By Employees: LastName<br> Search Employees By City: -City <br> Search By Both: LastName City </p>
        </div>
      </div>
    </div>
     
</header>