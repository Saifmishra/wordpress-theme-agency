var essb_clicked_lovethis = false; var essb_love_you_message_thanks = "Thank you for loving this."; var essb_love_you_message_loved = "You already love this today."; var essb_lovethis = function(oInstance) { if (essb_clicked_lovethis) { alert(essb_love_you_message_loved); return; } var element = jQuery('.essb_'+oInstance); if (!element.length) { return; } var instance_post_id = jQuery(element).attr("data-essb-postid") || ""; var cookie_set = essb_get_lovecookie("essb_love_"+instance_post_id); if (cookie_set) { alert(essb_love_you_message_loved); return; } if (typeof(essb_settings) != "undefined") { jQuery.post(essb_settings.ajax_url, { 'action': 'essb_love_action', 'post_id': instance_post_id, 'service': 'love', 'nonce': essb_settings.essb3_nonce }, function (data) { if (data) { alert(essb_love_you_message_thanks); }},'json'); } essb_tracking_only('', 'love', oInstance, true); }; var essb_get_lovecookie = function(name) { var value = "; " + document.cookie; var parts = value.split("; " + name + "="); if (parts.length == 2) return parts.pop().split(";").shift(); }; var essb_window = function(oUrl, oService, oInstance) { var element = jQuery('.essb_'+oInstance); var instance_post_id = jQuery(element).attr("data-essb-postid") || ""; var instance_position = jQuery(element).attr("data-essb-position") || ""; var wnd; var w = 800 ; var h = 500; if (oService == "twitter") { w = 500; h= 300; } var left = (screen.width/2)-(w/2); var top = (screen.height/2)-(h/2); if (oService == "twitter") { wnd = window.open( oUrl, "essb_share_window", "height=300,width=500,resizable=1,scrollbars=yes,top="+top+",left="+left ); } else { wnd = window.open( oUrl, "essb_share_window", "height=500,width=800,resizable=1,scrollbars=yes,top="+top+",left="+left ); } if (typeof(essb_settings) != "undefined") { if (essb_settings.essb3_stats) { if (typeof(essb_handle_stats) != "undefined") { essb_handle_stats(oService, instance_post_id, oInstance); } } if (essb_settings.essb3_ga) { essb_ga_tracking(oService, oUrl, instance_position); } } essb_self_postcount(oService, instance_post_id); var pollTimer = window.setInterval(function() { if (wnd.closed !== false) { window.clearInterval(pollTimer); essb_smart_onclose_events(oService, instance_post_id); } }, 200); }; var essb_self_postcount = function(oService, oCountID) { if (typeof(essb_settings) != "undefined") { oCountID = String(oCountID); jQuery.post(essb_settings.ajax_url, { 'action': 'essb_self_postcount', 'post_id': oCountID, 'service': oService, 'nonce': essb_settings.essb3_nonce }, function (data) { if (data) { }},'json'); } }; var essb_smart_onclose_events = function(oService, oPostID) { if (typeof (essbasc_popup_show) == 'function') { essbasc_popup_show(); } if (typeof essb_acs_code == 'function') { essb_acs_code(oService, oPostID); } }; var essb_tracking_only = function(oUrl, oService, oInstance, oAfterShare) { var element = jQuery('.essb_'+oInstance); if (oUrl == "") { oUrl = document.URL; } var instance_post_id = jQuery(element).attr("data-essb-postid") || ""; var instance_position = jQuery(element).attr("data-essb-position") || ""; if (typeof(essb_settings) != "undefined") { if (essb_settings.essb3_stats) { if (typeof(essb_handle_stats) != "undefined") { essb_handle_stats(oService, instance_post_id, oInstance); } } if (essb_settings.essb3_ga) { essb_ga_tracking(oService, oUrl, instance_position); } } essb_self_postcount(oService, instance_post_id); if (oAfterShare) { essb_smart_onclose_events(oService, instance_post_id); } }; var essb_pinterest_picker = function(oInstance) { essb_tracking_only('', 'pinterest', oInstance); var e=document.createElement('script'); e.setAttribute('type','text/javascript'); e.setAttribute('charset','UTF-8'); e.setAttribute('src','//assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e); }; var essb_subscribe_opened={},essb_subscribe_popup_close=function(s){jQuery(".essb-subscribe-form-"+s).fadeOut(400),jQuery(".essb-subscribe-form-overlay-"+s).fadeOut(400)},essb_toggle_subscribe=function(s){if(jQuery(".essb-subscribe-form-"+s).length){jQuery.fn.extend({center:function(){return this.each(function(){var s=(jQuery(window).height()-jQuery(this).outerHeight())/2,e=(jQuery(window).width()-jQuery(this).outerWidth())/2;jQuery(this).css({position:"fixed",margin:0,top:(s>0?s:0)+"px",left:(e>0?e:0)+"px"})})}});var e=jQuery(".essb-subscribe-form-"+s).attr("data-popup")||"";if("1"!=e)jQuery(".essb-subscribe-form-"+s).hasClass("essb-subscribe-opened")?(jQuery(".essb-subscribe-form-"+s).slideUp("fast"),jQuery(".essb-subscribe-form-"+s).removeClass("essb-subscribe-opened")):(jQuery(".essb-subscribe-form-"+s).slideDown("fast"),jQuery(".essb-subscribe-form-"+s).addClass("essb-subscribe-opened"),essb_subscribe_opened[s]||(essb_subscribe_opened[s]=s,essb_tracking_only("","subscribe",s,!0)));else{var r=jQuery(window).width(),b=(jQuery("document").height(),600);b>r&&(b=r-40),jQuery(".essb-subscribe-form-"+s).css({width:b+"px"}),jQuery(".essb-subscribe-form-"+s).center(),jQuery(".essb-subscribe-form-"+s).fadeIn(400),jQuery(".essb-subscribe-form-overlay-"+s).fadeIn(200)}}},essb_ajax_subscribe=function(s){event.preventDefault();var e=jQuery(".essb-subscribe-form-"+s+" #essb-subscribe-from-content-form-mailchimp");if(e.length){var r=jQuery(e).find(".essb-subscribe-form-content-email-field").val(),b=jQuery(e).find(".essb-subscribe-form-content-name-field").length?jQuery(e).find(".essb-subscribe-form-content-name-field").val():"";jQuery(e).find(".submit").prop("disabled",!0),jQuery(e).hide(),jQuery(".essb-subscribe-form-"+s).find(".essb-subscribe-loader").show(),console.log(e.attr("action")),console.log(r+","+b),jQuery.post(e.attr("action"),{mailchimp_email:r,mailchimp_name:b},function(r){console.log("result is "),console.log(r),r&&(console.log(r),"1"==r.code?jQuery(".essb-subscribe-form-"+s).find(".essb-subscribe-form-content-success").show():(jQuery(".essb-subscribe-form-"+s).find(".essb-subscribe-form-content-error").append(": <span>"+r.message+"</span>"),jQuery(".essb-subscribe-form-"+s).find(".essb-subscribe-form-content-error").show()),jQuery(".essb-subscribe-form-"+s).find(".essb-subscribe-loader").hide(),jQuery(e).hide())},"json")}}; 


/* TOC:
 - easy-social-share-buttons-subscribe-http://topseo.haintheme.com/wp-content/plugins/easy-social-share-buttons3/assets/js/essb-subscribe.min.js
*/