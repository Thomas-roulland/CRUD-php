<?php 
	require_once "../BDD/db.php";
	require_once "function.php";
	include "../StructurePage/header.php";

	$page=$_GET['page'];

	if($page==1)
	{
		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			$sql=Update("Organization",$_POST);
			$db=connect('groups');
			if($st=$db->prepare($sql))
			{
				var_dump($st->execute($_POST));
				header('location:../index.php?page=1');
			}
		}

		$resultat = "";

		if (isset($_GET['id'])) 
		{
			$id = $_GET['id'];
			// write SQL to get user data
			//Execute the sql
			$resultat = connect('groups')->query("SELECT * FROM Organization WHERE id='$id'");
			$data = $resultat->fetch();
		}
?>
			<div class="text-light fs-1 text fw-bold text-center mb-5">
				CRUD 
			</div>
			<form action="update.php?id=<?php echo $id;?>&page=1" method="post" class="text-light">
			<fieldset>
				<legend>Mise à jour d'une organisation :</legend>
				<label for="exampleInputPassword1" class="form-label">Nom : *</label>
				<input type="text" class="form-control w-25 mb-2" name="name" value="<?php echo $data['name']; ?>">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<label for="exampleInputPassword1" class="form-label">Domaine :</label>
				<input type="text" class="form-control w-25 mb-2" name="domain" value="<?php echo $data['domain']; ?>">
				<label for="exampleInputPassword1" class="form-label">Site :</label>
				<input type="text" class="form-control w-25 mb-2" name="aliases" value="<?php echo $data['aliases']; ?>">
				
				<br><br>
				<button class="btn btn-primary" type="submit">Mettre à jour</button>
			</fieldset>
			</form>
<?php
	}else
	{
		if(isset($_POST['id'])) 
		{
			$id = $_POST['id'];
			$sql=Update("User",$_POST);
			$db=connect('groups');
			if($st=$db->prepare($sql))
			{
				var_dump($st->execute($_POST));
				header('location:../index.php?page=2');
			}
		}
		if (isset($_GET['id'])) 
		{
			$id = $_GET['id'];
			// write SQL to get user data
			//Execute the sql
			$resultat = connect('groups')->query("SELECT * FROM User WHERE id='$id'");
			$data = $resultat->fetch();
		}
			?>
			<form action="update.php?id=<?php echo $id;?>&page=2" method="post" class="text-light">
			<fieldset>
				<legend>Mise à jour d'un User :</legend>
				<label for="exampleInputPassword1" class="form-label">Prénom : *</label>
				<input type="text" class="form-control w-25 mb-2" name="firstname" value="<?php echo $data['firstname']; ?>">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<label for="exampleInputPassword1" class="form-label">Nom :</label>
				<input type="text" class="form-control w-25 mb-2" name="lastname" value="<?php echo $data['lastname']; ?>">
				<label for="exampleInputPassword1" class="form-label">Mot de passe :</label>
				<input type="text" class="form-control w-25 mb-2" name="password" value="<?php echo $data['password']; ?>">
				<label for="exampleInputPassword1" class="form-label">Email :</label>
				<input type="text" class="form-control w-25 mb-2" name="email" value="<?php echo $data['email']; ?>">
				<label for="exampleInputPassword1" class="form-label">Organization : *</label>
										<select class="form-select w-25" name="idOrganization">
											<?php 
											$organisation = connect('groups')->query("SELECT * FROM Organization");
											foreach($organisation as $row) { ?>
											<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
											<?php } ?>
										</select>
				<br><br>
				<button class="btn btn-primary" type="submit">Mettre à jour</button>
			</fieldset>
			</form>
		<?php
	}
	
	

 include '../StructurePage/footer.php'; 
