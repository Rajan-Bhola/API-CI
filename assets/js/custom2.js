jQuery(document).ready(function() {
var base_url=$("#base_url").val();		
/* Account */	
jQuery('#account').click( function() { 
  $("#account_form").validate({              
    rules: {
	username: {
        required: true,
      },
	email: {
        required: true,
      }
    },
	 messages: {
             username: "<span class='text-danger'>First Name is required</span>",
             email: "<span class='text-danger'>Email is required</span>",             
           },
	submitHandler: function(form) {
				var username = $('#username').val();
				var email = $('#email').val();
				var user_id =  $('#user_id').val();
				$.ajax({
				type: "POST",
				url: base_url+'frontend/update_account',
				data: {username:username,email:email,id:user_id} ,
				 success: function(res){
							 jQuery('.alert-success').css('display','block');
							setTimeout(function() { 
							  jQuery('.alert-success').css('display','none');
							}, 3000); 
						}
				
				}); 	
				}
  });
});
/* End Account */

/* Profile */
jQuery('#profile').click( function() { 
  $("#profile_form").validate({              
    rules: {
	firstname: {
        required: true,
      },
	lastname: {
        required: true,
      },
    
	birthday: {
        required: true,
      },
    
	website: {
        required: true,
      },
    
	phone: {
        required: true,
      },
    
	location: {
        required: true,
      }
    },
	 messages: {
             firstname: "<span class='text-danger'>First Name is required</span>",
             lastname: "<span class='text-danger'>Last Name is required</span>",             
             birthday: "<span class='text-danger'>Birthday is required</span>",             
             website: "<span class='text-danger'>Website is required</span>",             
             phone: "<span class='text-danger'>Phone is required</span>",             
             location: "<span class='text-danger'>Location is required</span>",             
           },
	submitHandler: function(form) { 
				var firstname = $('#firstname').val();
				var lastname = $('#lastname').val();
				var user_id =  $('#user_id').val();
				var birthday =  $('#birthday').val();
				var gender =  $('#gender').val();
				var website =  $('#website').val();
				var phone =  $('#phone').val();
				var location =  $('#location').val();
				var about =  $('#about').val();
				 $.ajax({
				type: "POST",
				url: base_url+'frontend/update_profile',
				data: {firstname:firstname,lastname:lastname,id:user_id,birthday:birthday,gender:gender,website:website,phone:phone,location:location,about:about} ,
				 success: function(res){
							 jQuery('.alert-success').css('display','block');
							setTimeout(function() { 
							  jQuery('.alert-success').css('display','none');
							}, 3000); 
						}
				
				}); 	
				 }
  }); 
});
/* END PROFILE */
/* PASSwORD */	
jQuery('#pwd').click( function() { 
  $("#pwd_form").validate({  
    rules: {
	oldpassword: {
        required: true,
      },
	newpassword: {
        required: true,
      },
	confirmpassword : {
					required: true,
                    equalTo : "#newpassword"
      }
    },
	 messages: {
             oldpassword: "<span class='text-danger'>Old Password is required</span>",
             newpassword: "<span class='text-danger'>New Password is required</span>",             
             confirmpassword: "<span class='text-danger'>Confirm Password is required</span>",             
           },
	submitHandler: function(form) {
		
				var newpassword = $('#newpassword').val();
				var user_id =  $('#user_id').val();
				var user_id =  $('#user_id').val();
				$.ajax({
				type: "POST",
				url: base_url+'frontend/update_password',
				data: {password:newpassword,id:user_id} ,
				 success: function(){
						jQuery('.alert-success').css('display','block');
							setTimeout(function() { 
							  jQuery('.alert-success').css('display','none');
							}, 3000); 
						}
				
				}); 	
		}
  });
});
/* END PASSORD */
	
 
(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#oldpassword",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };
}(jQuery));

//Here how to call above plugin from everywhere in your application document body
$.toggleShowPassword({
    field: '#oldpassword',
    control:'#show-password'
});

var items= [];
jQuery("#search").keyup(function(){ 
if(jQuery("#search").val().length>3){ 
$.ajax({ 
type: "post", 
url: base_url+'admin/search', 
cache: false,
 data:'search='+$("#search").val(),
 success: function(response){ 
 $('#finalResult').html(""); 
 var obj = JSON.parse(response); 
 if(obj.length>0){ 
 try{ 
 var items=[]; 

 $.each(obj, function(i,val){
  var value = "<li><a onClick=selectCustomerlist('"+val.id+"','"+val.username+"')>"+val.username+"</a></li>";
 items.push(value);
 }); 
 $('#finalResult').append.apply($('#finalResult'), items); 
 }
 catch(e) 
 { 
 alert('Exception while request..'); 
 } 
 }
 else
 {
	 $('#finalResult').html($('<li/>').text("No Data Found")); 
	 }
	 }, 
	 error: function(){ alert('Error while request..'); } 
	 });
	 } 
	 return false;
	 });
	 

});
function selectCustomerlist(uID,vall) {
jQuery("#search").val(vall);
jQuery("#receivername").val(vall);
jQuery("#receiver_id").val(uID);
jQuery("#finalResult").hide();
}  
