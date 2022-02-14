var { log } = console


function mark_product(form, event) {
    event.preventDefault()

    $.post(form.action, $(form).serialize() + '&ajax', function (data) {
        if(data && data.status === 'ok') {
            alert('success', data.message || 'Graded')
        }else{
            alert('danger', data.message || ' Error!')
        }
    }).fail(function (data) {
        alert('danger', ' Server Error!')
    })
}

function mark_category(form, event) {
    event.preventDefault()

    $.post(form.action, $(form).serialize() + '&ajax', function (data) {
        if(data && data.status === 'ok') {
            alert('success', data.message || 'Graded')
        }else{
            alert('danger', data.message || ' Error!')
        }
    }).fail(function (data) {
        alert('danger', ' Server Error!')
    })
}

function check_location(form, event) {
    event.preventDefault()

    $.post(form.action, $(form).serialize() + '&ajax', function (data) {
        if(data && data.status === 'ok') {
            alert('success', data.message || 'Location changed')
        }else{
            alert('danger', data.message || ' Error!')
        }
    }).fail(function (data) {
        alert('danger', ' Server Error!')
    })
}

function alert(status, text) {
    var alert = `<div class="alert alert-${status} alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    ${text}
    </div>`
    $('#errors_list').prepend(alert)
    $(".alert-success").delay(4000).slideUp(400, function () {
        $(this).alert('close');
    })

}
