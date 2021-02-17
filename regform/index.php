<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Πρώτη Φόρμα</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
<form id="form"  class="border-0 rounded-2 shadow-lg p-4 " >
  <h1 class="text-center mb-3">Εγγραφή</h1>
  <hr>
  <div class="row">
    <div class="col-md-6 mt-3 ">
      <input type="text" id="name" class="form-control "  name="firstName" placeholder="'Ονομα *" maxlength="50">
    </div>
    <div class="col-md-6 mt-3">
      <input type="text" id="last" class="form-control"  name="lastName" placeholder="Επίθετο *" maxlength="50">
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6 mt-3">
      <input type="tel" class="form-control " id="tel"   name="phoneNum" placeholder="Κινητό Τηλέφωνο *" maxlength="10">
    </div>
    <div class="col-md-6 mt-3">
      <input type="email" class="form-control" id="mail" name="email" placeholder="E-mail *" maxlength="50">
    </div>
  </div>
  <div class="row justify-content-center mt-3">
    <div class="form-group  col-md-6 mt-3">
        <select name="category" id="cat" class="form-control" >
          <option value="" class="text-muted" selected>Επιλέξτε κατηγορία *</option>
          <option value="category1">Κατηγορία 1</option>
          <option value="category2">Κατηγορία 2</option> 
        </select>
    </div>
    <small class="text-muted text-center mt-3">*Υποχρεωτικά πεδία</small>
  <br>
  <div class="row justify-content-center mt-2 text-center">
    <div class="col-md-3 mt-2">
        <button type="submit" name="submit" value="Submit" class="btn btn-primary  ">Εγγραφή</button>
    </div>
  </div>
</form>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="validate-form.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>