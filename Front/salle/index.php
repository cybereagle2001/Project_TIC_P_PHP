<!DOCTYPE html>
<html lang="en">

<head>
<?php
require_once '../../back/dataBaseHandler.php';
require_once '../../back/salle/ajouterSalle.php';

$dbHandler = new dataBaseHandler();
$salles = $dbHandler->getSalles();

?>
    <link href="./style.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body>
    <div class="container crud-table">
        <div class="clearfix">
            <div class="form-inline pull-left">
                <button class="btn btn-success" id="add_salle_botton">
                    <span class="glyphicon glyphicon-plus"></span> Add salle
                </button>
            </div>
            <div class="form-inline pull-right">
                Search by name:
                <div class="form-group">
                    <input type="text" ng-model="searchName" placeholder="Type name to search" class="form-control">
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>salle id</th>
                    <th>nom salle</th>
                    <th>capacité</th>
                    <th>type salle</th>
                    <th>nom club</th>
                    <th>address club</th>
                </tr>
            </thead>
            <tbody class="text-center">
                
            <?php
                foreach ($salles as $salle) {
                    echo "<tr>";
                    echo "<td>" . ($salle->getIdSalle()) . "</td>";
                    echo "<td>" . ($salle->getNomSalle()) . "</td>";
                    echo "<td>" . ($salle->getCapacity()) . "</td>";
                    echo "<td>" . ($salle->getSalleType()) . "</td>";
                      echo  "<td>".$salle->getClub()['nom_club']." </td>"; 
                      echo "<td>".$salle->getClub()['adresse']." </td>"; 
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="crude-form__wrapper" >
            <h3 ng-show="editForm">Edit user</h3>
            <h3 ng-show="add_salle_botton">ajouter salle</h3>
            <form name="add_salle_form" id="add_salle_form" method="POST" style="display:none" >
                <div class="form-group">
                    <label for="nom_salle">nom salle</label>
                    <input id="nom_salle" class="form-control" type="text" name="name" ng-model="crudFormName" placeholder="Edit name" required>
                    <div style="display:none" class="form-alert alert alert-danger" ng-show="userForm.name.$invalid && userForm.name.$touched">Please input name</div>
                </div>
                <div class="form-group">
                    <label for="capacity">capacité</label>
                    <input id="capacity" class="form-control" type="text"  placeholder="capacité" required>
                    <div  style="display:none" class="form-alert alert  alert-danger" >Please input user country</div>
                </div>
                <div class="form-group">
                    <label for="type">type salle</label>
                    <input id="type" class="form-control" type="number" placeholder="type salle" min="1" required>
                    <div style="display:none" class="form-alert alert alert-danger" ng-show="userForm.salary.$invalid && userForm.salary.$touched">
                        <span style="display:none" ng-show="userForm.salary.$error.number">Please input valid number</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_club">club</label>
                    <input id="id_club" class="form-control" type="number" placeholder="club" min="1" required>
                    <div style="display:none" class="form-alert alert alert-danger" ng-show="userForm.salary.$invalid && userForm.salary.$touched">
                        <span style="display:none" ng-show="userForm.salary.$error.number">Please input valid number</span>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="glyphicon glyphicon-pencil"></i> Save change
                </button>
                <button class="btn btn-primary" ng-click="triggerForm = false">Cancel</button>
            </form>
        </div>
    </div>
    <script>
        const error_add = {}
        const button = window.document.getElementById('add_salle_botton');
        button.addEventListener('click', function () {

            document.getElementById('add_salle_form').style.display==="block"? document.getElementById('add_salle_form').style.display="none":
                  document.getElementById('add_salle_form').style.display = 'block';
        });
    </script>
</body>
</html>