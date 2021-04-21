$( document ).ready(function() {
    
   $("#deleteUser").click( function (e) {

      e.preventDefault(e)
      $('#editUserForm').attr('action', "/user/deleteUser").submit();
   	
      userName = $('#userName').val()
      userID = $('#userID').val()
   	if (confirm('Are you sure you want to delete this user?'))
   	{
   		deleteUser(userID, userName)
           
   	} 

   });
})

//    $("#clientList").on('click', '.btnDelete', function () {
//       clientId = $(this).closest('tr').find(".nr").text()
//       clientName = $(this).closest('tr').find(".dynamName").text()
//       if (confirm('Are you sure you want to DELETE ' + clientName + "'s user account?"))
//       {
//          deleteClient($(this), clientId, clientName)
//          $(this).closest('tr').remove()
//       } 
//    });

//    $('#addUserToInstance').click(function(e){
//       e.preventDefault()
//       user = $('#selectedUser option:selected').text()
//       role = $('#selectedRole option:selected').text()
//       addUserToInstanceAjax(6)

//       $( "#createInstanceUserList" ).append( "<div class='row border-top p-2'> <div class='col-6'>"+ user +"</div> <div class='col-6'>"+role+"</div>" );
      
//    })
// });

// function addUserToInstanceAjax(id) {
//    csrf = $('#csrf').val()
//    id = 6
//    $.ajax({
//       type:'POST',
//       url:'/instance/store',
//       data: {
//             id:id,
//             _token:csrf,
//          },
//       success:function(data) {
//          alert('stored')
//          return 1;
//       },  
//    });
// }

function deleteUser(id, name) {
	csrf = $('#csrf').val()
   $.ajax({
     type: "GET",
     url: '/user/deleteUser',
     data: {id:id,
            _token:csrf
         },
     success: function(data){
       alert(data + ' has been deleted from the system!')
       window.location.href('/user/list')
     },
     
   });
}

function deleteClient(id, name) {
   csrf = $('#csrf').val()

   $.ajax({
      type:'POST',
      url:'/client/deleteclient',
      data: {
            id:id,
            _token:csrf,
         },
      success:function(data) {
         alert(name+ ' has been deleted from the system!')
      },
      error: function (e) {
         alert("There has been an error! " + name + " has not been deleted!")
         console.log(e)
         return 1;
      },
   });
}