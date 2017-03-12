/*
 * Title:   Travelo - Travel, Tour Booking HTML5 Template - Custom Javascript file
 * Author:  http://themeforest.net/user/soaptheme
 */

tjq(document).ready(function() {
    minPrice = parseInt(tjq('#min-price').text());
    maxPrice = parseInt(tjq('#max-price').text());
    filteredMinPrice = parseInt(tjq('#min-price').data('filter')) ?
        parseInt(tjq('#min-price').data('filter')) : minPrice;
    filteredMaxPrice = parseInt(tjq('#max-price').data('filter')) ?
        parseInt(tjq('#max-price').data('filter')) : maxPrice;

    console.log(filteredMaxPrice);
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
            tjq("#min-price").text(tjq("#price-range").slider("values", 0));
            tjq("#max-price").text(tjq("#price-range").slider("values", 1));
            tjq.ajax({
                url: '/main/hotels/filter-ajax',
                type: 'post',
                data: {
                    'price': {
                        'minPrice': tjq("#price-range").slider("values", 0),
                        'maxPrice': tjq("#price-range").slider("values", 1)
                    }
                }
            })
        },
        step: 100
    });
    tjq('#price-range').slider("values", filteredMinPrice, filteredMaxPrice);
    tjq("#min-price").text(filteredMinPrice);
    tjq("#max-price").text(filteredMaxPrice);

});