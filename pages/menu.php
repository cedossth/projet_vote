<?php
    //require_once('identifier.php');
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="../index.php" class="navbar-brand">Accueil</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="candidat.php"><i class="fa fa-vcard"></i>&nbsp Les candidats</a></li>
			<?php if ($_SESSION['user']['idProfilF']==1) {?>
					
				<li><a href="utilisateur.php"><i class="fa fa-users"></i>&nbsp Utilisateurs</a></li>
                <li id="lien"><a href="#"><i class="fa fa-building"></i>&nbsp Circonscriptions<span class="caret"></span></a>
                    <ul id="menu_deroulante" class="scrolling" hidden>
                        <li><a href="bureau.php">bureau</a></li>
                        <li><a href="commune.php">commune</a></li>
                        <li><a href="departement.php">departement</a></li>
                        <li><a href="lieu.php">lieu</a></li>
                        <li><a href="region.php">region</a></li>
                    </ul>
                </li>
                <li><a href="editerBureau.php"><i class="fa fa-edit"></i>&nbsp Changement bureau</a></li>
			<?php }?>
            <li><a href="resultat.php"><i class="fa fa-bar-chart-o"></i>&nbsp Resultats</a></li>
            <?php if ($_SESSION['user']['idProfilF']==2 && $_SESSION['user']['est_inscrit']==1) {?>
				<li><a href="voter.php"><i class="fa fa-cubes"></i>&nbsp Voter</a></li>
                <li><a href="modifierBureau.php"><i class="fa fa-cube"></i>&nbsp Bureau de vote</a></li>
            <?php }?>
        </ul>
        <ul class="nav navbar-nav navbar-right">		
			<li>
				<a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['idUser'] ?>">
                    <i class="fa fa-user-circle-o"></i>
					<?php echo  ' '.$_SESSION['user']['mail']?>
				</a> 
			</li>
			
			<li>
				<a href="seDeconnecter.php">
                    <i class="fa fa-sign-out"></i>
					&nbsp Se déconnecter
				</a>
			</li>				
		</ul>
    </div>
</nav>

<script> 
    var lien=document.getElementById("lien");
    var men=document.getElementById("menu_deroulante");
    lien.onmouseover=function(){
        men.removeAttribute('hidden');
    }
    lien.onmouseout=function(){
        men.setAttribute('hidden','hidden');
    }
    

</script>