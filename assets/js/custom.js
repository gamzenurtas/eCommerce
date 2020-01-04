/*
 * Custom code goes here.
 * A template should always ship with an empty custom.js
 */
/* click change colum */
$(document).ready(function(){
    if ($('.wow').length != 0){
        var wow = new WOW({
                boxClass:     'wow',      // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset:       0,          // distance to the element when triggering the animation (default is 0)
                mobile:       false        // trigger animations on mobile devices (true is default)
              });
            wow.init();
    }
});

(function( $ ) {
	"use strict";

$.fn.ImagesLoaded = function( callback ) {
	var JAS_Images = function ( src, callback ) {
		var img = new Image;
		img.onload = callback;
		img.src = src;
	}
	var images = this.find( 'img' ).toArray().map( function( el ) {
		return el.src;
	});
	var loaded = 0;
	$( images ).each(function( i, src ) {
		JAS_Images( src, function() {
			loaded++;
			if ( loaded == images.length ) {
				callback();
			}
		})
	})
}
})( jQuery );
$(function() {
    
    /*paste code at here*/
    $(window).load(function(){
       if ($('.open_new_tab').length > 0 ) {
            $('.open_new_tab > a').attr('target','_blank');
       }
    });
    /*end code*/
     if($('.header-fixed').length > 0 && pg_header_sticky==true)
     {
        var sticky_navigation_offset_top = $('.header-fixed').offset().top;
        var headerFloatingHeight = $('.header-fixed').height();
        var sticky_navigation = function(){
            var scroll_top = $(window).scrollTop(); 
            if (scroll_top > sticky_navigation_offset_top) {
                $('.header-fixed').addClass('scroll_heading');
                $('#header').css({'margin-bottom':''+headerFloatingHeight+'px'});
            } else {
                $('.header-fixed').removeClass('scroll_heading');
                $('#header').css({'margin-bottom':'0px'});
                
            } 
        };
        sticky_navigation();
        $(window).scroll(function() {
             sticky_navigation();
        });
     }
});

