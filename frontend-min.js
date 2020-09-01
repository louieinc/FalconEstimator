(function($) {
	Fpe.init = function() {
		Fpe.totalsOnScreen();
		$('#to-top').hide();
		$(window).scroll(function() {
			Fpe.totalsOnScreen();
		});

		$('#legal button').click(function() {
		    $('#legal').addClass('hide');
        });
		$('.disclaimer a').click(function (e) {
            e.preventDefault();
            $('#legal').removeClass('hide');
        })

		$('#print-estimation').click(function (e) {
			e.preventDefault();
			window.print();
		});
		
		$('#final input, #final textarea').keyup(function() {
			$('#'+$(this).attr('name')).text($(this).val());
		});

		$('.question').first().show();
		$('.answer:not(.special, .multi)').click(function(event) {
			Fpe.temp = Fpe.next.slice();
			event.preventDefault();
			var set = $(this).data('set');
			if (set) {
			 Fpe.options[set] = $(this).data('value');
			}
			var data = $(this).data();
			for(var i in data){
			 Fpe[i] = data[i];
			}
			var follow = $(this).data('follow');
			if (follow) {
			 follow = follow.split(' ');
			 for(var i in follow) {
				Fpe.next.unshift(follow[i]);
			 }
			}

			if ($(this).text() == 'Continue') {
			 $(this).parents('.question').find('input').each(function() {
				Fpe.options[$(this).attr('name')] = $(this).val();
			 });
			}
			
			Fpe.moveNext();
		});

		$('#fpe .back').click(function (e) {
		e.preventDefault();
		Fpe.moveBack();
		})

		$('.answer.multi').click(function() {
			$(this).toggleClass('checked');
		});

		$('#tv_broadcast .answer.special').click(function() {
			Fpe.broadcast = [];
			Fpe.temp = Fpe.next.slice();
			$('#tv_broadcast .answer.multi.checked').each(function() {
			 Fpe.broadcast.push($(this).data('set'));
			 switch($(this).data('set')) {
				case 'wildspot': 
					Fpe.next.unshift('tv_wildspot_cycles', 'tv_wildspot_markets'); break;
				case 'spanish_wildspot': 
					Fpe.next.unshift('tv_spanish_wildspot_markets'); break;
				case 'program_a': 
					Fpe.next.unshift('tv_program_a_uses_guarantee'); break;
				case 'cable': 
					Fpe.next.unshift('tv_cable'); break;
				case 'local_cable': 
					Fpe.next.unshift('tv_local_cable'); break;
				case 'spanish': Fpe.next.unshift('tv_spanish'); break;
				case 'dealer': 
					Fpe.next.unshift('tv_dealer_type', 'tv_dealer_cycle'); break;
				case 'internet': Fpe.next.unshift('tv_internet_cycle'); break;
				case 'newmedia': Fpe.next.unshift('tv_newmedia_cycle'); break;
				case 'foreign': Fpe.next.unshift('tv_foreign'); break;
			 }
			});
			Fpe.moveNext();
		});

		$('#radio_broadcast .answer.special').click(function() {
			Fpe.broadcast = [];
			$('#radio_broadcast .answer.multi.checked').each(function() {
			 Fpe.broadcast.push($(this).data('set'));
			 switch($(this).data('set')) {
				case 'wildspot': Fpe.next.unshift('radio_wildspot_weeks', 'radio_wildspot_markets', 'radio_wildspot_markets_nonmajor', 'radio_wildspot_cycles', ); break;
				case 'network': Fpe.next.unshift('radio_network_weeks'); break;
				case 'radio_dealer': Fpe.next.unshift('radio_dealer_cycle'); break;
				case 'internet': Fpe.next.unshift('radio_internet_cycle'); break;
				case 'newmedia': Fpe.next.unshift('radio_newmedia_cycle'); break;
				case 'single_market': Fpe.next.unshift('radio_single_market_cycle'); break;
			 }
			});
			Fpe.moveNext();
		});

		$('#nu-performers .answer').click(function(e) {
			e.preventDefault();
			Fpe.temp = Fpe.next.slice();
			Fpe.performers = {};
			$('#nu-performers input').each(function() {
			 if (parseInt($(this).val())) {
				var type = $(this).attr('name');
				Fpe.performers[type] = parseInt($(this).val());
				Fpe.next.unshift('nu-'+type+'-cost', 'nu-'+type+'-wardrobe', 'nu-'+type+'-other', 'nu-'+type+'-reimbursments' );
			 }
			});
			Fpe.moveNext();
		});

		$('#tv_performers .answer').click(function(e) {
			e.preventDefault();
			Fpe.temp = Fpe.next.slice();
			Fpe.performers = {};
			$('#tv_performers input').each(function() {
			 if (parseInt($(this).val())) {
				var type = $(this).attr('name');
				Fpe.performers[type] = parseInt($(this).val());
				switch ($(this).attr('name')) {
					case 'singer': 
						Fpe.next.unshift('tv_singers', 'tv_multitracking', 'tv_sweetening');
						break;
					case 'actor_off_camera':
						Fpe.next.unshift('tv_actor_off_camera_lift1', 'tv_off_camera_tags'); 
						break;
					case 'actor_on_camera':
						Fpe.next.unshift('tv_actor_on_camera_lift1', 'tv_on_camera_tags', 'tv_travel_days_actor_on_camera');
						break;
					case 'stunt_performer':
						Fpe.next.unshift('tv_on_camera_tags', 'tv_travel_days_stunt_performer');
						break;
				}
				Fpe.next.unshift('tv_'+type+'_hours', 'tv_'+type+'_weekend','tv_'+type+'_nightwork','tv_'+type+'_travel');
			 }
			});
			Fpe.moveNext();
		});

		$('#radio_performers .answer').click(function(e) {
			e.preventDefault();
			Fpe.temp = Fpe.next.slice();
			Fpe.performers = {};
			$('#radio_performers input').each(function() {
			 if (parseInt($(this).val())) {
				var type = $(this).attr('name');
				Fpe.performers[type] = parseFloat($(this).val());
				/*if (type == 'creative_session') {
					Fpe.next.unshift('radio_creative_sessions');
				}*/
				//if ($.inArray(type, ['creative_session', 'singers_contractors']) == -1) {
				Fpe.next.unshift('radio_'+type+'_weekend','radio_'+type+'_nightwork','radio_'+type+'_travel');
				//}
			 }
			});
			Fpe.moveNext();
		});

		

		$('.input-answer').keyup(function(e) {
			if (e.which=='13') {
			 Fpe.move($(this));
			 return false;
			}
		});

		$('.numeric-slider').each(function() {
			var min = $(this).data('min') || 0;
			var max = $(this).data('max') || 15;
			var step = $(this).data('step') || 1;
			var value = $(this).siblings('input').val() || 0;
			//console.log('min: '+min);
			//console.log('max: '+max);
			//console.log('value: '+value);
			$(this).slider({
			 min: min,
			 max: max,
			 value: value,
			 step: step,
			 create: function() {
				var handle = $(this).find('.ui-slider-handle').first();
				handle.text($(this).slider('value'));
			 },
			 slide: function(event, ui) {
				var handle = $(this).find('.ui-slider-handle').first();
				handle.text(ui.value);
				$(this).parents('.question').find('input[name="'+$(this).data('update')+'"]').val(ui.value).change();

			 }
			}).bind('updateHandle', function(event, ui) {
			 var value = $(this).slider('value');
			 var handle = $(this).find('.ui-slider-handle').first();
			 handle.text(value);
			 $(this).parents('.question').find('input[name="'+$(this).data('update')+'"]').val(value).change();			 
			});
		});

		function disableSliderTrack($slider){
				$slider.bind("mousedown", function(event){
						return isTouchInSliderHandle($(this), event);	 
				});
				$slider.bind("touchstart", function(event){
						return isTouchInSliderHandle($(this), event.originalEvent.touches[0]);
				});
		}

		function isTouchInSliderHandle($slider, coords){
				var x = coords.pageX;
				var y = coords.pageY;
				var $handle = $slider.find(".ui-slider-handle");
				var left = $handle.offset().left;
				var right = (left + $handle.outerWidth());
				var top = $handle.offset().top;
				var bottom = (top + $handle.outerHeight());
				return (x >= left && x <= right && y >= top && y <= bottom);		
		}

		$('.ui-slider').each(function() {
			disableSliderTrack($(this));
		});
		

		/*$('#navScroller .ui-slider-range').on('touchstart mousedown', function(e) {
			e.stopImmediatePropagation();
			console.log('help');
			return false;
		});*/

		$('#fpe .totals .expand').click(function(e) {
			e.preventDefault();
			$('#fpe .totals .detailed').slideToggle();
		})

		$('#fpe input').on('change keyup', function() {
			Fpe.calculate();
		});

		$('#reset-estimator').click(function (event) {
			event.preventDefault();
			Fpe.performers = {};
			Fpe.options = {};
			$('#fpe').removeClass('ready');
			$('#fpe .back').hide();
			$('#fpe input[type=text]').val('');
			$('#fpe input[type=number]').val(0);
			$('.answer.multi').removeClass('checked');
			$('.numeric-slider').each(function() {
			 $(this).slider('value', $(this).data('default')).trigger('updateHandle');
			 //$(this).data('slider')._change();
			})
			$('#fpe .expand').click();
			Fpe.next = ['commercial-type']
			Fpe.moveNext();
		})

		window.tagInputs = [];
		$('.js-autocomplete').each(function() {
			var el = $(this).tagify({
			 enforceWhitelist: true,
			 whitelist: all_markets,
			 dropdown: {
				enabled: 0,
				maxItems: 100,
			 },
			 mapValueToProp : "code",
			}).on('add', function() {
			 Fpe.calculate();
			 var button = $(this).parents('.minimal-form-input').siblings('.answer');
			 /*if (!button.hasClass('selected')) {
				button.click();
			 }*/
			}).on('remove', function () {
			 Fpe.calculate();
			});
			window.tagInputs.push(el);
		});
		$('.js-autocomplete2').each(function() {
			var el = $(this).tagify({
			 enforceWhitelist: true,
			 whitelist: spanish_markets,
			 dropdown: {
				enabled: 0,
				maxItems: 100,
			 },
			 mapValueToProp : "code",
			}).on('add', function() {
			 Fpe.calculate();
			 var button = $(this).parents('.minimal-form-input').siblings('.answer');
			}).on('remove', function () {
			 Fpe.calculate();
			});
			window.tagInputs.push(el);
		});
	};
	Fpe.moveTo = function(el) {
		$('.question:visible').slideUp({
			complete: function() {
			 Fpe.scrollTo(el);
			}
		});
		el.slideDown();
	}
	Fpe.canGoBack = function () {
		if (Fpe.prev.length == 0) {
			$('#fpe .back').hide();
			Fpe.next = [];
		} else {
			$('#fpe .back').show();
		}
	}
	Fpe.moveBack = function() {
		//Fpe.next.push(Fpe.prev.shift());
		//Fpe.moveNext();
		$('.question:visible').slideUp();
		var prev = Fpe.prev.pop();
		Fpe.next = prev.follow;
		$('#'+prev.id).slideDown(400, function() {
			Fpe.totalsOnScreen();
			Fpe.scrollTo($('.question:visible'));
		});
		Fpe.canGoBack();
	}
	Fpe.moveNext = function() {
		if (Fpe.next.length == 0) {
			console.log('ready');
			$('#fpe .totals').css('position', 'static');
			$('#fpe .expand').click();
			return;
		}
		var id = Fpe.next.shift();
		if (!id) {
			console.log('ready');
			//$('#fpe .totals').css('position', 'static');
			$('#fpe .expand').click();
			return; 
		}
		if (id == 'thank-you') {
			//$('#fpe .totals').css('position', 'static');
			$('#fpe .expand').click();
			$('#fpe').addClass('ready');
		}
		Fpe.prev.push({
			id: $('.question:visible').attr('id'),
			follow: Fpe.temp,
		});
		$('.question:visible').slideUp();
		$('#'+id).slideDown(400, function() {
			Fpe.totalsOnScreen();
			Fpe.scrollTo($('.question:visible'));
		});
		Fpe.calculate();
		Fpe.canGoBack();
	}
	Fpe.move = function(el) {
		if (el.hasClass('selected')) {
			el.removeClass('selected').siblings().slideDown();
			var q = el.parents('.question').nextAll('.question');
			q.slideUp();
			q.find('.answer').removeClass('selected').slideDown();
		} else {
			var show = el.data('show').split(' ');
			var showEl = $('.question#'+show[0]);
			el.addClass('selected');
			el.parents('.question').addClass('answered');
			el.siblings('.answer').removeClass('selected').slideUp({
			 complete: function() {
				Fpe.scrollTo(showEl);
			 }
			});
			
			for (var i=0; i<show.length; i++) {
			 $('.question#'+show[i]).slideDown();
			}
			
		}
		setTimeout(function() {
			Fpe.totalsOnScreen();
		}, 500);
		Fpe.calculate();
	};
	Fpe.scrollTo = function (el) {
		$('html,body').animate({scrollTop: (el.offset().top - 120)});
	}

	Fpe.checkVisible = function( elm, eval ) {
		eval = eval || "visible";
		var vpH = $(window).height(), // Viewport Height
			st = $(window).scrollTop(), // Scroll Top
			y = $(elm).offset().top,
			elementHeight = $(elm).height();
		
		if (eval == "visible") return ((y < (vpH + st)) && (y > (st - elementHeight)));
		if (eval == "above") return ((y < (vpH + st)));
	}

	Fpe.calculate = function() {
		Fpe.totals = $('<div></div>');
		var type = Fpe.type;
		var sessionFees = $('.totals .session-fees');
		var broadcastFees = $('.totals .broadcast-fees');
		$('.totals .session-fees p').remove();
		$('.totals .broadcast-fees').html('');
		$('.totals .other-fees p').remove();
		var subtotal = 0;
		var sessionFeesTotal = 0;
		var broadcastFeesTotal = 0;

		var broadcast = Fpe.getSelected(type+'-broadcast', 'broadcast');
		var internet = Fpe.getSelected(type+'-internet', 'length');
		var onAir =	Fpe.getSelected(type+'-type', 'air');
		var total_actors_cost = 0;

		var total_performers = {};

		sessionFeesTotal = 0;

		if (Fpe.type == 'radio' || Fpe.type == 'tv') {
			// performers session fees for tv and radio
			for(var key in Fpe.performers) {
			 var performer = key;
			 var count = Fpe.performers[key];
			 
			 var costObj = Fpe.getPerformerObject(performer);

			 if (performer == 'creative_session' && count == 0.5) {
				count = 1;
			 }

			 var cost = count*costObj.session;
			 var maxHours = performer == 'actor_off_camera' ? 2 : 8;
			 
			 if (Fpe.type == 'tv' && Fpe.options[key+'_hours']) {
				var hours = Fpe.options[key+'_hours']/maxHours;
				cost = cost * hours;
			 }
			 if (Fpe.type == 'radio' && $.inArray(performer, ['announcer', 'solo_duo', 'group_3', 'group_6', 'group_9']) >= 0) {
				if (Fpe.options['radio_multitracking']) {
					cost - costObj.multitracking;
				}
				if (Fpe.options['radio_sweetening']) {
					cost *= 2;
				}
			 }
			 if (Fpe.options[performer+'_lift2']) {
				cost += costObj.session;
			 }
			 if (Fpe.options[performer+'_weekend'] || Fpe.options[performer+'_weekend_days']) {
				cost += costObj.session * 1.5;
			 }
			 if (Fpe.options[performer+'_nightwork'] && Fpe.options[performer+'_nightwork_hours']) {
				var perHour = costObj.session / maxHours;
				cost += Fpe.options[performer+'_nightwork_hours'] * perHour * 1.1;
			 }
			 if (Fpe.options[performer+'_travel']) {
				cost += parseInt(Fpe.options[performer+'_travel']);
			 }
			 if (performer == 'actor_on_camera' || performer == 'stunt_performer') {
				if (Fpe.options[performer+'_travel_days']) {
					var c = parseInt(Fpe.options[performer+'_travel_days']);
					cost += c*costObj.session
				}
			 }
			 Fpe.putTotal({
				text: Fpe.performers[key]+'x '+Fpe.labels[key],
				value: cost,
				el: sessionFees,
			 });
			 sessionFeesTotal += cost;
			}

			// broadcast for tv and radio
			for(var i in Fpe.broadcast) {
			 airType = Fpe.broadcast[i];
			 var markets = eval($('#'+type+'_'+airType+'_markets [name=markets]').val());
			 console.log(markets);
			 var airTypeText = Fpe.labels[airType];
			 switch (airType) {
				case 'cable':
					if (Fpe.options.cable_units) {
						airTypeText += ' ('+Fpe.options.cable_units+' units)';
					}
					break;
				case 'local_cable':
					if (Fpe.options.local_cable_subscribers) {
						airTypeText += ' - '+Fpe.labels[Fpe.options.local_cable_subscribers];
					}
					break;
				/*case 'wildspot':
				case 'spanish_wildspot':
					if (markets && markets.length > 0) {
						airTypeText += ' ('+Fpe.getMarketsLabels(markets.slice(), (airType=='wildspot' ? all_markets : spanish_markets)).join(', ')+')';
					}
					break;*/
			 }
			 Fpe.putTotal({
				text: airTypeText,
				el: broadcastFees,
			 });

			 if (airType == 'wildspot' || airType == 'spanish_wildspot') {
				 if (markets && markets.length > 0) {
					 var marketsText = 'Markets Selected: '+Fpe.getMarketsLabels(markets.slice(), (airType=='wildspot' ? all_markets : spanish_markets)).join(', ');
					 Fpe.putTotal({
						 'text': marketsText,
						 el: broadcastFees,
					 });
				 }

			 }
			 switch (airType) {
				case 'spanish_wildspot':
				case 'wildspot': 
					//var markets = eval($('#'+type+'_'+airType+'_markets [name=markets]').val());
					var marketValue = 0;
					var primaryMarkets = ['ny', 'chi', 'la'];
					var selectedPrimaryMarkets = [];
					var base = type+'_'+broadcast;

					for (var i in markets) {
						if ($.inArray(markets[i], primaryMarkets) != -1) {
							selectedPrimaryMarkets.push(markets[i]);
						} else {
							if (airType == 'wildspot') {
							 marketValue += costs.wildspot_markets[markets[i]];
							} else {
							 marketValue += costs.spanish_markets_weights[markets[i]];
							}
						}
					}
					if (Fpe.options.markets_nonmajor) {
						marketValue += Fpe.options.markets_nonmajor;
					}
					console.log('selectedPrimaryMarkets: '+selectedPrimaryMarkets);
					console.log('markets: '+markets);

					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (typeof costObj.broadcast == 'undefined') continue;
						if (Fpe.type == 'radio') {
							var wsCost = costObj.broadcast[airType][Fpe.options.wildspot_weeks];
						} else {
							var wsCost = costObj.broadcast[airType];	
						}
						if (wsCost == undefined) continue;

						if (selectedPrimaryMarkets.length == 0) {
							if (airType == 'spanish_wildspot') {
							 var majorFee = wsCost.unit_1
							}
							if (marketValue < 26) {
							 var addl = wsCost.unit_2_25;
							} else {
							 var addl = wsCost.unit_26;
							}
						} else {
							switch(selectedPrimaryMarkets.length) {
							 case 1: 
								var majorFee = wsCost[selectedPrimaryMarkets[0]];
								var addl = wsCost[selectedPrimaryMarkets[0]+'_unit'];
								break;
							 case 2:
								var majorFee = wsCost.major2;
								var addl = wsCost.major2_unit;
								break;
							 case 3:
								var majorFee = wsCost.major3;
								var addl = wsCost.major3_unit;
								break;
							}
						}
					
						if (selectedPrimaryMarkets.length > 0) {
							Fpe.putTotal({
							 text: '1st unit for '+Fpe.performers[performer]+'x '+Fpe.labels[performer],
							 value: majorFee*Fpe.performers[performer],
							 el: broadcastFees,
							});	
							broadcastFeesTotal += majorFee*Fpe.performers[performer];
						}
						if (airType == 'spanish_wildspot') {
							Fpe.putTotal({
							 text: '1st unit for '+Fpe.performers[performer]+'x '+Fpe.labels[performer],
							 value: majorFee*Fpe.performers[performer],
							 el: broadcastFees,
							});	
							broadcastFeesTotal += majorFee*Fpe.performers[performer];
						}
						Fpe.putTotal({
							text: (marketValue-1)+' add\'l units for '+Fpe.performers[performer]+'x '+Fpe.labels[performer]+' at $'+addl,
							value: ((marketValue-1)*Fpe.performers[performer]*addl),
							el: broadcastFees,
						});
					}
					broadcastFeesTotal += ((marketValue-1)*Fpe.performers[performer]*addl);
					break;
				case 'cable':
					var units = Fpe.options.cable_units;
					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (typeof costObj.broadcast == 'undefined') continue;
						var units = parseInt(Fpe.options.cable_units);
						if (typeof units == 'undefined') {
							continue;
						}
						var cost = 0;
						var prev = 0;
						for (var tier in costObj.broadcast.cable.tiers) {
							tier = parseInt(tier);
							var u = costObj.broadcast.cable.tiers[tier];
							console.log('tier: '+tier);
							console.log('u: '+u);
							if (units >= tier ) {
							 cost += (tier-prev)*u;
							} else {
							 cost += (units-prev)*u;
							 if (cost < costObj.broadcast.cable.min) {
								cost = costObj.broadcast.cable.min;
							 }
							 break;
							}
							prev = tier;
						}
						Fpe.putTotal({
							text: Fpe.performers[performer]+'x '+Fpe.labels[performer]+' at $'+cost.toFixed(2),
							value: cost*Fpe.performers[performer],
							el: broadcastFees,
						});	
						broadcastFeesTotal += cost*Fpe.performers[performer];
					}
					break;
				case 'local_cable':
					var subs = Fpe.options.local_cable_subscribers;
					console.log(subs);
					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (typeof costObj.broadcast == 'undefined') continue;
						var cost = costObj.broadcast.local_cable[subs];

						Fpe.putTotal({
							text: Fpe.performers[performer]+'x '+Fpe.labels[performer]+' at $'+cost.toFixed(2),
							value: cost*Fpe.performers[performer],
							el: broadcastFees,
						});	
						broadcastFeesTotal += cost*Fpe.performers[performer];
					}
					break;
				case 'network':
				case 'radio_dealer':
				case 'internet':
				case 'newmedia':
					var cycle = Fpe.options[airType+'_cycle'];
					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (typeof costObj.broadcast == 'undefined') continue;
						var cost = costObj.broadcast[airType][cycle];
						Fpe.putTotal({
							text: Fpe.performers[performer]+'x '+Fpe.labels[performer]+' for '+cycle,
							value: cost*Fpe.performers[performer],
							el: broadcastFees,
						});	
						broadcastFeesTotal += cost*Fpe.performers[performer]; 
					}
					break;
				case 'demo':
				case 'psa':
				case 'theatrical':
				case 'spanish':
					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (typeof costObj.broadcast == 'undefined') continue;
						var cost = costObj.broadcast[airType];
						Fpe.putTotal({
							text: Fpe.performers[performer]+'x '+Fpe.labels[performer],
							value: cost*Fpe.performers[performer],
							el: broadcastFees,
						});	
						broadcastFeesTotal += cost*Fpe.performers[performer]; 
					}
					break;
				case 'foreign':
					var mod = Fpe.options.foreign_modifier;
					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (typeof costObj.broadcast == 'undefined') continue;
						var cost = mod*costObj.session;
						Fpe.putTotal({
							text: Fpe.performers[performer]+'x '+Fpe.labels[performer],
							value: cost*Fpe.performers[performer],
							el: broadcastFees,
						});	
						broadcastFeesTotal += cost*Fpe.performers[performer]; 
					}
					break;
				case 'regional':
				case 'program':
				case 'local': 
				case 'radio_foreign':
				case 'radio_psa':
					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (costObj == undefined) continue;
						if (typeof costObj.broadcast == 'undefined') continue;
						if (typeof costObj.broadcast[airType] == 'undefined') continue;
						var cost = costObj.broadcast[airType];
						Fpe.putTotal({
							text: Fpe.performers[performer]+'x '+Fpe.labels[performer],
							value: cost*Fpe.performers[performer],
							el: broadcastFees,
						});
						broadcastFeesTotal += cost*Fpe.performers[performer]; 
					}
					break;
				case 'dealer': 
					var dealer = Fpe.options.dealer;
					var cycle = Fpe.options.dealer_cycle;
					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (typeof costObj.broadcast == 'undefined') continue;
						var cost = costObj.broadcast[airType][dealer][cycle];
						Fpe.putTotal({
							text: Fpe.performers[performer]+'x '+Fpe.labels[performer]+' for '+dealer+' '+Fpe.labels[cycle],
							value: cost*Fpe.performers[performer],
							el: broadcastFees,
						});	
						broadcastFeesTotal += cost*Fpe.performers[performer]; 
					}
					break;
				case 'program_a':
					var uses = Fpe.options.tv_program_a_uses;
					var guaranteed = Fpe.options.tv_program_a_uses_guarantee;
					for(var performer in Fpe.performers) {
						var costObj = Fpe.getPerformerObject(performer);
						if (typeof costObj.broadcast == 'undefined') continue;
						var cost = 0
						if (guaranteed) {
							cost = costObj.broadcast.program_a['13g'];
							if (uses > 13) {
								cost += (uses-13)*costObj.broadcast.program_a['13g_unit'];
							}
						} else {
							cost = costObj.broadcast.program_a['1'];
							if (uses >= 2) {
							 cost += costObj.broadcast.program_a['2'];
							}
							if (uses > 2) {
							 cost += (uses-2)*costObj.broadcast.program_a['3-13'];
							}
						}
						Fpe.putTotal({
							text: Fpe.performers[performer]+'x '+Fpe.labels[performer]+' at $'+cost.toFixed(2),
							value: cost*Fpe.performers[performer],
							el: broadcastFees,
						});	
						broadcastFeesTotal += cost*Fpe.performers[performer];
					}
					break;
				default:
					console.log(airType+' not defined');
			 }
			 console.log(broadcastFeesTotal);
			}
		}

		if (Fpe.type == 'industrial') {
			console.log('industrial');
			if (typeof Fpe.options.category != 'undefined') {
			 switch (Fpe.options.category) {
				case 'category1':
				case 'category2': 
					if (typeof Fpe.options.performer != 'undefined') {
						var cost = costs.fees.industrial[Fpe.options.category][Fpe.options.performer];
						var text = Fpe.labels[Fpe.options.performer]+' '+Fpe.labels[Fpe.options.category];
						//console.log(text+' '+cost);
						if (typeof Fpe.options[Fpe.options.performer+'_addl'] != 'undefined') {
							var addl = Fpe.options[Fpe.options.performer+'_addl']-1;
							var addl_cost = costs.fees.industrial[Fpe.options.category][Fpe.options.performer+'_addl'];
							if  (typeof addl_cost == 'undefined') {
								addl_cost = cost;
							}
							cost += addl_cost*addl;
							text += ' - x'+Fpe.options[Fpe.options.performer+'_addl'];
						}
						Fpe.putTotal({
							text: text,
							value: cost,
							el: sessionFees,
						});
						sessionFeesTotal += cost;
					}
					break;
				case 'ivr': 
					if (typeof Fpe.options.ivr_hours != 'undefined') {
						var text = Fpe.labels[Fpe.options.category];
						switch (Fpe.options.ivr_hours) {
							case 0.5: 
							 var cost = costs.fees.industrial.ivr.half; 
							 text += ' 1/2 hour';
							 break;
							case 1: 
							 var cost = costs.fees.industrial.ivr.first; 
							 text += ' 1 hour';
							 break;
							default: 
							 var cost = costs.fees.industrial.ivr.first;
							 cost += (Fpe.options.ivr_hours-1)*costs.fees.industrial.ivr.over;
							 text += ' '+Fpe.options.ivr_hours+' hours';
							 break;
						}
						Fpe.putTotal({
							text: text,
							value: cost,
							el: sessionFees,
						});
						sessionFeesTotal += cost;
					}
					break;
				case 'storecast': 
					if (typeof Fpe.options.storecast_cycle != 'undefined') {
						var cost = costs.fees.industrial[Fpe.options.category][Fpe.options.storecast_cycle];
						if (typeof Fpe.options.storecast_clients != 'undefined') {
							cost *= Fpe.options.storecast_clients;
						}
						Fpe.putTotal({
							text: Fpe.labels[Fpe.options.category],
							value: cost,
							el: sessionFees,
						});
						sessionFeesTotal += cost;	
					}
					break;
			 }
			} 
		}

		if (Fpe.type == 'nonunion') {
			for(var performer in Fpe.performers) {
			 var cost = parseFloat($('#nu-'+performer+'-cost input').val());
			 var other = ['other', 'reimbursments'];
			 for(var k in other) {
				var c = parseFloat($('#nu-'+performer+'-'+other[k]+' input').val());
				if (typeof c != 'undefined') {
					cost += c;
				}
			 }
			 var count = Fpe.performers[performer];
			 Fpe.putTotal({
				text: count+'x '+Fpe.labels[performer],
				value: cost,
				el: sessionFees,
			 });
			 sessionFeesTotal += cost;
			}

			var b = parseFloat($('#nu-broadcast-cost input').val());
			if (b > 0) {
			 var text = 
			 Fpe.putTotal({
				text: Fpe.options.usage,
				el: broadcastFees,
			 });
			 var text = [];
			 if (typeof Fpe.options['usage-cycle'] != 'undefined') {
				text.push(Fpe.options['usage-cycle']);
			 }
			 if (typeof Fpe.options['usage-length'] != 'undefined') {
				text.push(Fpe.options['usage-length']);
			 }
			 Fpe.putTotal({
				text: text.join(' - '),
				value: b,
				el: broadcastFees,
			 });
			 broadcastFeesTotal += b;
			}
		}

		if (Fpe.options.above_scale) {
			var count = Fpe.options.above_scale_count;
			var rate = Fpe.options.above_scale_rate;
			for (key in Fpe.performers) {
				var costObj = Fpe.getPerformerObject(key);
				break;
			}

			if (typeof count != 'undefined' && typeof rate != 'undefined') {
				Fpe.putTotal({
					text: count+'x above scale: '+rate+' scale',
					value: count*rate*costObj.session,
					el: sessionFees,
					bold: true,
				});
				sessionFeesTotal += count*rate*costObj.session;
			}
		}
			
		if (sessionFeesTotal > 0) {
			Fpe.putTotal({
			 text: 'Session fees subtotal',
			 value: sessionFeesTotal,
			 el: sessionFees,
			 bold: true,
			});
			sessionFees.show();
			subtotal += sessionFeesTotal;
		} else {
			sessionFees.hide();
		}

		if (broadcastFeesTotal > 0) {
			Fpe.putTotal({
			 text: 'Usage fees subtotal',
			 value: broadcastFeesTotal,
			 el: broadcastFees,
			 bold: true,
			});
			subtotal += broadcastFeesTotal;
			broadcastFees.show();
		} else {
			broadcastFees.hide();
		}
		/* Other fees */
		var agent_percent = $('[name=agent_fee]').length > 0 ? $('[name=agent_fee]').val() : costs.agent_percent;


		var agentFee = subtotal*(agent_percent/100);
		var pensionFee = (subtotal+agentFee)*(Fpe.type == 'industrial' ? (16.5/100) : (18/100)) || 0;
		var contributions = (subtotal+agentFee)*(Fpe.options.contributions/100) || 0;
		var falconFee = (subtotal+pensionFee+agentFee+contributions)*0.1 || 0;
		var total = subtotal+agentFee+pensionFee+falconFee+contributions;
		var subtotal_plus_agent = subtotal + agentFee;
		Fpe.putTotal({
			text: 'Total gross wages plus agent',
			value: subtotal_plus_agent,
			el: $('#fpe .totals .other-fees'),
			bold: true,
		});
		/*Fpe.putTotal({
			text: 'Talent agent '+agent_percent+'%',
			value: agentFee,
			el: $('#fpe .totals .other-fees'),
			bold: true,
		});*/
		if (pensionFee) {
			Fpe.putTotal({
				text: 'Union Benefits ('+(Fpe.type == 'industrial' ? 16.5 : 18)+'%)',
				value: pensionFee,
				el: $('#fpe .totals .other-fees'),
				bold: true,
			});
		}
		if (contributions) {
			Fpe.putTotal({
				text: 'Employer Contributions ('+(Fpe.options.contributions == 23 ? 'California' : 'Standard')+')',
				value: contributions,
				el: $('#fpe .totals .other-fees'),
				bold: true,
			});
		}
		Fpe.putTotal({
			text: 'Falcon paymasters fee',
			value: falconFee,
			el: $('#fpe .totals .other-fees'),
			bold: true,
		});
		$('#fpe .totals .subtotal').text('$'+(Math.round(subtotal*100)/100).toFixed(2));
		$('#fpe .totals .total').text('$'+(Math.round(total*100)/100).toFixed(2));
		if (sessionFeesTotal > 0) {
			sessionFees.show();
		}
		if (broadcastFeesTotal > 0) {
			broadcastFees.show();
		}
	}

	Fpe.getSelected = function(question, value, type='answer') {
		var q = $('#'+question+' .answer.selected');
		if (q.length > 0) {
			return q.eq(0).data(value);
		}
		return false;
	}

	Fpe.putTotal = function(args) {
		var bold = args.bold || false;
		if (typeof args.value != 'undefined') {
			args.el.append('<p class="'+(bold ? 'em' : '')+'"><span>'+(Math.round(args.value*100)/100).toFixed(2)+'</span> '+args.text+'</p>');
		} else {
			args.el.append('<h6>'+args.text+'</h6>');
		}
	}

	Fpe.getCost = function(selector) {
		//return Math.round(parseFloat(fpeOptions[selector])*100)/100;
		return parseFloat(fpeOptions[selector]);
	}

	Fpe.format = function(n, sep, decimals) {
		sep = sep || "."; // Default to period as decimal separator
		decimals = decimals || 2; // Default to 2 decimals
		return n.toLocaleString().split(sep)[0]
			+ sep
			+ n.toFixed(decimals).split(sep)[1];
	}

	Fpe.getPerformerObject = function(performer) {
		var principals_on = ['actor_on_camera' , 'stunt_performer', 'speciality_act', 'dancer'];
		var principals_off = ['singer' , 'actor_off_camera'];
		if ($.inArray(performer, ['announcer', 'solo_duo', 'group_9', 'group_6', 'group_3', 'creative_session', 'singers_contractors']) >= 0) {
			var type = 'radio';
		} else {
			var type = 'tv';
		}

		if (principals_on.indexOf(performer) >= 0) {
			var costObj = costs.fees[type].principal_on;
		} else if(principals_off.indexOf(performer) >= 0) {
			var costObj = costs.fees[type].principal_off;
		} else {
			var costObj = costs.fees[type][performer];
		}
		return costObj;
	}	

	Fpe.getMarketsLabels = function(selected, list) {
		for (var i in list) {
			var k = selected.indexOf(list[i].code);
			if (k != -1) {
				selected[k] = list[i].value;
			}
		}
		return selected;
	}

	Fpe.totalsOnScreen = function() {
		var footer = $('#footer-outer');
		if (Fpe.checkVisible(footer)) {
			var b = $('#footer-outer').outerHeight() - ($('body').outerHeight() - ($(window).scrollTop() +$(window).height()))
			$('#fpe .totals').css('bottom', b+'px');
		} else {
			$('#fpe .totals').css('bottom', 0);
		}
	}
	
	Fpe.i = setInterval(function() {
		if ($('#fpe').length > 0) {
			Fpe.init();
			clearInterval(Fpe.i);
		}
	}, 250);
	setTimeout(function() {
		clearInterval(Fpe.i);
	}, 10000);
}(jQuery))