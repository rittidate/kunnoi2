$('#user-new-form').validate({

  rules: {
     first_name: {
        required: true
    },
    username: {
        minlength: 6,
        required: true
      },
    password: {
      required: true,
      minlength: 6
    },
    password_confirm: {
      required: true,
      minlength: 6,
      equalTo: "#password"
    },
    email: {
      required: true,
      email: true
    },
    phone: {
        minlength: 9,
        maxlength: 10,
        required: true,
        number: true
    },
  }
  
});

$('#user-edit-form').validate({

  rules: {
     first_name: {
        required: true
    },
    username: {
        minlength: 6,
        required: true
      },
    email: {
      required: true,
      email: true
    },
    phone: {
        minlength: 9,
        maxlength: 10,
        required: true,
        number: true
    },
  }
  
});