$(document).ready(function(){
//	$(document).on('click','.p_r',function(){
//        updateDisplayProductList($(this).attr('data-num'));
//        
//	});
    $(document).on('click','.p-video',function(e){
        $('.popup_show_video').addClass('open');
	});
    $(document).on('click','.p-video',function(e){
        $('.popup_show_video').removeClass('open');
	});
    var height_logo1 = $('#header img.logo').height();
    if (height_logo1 > 60){
        $('.header_logo .logo > .block-content').css('height','auto');
    }
    $(window).load(function() {
        var height_logo = $('#header img.logo').height();
        if (height_logo > 60){
            $('.header_logo .logo > .block-content').css('height','auto');
        }
        if ($('.pg_loading_page').length > 0){
            $('.pg_loading_page').removeClass('active');
        }
        
    });
    
    
    
    
    
    $(document).on('click','.tab-wrapper .nav-item .nav-link:not(.active)',function(){
        $('.tab-wrapper .nav-item .nav-link').removeClass('active');
        $(this).addClass('active');
    });
    /*if ( ){
        $('.header_logo .logo > .block-content').
    }*/
    $(document).on('click','.close_quickshop',function(){
       $(this).parent().removeClass('opened'); 
    });
    
    $(document).on('click','.pg_button_quickshop',function(){
       $(this).parents('.product-item-control').next('.pg_attr_quickshop').addClass('opened'); 
    });
    wcInitSidebarFilter();
    $(document).on('click','.load_more_link',function(){
        $('.loading').show();
        $(this).hide();
        var url_link = $(this).attr('href');
        $.ajax({
			type: 'GET',
			headers: { "cache-control": "no-cache" },
			url: url_link,
			async: true,
			cache: false,
            data:'load_more_link=1',
			dataType : "json",
			success: function(jsonData,textStatus,jqXHR)
			{
			     $('.loading').hide();
                 $('#js-product-loadmore-list').html(jsonData.rendered_products);
                 var product_loadmore_list =$('#js-product-loadmore-list .products.row').html();
                 var panigation_html = $('#js-product-loadmore-list .pagination').html();
                 $('#js-product-loadmore-list').html('');
                 if ( $( '.products' ).hasClass( 'product-masonry-list' ) ) {
                    $('.product-masonry-list').revealItems($(product_loadmore_list));
                 }
                 else
                    $('#js-product-list > .products.row').append(product_loadmore_list);
                 $('#js-product-list > .pagination').html(panigation_html);
                                  
                 var _products = $( '.products .product-miniature' ),
                _col      = $('.wc-col-switch a.active').data( 'col' ),
                _sizer    = $( '.products .grid-sizer' );
                _products.removeClass( 'col-md-2 col-md-3 col-md-4 col-md-6 metro_half_width' ).addClass( 'col-md-' + _col );
                _sizer.removeClass( 'size-2 size-3 size-4 size-6 size-12' ).addClass( 'size-' + _col ); 
                if(_col==3)            
                    $('.product_list_metro .products .product-miniature:nth-child(8n + 2)').removeClass('col-md-3').addClass('col-md-6'); 
                if ( $( '.product_list_metro .products' ).hasClass( 'product-masonry-list') ) {
                    initMasonryList();
                }
			},
			error: function(XMLHttpRequest, textStatus, errorThrown)
			{
				
			}
            
        });
        return false;
   });
    if ($('#header.vertical_header').length != ''){
        $('#wrapper').addClass('vertical_maincontent');
        $('body').addClass('layout_vertical_header');
    }
    
    if ($('#index .product_masonry').length != 0){
        $('.product_masonry .product-miniature').each(function(){
            var heightVarriant = $(this).find('.product-list-variants').height() + 5;
            $(this).find('.product-description.product-infor').css({'bottom':heightVarriant+'px'});
        });
    }
  
  // Init masonry layout
      resizeNavBar();
      

        if ($('.product_masonry').length != ""){
            $('.product_masonry .products .product-miniature:nth-child(8n + 2)').addClass('col-md-6 col-sm-4');
            $( this ).imagesLoaded( function() {
                $('.product_masonry .products').isotope({
                    itemSelector: ".product_masonry .products .product-miniature",
                    layoutMode:"masonry",
                    stagger:30,
                    percentPosition: true,
                    
                });
            });
        }
        if($(window).width()<992){
            resizeNavBar();
        }
    
$(window).resize(function(){
   resizeNavBar();
});  
  
  
  
  
  
  if($('.product-accessories').length)
    {
        $('.product-accessories .products').owlCarousel({
        items: 4, 
        loop: true, 
        center: false, 
        margin: 30, 
        autoWidth: false, 
        rtl: false, 
        autoHeight: false, 
        autoplay: true, 
        autoplayTimeout: 5000, 
        autoplayHoverPause: true,
        nav: true, 
        dots: false, 
        navText: '',
        navElement: 'button',
        navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
        responsive: {
            0 : {items: 1, loop: true}, 
            479 : {items: 2, loop: $('.product-accessories .products li').length > 2}, 
            768 : {items: 3, loop: $('.product-accessories .products li').length > 3}, 
            992 : {items: 4, loop: $('.product-accessories .products li').length > 4}
            },
      });
    }
    
    if($('.panel-list-item-breadcrumb').length)
    {
        $('.panel-list-item-breadcrumb').owlCarousel({
        items: 3, 
        loop: true, 
        center: false, 
        autoWidth: false, 
        rtl: false, 
        autoHeight: false, 
        autoplay: true, 
        autoplayTimeout: 5000, 
        autoplayHoverPause: true,
        nav: true, 
        dots: false, 
        navText: '',
        navElement: 'button',
        navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
        responsive: {
            0 : {items: 1, loop: true}, 
            479 : {items: 2, loop: $('.panel-list-item-breadcrumb .panel-item-breadcrumb').length > 2}, 
            768 : {items: 3, loop: $('.panel-list-item-breadcrumb .panel-item-breadcrumb').length > 3}, 
            992 : {items: 3, loop: $('.panel-list-item-breadcrumb .panel-item-breadcrumb').length > 3}
            },
      });
    }
    
    if($('.owl-col-4').length)
    {
        $('.owl-col-4 .products').owlCarousel({
        items: 4, 
        loop: true, 
        center: false, 
        margin: 30, 
        autoWidth: false, 
        rtl: false, 
        autoHeight: false, 
        autoplay: true, 
        autoplayTimeout: 5000, 
        autoplayHoverPause: true,
        nav: true, 
        dots: false, 
        navText: '',
        navElement: 'button',
        navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
        responsive: {
            0 : {items: 1, loop: true}, 
            479 : {items: 2, loop: $('.owl-col-4 .products li').length > 2}, 
            768 : {items: 3, loop: $('.owl-col-4 .products li').length > 3}, 
            992 : {items: 4, loop: $('.owl-col-4 .products li').length > 4}
            },
      });
    }
    if($('.owl-col-6').length)
    {
        $('.owl-col-6 .products').owlCarousel({
        items: 6, 
        loop: true, 
        center: false, 
        margin: 30, 
        autoWidth: false, 
        rtl: false, 
        autoHeight: false, 
        autoplay: true, 
        autoplayTimeout: 5000, 
        autoplayHoverPause: true,
        nav: true, 
        dots: false, 
        navText: '',
        navElement: 'button',
        navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
        responsive: {
            0 : {items: 1, loop: true}, 
            479 : {items: 2, loop: $('.owl-col-6 .products li').length > 2}, 
            768 : {items: 3, loop: $('.owl-col-6 .products li').length > 3}, 
            992 : {items: 5, loop: $('.owl-col-6 .products li').length > 5},
            1200 : {items: 6, loop: $('.owl-col-6 .products li').length > 6}
            },
      });
    }
    if($('#tab-content-products').length)
    {
        $('.tab-content .product_carousel').owlCarousel({
        items: 4, 
        loop: true, 
        center: false, 
        margin: 30, 
        autoWidth: false, 
        rtl: false, 
        autoHeight: false, 
        autoplay: false, 
        autoplayTimeout: 5000, 
        autoplayHoverPause: true,
        nav: true, 
        dots: false, 
        navText: '',
        navElement: 'button',
        navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
        responsive: {
            0 : {items: 1, loop: true}, 
            479 : {items: 2, loop: $('#tab-content-products .product_carousel li').length > 2}, 
            768 : {items: 3, loop: $('#tab-content-products .product_carousel li').length > 3}, 
            992 : {items: 4, loop: $('#tab-content-products .product_carousel li').length > 4}
            },
      });
    }
    if($('.product_sam_category').length)
    {
        $('.product_sam_category .products').owlCarousel({
        items: 4, 
        loop: true, 
        center: false, 
        margin: 30, 
        autoWidth: false, 
        rtl: false, 
        autoHeight: false, 
        autoplay: true, 
        autoplayTimeout: 5000, 
        autoplayHoverPause: true,
        nav: true, 
        dots: false, 
        navText: '',
        navElement: 'button',
        navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
        responsive: {
            0 : {items: 1, loop: true}, 
            479 : {items: 2, loop: $('.product_sam_category .products .product-miniature').length > 2}, 
            768 : {items: 3, loop: $('.product_sam_category .products .product-miniature').length > 3}, 
            992 : {items: 4, loop: $('.product_sam_category .products .product-miniature').length > 4}
            },
      });
    }  
    if($('.articleRelated-list').length)
    {
        $('.articleRelated-list').owlCarousel({
        items: 3, 
        loop: true, 
        center: false, 
        margin: 30, 
        autoWidth: false, 
        rtl: false, 
        autoHeight: false, 
        autoplay: false, 
        autoplayTimeout: 5000, 
        autoplayHoverPause: true,
        nav: true, 
        dots: false, 
        navText: '',
        navElement: 'button',
        navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
        responsive: {
            0 : {items: 1, loop: true}, 
            479 : {items: 2, loop: $('.articleRelated-list .articleRelated-item').length > 2}, 
            768 : {items: 3, loop: $('.articleRelated-list .articleRelated-item').length > 2}, 
            992 : {items: 3, loop: $('.articleRelated-list .articleRelated-item').length > 3}
            },
      });
    }    
   wcInitImageZoom(); 
   
   $(document).on('click','.input-color',function(e) {
        restartElevateZoom();
    });
	$(document).on('click','.js-qv-mask img.thumb',function(e) {
        restartElevateZoom();
    });
    //var myVideo =  iframe.getElementById('myVideo'); 
//    myVideo.setVolume(0);
    
    var initSearchForm = function() {
    	var HS = $( '.header__search' );
    
    	// Open search form
    	$( '.sf-open' ).on( 'click', function( e ) {
    		//e.preventDefault();
    		HS.addClass('show_search');
            $('body').addClass('fixed_search');
    		HS.find('input[type="text"]').focus();
            
    	});
    	$( '#sf-close' ).on( 'click', function( e ) {
    		//e.preventDefault();
    		HS.removeClass('show_search');
            $('body').removeClass('fixed_search');
    	});
    }
    initSearchForm();
    $(window).load(function(){
        masonryBlog();
    });
    
});


