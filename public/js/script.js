$( document ).ready(function() {


  alertbox = $('#alertBox')

  if(alertbox.text() != null){
    setTimeout(function(){ 
      $( "#alertBox" ).hide();

  },25000)
  }

  $('#btnSearchUsersToAdd').click(function(e){
    e.preventDefault()
    search =  $('#txtSearchUsersToAdd').val()

    searchUsersToAdd(search)

  })

  $('#resetPassword').click(function(e){
   
    e.preventDefault(e)

    password = Math.random().toString(36).slice(-8);
    email = $('#resetPasswordEmail').val()

    $('#showPassword').text(password)
    copyToClipboard($('#showPassword'))
    showCountDown()
    resetPassword(email, password)
  })


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
  $('#searchPermissions').click(function(e){
     e.preventDefault()
     $search = $('#permissionSearchQuery').val()
     searchPermissions($search)

  })
  $('#permissionSearchQuery').keypress(function(e){
          if(e.which == 13){
              $('#searchPermissions').click()
          }
  })
    
   $("#deleteUser").click( function (e) {
    
      e.preventDefault(e)
       userName = $('#editUserName').val()

      confirmDeleteUser(userName);
})

   $(document.body).on('click',"#confrimDelete",function(){
      alert('This will disable all user assets, and may break essential systems. E.g. Live Email, Live SMS, Custom Extracts1....')
      confrimDeleteInput = prompt('Type DELETE to confirm user deletion!')
      if(confrimDeleteInput == "DELETE"){
         $('#editUserForm').attr('action', "/user/deleteUser").submit()
      }else
      {
        alert('Deletion not confirmed. User has not been deleted.')
      }
     
   })

$(document).on('click','#deleteClientUser',function(e){
    
          e.preventDefault(e)

          csrf = $('#csrf').val()
          clientId = $('#clientID').val()
          userId = $('#userID').val() 
          deleteClientUser(clientId,userId)

    })
})


function confirmDeleteUser(username){
  if(!$('#confirmAlert').length){
    $('#alertDelete').append('<div id="confirmAlert" class="alert alert-danger pt-2 mt-4 text-center" role="alert"> \
                              <p> Confirm deleteing <b>'+ userName +'</b> from the system! </p>\
                                <div class="text-center"><button class="btn btn-danger col-3" id="confrimDelete">Confim</button></div>\
                                </div>'
                            )
  }
  
}
 $('#rmvClientUser').click(function(e){
      e.preventDefault()
      $('#confAlert').removeAttr( 'hidden' )
      $('#confAlert').append(' <div class="col-md-10">'+
                'Are you sure you want to <b>remove</b> the user from this client, disabling all of their roles and revoing permissions?'+
            '</div>'+
            '<div class="col-md-1">'+
                 '<button class="btn btn-red" id="deleteClientUser"> Confirm</button>'+
            '</div>')
 })

  $('#rmvRole').click(function(e){
      e.preventDefault()
      $('#confAlert').removeAttr( 'hidden' )
      $('#confAlert').append(' <div class="col-md-10">'+
                'Are you sure you want to <b>remove</b> the user from this client, disabling all of their roles and revoing permissions?'+
            '</div>'+
            '<div class="col-md-2">'+
                 '<button class="btn btn-red" id="deleteRoleConf"> Confirm</button>'+
            '</div>')
 })
$(document).on('click','#deleteRoleConf',function(e){
    $('#deleteRole').submit()
})

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
          user.status.id === 0 ? classInject="text-success" : classInject="text-muted"
          $('#userList').append('<a href="/user/'+user.id+'">'+
                                      '<div class="row border-bottom p-2 hover">'+
                                        '<div class="col-md-1 text-color-red">'+ user.id+ '</div>'+
                                        '<div class="col-md-4 text-dark">'+user.name+'</div>'+
                                        '<div class="col-md-5 text-dark">'+user.email+'</div>'+
                                        '<div class="col-md-2 text-right small '+
                                          classInject +
                                         '">'+user.status.name+'</div>'+
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
function showCountDown(){
  var n = 15;
  $( "#showPassword" ).fadeIn( "fast")
  $( "#showMessage" ).fadeIn( "fast")
  
  $('#passwordResetRow').removeClass('pb-2', 'm-2') 
  $('#passwordResetCol').removeClass('mb-2') 
  $('#showMessage').text('This password will disappear in '+n+'s.')
   $('#showCopyMessage').text('Copied to clipboard')

    var tm = setInterval(countDown,1000);

    function countDown(){
       n--;
       if(n == 0){
          clearInterval(tm);
       }
        
        $('#showMessage').text('This password will disappear in '+n+'s.')
    }
  $('#passwordResetRow').addClass('pb-2', 'm-2') 
  $('#passwordResetCol').addClass('mb-2')
  setTimeout(function(){ 

    $( "#showMessage" ).fadeOut( "slow", function() {})

     $( "#showPassword" ).fadeOut( "slow", function() {

        $('#showPassword').text("")
        $('#showMessage').text("")
      })
  },15000)

  setTimeout(function(){ 
  $('#showCopyMessage').text('')
  },3000)

 

}
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
function searchUsersToAdd(search){
  $.get( "/api/users/search", { search: search} ).done(function(data){
     $('#selectedUser').html('')

     $('#selectedUser').append('<option>Search Results</option>')
    $.each(data.users, function(index, user) {
      $('#selectedUser').append('<option value="'+user.id+'">'+user.name+'</option>')
    })

    $('#selectedUser').addClass('border border-success')

      setTimeout(function(){ 
          $('#selectedUser').removeClass('border border-success')

      },5000)
  })
}













function resetPassword(email, password){
  csrf = $('#csrf').val()
  id = $('#userID').val()

  $.post( "/user/password/update", { id: id, password: password, _token:csrf} ).done(function(data){
    console.log(data)
  });
}

$('#searchClientUser').click(function(e){
  e.preventDefault()
  search =$('#clientUserSearchQuery').val()
  clientId = $('#clientID').val()
  userId = $('#userID').val()

  csrf = $('#csrf').val()
  $.get( "/api/client/"+clientId+"/user/"+userId, { _token:csrf, search:search} ).done(function( data ) {

    console.log(data.allRoles)
    dispalyRoleSearch(data)
    });

})

function dispalyRoleSearch(data){
  $('#roleList').html("")
  console.log(data)
  if(data && data !=""){
    $.each(data.userRoles, function(index, userRole){
      $.each( data.allRoles, function(index, allRole){
        
          if(allRole.id == userRole.id){
            check="checked"
          }else{
            check=""
          }
            $('#roleList').append(
                '<div class="m-y-1 py-2 col-md-3 .role border-bottom" >'+
                  '<input class="form-check-input" name="'+allRole.id+'" type="checkbox"'+ check+'>'+
                  '<label class="form-check-label" for="flexCheckDefault">'+allRole.name+'</label>'+
                '</div>')
        })
      })
    }else{
       $('#roleList').append('<div class="text-muted"><p>No roles found matching that name</p></div>')
    }
}



