define(
    [
        'jquery',
        'Magento_Checkout/js/view/summary/abstract-total'
    ],
    function ($,Component) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Speroteck_StoreDiscount/checkout/summary/customdiscount'
            },
            isDisplayedCustomdiscount : function(){
                return true;
            },
            getCustomDiscount : function(){
                return '$10';
            }
        });
    }
);