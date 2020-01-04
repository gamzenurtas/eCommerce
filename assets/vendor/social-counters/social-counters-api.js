(function($) {
	$.fn.SocialCounter = function(options) {
		var settings = $.extend({
			// These are the defaults.
			facebook_user:'',
			facebook_token:'',
			instagram_user:'',
			instagram_user_sandbox:'',
			instagram_token:'',
			google_plus_id:'',
			google_plus_key:'',
			youtube_user:'',
			youtube_user_square:'',
			youtube_key:'',
			twitch_username:'',
			twitch_client_id:''
		}, options);

		function facebook(){
			//Facebook API
			//60 Day Access Token - Regenerate a new one after two months
			//https://smashballoon.com/custom-facebook-feed/access-token/
			$.ajax({
				url: 'https://graph.facebook.com/v2.8/'+settings.facebook_user,
				dataType: 'json',
				type: 'GET',
				data: {
					access_token:settings.facebook_token,
					fields:'fan_count'
				},
				success: function(data) {
					var followers = parseInt(data.fan_count);
					var k = kFormatter(followers);
					$('.btn-social-counter--fb .btn-social-counter__count-num').append(k);
				}
			});
			$('.btn-social-counter--fb').attr('href','https://facebook.com/'+settings.facebook_user);
		}
		function instagram(){
			//Create access tokens
			//https://www.youtube.com/watch?v=LkuJtIcXR68
			//http://instagram.pixelunion.net
			//http://dmolsen.com/2013/04/05/generating-access-tokens-for-instagram
			//http://ka.lpe.sh/2015/12/24/this-request-requires-scope-public_content-but-this-access-token-is-not-authorized-with-this-scope/
			$.ajax({
				url: 'https://api.instagram.com/v1/users/self/',
				dataType: 'jsonp',
				type: 'GET',
				data: {
					access_token: settings.instagram_token
				},
				success: function(data) {
					var followers = parseInt(data.data.counts.followed_by);
					var k = kFormatter(followers);
					$('.btn-social-counter--instagram .btn-social-counter__count-num').append(k);
				}
			});
			$('.btn-social-counter--instagram').attr('href','https://instagram.com/'+settings.instagram_user);
		}
		function google(){
			//Google+ API
			$.ajax({
				url: 'https://www.googleapis.com/plus/v1/people/' + settings.google_plus_id,
				type: "GET",
				dataType: "json",
				data:{
					key:settings.google_plus_key
				},
				success: function (data) {
					var followers = parseInt(data.circledByCount);
					var k = kFormatter(followers);
					$(".btn-social-counter--gplus .btn-social-counter__count-num").append(k);
				}
			});
			$('.btn-social-counter--gplus').attr('href','https://plus.google.com/'+settings.google_plus_id);
		}
		function twitter(){
			//Twitter API - Requires PHP.
			//References
			//http://stackoverflow.com/questions/17409227/follower-count-number-in-twitter
			//https://github.com/J7mbo/twitter-api-php
			$.ajax({
				url: 'php/twitter/index.php',
				dataType: 'json',
				type: 'GET',
				data:{
					user:settings.twitter_user
				},
				success: function(data) {
					var followers = parseInt(data.followers);
					$('.btn-social-counter--twitter .btn-social-counter__count-num').append(followers).digits();
				}
			});
			$('.btn-social-counter--twitter').attr('href','https://twitter.com/'+settings.twitter_user);
		}
		function youtube(){
			$.ajax({
				url: 'https://www.googleapis.com/youtube/v3/channels',
				dataType: 'jsonp',
				type: 'GET',
				data:{
					part:'statistics',
					id:settings.youtube_user,
					key: settings.youtube_key
				},
				success: function(data) {
					var subscribers = parseInt(data.items[0].statistics.subscriberCount);
					var k = kFormatter(subscribers);
					$('.btn-social-counter--youtube .btn-social-counter__count-num').append(k);
				}
			});
			$('.btn-social-counter--youtube').attr('href','https://youtube.com/channel/'+settings.youtube_user);
		}
		function twitch(){
			$.ajax({
				url: 'https://api.twitch.tv/kraken/channels/'+settings.twitch_username,
				dataType: 'json',
				type: 'GET',
				data:{
					client_id: settings.twitch_client_id
				},
				success: function(data) {
					var followers = parseInt(data.followers);
					var k = kFormatter(followers);
					$('.btn-social-counter--twitch .btn-social-counter__count-num').append(k);
				}
			});
			$('.btn-social-counter--twitch').attr('href','https://www.twitch.tv/'+settings.twitch_username+'/profile');
		}
		//Function to add commas to the thousandths
		$.fn.digits = function(){
			return this.each(function(){
				$(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
			})
		}
		//Function to add K to thousands
		function kFormatter(num) {
			return num > 999 ? (num/1000).toFixed(1) + 'k' : num;
		}
		//Call Functions
		if(settings.facebook_user!='' && settings.facebook_token!=''){
			facebook();
		}
		if(settings.instagram_user!='' && settings.instagram_token!=''){
			instagram();
		}
		if(settings.twitter_user!=''){
			twitter();
		}
		if(settings.google_plus_id!='' && settings.google_plus_key!=''){
			google();
		}
		if(settings.youtube_user!='' && settings.youtube_key!=''){
			youtube();
		}
		if(settings.twitch_username!='' && settings.twitch_client_id!=''){
			twitch();
		}

	};
}(jQuery));
