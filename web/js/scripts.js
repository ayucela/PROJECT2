/*
 * Title:   Travelo - Travel, Tour Booking HTML5 Template - Custom Javascript file
 * Author:  http://themeforest.net/user/soaptheme
 */

tjq(document).ready(function() {


    if(sessionStorage.getItem('accs')){
        accs = JSON.parse(sessionStorage.getItem('accs'));
        console.log(accs);
        accs.forEach(function(item, i){

            tjq("li[data-code='" + item.trim() + "']").addClass('active');
        });
    }
    minPrice = parseInt(tjq('#min-price').text());
    maxPrice = parseInt(tjq('#max-price').text());

    filteredMinPrice = tjq('#previewform-price_from').val();
    filteredMaxPrice = tjq('#previewform-price_to').val();



    tjq("#price-range").slider({
        min: minPrice,
        max: maxPrice,
        values: [filteredMinPrice, filteredMaxPrice],
        range: true,
        slide: function (event, ui) {
            tjq("#min-price").text(tjq("#price-range").slider("values", 0));
            tjq("#max-price").text(tjq("#price-range").slider("values", 1));
        },
        stop: function (event, ui) {

            tjq('#previewform-price_from').val(tjq("#price-range").slider("values", 0));
            tjq('#previewform-price_to').val(tjq("#price-range").slider("values", 1));

            tjq('#preview-form').submit();

        },
        step: 100
    });
    //tjq('#price-range').slider("values", filteredMinPrice, filteredMaxPrice);



    tjq('#accomodations-filter').on('click', 'li', function(){
        accs=[];

        active =  tjq('#accomodations-filter').find('.active');
        active.each(function(item){
            accs.push(tjq(this).data('code'));
        });

        tjq('#previewform-accommodation').val(accs);
        tjq('#preview-form').submit();
    });

    tjq('#amenities-filter').on('click', 'li', function(){
        amenities =[];

        active =  tjq('#amenities-filter').find('.active');
        active.each(function(item){
            amenities.push(tjq(this).data('code'));
        });
        console.log(amenities);
        tjq('#previewform-amenities').val(amenities);
        tjq('#preview-form').submit();
    });

    tjq('#mainsearchform-destination').on('input', function(){

        searchStr = tjq('#mainsearchform-destination').val();

        tjq.ajax({
            url: '/main/site/search-ajax',
            type: 'post',
            data: {
                search : searchStr
            }
        })
            .done(
                function(data){
                    data.forEach(function(item, i){
                        console.log(item);
                        responseStr = "<p>"+item.country.name_en+";&nbsp;"+
                            item.destination.name_en+"_"+item.destination.code+"</p>";
                        tjq('#search-result').removeClass('hidden');
                        tjq('#search-result').append(responseStr);
                        tjq('#search-result').children().on('click', function(e){
                            destination = tjq(this).text();
                            tjq('#mainsearchform-destination').val(destination);
                            tjq('#search-result').addClass('hidden').html('');

                        });
                    });
                }
            );
        tjq('#search-result').addClass('hidden').html('');

    });


    tjq(document).on('click', '#main-search-form > div > div.form-group.col-sm-6.col-md-2.fixheight > button', function (event) {

        clearAlerts();

        var text = tjq('#mainsearchform-destination').val();

        var textIncludes = (text.includes(';') || text.includes('_'));

        if (!textIncludes && tjq('#search-result').children().length < 1) {
            (event.preventDefault) ? event.preventDefault() : event.returnValue = false;

            tjq('input#mainsearchform-destination ~ div.help-block').text('Destination is not correct!');
            tjq('input#mainsearchform-destination').parent().addClass('has-error');

            return false;
        }

        if (!checkDateInput(tjq("#mainsearchform-date_from"))) {
            (event.preventDefault) ? event.preventDefault() : event.returnValue = false;

            tjq('input#mainsearchform-date_from').parent().siblings('div.help-block').text('You should select check in date!');
            tjq('input#mainsearchform-date_from').parent().parent().addClass('has-error');

            return false;
        }

        if (!checkDateInput(tjq("#mainsearchform-date_to"))) {
            (event.preventDefault) ? event.preventDefault() : event.returnValue = false;

            tjq('input#mainsearchform-date_to').parent().siblings('div.help-block').text('You should select check out date!');
            tjq('input#mainsearchform-date_to').parent().parent().addClass('has-error');

            return false;
        }

        if  (!textIncludes)  {
            var destination = tjq('#search-result').children()[0].innerText;
            // tjq('#search-result').addClass('hidden');
            tjq('#mainsearchform-destination').val(destination);
        }
    });

    if (tjq("#mainsearchform-date_to").val() === '') {
        tjq("#mainsearchform-date_to").datepicker('disable');
    }

    tjq(document).on('change', 'input#mainsearchform-date_from', function(event) {

        tjq("#mainsearchform-date_to").datepicker('enable');

        var minDate = new Date(event.target.value);
        minDate.setDate(minDate.getDate() + 1);

        var maxDate = new Date(event.target.value);
        maxDate.setDate(maxDate.getDate() + 30);

        tjq("#mainsearchform-date_to").datepicker( "option", "minDate", minDate);
        tjq("#mainsearchform-date_to").datepicker( "option", "maxDate", maxDate);
    });


    function clearAlerts() {
        tjq('input#mainsearchform-destination ~ div.help-block').text('');

        tjq('input#mainsearchform-date_from').parent().siblings('div.help-block').text('');

        tjq('input#mainsearchform-date_to').parent().siblings('div.help-block').text('');

        tjq('input#mainsearchform-destination').parent().removeClass('has-error');
        tjq('input#mainsearchform-date_from').parent().parent().removeClass('has-error');
        tjq('input#mainsearchform-date_to').parent().parent().removeClass('has-error');
    }

    function checkDateInput(input) {
        var value = input.val();

        return value !== '' && value.includes('/') && value.length === 10;
    }

});