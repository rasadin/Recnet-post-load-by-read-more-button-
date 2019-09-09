;(function($) {
    "use strict";


    var recentPost = function() {
    var ppp = 3; // Post per page
    var pageNumber = 1;


        function load_posts(){
            pageNumber++;
            var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
            $.ajax({
                type: "POST",
                dataType: "html",
                url: public_localizer.ajax_url,
                data: str,
                
                success: function(data){
                    var $data = $(data);
                    console.log($data.length);
                    if($data.length){
                        
                        $("#ajax-posts").append($data);
                        $("#more_posts").attr("hidden",false);
                    } 

                    // if($data.length>3){
                        
                    //     $("#ajax-posts").append($data);
                    //     $("#more_posts").attr("hidden",false);
                    // } 

                    if ($data.length<3) {
                        $("#more_posts").attr("hidden",true);
                      }

                    //   if ($data.length==3) {
                    //     $("#more_posts").attr("hidden",true);
                    //   }

                    // else{
                    //     $("#more_posts").attr("hidden",true);
                    // }
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }

            });
            return false;
        }

        $("#more_posts").on("click",function(){ // When btn is pressed.
            $("#more_posts").attr("hidden",true); // Disable the button, temp.
            load_posts();
        });
            }
            recentPost();

            
            $(window).on('elementor/frontend/init', function () {
                // elementorFrontend.hooks.addAction('frontend/element_ready/get_name_id.default', js_funtion_var_name);
            });


            
        })(jQuery);





