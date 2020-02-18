<?php if(isset($modal)){echo $modal;}?>



<script type="text/javascript">
    
   jQuery(document).ready(function()
   {	

         $(document).off("input", "form").on("input", "form", function(){

            var type = $(this).attr('type');
            $("#status_"+type).hide();
         });


         $(document).off("keyup", "#fha_form_register input").on("keyup", "#fha_form_register input", function(){

             var id = $(this).attr('id');
             var value = $("#"+id).val();
             var output = $("#output_"+id);
             var page_file = "<?php echo $page_file_config;?>";

             if(id == 'repass_re'){
                  var pass = $('#pass_re').val();
                  var repass = value;

                  if(repass != pass){
                      output.css('color', 'red').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Les mot de passe ne corresponde pas').show();
                  }else{
                      output.hide();
                  }

             }else{
               jQuery.ajax({
                  type : "POST",
                  url : '<?php echo base_url();?><?php echo $this->session->userdata('lg');?>'+'/fh/fhc_userlib/register_check_input',
                  dataType : 'json',
                  data : { id: id, value:value, page_file:page_file},

                   success : function(data){
                       if(data.id == false){
                           output.css('color', 'red').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '+data.msg).show();
                       }else{
                           output.hide();
                       }
                   }

               });
             }

         });


   		$(document).off("submit", "form").on("submit","form", function(e){

        var type = $(this).attr('type');
   			var submit = $("#submit_"+type);
			
        var page_file = "<?php echo $page_file_config;?>";


   			$("#status_"+type).hide();

   			var data = $(this).serialize();
        var data = data+"&page_file="+page_file;


          
            var action =$(this).attr('action');

// http://local.plateforme.comedien.be:8080/fr/fh/fhc_userlib/fh_authentification_exe/login
            


           
            var has_lg=(/fr|nl/).test(action)
            // console.log(has_lg);

            if (has_lg){
               var adresse = '<?php echo base_url();?>'+$(this).attr('action');
            }
            else {
               var adresse = '<?php echo base_url();?>'+'<?php echo $this->session->userdata('lg');?>/'+$(this).attr('action');
            }
   		
          
   			jQuery.ajax({ 

			    type :"POST",
			    url : adresse,
			    dataType : 'json',
			    data : data,
				
				  beforeSend: function(){
	                submit.append(' <i id="Loading" class="fa fa-refresh fa-spin fa-1x fa-fw"></i>').fadeIn();
	            },

	            success : function(data){

	               var el = document.getElementById('Loading');
	               el.parentNode.removeChild(el);

	               if(data.type == 'login'){ refresh_form_login(data); }
	               if(data.type == 'reset'){ refresh_form_reset(data); }
	               if(data.type == 'register'){ refresh_form_register(data); }
	               if(data.type == 'reinit'){ refresh_form_reinit(data); }
	            }
	        }).fail(
	        	function(jqXHR, textStatus, errorThrown) {

	        		  var el = document.getElementById('Loading');
	               	  el.parentNode.removeChild(el);
			          alert(jqXHR.responseText);
			     }
	        );

   			e.preventDefault();
   		});



   		function refresh_form_login(data){

   			var status = $('#status_'+data.type);

   			if(data.id == false){
   				status.html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '+data.msg_error).show();
   			}else{
           var url = "<?php echo $url;?>";
           if(url=="loadpage"){
              location.reload();
	      
           }else{
	       
              document.location.href="<?php echo base_url($url);?>";
           }
   			}
   		}

   		function refresh_form_reset(data){

   			var status = $('#status_'+data.type);

   			if(data.id == false){
   				status.html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '+data.msg).show();
   			}else{
   				$('#psorem_reset').hide();
   				$('#submit_reset').hide();
   				status.removeClass().addClass('form-group alert alert-success').html('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '+data.msg).show();
   			}
   		}

   		function refresh_form_reinit(data){

   			var status = $('#status_'+data.type);

   			if(data.id == false){
   				status.html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '+data.msg).show();
   			}else{
   				$('#pass_reinit').hide();
   				$('#repass_reinit').hide();
   				$('#submit_reinit').hide();
   				status.removeClass().addClass('form-group alert alert-success').html('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '+data.msg).show();
   			}

   		}

         function refresh_form_register(data){
            var status = $('#status_'+data.type);

            if(data.id == false){
                if(data.type == 'register'){
                   $('#username_re').keyup();
                   $('#email_re').keyup();
                   $('#pass_re').keyup();
                   $('#repass_re').keyup();
                }
               status.html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '+data.msg).show();
            }else{
               $('#username_re').hide();
               $('#email_re').hide();
               $('#pass_re').hide();
               $('#repass_re').hide();
               $('#submit_register').hide();
               status.removeClass().addClass('form-group alert alert-success').html('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '+data.msg).show();
            }
         }

   	});

       

</script>   

