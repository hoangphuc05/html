/* Developed by Juno_okyo */
(function() {
    new Vue({
        el: "#juno_okyo",
        data: {
            url: null,
            result: "",
            result1:"",
            comment_separator: "__________________________",
            title_upper: !0,
            show_scrore: !0,
            loading: !1,
            copied: !0
        },
        methods: {
            onSubmit: function() {
                var a = this;
                null !== url && (this.result = "", this.loading = !0, fetch(this.url + ".json").then(function(a) {
                    return a.json()
                }).then(function(b) {
                    var c = b[1].data.children;
                    b = b[0].data.children[0].data.title;
                    a.title_upper && (b = b.toUpperCase());
                    a.result = a.getSubReddit() + "\n\n" + b + "\n\n";
                    a.result1 = a.getSubReddit() + "\n\n" + b + "\n\n";
                    a.result += a.comment_separator +"\n\n" + "Link reddit: " + "https://redd.it/" + (new URL(a.url)).pathname.split("/")[4] + "\n\n" + a.comment_separator + "\n\n";
                    a.result1 += a.comment_separator + "\n\n" + "Link reddit: " + "https://redd.it/" + (new URL(a.url)).pathname.split("/")[4] + "\n\n" + a.comment_separator+ "\n\n";
                    c.map(function(d) {
                        d = d.data;
                        d.author && d.body &&
                            "[removed]" !== d.body && (a.result1 += ">u/" + d.author, a.show_scrore && (a.result1 += " (" + a.kFormatter(d.score) + " points)"), a.result1 += ": " + d.body + "\n\n", void 0 !== d.replies && d.replies.data && a.getReplies1(d.replies, ">>"), a.result1 += a.comment_separator + "\n\n")
                        &&"[removed]" !== d.body && (a.result += ">u/" + d.author, a.show_scrore && (a.result += " (" + a.kFormatter(d.score) + " points)"), a.result += ": "  + "\n\n", void 0 !== d.replies && d.replies.data && a.getReplies(d.replies, ">>"), a.result += a.comment_separator + "\n\n")
                         
                        });
                    a.loading = !1
                }))
            },
            getReplies: function(a, b) {
                var c = this;
                void 0 !== a && void 0 !== a.data && a.data.children.map(function(a) {
                    a = a.data;
                    a.author && a.body && "[removed]" !== a.body && (c.result += b + "u/" + a.author, c.show_scrore && (c.result += " (" + c.kFormatter(a.score) +
                        " points)"), c.result += ": " +  "\n\n", c.getReplies(a.replies, b + ">"))
                        
                        
                })
            },
            getReplies1: function(a, b) {
                var c = this;
                void 0 !== a && void 0 !== a.data && a.data.children.map(function(a) {
                    a = a.data;
                    a.author && a.body && "[removed]" !== a.body && (c.result1 += b + "u/" + a.author, c.show_scrore && (c.result1 += " (" + c.kFormatter(a.score) +
                        " points)"), c.result1 += ": " + a.body + "\n\n", c.getReplies1(a.replies, b + ">"))
                        
                        
                })
            },
            getSubReddit: function() {
                try {
                    var a = (new URL(this.url)).pathname.split("/");
                    return a[1] + "/" + a[2]
                } catch (b) {
                    return !1
                }
            },
            kFormatter: function(a) {
                return 999 < a ? (a / 1E3).toFixed(1) + "k" : a
            },
            saveToFile: function() {
                if ("" === this.result) toastr.error("There is no data to save!");
                else {
                    var a = new Blob([this.result], {
                        type: "text/plain;charset=utf-8"
                    });
                    saveAs(a, "reddit.txt")
                }
            },
            example: function() {
                this.url = "https://www.reddit.com/r/AskReddit/comments/6v9uy8/whats_a_deeply_unsettling_fact/"
            }
        },
        mounted: function() {
            toastr.options = {
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-bottom-left",
                preventDuplicates: !0
            };
            var a = new Clipboard(".btn-copy");
            a.on("success", function(a) {
                toastr.success("Copied to clipboard!");
                a.clearSelection()
            });
            a.on("error", function(a) {
                console.error("Action:", a.action);
                console.error("Trigger:", a.trigger)
            });
            var b = this;
            jQuery(document).ready(function(a) {
                a(window).on("beforeunload", function() {
                    if ("" !== b.result) return !1
                })
            })
        }
    })
})();