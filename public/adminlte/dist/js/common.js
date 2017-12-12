$('.btnUpdate').on('click', function () {
    let id = $(this).attr('data-id');
    $.ajax({
        type: 'GET',
        url: config.baseUrl + '/admin/usermanagerajax' + '/' + id,
        beforeSend: function (jqXHR, settings) {
            console.log(settings.url)
        }
    })
        .done(function (data) {
            let user = data.user;
            console.log(user);
            $('#exampleInputFullName').val(user.fullname);
            $('#exampleInputEmail').val(user.email);
            $('#exampleInputAddress').val(user.address);
            $('#levelChecked' + user.level).prop('checked', true);
            $('#confirmedChecked' + user.confirmed).prop('checked', true);
            $('#genderChecked' + user.gender).prop('checked', true);
        })
        .fail(function (err) {
            console.log(err);
        })
        .always(function () {
            console.log("complete");
        });
});

$('.btnDelete').on('click', function () {
    let id = $(this).attr('data-id');
    let result = window.confirm('Are you sure delete id : ' + id + ' ?');
    if (result) {
        window.location.replace(config.baseUrl + '/admin/deleteuser/' + id);
    }
});

$('#formUpdateUser').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: config.baseUrl + '/admin/usermanagerajax/' + $('#hiddenId').val(),
        data: $('#formUpdateUser').serialize(),
        beforeSend: function (jqXHR, settings) {
            console.log(settings.url)
        }
    })
        .done(function (data) {
            let data = $.parseJSON(data);
            console.log(data);
            $("#hiddenId").prop('value', '');
        })
        .fail(function (err) {
            console.log(err);
        })
        .always(function () {
            console.log("complete");
        });
});