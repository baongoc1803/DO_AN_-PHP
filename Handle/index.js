
    var btns = document.querySelectorAll('.update');
    var elements = document.querySelectorAll('.num');
    elements.forEach(function (element) {
        element.addEventListener('change', function () {
            btns.forEach(function (btn) {
                btn.click();
            })
        })
    })

