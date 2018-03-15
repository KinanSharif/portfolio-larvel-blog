var Result = function(){

    // -----------------------------------------------------------------------------------------------------------------

    this.__construct = function() {
        console.log('Result Created');
    };

    // -----------------------------------------------------------------------------------------------------------------

    this.success = function(msg){

        var dom = $("#success");

        if(typeof msg === 'undefined'){
            dom.append("Success").removeClass("hide");
        }
        dom.append("<p>" + msg + "</p>").removeClass("hide");

        setTimeout(function(){
            dom.fadeOut();
        },5000);
    };

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * if we have different types of msg, we could work accordingly
     * such as if it's an object then we loop through it.
     */

    this.error = function(msg){
        var dom = $("#error");
        if(typeof msg === 'undefined'){

            dom.append("<p>" + msg + "</p>").removeClass("hide");
            console.log(msg);
        }

        if(typeof msg === 'object'){

            var output = '<ul>';

            for(var key in msg){
                output += '<li>' + msg[key] + '</li>';
            }

            output += '</ul>';
            dom.append("<p>" + output + "</p>").removeClass("hide");

        }else {
            dom.append("<p>" + msg + "</p>").removeClass("hide");

            console.log(msg);
        }

        setTimeout(function(){
            dom.fadeOut();
        },5000);
    };

    // -----------------------------------------------------------------------------------------------------------------

    this.__construct();



};