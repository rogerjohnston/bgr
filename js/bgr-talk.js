jQuery(document).ready(function(){
	
	// Bounce burger on page load
	jQuery('.beef-burger').effect("bounce", { times: 3, distance: 200 }, "slow")
	
	
	// LOCATION PAGE BURGER 
	var locationBurger = [
	   "Wish you were here.",
	   "Follow the red dot if you're hungry.",
	   "Pick me, Pick me",
	   'Ok well I need to get back to sitting here and making your mouth water.',
	   'Maybe we should start "Burgerbook."',
	   "I'm sweet for sweet potato fries.",
	   "I can feel you looking at me.",
	];
	var locationCnt = 0;
	
	jQuery(".store-burger").on('click',function (e) {
		if (locationCnt % 2)
			jQuery('.store-burger').effect("shake", { times: 3, distance: 10, direction: "left" }, "slow");
		else
			jQuery('.store-burger').effect("shake", { times: 3, distance: 10, direction: "up" }, "slow");
			jQuery(".burger-thought").hide();
			jQuery(".burger-thought").text(locationBurger[locationCnt]).fadeIn(500);
			locationCnt++;
		if (locationCnt > 6) locationCnt = 0;
	 });
	 
	 
	// MENU PAGE BEEF BURGER
	var beefBurger = [
	   "Finding flavor like this is like finding a burger in a haystack.",
	   "Everything's bigger in Texas.",
	   "Wrap your hands around this.",
	   'What the guac?',
	   'Gotta go. Here comes the boss.',
	   "I don't appreciate you looking at me like I am a piece of meat.",
	];
	var beefCnt = 0;
	
	jQuery(".beef-burger").on('click',function (e) {
		if (beefCnt % 2)
			jQuery('.beef-burger').effect("shake", { times: 3, distance: 10, direction: "left" }, "slow");
		else
			jQuery('.beef-burger').effect("shake", { times: 3, distance: 10, direction: "up" }, "slow");
			jQuery(".beef-burger-thought p").hide();
			jQuery(".beef-burger-thought p").text(beefBurger[beefCnt]).fadeIn(500);
			beefCnt++;
		if (beefCnt > 5) beefCnt = 0;
	 });
	 
	 // MENU PAGE CHICKEN BURGER
	var chickenBurger = [
	   "That beef ain't got nothing on me.",
	   "My buns are on fire!",
	   "Why so bleu? You're making me crumble!",
	   "Three cheers for the red, white, and bleu",
	   "Don't be chicken, Bring on the heat!",
	   "Check out my crumbles.",
	];
	var chickenCnt = 0;
	
	jQuery(".chicken-burger").on('click',function (e) {
		if (chickenCnt % 2)
			jQuery('.chicken-burger').effect("shake", { times: 3, distance: 10, direction: "left" }, "slow");
		else
			jQuery('.chicken-burger').effect("shake", { times: 3, distance: 10, direction: "up" }, "slow");
			jQuery(".chicken-burger-thought p").hide();
			jQuery(".chicken-burger-thought p").text(chickenBurger[chickenCnt]).fadeIn(500);
			chickenCnt++;
		if (chickenCnt > 5) chickenCnt = 0;
	 });
	 
	 // MENU PAGE SEAFOOD BURGER
	var seafoodBurger = [
	   "I'm like a hot piece of sushi minus the sush and add the AHHHH!",
	   "Who needs a roll when you have a bun?",
	   "I'm a catch!",
	   "Don't mind me. Just sittin' on my pickled cucumbers",
	   "Other burgers aspire to my greatness."
	];
	var seafoodCnt = 0;
	
	jQuery(".seafood-burger").on('click',function (e) {
		if (seafoodCnt % 2)
			jQuery('.seafood-burger').effect("shake", { times: 3, distance: 10, direction: "left" }, "slow");
		else
			jQuery('.seafood-burger').effect("shake", { times: 3, distance: 10, direction: "up" }, "slow");
			jQuery(".seafood-burger-thought p").hide();
			jQuery(".seafood-burger-thought p").text(seafoodBurger[seafoodCnt]).fadeIn(500);
			seafoodCnt++;
		if (seafoodCnt > 4) seafoodCnt = 0;
	 });
	 
	// MENU PAGE TURKEY BURGER
	var turkeyBurger = [
	   "Me? You looking at me?",
	   "Don't call me chicken.",
	   "I work out.",
	   "Do I have avocado on my face?",
	   "Man I'm good.",
	   "I'm The Skinny and I know it.",
	];
	var turkeyCnt = 0;
	
	jQuery(".turkey-burger").on('click',function (e) {
		if (turkeyCnt % 2)
			jQuery('.turkey-burger').effect("shake", { times: 3, distance: 10, direction: "left" }, "slow");
		else
			jQuery('.turkey-burger').effect("shake", { times: 3, distance: 10, direction: "up" }, "slow");
			jQuery(".turkey-burger-thought p").hide();
			jQuery(".turkey-burger-thought p").text(turkeyBurger[turkeyCnt]).fadeIn(500);
			turkeyCnt++;
		if (turkeyCnt > 5) turkeyCnt = 0;
	 });
	 
	// MENU PAGE SLIDERS
	var sliderBurger = [
	   "Lettuce surprise you.",
	   "4 to 1 odds you'll love us.",
	   "Good things come on small buns.",
	   "Slide us into your order.",
	   "Small buns, big taste.",
	   "Whoa! Am I seeing quadruple?",
	];
	var sliderCnt = 0;
	
	jQuery(".slider-4-pack").on('click',function (e) {
		if (sliderCnt % 2)
			jQuery('.slider-4-pack').effect("shake", { times: 3, distance: 10, direction: "left" }, "slow");
		else
			jQuery('.slider-4-pack').effect("shake", { times: 3, distance: 10, direction: "up" }, "slow");
			jQuery(".slider-4-packs-thought p").hide();
			jQuery(".slider-4-packs-thought p").text(sliderBurger[sliderCnt]).fadeIn(500);
			sliderCnt++;
		if (sliderCnt > 5) sliderCnt = 0;
	 });
	 
});