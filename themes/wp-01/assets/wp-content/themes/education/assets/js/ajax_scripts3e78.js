// JavaScript Document
(function($) {
    "use strict";
	
	$('#coursecategoryselect').on('change', function(e) {
		var group_slug 	= $("#coursecategoryselect").val();
		var select_type = "course_group";
		
		$.ajax({
			type: 'POST',
			data: {
				'action': 'update_course_options_request',
				'slug': group_slug,
				'select_type': select_type,
			},
			url: ajax_obj.ajax_url,
			dataType: 'json',

			beforeSend: function() {
				$('#updatecourses').html("<div class='fa-3x'><i class='fas fa-spinner fa-pulse'></i></div>");
			},
			success: function(response) {
				$('#updatecourses').html(response.options);
				$('#coursetermstable').html("");
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log("Error Thrown: "+errorThrown);
				console.log("Text Status: "+textStatus);
				console.log("XMLHttpRequest: "+MLHttpRequest);
		   }
		});
	});
	
	function wc_update_terms() {
		var course_slug 	= $("#courseselect").val();
		var select_type 	= "course_select";
		
		$.ajax({
			type: 'POST',
			data: {
				'action': 'update_course_terms_table',
				'course_slug': course_slug,
				'select_type': select_type,
			},
			url: ajax_obj.ajax_url,
			dataType: 'json',

			beforeSend: function() {
				$('#coursetermstable').html("<div class='fa-3x'><i class='fas fa-spinner fa-pulse'></i></div>");
			},
			success: function(response) {
            	$('#coursetermstable').html(response.options);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log("Error Thrown: "+errorThrown);
				console.log("Text Status: "+textStatus);
				console.log("XMLHttpRequest: "+MLHttpRequest);
		   }
		});
	}
	
	$(document).on('change', '#courseselect', wc_update_terms);
	
	$(document).on('click', '#registerButtonID', wc_update_terms);
	
	
	$("form[data-async]").on("submit",function(e) {
	  e.preventDefault();
	  return false;
	});
	
	$("form[data-async]").on("forminvalid.zf.abide", function(e,target) {
	  console.log("form is invalid");
	});
	
	$("form[data-async]").on("formvalid.zf.abide", function(e,target) {
		var $form 		= $(this);
		var formData 	= $form.serialize();

		$.ajax({
			type: $form.attr('method'),
			data: formData + '&action=wc_send_message',
			url: ajax_obj.ajax_url,
			dataType: 'json',

			beforeSend: function() {
				$('.form-message').html("<div class='fa-3x'><i class='fas fa-spinner fa-pulse'></i></div>");
			},
			success: function(response) {
				//console.log(response);
				var message 		= response.message;
				var success 		= response.success;

				$('.form-message').html('<div class="callout success" data-closable="slide-out-right">'+message+'<button class="close-button" aria-label="Dismiss alert" type="button" data-close><span aria-hidden="true">&times;</span></button></div>');
				
				if(success == "YES") {
					$form.trigger("reset");	
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log("Error Thrown: "+errorThrown);
				console.log("Text Status: "+textStatus);
				console.log("XMLHttpRequest: "+MLHttpRequest);
		   }
		});
	});
	
		
		
})(jQuery); //jQuery main function ends strict Mode on