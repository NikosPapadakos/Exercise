$(document).ready(function () {

    //get users
    function renderData() {
        $.getJSON('http://localhost/exercise/api/read.php', function buildTable(data) {

            $('#table td').remove();

            let users = data.data;

            for (let i = 0; i < users.length; i++) {
                let row = `<tr id= "${users[i].id}">
                            <td class="align-middle">${users[i].id}</td>
                            <td class="align-middle">${users[i].firstName}</td>
                            <td class="align-middle">${users[i].lastName}</td>
                            <td class="align-middle">${users[i].phoneNum}</td>
                            <td class="align-middle">${users[i].email}</td>
                            <td class="align-middle">${users[i].category}</td>
                            <td class="align-middle"><button  type="button" class="btn btn-primary edit">Επεξεργασία</button></td>
                            <td class="align-middle"><button type="button"  class="btn btn-danger delete " data-toggle="modal" data-target="#deleteModal">Διαγραφή</button></td>
                       </tr>`
                $('#table').append(row);
            }
        });
    };
    renderData();


    //search bar
    $('#search').on('keyup', function () {
        let value = $(this).val().toLowerCase();
        $("#table tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    //edit user
    $(document).on("click", '#table .edit', function () {
        let upId = $(this).closest('tr').attr('id');
        $.getJSON(`http://localhost/exercise/api/single_read.php/?id=${upId}`, function getCurrent(user) {

            let newRow =
                `  <tr id= "${upId}">
                            <td>${upId}</td>
                            <td><input name="firstName" form="edit" id="name" value="${user.firstName}"></td>
                            <td><input name="lastName" form="edit" id="last" value="${user.lastName}"></td>
                            <td><input name="phoneNum" form="edit" id="tel" value="${user.phoneNum}"></td>
                            <td><input name="email" form="edit" id="mail" type="email" value="${user.email}"></td>
                            <td><input name="category" form="edit" id="cat" value="${user.category}"></td>
                            <td><button type="submit" name="submit" form="edit"" value="Submit" class="btn btn-primary sub">Αποθήκευση</button></td>
                            <td></td>
                       </tr>`;

            $(`#${upId}`).after(newRow);
            $(`#${upId}`).hide();
        })
    });


    //save user
    $(document).on("click", '#table .sub', function () {
        console.log('hello')
        let id = $(this).closest('tr').attr('id');
        let firstName = $('#name').val();
        let lastName = $('#last').val();
        let phoneNum = $('#tel').val();
        let email = $('#mail').val();
        let category = $('#cat').val();

        let obj = {
            "id": id,
            "firstName": firstName,
            "lastName": lastName,
            "phoneNum": phoneNum,
            "email": email,
            "category": category
        };

        $.ajax({
            type: "POST",
            url: "http://localhost/exercise/api/update.php",
            data: JSON.stringify(obj),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function () {
                renderData();
            },
            error: function (errMsg) {
                alert(errMsg);
            }
        });
    });


    // delete user
    $(document).on("click", '#table .delete', function () {
        let deId = $(this).closest('tr').attr('id');

        $('#modalDeleteBtn').data('row_id', deId)
        $('#deleteModal').modal('toggle')
    });

    $('#modalDeleteBtn').on("click", function () {
        let del = {
            "id": $('#modalDeleteBtn').data('row_id')
        }

        $.ajax({
            type: "DELETE",
            url: "http://localhost/exercise/api/delete.php",
            data: JSON.stringify(del),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function () {
                $('#deleteModal').modal('toggle');
                $('#myModal').modal('toggle');
                $(`#${del.id}`).remove();
            },
            error: function (errMsg) {
                alert(errMsg);
            }
        });
    });

    
    //fetch user 3rd party
    $('#fetch').on('click', function () {
        $.ajax({
            type: "get",
            url: "http://localhost/exercise/api/fetch_external_user.php",
            success: function () {
                $('#fetch_modal_confirmation').modal('toggle');
                renderData();
            },
            error: function (errMsg) {
                alert(errMsg);
            }
        });
    })
});


