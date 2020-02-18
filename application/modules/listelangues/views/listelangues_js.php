<script>

jQuery(document).ready(function () {
        //afficher une table sur la page liste
        $(document).off("click", ".get_pencil_form").on("click", ".get_pencil_form", function () {

            var container=$(this).closest('td');
            var url = "<?php echo base_url();?><?php echo $this->session->userdata("lg");?>/Listelangues/get_form";

            var valeur_id_element= $(this).attr('valeur_id_element');
            var form_type=$(this).attr('form_type');
            var champ_id= $(this).attr('champ_id');
            var champ_saved=$(this).attr('champ_saved');
            var table=$(this).attr('table');

          
            var datastring = "table="+table+"&form_type="+form_type+"&champ_saved="+champ_saved+"&champ_id="+champ_id+"&id="+valeur_id_element;
	
            
            jQuery.ajax({
				type: 'POST',
				url: url,
				data: datastring,
				// dataType: 'json',
				cache: false,
				// contentType: false,
				// processData: false, 
                // elem.html(' <i id=\'div_spin\' class="fa fa-spinner fa-1x fa-spin loader"></i>');	
				beforeSend: function () {
				    
				},
				success: function (res) {
                    container.append(res);

                    $(".get_form_js").hide();

                    container.parent().find("span").last().hide();
                }
				
			});
            return false;
        });




        

        $(document).off("click", ".form_js_submit").on("click", ".form_js_submit", function (e)

        { e.preventDefault();
       
            var container=$(this).closest('.container_form');
            var input=container.find('input');
            console.log(input);

            var form_type=input.attr('type_input');

           
          var valeur_id_element= input.attr('champ_val');
            
            var champ_id= input.attr('champ_id');
            var champ_saved=input.attr('name');
            var table=input.attr('table');
            var adresse="<?php echo base_url();?><?php echo $this->session->userdata("lg");?>/listelangues/submit_pencil_form";
            var value=input.val();



            var datastring = "table="+table+"&form_type="+form_type+"&champ_saved="+champ_saved+"&champ_id="+champ_id+"&id="+valeur_id_element+"&value="+value;
	
            
            jQuery.ajax({
				type: 'POST',
				url: adresse,
				data: datastring,
				// dataType: 'json',
				cache: false,
				// contentType: false,
				// processData: false, 
                // elem.html(' <i id=\'div_spin\' class="fa fa-spinner fa-1x fa-spin loader"></i>');	
				beforeSend: function () {
				    
				},
				success: function (res) {
                 $('form').remove();
                 location.reload();
                }
				
			});


        });

        $(document).off("click", ".update_table").on("click", ".update_table", function (e){
            e.preventDefault();
            var adresse=$(this).attr('action');
            var bt=$(this);
            jQuery.ajax({
				type: 'POST',
				url: adresse,
				
				dataType: 'json',
				cache: false,
				// contentType: false,
				// processData: false, 
                // elem.html(' <i id=\'div_spin\' class="fa fa-spinner fa-1x fa-spin loader"></i>');	
				beforeSend: function () {
                    bt.html(' <i id=\'div_spin\' class="fa fa-spinner fa-1x fa-spin loader"></i>');	
				},
				success: function (res) {
                    bt.html(' Fichier généré');	
                    // alert();
                // if (res.result==='success'){
                    // $('.retour_action').removeClass('d-none');
                // }
                }
				
			});
        });
        $(document).off("click", ".bt_plus").on("click", ".bt_plus", function (e){
            e.preventDefault();
            var adresse= "<?php echo base_url();?><?php echo $this->session->userdata("lg");?>/listelangues/td_plus?type=fichiers";
           var data= $('.td_plus').serialize();
           var bt=$(this);
          
            jQuery.ajax({
				type: 'POST',
				url: adresse,
                async: false,
				data:data,
				dataType: 'json',
				cache: false,
				// contentType: false,
				// processData: false, 
                // 
				beforeSend: function () {
				    bt.html(' <i id=\'div_spin\' class="fa fa-spinner fa-1x fa-spin loader"></i>');	
				},
				success: function (res) {
                    if (res.result ==='success'){
                    bt.html(' ajouté');	}
                }
				
			});
            return false;
        });

});
    
</script>