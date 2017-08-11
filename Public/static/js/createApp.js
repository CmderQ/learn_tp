/**
 * config = { "$table": jqObj, "$form": jqObj } // optional
 */
function createApp(config) {
    var typeOf = function(obj) {
        return Object.prototype.toString.call(obj);
    };

    function App() {
        for (var item in config) {
            if (config.hasOwnProperty(item)) {
                this[item] = config[item];
            }
        }
    }

    function checkAppTable() {
        if (! this.$table) {
            console.log("app.$table can't be null");
            return false;
        }

        return true;
    }

    App.prototype.bindSelectAll = function() {
        var app = this;

        if (! checkAppTable.call(app)) {
            return;
        }

        this.$table
            .on("click", "input[name=select_all]", function() {
                if (this.checked) {
                    app.$table.find("input[name!=select_all]").prop("checked", this.checked);
                } else {
                    app.$table.find("input[name!=select_all]").removeAttr('checked');
                }

            })
            .on("click", "input[name!=select_all]", function() {
                var selectAll = true;

                if (! this.checked) {
                    selectAll = false;
                } else {
                    app.$table.find("input[name!=select_all]").each(function(idx, ele) {
                        if (! ele.checked) {
                            selectAll = false;
                            return false;
                        }
                    });
                }

                app.$table.find("input[name=select_all]").prop("checked", selectAll);
            });
    };

    App.prototype.enablePaginationJump = function() {
        var app = this,
            $pager = $("ul.pagination"),
            jumpHandler = function(evt) {
                var pagenum = parseInt($pager.find("input[name=page_jump]").val()),
                maxPageNum = parseInt($pager.find("span[maxpagenum]").attr("maxpagenum")),
                ptn = /(\/p\/|&p=)(\d+)/,
                href = window.location.href;

                pagenum = pagenum ? Math.min(pagenum, maxPageNum) : 1;

                if (ptn.test(href)) {
                    href = href.replace(ptn, "$1"+ pagenum);
                } else {
                    href += ! window.location.search ? ("?p=" + pagenum) : ("&p=" + pagenum);
                }

                window.location = href;
            };

        if (! checkAppTable.call(app)
            || $pager.size() < 1
            || $pager.find("li").size() <= 1) {
            return;
        }

        var $ele = $('<li><input type="text" name="page_jump" class="input-sm" style="height:32px;width:40px;" placeholder="1"></li><li><a href="javascript:void(0)">Go</a></li>');

        $pager.append($ele);
        $pager.find("input[name=page_jump]").on("keypress", function(evt) {
            if (evt.keyCode === 13) {
                jumpHandler(evt);
            }
        }).parent().next().children().on("click", function(evt) {
            jumpHandler(evt);
        });
    };

    App.prototype.showDialog = function(name) {
        if (! this.dialogs || ! this.dialogs[name]) {
            return false;
        }

        this.dialogs[name].dialog("open").dialog("widget").get(0).scrollIntoView(true);
        return true;
    };

    App.prototype.getToggleSearchHandler = function() {
        var $form = this.$form ? this.$form : $('form[name=searchform]'),
            toggleStatus = $form.attr('visibilty') === 'hide' ? false : true;

        return function () {
            var $this = $(this);

            toggleStatus = ! toggleStatus;

            if (! toggleStatus) {
                $form.slideUp({
                    "complete": function() {
                        $this.children("i")
                            .removeClass("fa-angle-double-up")
                            .addClass("fa-angle-double-down");
                    }
                });
            } else {
                $form.slideDown({
                    "complete": function() {
                        $this.children("i")
                            .removeClass("fa-angle-double-down")
                            .addClass("fa-angle-double-up");
                    }
                });
            }
        };
    };

    App.prototype.enableToggleSearch = function() {
        this.$form.after('<div class="search-form-toggle row"><div class="hr col-xs-5"></div><button type="button" class="btn btn-white btn-sm col-xs-2" style="border:none;">\
            <i class="ace-icon fa fa-angle-double-up"></i>\
        </button>\
        <div class="hr col-xs-5"></div>\
    </div>');
        $(".search-form-toggle").find("button").on("click", this.getToggleSearchHandler());
    };

    /**
     * app.init({
     *     "withSelectAll": boolean,
     *     "enableToggleSearch": boolean,
     *     "inits": [ func(){} ... ],
     *     "events": [ func(){} ... ]
     * });
     */
    App.prototype.init = function(config) {
        var item = null;

        if (config.withSelectAll) {
            this.bindSelectAll();
        }

        if (typeof config.paginationJump === "undefined" || config.paginationJump) {
            this.enablePaginationJump();
        }

        if (config.enableToggleSearch) {
            this.enableToggleSearch();
        }

        if (config.events) {
            switch (typeOf(config.events)) {
            case '[object Function]':
                config.events.call(this);
                break;
            case '[object Array]':
                for (item in config.events) {
                    config.events[item].call(this);
                }

                break;
            }
        }

        if (config.inits) {
            switch (typeOf(config.inits)) {
            case '[object Function]':
                config.inits.call(this);
                break;
            case '[object Array]':
                for (item in config.inits) {
                    config.inits[item].call(this);
                }

                break;
            }
        }
    };

    return new App();
}
