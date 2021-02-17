<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cursor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Επεξεργασία Βάσης</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="">Επεξεργασία Χρηστών</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a href="http://localhost/exercise/regform/index.php" class="nav-link">Πίσω στην φόρμα εγγραφής</a></li>
        <li class="nav-item "><a id="fetch" class="nav-link ">Ανάκτηση χρήστη από τρίτη υπηρεσία</a></li>
      </ul>
      <form class="d-flex col-4 ">
        <input id="search" class="form-control me-3" type="search" placeholder="Πληκτρολογήστε για αναζήτηση" aria-label="Search">
      </form>
  </div>
</nav>
<form id="edit">
<table class="table table-striped">
 <tr class="bg-info">
    <th>Α/Α</th>
    <th>Όνομα</th>
    <th>Επώνυμο</th>
    <th>Αριθμός Κιν.</th>
    <th>E-mail</th>
    <th>Κατηγορία</th>
    <th></th>
    <th></th>
    <tbody id="table">
    </tbody>
  </tr>
</table>
</form>
<div id="fetch_modal_confirmation" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Επιτυχία!<h4>
      </div>
      <div class="modal-body">
        <p>Η ανάκτηση έγινε επιτυχώς.</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
      </div>
    </div>
  </div>
</div>
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Προσοχή!</h4>
      </div>
      <div class="modal-body">
        <p>Θέλετε να διαγράψετε αυτόν τον χρήστη;</p>
      </div>
      <div class="modal-footer">
      <button type="button" id="modalDeleteBtn" class="btn btn-danger" data-bs-dismiss="modal">Διαγραφή</button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ακύρωση</button>
      </div>
    </div>
  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Επιτύχια!</h4>
      </div>
      <div class="modal-body">
        <p>Ο χρήστης διεγράφηκε επιτυχώς!</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="rendered.js"></script>
</body>
</html>