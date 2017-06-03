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

    })


});