function simpleAjaxPost(url, elementId, successCallBack, fieldErrorCallBack, actionErrorCallBack) {
    var data = new FormData();
    var inputs = $(elementId + ' input, ' + elementId + ' select,' + elementId + ' textarea');
    $.each(inputs, function (obj, v) {
        var name = $(v).attr("name");
        if ($(v).attr("type") == "file") {
            var id = $(v).attr("id");
            var input = document.getElementById(id);
            for (var indexElement = 0; indexElement < input.files.length; indexElement++) {
                data.append(name + "[" + indexElement + "]", input.files[indexElement]);
            }
        } else if ($(v).attr("type") == "radio") {
            if ($(v).is(':checked')) {
                data.append(name, $(v).val());
            }
        } else if ($(v).attr("type") == "checkbox") {
            if ($(v)[0].checked) {
                data.append(name, $(v).val());
            }
        } else {
            data.append(name, $(v).val());
        }
    });
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            if (res.error_code == "success") {
                if (typeof successCallBack != 'undefined' && successCallBack != null) {
                    successCallBack(res);
                } else {
                    alert(res.error_message);
                }
            } else if (res.error_code == "field_error") {
                if (typeof fieldErrorCallBack != 'undefined' && fieldErrorCallBack != null) {
                    fieldErrorCallBack(res);
                }
            } else {
                if (typeof actionErrorCallBack != 'undefined' && actionErrorCallBack != null) {
                    actionErrorCallBack(res);
                } else {
                    alert(res.error_message);
                }
            }
        }
    }).fail(function (jqXHR, textStatus, error) {
        alert("System error.");
    });
}

function simpleCUDModal(dialogId, formId, actionBtnId, gUrl, pUrl, successCallBack, fieldErrorCallBack, actionErrorCallBack) {
    $.ajax({
        url: gUrl,
        success: function (res) {
            if (res.error_code == "success") {
                $(dialogId).html(res.content);
                $(dialogId).modal();
                $(dialogId).fadeOut("slow");
                $(actionBtnId).click(function (e) {
                    e.preventDefault();
                    var data = new FormData();
                    var inputs = $(formId + ' input, ' + formId + ' select,' + formId + ' textarea');
                    $.each(inputs, function (obj, v) {
                        var name = $(v).attr("name");
                        if ($(v).attr("type") == "file") {
                            var id = $(v).attr("id");
                            var input = document.getElementById(id);
                            for (var indexElement = 0; indexElement < input.files.length; indexElement++) {
                                data.append(name + "[" + indexElement + "]", input.files[indexElement]);
                            }
                        } else if ($(v).attr("type") == "radio") {
                            if ($(v).is(':checked')) {
                                data.append(name, $(v).val());
                            }
                        } else {
                            data.append(name, $(v).val());
                        }
                    });
                    $.ajax({
                        url: pUrl,
                        type: "POST",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            if (res.error_code == "success") {
                                if (typeof successCallBack != 'undefined' && successCallBack != null) {
                                    successCallBack(dialogId, actionBtnId, res);
                                } else {
                                    alert(res.errorMessage);
                                }
                            } else if (res.error_code == "field_error") {
                                if (typeof fieldErrorCallBack != 'undefined' && fieldErrorCallBack != null) {
                                    fieldErrorCallBack(dialogId, actionBtnId, res);
                                } else {
                                    $(formId).replaceWith(res.content);
                                }
                            } else {
                                if (typeof actionErrorCallBack != 'undefined' && actionErrorCallBack != null) {
                                    actionErrorCallBack(dialogId, actionBtnId, res);
                                } else {
                                    alert(res.errorMessage);
                                }
                            }
                        }
                    }).fail(function (jqXHR, textStatus, error) {
                        alert("System error.");
                    });
                });
            } else if (res.error_code == "field_error") {
                if (typeof fieldErrorCallBack != 'undefined' && fieldErrorCallBack != null) {
                    fieldErrorCallBack(dialogId, actionBtnId, res);
                } else {
                    alert(res.errorMessage);
                }
            } else {
                if (typeof actionErrorCallBack != 'undefined' && actionErrorCallBack != null) {
                    actionErrorCallBack(dialogId, actionBtnId, res);
                } else {
                    alert(res.errorMessage);
                }
            }
        }
    }).fail(function (jqXHR, textStatus, error) {
        alert("System error.");
    });
}