$(document).ready(function(){
		$.fn.extend({
			cachebody: $('html, body'),
			scrollTo: function(){
				cachebody.animate({
      		scrollTop: this.offset().top
     		}, 1000);
			}
		});

		function Accordion(selector){
		this.accordion = $(selector);
		this.items = [];

		this.getItems = function(items, handle, panel){
			var items = $(items);
			for (var i = 0; i < items.length; i++) {
				this.items.push(new AccItem(items[i], handle, panel, this));
			};
			$(window).bind("resize", {obj: this}, function(e){
				for (var i = e.data.obj.items.length - 1; i >= 0; i--) {
					if(e.data.obj.items[i].active) e.data.obj.items[i].recalculateHeight();
				};
			});
		}
	}

	function AccItem(item, handle, panel, obj){
		this.item = $(item);
		this.handle = this.item.find(handle).first();
		this.panel = this.item.find(panel).first();
		this.active = false;
		this.parentObj = obj;
		this.download = false;

		this.getItems = function(handle, formular){
			this.download = (this.item.find(handle).length > 0) ? new DownloadItem(handle, formular, this) : false;
		}

		this.toggleActive = function(){
			if(this.active){
				if(this.download && this.download.active) this.download.toggleActive();
				this.panel.removeClass("active");
				this.panel.css("height", "");
			}else{
				var h = this.getPanelHeight();
				this.panel.addClass("active");
				this.panel.css("height", h);
			}
			this.handle.toggleClass("active");
			this.active = this.active ? false : true;
		};

		this.getPanelHeight = function(){
			return this.panel.find(".acc-info").height();
		}

		this.getFormHeight = function(){
			return this.panel.find(".d-form > div").height();
		}

		this.recalculateHeight = function(){
			var f = (this.download && this.download.active) ? this.getFormHeight() : 0;
			this.panel.css("height", this.getPanelHeight() + f);
		}

		this.handle.bind("click", {obj: this}, function(e){
			e.data.obj.toggleActive();
		});
	}

	DownloadItem = function(handle, formular, obj){
		this.parentObj = obj;
		this.item = $(obj.item);
		this.handle = $(handle, this.item);
		this.formular = this.item.find(formular).first();
		this.active = false;

		this.toggleActive = function(){
			if(this.active){
				var h = this.parentObj.getPanelHeight();
				this.formular.removeClass("active");
				this.parentObj.panel.css("height", h);
				this.item.scrollTo();
			}else{
				var h = (this.parentObj.getPanelHeight() + this.parentObj.getFormHeight());
				this.formular.addClass("active");
				this.parentObj.panel.css("height", h);
				this.formular.scrollTo();
			}
			this.active = this.active ? false : true;
		};

		for (var i = this.handle.length - 1; i >= 0; i--) {
			this.handle.eq(i).bind("click", {obj: this}, function(e){
				e.data.obj.toggleActive();
			});
		};
	}


	var accordion = new Accordion(".accordion");
	accordion.getItems(".acc-item", ".acc-handle", ".acc-panel");
	for (var i = accordion.items.length - 1; i >= 0; i--) {
		accordion.items[i].getItems(".d-handle", ".d-form");
	};


	console.log(accordion);

	//Download Weiterleitung
	//Mark
	function markupdate(){
		var mark = $("mark.download > span");
		switch (mark.html().length){
			case 1:
				mark.html("..");
				break;
			case 2:
				mark.html("...");
				break;
			case 3:
				mark.html(".");
				break;
		}
		console.log(mark.html());
		setTimeout(markupdate,500);
	}

	$(".d-refer").click(function(e){
		e.preventDefault();
		markupdate();
		$(this).parents("table").find(".is-vishidden").last().removeClass("is-vishidden");
		var url = this.href
		setTimeout(function(){
			window.location=url;
		}, 2000);
	});

	//Hashverarbeitung
	var cachebody = $('html, body');
	switch(window.location.hash){
		case "#kor01data":
			accordion.items[0].toggleActive();
			accordion.items[0].download.toggleActive();
			accordion.items[0].download.formular.scrollTo();
			break;
		case "#kor05data":
			accordion.items[4].toggleActive();
			accordion.items[4].download.toggleActive();
			accordion.items[4].download.formular.scrollTo();
			break;
		default:
			$("#"+window.location.hash.substring(2)).scrollTo();
	}

});