function resizeNavBar(){
    if($(window).width()<992)
       {
            if($('#_tablet_language_selector .language-selector-wrapper').length==0)
            {
              $('#_tablet_language_selector').html($('#_desktops_language_selector').html());
              $('#_desktops_language_selector').html('');
              $('#_tablet_currency_selector').html($('#_desktops_currency_selector').html());
              $('#_desktops_currency_selector').html('');  
            }
            if($('#_tablet_social_selector .social').length==0)
            {
              $('#_tablet_social_selector').html($('.section_header .block-social.image-social').html());
              $('.section_header .block-social.image-social').html(''); 
            }
            if($('#_tablet_language_selector .language-selector-wrapper').length==0 && $('#_tablet_currency_selector .currency-selector').length==0)
                $('#content_nav_mobile .currency_language').hide();
       }
       else
       {
            if($('#_desktops_language_selector .language-selector-wrapper').length==0)
            {
                $('#_desktops_language_selector').html($('#_tablet_language_selector').html());
                $('#_tablet_language_selector').html('');
                $('#_desktops_currency_selector').html($('#_tablet_currency_selector').html());
                $('#_tablet_currency_selector').html(''); 
            }
            if($('.section_header .block-social.image-social .social').length==0)
            {
              $('.section_header .block-social.image-social').html($('#_tablet_social_selector').html());
              $('#_tablet_social_selector').html(''); 
            }
       }
}
    
