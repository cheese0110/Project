// Animatables
var shadow = document.querySelector('[data-anim=shadow]'),
	rpl = document.querySelector('[data-anim=ripple]'),
	carrot = document.querySelector('[data-anim=carrot]'),
	icon = document.querySelector('[data-anim=icon]'),
	box = document.querySelector('[data-anim=box]'),
	boxStroke = document.querySelector('[data-anim=box-stroke]'),
	boxMask = document.querySelector('[data-anim=box-mask]'),
	lineGroup = document.querySelector('[data-anim=line-group]'),
	line1 = document.querySelector('[data-anim=line-1]'),
	line2 = document.querySelector('[data-anim=line-2]'),
	cartContent = document.querySelector('[data-anim=cart-content]'),
	cartItems = document.querySelectorAll('[data-anim=cart-item]'),
	cartItemsCarrot = document.querySelectorAll('[data-anim=cart-item-carrot]'),
	cartItemsInfo = document.querySelectorAll('[data-anim=cart-item-info]'),
	coins = document.querySelectorAll('[data-anim=coin]'),
	totItems = document.querySelector('[data-anim=total-items]'),
	numGroup = document.querySelector('[data-anim=num-group]'),
	num2 = document.querySelector('[data-anim=num-2]'),
	num3 = document.querySelector('[data-anim=num-3]');

// Paths
var boxOpen = document.querySelector('[data-path=box-open]'),
	line1Open = document.querySelector('[data-path=line-1-open]'),
	line2Open = document.querySelector('[data-path=line-2-open]');

// Interactive
var iconArea = document.querySelector('[data-click=icon]'),
	btnArea = document.querySelector('[data-click=btn]');

// Storage
var clickOrig,
	itemDest;

// Flags
var isOpen = false;

// Listeners
iconArea.addEventListener('click', iconHandler);
btnArea.addEventListener('click', btnHandler);

// Handlers
function iconHandler(e) {
	isOpen ? toggleCartTl.reverse() : toggleCartTl.play();
	isOpen = !isOpen;
}

function btnHandler(e) {
	var delay = 0.4;
	isOpen ? iconHandler() : delay = 0;
	getAddToCartTl( getClickCoords(e) ).delay(delay).play();
}

// Timelines
function getAddToCartTl(coords) {

	var addToCartTl = new TimelineMax({ paused:true }),
		btnTl = new TimelineMax({ paused:true }),
		itemTl = new TimelineMax({ paused:true }),
		iconTl = new TimelineMax({ paused:true });

	addToCartTl
		.add( btnTl.play(), 0 )
		.add( itemTl.play(), 0 )
		.add( iconTl.play(), 0.5);

	btnTl
		.to(shadow, 0, { autoAlpha:0 }, 0)
		.to(shadow, 0.5, { autoAlpha:1 }, 0)
		.to(ripple, 0, { x: coords.x, y:coords.y }, 0)
		.fromTo(ripple, 0.5, { autoAlpha:0.5, scale: 0,}, { autoAlpha:0, scale: 20, transformOrigin: 'center' }, 0);

	itemTl
		.fromTo(carrot, 0.5, { x: 0 }, { x: 242, ease: Power1.easeInOut },0)
		.fromTo(carrot, 0.5, { y: 0 }, { y:-240, ease: Back.easeIn },0)
		.fromTo(carrot, 0.5, { rotation:0, scale: 1 }, { rotation:-80, scale:0.25, transformOrigin: 'center', ease: Power1.easeInOut },0)
		.fromTo(carrot, 0.05, { autoAlpha:1 }, { autoAlpha:0 }, 0.45);

	iconTl
		.fromTo(num2, 0.15, { y: 0, autoAlpha:1 }, { y: -10, autoAlpha:0 }, 0)
		.fromTo(num3, 0.15, { y: 15, autoAlpha:0 }, { y: 0, autoAlpha:1 }, 0)
		.fromTo([icon, numGroup, lineGroup, boxStroke], 0.15, { y:0 }, { y: -5, ease: Power1.easeOut, repeat:1, yoyo:true }, 0);

	return addToCartTl;
}

