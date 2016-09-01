
$("#generatePassword").on('click', function(){
    $('#password').strongPassword();
});

var vm = new Vue({
    el: 'body',
    data: {
        name: ''
    },
    // 在 `methods` 对象中定义方法
    methods: {
        create_password: function (event) {
            $('#create_password').modal()
        }
    }
})