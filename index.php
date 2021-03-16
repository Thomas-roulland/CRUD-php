<?php

require_once "./BDD/db.php";

include "StructurePage/header.php";


?>

         <div class="text-light fs-1 text fw-bold text-center mb-5 ">
             CRUD 
         </div>

        <!-- Button trigger modal -->
   
       


    <?php 
        

        if($_GET['page']==1){
            $statement=connect('groups')->query("SELECT * FROM Organization");
            ?>
             <div class="d-flex justify-content-end mx-5">
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajoutez une organisation
        </button>
        </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="php/work.php?page=1" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajoutez une organisation :</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 w-75">
                                <label for="exampleInputPassword1" class="form-label">Nom : *</label>
                                <input type="text" class="form-control align-middle" name="name" required>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="exampleInputPassword1" class="form-label">Domaine :</label>
                                <input type="text" class="form-control" name="domain">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="exampleInputPassword1" class="form-label">Site :</label>
                                <input type="text" class="form-control" name="aliases">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

    
            <button class="btn btn-warning" onclick="window.location.href ='index.php?page=2'">
                Table User
            </button>
        

        <table class="table text-light p-5  mb-5" >
            <legend class="text-light fw-bold text-decoration-underline d-flex justify-content-left mt-5"> Données de la table Organisation :</legend>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Domain</th>
                        <th>User</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            <tbody>
            <?php
             foreach($statement as $row) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['domain']; ?></td>
                <td><?php echo $row['aliases']; ?></td>
                <td class="text-center">
                    <a class="btn btn-info mx-2" href="./php/update.php?id=<?php echo $row['id'];?>&page=1">Edit</a>
                
                    <a class="btn btn-danger mx-2" href="./php/work.php?id=<?php echo $row['id'];?>&page=1">Delete</a>
                </td>
            </tr>
    <?php 
    }
    ?>
    </tbody>
    </table>
        <?php 
        } else {
        $statement=connect('groups')->query("SELECT * FROM User");
        $organisation = connect('groups')->query("SELECT * FROM Organization");
        ?>
<div class="d-flex justify-content-end mx-5">
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajoutez un User
        </button>
        </div>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="php/work.php?page=2" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajoutez un user :</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 w-75">
                                <label for="exampleInputPassword1" class="form-label">Prénom : *</label>
                                <input type="text" class="form-control align-middle" name="firstname" required>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="exampleInputPassword1" class="form-label">nom : *</label>
                                <input type="text" class="form-control align-middle" name="lastname" required>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="exampleInputPassword1" class="form-label">email : *</label>
                                <input type="email" class="form-control align-middle" name="email" required>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="exampleInputPassword1" class="form-label">password : *</label>
                                <input type="password" class="form-control align-middle" name="password" required>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="exampleInputPassword1" class="form-label">Organization : *</label>
                                <select class="form-select" name="idOrganization">
                                    <?php foreach($organisation as $row) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

        
            <button class="btn btn-warning" onclick="window.location.href ='index.php?page=1'">
                Table Organisation
            </button>
    
        <table class="table text-light p-5 w-100 mb-5" >
            <legend class="text-light fw-bold text-decoration-underline d-flex justify-content-left mt-5"> Données de la table User :</legend>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>email</th>
                        <th>password</th>
                        <th>Suspended</th>
                        <th>IdOrganization</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            <tbody>
            <?php
             foreach($statement as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['suspended']; ?></td>
                    <td><?php echo $row['idOrganization']; ?></td>
                    <td class="text-center">
                        <a class="btn btn-info mx-2" href="./php/update.php?id=<?php echo $row['id']; ?>&page=2">Edit</a>
                    
                        <a class="btn btn-danger mx-2" href="./php/work.php?id=<?php echo $row['id']; ?>&page=2">Delete</a>
                    </td>
                </tr>
            <?php 
            }
        } ?>
            </tbody>
    </table>
<?php include 'StructurePage/footer.php'; ?>
