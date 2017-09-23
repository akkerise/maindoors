// $(document).ready(function () {
//   alert('CLGT');
//   let objUser = {
//     id: '',
//     fullname: '',
//     username: '',
//     email: '',
//     address: '',
//     gender: '',
//     description: '',
//     total_money: '',
//     confirm_code: '',
//     confirmed: '',
//     image_avatar: '',
//     api_token: '',
//     remember_token: '',
//     created_at: '',
//     updated_at: '',
//   };
//   function updateUser(objUser){

//     $('#exampleInputFullName').val(objUser.fullname);
//     $('#exampleInputEmail').val(objUser.email);
//     $('#exampleInputAddress').val(objUser.address);
//     $('#levelChecked' + objUser.level).prop('checked', true);
//     $('#genderChecked' + objUser.gender).prop('checked', true);

//     $('#formUpdateUser').attr('action', function(){
//       return '{{ url('admin/usermanager') }}' + '/' + objUser.id;
//     });
//   }

//   $('#formUpdateUser').on('submit', function (e) {
//    e.preventdefault();
//    let id = 
//    console.log($('#updateUser').prop('action'));
//    $.ajax({
//      type: 'POST',
//      url: 'http://localhost:8000/admin/usermanager/',
//      data: $('#formUpdateUser').serialize(),
//      success: function (data) {
//        var d = $.parseJSON(data);
//        console.log(d);
//      }
//    });
//  });
// })