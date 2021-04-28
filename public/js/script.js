$( document ).ready(function() {


  $('#searchClients').click(function(e){
     e.preventDefault()
     $search = $('#clientSearchQuery').val()
     searchClients($search)

  })
  $('#clientSearchQuery').keypress(function(e){
          if(e.which == 13){
              $('#searchClients').click()
          }
  })
  $('#searchUsers').click(function(e){
     e.preventDefault()
     $search = $('#userSearchQuery').val()
     searchUsers($search)

  })
  $('#clientSearchQuery').keypress(function(e){
          if(e.which == 13){
              $('#searchClients').click()
          }
  })
  $('#searchRoles').click(function(e){
     e.preventDefault()
     $search = $('#roleSearchQuery').val()
     searchRoles($search)

  })
  $('#roleSearchQuery').keypress(function(e){
          if(e.which == 13){
              $('#searchRoles').click()
          }
  })

  // $('#addUserToInstance').click(function(){
  //   setTimeout(
  //     function() 
  //     {
  //      if($('#status')){
  //         alert(1)
  //       }
  //     }, 3000);
  // })

    
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
  })
}

function searchClients(searchQuery) {
   csrf = $('#csrf').val()

  $.ajax({
    type:'get',
    url:'/api/clients',
    data: {
        _token:csrf,
        search: searchQuery
       },
    success:function(data) {
       console.log(data)
       $('#clientList').html('')
       $.each(data.clients, function(index, client) {
          console.log(client)
          $('#clientList').append('<a href="/client/'+client.id+'">'+
                                      '<div class="row border-bottom p-2 hover">'+
                                        '<div class="col-md-3 text-color-red">'+ client.id+ '</div>'+
                                        '<div class="col-md-8 text-dark">'+client.name+'</div>'+
                                      '</div>'+
                                    '</a>')
      });
        
    },
    error: function (e) {
       console.log(data.clients)
       console.log(e)
       return 1;
      }
  })
}
function searchUsers(searchQuery) {
   csrf = $('#csrf').val()

  $.ajax({
    type:'get',
    url:'/api/users',
    data: {
        _token:csrf,
        search: searchQuery
       },
    success:function(data) {
       console.log(data)
       $('#userList').html('')
       $.each(data.users, function(index, user) {
          console.log(user)
          $('#userList').append('<a href="/user/'+user.id+'">'+
                                      '<div class="row border-bottom p-2 hover">'+
                                        '<div class="col-md-3 text-color-red">'+ user.id+ '</div>'+
                                        '<div class="col-md-8 text-dark">'+user.name+'</div>'+
                                      '</div>'+
                                    '</a>')
      });
        
    },
    error: function (e) {
       console.log(data.users)
       console.log(e)
       return 1;
      }
  })
}
function searchRoles(searchQuery) {
   csrf = $('#csrf').val()

  $.ajax({
    type:'get',
    url:'/api/roles',
    data: {
        _token:csrf,
        search: searchQuery
       },
    success:function(data) {
      $('#roleList').html('')
       // console.log(data)
       
       $.each(data.roles, function(index, role) {
          console.log(role)
          $('#roleList').append('<a href="/role/'+role.id+'">'+
                                      '<div class="row border-bottom p-2 hover">'+
                                        '<div class="col-md-1 text-color-red">'+ role.id+ '</div>'+
                                        '<div class="col-md-11 text-dark">'+role.name+'</div>'+
                                      '</div>'+
                                    '</a>')
      });
        
    },
    error: function (e) {
      alet(e)
       console.log(data.users)
       console.log(e)
       return 1;
      }
  })
}