(function (exports) {

    var __data = {};
    var ShipChung = function () {

        var me = this;
        this._elements = [];
        this.configs = {
            "global": {
                "style": "css/sc-style.css",
                "utils": "scripts/sc-utils.js",
                "popup": "scripts/sc-popup.js"
            },
            "scStylev1": 'http://api.shipchung.vn/v1.2/shipchung_style.css',
            "scStylev3": 'http://api.shipchung.vn/v1.3/shipchung_style.css',
            "templates": {
                "stylesheetUrL": "assets/templates/{templateName}/style.css"
            }
        };
        /*this.SCProducts = {};*/

        this.buttonClass = 'alepay';
        this._assetApi = 'alepay-sdk-php/'; //http://services.shipchung.vn/public/sdk/  - http://10.0.1.199/ussdtest/popup-lib/
        this.styleElement = document.createElement('style');
        this.styleElement.type = "text/css";
        this.scriptElement = document.createElement('script');
        this.scriptElement.type = "text/javascript";
        this.styleStr = "";
        this.scriptStr = "";
        this.listButtonTemplates = {};


        this.jx = {
            //Create a xmlHttpRequest object - this is the constructor. 
            getHTTPObject: function () {
                var http = false;
                //Use IE's ActiveX items to load the file.
                if (typeof ActiveXObject != 'undefined') {
                    try {
                        http = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            http = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (E) {
                            http = false;
                        }
                    }
                    //If ActiveX is not available, use the XMLHttpRequest of Firefox/Mozilla etc. to load the document.
                } else if (window.XMLHttpRequest) {
                    try {
                        http = new XMLHttpRequest();
                    } catch (e) {
                        http = false;
                    }
                }
                /*http.withCredentials = true;*/
                return http;
            },
            post: function (url, data, callback, format, contentType) {
                var http = this.getHTTPObject(); //The XMLHttpRequest object is recreated at every call - to defeat Cache problem in IE
                if (!http || !url)
                    return;
                if (http.overrideMimeType)
                    http.overrideMimeType('text/xml');

                if (!format)
                    var format = "text";//Default return type is 'text'
                format = format.toLowerCase();

                //Kill the Cache problem in IE.
                var now = "t=" + new Date().getTime();
                url += (url.indexOf("?") + 1) ? "&" : "?";
                url += now;



                http.open("POST", url, true);
                if (contentType) {
                    http.setRequestHeader('Content-Type', contentType);
                } else {
                    data = JSON.stringify(data);
                    http.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
                }

                /*http.setRequestHeader('Content-Length', data.length);*/


                http.onreadystatechange = function () {//Call a function when the state changes.
                    if (http.readyState == 4) { //Ready State will be 4 when the document is loaded.
                        if (http.status == 200) {
                            var result = "";
                            if (http.responseText)
                                result = http.responseText;


                            //If the return is in JSON format, eval the result before returning it.
                            if (format.charAt(0) == "j") {
                                //\n's in JSON string, when evaluated will create errors in IE
                                try {
                                    result = result.replace(/[\n\r]/g, "");
                                    result = eval('(' + result + ')');
                                } catch (err) {
                                    if (callback)
                                        callback(true, {});
                                    return;
                                }

                            }

                            //Give the data to the callback function.
                            if (callback)
                                callback(null, result);
                        } else { //An error occured
                            if (callback)
                                callback(http.status, null);
                        }
                    }
                }
                http.send(data);
            },
            load: function (url, callback, format) {
                var http = this.getHTTPObject(); //The XMLHttpRequest object is recreated at every call - to defeat Cache problem in IE
                if (!http || !url)
                    return;
                if (http.overrideMimeType)
                    http.overrideMimeType('text/xml');

                if (!format)
                    var format = "text";//Default return type is 'text'
                format = format.toLowerCase();

                //Kill the Cache problem in IE.
                var now = "t=" + new Date().getTime();
                url += (url.indexOf("?") + 1) ? "&" : "?";
                url += now;

                http.open("GET", url, true);

                http.onreadystatechange = function () {//Call a function when the state changes.
                    if (http.readyState == 4) { //Ready State will be 4 when the document is loaded.
                        if (http.status == 200) {
                            var result = "";
                            if (http.responseText)
                                result = http.responseText;

                            //If the return is in JSON format, eval the result before returning it.

                            if (format.charAt(0) == "j") {
                                //\n's in JSON string, when evaluated will create errors in IE
                                try {
                                    result = result.replace(/[\n\r]/g, "");
                                    result = eval('(' + result + ')');
                                } catch (err) {
                                    if (callback)
                                        callback(true, {});
                                    return;
                                }
                            }

                            //Give the data to the callback function.
                            if (callback)
                                callback(null, result);
                        } else { //An error occured
                            if (callback)
                                callback(http.status, null);
                        }
                    }
                }
                http.send(null);
            }
        };



        // Initial scripts  // 

        var eles = document.getElementsByClassName(this.buttonClass);

        // L?y danh s�ch c�c template d?oc s? d?ng 
        for (var i = 0; i < eles.length; i++) {
            this.listButtonTemplates[eles[i].getAttribute('data-sc-style') || 'default'] = true;
        }

        // Load c�c scripts v� css li�n quan
        this.initScript();
        this.handlerIframeEvent();
        setTimeout(function () {

            me.parseElements(true);
        }, 100);

    };





    // Load file style v� append va� dom
    ShipChung.prototype.loadStyle = function (link) {
        var me = this,
            SCcssNode = document.createElement('link'),
            SC_headID = document.getElementsByTagName('head')[0];

        SCcssNode.type = 'text/css';
        SCcssNode.rel = 'stylesheet';
        SCcssNode.href = link;
        SCcssNode.media = 'screen';
        SC_headID.appendChild(SCcssNode);
    }

    // Load file script v� append va� dom
    ShipChung.prototype.loadScript = function (link) {
        var me = this;
        var script = document.createElement('script');

        script.type = 'text/javascript';
        script.src = link;
        document.body.appendChild(script);

        script.onload = function (event) {
            if (event.target.attributes[1].value.indexOf('sc-popup.js') >= 0) {
                me.checkResult();
            }
        }
    }



    // Nh?n v� x? l� event giu� popup v?i window 
    ShipChung.prototype.handlerIframeEvent = function () {
        var me = this;

        var receiveMessage = function (event) {
            if (event.data && event.data == 'close-popup') {
                exports.Popup.closePopup();
                return;
            }

            if (event.data && event.data.toString() == "[object Object]") {
                console.log("DATA _ PASSED : " + event.data);
                switch (event.data.name) {
                    case 'closeAndRemovePopup':
                        exports.Popup.closeAndRemovePopup(event.data.data);
                        break;
                    case 'redirectUrl':
                        window.location.href = event.data.data;
                        break;
                    case 'NLCheckoutLoad':
                        /*exports.Popup.iframe.src = 'http://dantri.com';*/
                        break;
                    default:
                        break;
                }
            }
        }

        function scAddEvent(obj, type, SCfn) {
            if (obj.addEventListener) {
                obj.addEventListener(type, SCfn, false);
                return true;

            } else if (obj.attachEvent) {
                obj['e' + type + SCfn] = SCfn;
                obj[type + SCfn] = function () {
                    obj['e' + type + SCfn](window.event);
                }
                var r = obj.attachEvent('on' + type, obj[type + SCfn]);
                return r;

            } else {
                obj['on' + type] = SCfn;
                return true;
            }
        }
        scAddEvent(window, "message", receiveMessage);
    }

    // Loading require scripts 
    ShipChung.prototype.initScript = function (callback) {
        var SC_head = document.getElementsByTagName("head")[0],
            me = this;
        SC_head.appendChild(me.styleElement);
        SC_head.appendChild(me.scriptElement);

        var resp = me.configs;
        var templates = resp['templates'];

        // load global scripts and stylesheet !
        for (var script in resp['global']) {
            var path = resp['global'][script];

            // Update 3/4/15 : prevent method toJSONString() in jquery

            if (typeof path == 'function' || script == 'toJSONString') {
                continue;
            }
            ;

            var _path = path.split('.'),
                ext = _path.reverse()[0];

            if (ext == 'css') {
                me.loadStyle(me._assetApi + path);
            } else {
                me.loadScript(me._assetApi + path);

            }
        }
        // Load style for template used 

        for (var template in me.listButtonTemplates) {
            if (typeof me.listButtonTemplates[path] == 'function' || template == 'toJSONString') {
                continue;
            }
            ;
            var styleUrl = resp['templates']['stylesheetUrL'].replace('{templateName}', template);
            me.loadStyle(me._assetApi + styleUrl);
        }

        typeof callback == 'undefined' || callback();

    }


    ShipChung.prototype.checkResult = function () {
        var urlParams = this.parseSCUrl();
        if (Object.keys(urlParams).length > 0 && urlParams.hasOwnProperty('SCcode')) {
            SC.Popup.openPopup("result", {}, urlParams);
        }
    }

    ShipChung.prototype.parseSCUrl = function () {
        var urlArray = document.URL.split('#'),
            params = {};
        if (urlArray.length > 1) {
            for (var i = urlArray.length - 1; i >= 0; i--) {
                if (urlArray[i].indexOf('SC') > -1) {
                    var _tmp = urlArray[i].split('=');
                    params[_tmp[0]] = _tmp[1];
                }
            }
            ;
        }

        return params;


    }

    ShipChung.prototype.buildData = function () {
        var eles = document.getElementsByClassName(this.buttonClass),
            elImages;
        console.log(eles);
        for (var i = 0; i < eles.length; i++) {
            console.log("========BUTTON ========" + eles[i]);
            console.log("========BUTTON ID========" + eles[i].id);
            elImages = eles[i].getAttribute('sc-image')
                || eles[i].getAttribute('data-sc-image')
                || null;
            if (elImages) {
                __data[eles[i].id] = this.getItemsFromButton(eles[i].getElementsByTagName('img')[0], eles[i].id);
            } else {
                __data[eles[i].id] = this.getItemsFromButton(eles[i].getElementsByTagName('button')[0], eles[i].id);
            }
        }
    };

    // Phân tích các button element
    ShipChung.prototype.parseElements = function (hasSetEvent) {
        if (document.getElementsByTagName('alepay').length > 0) {
            this.loadStyle(this.configs['scStylev1']);
            this.parseElementV1();
        } else if (document.getElementById('sc-root')) {
            this.loadStyle(this.configs['scStylev3']);
            this.parseElementsV3();
        }
        var eles = document.getElementsByClassName(this.buttonClass),
            elSize,
            elStyle,
            elImages,
            buttonText;
        for (var i = 0; i < eles.length; i++) {
            eles[i].id = 'sc-button-' + this.randomId();
            elSize = eles[i].getAttribute('sc-size')
                || eles[i].getAttribute('data-sc-size')
                || 'medium';
            elStyle = eles[i].getAttribute('sc-style')
                || eles[i].getAttribute('data-sc-style')
                || 'default';
            elImages = eles[i].getAttribute('sc-image')
                || eles[i].getAttribute('data-sc-image')
                || null;
            buttonText = eles[i].getAttribute('sc-text')
                || eles[i].getAttribute('data-sc-text')
                || "Thanh to�n v� v?n chuy?n";
            var buttonHTML = "<button type='button' class='sc-button btn-size-" + elSize + " btn-style-" + elStyle + "'>" + buttonText + "</button>";
            if (elImages) {

                eles[i].innerHTML += "<img src='" + elImages + "' class='sc-button-image btn-size-" + elSize + "'/>";
                __data[eles[i].id] = this.getItemsFromButton(eles[i].getElementsByTagName('img')[0], eles[i].id);
                if (hasSetEvent) {
                    this.fireEvent(eles[i].getElementsByTagName('img')[0], 'click');
                }
            } else {
                eles[i].innerHTML += buttonHTML;
                __data[eles[i].id] = this.getItemsFromButton(eles[i].getElementsByTagName('button')[0], eles[i].id);
                if (hasSetEvent) {
                    if (eles[i].getAttribute('data-sc-type') == 'payment' || eles[i].getAttribute('data-sc-type') == 'payment-instant' || eles[i].getAttribute('data-sc-type') == 'payment-installment') {
                        this.fireEvent(eles[i].getElementsByTagName('button')[0], 'click');
                    } else {
                        this.fireEventCardLink(eles[i].getElementsByTagName('button')[0], 'click');
                    }
                }
            }
            this._elements.push(eles[i]);
        }
        return;
    };

    ShipChung.prototype.parseElementV1 = function () {
        var me = this;
        var SC_html_content = '';
        var sc_stick_free_ship = '&nbsp;';
        var sc_text_free_ship = '';

        var sc_stick_free_cod = '&nbsp;';
        var sc_text_free_cod = '';

        var sc_stick_free_protected = '&nbsp;';
        var sc_text_free_protected = '';

        var shipchung_frame_v2 = '';
        var sc_disable_li_ship = '';
        var sc_disable_li_protected = '';
        var sc_disable_li_cod = '';
        var sc_title_nl_logo = '';



        var sc_button_size = document.getElementsByTagName('alepay')[0].getAttribute('size');
        var sc_button_type = document.getElementsByTagName('alepay')[0].getAttribute('type');
        var sc_button_method = document.getElementsByTagName('alepay')[0].getAttribute('method');
        var sc_button_id = document.getElementsByTagName('alepay')[0].getAttribute('id');

        var sc_button_nl_level = document.getElementsByTagName('alepay')[0].getAttribute('level');
        var sc_button_nl_url = document.getElementsByTagName('alepay')[0].getAttribute('nganluong_url');

        var sc_free_shipping = document.getElementsByTagName('alepay')[0].getAttribute('free_shipping');

        var sc_free_cod = document.getElementsByTagName('alepay')[0].getAttribute('free_cod');
        var sc_free_protected = document.getElementsByTagName('alepay')[0].getAttribute('free_protected');

        var sc_button_cod_option = document.getElementsByTagName('alepay')[0].getAttribute('cood');

        var sc_button_cod = (sc_button_cod_option && sc_button_cod_option != 'undefined' && (sc_button_cod_option.toLowerCase() == 'yes' || sc_button_cod_option.toLowerCase() == '1')) ? 'cod' : 'pas';
        var sc_ajax_file_option = document.getElementsByTagName('alepay')[0].getAttribute('ajax_file');
        var SC_AJAX = (sc_ajax_file_option && sc_ajax_file_option != 'undefined') ? sc_ajax_file_option : 'shipchung/ajax.php';
        var sc_tooltip = "<li>T�nh ph� v?n chuy?n Online ho�n to�n</li><li>Giao h�ng thu ti?n (CoD) to�n qu?c</li><li>H? tr? thanh to�n tr?c tuy?n qua Ng�nLu?ng.vn</li><li>Tra c?u h�nh tr�nh h�ng h�a m?i l�c m?i noi</li><li>H? tr? gi?i quy?t khi?u n?i chuy�n nghi?p</li>";
        var SC_QUANTITY = document.getElementsByTagName('alepay')[0].getAttribute('input_quantity');
        var SC_NOTE = document.getElementsByTagName('alepay')[0].getAttribute("input_note");
        if (sc_free_shipping && sc_free_shipping != 'undefined' && sc_free_shipping == 'yes') {
            sc_stick_free_ship = '<i>&nbsp;</i>';
            sc_text_free_ship = 'shipchung_text_free';
        } else {
            sc_disable_li_ship = ' style="color: #ccc;"';
        }

        if (sc_free_cod && sc_free_cod != 'undefined' && sc_free_cod == 'yes') {
            sc_stick_free_cod = '<i>&nbsp;</i>';
            sc_text_free_cod = 'shipchung_text_free';
        } else {
            sc_disable_li_cod = ' style="color: #ccc;"';
        }

        if ((sc_free_protected && sc_free_protected != 'undefined' && sc_free_protected == 'yes') || sc_button_nl_level) {
            sc_stick_free_protected = '<i>&nbsp;</i>';
            sc_text_free_protected = 'shipchung_text_free';
        } else {
            sc_disable_li_protected = ' style="color: #ccc;"';
            shipchung_frame_v2 = 'height: 90px;';
        }

        if (sc_button_type == 'payment' && sc_button_cod == 'pas') // Gio hang PAS
        {
            var SC_html_content = '<a shipchung_ajax = "' + SC_AJAX + '" shipchung_type="' + sc_button_type.toLowerCase() + '" shipchung_method="' + sc_button_method.toLowerCase() + '" class="shipchung_pas_button" href="javascript:();" cod="" rel="' + sc_button_id + '" id="sc_event_click_button"></a><br/>';
        } else if (sc_button_type == 'payment' && sc_button_cod == 'cod') // Gio hang COD
        {
            var SC_html_content = '<a shipchung_ajax = "' + SC_AJAX + '" shipchung_type="' + sc_button_type.toLowerCase() + '" shipchung_method="' + sc_button_method.toLowerCase() + '" class="shipchung_cod_button" href="javascript:();" cod="' + ((sc_button_cod_option) ? sc_button_cod_option.toLowerCase() : '') + '" rel="' + sc_button_id + '" id="sc_event_click_button">Giao h�ng & Thu ti?n</a><br/>';
        }

        document.getElementsByTagName('alepay')[0].innerHTML = SC_html_content;

        document.getElementById('sc_event_click_button').addEventListener('click', function () {
            SC.Popup.createIframeElement(sc_button_id);
            var quantity = (document.getElementById(SC_QUANTITY)) ? parseInt(document.getElementById(SC_QUANTITY).value) : ((document.getElementsByName(SC_QUANTITY).length > 0 && parseInt(document.getElementsByName(SC_QUANTITY)[0].value) > 0) ? parseInt(document.getElementsByName(SC_QUANTITY)[0].value) : 1);
            me.jx.post(SC_AJAX, 'id=' + sc_button_id + '&quantity=' + quantity, function (err, resp) {
                if (!err) {
                    if (resp.result_code !== 100) {
                        SC.Popup.iframe.src = resp.data.SCFrameUrl;
                        SC.Popup.popup.appendChild(SC.Popup.iframe);
                        document.body.appendChild(SC.Popup.popup);
                        SC.Popup.popup.className = "sc-popup-wrap";
                    } else {
                        //alert(resp.result_description);
                        SC.Popup.closePopup();
                    }
                }
            }, 'json', 'application/x-www-form-urlencoded');

            // T?o backdrop
            SC.Popup.createBackdrop();
            // L?ng nghe s? ki?n resize c?a window v� di?u ch?nh l?i v? tr� c?a popup 
            SC.Popup.iframeResizeHander();
        });
    } // End parse element v1



    ShipChung.prototype.parseElementsV3 = function () {
        var me = this,
            buttonEl = document.getElementById('sc-root'),
            SC_ID = buttonEl.getAttribute('data-id') || buttonEl.getAttribute('id'),
            SC_INPUT_QUANTITY = buttonEl.getAttribute('input_quantity'),
            SC_AJAX_FILE = buttonEl.getAttribute('ajax_file');

        var BUTTON_HTML = '<div class="shipchung_frame_v2 shipchung_tiny">'
            + '<span class="shipchung_title_v2">Thanh to�n nhanh</span>'
            + '<a class="shipchung_logo" href="http://shipchung.vn" target="_blank">ShipChung.VN</a>'
            + '<span shipchung_type="detail" shipchung_method="ajax" style="cursor: pointer;" class="shipchung_pas_button" cod="" rel="' + SC_ID + '"></span>'
            + '<div class="shipcchung_slogan">Thanh to�n, giao h�ng to�n qu?c</div>'
            + '</div>';

        buttonEl.innerHTML = BUTTON_HTML;

        // Handler Event
        document.getElementsByClassName('shipchung_pas_button')[0].addEventListener('click', function () {

            SC.Popup.createIframeElement(SC_ID);
            // Get quantity by input id or input name

            var SC_QUANTITY = (document.getElementById(SC_INPUT_QUANTITY)) ? parseInt(document.getElementById(SC_INPUT_QUANTITY).value) : ((document.getElementsByName(SC_INPUT_QUANTITY).length > 0 && parseInt(document.getElementsByName(SC_INPUT_QUANTITY)[0].value) > 0) ? parseInt(document.getElementsByName(SC_INPUT_QUANTITY)[0].value) : 1);

            me.jx.post(SC_AJAX_FILE, 'id=' + SC_ID + '&quantity=' + SC_QUANTITY, function (err, resp) {
                if (!err) {
                    if (resp.result_code !== 100) {
                        SC.Popup.iframe.src = resp.data.SCFrameUrl;
                        SC.Popup.popup.appendChild(SC.Popup.iframe);
                        document.body.appendChild(SC.Popup.popup);
                        SC.Popup.popup.className = "sc-popup-wrap";
                    } else {
                        //alert(resp.result_description);
                        SC.Popup.closePopup();
                    }
                }
            }, 'json', 'application/x-www-form-urlencoded');

            // T?o backdrop
            SC.Popup.createBackdrop();
            // L?ng nghe s? ki?n resize c?a window v� di?u ch?nh l?i v? tr� c?a popup 
            SC.Popup.iframeResizeHander();
        });
    }

    ShipChung.prototype.getData = function (fieldName, element) {
        fieldAttributeName = 'order-' + fieldName;
        if (element.hasAttribute(fieldAttributeName)) {
            return element.getAttribute(fieldAttributeName);
        } else {
            alert('Vui lòng kiểm tra trường ' + fieldName);
            return;
        }

    }
    ShipChung.prototype.getItemsFromButton = function (buttonEl, data_id) {
        // console.log("==========DATA ORDER Element==========");
        var itemElements = buttonEl.parentNode.getElementsByTagName('orders');
        var self = this;
        var dataInput = {};
        if (itemElements.length <= 0) {
            alert('Lỗi, Vui lòng kiểm tra lại dữ liệu');
        }
        for (var i = 0; i < itemElements.length; i++) {
            try {
                dataInput["amount"] = this.getData('amount', itemElements[i]);
                dataInput["buyerAddress"] = this.getData('buyer-address', itemElements[i]);
                dataInput["buyerCity"] = this.getData('buyer-city', itemElements[i]);
                dataInput["buyerCountry"] = this.getData('buyer-country', itemElements[i]);
                dataInput["buyerEmail"] = this.getData('buyer-email', itemElements[i]);
                dataInput["buyerName"] = this.getData('buyer-name', itemElements[i]);
                dataInput["buyerPhone"] = this.getData('buyer-phone', itemElements[i]);
                dataInput["cancelUrl"] = this.getData('cancel-url', itemElements[i]);
                dataInput["currency"] = this.getData('currency', itemElements[i]);
                dataInput["orderCode"] = this.getData('code', itemElements[i]);
                dataInput["orderDescription"] = this.getData('description', itemElements[i]);
                dataInput["paymentHours"] = this.getData('payment-hours', itemElements[i]);
                dataInput["returnUrl"] = this.getData('return-url', itemElements[i]);
                dataInput["totalItem"] = this.getData('total-item', itemElements[i]);

                // card link
                var isCardLink = this.getData('isCardLink', itemElements[i]);
                if(isCardLink === 'true'){
                    dataInput["merchantSideUserId"] = this.getData('merchantSideUserId', itemElements[i]);
                    dataInput["buyerPostalCode"] = this.getData('buyerPostalCode', itemElements[i]);
                    dataInput["buyerState"] = this.getData('buyerState', itemElements[i]);
                    dataInput["isCardLink"] = isCardLink;
                }

                // fixed installment
                // var installment = this.getData('installment', itemElements[i]);
                // if (installment === 'true'){
                //     dataInput["installment"] = installment;
                //     dataInput["month"] = this.getData('month', itemElements[i]);
                //     dataInput["bankCode"] = this.getData('bankCode', itemElements[i]);
                //     dataInput["paymentMethod"] = this.getData('paymentMethod', itemElements[i]);
                // }
            } catch (err) {
                console.log(err);
                alert('Lỗi, Vui lòng kiểm tra lại dữ liệu');
                break;
            }
        }
        // console.log(dataInput);
        // console.log("==========DATA ORDER Element==========");
        return dataInput;
    }

    ShipChung.prototype.fireEvent = function (el, ev, callback) {
        var scRef = el.parentNode.id.split("-")[2],
            me = this,
            orderData;
        el.addEventListener(ev, function () {
            if (__data.hasOwnProperty(el.parentNode.id)) {
                console.log("Do something.");
                console.log(__data);
                // console.log(__data[el.parentNode.id]);
                ShipChung.prototype.buildData();
                console.log(__data);
                // console.log(__data[el.parentNode.id]);
                console.log("Done something.");
                orderData = __data[el.parentNode.id];
            } else {
                alert('Lỗi dữ liệu đầu vào, vui lòng kiểm tra lại.');
                return;
            }

            if (orderData) {
                //alert("ShipChung.prototype.fireEvent");
                SC.Popup.openPopup(scRef, orderData);
            }

            typeof callback == 'undefined' || callback();
        })
    }


    // Generate random id 
    ShipChung.prototype.randomId = function () {
        var str = "asdfghjklzxcvbnmqwertyuiop0987654321" + new Date().getTime(),
            newId = "";
        for (var i = 0; i < 8; i++) {
            newId += str[Math.floor((Math.random() * (str.length - 1)) + 1)];
        }

        return newId;
    }
    // Extend object 
    ShipChung.prototype.extend = function (dst) {
        for (var i = 1, ii = arguments.length; i < ii; i++) {
            var obj = arguments[i];
            if (obj) {
                var keys = Object.keys(obj);
                for (var j = 0, jj = keys.length; j < jj; j++) {
                    var key = keys[j];
                    dst[key] = obj[key];
                }
            }
        }
        return dst;
    }



    if (typeof exports.Button == 'undefined') {
        exports.Button = new ShipChung();
    }

})(typeof window.SC == 'undefined' ? window.SC = {} : window.SC);