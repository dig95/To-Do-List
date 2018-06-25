
	<!-- Conection mysql -->

<?php

    try
    {
        $bdd = new  PDO('mysql:host=localhost;dbname=todo;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {  
        die ('Erreur : '. $e->getMessage());
    }

?>

	<!-- insert data to mysql -->

<form action="index.php" method="post" >
	<input type="text" name="tache" value="" class="text" /></br>
	<input type="submit" value="Valider" class="validate"/>
</form>
   
   
    <?php 
  
        if(isset($_POST['tache']) AND $_POST['tache'] != "" )  //if variable exits and not empty
        {
            $tache = $_POST['tache'];
            $send = $bdd->prepare('INSERT INTO tache(tache) VALUES(:tache)');
            $send->execute(array('tache'=> $tache));
        }    
   
    ?>
    
    
    <!-- delete data from mysql -->
    
    <?php

        if (isset($_POST['case']))
        {
        
            $del = $bdd->prepare('DELETE FROM tache WHERE tache = :tache');
            $del->execute(array('tache'=> $_POST['case']));
        }
    
    
    ?>
    
    
    <!--  show data from mysql -->
    
    
    <?php 
        $show = $bdd->query('SELECT * FROM tache');
        while ($donnes = $show->fetch())
        {
            ?>
        	<form method="post" action="index.php">
        		<input type="radio" name="case" class="data" value="<?php echo $donnes['tache'];?>">		
        		<?php echo $donnes['tache'].'</br>';   
        }
            ?>
        	<input type="submit" value="Supprimer" class="submit"/></form>
        	
        	
        	
        	
        	
        	
        	
        	
        	