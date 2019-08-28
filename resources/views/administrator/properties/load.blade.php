<?php 
    
	$dbname = "estate";
	//DATABASE HOST
	$host = "localhost";
	//DATABASE USER NAME
	$user = "root";
	//DATABASE PASSWORD
	$password = "";
    $db = new PDO("mysql: host=$host; dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $new = intval($_GET['property_category_id']);

    $query = $db->prepare("SELECT * FROM property_types WHERE property_category_id=:property_category_id");
    $query->bindValue(":new", $new);
    $query->execute();
    echo'<label for="input-6">Property Type </label>';
    echo '<select class="form-control form-control-rounded" name="property_type_id">';
        while($listType = $query->fetch()) { ?>
            <option value="<?php echo  $listType['property_type_id'] ?>" selected>
                <?php echo $listType['property_type_name'] ?>	
            </option><?php
        } 
    echo '<select>';
    echo '<span style="color: green">** This Field is Autoload **</span> '; ?>
		
?>