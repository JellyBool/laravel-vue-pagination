<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link rel="stylesheet"
          href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div id="app">
    <ul v-paginate:7="items" class="list-group">
        <li v-for="item in items" class="list-group-item">
            <a href="/posts/@{{ item.id }}">@{{ item.title }}</a>
        </li>
    </ul>

    <ul class="pagination">
        <li v-for="itemLink in itemsLinks">
            <a @click="changeItemsPage(itemLink)" href="#">
            @{{ itemLink + 1 }}
            </a>
        </li>
    </ul>
    <pre>
        @{{ $data | json }}
    </pre>
</div>
<script src="/js/vue.js"></script>
<script src="/js/vue-resource.min.js"></script>
<script src="/js/vue-paginate.js"></script>
<script>
    new Vue({
        el: '#app',
        ready () {
            this.$http.get('/items', {
                        order: 'asc',
                        filter: {items_per_page: -1}
                    })
                    .then(function (response) {
                                this.fullItems = response.data
                            }
                    )
        },
        data: {
            items: []
        }
    });
</script>
</body>
</html>
