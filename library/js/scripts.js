/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * Edited by: Keith Miller
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/

function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function


/*
 * Put all your regular jQuery in here.
*/


jQuery(document).ready(function($) {
  var devDesc = "<h3 class='sectionTitle'>Development</h3><p>Front end development has been my passion for the last four years, and each year my skill with HTML5, CSS, and JavaScript has drastically grown. I’m amazed at how far the technology has come and I’m excited about what amazing products and experiences I can create in the future. </p><p> My experience with backend development mostly involves PHP and MySQL, and accessing APIs such as Twitter, Reddit, and New York Times. I’m also comfortable digging into WordPress to create custom themes. I’ve worked with jQuery Mobile and PhoneGap for Android and I’m currently learning Swift for iOS app development.</p>";
  var uxDesc = "<h3 class='sectionTitle'>User Experience</h3><p>My background with user experience design goes deep into both theory and practice. I’ve worked with creating personas, consulting clients, and conducting qualitative user testing with both paper and digital prototypes.</p><p>Throughout the design process I am driven by empathy for the user, with the ultimate goal of designing for experiences that are not just easy, but also fun to use.</p>";
  var designDesc = "<h3 class='sectionTitle'>Design</h3><p>I do web design, logo design, and more. Both colors and motion should be beautiful and I’m continually honing my eye for detail and cohesiveness in design.</p><p>Regardless of what I’m making my process always starts on paper, getting ideas out quick and dirty to find what might work. Next I bring it into Photoshop or Illustrator to create wireframes. </p><p>Meanwhile I start developing a design language with suitable fonts, colors and shapes. From here I either make a 'style tile' or full mock-ups, depending on the project. Each step of the way comes with iteration and feedback from peers.</p>";
  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();
  console.log(devDesc);
  jQuery ("#skillDesc" ).html(devDesc);
  jQuery(".dev a").on('click', function() {
      jQuery( "#skillDesc" ).html(devDesc);
      jQuery( "#skillArrow" ).removeClass("middleSkill");
      jQuery( "#skillArrow" ).removeClass("rightSkill");
      jQuery( "#skillArrow" ).addClass("leftSkill");
  });
  jQuery(".ux a").on('click', function() {
      jQuery( "#skillDesc" ).html(uxDesc);
      jQuery( "#skillArrow" ).addClass("middleSkill");
      jQuery( "#skillArrow" ).removeClass("rightSkill");
      jQuery( "#skillArrow" ).removeClass("leftSkill");
  });
  jQuery(".design a").on('click', function() {
      jQuery( "#skillDesc" ).html(designDesc);
      jQuery( "#skillArrow" ).removeClass("middleSkill");
      jQuery( "#skillArrow" ).addClass("rightSkill");
      jQuery( "#skillArrow" ).removeClass("leftSkill");
  });
  jQuery('a[title="contact"]').on('click', function() {
      jQuery( ".header" ).toggleClass("tall");
  });
  jQuery('#menuToggle').on('click', function() {
      jQuery( ".header" ).toggleClass("tall");
  });
}); /* end of as page load scripts */