function wcInitSidebarFilter() {
		$(document).on( 'click', '.filter-trigger', function(e) {
			$( '#search_filters_wrapper' ).toggleClass( 'opened' );
			
            $( '#sf-close' ).on( 'click', function() {
				$( '#search_filters_wrapper' ).removeClass( 'opened' );
			});
			e.preventDefault();
		});
        $(document).on( 'click','.close-filter', function(e) {
			$( '#search_filters_wrapper' ).removeClass( 'opened' );
		});
        $( '#sf-close' ).on( 'click', function() {
			$( '#search_filters_wrapper' ).removeClass( 'opened' );
		});
	}
function wcInitImageZoom(){
    if ( $('body.img_zoom_whenhover .product-cover').length > 0 ) {
        var img = $('body.img_zoom_whenhover .product-cover'), img_src = $('body.img_zoom_whenhover .product-cover').data( 'src' );
        img.zoom({
            touch: false,
            url: img_src
        });
    }
    if ( $('body.img_zoom_whenhover .js-qv-product-images-thumb').length > 0 ) {
        var img = $('body.img_zoom_whenhover .js-qv-product-images-thumb .thumb-container'), img_src = $('body.img_zoom_whenhover .js-qv-product-images-thumb .thumb-container').data( 'src' );
        img.zoom({
            touch: false,
            url: img_src
        });
    }
    if ( $('body.img_zoom_whenhover .images-container-sticky2').length > 0 ) {
        var img = $('body.img_zoom_whenhover .images-container-sticky2 .thumb-container'), img_src = $('body.img_zoom_whenhover .images-container-sticky2 .thumb-container').data( 'src' );
        img.zoom({
            touch: false,
            url: img_src
        });
    }
    if ( $('body.img_zoom_whenhover .images-container-thumboutside').length > 0 ) {
        var img = $('body.img_zoom_whenhover .images-container-thumboutside .thumb-container'), img_src = $('body.img_zoom_whenhover .images-container-thumboutside .thumb-container').data( 'src' );
        img.zoom({
            touch: false,
            url: img_src
        });
    }
    if ( $('body.img_zoom_whenhover .images-container-img-swatch-hoz').length > 0 ) {
        var img = $('body.img_zoom_whenhover .images-container-img-swatch-hoz .product-images-big .thumb-container'), img_src = $('body.img_zoom_whenhover .images-container-img-swatch-hoz .product-images-big .thumb-container').data( 'src' );
        img.zoom({
            touch: false,
            url: img_src
        });
    }
    if ( $('body.img_zoom_whenhover .images-container-img-swatch-ver').length > 0 ) {
        var img = $('body.img_zoom_whenhover .images-container-img-swatch-ver .product-images-big .thumb-container'), img_src = $('body.img_zoom_whenhover .images-container-img-swatch-ver .product-images-big .thumb-container').data( 'src' );
        img.zoom({
            touch: false,
            url: img_src
        });
    }
} 
function restartElevateZoom(){
	$(".zoomImg").remove();
	wcInitImageZoom();
}
function setCookie(cname, cvalue, exdays)
{
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 *60 * 1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname)
{
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++){
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}

