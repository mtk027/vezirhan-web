"use strict";
var KTSigninGeneral = function() {
    var e, t, i;
    return {
        init: function() {
            e = document.querySelector("#kt_sign_in_form"), t = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(e, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "E-Posta adresi zorunlu."
                            },
                            emailAddress: {
                                message: "Lütfen geçerli bir e-posta adresi giriniz."
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Şifre alanı zorunlu"
                            },
                            callback: {
                                message: "Lütfen geçerli bir şifre giriniz.",
                                callback: function(e) {
                                    if (e.value.length > 0) return _validatePassword()
                                }
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(n) {
                n.preventDefault();
                var form = $(document).find('form');

                var url = form.attr('action') + "?_token=" + $('#csrf-token')[0].content
                if (typeof form.data('redirect') != "undefined"){
                    var postData = form.serialize() + "&redirect=" + form.data('redirect');
                }else{
                    var postData = form.serialize();
                }

                ajaxService(url,postData,'POST',function (response) {
                    if (response.status){
                        window.location = form.data('redirect');
                    }
                })
                return false;
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSigninGeneral.init()
}));