var toggleCartTl = new TimelineMax({paused:true}),
	linesTl = new TimelineMax({paused:true}),
	boxTl = new TimelineMax({paused:true}),
	numTl = new TimelineMax({paused:true}),
	contentTl = new TimelineMax({paused:true}),
	toggleDur = 0.4,
	staggerDur = toggleDur*0.05,
	startY = [-300,-250,-200,-150,-100,-50].reverse();

toggleCartTl
	.add( linesTl.play(), 0 )
	.add( boxTl.play(), 0 )
	.add( numTl.play(), 0 )
	.add( contentTl.play(), 0);

linesTl
	.fromTo(line1, toggleDur, { morphSVG:line1}, { morphSVG:line1Open, ease: Power3.easeInOut }, 0)
	.fromTo(line2, toggleDur, { morphSVG:line2}, { morphSVG:line2Open, ease: Power4.easeInOut }, 0);

boxTl
	.fromTo(box, toggleDur, { morphSVG:box}, { morphSVG:boxOpen, ease: Power3.easeInOut }, 0)
	.fromTo(boxStroke, toggleDur, { strokeWidth:3, autoAlpha:1, morphSVG:box}, { strokeWidth:2, autoAlpha:0.5, morphSVG:boxOpen, ease: Power3.easeInOut }, 0)
	.fromTo(boxMask, toggleDur, { morphSVG:box}, { morphSVG:boxOpen, ease: Power3.easeInOut }, 0);

numTl
	.fromTo(numGroup, toggleDur*0.75,{ x:0 }, { x: -8, ease: Power3.easeInOut }, toggleDur*0.25)
	.fromTo(numGroup, toggleDur,{ y:0 }, { y:40, ease: Power3.easeInOut }, 0);

contentTl
	.fromTo(cartContent, toggleDur*0.6, { autoAlpha:0 }, { autoAlpha:1, ease: Power3.easeInOut }, toggleDur*0.4)
	.staggerFromTo(cartItems, toggleDur, { cycle:{ y:startY} }, { y:0, ease: Power3.easeInOut }, -staggerDur, 0)
	.staggerFromTo(cartItems, toggleDur, { x:120 }, { x:0, ease: Power3.easeInOut }, -staggerDur, toggleDur*0.15);

// Functions
function getClickCoords(e) {

	var svgRect = document.querySelector('#add-to-cart').getBoundingClientRect(),
		btnRect = document.querySelector('[data-anim=btn-bg]').getBoundingClientRect(),
		pixelCoordSample = btnRect.left-svgRect.left,
		svgCoordSample = 225.5,
		normFactor = pixelCoordSample/svgCoordSample,
		src = {
			x: e.clientX,
			y: e.clientY,
			xMin: btnRect.left,
			xMax: btnRect.left + btnRect.width,
			yMin: btnRect.top,
			yMax: btnRect.top + btnRect.height
		},		
		rpl = {
			xMin: -(btnRect.width)/2/normFactor,
			xMax: (btnRect.width)/2/normFactor,
			yMin: -(btnRect.height)/2/normFactor,
			yMax: (btnRect.height)/2/normFactor,
			offset: parseInt(ripple.getAttribute('r')),
		};

	var coords = {
		x: map(src.x, src.xMin, src.xMax, rpl.xMin, rpl.xMax) + rpl.offset,
		y: map(src.y, src.yMin, src.yMax, rpl.yMin, rpl.yMax) + rpl.offset
	};
	return coords;
}

// Returns a value on destination range based on the input value on source range
function map(value, sourceMin, sourceMax, destinationMin, destinationMax) {
	return destinationMin + (destinationMax - destinationMin) * ((value - sourceMin) / (sourceMax - sourceMin)) || 0;
}