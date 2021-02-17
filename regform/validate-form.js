
$(document).ready(function () {
  //styling errors
    $.validator.setDefaults({
      highlight : function(element) {
        $(element).closest('.form-control').addClass('is-invalid')
      },
      unhighlight : function(element) {
        $(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid')
      },
      errorClass: 'text-danger',
      

    });
    

    //extra rules
    jQuery.validator.addMethod('regname', function(value, element){
      return this.optional(element) || /^[α-ωΑ-ΩίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ\s]+$/.test(value);
    }, 'Μόνο ελληνικούς χαρακτήρες.');

    
    jQuery.validator.addMethod('greek', function(value, element) {
      return this.optional( element ) || /^[6]{1}[9]{1}[0-9]{8}$/.test( value );
    }, 'Μη έγκυρος αριθμός.');
    
    
    // client side validation and redirection 
    $('#form').validate({
      
      rules: {
        
        firstName: {
          required: true,
          rangelength: [2, 50],
          regname: true
        },
        lastName: {
          required: true,
          rangelength: [2, 50],
          regname: true
        },
        phoneNum: {
            required: true,
            maxlength: 10,
            minlength: 10,
            number: true,
            greek: true
          },
        email: {
          required: true,
          email: true 
      },
      category: {
        required: true
      },
      },
      messages: {
        firstName: {
          required: 'Παρακαλώ εισάγεται όνομα.',
          rangelength: '2 με 50 χαρακτήρες.'
       },
       lastName: {
        required: 'Παρακαλώ εισάγεται επίθετο.',
        rangelength: '2 με 50 χαρακτήρες.'
      },
      phoneNum: {
        required: 'Παρακαλώ εισάγεται αριθμό.',
        minlength: 'Παρακαλώ εισαγεται έγκυρο αριθμό.',
        maxlength: 'Παρακαλώ εισαγεται έγκυρο αριθμό.',
        number:'Παρακαλώ εισαγεται έγκυρο αριθμό.'
       
      },
      email: {
        required: 'Παρακαλώ εισάγεται e-mail.',
        email: 'Παρακαλώ εισάγεται έγκυρο e-mail.'
        
        
      },
      category: {
        required: 'Παρακαλώ επιλέξτε κατηγορία.'
      }
    },
      
      submitHandler: function(form) {
        let firstName = $('#name').val();
    let lastName = $('#last').val();
    let phoneNum = $('#tel').val();
    let email = $('#mail').val();
    let cat= $('#cat').val();

    let obj = {
      "firstName": firstName,
      "lastName": lastName,
      "phoneNum": phoneNum,
      "email": email,
      "category": cat
    };
        $.ajax({
          type: "POST",
          url: "http://localhost/exercise/api/create.php",
          data: JSON.stringify(obj),
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(){;
          window.location.href='http://localhost/exercise/editform/base.php'},
          error: function(errMsg) {
              alert(errMsg);
          }
      });
      }
    });
  });


