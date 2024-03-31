<footer>
  <div class="container margin_60_35">
    <div class="row">
      <div class="col-lg-4 col-md-12">
        <p>
          <a href="{{ url('/') }}" title="WYF Plastic Surgery">
            <img src="{{ url('front') }}/img/logo.png" data-retina="true" alt="" width="163" height="36"
              class="img-fluid">
          </a>
        </p>
        <p>WFY Plastic Surgery is one of the renowned medical centers in Delhi offering world-class and most advanced plastic surgeries procedures under the guidance of Dr. Hitesh Gupta.
        </p>
      </div>
      <div class="col-lg-4 col-md-4">
        <h5>Contact with Us</h5>
        <ul class="contacts">
          <li><a href="tel:+918287185897"><i class="icon_mobile"></i> +91-8287 185 897</a></li>
          <li><a href="mailto:info@wfyplasticsurgery.com"><i class="icon_mail_alt"></i> info@wfyplasticsurgery.com</a></li>
          <p><i class="icon_map"></i> B-5/238, Pocket 17, Sector 7, Rohini, Delhi, 110085</p>
        </ul>
        <div class="follow_us">
          <h5>Follow us</h5>
          <ul>
            <li><a href="#0"><i class="social_facebook"></i></a></li>
            <li><a href="#0"><i class="social_twitter"></i></a></li>
            <li><a href="#0"><i class="social_linkedin"></i></a></li>
            <li><a href="#0"><i class="social_instagram"></i></a></li>
            <li><a href="#0"><i class="social_youtube"></i></a></li>
            <li><a href="#0"><i class="social_pinterest"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-4">
        <h5>About</h5>
        <ul class="links">
          <li><a href="{{ url('about-us') }}">About Us</a></li>
          <li><a href="{{ url('before-after') }}">Photos Gallery</a></li>
          <li><a href="{{ url('testimonials') }}">Testimonials</a></li>
          <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
          <li><a href="{{ url('faqs') }}">FAQ's</a></li>
          <li><a href="{{ url('blog') }}">Blog</a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-4">
        <h5>Useful links</h5>
        <ul class="links">
          <li><a href="#0">About Doctor</a></li>
          <li><a href="#0">Facelift Surgery</a></li>
          <li><a href="#0">Hair Transplant</a></li>
          <li><a href="#0">Chin Surgery</a></li>
          <li><a href="#0">Lip Reduction Surgery</a></li>
        </ul>
      </div>
    </div>
    <!--/row-->
    <hr>
    <div class="row">
      <div class="col-md-8">
        <ul id="additional_links">
          <li>Copyright © 2024-25 all rights reserved</li>
          <li><a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
          <li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <div id="copy">© WYF PLASTIC SURGERY INDIA</div>
      </div>
    </div>
  </div>
</footer>
<!--/footer-->
</div>
<!-- page -->

<div id="toTop"></div>
<!-- Back to top button -->

<a href="{{ url('get-free-quote') }}" class="get-inquiry"><span>Book Appointment</span></a>
<!-- Free Quote button -->

<a href="tel:+918287185897" class="live-tele d-lg-none d-md-none d-xl-none d-sm-block d-xs-block"><span>Talk to
    Us</span></a>
<!-- Free Consultations button -->

<!-- COMMON SCRIPTS -->
<script src="{{ url('front') }}/js/jquery-3.6.0.min.js"></script>
<script src="{{ url('front') }}/js/common_scripts.min.js"></script>
<script src="{{ url('front') }}/js/functions.js"></script>
<!-- Zoom -->
<link rel="stylesheet" href="{{ url('front') }}/fancybox/jquery.fancybox.min.css" />
<script src="{{ url('front') }}/fancybox/jquery.fancybox.min.js"></script>
<!-- Zoom End -->
<script>
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
</script>
</body>
</html>
