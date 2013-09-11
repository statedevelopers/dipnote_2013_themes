(function ($) {

  $(document).ready(function(event){

    // Menu toggle behavior on mobile
    $(".collapsible-menu").addClass("hidden");
    $("#menu-toggle").click(function ()
      {
        $("#main-menu").slideToggle(300);
      });

    // Search toggle behavior on mobile
    $("#block-search-form").addClass("hidden");
    $("#search-toggle-mobile").click(function ()
      {
        $("#block-search-form").slideToggle(300);
      });

    // Search toggle behavior on tablet and desktop
    $("#search-toggle").click(function ()
      {
        $("#block-search-form").removeClass("hidden")
        var $marginRighty = $("#block-search-form");
        $marginRighty.animate({
          marginRight: parseInt($marginRighty.css('marginRight'),10) === 0 ?
            $marginRighty.outerWidth() :
            0
        });
      });

    $("#menu-toggle-footer").click(function ()
      {
        $(this).addClass("active");
        var $more = $(".zone-footer .collapsible-menu").slideToggle(300);
        $("body").animate({
        scrollTop: $more.offset().top
        }, {
        duration: 1200,
        queue: false
        });
        // $("#main-menu-footer").slideToggle(300);
      });

    // Search toggle behavior on mobile
    $("#block-custom-search-blocks-1").addClass("hidden");
    $("#search-toggle-mobile-footer").click(function ()
      {
        var $more = $("#block-custom-search-blocks-1").slideToggle(300);
        $("body").animate({
        scrollTop: $more.offset().top
        }, {
        duration: 1200,
        queue: false
        });
      //  $("#block-custom-search-blocks-1").slideToggle(300);
      });

    // Search toggle behavior on tablet and desktop
    $("#search-toggle-footer").click(function ()
      {
        $("#block-custom-search-blocks-1").removeClass("hidden")
        var $marginLefty = $("#block-custom-search-blocks-1 .search-form");
        $marginLefty.animate({
          marginLeft: parseInt($marginLefty.css('marginLeft'),10) === 0 ?
            $marginLefty.outerWidth() :
            0
        });
      });

    // Dividing region list into 2-link rows
    var divs = $(".region-list-grid .views-row");
    for(var i = 0; i < divs.length; i+=2) {
      divs.slice(i, i+2).wrapAll("<div class='row'></div>");
    } 

    /**
     * Responsive layout adjustments
     */
    // collapse homepage content on mobile size screens
    // only do this if the screen width is 940 or under
    var exstate;
    function setWidth() {
      var csswidth = $("#zone-content").css("width");
      
      if (csswidth < "690px" && exstate == 'expanded') {
          // Flag state change
          exstate = 'collapsed'; 
          
          // Hide the content area of the blocks
          $(".mobile-collapsible .collapsible-content").slideUp();

          
          // Attach a click handler to the h2 title
          $(".mobile-collapsible .mobile-header").bind('click', function() {
            $(this).toggleClass('expanded')
            $(this).nextAll(".collapsible-content").slideToggle(400);
          });

          // $(".front .region-graphics .map-tile").slideUp();

          // $(".front .region-graphics .mobile-header").bind('click', function() {
          //   $(this).toggleClass('expanded')
          //   $(this).next(".map-tile").slideToggle(400);
          // });

      }
      else {
        if(csswidth >= "690px" && exstate == 'collapsed') {
          // Flag state change
          exstate = 'expanded';
          
          $(".mobile-collapsible .mobile-header").removeClass('expanded');
          $(".mobile-collapsible .collapsible-content").slideDown();
          $(".mobile-collapsible .mobile-header").unbind('click');
          $("#comments .collapsible-content.comment-form").slideUp();

          $("#comments h3.comment-form").bind('click', function()
          {
            $(this).next(".collapsible-content").slideToggle(400);
            
          });
        }
      }
    }
    
    //Define initial state, but backwards so the appropriate actions can trigger
    if ($("#zone-content").css("width") < "690px") {
      exstate = 'expanded';
    }
    else {
      exstate = 'collapsed';
    }
    //modify the loaded page appropriately
    setWidth();
    
    //Attach the setWidth behavior to the browser's resize event
    $(window).resize(setWidth);

    $(".youtube-pull-listing .youtube-pull-item:nth-child(2n), .flickr .content a:nth-child(2n)").addClass("even");

  }); // End document ready
  
  $(window).load(function() {
  }); // End window load

  $(window).resize(function() {
  }); // End window resize

  // End custom jQuery wrapper
}) (jQuery);
