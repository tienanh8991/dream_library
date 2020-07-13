$(document).ready(function () {
    $('#choose-customer').keyup(function () {
        let keyword = $(this).val();
        let origin = window.location.origin;
        $('#list-customer-search').html('')

        if (keyword) {
            $.ajax({
                url: origin + '/customers/search',
                type: 'GET',
                dataType: 'json',
                data: {keyword: keyword},
                success: function (response) {
                    // console.log(response)
                    if (response.length > 0) {
                        let html = '';
                        $.each(response, function (index, item) {
                            if (item.status === 2) {
                                html += '<li class="list-group-item list-group-item-action customer-data" data-id="' + item.id + '">';
                                html += item.name + ' - ' + item.class;
                                html += '</li>';
                            }
                        })
                        $('#list-customer-search').append(html)
                    } else {
                        $('#list-customer-search').html('')
                    }
                }
            })
        } else {
            $('#customer-table-choose').empty();
        }

    });

    $('body').on('click', '.customer-data', function () {
        let idCustomer = $(this).attr('data-id');
        let origin = window.location.origin;
        $('#list-customer-search').html('')
        $.ajax({
            url: origin + '/customers/render',
            type: 'GET',
            dataType: 'json',
            data: {keyword: idCustomer},
            success: function (response) {
                let html = '';
                // console.log(response)
                html += '<tr id="customer-item" data-id="' + response.id + '" >'
                html += '<td>';
                html += response.name;
                html += '</td>';
                html += '<td>';
                html += response.class;
                html += '</td>';
                html += '</tr>';

                // console.log(html)

                $('#customer-table-choose').append(html);
            }
        })
    })

    $('#choose-book').keyup(function () {
        let keyword = $(this).val();
        let origin = window.location.origin;
        $('#list-book-search').html('');

        if (keyword) {
            $.ajax({
                url: origin + '/books/search',
                type: 'GET',
                dataType: 'json',
                data: {keyword: keyword},
                success: function (response) {
                    if (response.length > 0) {
                        let html = '';
                        $.each(response, function (index, item) {
                            if (item.borrowed === 2) {
                                html += '<li class="list-group-item list-group-item-action book-data" data-id="' + item.id + '">';
                                html += item.name;
                                html += '</li>';
                            }
                        })
                        $('#list-book-search').append(html);
                    } else {
                        $('#list-book-search').html('');
                    }
                }
            })
        } else {
            $('#book-table-choose').empty();
        }
    });


    $('body').on('click', '.book-data', function () {
        let book_id = $(this).attr('data-id');
        // console.log(book_id);
        let origin = window.location.origin;

        $('#list-book-search').html('');

        $.ajax({
            url: origin + '/books/render',
            type: 'GET',
            dataType: 'json',
            data: {keyword: book_id},
            success: function (response) {
                let html = ''
                // console.log(response);
                html += '<tr id="book-item" data-id="' + response.id + '">'
                html += '<td>';
                html += response.name;
                html += '</td>';
                html += '<td>';
                html += response.author;
                html += '</td>';
                html += '</tr>';
                $('#book-table-choose').append(html);
            }
        })
    })

    $('.borrow-btn').click(function () {
        let origin = window.location.origin;
        let book_id = $('#book-item').attr('data-id');
        let customer_id = $('#customer-item').attr('data-id');
        let expected_date = $('#borrow-expected').val();

        let d = new Date();
        let strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

        // console.log(book_id)
        // console.log(strDate)

        if (Date.parse(strDate) > Date.parse(expected_date)) {
            $('#error-date').append('The payment date cannot be less than the loan date !');
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: origin + '/borrows/store',
                type: 'POST',
                dataType: 'json',
                data: {
                    idBook: book_id,
                    idCustomer: customer_id,
                    expected: expected_date,
                    borrow_date: strDate
                },
                success: function (response) {
                    console.log(response);
                    alert('Borrowed Complete !');
                    $('#book-table-choose').empty();
                    $('#customer-table-choose').empty();
                }
            })
        }
    });

    $('.btn-profile').click(function () {
        let origin = window.location.origin;
        let name = $('#inputName').val();
        let email = $('#inputEmail').val();
        let password = $('#inputPassword').val();
        let phone = $('#inputPhone').val();
        let address = $('#inputAddress').val();
        let library = $('#inputLibrary').val();
        let avatar = $('#inputAvatar').val();

        console.log(avatar);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: origin + '/users/profile',
            type: 'POST',
            dataType: 'json',
            data: {
                name: name,
                email: email,
                password: password,
                phone: phone,
                address: address,
                library_id: library,
                avatar: avatar
            },
            success: function (response) {
                console.log(response);
                window.location.reload();
                alert('Update Complete !');

            }
        })
    })
})