function wcInitSwitchLayout() {
	$( 'body' ).on( 'click', '.wc-col-switch a', function(e) {
		e.preventDefault();
		var _this     = $( this ),
			_col      = _this.data( 'col' ),
			_parent   = _this.closest( '.wc-col-switch' ),
			_products = $( '.products .product-miniature' ),
			_sizer    = $( '.products .grid-sizer' );

		if ( _this.hasClass( 'active' ) ) {
			return;
		}
        
		_parent.find( 'a' ).removeClass( 'active' );
		_this.addClass( 'active' );

		_products.removeClass( 'col-md-2 col-md-3 col-md-4 col-md-6 metro_half_width' ).addClass( 'col-md-' + _col );
		_sizer.removeClass( 'size-2 size-3 size-4 size-6 size-12' ).addClass( 'size-' + _col )
       if(_col==3)            
            $('.product_list_metro .products .product-miniature:nth-child(8n + 2)').removeClass('col-md-3').addClass('col-md-6');     
		if ( $( '.products' ).hasClass( 'product-masonry-list' ) ) {
		  setTimeout(function(){ initMasonryList(); }, 200);        
		}
	});
    if($('.wc-col-switch a.active').length>0)
    {
         var _col      = $('.wc-col-switch a.active').data( 'col' ),
    		_products = $( '.products .product-miniature' ),
    		_sizer    = $( '.products .grid-sizer' );
    	   _products.removeClass( 'col-md-2 col-md-3 col-md-4 col-md-6 metro_half_width' ).addClass( 'col-md-' + _col );
    	   _sizer.removeClass( 'size-2 size-3 size-4 size-6 size-12' ).addClass( 'size-' + _col )
            if(_col==3)            
                $('.product_list_metro .products .product-miniature:nth-child(8n + 2)').removeClass('col-md-3').addClass('col-md-6');     
    	   if ( $( '.product_list_metro .products' ).hasClass( 'product-masonry-list' ) ) {
    	       setTimeout(function(){ initMasonryList(); }, 200);        
    	}
    }
   
}
function initMasonryList(){
	var el = $('.product-masonry-list');
	el.each( function( i, val ) {
		var _option = $( this ).data( 'masonry-metro');
		if ( _option !== undefined ) {
			var _selector = _option.selector,
				_width    = _option.columnWidth,
				_layout   = _option.layoutMode;

			$( this ).imagesLoaded( function() {
				$( val ).isotope( {
					layoutMode : _layout,
					itemSelector: _selector,
					percentPosition: true,
					masonry: {
						columnWidth: _width
					}
				} );
			});
		}
	});
}

function masonryBlog(){
	$( '.jas-masonry-blog' ).isotope( {
		selector: ".panel-blog-type-masonry", 
        columnWidth: ".grid-sizer-blog", 
        layoutMode: "masonry",
	} );
}

