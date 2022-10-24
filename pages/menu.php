<nav class="navbar navbar-expand-lg navbar-dark indigo navbar-fixed-top">
    <div class="collapse navbar-collapse" id="navbarText">
        <div class="navbar-header">
            <a href="../index.php" class="navbar-brand">Accueil</a>
        </div>
        <ul class="nav navbar-nav mr-auto">
            <li><a href="candidat.php"><i class="fa fa-vcard"></i>&nbsp Les candidats</a></li>
			<?php if ($_SESSION['user']['idProfilF']==1) {?>
					
				<li><a href="utilisateur.php"><i class="fa fa-users"></i>&nbsp Les utilisateurs</a></li>
                <li class="scrolling"><a href="#">Circonscriptions &ensp;</a>
                    <ul class="under">
                        <li><a href="bureau.php">bureau</a></li>
                        <li><a href="commune.php">commune</a></li>
                        <li><a href="departement.php">departement</a></li>
                        <li><a href="lieu.php">lieu</a></li>
                        <li><a href="region.php">region</a></li>
                    </ul>
            </li>
			<?php }?>
            <li><a href="resultat.php"><i class="fa fa-vcard"></i>&nbsp Les resultats</a></li>
            <?php if ($_SESSION['user']['idProfilF']==2) {?>
				<li><a href="voter.php"><i class="fa fa-users"></i>&nbsp Voter</a></li>
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