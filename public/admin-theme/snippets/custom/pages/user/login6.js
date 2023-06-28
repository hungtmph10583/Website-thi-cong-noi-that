var SnippetLogin = function() {
    $("#m_login");
    var t = function() {
        $("#m_login_signin_submit").click(function(t) {
            t.preventDefault();
            var e = $(this),
                a = $(".m-login__form");
            a.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: 'Cần nhập email',
                        email: 'Không đúng định dạnh email'
                    },
                    password: {
                        required: "Cần nhập mật khẩu"
                    }
                }
            }), a.valid() && (e.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), a.ajaxSubmit({
                url: "",
                success: function(t, i, n, r) {
                    if(t.success == true){
                        window.location.href = t.href;
                    }else{
                        e.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1),
                            function(t, e, a) {
                                var i = $('<div class="m-alert m-alert--outline alert alert-' + e + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
                                t.find(".alert").remove(), i.prependTo(t), mUtil.animateClass(i[0], "fadeIn animated"), i.find("span").html(a)
                            }(a, "danger", "Email/Mật khẩu không đúng.")
                    }
                }
            }))
        })
    };
    return {
        init: function() {
            t()
        }
    }
}();
jQuery(document).ready(function() {
    SnippetLogin.init()
});
