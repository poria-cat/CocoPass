/*  Author Details
 ==============
 Author: Ranjith Pandi

 Author URL: http://ranjithpandi.com

 Attribution is must on every page, where this work is used.

 For Attribution removal request. please consider contacting us through http://ranjithpandi.com/#contact
 */

;(function ($) {

    $.fn.strongPassword = function() {
        var password = [];
        var len = $("#pass-len").val();
        var symbols = $("#pass-symbols").is(':checked');
        var digits = $("#pass-digits").is(':checked');
        var similar = $("#pass-similar").is(':checked');

        for(i=0; i < len; i++) {
            var num = randomNumber();
            num = checkChar(num, symbols, digits);
            password.push(String.fromCharCode(num));
        }
        $(this).val(password.join(''));
    }

    randomNumber = function() {
        return Math.floor(Math.random() * (127 - 33 + 1)) + 33; // 33 to 127
    }

    checkChar = function(num, symbols, digits, similar) {
        if(!symbols) {
            while(hasSymbols(num)) {
                num = randomNumber();
            }
        }
        if(!digits){
            while(hasDigits(num)) {
                num = randomNumber();
            }
        }
        if(!similar){
            while(hasSimilarChars(num)) {
                num = randomNumber();
            }
        }
        return num;
    }

    hasDigits = function(num) {
        if(num >=48 && num <= 57) {
            return true;
        }
        return false;
    }

    hasSymbols = function(num) {
        if((num >= 33 && num <= 47) || (num >= 58 && num <= 64) || (num >= 91 && num <= 96) || (num >= 123 && num <= 126)) {
            return true;
        }
        return false;
    }

    hasSimilarChars = function(num) {
        if(num == 48 || num == 49 || num == 73 || num == 76 || num == 79 || num == 105 || num == 108  || num == 111) {
            return true;
        }
        return false;
    }
})(jQuery);