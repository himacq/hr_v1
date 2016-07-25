$(document).ready(function(){

  /******* Nice Scroll *******/ 

  // $("html").niceScroll({styler:"fb",cursorcolor:"#a70e13",zindex :"5555"});
  // $("#storytest").niceScroll();
  // $(".modal-open .modal").niceScroll();
  // $("#storytest").getNiceScroll().hide();


	/******** main slider ******/ 
    // x = $('.mainSlider_id');
    // if( x.find("div.item").length <= 1 ){
    //   x.removeClass('mainSlider_id');
    // }      
    var mainslider = $('.mainSlider_id');
    mainslider.owlCarousel({
          rtl:true,
          loop:true,
          nav:true,
          dots:false,    
          autoplay:true,
          autoplayTimeout:7000,
          autoplayHoverPause:true,
          autoplaySpeed:1500,
          navSpeed:1500,
          dotsSpeed:1500,
          dragEndSpeed:1500,
          // navText: ['<i class="uk-icon-angle-right"></i>','<i class="uk-icon-angle-left"></i>'],
          navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',                
          // margin:13,         
          responsive:{
              0:{
                  items:1
              },
              480:{
                  items:1
              },
              767:{
                  items:1
              },
              
              959:{
                  items:1
              }
          }
      });

   /******** end main slider ******/
   /******** start my story section slider *******/ 
 
    $('.myStory_slider').owlCarousel({
          rtl:true,
          loop:true,
          nav:false,
          dots:false,    
          autoplay:true,
          autoplayTimeout:7000,
          autoplayHoverPause:true,
          autoplaySpeed:1500,
          navSpeed:1500,
          dotsSpeed:1500,
          dragEndSpeed:1500,
          // navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
          // animateOut: 'fadeOut',
          // animateIn: 'fadeIn',                
          // margin:13,         
          responsive:{
              0:{
                  items:1
              },
              480:{
                  items:1
              },
              767:{
                  items:1
              },
              
              959:{
                  items:1
              }
          }
      });

   /******** end my story section slider ******/

    /******** start my story section slider *******/ 
    x = $('.quotes_slider_id');
    if( x.find("div.item").length <= 1 ){
      x.removeClass('quotes_slider_id');
    }
    $('.quotes_slider_id').owlCarousel({
          rtl:true,
          loop:true,
          nav:false,
          dots:true,    
          autoplay:true,
          autoplayTimeout:7000,
          autoplayHoverPause:true,
          autoplaySpeed:1500,
          navSpeed:1500,
          dotsSpeed:1500,
          dragEndSpeed:1500,
          // navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
          // animateOut: 'fadeOut',
          // animateIn: 'fadeIn',                
          // margin:13,         
          responsive:{
              0:{
                  items:1
              },
              480:{
                  items:1
              },
              767:{
                  items:1
              },
              
              959:{
                  items:1
              }
          }
      });

   /******** end my story section slider ******/

});