function masonryBlog1(){
    var t = $(".jas-masonry-blog"),
        n = {
            itemSelector: ".panel-blog-type-masonry",
            percentPosition: !0,
            layoutMode: "masonry",
            stagger: 30,
            masonry: {
                columnWidth: ".grid-sizer-blog"
            }
        };
    t.length > 0 && t.each(function() {
        var t = $(this).data("grid"),
            a = $.extend({}, n, t),
            i = $(this).find(".grid"),
            o = $(this).find("[data-filter]"),
            s = i.isotope(a);
        s.imagesLoaded().progress(function() {
                s.isotope("layout")
            }),
            o.on("click", function(t) {
                t.preventDefault();
                var n = $(this).data("filter"),
                    a = o.parent(),
                    s = $(this).parent();
                a.removeClass("active"),
                    s.addClass("active"),
                    i.isotope({
                        filter: n
                    })
            })
    })
}
function updateDisplayProductList(product_num_row){
    /*$('.p_r').removeClass('active');
    switch(parseInt(product_num_row)) {
        case 1:
                $('.product-miniature').addClass('claue-col-md-12');
				$('.product-miniature').removeClass('claue-col-md-2');
				$('.product-miniature').removeClass('claue-col-md-4');
				$('.product-miniature').removeClass('claue-col-md-3');
				$('.product-miniature').removeClass('claue-col-md-6');
                $('.p_r.one').addClass('active');
                setCookie('product_num_row',1,1);
                break;
            case 2:
                $('.product-miniature').addClass('claue-col-md-6');
				$('.product-miniature').removeClass('claue-col-md-2');
				$('.product-miniature').removeClass('claue-col-md-4');
				$('.product-miniature').removeClass('claue-col-md-3');
				$('.product-miniature').removeClass('claue-col-md-12');
                $('.p_r.two').addClass('active');
                setCookie('product_num_row',2,1);
                break;
            case 3:
                $('.product-miniature').addClass('claue-col-md-4');
				$('.product-miniature').removeClass('claue-col-md-3');
				$('.product-miniature').removeClass('claue-col-md-2');
				$('.product-miniature').removeClass('claue-col-md-6');
				$('.product-miniature').removeClass('claue-col-md-12');
                $('.p_r.three').addClass('active');
                setCookie('product_num_row',3,1);
                break;
            case 4:
                $('.product-miniature').addClass('claue-col-md-3');
				$('.product-miniature').removeClass('claue-col-md-4');
				$('.product-miniature').removeClass('claue-col-md-2');
				$('.product-miniature').removeClass('claue-col-md-6');
				$('.product-miniature').removeClass('claue-col-md-12');
                $('.p_r.four').addClass('active');
                setCookie('product_num_row',4,1);
                break;
            case 6:
                $('.product-miniature').addClass('claue-col-md-2');
				$('.product-miniature').removeClass('claue-col-md-3');
				$('.product-miniature').removeClass('claue-col-md-4');
				$('.product-miniature').removeClass('claue-col-md-6');
				$('.product-miniature').removeClass('claue-col-md-12');
                $('.p_r.six').addClass('active');
                setCookie('product_num_row',6,1);
                break;
            default:
                $('.product-miniature').addClass('claue-col-md-3');
				$('.product-miniature').removeClass('claue-col-md-4');
				$('.product-miniature').removeClass('claue-col-md-2');
				$('.product-miniature').removeClass('claue-col-md-6');
				$('.product-miniature').removeClass('claue-col-md-12');
                $('.p_r.four').addClass('active');
                setCookie('product_num_row',4,1);
    } */
}

function backToTop() {
		var el = $( '#jas-backtop' );
		$( window ).scroll(function() {
			if( $( this ).scrollTop() > $( window ).height() ) {
				el.show();
			} else {
				el.hide();
			}
		});
		el.click( function() {
			$( 'body,html' ).animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	}
            
$(document).ready(function(){
    $.fn.revealItems = function($items){
		var iso = this.data('isotope');
		var itemSelector = iso.options.itemSelector;
		$items.hide();
		$(this).append($items);
		$items.imagesLoaded().progress(function(imgLoad, image){
			var $item = $(image.img).parents(itemSelector);
			$item.show();
			iso.appended($item);
		});
		return this;
	}
    var wcInitPopupVideo = function() {
		if ( $( '.p-video' ).length > 0 ) {
			$( '.jas-popup-url' ).magnificPopup({
				disableOn: 0,
				type: 'iframe',
			});

			$( '.jas-popup-mp4' ).magnificPopup({
				disableOn: 0,
				type: 'inline',
			});
		}
	}

    backToTop();
    wcInitSwitchLayout();
    initMasonryList();
    $(window).load(function(){
        if ($('.images-container:not(.images-container-thumboutside-quickview) .product_sticky2_scroll').length != ''){
            $(".images-container:not(.images-container-thumboutside-quickview) .product_sticky2_scroll").stick_in_parent();
            
          }
        if ($('.product_sticky .product_sticky2_scroll').length != ''){
            $(".product_sticky .product_sticky2_scroll").stick_in_parent(); 
        }
        if ($('.product_sticky2 .product_sticky2_scroll').length != ''){
            $(".product_sticky2 .product_sticky2_scroll").stick_in_parent(); 
        }
        
        if($('.panel-instagram .panel-instagram-list').length)
        {
            $('.panel-instagram .panel-instagram-list').owlCarousel({
            items: 6, 
            loop: true, 
            center: false, 
            autoWidth: false, 
            rtl: false, 
            autoHeight: false, 
            autoplay: true, 
            autoplayTimeout: 5000, 
            autoplayHoverPause: true,
            nav: true, 
            dots: false, 
            navText: '',
            navElement: 'button',
            navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
            responsive: {
                0 : {items: 1, loop: true}, 
                479 : {items: 3, loop: $('.sbi_images .sbi_item').length > 2}, 
                768 : {items: 4, loop: $('.sbi_images .sbi_item').length > 3}, 
                992 : {items: 6, loop: $('.sbi_images .sbi_item').length > 5}
                },
          });
        }
    });
});
