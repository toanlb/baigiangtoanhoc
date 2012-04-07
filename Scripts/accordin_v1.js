// JavaScript Document
$(document).ready(function(){
							$('.menu_left .accordion:not(:first)').hide();
							$('.menu_left h3').click(function(){
											$accordion = $(this).next();
											if($accordion.is(':hidden') == true){
												$('.menu_left .accordion').slideUp();
												$accordion.slideDown();
												}else {
													$accordion.slideUp();
												}
															  });
							   })