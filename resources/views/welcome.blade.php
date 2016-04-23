<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link rel="stylesheet"
          href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div id="app">
            <ul class="list-group">
                <li class="list-group-item" v-for="item in items">
                    <a href="/item/@{{ item.id }}">
                        @{{ item.title }}
                    </a>
                </li>
            </ul>
            <nav>
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous"
                           @click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber"
                        v-bind:class="[ page == isActived ? 'active' : '']">
                        <a href="#"
                           @click.prevent="changePage(page)">@{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next"
                           @click.prevent="changePage(pagination.current_page + 1)">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
<pre>
    @{{ $data | json }}
</pre>
        </div>

    </div>
</div>
<script src="/js/vue.js"></script>
<script src="/js/vue-resource.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            pagination: {
                total: 0,
                per_page: 7,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,// left and right padding from the pagination <span>,just change it to see effects
            items: []
        },
        ready: function () {
            this.fetchItems(this.pagination.current_page);
        },
        computed: {
            isActived: function () {
                return this.pagination.current_page;
            },
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }

                return pagesArray;
            }
        },
        methods: {
            fetchItems: function (page) {
                var data = {page: page};
                this.$http.get('api/items', data).then(function (response) {
                    //look into the routes file and format your response
                    this.$set('items', response.data.data.data);
                    this.$set('pagination', response.data.pagination);
                }, function (error) {
                    // handle error
                });
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.fetchItems(page);
            }
        }
    });
</script>
</body>
</html>
