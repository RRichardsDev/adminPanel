$( document ).ready(function() {
    
   $("#userList").on('click', '.btnDelete', function () {
   	userId = $(this).closest('tr').find(".nr").text()
   	userName = $(this).closest('tr').find(".dynamName").text()
   	if (confirm('Are you sure you want to DELETE ' + userName + "'s user account?"))
   	{
   		status = deleteUser(userId, userName)
         if(status==true){
            $(this).closest('tr').remove()
         }
   		
   	} 
   });

   $("#clientList").on('click', '.btnDelete', function () {
      clientId = $(this).closest('tr').find(".nr").text()
      clientName = $(this).closest('tr').find(".dynamName").text()
      if (confirm('Are you sure you want to DELETE ' + clientName + "'s user account?"))
      {
         status = deleteClient(clientId, clientName)
         if(status == true ){
            $(this).closest('tr').remove()
         }
      } 
   });
});

function deleteUser(id, name) {
	csrf = $('#csrf').val()
   $.ajax({
      type:'POST',
      url:'/user/deleteUser',
      data: {
      		id:id,
      		_token:csrf,
      	},
      success:function(data) {
         alert(name+ ' has been deleted from the system!')
         return true
      },
      error: function (e) {
         alert("There has been an error! " + name + " has not been deleted!");
         console.log(e)
         return false
      },
      
   });
}

function deleteClient(id, name) {
   csrf = $('#csrf').val()

   alert()
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
         return false
      },
   });
}