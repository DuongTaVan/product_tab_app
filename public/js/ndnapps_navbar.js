
/*NDN JS*/
!(function(){
    /* Load Script function we may need to load jQuery from the Google's CDN */
    /* That code is world-reknown. */
    /* One source: http://snipplr.com/view/18756/loadscript/ */

    var loadScript = function(url, callback){
        var script = document.createElement("script");
        script.type = "text/javascript";
        // If the browser is Internet Explorer.
        if (script.readyState){
            script.onreadystatechange = function(){
                if (script.readyState == "loaded" || script.readyState == "complete"){
                    script.onreadystatechange = null;
                    callback();
                }
            };
            // For any other browser.
        } else {
            script.onload = function(){
                callback();
            };
        }
        script.src = url;
        document.getElementsByTagName("head")[0].appendChild(script);
    };

    /* This is my app's JavaScript */
    var ndnappsBlogtestJavaScript = function(jQuery){
        var B64={alphabet:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",lookup:null,ie:/MSIE /.test(navigator.userAgent),ieo:/MSIE [67]/.test(navigator.userAgent),encode:function(a){var e,f,g,b=B64.toUtf8(a),c=-1,d=b.length,h=[,,];if(B64.ie){for(var i=[];++c<d;)e=b[c],f=b[++c],h[0]=e>>2,h[1]=(3&e)<<4|f>>4,isNaN(f)?h[2]=h[3]=64:(g=b[++c],h[2]=(15&f)<<2|g>>6,h[3]=isNaN(g)?64:63&g),i.push(B64.alphabet.charAt(h[0]),B64.alphabet.charAt(h[1]),B64.alphabet.charAt(h[2]),B64.alphabet.charAt(h[3]));return i.join("")}for(var i="";++c<d;)e=b[c],f=b[++c],h[0]=e>>2,h[1]=(3&e)<<4|f>>4,isNaN(f)?h[2]=h[3]=64:(g=b[++c],h[2]=(15&f)<<2|g>>6,h[3]=isNaN(g)?64:63&g),i+=B64.alphabet[h[0]]+B64.alphabet[h[1]]+B64.alphabet[h[2]]+B64.alphabet[h[3]];return i},decode:function(a){if(a.length%4)throw new Error("InvalidCharacterError: 'B64.decode' failed: The string to be decoded is not correctly encoded.");var b=B64.fromUtf8(a),c=0,d=b.length;if(B64.ieo){for(var e=[];d>c;)b[c]<128?e.push(String.fromCharCode(b[c++])):b[c]>191&&b[c]<224?e.push(String.fromCharCode((31&b[c++])<<6|63&b[c++])):e.push(String.fromCharCode((15&b[c++])<<12|(63&b[c++])<<6|63&b[c++]));return e.join("")}for(var e="";d>c;)e+=b[c]<128?String.fromCharCode(b[c++]):b[c]>191&&b[c]<224?String.fromCharCode((31&b[c++])<<6|63&b[c++]):String.fromCharCode((15&b[c++])<<12|(63&b[c++])<<6|63&b[c++]);return e},toUtf8:function(a){var d,b=-1,c=a.length,e=[];if(/^[\x00-\x7f]*$/.test(a))for(;++b<c;)e.push(a.charCodeAt(b));else for(;++b<c;)d=a.charCodeAt(b),128>d?e.push(d):2048>d?e.push(192|d>>6,128|63&d):e.push(224|d>>12,128|63&d>>6,128|63&d);return e},fromUtf8:function(a){var c,b=-1,d=[],e=[,,];if(!B64.lookup){for(c=B64.alphabet.length,B64.lookup={};++b<c;)B64.lookup[B64.alphabet.charAt(b)]=b;b=-1}for(c=a.length;++b<c&&(e[0]=B64.lookup[a.charAt(b)],e[1]=B64.lookup[a.charAt(++b)],d.push(e[0]<<2|e[1]>>4),e[2]=B64.lookup[a.charAt(++b)],64!=e[2])&&(d.push((15&e[1])<<4|e[2]>>2),e[3]=B64.lookup[a.charAt(++b)],64!=e[3]);)d.push((3&e[2])<<6|e[3]);return d}};
        var blogtest_data_response = JSON.parse(B64.decode(ndn_navbar_data));
        //var blogtest_category_data_response = JSON.parse(B64.decode(ndn_blogtest_category_data));

        var replacer = function(finder, element, blackList) {
            if (!finder) {
                return
            }
            var regex = (typeof finder == 'string') ? new RegExp(finder, 'g') : finder;
            var regex2 = (typeof finder == 'string') ? new RegExp(finder, 'g') : finder;
            var childNodes = element.childNodes;
            var len = childNodes.length;
            var list = typeof blackList == 'undefined' ? 'html,head,style,title,link,meta,script,object,iframe,pre,a,' : blackList ;
            while (len--) {
                var node = childNodes[len];
                if (node.nodeType === 1 && true || (list.indexOf(node.nodeName.toLowerCase()) === -1)) {
                    replacer(finder, node, list);
                }
                if (node.nodeType !== 3 || !regex.test(node.data)) {
                    continue;
                }
                var frag = (function(){
                    var wrap = document.createElement('span');
                    var frag = document.createDocumentFragment();
                    var itemId = regex2.exec(node.data)[1];
                    if(itemId){
                        //wrap.innerHTML = '<div class="ndnapps-blogtest" id="ndnapps-blogtest-'+itemId+'"></div>';
                    }
                    else{
                        wrap.innerHTML = '<div class="ndnapps-nav-wrapper" id="ndnapps-nav-wrapper"></div>';
                    }

                    while (wrap.firstChild) {
                        frag.appendChild(wrap.firstChild);
                    }
                    return frag;
                })();
                var parent = node.parentNode;
                parent.insertBefore(frag, node);
                parent.removeChild(node);
            }
        };

        //jQuery.ajaxSetup({
        //cache: true
        //});

        var blackList;
        jQuery('body').each(function(){
            replacer('\\[ndnapps-blogtest]', jQuery(this).get(0), blackList);
            //replacer('\\[ndnapps-blogtest-(\\d+)\\]', jQuery(this).get(0), blackList);
        });

        var array = [];
        jQuery(".ndnapps-blogtest").each(function(index) {
            var id = jQuery(this).attr('id');
            var numb = id.match(/\d+$/)[0];
            array[index] = numb;
        });
        var ids = array.reduce(function(a,b){
            if (a.indexOf(b) < 0 ) a.push(b);
            return a;
        },[]);

        if(jQuery('#ndnapps-nav-wrapper').length){
            jQuery("#ndnapps-nav-wrapper").append(blogtest_data_response);
        }

        /*
        ids.forEach(function(id) {
          jQuery("#ndnapps-blogtest-" + id).append(blogtest_data_response_category_data_response[id].html);
        });
        */



        jQuery.ajaxSetup({
            cache: false
        });



        //MAIN.JS
        jQuery( function() {

        });
        //End MAIN.JS

    };
    /* If jQuery has not yet been loaded or if it has but it's too old for our needs,
    we will load jQuery from the Google CDN, and when it's fully loaded, we will run
    our app's JavaScript. Set your own limits here, the sample's code below uses 1.7
    as the minimum version we are ready to use, and if the jQuery is older, we load 1.9.
    //ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
    */
    function check_ndn_blogtest_scripttag() {
        var scripts = document.getElementsByTagName('script');
        for (var i = scripts.length; i--;) {
            if(scripts[i].innerText.indexOf('asyncLoad')>=0&&scripts[i].innerText.indexOf("app.20180905.js")>=0)
            {
                //console.log('already has faq scripttag');
                return true;
            }
        }
        return false;
    }
    if ((typeof jQuery === 'undefined') || (parseFloat(jQuery.fn.jquery) < 1.7)) {
        loadScript('//code.jquery.com/jquery-1.11.1.min.js', function(){
            NDNAPPS = jQuery.noConflict(true);
            NDNAPPS(document).ready(function() {
                //if(check_ndn_blogtest_scripttag()){
                ndnappsBlogtestJavaScript(NDNAPPS);
                //}
            });
        });
    } else {
        //if(check_ndn_blogtest_scripttag()){
        ndnappsBlogtestJavaScript(jQuery);
        //}
    }
})();