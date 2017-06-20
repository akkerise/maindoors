function updateUser(objUser) {
                       $("#exampleInputFullName").val(objUser.fullname);
                       $('#exampleInputEmail').val(objUser.email);
                       $('#exampleInputAddress').val(objUser.address);
                       $('#exampleInputId').val(objUser.id);
                       $('#updateUser').attr('action', function(){
                            return '{{ url('admin/usermanager') }}' + '/' + objUser.id;
                       });
                   }
                   $(document).ready(function () {
                       $('#updateUser').on('submit', function (e) {
                           e.preventDefault();
                           console.log($('#updateUser').prop('action'));
                           $.ajax({
                               type: 'POST',
                               url: $('#updateUser').prop('action'),
                               data: $('#updateUser').serialize(),
                               success: function (data) {
                                   console.log(data);
                               }
                           });
                       })
                   });