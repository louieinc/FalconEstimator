var Fpe = {};

(function($) {
    Fpe.init = function() {
        Fpe.totalsOnScreen();
        $('#to-top').hide();
        $(window).scroll(function() {
            Fpe.totalsOnScreen();
        });

        $('.question').first().show();
        $('.answer').click(function(event) {
            event.preventDefault();
            Fpe.move($(this));
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
            var value = $(this).siblings('input').val() || 0;
            console.log('min: '+min);
            console.log('max: '+max);
            console.log('value: '+value);
            $(this).slider({
                min: min,
                max: max,
                value: value,
                create: function() {
                    var handle = $(this).find('.ui-slider-handle').first();
                    handle.text($(this).slider('value'));
                },
                slide: function(event, ui) {
                    var handle = $(this).find('.ui-slider-handle').first();
                    handle.text(ui.value);
                    $(this).parents('.question').find('input[name="'+$(this).data('update')+'"]').val(ui.value).change();

                }
            });
        });

        $('#fpe .totals .expand').click(function(e) {
            e.preventDefault();
            $('#fpe .totals .detailed').slideToggle();
        })

        $('#fpe input').on('change keyup', function() {
            Fpe.calculate();
        });

        $('#reset-estimator').click(function (event) {
            event.preventDefault();
            $('.question:first .answer.selected').click();
            for (var k in window.tagInputs) {
                window.tagInputs[k].data('tagify').removeAllTags();
            }
            $('.numeric-slider').slider('value', 0);
            $('.numeric-slider .custom-handle').text(0);
            $('.totals .expand').click();
        })

        window.tagInputs = [];
        $('.js-autocomplete').each(function() {
            var el = $(this).tagify({
                enforceWhitelist: true,
                whitelist: markets,
                /*tagTemplate : function(v, tagData){
                    console.log(tagData);
                    return `${v}`;
                },        */
                dropdown: {
                    enabled: 1,
                    //classname : 'extra-properties', 
                    //itemTemplate : function(tagData){ return `${tagData.value}` }
                },
                mapValueToProp : "code",
            }).on('add', function() {
                Fpe.calculate();
                var button = $(this).parents('.minimal-form-input').siblings('.answer');
                if (!button.hasClass('selected')) {
                    button.click();
                }

            }).on('remove', function () {
                Fpe.calculate();
            });
            window.tagInputs.push(el);
        });
    };
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
        var type = Fpe.getSelected('commercial-type', 'type');
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
        var onAir =  Fpe.getSelected(type+'-type', 'air');
        var total_actors_cost = 0;
        switch (type) {
            case 'tv':
                var camera =  Fpe.getSelected('tv-type', 'camera');
                
                var actors = $('[name=principal_actor]').val();
                if (actors > 0) {
                    Fpe.putTotal({
                        text: actors+' principal actor(s)',
                        value: Fpe.getCost('principal_actor_'+camera)*actors,
                        el: sessionFees,
                    });
                    sessionFeesTotal += Fpe.getCost('principal_actor_'+camera)*actors;
                    total_actors_cost += Fpe.getCost('principal_actor_'+camera)*actors;
                }
                var extras = $('[name=extra_actor]').val();
                if (extras > 0) {
                    Fpe.putTotal({
                        text: extras+' general extra(s)',
                        value: (Fpe.getCost('extra_actor')*extras),
                        el: sessionFees,
                    });
                    sessionFeesTotal += (Fpe.getCost('extra_actor')*extras);
                }
                var wardrobe_fittings = $('[name=wardrobe_fittings]').val();
                if (wardrobe_fittings > 0) {
                    Fpe.putTotal({
                        text: wardrobe_fittings+' wardrobe fittings',
                        value: (Fpe.getCost('wardrobe_fittings')*wardrobe_fittings),
                        el: sessionFees,
                    });
                    sessionFeesTotal += (Fpe.getCost('wardrobe_fittings')*wardrobe_fittings);
                }
                break;
            case 'radio':
                var radio_actors = parseInt($('#radio [name=radio_actor]').val()) || 0;
                var radio_singers = parseInt($('#radio [name=radio_singer]').val()) || 0;
                var scripts = parseInt($('#radio [name=scripts]').val()) || 1;
                var tags = parseInt($('#radio [name=radio_tags]').val()) || 1;

                var actors_cost = Fpe.getCost('radio_actor'+(onAir ? '' : '_demo'))*radio_actors;
                if (actors_cost) {
                    Fpe.putTotal({
                        text: radio_actors+' actor/announcer(s)',
                        value: actors_cost,
                        el: sessionFees,
                    });
                    sessionFeesTotal += actors_cost;
                    total_actors_cost += actors_cost;
                }
                var singers_cost = Fpe.getCost('radio_singer'+(onAir ? '' : '_demo'))*radio_singers;
                if (singers_cost) {
                    Fpe.putTotal({
                        text: radio_singers+' singer(s)',
                        value: singers_cost,
                        el: sessionFees,
                    });
                    sessionFeesTotal += singers_cost;
                    total_actors_cost += singers_cost;
                }
                if (scripts > 1) {
                    Fpe.putTotal({
                        text: (scripts-1)+' add\'l version(s) of the script',
                        value: (singers_cost+actors_cost)*(scripts-1),
                        el: sessionFees,
                    });
                    sessionFeesTotal += (singers_cost+actors_cost)*(scripts-1);
                }
                if (tags > 1) {
                    Fpe.putTotal({
                        text: (tags-1)+' add\'l tags',
                        value: Fpe.getCost('radio_tags')*(tags-1),
                        el: sessionFees,
                    });
                    sessionFeesTotal += Fpe.getCost('radio_tags')*(tags-1);
                }
                break;
            case 'psa':
                var psaType = Fpe.getSelected('psa-type', 'psa');
                if (psaType == 'audio') {
                    var psa_actors = parseInt($('#psa [name=psa_actor]').val()) || 0;
                    var psa_singers = parseInt($('#psa [name=psa_singer]').val()) || 0;
                    var scripts = parseInt($('#psa [name=scripts]').val()) || 1;
                    var tags = parseInt($('#psa [name=psa_tags]').val()) || 1;

                    var actors_cost = Fpe.getCost('psa_actor_demo')*psa_actors;
                    if (actors_cost) {
                        Fpe.putTotal({
                            text: psa_actors+' actor/announcer(s)',
                            value: actors_cost,
                            el: sessionFees,
                        });
                        sessionFeesTotal += actors_cost;
                        total_actors_cost += actors_cost;
                    }
                    var singers_cost = Fpe.getCost('psa_singer_demo')*psa_singers;
                    if (singers_cost) {
                        Fpe.putTotal({
                            text: psa_singers+' singer(s)',
                            value: singers_cost,
                            el: sessionFees,
                        });
                        sessionFeesTotal += singers_cost;
                        total_actors_cost += singers_cost;
                    }
                    if (scripts > 1) {
                        Fpe.putTotal({
                            text: (scripts-1)+' add\'l version(s) of the script',
                            value: (singers_cost+actors_cost)*(scripts-1),
                            el: sessionFees,
                        });
                        sessionFeesTotal += (singers_cost+actors_cost)*(scripts-1);
                    }
                } else {
                    var camera =  psaType;
                    var actors = $('[name=principal_actor]').val();
                    if (actors > 0) {
                        Fpe.putTotal({
                            text: actors+' principal actor(s)',
                            value: Fpe.getCost('principal_actor_'+camera)*actors,
                            el: sessionFees,
                        });
                        sessionFeesTotal += Fpe.getCost('principal_actor_'+camera)*actors;
                        total_actors_cost += Fpe.getCost('principal_actor_'+camera)*actors;
                    }
                    var extras = $('[name=extra_actor]').val();
                    if (extras > 0) {
                        Fpe.putTotal({
                            text: extras+' general extra(s)',
                            value: (Fpe.getCost('extra_actor')*extras),
                            el: sessionFees,
                        });
                        sessionFeesTotal += (Fpe.getCost('extra_actor')*extras);
                    }
                    var wardrobe_fittings = $('[name=wardrobe_fittings]').val();
                    if (wardrobe_fittings > 0) {
                        Fpe.putTotal({
                            text: wardrobe_fittings+' wardrobe fittings',
                            value: (Fpe.getCost('wardrobe_fittings')*wardrobe_fittings),
                            el: sessionFees,
                        });
                        sessionFeesTotal += (Fpe.getCost('wardrobe_fittings')*wardrobe_fittings);
                    }
                }
                break;
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

        if (type=='tv') {
            var a = actors;
            var t = a+' actor(s)';
        } else {
            var a = radio_actors+radio_singers;
            var t = [];
            if (radio_actors > 0) t.push(radio_actors+' actor(s)');
            if (radio_singers > 0) t.push(radio_singers+' singer(s)');
            t = t.join(' and ');
        }
        
        if (broadcast) {
            Fpe.putTotal({
                text: $('#'+type+'-broadcast .answer.selected').text(),
                el: broadcastFees,
            });
            console.log('a: '+a);
            console.log('t: '+t);
            switch(broadcast) {
                case 'wild_spot_13week':
                case 'wild_spot_8week':
                case 'wild_spot': 
                    var markets = eval($('#'+type+'-markets [name=markets]').val());
                    var marketValue = 0;
                    var primaryMarkets = ['ny', 'chi', 'la'];
                    var selectedPrimaryMarkets = [];
                    var chi = false;
                    var la = false;
                    var base = type+'_'+broadcast;
                    if (type=='tv') base += '_'+camera;
                    console.log('base:'+base);
                    for (var i in markets) {
                        if ($.inArray(markets[i], primaryMarkets) != -1) {
                            selectedPrimaryMarkets.push(markets[i]);
                        } else {
                            marketValue += parseInt(fpeOptions['fpe_'+markets[i]]);
                        }
                    }
                    if (selectedPrimaryMarkets.length == 0) {
                        switch (true) {
                            case (marketValue < 26):
                                var addl = Fpe.getCost(base+'_2_25');
                                break;
                            case (marketValue < 61):
                                var addl = Fpe.getCost(base+'_26_60');
                                break;
                            default:
                                var addl = Fpe.getCost(base+'_61_125');

                        }
                        Fpe.putTotal({
                            text: (marketValue-1)+' add\'l units for '+t+' at $'+addl,
                            value: ((marketValue-1)*a*addl),
                            el: broadcastFees,
                        });
                        broadcastFeesTotal += ((marketValue-1)*a*addl);
                    } else {
                        switch (selectedPrimaryMarkets.length) {
                            case 1: 
                                var majorFee = Fpe.getCost(base+'_'+selectedPrimaryMarkets[0]);
                                var addl = Fpe.getCost(base+'_'+selectedPrimaryMarkets[0]+'_addl_unit');
                                break;
                            case 2: 
                                var majorFee = Fpe.getCost(base+'_2_major');
                                var addl = Fpe.getCost(base+'_2_major_addl_unit');
                                break;
                            case 3: 
                                var majorFee = Fpe.getCost(base+'_3_major');
                                var addl = Fpe.getCost(base+'_3_major_addl_unit');
                                break;
                        }
                        Fpe.putTotal({
                            text: (selectedPrimaryMarkets.length)+' major market(s) for '+t,
                            value: (a*majorFee),
                            el: broadcastFees,
                        });
                        broadcastFeesTotal += (a*majorFee);
                        console.log('broadcastFeesTotal:'+broadcastFeesTotal);
                        Fpe.putTotal({
                            text: (marketValue-1)+' add\'l unit(s) for '+t+' at $'+addl,
                            value: ((marketValue-1)*a*addl),
                            el: broadcastFees,
                        });
                        broadcastFeesTotal += ((marketValue-1)*a*addl);
                        console.log('broadcastFeesTotal:'+broadcastFeesTotal);
                        Fpe.putTotal({
                            text: a+' session fee(s) credited',
                            value: total_actors_cost*(-1),
                            el: broadcastFees,
                        });
                        broadcastFeesTotal += total_actors_cost*(-1);
                        console.log('broadcastFeesTotal:'+broadcastFeesTotal);
                        console.log('majorFee:'+majorFee);
                    }
                    break;
                case 'local_cable':
                    var subs = $('#tv-local_cable .answer.selected').data('subs');
                    var cost = Fpe.getCost(broadcast+'_'+camera+'_'+subs);
                    if (isNaN(cost)) break;
                    broadcastFeesTotal += cost*actors;
                    Fpe.putTotal({
                        text: actors+' Principal actor(s)',
                        value: cost*actors,
                        el: broadcastFees,
                    });
                    break;
                case 'national_cable':
                    var subs = $('#tv-national_cable .answer.selected').data('subs');
                    if (subs == '1_50') {
                        var cost = Fpe.getCost('principal_actor_'+camera)*actors;
                    } else {
                        var cost = 3906*actors;
                    }
                    if (isNaN(cost)) break;
                    broadcastFeesTotal += cost*actors;
                    Fpe.putTotal({
                        text: actors+' Principal actor(s)',
                        value: cost*actors,
                        el: broadcastFees,
                    });
                    break;
                case 'network': 
                    var length = Fpe.getSelected('radio-network', 'length');
                    var cost = Fpe.getCost(type+'_'+broadcast+'_'+length);
                    if (cost > 0) {
                        Fpe.putTotal({
                            text: t,
                            value: cost*a,
                            el: broadcastFees,
                        });
                        broadcastFeesTotal += cost*a;
                    }
                    break;
                default:
                    var cost = Fpe.getCost(type+'_'+broadcast);
                    if (cost > 0) {
                        Fpe.putTotal({
                            text: t,
                            value: cost*a,
                            el: broadcastFees,
                        });
                        broadcastFeesTotal += cost*a;
                    }
            }
        }
        if (internet) {
            if (type=='tv') {
                var cost = Fpe.getCost(type+'_internet_'+camera+'_'+internet)*a;
            } else {
                var cost = Fpe.getCost(type+'_internet_'+internet)*a;
            }
            
            if (!isNaN(cost)) {
                Fpe.putTotal({
                    text: 'Use on internet or new media',
                    el: broadcastFees,
                });
                Fpe.putTotal({
                    text: $('#'+type+'-internet .answer.selected').text()+' for '+t,
                    value: cost,
                    el: broadcastFees,
                });
                broadcastFeesTotal += cost;
            }
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
        var agentFee = subtotal*0.1;
        var pensionFee = (subtotal+agentFee)*0.18;
        var falconFee = (subtotal+pensionFee+agentFee)*0.08;
        var total = subtotal+agentFee+pensionFee+falconFee;
        Fpe.putTotal({
            text: 'Talent agent 10%',
            value: agentFee,
            el: $('#fpe .totals .other-fees'),
            bold: true,
        });
        Fpe.putTotal({
            text: 'Pension & health',
            value: pensionFee,
            el: $('#fpe .totals .other-fees'),
            bold: true,
        });
        Fpe.putTotal({
            text: 'Falcon paymasters fee',
            value: falconFee,
            el: $('#fpe .totals .other-fees'),
            bold: true,
        });
        $('#fpe .totals .subtotal').text('$'+(Math.round(subtotal*100)/100).toFixed(2));
        $('#fpe .totals .total').text('$'+(Math.round(total*100)/100).toFixed(2));
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
            args.el.append('<p class="'+(bold ? 'em' : '')+'"><span>'+(Math.round(args.value*100)/100).toFixed()+'</span> '+args.text+'</p>');
        } else {
            args.el.append('<h6>'+args.text+'</h6>');
        }
    }

    Fpe.getCost = function(selector) {
        return Math.round(parseFloat(fpeOptions[selector])*100)/100;
    }

    Fpe.format = function(n, sep, decimals) {
        sep = sep || "."; // Default to period as decimal separator
        decimals = decimals || 2; // Default to 2 decimals
        return n.toLocaleString().split(sep)[0]
            + sep
            + n.toFixed(decimals).split(sep)[1];
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