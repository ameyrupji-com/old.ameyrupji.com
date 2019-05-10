
var slider4 = new Swipe(document.getElementById('slider4'),{
	callback: function(e, pos) {
		var i = bulletsNews.length;
		while (i--) {
			bulletsNews[i].className = ' ';
		}
		bulletsNews[pos].className = 'on';
	}
}),
bulletsNews = document.getElementById('slider-position-news').getElementsByTagName('em');


var slider5 = new Swipe(document.getElementById('slider5') , {
	speed: 400,
	callback: function(e, pos) {
		var i = bulletsRev.length;
		while (i--) {
			bulletsRev[i].className = ' ';
		}
		bulletsRev[pos].className = 'on';
	}
}),
bulletsRev = document.getElementById('slider-position-reviews').getElementsByTagName('em');


var slider6 = new Swipe(document.getElementById('slider6'), {
	callback: function(e, pos) {
		var i = bulletsLtstPhones.length;
		while (i--) {
			bulletsLtstPhones[i].className = ' ';
		}
		bulletsLtstPhones[pos].className = 'on';
	}
}),
bulletsLtstPhones = document.getElementById('slider-position-latest-phones').getElementsByTagName('em');

var slider7 = new Swipe(document.getElementById('slider7'), {
	callback: function(e, pos) {
		var i = bulletsInStoresNow.length;
		while (i--) {
			bulletsInStoresNow[i].className = ' ';
		}
		bulletsInStoresNow[pos].className = 'on';
	}
}),
bulletsInStoresNow = document.getElementById('slider-position-in-stores').getElementsByTagName('em');


var slider8 = new Swipe(document.getElementById('slider8'),{
    callback: function(e, pos) {
        var i = bulletsBlog.length;
        while (i--) {
            bulletsBlog[i].className = ' ';
        }
        bulletsBlog[pos].className = 'on';
    }
}),
bulletsBlog = document.getElementById('slider-position-blog').getElementsByTagName('em');