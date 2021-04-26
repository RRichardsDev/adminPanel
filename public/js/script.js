$( document ).ready(function() {

  $('#addUserToInstance').click(function(){
    setTimeout(
      function() 
      {
       if($('#status')){
          alert(1)
        }
      }, 3000);
  })

    
   $("#deleteUser").click( function (e) {
    
      e.preventDefault(e)
      
      if(($('#userName').val()))
      {
        userName = $('#userName').val()
      }else{
        userName = $('#editUserName').attr('placeholder')
      }
      confirmDeleteUser(userName);
})

   $(document.body).on('click',"#confrimDelete",function(){
      $('#editUserForm').attr('action', "/user/deleteUser").submit();
   })

    $("#deleteClientUser").click( function (e) {
    
          e.preventDefault(e)

          csrf = $('#csrf').val()
          clientId = $('#clientID').val()
          userId = $('#userID').val() 
          deleteClientUser(clientId,userId)

    })
})



function confirmDeleteUser(username){
  if(!$('#confirmAlert').length){
    $('#alertDelete').append('<div id="confirmAlert" class="alert alert-danger" role="alert"> \
                              <p> Confirm deleteing <b>'+ userName +'</b> from the system! </p>\
                                <div class="text-center"><button class="btn btn-danger col-3" id="confrimDelete">Confim</button></div>\
                                </div>'
                            )
  }
  
}

function deleteClientUser(clientID, userID) {
   csrf = $('#csrf').val()

   $.ajax({
      type:'POST',
      url:'/client/user/delete',
      data: {
            clientID:clientID,
            userID:userID,
            _token:csrf,
         },
      success:function(data) {
         window.location.href = "/client/"+clientID;
      },
      error: function (e) {
         console.log(e)
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